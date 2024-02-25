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
        $names = [
            [
                'name_uz' => 'O\'zbekiston',
                'name_ru' => 'Узбекистана',
            ],
            [
                'name_uz' => 'Dunyo',
                'name_ru' => 'Мир',
            ],
            [
                'name_uz' => 'Iqtisod',
                'name_ru' => 'Экономика',
            ],
            [
                'name_uz' => 'Siyosat',
                'name_ru' => 'Политика',
            ],
            [
                'name_uz' => 'Jamiyat',
                'name_ru' => 'Общество',
            ],
            [
                'name_uz' => 'Texnologiya',
                'name_ru' => 'Технологии',
            ],
            [
                'name_uz' => 'Sport',
                'name_ru' => 'Спорт',
            ],
            [
                'name_uz' => 'Madaniyat',
                'name_ru' => 'Культура',
            ],
            [
                'name_uz' => 'Hodisalar',
                'name_ru' => 'Происшествия',
            ],
            [
                'name_uz' => 'Turizm',
                'name_ru' => 'Туризм',
            ],
        ];
        foreach ($names as $key => $value) {
            Category::create([
                ...$value,
                'meta_title_uz' => fake()->sentence(),
                'meta_description_uz' => fake()->paragraph(),
                'meta_keywords_uz' => fake()->words(5, true),
                'meta_title_ru' => $faker->sentence(),
                'meta_description_ru' => $faker->paragraph(),
                'meta_keywords_ru' => $faker->words(5, true),
            ]);
        }
    }
}
