<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'name',
  ];

  public function articles()
  {
    return $this->hasMany(Article::class, 'category_id');
  }
}
