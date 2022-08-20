<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function categories() {
		return ArticleCategory::all();
	}

	public function index(Request $request) {
		// Articles count
		$article_count = Article::count();

		$per_page = 10;
    
		// Search query
		$qry = $request->input('search');

		$articles = Article::search($qry)
												->orderBy('id', 'desc')
												->paginate($per_page)
                        ->onEachSide(1);


		return view('dashboard/articles',
			[
				'articles' => $articles,
				'article_count' => $article_count
			]
		);
	}

	public function create() {
		// Load the view and populate the form with categories
		return view('dashboard/add-article',
			['categories' => $this->categories()]
		);
	}

	public function save(ArticleRequest $request) {
		$fields = $request->validated();

		// Upload article image
		$current_user = Auth::user();

		if (isset($request->image)) {
			$imageName = md5(time()) . $current_user->id . '.' . $request->image->extension();
			$request->image->move(public_path('images/articles'), $imageName);
		}

		// If no image is uploaded, use default.jpg
		$fields['image'] = null == $request->image ? 'default.jpg' : $imageName;

		// Turn the 'featured' field value into a tiny integer
		$fields['featured'] = $request->get('featured') == 'on' ? 1 : 0;

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

	public function edit(Article $article) {
		return view('dashboard/edit-article',
			['categories' => $this->categories(),
			'article' => $article]
		);
	}

	public function update(ArticleRequest $request, Article $article) {
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

		$article->save();

		return redirect()->route('dashboard.articles')->with('success', 'The article titled "' . $article->title . '" was updated');

	}

	public function delete(Article $article) {
		$article->delete();
		return redirect()->back()->with('success', 'The article titled "' . $article->title . '" was deleted');
	}
}
