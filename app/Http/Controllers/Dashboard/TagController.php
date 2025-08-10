<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
  private $rules = [
    'name' => ['required', 'string', 'max:255', 'unique:tags'],
  ];

  private $messages = [
    'name.required' => 'Please provide a tag name',
    'name.unique' => 'A tag with this name already exists'
  ];

  public function index()
  {
    $tag_count = Tag::count();
    $tags = Tag::orderBy('name')->paginate(10);
    return view(
      'dashboard/tag-list',
      [
        'tags' => $tags,
        'tag_count' => $tag_count
      ]
    );
  }

  public function create()
  {
    return view('dashboard/tag-add');
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
      'name' => $fields['name']
    ];

    // Insert data in the 'articles' table
    $query = Tag::create($form_data);

    if ($query) {
      return redirect()->route('dashboard.tags')->with('success', 'The tag named "' . $form_data['name'] . '" was added');
    } else {
      return redirect()->back()->with('error', 'Adding a new tag failed');
    }
  }

  public function edit($id)
  {
    $tag = Tag::findOrFail($id);
    return view(
      'dashboard/tag-edit',
      ['tag' => $tag]
    );
  }

  public function update(Request $request, $id)
  {
    $tag = Tag::findOrFail($id);

    $rules = [
      'name' => ['required', 'string', 'max:255', Rule::unique('tags')->ignore($tag->id)],
    ];

    $validator = Validator::make($request->all(), $rules, $this->messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $tag->name = $request->get('name');
    $currentPage = $request->get('page', 1);

    $tag->save();

    return redirect()
      ->route('dashboard.tags', ['page' => $currentPage])
      ->with('success', 'The tag was renamed to "' . $tag->name . '"');
  }
  
  public function delete($id)
  {
    $tag = Tag::findOrFail($id);

    // Check if the tag is attached to any articles
    if ($tag->articles()->exists()) {
      return redirect()->back()->with('error', 'The tag "' . $tag->name . '" cannot be deleted because it is attached to one or more articles.');
    }

    // If not attached, delete it
    $tag->delete();

    return redirect()->route('dashboard.tags')->with('success', 'The tag named "' . $tag->name . '" was deleted');
  }
}
