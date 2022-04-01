<?php

namespace Database\Factories;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
			$title = $this->faker->sentence(2);

			return [
          'user_id' => $this->faker->randomElement([1, 2]),
					'category_id' => 1,
					'title' => rtrim($title, '.'),
					'slug' => Str::slug($title, '-'),
					'short_description' => $this->faker->paragraph(1),
					'content' => $this->faker->paragraph(5),
					'featured' => 0,
					'image' => 'default.jpg',
        ];
    }
}
