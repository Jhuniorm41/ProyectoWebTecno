<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'nit'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
