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
  protected $per_page = 12;
  protected $comments_per_page = 10;
  protected $comments_orderby_direction = 'desc';

  public function index(Request $request)
  {
    if (Settings::count() == 0) {
      return redirect()->route('dashboard');
    }

    $qry = $request->input('search');
    $articlesQuery = Article::visible();

    if (!empty($qry)) {
      $articlesQuery->where(function ($q) use ($qry) {
        $q->where('title', 'like', '%' . $qry . '%')
          ->orWhere('short_description', 'like', '%' . $qry . '%')
          ->orWhere('content', 'like', '%' . $qry . '%');
      });
      $article_count = $articlesQuery->count();
    }

    $articles = $articlesQuery->paginate($this->per_page);

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

    if ($category) {
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
    }

    return redirect('/404');
  }

  public function author($user_id)
  {
    $author = User::firstWhere('id', $user_id);

    if ($author) {
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
    }

    return redirect('/404');
  }

  public function tag($tag_id)
  {
    $tag = Tag::firstWhere('id', $tag_id);

    if ($tag) {
      $articles = Article::visible()
        ->whereHas('tags', function (Builder $query) use ($tag) {
          $query->where('id', $tag->id);
        })
        ->paginate($this->per_page);

      return view(
        'themes/' . $this->theme_directory . '/templates/index',
        array_merge($this->data, [
          'tag'      => $tag,
          'articles' => $articles
        ])
      );
    }

    return redirect('/404');
  }

  public function show($slug)
  {
    $article = Article::visible()->where('slug', $slug)->firstOrFail();

    // Video navigation defaults
    $prev_video_article = null;
    $next_video_article = null;

    // View counter
    $sessionKey = 'article_viewed_' . $article->id;
    $lastViewedAt = session($sessionKey);

    if (!$lastViewedAt || Carbon::createFromTimestamp($lastViewedAt)->diffInMinutes(now()) >= 60) {
      $article->increment('views');
      session()->put($sessionKey, now()->timestamp);
    }

    // Previous & Next article
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

    // Previous & Next article with VIDEO
    if (!empty($article->video)) {

      $prev_video_article = Article::visible()
        ->whereNotNull('video')
        ->where('video', '!=', '')
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

      $next_video_article = Article::visible()
        ->whereNotNull('video')
        ->where('video', '!=', '')
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
    }

    if ($this->is_infinitescroll) {

      $comments = $this->get_commentQuery($article->id, $this->comments_per_page, 0)
        ->whereNull('parent_id')
        ->with(['user', 'replies.user'])
        ->get();

      $comments_count = $this->get_commentQuery($article->id)->count();
    } else {

      $comments = $this->get_commentQuery($article->id)
        ->whereNull('parent_id')
        ->with(['user', 'replies.user'])
        ->get();

      $comments_count = $this->get_commentQuery($article->id)->count();
    }

    return view(
      'themes/' . $this->theme_directory . '/templates/single',
      array_merge($this->data, [
        'categories'          => $this->article_categories,
        'article'             => $article,
        'old_article'         => $old_article,
        'new_article'         => $new_article,
        'prev_video_article'  => $prev_video_article,
        'next_video_article'  => $next_video_article,
        'comments'            => $comments,
        'comments_count'      => $comments_count,
        'comments_per_page'   => $this->comments_per_page,
        'tagline'             => $article->title,
        'is_infinitescroll'   => $this->is_infinitescroll
      ])
    );
  }

  public function get_comments_ajax(Request $request)
  {
    if (!$request->ajax()) exit();

    $article_id  = $request->post('article_id');
    $page_number = $request->post('page');
    $offset      = $this->comments_per_page * $page_number;
    $more_comments_to_display = true;

    $data['comments'] = $this->get_commentQuery($article_id, $this->comments_per_page, $offset)
      ->whereNull('parent_id')
      ->with(['user', 'replies.user'])
      ->get();

    $content = '';
    if ($data['comments']->count()) {
      $content .= view(
        'themes/' . $this->theme_directory . '/partials/comments-list',
        array_merge($data, [
          'is_infinitescroll' => $this->is_infinitescroll,
          'theme_directory'   => $this->theme_directory,
          'article_id'        => $article_id
        ])
      );
    } else {
      $more_comments_to_display = false;
    }

    echo json_encode([
      'html' => $content,
      'page' => $page_number,
      'more_comments_to_display' => $more_comments_to_display,
      'article_id' => $article_id
    ]);
    exit();
  }

  private function get_commentQuery(int $article_id, int $limit = 0, int $offset = 0): object
  {
    $commentQuery = Comment::where(['article_id' => $article_id, 'approved' => 1])
      ->orderBy('id', $this->comments_orderby_direction)
      ->with(['user', 'replies' => function ($query) {
        $query->where('approved', 1)
          ->orderBy('id', 'asc')
          ->with('user');
      }]);

    if ($offset > 0) $commentQuery = $commentQuery->offset($offset);
    if ($limit > 0)  $commentQuery = $commentQuery->limit($limit);

    return $commentQuery;
  }

  public function add_comment(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      ['msg' => 'required'],
      ['msg.required' => 'Please enter a message']
    );

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator->errors())
        ->withInput()
        ->with('error', 'Please correct the errors below');
    }

    $fields = $validator->validated();

    $comment = [
      'user_id'    => Auth::id(),
      'article_id' => $request->get('article_id'),
      'parent_id'  => $request->get('parent_id') ?: null,
      'body'       => $fields['msg'],
      'approved'   => 0
    ];

    $query = Comment::create($comment);

    if ($query) {
      if ($request->expectsJson()) {
        return response()->json(['status' => 'success', 'message' => 'Your comment is pending.']);
      } else {
        return redirect()->back()->with([
          'success' => 'Your comment is pending.',
          'success_comment_id' => $request->get('parent_id')
        ]);
      }
    }

    if ($request->expectsJson()) {
      return response()->json(['status' => 'fail', 'message' => 'Adding comment failed.']);
    }

    return redirect()->back()->with('error', 'Adding comment failed.');
  }

  public function update_comment(Request $request, $id)
  {
    $comment = Comment::findOrFail($id);

    if ($comment->user_id === Auth::id()) {
      $comment->body = $request->get('msg');
      $comment->approved = 0;
      $comment->save();

      if ($request->expectsJson()) {
        return response()->json([
          'status' => 'success',
          'message' => 'The comment was updated.',
          'body' => $request->get('msg')
        ]);
      }

      return redirect()->back()->with('success', 'The comment was updated.');
    }
    abort(403);
  }

  public function delete_comment($id)
  {
    $comment = Comment::findOrFail($id);

    if ($comment->user_id === Auth::id()) {
      $comment->replies()->delete();
      $comment->delete();

      if (request()->expectsJson()) {
        return response()->json(['status' => 'success', 'message' => 'The comment was deleted.']);
      }

      return redirect()->back()->with('success', 'The comment was deleted.');
    }
    abort(403);
  }
}
