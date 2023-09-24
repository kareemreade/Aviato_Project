<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment extends Model
{
    use HasFactory  ;
    protected $guarded = [];
    public function  user()  {
        return $this->belongsTo(user::class)->withDefault();
     }
     public function order ()  {
        return $this->belongsTo(order::class)->withDefault();
    }
}
