<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(5),
            'image' => $this->faker->imageUrl(640, 480),
            'category_id' => Category::get('id')->random(),
            'user_id' => User::get('id')->random(),
        ];
    }
}
