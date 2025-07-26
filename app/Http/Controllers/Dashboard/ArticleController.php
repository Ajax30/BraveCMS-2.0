<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  private $rules = [
    'category_id' => 'required|exists:article_categories,id',
    'title' => 'required|string|max:190',
    'short_description' => 'required|string|max:190',
    'image' =>  'image|mimes:jpeg,png,jpg|max:2048',
    'video' =>  'file|mimes:mp4,mov|max:20480',
    'content' => 'required|string'
  ];

  private $messages = [
    'category_id.required' => 'Please pick a category for the article',
    'title.required' => 'Please provide a title for the article',
    'short_description.required' => 'The article needs a short description',
    'short_description.max' => 'The short description field is too long',
    'content.required' => 'Please add content'
  ];

  public function categories()
  {
    return ArticleCategory::all();
  }

  public function tags()
  {
    return Tag::all();
  }

  public function index(Request $request)
  {
    $article_count = Article::count();
    $per_page = 10;
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

    return view('dashboard/articles', [
      'articles' => $articles,
      'article_count' => $article_count
    ]);
  }

  public function deleteImage($id, $fileName)
  {
    $article = Article::find($id);
    $article->image = "default.jpg";
    $article->save();

    if (File::exists(public_path('images/articles/' . $fileName))) {
      File::delete(public_path('images/articles/' . $fileName));
    }
  }

  public function create()
  {
    return view('dashboard/add-article', [
      'categories' => $this->categories(),
      'tags' => $this->tags()
    ]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();

    if (isset($request->image)) {
      $imageName = md5(time()) . Auth::user()->id . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    }

    $fields['image'] = $request->image ? $imageName : 'default.jpg';
    $fields['featured'] = $request->get('featured') == 'on' ? 1 : 0;

    if (isset($request->video)) {
      $videoName = md5(time()) . Auth::id() . '.' . $request->video->extension();
      $request->video->move(public_path('videos/articles'), $videoName);
    } else {
      $videoName = null;
    }

    // Slug generation
    $slug = Str::slug($fields['title'], '-');
    $originalSlug = $slug;
    $count = 1;
    while (Article::where('slug', $slug)->exists()) {
      $slug = $originalSlug . '-' . $count++;
    }

    $form_data = [
      'user_id' => Auth::user()->id,
      'category_id' => $fields['category_id'],
      'title' => $fields['title'],
      'slug' => $slug,
      'short_description' => $fields['short_description'],
      'content' => $fields['content'],
      'featured' => $fields['featured'],
      'image' => $fields['image'],
      'video' => $videoName,
    ];

    $query = Article::create($form_data);

    if ($request->has('tags')) {
      $query->tags()->attach($request->tags);
    }

    if ($query) {
      return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $form_data['title'] . '" was added');
    } else {
      return redirect()->back()->with('error', 'Adding article failed');
    }
  }

  public function edit($id)
  {
    $article = Article::find($id);
    $attached_tags = $article->tags()->get()->pluck('id')->toArray();

    return view('dashboard/edit-article', [
      'categories' => $this->categories(),
      'tags' => $this->tags(),
      'attached_tags' => $attached_tags,
      'article' => $article
    ]);
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();
    $article = Article::find($id);

    // Image upload
    if (isset($request->image)) {
      if ($article->image && $article->image !== 'default.jpg' && file_exists(public_path('images/articles/' . $article->image))) {
        unlink(public_path('images/articles/' . $article->image));
      }
      
      $imageName = md5(time()) . Auth::id() . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    } else {
      $imageName = $article->image;
    }

    // Video upload
    if (isset($request->video)) {
      if ($article->video && file_exists(public_path('videos/articles/' . $article->video))) {
        unlink(public_path('videos/articles/' . $article->video));
      }

      $videoName = md5(time()) . Auth::id() . '.' . $request->video->extension();
      $request->video->move(public_path('videos/articles'), $videoName);
    } else {
      $videoName = $article->video;
    }

    $title = $fields['title'];

    // Update slug if title changed
    if ($title !== $article->title) {
      $slug = Str::slug($title, '-');
      $originalSlug = $slug;
      $count = 1;

      while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
        $slug = $originalSlug . '-' . $count++;
      }

      $article->slug = $slug;
    }

    // Update article properties
    $article->title = $title;
    $article->short_description = $fields['short_description'];
    $article->category_id = $fields['category_id'];
    $article->featured = $request->has('featured');
    $article->image = $imageName;
    $article->video = $videoName;
    $article->content = $fields['content'];

    $article->save();
    $article->tags()->sync($request->tags ?? []);

    return redirect()->route('dashboard.articles')
      ->with('success', 'The article titled "' . $article->title . '" was updated');
  }

  public function delete($id)
  {
    $article = Article::findOrFail($id);

    // Detach related tags
    $article->tags()->detach();

    // Physically remove article's image (if it's not the default one)
    if ($article->image && $article->image !== 'default.jpg') {
      $imagePath = public_path('images/articles/' . $article->image);
      if (File::exists($imagePath)) {
        File::delete($imagePath);
      }
    }

    // Physically remove article's video
    if ($article->video) {
        $videoPath = public_path('videos/articles/' . $article->video);
        if (File::exists($videoPath)) {
            File::delete($videoPath);
        }
    }

    // Delete article
    $article->delete();

    return redirect()->back()->with('success', 'The article titled "' . $article->title . '" was deleted');
  }
}
