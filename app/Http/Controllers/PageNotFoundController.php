<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageNotFoundController extends FrontendController
{
  public function notfound()
  {
    return view(
      'themes/' . $this->theme_directory . '/templates/404',
      array_merge($this->data, [
        'title' => "404",
        'subtitle' => "Not found! :(",
        'message' => "Nothing to see here!"
      ])
    );
  }
}
