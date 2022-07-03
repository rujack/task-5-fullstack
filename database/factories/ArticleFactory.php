<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "content" => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
            "image" => 'https://unsplash.com/photos/VyUdiYH5tiY/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8N3x8Y2FyZCUyMHNodWZmbGV8ZW58MHwwfHx8MTY1NjgyODE1NQ&force=true&w=640',
            "user_id" => rand(1, 5),
            "category_id" => rand(1, 5),

        ];
    }
}
