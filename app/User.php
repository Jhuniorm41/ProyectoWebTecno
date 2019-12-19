<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'color','font_size','root'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function isRoot()
    {
        if ($this->root == '1') {
            return true;
        }
        return false;
    }

    public function isPersonal()
    {
        if (DB::table('personals')->where('id', $this->id)->exists()) {
            return true;
        }
        return false;
    }
    public function isClient()
    {
        if (DB::table('clients')->where('id', $this->id)->exists()) {
            return true;
        }
        return false;
    }

    public function getStrRandom($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function countPage($id){
        $page = Page::findOrFail($id);
        $page->count = $page->count +1;
        $page->save();
    }

    public function showCounter($id){
        $page = Page::findOrFail($id);
        return $page->cu." || Numero de visitas: ".$page->count;
    }



}
