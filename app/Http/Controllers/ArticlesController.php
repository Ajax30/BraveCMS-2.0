<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Settings;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\Comment;

class ArticlesController extends FrontendController {

	// Articles per page
	protected $per_page = 12;
	protected $comments_per_page = 10;
	/** @todo -10- Do Need to check this is set correctly to 'asc' or 'desc'
	 * This will be picked during development if we make a typo     */
	protected $comments_orderby_direction = 'asc'; // Can be either asc or desc.

	public function index( Request $request ) {

    // If there are no site settings, redirect to Dashboard
    if (Settings::count() == 0) {
      return redirect()->route('dashboard');
    }

		// Search query
		$qry = $request->input( 'search' );

		$articlesQuery = Article::where( 'title', 'like', '%' . $qry . '%' )
		                        ->orWhere( 'short_description', 'like', '%' . $qry . '%' )
		                        ->orWhere( 'content', 'like', '%' . $qry . '%' );
		// Search results count
		if ( $qry ) {
			$article_count = $articlesQuery->count();
		}

		$articles          = $articlesQuery->orderBy( 'id', 'desc' )->paginate( $this->per_page );
		$featured_articles = Article::where( 'featured', 1 )->orderBy( 'id', 'desc' )->get();

		return view( 'themes/' . $this->theme_directory . '/templates/index',
		             array_merge( $this->data, [
			             'search_query'      => $qry,
			             'articles'          => $articles,
			             'featured_articles' => $featured_articles,
			             'article_count'     => $article_count ?? NULL
		             ] )
		);
	}

	public function category( $category_id ) {
		$category = ArticleCategory::firstWhere( 'id', $category_id );
		$articles = Article::where( 'category_id', $category_id )->orderBy( 'id', 'desc' )->paginate( $this->per_page );

		return view( 'themes/' . $this->theme_directory . '/templates/index',
		             array_merge( $this->data, [
			             'category' => $category,
			             'articles' => $articles
		             ] )
		);
	}

	public function author( $user_id ) {
		$author   = User::firstWhere( 'id', $user_id );
		$articles = Article::where( 'user_id', $user_id )->orderBy( 'id', 'desc' )->paginate( $this->per_page );

		return view( 'themes/' . $this->theme_directory . '/templates/index',
		             array_merge( $this->data, [
			             'author'   => $author,
			             'articles' => $articles
		             ] )
		);
	}

	public function show( $slug ) {
		// Single article
		$article     = Article::firstWhere( 'slug', $slug );
		$old_article = Article::where( 'id', '<', $article->id )->orderBy( 'id', 'DESC' )->first();
		$new_article = Article::where( 'id', '>', $article->id )->orderBy( 'id', 'ASC' )->first();

		// Comments
		$commentsQuery  = $this->get_commentQuery( $article->id );
		$comments_count = $commentsQuery->count();

		// If infinite scroll, paginate comments (to be loaded one page per scroll),
    // Else show them all 

		if (boolval($this->is_infinitescroll)) {
			$comments = $commentsQuery->paginate($this->comments_per_page);
		} else {
			$comments = $commentsQuery->get();
		}

		return view( 'themes/' . $this->theme_directory . '/templates/single',
		             array_merge( $this->data, [
			             'categories'        => $this->article_categories,
			             'article'           => $article,
			             'old_article'       => $old_article,
			             'new_article'       => $new_article,
			             'comments'          => $comments,
			             'comments_count'    => $comments_count,
                   'comments_per_page' => $this->comments_per_page,
			             'tagline'           => $article->title,
			             'is_infinitescroll' => $this->is_infinitescroll
		             ] )
		);
	}

	/**
	 * AJAX Call for Loading extra comments
	 *
	 * @param Request $request
	 *
	 * @return void
	 */
	public function get_comments_ajax( Request $request ) {
		if ( ! $request->ajax() ) {
			exit();
		}

		$more_comments_to_display = TRUE;
    $article_id  = $request->post( 'article_id' );
		$page_number = $request->post( 'page' );
		$offset      = $this->comments_per_page * $page_number;

		$data['comments'] = $this->get_commentQuery( $article_id, $this->comments_per_page, $offset )->get();
		$content          = '';
		if ($data['comments']->count()) {
			$content .= view('themes/' . $this->theme_directory . '/partials/comments-list',
      array_merge( $data, [
        'is_infinitescroll' => $this->is_infinitescroll,
        'theme_directory' => $this->theme_directory,
        'article_id' => $article_id
      ])
    );
		} else {
			$more_comments_to_display = FALSE;
		}
		echo json_encode( [ 'html' => $content, 'page' => $page_number, 'more_comments_to_display' => $more_comments_to_display, 'article_id' => $article_id ] );
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
	private function get_commentQuery( int $article_id, int $limit = 0, int $offset = 0 ): object {
		$commentQuery = Comment::where( [ 'article_id' => $article_id, 'approved' => 1 ] )
        ->orderBy( 'id', $this->comments_orderby_direction )
        ->with('replies', function($query){
             $query->where('approved', 1);
        });

		if ( $offset > 0 ) {
			$commentQuery = $commentQuery->offset( $offset );
		}
		if ( $limit > 0 ) {
			$commentQuery = $commentQuery->limit( $limit );
		}

		return $commentQuery;
	}

	public function add_comment( Request $request ) {
		$rules = [
			'msg' => 'required'
		];

		$messages = [
			'msg.required' => 'Please enter a message'
		];

		$validator = Validator::make( $request->all(), $rules, $messages );

		if ( $validator->fails() ) {
			return redirect()->back()
			                 ->withErrors( $validator->errors() )
			                 ->withInput()
			                 ->with( 'error', 'Please correct the errors below' );
		}

		$fields = $validator->validated();

		$comment = [
			'user_id'    => Auth::user()->id,
			'article_id' => $request->get( 'article_id' ),
      'parent_id' => $request->get( 'parent_id' ),
			'body'       => $fields['msg'],
			'approved'   => 0
		];

		// Insert comment in the 'comments' table
		$query = Comment::create( $comment );

    if ($query) {
			if ($request->expectsJson()) {
        return response()->json([
          'status'    => 'success',
          'message'   => 'Your comment is pending.'
      ]);
      } else {
        return redirect()->back()->with([
          'success' => 'Your comment is pending.',
          'success_comment_id' => $request->get('parent_id'),
        ]);
      }
      
		}

    if (!$query) {
      if ($request->expectsJson()) {
        return response()->json([
          'status'    => 'fail',
          'message'   => 'Adding comment failed.'
      ]);
      } else {
        return redirect()->back()->with('error', 'Adding comment failed.');
      }
      
    }
	}

}