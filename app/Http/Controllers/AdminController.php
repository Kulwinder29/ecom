<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product_insert(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
    }
}
