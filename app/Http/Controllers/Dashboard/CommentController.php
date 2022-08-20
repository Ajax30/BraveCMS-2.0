<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

	public function delete(Comment $comment) {
		$comment->delete();
		return redirect()->back()->with('success', 'The comment was deleted');
	}
}
