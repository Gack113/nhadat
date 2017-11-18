<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $table = 'product_views';
    
    public function product(){
        $this->belongsTo('App\Product','id_product','id');
    }
}
