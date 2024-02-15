<?php

namespace App\Observers;

use App\Models\Admin\Category;
use Illuminate\Support\Str;

class CategoryObserver
{

    public function saving(Category $category): void
    {
        $category['slug_ru'] = Str::slug($category['name_ru']);
        $category['slug_uz'] = Str::slug($category['name_uz']);
    }
}
