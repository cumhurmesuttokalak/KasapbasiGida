<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=['id'];
    protected $table='categories';
    use HasFactory;


    function getProduct(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }
    function getSlider(){
        return $this->hasMany('App\Models\Slider','category_id','id');
    }
    function getSub_menu(){
        return $this->hasMany('App\Models\Sub_menu','category_id','id');
    }
    function getMenu(){
        return $this->hasMany('App\Models\Menu','category_id','id');
    }

}
