<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	
	private $rules = [
		'category_id' => 'required|exists:article_categories,id',
		'title' => 'required|string|max:255',
		'short_description' => 'required|string|max:255',
		'image' =>  'image|mimes:jpeg,png,jpg|max:2048',
		'content' => 'required|string'
	];

	private $messages = [
		'category_id.required' => 'Please pick a category for the article',
		'title.required' => 'Please provide a title for the article',
		'short_description.required' => 'The article needs a short description',
		'content.required' => 'Please add content'
	];
	
	public function categories() {
		return ArticleCategory::all();
	}
	
	public function index() {
		$articles = Article::orderBy('id', 'desc')->paginate(10);

		return view('dashboard/articles',
			['articles' => $articles]
		);
	}

	public function create() {
		// Load the view and populate the form with categories
		return view('dashboard/add-article',
			['categories' => $this->categories()]
		);
	}

	public function save(Request $request) {

		// Validate form (with custom messages)
		$validator = Validator::make($request->all(), $this->rules, $this->messages);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}

		$fields = $validator->validated();

		// Upload article image
		$current_user = Auth::user();

		if (isset($request->image)) {
			$imageName = md5(time()) . $current_user->id . '.' . $request->image->extension();
			$request->image->move(public_path('images/articles'), $imageName);
		}

		// Turn the 'featured' field value into a tiny integer
		$fields['featured'] = $request->get('featured') == 'on' ? 1 : 0;

		// If no image is uploaded, use default.jpg
		$fields['image'] = null == $request->image ? 'default.jpg' : $imageName;

		// Data to be added
		$form_data = [
			'user_id' => Auth::user()->id,
			'category_id' => $fields['category_id'],
			'title' => $fields['title'],
			'slug' => Str::slug($fields['title'], '-'),
			'short_description' => $fields['short_description'],
			'content' => $fields['content'],
			'featured' => $fields['featured'],
			'image' => $fields['image']
		];

		// Insert data in the 'articles' table
		$query = Article::create($form_data);

		if ($query) {
			return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $form_data['title'] . '" was added');
		} else {
			return redirect()->back()->with('error', 'Adding article failed');
		}

	}

	public function edit($id) {
		$article = Article::find($id);
		return view('dashboard/edit-article',
			['categories' => $this->categories(),
			'article' => $article]
		);
	}

	public function update(Request $request, $id) {
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
		$article->featured = $request->get('featured') == 'on' ? 1 : 0;
		$article->image = $request->get('image') == 'default.jpg' ? 'default.jpg' : $imageName;
		$article->content = $request->get('content');

		$article->save();

		return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $article->title . '" was updated');

	}

	public function delete($id) {
		$article = Article::find($id);
		$article->delete();
		return redirect()->back()->with('success', 'The article titled "' . $article->title . '" was deleted');
	}
}
