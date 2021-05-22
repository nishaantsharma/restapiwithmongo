<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function register(Request $request)
    {
        // validate form params on auth guard - unique email id, password matching
        var_dump($request->input());
    }
    
}
