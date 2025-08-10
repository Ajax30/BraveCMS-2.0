<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{

  public function index(Request $request)
  {
    // Total number of comments
    $comments_count =  Comment::count();

    // Total number of unapproved comments
    $unapproved_comments_count = Comment::where('approved', 0)->count();

    // Comments per page
    $per_page = 10;

    // Comments filters
    $filters = $filter = [
      (object)[
        'value' => 'all',
        'label' => 'All comments'
      ],
      (object)[
        'value' => 0,
        'label' => 'Unapproved'
      ],
      (object)[
        'value' => 1,
        'label' => 'Approved'
      ]
    ];

    // Filter comments
    $active_filter = $request->query('filter', 'all');
    
    if (!in_array($active_filter, ['all', '0', '1'])) {
      $active_filter = 'all';
    }

    $comments = Comment::orderBy('id', 'desc')
      ->when($active_filter !== 'all', function ($query) use ($active_filter) {
        return $query->where('approved', $active_filter);
      })
      ->paginate($per_page)->onEachSide(1); 

    return view(
      'dashboard/article-comments',
        [
          'per_page' => $per_page,
          'current_page' => $comments->currentPage(),
          'comments' => $comments,
          'comments_count' => $comments_count,
          'unapproved_comments_count' => $unapproved_comments_count,
          'filters' => $filters,
          'active_filter' => $active_filter,
        ]
      );
  }

  public function delete($id)
  {
    $comment = Comment::find($id);
    $comment->replies()->delete();
    $comment->delete();
    return redirect()->route('dashboard.comments')->with('success', 'The comment was deleted');
  }

  public function approve($id)
  {
    Comment::find($id)->update(['approved' => 1]);
    return redirect()->back()->with('success', 'The comment was approved');
  }

  public function unapprove($id)
  {
    Comment::find($id)->update(['approved' => 0]);
    return redirect()->back()->with('success', 'The comment was unapproved');
  }
}
