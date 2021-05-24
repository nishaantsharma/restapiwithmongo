<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource as Resources;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resources
{
    public function toArray($request)
    {
        return [
            'id' => $this->_id,
            'productName' => Product::find($this->productId)->pname,
            'qty' => $this->qty,
            'price' => $this->amount,
            'created_at' => $this->getDateTime($this->created_at),
            'updated_at' => $this->getDateTime($this->updated_at)
        ];
    }

    public function getDateTime($timeStamp)
    {
        $date = Carbon::parse($timeStamp);
        return $date->format('Y-m-d H:i:s');
    }
}
