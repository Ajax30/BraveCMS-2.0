<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Settings;
use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Comment;

class ArticlesController extends FrontendController
{
  // Articles per page
  protected $per_page = 12;
  protected $comments_per_page = 10;
  protected $comments_orderby_direction = 'desc';

  public function index(Request $request)
  {
    // If there are no site settings, redirect to Dashboard
    if (Settings::count() == 0) {
      return redirect()->route('dashboard');
    }

    // Search query
    $qry = $request->input('search');

    $articlesQuery = Article::visible();

    // Apply search only if query is not empty
    if (!empty($qry)) {
      $articlesQuery->where(function ($q) use ($qry) {
        $q->where('title', 'like', '%' . $qry . '%')
          ->orWhere('short_description', 'like', '%' . $qry . '%')
          ->orWhere('content', 'like', '%' . $qry . '%');
      });
      $article_count = $articlesQuery->count();
    }

    // Homepage articles 
    $articles = $articlesQuery->paginate($this->per_page);

    // Featured articles 
    $featured_articles = Article::visible()
      ->where('featured', 1)
      ->get();

    return view(
      'themes/' . $this->theme_directory . '/templates/index',
      array_merge($this->data, [
        'search_query'      => $qry,
        'articles'          => $articles,
        'featured_articles' => $featured_articles,
        'article_count'     => $article_count ?? null
      ])
    );
  }

  public function category($category_id)
  {
    $category = ArticleCategory::firstWhere('id', $category_id);

    if (isset($category)) {
      $articles = Article::visible()
        ->where('category_id', $category_id)
        ->paginate($this->per_page); 

      return view(
        'themes/' . $this->theme_directory . '/templates/index',
        array_merge($this->data, [
          'category' => $category,
          'articles' => $articles
        ])
      );
    } else {
      return redirect('/404');
    }
  }

  public function author($user_id)
  {
    $author = User::firstWhere('id', $user_id);

    if (isset($author)) {
      $articles = Article::visible()
        ->where('user_id', $user_id)
        ->paginate($this->per_page); 

      return view(
        'themes/' . $this->theme_directory . '/templates/index',
        array_merge($this->data, [
          'author'   => $author,
          'articles' => $articles
        ])
      );
    } else {
      return redirect('/404');
    }
  }

  public function tag($tag_id)
  {
    $tag = Tag::firstWhere('id', $tag_id);

    if (isset($tag)) {
      $articles = Article::visible()
        ->whereHas('tags', function (Builder $query) use ($tag) {
          $query->where('id', $tag->id);
        })
        ->paginate($this->per_page); 

      return view(
        'themes/' . $this->theme_directory . '/templates/index',
        array_merge($this->data, [
          'tag'   => $tag,
          'articles' => $articles
        ])
      );
    } else {
      return redirect('/404');
    }
  }

  public function show($slug)
  {
    // Fetch the article by slug or fail
    $article = Article::visible()->where('slug', $slug)->firstOrFail();

    // Throttle views: increment only if not viewed within the past 60 minutes
    $sessionKey = 'article_viewed_' . $article->id;
    $lastViewedAt = session($sessionKey);

    if (!$lastViewedAt || Carbon::createFromTimestamp($lastViewedAt)->diffInMinutes(now()) >= 60) {
      $article->increment('views');
      session()->put($sessionKey, now()->timestamp);
    }

    // Older article
    $old_article = Article::visible()
      ->where(function ($q) use ($article) {
        $q->where('published_at', '<', $article->published_at)
          ->orWhere(function ($q2) use ($article) {
            $q2->where('published_at', $article->published_at)
              ->where('id', '<', $article->id);
          });
      })
      ->orderBy('published_at', 'desc')
      ->orderBy('id', 'desc')
      ->first();

    // Newer article
    $new_article = Article::visible()
      ->where(function ($q) use ($article) {
        $q->where('published_at', '>', $article->published_at)
          ->orWhere(function ($q2) use ($article) {
            $q2->where('published_at', $article->published_at)
              ->where('id', '>', $article->id);
          });
      })
      ->orderBy('published_at', 'asc')
      ->orderBy('id', 'asc')
      ->first();

    // Comments logic
    $commentsQuery = $this->get_commentQuery($article->id);
    $comments_count = $commentsQuery->count();

    if (boolval($this->is_infinitescroll)) {
      $comments = $commentsQuery->paginate($this->comments_per_page);
    } else {
      $comments = $commentsQuery->get();
    }

    return view(
      'themes/' . $this->theme_directory . '/templates/single',
      array_merge($this->data, [
        'categories'        => $this->article_categories,
        'article'           => $article,
        'old_article'       => $old_article,
        'new_article'       => $new_article,
        'comments'          => $comments,
        'comments_count'    => $comments_count,
        'comments_per_page' => $this->comments_per_page,
        'tagline'           => $article->title,
        'is_infinitescroll' => $this->is_infinitescroll
      ])
    );
  }

