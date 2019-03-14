<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_type extends Model
{
    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }
}
