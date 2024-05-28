<?php

namespace App\DataObjects;

use Akbarali\DataObject\DataObjectBase;
use App\Traits\GetTranslations;

class CategoryPostsData extends DataObjectBase
{
    use GetTranslations;

    public string $name_uz;
    public string $name_ru;
    public string $slug_uz;
    public string $slug_ru;
    public string $meta_title_uz;
    public string $meta_title_ru;
    public string $meta_description_uz;
    public string $meta_description_ru;
    public string $meta_keywords_uz;
    public string $meta_keywords_ru;
    public iterable $posts;
}
