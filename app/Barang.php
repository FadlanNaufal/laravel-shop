<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['name','image','price','stock','desc'];
    
    public function OrderDetail(){
        return $this->hasMany('App\PesanaDetail','item_id','id');
    }
}
