<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Settings;

class ArticlesController extends FrontendController {

	public function index() {
		// All articles
		$articles = Article::all();
		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'title' => $this->site_settings['site_name'] . ' | ' . $this->site_settings['tagline'],
				'articles' => $articles
			]
		);
	}

	public function show($slug) {
		// Single article
		$article = Article::where('slug', $slug)->first();
		return view('themes/' . $this->theme_directory . '/templates/single', 
			[
				'title' => $this->site_settings['site_name'] . ' | ' . $article['title'],
				'article' => $article
			]
		);
	}
	
}
