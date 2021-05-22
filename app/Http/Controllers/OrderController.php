<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Order;

class OrderController extends Controller
{

    private $orderModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->orderModel = App::make(Order::class);
    }

    //
}
