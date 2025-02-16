<?php
namespace App\Service;
use App\Models\ArticleCategory;

class CategoryService
{
    public function all()
    {
        return ArticleCategory::all();
    }
}