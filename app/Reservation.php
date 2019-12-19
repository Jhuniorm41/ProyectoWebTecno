<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code', 'date_registered', 'date_reservation','client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
