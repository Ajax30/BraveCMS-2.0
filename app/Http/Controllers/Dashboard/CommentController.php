<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
  
	public function index() {
		// Total number of comments
		$comments_count =  Comment::count();

		// Comments per page
		$per_page = 10;

		// The comments
		$comments = Comment::orderBy('id', 'desc')->paginate($per_page)->onEachSide(1);

		return view('dashboard/article-comments',
			[
				'per_page' => $per_page,
				'current_page' => $comments->currentPage(),
				'comments' => $comments,
				'comments_count' => $comments_count
			]
		);
	}

	public function delete($id) {
		Comment::find($id)->delete();
		return redirect()->back()->with('success', 'The comment was deleted');
	}

  public function approve($id) {
		Comment::find($id)->update(['approved' => 1]);
		return redirect()->back()->with('success', 'The comment was approved');
	}

  public function unapprove($id) {
		Comment::find($id)->update(['approved' => 0]);
		return redirect()->back()->with('success', 'The comment was unapproved');
	}

}
