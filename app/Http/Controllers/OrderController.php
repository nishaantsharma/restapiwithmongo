<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Create Order
    public function create(Request $request): string
    {
        $product = Product::find($request->productId);
        if (empty($product)) {
            return "Product doesn't exist";
        }

        if($product->qty == 0)
            return "Product Inventory is empty";
        
        $orderPrice = $product->price * $request->qty;

        $orderData = [
            'customerId' => Auth::id(),
            'productId' => $request->productId,
            'qty' => $request->qty,
            'amount' => $orderPrice
        ];

        Order::create($orderData);

        $updatedProductQty = $product->qty - $request->qty;
        Product::where('_id', $request->productId)->update(['qty' => $updatedProductQty]);

        return 'Order Placed Successfully';
        
    }

    public function getAll(): object
    {
        // resource to be changed
        return OrderResource::collection(Order::all());
    }

    public function get($id)
    {
        $product = Order::find($id);

        if (empty($product)) {
            return "Resource doesn't exist";
        } else {
            return new OrderResource(Order::find($id));
        }
    }

}
