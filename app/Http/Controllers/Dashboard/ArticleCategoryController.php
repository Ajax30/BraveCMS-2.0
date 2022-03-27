<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
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
      $categories = ArticleCategory::paginate(10);
      return view('dashboard/article-categories',
        ['categories' => $categories]
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
     echo "Edit category";
    }

    public function ediupaftet($id) {
      echo "Update category";
     }

    public function delete($id) {
      $article = ArticleCategory::find($id);
      $article->delete();
      return redirect()->back()->with('success', 'The category "' . $article->title . '" was deleted');
    }
}
