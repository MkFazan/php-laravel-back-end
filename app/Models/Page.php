<?php

namespace App\Models;


class Page extends BaseModel
{
    protected $fillable = [
        'title_ua',
        'title_ru',
        'header_ua',
        'header_ru',
        'description_ua',
        'description_ru',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'status',
        'special',
        'is_sidebar',
        'is_header',
        'is_footer',
    ];
}
