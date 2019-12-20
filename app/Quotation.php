<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code', 'amount', 'date_register','reservation_id','product_id'
    ];

    public function quotation_detail()
    {
        return $this->hasMany('App\QuotationDetail');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
