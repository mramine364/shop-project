<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopUser extends Model
{
    //
    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the shop.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
