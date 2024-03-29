<?php

namespace App\Models\Admin;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([PostObserver::class])]

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'is_special',
        'title_uz',
        'title_ru',
        'slug_uz',
        'slug_ru',
        'text_uz',
        'text_ru',
        'image',
        'view',
        'meta_title_uz',
        'meta_title_ru',
        'meta_description_uz',
        'meta_description_ru',
        'meta_keywords_uz',
        'meta_keywords_ru'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // public static function boot()
    // {
    //     parent::boot();
    // }
}
