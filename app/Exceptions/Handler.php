<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Settings;
use App\Models\Page;
use App\Models\ArticleCategory;

class Handler extends ExceptionHandler
{
  /**
   * A list of the exception types that are not reported.
   *
   * @var array<int, class-string<Throwable>>
   */
  protected $dontReport = [
    //
  ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array<int, string>
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register()
  {
    $this->reportable(function (Throwable $e) {
      //
    });
  }

  public function render($request, Throwable $exception)
  {
    if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {

      // Get the active theme
      $settings = Settings::first();

      // Pages and categories
      $pages = Page::all();
      $article_categories = ArticleCategory::has('articles')->get();

      // Check if that view exists
      if (view()->exists('themes/' . $settings->theme_directory . '/templates/404')) {
         $theme_404_view = 'themes/' . $settings->theme_directory . '/templates/404';

        return response()->view($theme_404_view, [
          'theme_directory' => $settings->theme_directory,
          'site_name' => $settings->site_name,
          'tagline' => $settings->tagline,
          'owner_name' => $settings->owner_name,
          'owner_email' => $settings->owner_email,
          'twitter' => $settings->twitter,
          'facebook' => $settings->facebook,
          'instagram' => $settings->instagram,
          'is_cookieconsent' => $settings->is_cookieconsent,
          'is_infinitescroll' => $settings->is_infinitescroll,
          'title' => "404",
          'subtitle' => "Not found! :(",
          'message'=> "Nothing to see here!",
          'pages' => $pages,
          'categories' => $article_categories
        ], 404);
      }
    }

    return parent::render($request, $exception);
  }
}
