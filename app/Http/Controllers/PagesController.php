<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends FrontendController
{
  public function page($id)
  {
    $page = Page::firstWhere('id', $id);
    if (isset($page)) {
      return view(
        'themes/' . $this->theme_directory . '/templates/page',
        array_merge($this->data, [
          'page' => $page,
          'tagline' => $page->title,
        ])
      );
    } else {
      return redirect('/404');
    }
  }
}
