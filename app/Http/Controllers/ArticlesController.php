<?php

namespace App\Http\Controllers;
use App\Models\Article;

class ArticlesController extends FrontendController {

	public function index() {
		// All articles
		$articles = Article::orderBy('id','desc')->paginate(12);
		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'articles' => $articles
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
