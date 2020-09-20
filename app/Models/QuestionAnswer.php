<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class QuestionAnswer extends BaseModel
{
    protected $fillable = [
        'question_categories_id',
        'question_ua',
        'question_ru',
        'answer_ua',
        'answer_ru',
        'status'
        ];


    public function questionCategories()

    {
        return $this->hasOne(QuestionCategory::class, 'id','question_categories_id');
    }
}
