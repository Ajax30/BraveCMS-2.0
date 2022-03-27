<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index() {
        $categories = ArticleCategory::paginate(10);
        return view('dashboard/article-categories',
          ['categories' => $categories]
        );
    }

    public function edit($id) {
     echo "Category";
    }

    public function delete($id) {
      $article = ArticleCategory::find($id);
      $article->delete();
      return redirect()->back()->with('success', 'The category "' . $article->title . '" was deleted');
    }
}
