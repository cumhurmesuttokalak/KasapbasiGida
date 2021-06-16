<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_menu extends Model
{
    protected $guarded=['id'];
    protected $table='sub_menus';
    use HasFactory;

    function getCategory(){
        $this->belongsTo('App\Models\Category','category_id','id');
    }
    function getProduct(){
        $this->belongsTo('App\Models\Product','product_id','id');
    }
    function getMenu(){
        $this->belongsTo('App\Models\Menu','menu_id','id');
    }
}
