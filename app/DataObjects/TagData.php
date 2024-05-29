<?php
declare(strict_types=1);

namespace App\DataObjects;

use Akbarali\DataObject\DataObjectBase;
use App\Traits\GetTranslations;

/**
 * Created by Console do:create
 * Filename: TagData.php
 */
class TagData extends DataObjectBase
{
    use GetTranslations;

    public readonly int $id;
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
    public \Illuminate\Support\Carbon $created_at;
    public \Illuminate\Support\Carbon $updated_at;

}
