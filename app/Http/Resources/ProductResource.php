<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource as Resources;

class ProductResource extends Resources{
    public function toArray($request)
    {   
        return [
            'id' => $this->_id,
            'productName' => $this->pname,
            'qty' => $this->qty,
            'price' => $this->price,
            'created_at' => $this->getDateTime($this->created_at),
            'updated_at' => $this->getDateTime($this->updated_at)
        ];
    } 

    public function getDateTime($timeStamp){
        $date = Carbon::parse($timeStamp);
        return $date->format('Y-m-d H:i:s');
    }
}