<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model{
    protected $collection = 'product';

    protected $fillable = ['pname','qty','price','created_at'];
}
