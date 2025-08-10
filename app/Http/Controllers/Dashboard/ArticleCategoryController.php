<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    
  private $rules = [
		'name' => 'required|string|max:255'
	];

	private $messages = [
		'name.required' => 'Please provide a category name'
	];
  
  public function index() {
		$category_count = ArticleCategory::count();
		$categories = ArticleCategory::orderBy('id')->paginate(10);
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

  public function save(Request $request) {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();

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

  public function edit($id) {
    $category = ArticleCategory::find($id);
    return view('dashboard/edit-category',
      ['category' => $category]
    );
  }

  public function update(Request $request, $id) {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    } else {
      $category = ArticleCategory::find($id);
      $category->name = $request->get('name');
      $currentPage = $request->get('page', 1);

      $category->save();

      return redirect()
      ->route('dashboard.categories', ['page' => $currentPage])
      ->with('success', 'The category was renamed to "' . $category->name . '"');
    }
  }

  public function delete($id) {
    // Check if there are articles in category
    $canDelete = Article::where('category_id', $id)->count() == 0;
    $category = ArticleCategory::findOrFail($id);

    if ($canDelete) {
      $category->delete();
      return redirect()->route('dashboard.categories')->with('success', 'The category "' . $category->name . '" was deleted');
    } else {
      return redirect()->back()->with('error', 'The category "' . $category->name . '" has articles!');
    }
  }
}
