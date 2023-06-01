<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function product_insert(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
    }

    public function category()
    {
        $categories = Category::where([
            ['status','1'],
            ['category_id',null]
        ])->get();
       return view('admin.product_master', compact('categories'));
    }

    public function getCategory(Request $request)
    {
         $c_id = $request->get('c_id');
        $subCategory = DB::table('categories')->where('category_id',$c_id)->get();
       echo $subCategory ;
    }
}
