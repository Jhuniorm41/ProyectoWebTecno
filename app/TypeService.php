<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{

    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }
    public function quotation_details()
    {
        return $this->hasMany('App\QuotationDetail');
    }
}
