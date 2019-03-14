<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'item_name', 'stock','needed_sticker','item_pic', 'item_type_id', 'slug'
    ];


    protected $dates=[
        'deleted_at'
    ];

    public function inventory()
    {
        return $this->belongsTo('App\Item_type');
    }
}
