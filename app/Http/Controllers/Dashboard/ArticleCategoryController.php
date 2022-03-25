<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index() {
        $categories = ArticleCategory::all();

        return view('dashboard/article-categories',
            ['categories' => $categories]
        );
    }
}
