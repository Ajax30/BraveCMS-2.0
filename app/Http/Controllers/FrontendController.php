<?php

namespace App\Http\Controllers;
use App\Models\Settings;
use App\Models\ArticleCategory;
use App\Models\Page;
class FrontendController extends Controller
{
    protected $data;
    protected $site_settings;
    protected $theme_directory;
    protected $site_name;
    protected $tagline;
    protected $owner_name;
    protected $owner_email;
    protected $twitter;
    protected $facebook;
    protected $instagram;
    protected $is_cookieconsent;
    protected $is_infinitescroll;
    protected $pages;
    protected $article_categories;

    public function __construct()
    {
        $this->site_settings = Settings::first();
        $this->theme_directory = $this->site_settings['theme_directory'] ?? null;
        $this->site_name = $this->site_settings['site_name'] ?? null;
        $this->tagline = $this->site_settings['tagline'] ?? null;
        $this->owner_name = $this->site_settings['owner_name'] ?? null;
        $this->owner_email = $this->site_settings['owner_email'] ?? null;
        $this->twitter = $this->site_settings['twitter'] ?? null;
        $this->facebook = $this->site_settings['facebook'] ?? null; 
        $this->instagram = $this->site_settings['instagram'] ?? null; 
        $this->is_cookieconsent = $this->site_settings['is_cookieconsent'] ?? null;
        $this->is_infinitescroll = $this->site_settings['is_infinitescroll'] ?? null;


        // Article categories
        $this->article_categories = ArticleCategory::all();
       
				// Pages
        $this->pages = Page::all();

        $this->data = [
          'theme_directory' => $this->theme_directory,
          'site_name' => $this->site_name,
          'tagline' => $this->tagline,
          'owner_name' => $this->owner_name,
          'owner_email' => $this->owner_email,
          'twitter' => $this->twitter,
          'facebook' => $this->facebook, 
          'instagram' => $this->instagram,
          'is_cookieconsent' => $this->is_cookieconsent,
          'is_infinitescroll' => $this->is_infinitescroll,
          'pages' => $this->pages,
				  'categories' => $this->article_categories,
        ];
    }
}
