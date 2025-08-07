<?php

namespace Database\Factories;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2]),
            'article_id' => $this->faker->randomElement([30, 29, 28, 27, 26, 25]),
            'body' => $this->faker->sentence(2),
            'approved' => $this->faker->randomElement([0, 1])
        ];
    }
}
