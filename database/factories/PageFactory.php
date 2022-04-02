<?php

namespace Database\Factories;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
			
			$title = $this->faker->sentence(2);

			return [
					'title' => rtrim($title, '.'),
					'content' => $this->faker->paragraph(5),
        ];
    }
}