  /**
   * AJAX Call for Loading extra comments
   *
   * @param Request $request
   *
   * @return void
   */
  public function get_comments_ajax(Request $request)
  {
    if (!$request->ajax()) {
      exit();
    }

    $more_comments_to_display = TRUE;
    $article_id  = $request->post('article_id');
    $page_number = $request->post('page');
    $offset      = $this->comments_per_page * $page_number;

    $data['comments'] = $this->get_commentQuery($article_id, $this->comments_per_page, $offset)->get();
    $content          = '';
    if ($data['comments']->count()) {
      $content .= view(
        'themes/' . $this->theme_directory . '/partials/comments-list',
        array_merge($data, [
          'is_infinitescroll' => $this->is_infinitescroll,
          'theme_directory' => $this->theme_directory,
          'article_id' => $article_id
        ])
      );
    } else {
      $more_comments_to_display = FALSE;
    }
    echo json_encode([
      'html' => $content,
      'page' => $page_number,
      'more_comments_to_display' => $more_comments_to_display,
      'article_id' => $article_id
    ]);
    exit();
  }

  /**
   * get_commentQuery
   *
   * @param int $article_id
   * @param int $limit
   * @param int $offset
   *
   * @return object
   */
  private function get_commentQuery(int $article_id, int $limit = 0, int $offset = 0): object
  {
    $commentQuery = Comment::where(['article_id' => $article_id, 'approved' => 1])
      ->orderBy('id', $this->comments_orderby_direction)
      ->with('replies', function ($query) {
        $query->where('approved', 1);
      });

    if ($offset > 0) {
      $commentQuery = $commentQuery->offset($offset);
    }
    if ($limit > 0) {
      $commentQuery = $commentQuery->limit($limit);
    }

    return $commentQuery;
  }

  public function add_comment(Request $request)
  {
    $rules = ['msg' => 'required'];
    $messages = ['msg.required' => 'Please enter a message'];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator->errors())
        ->withInput()
        ->with('error', 'Please correct the errors below');
    }

    $fields = $validator->validated();

    $comment = [
      'user_id'    => Auth::user()->id,
      'article_id' => $request->get('article_id'),
      'parent_id' => $request->get('parent_id'),
      'body'       => $fields['msg'],
      'approved'   => 0
    ];

    // Insert comment in the 'comments' table
    $query = Comment::create($comment);

    if ($query) {
      if ($request->expectsJson()) {
        return response()->json(['status' => 'success', 'message' => 'Your comment is pending.']);
      } else {
        return redirect()->back()->with([
          'success' => 'Your comment is pending.',
          'success_comment_id' => $request->get('parent_id'),
        ]);
      }
    }

    if (!$query) {
      if ($request->expectsJson()) {
        return response()->json(['status' => 'fail', 'message' => 'Adding comment failed.']);
      } else {
        return redirect()->back()->with('error', 'Adding comment failed.');
      }
    }
  }

  public function update_comment(Request $request, $id)
  {
    $comment = Comment::find($id);

    if ($comment->user_id === auth()->user()->id) {
      $comment->body = $request->get('msg');
      $comment->approved = 0;
      $comment->save();

      if ($request->expectsJson()) {
        return response()->json([
          'status' => 'success',
          'message' => 'The comment was updated.',
          'body' => $request->get('msg')
        ]);
      } else {
        return redirect()->back()->with('success', 'The comment was updated.');
      }
    }
  }

  public function delete_comment($id)
  {
    $comment = Comment::find($id);

    if ($comment->user_id === auth()->user()->id) {
      $comment->replies()->delete();
      $comment->delete();
      return redirect()->back()->with('success', 'The comment was deleted');
    }
  }
}
