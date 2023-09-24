<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model ;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

   public function categorie (){
     return $this->belongsTo(categorie::class,'categoriey_id' )->withDefault();

    }
    public  function productImage (){
        return $this->hasMany(productImage::class);

    }
    public function review(){
        return $this->hasMany(review::class);
    }
    public function cart(){
        return $this->hasMany(cart::class,);
    }
    public function order_item() {
        return $this->hasMany(order_item::class);
    }



}
