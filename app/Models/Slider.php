<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded=['id'];
    protected $table='sliders';
    use HasFactory;

    function getCategory(){
        $this->belongsTo('App\Models\Category','category_id','id');
    }
    function getProduct(){
        $this->belongsTo('App\Models\Product','product_id','id');
    }
}
