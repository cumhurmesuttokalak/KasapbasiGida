<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];
    protected $table='products';
    use HasFactory;

    function getCategory(){
        $this->belongsTo('App\Models\Category','category_id','id');
    }
    function getMenu(){
        $this->hasMany('App\Models\Menu','product_id','id');
    }
    function getSub_menu(){
        $this->hasMany('App\Models\Sub_menu','product_id','id');
    }
    function getProduct(){
        $this->hasMany('App\Models\Product','product_id','id');
    }

}
