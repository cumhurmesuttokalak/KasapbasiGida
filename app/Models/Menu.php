<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded=['id'];
    protected $table='menus';
    use HasFactory;

    function getSub_menu(){
        $this->hasMany('App\Models\Sub_menu','menu_id','id');
    }
    function getCategory(){
        $this->belongsTo('App\Models\Category','category_id','id');
    }
    function getProduct(){
        $this->belongsTo('App\Models\Product','product_id','id');
    }

}
