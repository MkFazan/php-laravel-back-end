<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $fillable = [
        'id',
        'title_ua',
        'title_ru',
        'description_ua',
        'description_ru',
        'price',
        'old_price',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',

    ];
    protected $guarded=[];

    public function categories()
    {
      return  $this->belongsToMany(Category::class, 'category_products');
    }

    public function images()
    {
      return  $this->belongsToMany(Image::class, 'product_images');
    }

    public function properties()
    {
      return  $this->belongsToMany(Property::class, 'product_properties');
    }

}

