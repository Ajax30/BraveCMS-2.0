<?php

namespace App\Http\Controllers;

//use http\Client\Request;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\Comment;

class ArticlesController extends FrontendController {

	// Articles per page
	protected $per_page = 12;

	public function index( Request $request ) {

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
		$commentsQuery = Comment::where( [ 'article_id' => $article->id, 'approved' => 1 ] )->orderBy( 'id', 'desc' );

		$comments_count = $commentsQuery->count();

		// If no infinite scroll, show all comments, else, paginate them

		if ( boolval( $this->is_infinitescroll ) ) {
			$comments = $commentsQuery->paginate( 10 );
		} else {
			$comments = $commentsQuery->get();
		}

		return view( 'themes/' . $this->theme_directory . '/templates/single',
		             array_merge( $this->data, [
			             'categories'     => $this->article_categories,
			             'article'        => $article,
			             'old_article'    => $old_article,
			             'new_article'    => $new_article,
			             'comments'       => $comments,
			             'comments_count' => $comments_count,
			             'tagline'        => $article->title,
		             ] )
		);
	}

	public function get_comments_ajax(Request $request){

		if($request->ajax()){
			$content =  "Request is of Ajax Type";
		} else {
			$content = "Request is of Http type";
		}


		echo json_encode(['html' => $content]);
		exit();
		// Check that it is an AJAX Call

		// Get the Page Value.

		// Check the max page for the content.


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
			'body'       => $fields['msg'],
			'approved'   => 0
		];

		// Insert comment in the 'comments' table
		$query = Comment::create( $comment );

		if ( $query ) {
			return redirect()->back()->with( 'success', 'Your comment is pending.' );
		} else {
			return redirect()->back()->with( 'error', 'Adding comment failed' );
		}
	}

}
