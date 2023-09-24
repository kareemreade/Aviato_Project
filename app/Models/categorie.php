<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\product;

class categorie extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

// جدول مع نفسو
    public  function childrn(){
    return $this->hasMany(categorie::class ,'parent_id');

    }
    public  function parent(){
    return $this->belongsTo(categorie::class ,'parent_id')->withDefault();

    }
    public function products(){

    return $this->hasMany(product::class ,'categoriey_id');
    }

// جدول مع نفسو












}
