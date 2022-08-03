<?php

namespace App\Http\Controllers;
use App\Models\Settings;
use App\Models\ArticleCategory;
class FrontendController extends Controller
{
    protected $site_settings;
    protected $theme_directory;
    protected $site_name;
    protected $tagline;
    protected $owner_name;
    protected $article_categories;

    public function __construct()
    {
        $this->site_settings = Settings::first();
        $this->theme_directory = $this->site_settings['theme_directory'] ?? null;
        $this->site_name = $this->site_settings['site_name'] ?? null;
        $this->tagline = $this->site_settings['tagline'] ?? null;
        $this->owner_name = $this->site_settings['owner_name'] ?? null;


        // Article categories
        $this->article_categories = ArticleCategory::all();
    }
}
