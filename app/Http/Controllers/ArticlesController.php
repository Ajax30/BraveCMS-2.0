<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends FrontendController {

	public function index(Request $request) {

		
		// Articles per page
		$per_page = 12;

		// Search query
		$qry = $request->input('search');

		$articles = Article::where('title', 'like', '%' . $qry . '%')
												->orWhere('short_description', 'like', '%' . $qry . '%')
												->orWhere('content', 'like', '%' . $qry . '%')
												->orderBy('id', 'desc')
												->paginate($per_page);

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
				'articles' => $articles,
				'article_count' => $article_count ?? null
			]
		);
	}

	public function show($slug) {
		// Single article
		$article = Article::where('slug', $slug)->first();
		return view('themes/' . $this->theme_directory . '/templates/single', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'article' => $article
			]
		);
	}
	
}
