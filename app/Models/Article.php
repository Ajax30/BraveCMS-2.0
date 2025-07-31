<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'slug',
    'short_description',
    'content',
    'featured',
    'image',
    'video',
    'views'
  ];

  // Join users to articles
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Join categories to articles
  public function category()
  {
    return $this->belongsTo(ArticleCategory::class);
  }

  // Add tags to post 
  public function tags()
  {
    return $this->belongsToMany(Tag::class)->as('tags');
  }
}
