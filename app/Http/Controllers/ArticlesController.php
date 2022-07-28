<?php

namespace App\Http\Controllers;
use App\Models\Article;

class ArticlesController extends FrontendController {


	public function index() {
		$articles = Article::all();
		return view('themes/' . $this->theme_directory . '/templates/index', 
			[
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'articles' => $articles
			]
		);
	}

	public function show($slug) {
		$article = Article::where('slug', $slug)->first();
		return view('themes/' . $this->theme_directory . '/templates/single', 
			[
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'article' => $article
			]
		);
	}

}
