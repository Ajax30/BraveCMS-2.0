<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
  public function index() {
		$category_count = ArticleCategory::count();
		$categories = ArticleCategory::paginate(10);
		return view('dashboard/article-categories',
			[
				'categories' => $categories,
				'category_count' => $category_count
			]
		);
	}

  public function create() {
    return view('dashboard/add-category');
  }

  public function save(ArticleCategoryRequest $request) {
    $fields = $request->validated();

    // Data to be added
    $form_data = [
      'user_id' => Auth::user()->id,
      'name' => $fields['name']
    ];

    // Insert data in the 'articles' table
    $query = ArticleCategory::create($form_data);

    if ($query) {
      return redirect()->route('dashboard.categories')->with('success', 'The category named "' . $form_data['name'] . '" was added');
    } else {
      return redirect()->back()->with('error', 'Adding a new category failed');
    }
  }

  public function edit(ArticleCategory $category) {
    return view('dashboard/edit-category',
      ['category' => $category]
    );
  }

  public function update(ArticleCategoryRequest $request, ArticleCategory $category) {
    $category->update($request->validated());

    return redirect()->route('dashboard.categories')->with('success', 'The category named "' . $category->name . '" was updated');
  }

  public function delete(ArticleCategory $category) {
    // Check if there are articles in category
    $canDelete = Article::where('category_id', $category->id)->count() == 0;

    if ($canDelete) {
      $category->delete();
      return redirect()->back()->with('success', 'The category "' . $category->name . '" was deleted');
    } else {
      return redirect()->back()->with('error', 'The category "' . $category->name . '" has articles!');
    }
  }
}
