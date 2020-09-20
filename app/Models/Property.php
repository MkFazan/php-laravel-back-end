<?php

namespace App\Models;


class Property extends BaseModel
{
    protected $fillable = [
        'title_ua',
        'title_ru',
        'status',
        ];


    public function propertyValues()
    {
        return $this->hasmany(PropertyValue::class, 'property_id','id');
    }



}

