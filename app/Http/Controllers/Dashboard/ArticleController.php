<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Service\CategoryService;
use App\Service\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{

  public function index(Request $request)
  {
    // Articles count
    $article_count = Article::count();

    $per_page = 10;

    // Search query
    $qry = $request->input('search');

    $articles = Article::where('title', 'like', '%' . $qry . '%')
      ->orWhere('short_description', 'like', '%' . $qry . '%')
      ->orWhere('content', 'like', '%' . $qry . '%')
      ->orderBy('id', 'desc')
      ->paginate($per_page)
      ->onEachSide(1);

    /* Add 'allowActions' boolean to each article
    Check if current user is the article's owner or an admin to allow actions */
    foreach ($articles as $article) {
      $article->allowActions = true;
      if (Auth::user()->role->name == 'author') {
        $article->allowActions = $article->user_id == Auth::user()->id;
      }
    }

    return view(
      'dashboard/articles',
      [
        'articles' => $articles,
        'article_count' => $article_count
      ]
    );
  }

  public function create()
  {
    // Load the view and populate the form with categories
    return view(
      'dashboard/add-article',
      [
        'categories' => $this->categories(),
        'tags' => $this->tags()
      ]
    );
  }

  public function save(ArticleRequest $request)
  {
    $fields = $request->validated();
  
    // Upload article image
    if (isset($request->image)) {
      $imageName = md5(time()) . Auth::user()->id . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    }

    // If no image is uploaded, use default.jpg
    $fields['image'] = null == $request->image ? 'default.jpg' : $imageName;

    // Turn the 'featured' field value into a tiny integer
    $fields['featured'] = $request->get('featured') == 'on' ? 1 : 0;

    $fields['user_id'] = Auth::user()->id;
    $fields['slug'] = Str::slug($fields['title'], '-');


    try {
      // Save the article
      $article = Article::create($fields);

      // Attach tags to article
      if (isset($request->tags)) {
        $article->tags()->attach($request->tags);
      }

      return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $article->title . '" was added');
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return redirect()->back()->withErrors('An error occurred while adding the article')->withInput();
    }
  }

  public function edit($id)
  {
    $article = Article::with('tags')->findOrFail($id);
    $attached_tags = $article->tags()->pluck('id')->toArray();
    
    return view(
      'dashboard/edit-article',
      [
        'categories' => app(CategoryService::class)->all(),
        'tags' => app(TagService::class)->all(),
        'attached_tags' => $attached_tags,
        'article' => $article
      ]
    );
  }

  public function update(ArticleRequest $request, $id)
  {
    $article = Article::findOrFail($id);

    // If a new image is uploaded, set it as the article image
    // Otherwise, set the old image...
    if (isset($request->image)) {
      $imageName = md5(time()) . Auth::user()->id . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    } else {
      $imageName = $article->image;
    }

    DB::transaction(function () use ($article, $request, $imageName) {
      $article->title = $request->get('title');
      $article->short_description = $request->get('short_description');
      $article->category_id = $request->get('category_id');
      $article->featured = $request->has('featured');
      $article->image = $request->get('image') == 'default.jpg' ? 'default.jpg' : $imageName;
      $article->content = $request->get('content');
      // Save changes to the article
      $article->save();

      //Attach tags to article | An article should not be without tags for search optimization reasons
      $article->tags()->sync($request->tags);
    });

    return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $article->title . '" was updated');
  }

  public function delete($id)
  {
    $article = Article::findOrFail($id);
    $article->tags()->detach();
    $article->delete();

    return redirect()->back()->with('success', 'The article titled "' . $article->title . '" was deleted');
  }
}
