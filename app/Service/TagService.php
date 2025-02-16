<?php
namespace App\Service;

use App\Models\Tag;

class TagService 
{
    public function all()
    {
        return Tag::all();
    }
}