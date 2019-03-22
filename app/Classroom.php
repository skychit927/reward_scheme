<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'years_id',
        'name',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class, 'years_id')->withTrashed();
    }


}
