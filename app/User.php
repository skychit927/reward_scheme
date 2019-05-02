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

    public function getRequestAttribute(){
        if($this->role != 'admin'){
            return null;
        } else {
            $query = Transition::query();
            $query->where('status', 'P');
            // $query->has('prize');
            return $query->count();
        }
    }

    public function getStickerAttribute()
    {
        if($this->role != 'student'){
            return null;
        } else {
            $prizeSum = 0;
            $activitySum = 0;

            $query = Transition::query();
            $query->with('prize');
            $query->with('activity');
            $query->where('student_id', $this->id);
            $query->where(function ($query) {
                $query->where('status', 'S');
                $query->orWhere('status', 'P');
            });
            $transactions = $query->get();
            foreach ($transactions as $transaction) {
                foreach ($transaction->prize as $singlePrize) {
                    $prizeSum += $singlePrize->sticker_amount * $singlePrize->pivot->qty;
                }

                foreach ($transaction->activity as $singleActivity) {
                    $activitySum += $singleActivity->sticker_amount * $singleActivity->pivot->qty;
                }
            }
            return $activitySum - $prizeSum;
        }
    }

    public function getStickerplusAttribute()
    {
        if($this->role != 'student'){
            return null;
        } else {
            $activitySum = 0;
            $query = Transition::query();
            $query->with('activity');
            $query->where('student_id', $this->id);
            $query->where(function ($query) {
                $query->where('status', 'S');
            });
            $transactions = $query->get();
            foreach ($transactions as $transaction) {
                foreach ($transaction->activity as $singleActivity) {
                    $activitySum += $singleActivity->sticker_amount * $singleActivity->pivot->qty;
                }
            }
            return $activitySum;
        }
    }

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
