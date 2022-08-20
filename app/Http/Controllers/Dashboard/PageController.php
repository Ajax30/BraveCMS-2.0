<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index() {
		// Total number of pages
		$page_count =  Page::count();

		// Items per page
		$per_page = 10;

		// The Pages
		$pages = Page::orderBy('id', 'asc')->paginate($per_page);

		return view('dashboard/pages',
			[
				'per_page' => $per_page,
				'current_page' => $pages->currentPage(),
				'pages' => $pages,
				'pages_count' => $page_count
			]
		);
	}

    public function create() {
			return view('dashboard/add-page');
    }

    public function save(PageRequest $request) {	
			$payload = $request->validated();

			$query = Page::create($payload);
	
			if ($query) {
				return redirect()->route('dashboard.pages')->with('success', 'The page titled "' . $payload['title'] . '" was added');
			} else {
				return redirect()->back()->with('error', 'Adding a new page failed');
			}
		}

    public function edit(Page $page) {
			return view('dashboard/edit-page',
				['page' => $page]
			);
    }

    public function update(PageRequest $request, Page $page) {
			$page->update($request->validated());

			return redirect()->route('dashboard.pages')->with('success', 'The page titled "' . $page->title . '" was updated');
    }

		public function delete(Page $page) {
			$page->delete();
			return redirect()->back()->with('success', 'The page titled "' . $page->title . '" was deleted');
		}
}
