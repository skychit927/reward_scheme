<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $fillable = [
        'student_id',
        'handler_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id')
            ->where('users.role', 'student')
            ->withTrashed();
    }

    public function handler()
    {
        return $this->belongsTo(User::class, 'handler_id')
            ->where('users.role', 'teacher')
            ->withTrashed();
    }

    public function event()
    {
        return $this->belongsToMany(Event::class, 'transition_event')
            ->withPivot('qty')
            ->withTrashed();
    }

    public function prize()
    {
        return $this->belongsToMany(Event::class, 'transition_event')
            ->join('event_types', 'event_types.id', '=', 'events.event_type_id')
            ->where('event_types.sort', 'prize')
            ->withPivot('qty')
            ->withTrashed();
    }

    public function activity()
    {
        return $this->belongsToMany(Event::class, 'transition_event')
            ->join('event_types', 'event_types.id', '=', 'events.event_type_id')
            ->where('event_types.sort', 'activity')
            ->withPivot('qty')
            ->withTrashed();
    }
}
