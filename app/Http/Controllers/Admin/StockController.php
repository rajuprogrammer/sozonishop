<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Stock()
    {
        $product=DB::table('products')
                     ->join('categories','products.category_id','categories.id')
                     ->select('products.*','categories.category_name')
                     ->get();
        return view('admin.stock.stock',compact('product'));

    }
    
}
