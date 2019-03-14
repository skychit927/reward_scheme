<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $fillable=[
        'years_id', 'name', 'event_types_id', 'date', 'sticker', 'pic'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function Year()
    {
        return $this->belongsTo('App\Year', 'years_id')->withTrashed();
    }

    public function Event_type()
    {
        return $this->belongsTo('App\Event_type', 'event_types_id')->withTrashed();
    }


}
