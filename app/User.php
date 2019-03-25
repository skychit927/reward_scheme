<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    protected $fillable = [
        'name',
        'classroom_id',
        'classNo',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id')->withTrashed();
    }

    public function transition()
    {
        return $this->hasMany(Transition::class, 'student_id');
    }

}
