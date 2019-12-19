<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{

    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }
}
