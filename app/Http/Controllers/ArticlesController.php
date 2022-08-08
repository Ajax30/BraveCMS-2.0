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

		$articlesQuery = Article::where('title', 'like', '%' . $qry . '%')
											->orWhere('short_description', 'like', '%' . $qry . '%')
											->orWhere('content', 'like', '%' . $qry . '%');

		// Search results count
		if ($qry) {
			$article_count = $articlesQuery->count();
		}	

		$articles = $articlesQuery->orderBy('id', 'desc')->paginate($this->per_page);	

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'search_query' => $qry,
				'articles' => $articles,
				'article_count' => $article_count ?? null
			])
		);
	}

	public function category($category_id) {
		$category = ArticleCategory::firstWhere('id', $category_id);
		$articles = Article::where('category_id', $category_id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'category' => $category,
				'articles' => $articles
				])
			);
	}

	public function author($user_id) {
		$author = User::firstWhere('id', $user_id);
		$articles = Article::where('user_id', $user_id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'author' => $author,
				'articles' => $articles
				])
			);
	}

	public function show($slug) {
		// Single article
		$article = Article::firstWhere('slug', $slug);
		return view('themes/' . $this->theme_directory . '/templates/single', 
			array_merge($this->data, [
				'categories' => $this->article_categories,
				'article' => $article,
				'tagline' => $article->title,
				])
			);
	}
	
}
