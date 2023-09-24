<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use HasFactory  ;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function order_item() {
        return $this->hasMany(order_item::class);
    }
    public function payment() {
        return $this->hasMany(payment::class);
    }

}
