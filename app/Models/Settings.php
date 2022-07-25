<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
			'site_name',
			'tagline',
			'owner_name',
			'owner_email',
			'twitter',
			'facebook',
			'instagram',
			'theme_directory',
			'is_cookieconsent',
			'is_infinitescroll'
    ];
}
