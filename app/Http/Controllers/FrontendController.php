<?php

namespace App\Http\Controllers;
use App\Models\Settings;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
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


    public function __construct()
    {
        $settings = Settings::first();
        $this->theme_directory = $settings->theme_directory ?? null;
        $this->site_name = $settings->site_name ?? null;
        $this->tagline = $settings->tagline ?? null;
        $this->owner_name = $settings->owner_name ?? null;
        $this->owner_email = $settings->owner_email ?? null;
        $this->twitter = $settings->twitter ?? null;
        $this->facebook = $settings->facebook ?? null;
        $this->instagram = $settings->instagram ?? null;
        $this->is_cookieconsent = $settings->is_cookieconsent ?? null;
        $this->is_infinitescroll = $settings->is_infinitescroll ?? null;
    }
}
