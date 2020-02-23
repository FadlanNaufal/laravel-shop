<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = [];

    public function User(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function OrderDetail(){
        return $this->hasMany('App\PesanaDetail','order_id','id');
    }
}
