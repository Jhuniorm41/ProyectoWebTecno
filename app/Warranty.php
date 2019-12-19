<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'date_start', 'date_finish', 'date_extension','product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
