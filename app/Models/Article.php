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
		];

		// Join users to articles
		public function user() {
			return $this->belongsTo(User::class);
		}

		// Join categories to articles
		public function category() {
			return $this->belongsTo(ArticleCategory::class);
		}

		public function scopeSearch($query, $searchText) {
			return $query->where('title', 'like', '%' . $searchText . '%')
				->orWhere('short_description', 'like', '%' . $searchText . '%')
				->orWhere('content', 'like', '%' . $searchText . '%');
		}
}
