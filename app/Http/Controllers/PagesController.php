<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends FrontendController
{
  public function page($id) {
		$page = Page::firstWhere('id', $id);
		return view('themes/' . $this->theme_directory . '/templates/page', 
			array_merge($this->data, [
				'page' => $page,
				'tagline' => $page->title,
				])
			);
	}
}
