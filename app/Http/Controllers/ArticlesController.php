<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ArticleCategory;
use App\Models\Article;

class ArticlesController extends FrontendController {

	// Articles per page
	protected $per_page = 12;

	public function index(Request $request) {

		// Search query
		$qry = $request->input('search');

		$articles = Article::where('title', 'like', '%' . $qry . '%')
												->orWhere('short_description', 'like', '%' . $qry . '%')
												->orWhere('content', 'like', '%' . $qry . '%')
												->orderBy('id', 'desc')
												->paginate($this->per_page);

		// Search results count
		if ($request->input('search')){
			$article_count = Article::where('title', 'like', '%' . $qry . '%')
												->orWhere('short_description', 'like', '%' . $qry . '%')
												->orWhere('content', 'like', '%' . $qry . '%')
												->count();
		}		

		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'theme_directory' => $this->theme_directory,
				'search_query' => $qry,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'pages' => $this->pages,
				'categories' => $this->article_categories,
				'articles' => $articles,
				'article_count' => $article_count ?? null
			]
		);
	}

	public function category($category_id) {
		$category = ArticleCategory::firstWhere('id', $category_id);
		$articles = Article::where('category_id', $category_id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'pages' => $this->pages,
				'categories' => $this->article_categories,
				'category' => $category,
				'articles' => $articles
			]
		);
	}

	public function author($user_id) {
		$author = User::firstWhere('id', $user_id);
		$articles = Article::where('user_id', $user_id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'pages' => $this->pages,
				'categories' => $this->article_categories,
				'author' => $author,
				'articles' => $articles
			]
		);
	}

	public function show($slug) {
		// Single article
		$article = Article::firstWhere('slug', $slug);
		return view('themes/' . $this->theme_directory . '/templates/single', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'pages' => $this->pages,
				'categories' => $this->article_categories,
				'article' => $article
			]
		);
	}
	
}
