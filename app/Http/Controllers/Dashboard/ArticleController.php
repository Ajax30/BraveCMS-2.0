<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index() {
		$articles = Article::paginate(10);

		return view('dashboard/articles',
			['articles' => $articles]
		);
	}
}
