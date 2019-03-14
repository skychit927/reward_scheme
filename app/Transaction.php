<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function Year() {
    return $this->belongsTo('App\Year');
    }

    public function Student() {
        return $this->belongsTo('App\User', 'student');
    }

    public function Handler() {
        return $this->belongsTo('App\User', 'handler');
    }
}
