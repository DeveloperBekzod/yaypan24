<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Category;
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
            'category_id' => Category::inRandomOrder()->first()->id,
            'is_special' => $this->faker->boolean(),
            'title_uz' => $this->faker->sentence(),
            'title_ru' => $this->faker->sentence(),
            'text_uz' => $this->faker->paragraphs(3, true),
            'text_ru' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
            'view' => $this->faker->numberBetween(0, 10000),
            'meta_title_uz' => $this->faker->sentence(),
            'meta_title_ru' => $this->faker->sentence(),
            'meta_description_uz' => $this->faker->paragraph(),
            'meta_description_ru' => $this->faker->paragraph(),
            'meta_keywords_uz' => $this->faker->words(5, true),
            'meta_keywords_ru' => $this->faker->words(5, true),
        ];
    }
}
