<?php

namespace App\Http\Controllers\Frontend\Newslater;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class NewslaterController extends Controller
{
    public function StoreNewslater(Request $request){
    	$validatedData = $request->validate([
		    'email' =>'required|unique:newslaters|max:55',
		]);

		$data=array();
		$data['email']=$request->email;
		DB::table('newslaters')->insert($data);
		$notification=array(
            'messege'=>'Thanks for Subscribe',
            'alert-type'=>'success'
            );
        	return Redirect()->back()->with($notification);

    }

    public function ShowTracking(){

        return view('pages.track');
    }

    public function OrderTracking(Request $request){

        $code = $request->status_code;
        $track = DB::table('orders')->where('status_code',$code)->first();

        if ($track) {
            return view('pages.tracking',compact('track'));
            
        }else{
            $notification=array(
            'messege'=>'Status Code Invalid',
            'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ProductSearch(Request $request){

        $category =DB::table('categories')->get();

        $brands=DB::table('brands')->limit(8)->get();
        $item=$request->search;
        $products=DB::table('products')
            // ->join('brands','products.brand_id','brands.id')
            // ->select('products.*','brands.brand_name')
            ->where('product_name','LIKE', "%{$item}%")
            // ->orWhere('brand_name','LIKE', "%{$item}%")
            ->paginate(20);
        return view('pages.search',compact('brands','products','category'));  
    }

}
