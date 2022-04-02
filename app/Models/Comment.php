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
			'body',
			'approved'
    ];

		// Join users to comments
		public function user() {
			return $this->belongsTo(User::class);
		}

		// Join articles to comments
		public function article() {
			return $this->belongsTo(Article::class);
		}
}
