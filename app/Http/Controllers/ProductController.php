<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    
    // Create resource
    public function create(Request $request): string
    {
       Product::create($request->input());
       return "Resource added successfuly";
    }

    // Update resource
    public function update(Request $request, $id): string
    {
        $product = Product::find($id);
        if(empty($product) ){
            return "Resource doesn't exist";
        }else{
            Product::where('_id', $id)->update($request->input());
            return "Resource updated successfuly";
        }
    }

    public function getAll(): object
    {
        return ProductResource::collection(Product::all());
    }

    public function get($id)
    {
        $product = Product::find($id);
        
        if (empty($product) ) {
            return "Resource doesn't exist";
        } else {
            return new ProductResource(Product::find($id));
        }
        
    }

    // delete resource
    public function delete(Request $request, $id): string
    {
        $product = Product::find($id);
        if (empty($product)) {
            return "Resource doesn't exist";
        } else {
            Product::where(
                '_id',
                $id
            )->delete($request->input());
            return "Resource deleted successfuly";
        }
    }
}
