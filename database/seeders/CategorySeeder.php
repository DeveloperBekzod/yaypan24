<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('ru_RU');
        $nameuz = [
            [
                'name_uz' => 'O\'zbekiston',
                'name_ru' => 'Узбекистана',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Dunyo',
                'name_ru' => 'Мир',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Iqtisod',
                'name_ru' => 'Экономика',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Siyosat',
                'name_ru' => 'Политика',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Jamiyat',
                'name_ru' => 'Общество',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Texnologiya',
                'name_ru' => 'Технологии',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Sport',
                'name_ru' => 'Спорт',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Madaniyat',
                'name_ru' => 'Культура',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Hodisalar',
                'name_ru' => 'Происшествия',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
            [
                'name_uz' => 'Turizm',
                'name_ru' => 'Туризм',
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'name_ru' => $faker->word(),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),

            ],
        ];
        foreach ($nameuz as $key => $value) {
            Category::create($value);
        }
    }
}
