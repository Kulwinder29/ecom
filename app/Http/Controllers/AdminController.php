<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ColorMaster;
use App\Models\SizeMaster;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function product_insert(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
    }

    public function read_data()
    {
       $colors = ColorMaster::all();
       $size = SizeMaster::all();
        $categories = Category::where([
            ['status', '1'],
            ['category_id', null]
        ])->get();
        return view('admin.product_master', compact('categories','colors','size'));
    }

    public function getCategory(Request $request)
    {
        $c_id = $request->get('c_id');
        $subCategory = DB::table('categories')->where('category_id', $c_id)->get();
        //    echo $subCategory ;
         $html = '<option value="0">Select Sub Category</option>';
         foreach ($subCategory as $list) {
         $html .= '<option value="' . $list->id . '">' . $list->name . '</option>';
        }
         echo $html;
    }

    public function color_index ()
    {
        return view('admin.color-master');
    }

    public function color_create (Request $request)
    {
        $colors = new ColorMaster();
        $colors->color = $request['color'];
        $colors->save();
           return redirect()->route('color.master');
    }

    public function size_index ()
    {
        return view('admin.size-master');
    }
    public function size_create (Request $request)
    {
        $size = new SizeMaster();
        $size->size = $request['size'];
        $size->save();
        return redirect()->route('size.master');
    }


}
