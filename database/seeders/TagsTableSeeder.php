<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use phpDocumentor\Reflection\DocBlock\Tag as DocBlockTag;

class TagsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  public function run()
    {
      Tag::create([
        'name' => 'books',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      Tag::create([
        'name' => 'movies',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      Tag::create([
        'name' => 'news',
        'created_at' => now(),
        'updated_at' => now()
      ]);
  }
}
