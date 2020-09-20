<?php

namespace App\Models;


class PropertyValue extends BaseModel
{
    protected $fillable = [
        'property_id',
        'value_ua',
        'value_ru',
        'status'
        ];

    public function property()
    {
        return $this->hasOne(Property::class, 'id','property_id');
    }


}
