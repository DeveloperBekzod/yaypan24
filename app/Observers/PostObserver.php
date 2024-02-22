<?php

namespace App\Observers;

use App\Models\Admin\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post): void
    {
        $post['slug_uz'] = Str::slug($post['title_uz']);
        $post['slug_ru'] = Str::slug($post['title_ru']);
    }
}
