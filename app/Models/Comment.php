<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'article_id',
    'parent_id',
    'body',
    'approved',
  ];

  /**
   * The user who posted the comment.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * The article this comment belongs to.
   */
  public function article()
  {
    return $this->belongsTo(Article::class);
  }

  /**
   * Replies to this comment (approved only), with user eager-loaded.
   * This allows 2 levels of comments easily.
   */
  public function replies()
  {
    return $this->hasMany(Comment::class, 'parent_id')
      ->where('approved', 1)
      ->orderBy('id', 'asc')
      ->with('user');
  }
}
