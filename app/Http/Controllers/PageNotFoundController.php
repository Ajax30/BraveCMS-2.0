<?php

namespace App\Http\Controllers;

class PageNotFoundController extends FrontendController
{
  public function notfound()
  {
    return view(
      'themes/' . $this->theme_directory . '/templates/404',
      array_merge($this->data, [
        'title' => "404",
        'subtitle' => "Not found! :(",
        'message' => "Nothing to see here!",
        'comments_count' => 0
      ])
    );
  }
}
