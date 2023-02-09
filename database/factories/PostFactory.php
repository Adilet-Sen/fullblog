<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'title' => $this->faker->title(),
            'content' => $this->faker->text(500),
            'slug' => Str::slug($this->faker->title()),
            'category_id' => 1,
            'user_id' => rand(0,1),
            'views' => rand(0,100),
            'featured' => 0,
        ];
    }
}
