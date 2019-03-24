<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'year_id',
        'name',
        'event_type_id',
        'date',
        'sticker_amount',
        'image_url',
        'detail',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id')->withTrashed();
    }

    public function event_type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id')->withTrashed();
    }

}
