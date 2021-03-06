<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }
}
