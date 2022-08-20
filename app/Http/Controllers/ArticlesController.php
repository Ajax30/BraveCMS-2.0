<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\Comment;

class ArticlesController extends FrontendController {

	// Articles per page
	protected $per_page = 12;

	public function index(Request $request) {

		// Search query
		$qry = $request->input('search');

		$articlesQuery = Article::search($qry);

		// Search results count
		if ($qry) {
			$article_count = $articlesQuery->count();
		}	

		$articles = $articlesQuery->orderBy('id', 'desc')->paginate($this->per_page);	
		$featured_articles = Article::where('featured', 1)->orderBy('id', 'desc')->get();

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'search_query' => $qry,
				'articles' => $articles,
				'featured_articles' => $featured_articles,
				'article_count' => $article_count ?? null
			])
		);
	}

	public function category(ArticleCategory $category) {
		$articles = Article::where('category_id', $category->id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'category' => $category,
				'articles' => $articles
				])
			);
	}

	public function author(User $user) {
		$articles = Article::where('user_id', $user->id)->orderBy('id', 'desc')->paginate($this->per_page);

		return view('themes/' . $this->theme_directory . '/templates/index', 
			array_merge($this->data, [
				'author' => $user,
				'articles' => $articles
				])
			);
	}

	public function show(Article $article) {
		// Single article
		$old_article = Article::where('id', '<', $article->id)->orderBy('id', 'DESC')->first();
		$new_article = Article::where('id', '>', $article->id)->orderBy('id', 'ASC')->first();
		$comments = Comment::where('article_id', $article->id)->orderBy('id', 'desc')->get();

		return view('themes/' . $this->theme_directory . '/templates/single', 
			array_merge($this->data, [
				'categories' => $this->article_categories,
				'article' => $article,
				'old_article' => $old_article,
				'new_article' => $new_article,
				'comments' => $comments,
				'tagline' => $article->title,
				])
			);
	}
	
}
