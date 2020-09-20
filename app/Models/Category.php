<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @method static where(string $string, string $string1, $null)
 * @method static orderBy(string $string, string $string1)
 */
class Category extends  Model
{
    use NodeTrait;
    protected $fillable = array(
        'title_ua',
        'title_ru',
        'status',
        'parent_id',
        '_lft',
        '_rgt',
    );
    protected $guarded=[];
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function products()
    {
        return  $this->belongsToMany(Product::class, 'category_products');
    }

}

