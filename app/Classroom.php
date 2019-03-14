<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    protected $fillable=[
        'year_id', 'name'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function Year()
    {
        return $this->belongsTo('App\Year', 'years_id')->withTrashed();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
    // public function users()
    // {
    //     return $this->hasMany('App\User');
    // }

    // public function getNameAttribute($value)
    // {
    //     return $this->strtoupper($value);
    // }

