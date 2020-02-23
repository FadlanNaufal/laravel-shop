<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanaDetail extends Model
{
    protected $guarded = [];

    public function Item(){
        return $this->belongsTo('App\Barang','item_id','id');
    }

    public function Order(){
        return $this->belongsTo('App\Order','order_id','id');
    }
}
