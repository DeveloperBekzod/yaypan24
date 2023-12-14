<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(12,19),
						'title_uz' => $this->faker->sentence,
						'title_ru' => $this->faker->sentence,
						'text_uz' => $this->faker->text,
						'text_ru' => $this->faker->text,
						'image' => '1702384776.jpg',
						'view' => rand(0, 100),
						'is_special' => rand(0,1),
        ];
    }
}
