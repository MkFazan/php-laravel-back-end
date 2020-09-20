<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected $fillable = [
       'email',
       'message',
       'stars',
       'approve',
       'is_buy',
       'status',
    ];
}
