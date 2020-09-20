<?php

namespace App\Models;


/**
 * Class Image
 * @package App\Models
 */
class Image extends BaseModel
{
    protected $fillable = [
        'path',
        'main',
        'status',
    ];
}
