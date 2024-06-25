<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'products_table';

    // public function category(){
    //     return $this->hasOne(Category::class, 'id');
    // }
}
