<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date_start', 'date_finish', 'name','type_service_id','type_product_id','discount',
    ];


    public function type_product()
    {
        return $this->belongsTo('App\TypeProduct');
    }
    public function type_service()
    {
        return $this->belongsTo('App\TypeService');
    }
}
