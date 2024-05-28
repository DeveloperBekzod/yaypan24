<?php
declare(strict_types=1);

namespace App\Traits;

trait GetTranslations {

    public function name(): string
    {
        return  app()->getLocale() == 'ru' ? $this->name_ru : $this->name_uz;
    }
    public function slug(): string
    {
        return  app()->getLocale() == 'ru' ? $this->slug_ru : $this->slug_uz;
    }

    public function title(): string
    {
        return  app()->getLocale() == 'ru' ? $this->title_ru : $this->title_uz;
    }

    public function text(): string {
        return app()->getLocale() == 'ru' ? $this->text_ru : $this->text_uz;
    }

    public function metaTitle(): string {
        return app()->getLocale() == 'ru' ? $this->meta_title_ru : $this->meta_title_uz;
    }

    public function metaDescription(): string {
        return app()->getLocale() == 'ru' ? $this->meta_description_ru : $this->meta_description_uz;
    }

    public function metaKeywords(): string {
        return app()->getLocale() == 'ru' ? $this->meta_keywords_ru : $this->meta_keywords_uz;
    }
}
