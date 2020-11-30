<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['productcategory_id', 'name', 'code','unit','taxRate','cessValue','type','discountRate', 'quantity', 'stock', 'price', 'status', 'created_by', 'modified_by', 'created_at', 'updated_at'];

}
