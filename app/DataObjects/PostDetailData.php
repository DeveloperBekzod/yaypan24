<?php
declare(strict_types=1);

namespace App\DataObjects;

use Akbarali\DataObject\DataObjectBase;
use App\Traits\GetTranslations;
use Illuminate\Support\Carbon;
/**
 * Created by Console do:create
 * Filename: PostDetailData.php
 */
class PostDetailData extends DataObjectBase
{
    use GetTranslations;

    public readonly int $id;
    public readonly int $category_id;
    public bool $is_special;
    public string $title_uz;
    public string $title_ru;
    public string $slug_uz;
    public string $slug_ru;
    public string $text_uz;
    public string $text_ru;
    public string $image;
    public int $view;
    public string $meta_title_uz;
    public string $meta_title_ru;
    public string $meta_description_uz;
    public string $meta_description_ru;
    public string $meta_keywords_uz;
    public string $meta_keywords_ru;
    public iterable $tags = [];
    public Carbon $created_at;
    public Carbon $updated_at;

}
