<?php
declare(strict_types=1);

namespace App\DataObjects;

use Akbarali\DataObject\DataObjectBase;
use App\Traits\GetTranslations;
use Illuminate\Support\Carbon;
/**
 * Created by Console do:create
 * Filename: CategoryData.php
 */
class CategoryData extends DataObjectBase
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

}
