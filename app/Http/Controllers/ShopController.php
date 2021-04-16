<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ShopController extends Controller
{
    public function index()
    {
    	$products = DB::table('products')->where('status',1)->get();

        $brands= DB::table('products')->get();

        $category = DB::table('categories')->orderBy('id','ASC')->limit(7)->get();
        return view('pages.shop',compact('products','brands','category'));

    }
}
