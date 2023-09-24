<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use HasFactory , SoftDeletes ;
    protected $guarded = [];

    function user(){
        return $this->belongsTo(user::class)->withDefault();
    }
    function product(){
        return $this->belongsTo(product::class)->withDefault();
    }

}
