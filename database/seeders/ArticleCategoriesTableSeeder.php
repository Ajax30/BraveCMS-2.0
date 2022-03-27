<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			ArticleCategory::truncate();

        $categories = [
					['user_id' => 1, 'name' => 'Uncategorised']
        ];

        foreach ($categories as $key => $value) {
          ArticleCategory::create($value);
        }
    }
}
