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
        'name' => 'Books',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      Tag::create([
        'name' => 'Movies',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      Tag::create([
        'name' => 'News',
        'created_at' => now(),
        'updated_at' => now()
      ]);
  }
}
