<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','code', 'sale_code', 'type_product_id','client_id',
    ];
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function type_product()
    {
        return $this->belongsTo('App\TypeProduct');
    }
    public function warranties()
    {
        return $this->hasMany('App\Warranty');
    }
    public function quotations()
    {
        return $this->hasMany('App\Quotation');
    }
}
