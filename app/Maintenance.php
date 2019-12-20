<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'amount', 'date', 'quotation_id'
    ];


    public function quotation()
    {
        return $this->belongsTo('App\Quotation');
    }


}
