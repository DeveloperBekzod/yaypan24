<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('ru_RU');

        Category::create([
            'name_uz' => fake()->word(),
            'slug_uz' => fake()->word(),
            'meta_title_uz' => fake()->sentence(),
            'meta_description_uz' => fake()->paragraph(),
            'meta_keywords_uz' => fake()->words(5, true),
            'name_ru' => $faker->word(),
            'slug_ru' => $faker->word(),
            'meta_title_ru' => $faker->sentence(),
            'meta_description_ru' => $faker->paragraph(),
            'meta_keywords_ru' => $faker->words(5, true),
        ]);
        /* DB::table('categories')->insert([
            'name_uz' => fake()->word(),
            'slug_uz' => fake()->word(),
            'meta_title_uz' => fake()->sentence(),
            'meta_description_uz' => fake()->paragraph(),
            'meta_keywords_uz' => fake()->words(5, true),
            'name_ru' => $faker->word(),
            'slug_ru' => $faker->word(),
            'meta_title_ru' => $faker->sentence(),
            'meta_description_ru' => $faker->paragraph(),
            'meta_keywords_ru' => $faker->words(5, true),
        ]); */
    }
}
