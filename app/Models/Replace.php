<?php

namespace App\Models;


class Replace extends BaseModel
{
    protected $fillable = [
        'title_ua',
        'title_ru',
        'header_ua',
        'header_ru',
        'description_ua',
        'description_ru',
        'path',
        'status',
    ];
}
