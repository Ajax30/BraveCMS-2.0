<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  private $rules = [
    'title' => 'required|string|max:190',
    'content' => 'required|string'
  ];

  private $messages = [
    'title.required' => 'Please provide a title for the article',
    'content.required' => 'Please add content'
  ];

  public function index()
  {
    // Total number of pages
    $page_count =  Page::count();

    // Items per page
    $per_page = 10;

    // The Pages
    $pages = Page::orderBy('id', 'asc')->paginate($per_page);

    return view(
      'dashboard/pages',
      [
        'per_page' => $per_page,
        'current_page' => $pages->currentPage(),
        'pages' => $pages,
        'pages_count' => $page_count
      ]
    );
  }

  public function create()
  {
    return view('dashboard/add-page');
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $fields = $validator->validated();

    // Data to be added
    $form_data = [
      'title' => $fields['title'],
      'content' => $fields['content']
    ];

    // Insert data in the 'pages' table
    $query = Page::create($form_data);

    if ($query) {
      return redirect()->route('dashboard.pages')->with('success', 'The page titled "' . $form_data['title'] . '" was added');
    } else {
      return redirect()->back()->with('error', 'Adding a new page failed');
    }
  }

  public function edit($id)
  {
    $page = Page::findOrFail($id);
    return view(
      'dashboard/edit-page',
      ['page' => $page]
    );
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), $this->rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    $page = Page::findOrFail($id);
    $page->title = $request->get('title');
    $page->content = $request->get('content');
    $page->save();

    $currentPage = $request->get('page', 1);

    return redirect()
      ->route('dashboard.pages', ['page' => $currentPage])
      ->with('success', 'The page titled "' . $page->title . '" was updated');
  }

  public function delete($id)
  {
    $page = Page::findOrFail($id);
    $page->delete();
    return redirect()->route('dashboard.pages')->with('success', 'The page titled "' . $page->title . '" was deleted');
  }
}
