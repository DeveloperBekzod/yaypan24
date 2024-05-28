<?php

namespace App\Services;

use App\DataObjects\CategoryPostsData;
use App\DataObjects\PostData;
use App\Filters\EloquentFilterContract;
use App\Models\Admin\Category;
use Akbarali\DataObject\DataObjectCollection;

class PostService
{
    public static function paginatePosts(string $slug, array $filters = [], int $limit = 2, int $page = 1): DataObjectCollection
    {
        $model = Category::query()->where('slug_uz', $slug)->orWhere('slug_ru', $slug)->with('posts')->first();
        foreach ($filters as $filter) {
            if ($filter instanceof EloquentFilterContract) {
                $model = $filter->applyEloquent($model);
            }
        }

        $total_count = $model->posts()->count();
        $skip        = $limit * ($page - 1);
        $model->posts()->skip($skip)->take($limit)->get()->transform(function ($item) {
            return PostData::createFromEloquentModel($item);
        });
        $items = CategoryPostsData::createFromEloquentModel($model);
        return new DataObjectCollection($items->posts, $total_count, $limit, $page);
    }
}
