<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Schema;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ArticleCategory::truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [
					['user_id' => 1, 'name' => 'Uncategorised']
        ];

        foreach ($categories as $key => $value) {
          ArticleCategory::create($value);
        }
    }
}
