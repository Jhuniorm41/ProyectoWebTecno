<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'subtotal', 'type_service_id', 'quotation_id'
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Quotation');
    }
    public function type_service()
    {
        return $this->belongsTo('App\TypeService');
    }
}
