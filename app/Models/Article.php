<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

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
    'views',
    'published_at',
    'expires_at',
  ];

  protected $casts = [
    'published_at' => 'datetime',
    'expires_at' => 'datetime',
  ];

  /**
   * Scope for visible (currently published and not expired) articles
   */
  public function scopeVisible(Builder $query)
  {
    $now = Carbon::now();

    return $query->where('published_at', '<=', $now)
      ->where(function ($q) use ($now) {
        $q->whereNull('expires_at')
          ->orWhere('expires_at', '>', $now);
      });
  }

  /**
   * Global ordering of articles, first by publication date, then by id 
   */
  protected static function booted()
  {
    static::addGlobalScope('default_order', function (Builder $query) {
      $query->orderBy('published_at', 'desc')
        ->orderBy('id', 'desc');
    });
  }

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

  // Add comments to articles
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  // Add tags to articles
  public function tags()
  {
    return $this->belongsToMany(Tag::class)->as('tags');
  }
}
