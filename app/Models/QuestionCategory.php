<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class QuestionCategory extends BaseModel
{
    protected $fillable = [
        'title_ua',
        'title_ru',
        'path',
        'status',
    ];
    public function answer()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_categories_id','id');
    }
}
