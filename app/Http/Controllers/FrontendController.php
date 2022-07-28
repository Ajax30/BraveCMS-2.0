<?php

namespace App\Http\Controllers;
use App\Models\Settings;
class FrontendController extends Controller
{
    protected $site_settings;
    protected $theme_directory;

    public function __construct()
    {
        $this->site_settings = Settings::first();
        $this->theme_directory = $this->site_settings['theme_directory'];
    }
}
