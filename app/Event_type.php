<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event_type extends Model
{
    protected $fillable=[
        'name', 'sort'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function Event_type()
    {
        return $this->hasMany('App\Event_type');
    }

}
