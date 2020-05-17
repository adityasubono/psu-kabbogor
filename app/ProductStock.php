<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    public $table = 'product_stocks';
    public $fillable= ['name','qty','price'];
}
