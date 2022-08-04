<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends FrontendController
{
  public function page($id) {
		$page = Page::firstWhere('id', $id);
		return view('themes/' . $this->theme_directory . '/templates/page', 
			[
				'theme_directory' => $this->theme_directory,
				'site_name' => $this->site_name,
				'tagline' => $this->tagline,
				'owner_name' => $this->owner_name,
				'pages' => $this->pages,
				'categories' => $this->article_categories,
				'page' => $page
			]
		);
	}
}
