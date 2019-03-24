<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $fillable = [
        'student_id',
        'handler_id',
        'event_id',
        'date',
        'sticker',
        'image_url',
        'detail',
    ];
}
