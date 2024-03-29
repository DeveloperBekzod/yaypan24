<?php

namespace App\Models\Admin;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([CategoryObserver::class])]
class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name_uz',
        'name_ru',
        'slug_uz',
        'slug_ru',
        'meta_title_uz',
        'meta_title_ru',
        'meta_description_uz',
        'meta_description_ru',
        'meta_keywords_uz',
        'meta_keywords_ru'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
