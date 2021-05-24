<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    protected $collection = 'order';

    protected $fillable = ['customerId', 'productId', 'qty', 'amount'];
}
