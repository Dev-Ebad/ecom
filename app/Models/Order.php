<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // function product(){
    //     return $this->;
    // }
}
