<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
		$comments = Comment::orderBy('id', 'desc')->paginate(10);

		return view('dashboard/article-comments',
			['comments' => $comments]
		);
	}

	public function delete($id) {
		$article = Comment::find($id);
		$article->delete();
		return redirect()->back()->with('success', 'The comment was deleted');
	}
}
