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

  public function save(Request $request)
  {
    // Validate form (with custom messages)
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();

    // Upload article image

    if (isset($request->image)) {
      $imageName = md5(time()) . Auth::user()->id . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    }

    // If no image is uploaded, use default.jpg
    $fields['image'] = null == $request->image ? 'default.jpg' : $imageName;

    // Turn the 'featured' field value into a tiny integer
    $fields['featured'] = $request->get('featured') == 'on' ? 1 : 0;

    // Unique slug
    $slug = Str::slug($fields['title'], '-');
    $originalSlug = $slug;
    $count = 1;
    while (Article::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count++;
    }

    // Data to be added
    $form_data = [
      'user_id' => Auth::user()->id,
      'category_id' => $fields['category_id'],
      'title' => $fields['title'],
      'slug' => $slug,
      'short_description' => $fields['short_description'],
      'content' => $fields['content'],
      'featured' => $fields['featured'],
      'image' => $fields['image']
    ];

    // Insert data in the 'articles' table
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

  public function deleteImage($id, $fileName) {
    $article = Article::find($id);
    $article->image = "default.jpg";
		$article->save();

		if (File::exists(public_path('images/articles/' . $fileName))) {
			File::delete(public_path('images/articles/' . $fileName));
		}
  }

  public function edit($id)
  {
    $article = Article::find($id);
    $attached_tags = $article->tags()->get()->pluck('id')->toArray();
    
    return view(
      'dashboard/edit-article',
      [
        'categories' => $this->categories(),
        'tags' => $this->tags(),
        'attached_tags' => $attached_tags,
        'article' => $article
      ]
    );
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();
    $article = Article::find($id);

    // If a new image is uploaded, set it as the article image
    // Otherwise, set the old image...
    if (isset($request->image)) {
      $imageName = md5(time()) . Auth::user()->id . '.' . $request->image->extension();
      $request->image->move(public_path('images/articles'), $imageName);
    } else {
      $imageName = $article->image;
    }

    $article->title = $request->get('title');
    $article->short_description = $request->get('short_description');
    $article->category_id = $request->get('category_id');
    $article->featured = $request->has('featured');
    $article->image = $request->get('image') == 'default.jpg' ? 'default.jpg' : $imageName;
    $article->content = $request->get('content');
    // Save changes to the article
    $article->save();

    //Attach tags to article
    if ($request->has('tags')) {
      $article->tags()->sync($request->tags);
    } else {
        $article->tags()->sync([]);
    }

    return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $article->title . '" was updated');
  }

  public function delete($id)
  {
    $article = Article::find($id);
    $article->tags()->detach();
    $article->delete();

    return redirect()->back()->with('success', 'The article titled "' . $article->title . '" was deleted');
  }
}
