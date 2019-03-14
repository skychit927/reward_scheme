<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    protected $fillable=[
        'name', 'choose'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function Classroom()
    {
        return $this->hasMany('App\Classroom');
    }

    public function Event()
    {
        return $this->hasMany('App\Event');
    }

    public function Transaction()
    {
        return $this->hasMany('App\Transaction');
    }


}

        // return $this->hasMany('App\Transition');
        // return $this->hasMany('App\Event');
