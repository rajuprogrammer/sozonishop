<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class WishlistController extends Controller
{
    //

    public function AddWishlist($id){

    	$userid = Auth::id();
    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id'=>$userid,
    		'product_id'=>$id,
    	);

    	if (Auth::check()) {
    		if($check){
    			return response()->json(['error' => 'Product Already has on your wishlist']);
    		}else{
    			DB::table('wishlists')->insert($data);
    			return response()->json(['success' => 'Successfully Added on your wishlist']);
    		}
    	}else{
    		return response()->json(['error' => 'At first login your account']);
    	}

    }

    public function RemoveWishlist($id){
        $userid = Auth::id();
        $check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->delete();

        if ($check) {
            $notification=array(
                 'messege'=>'Successfully Remove Wishlist',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Don not Remove Wishlist',
                 'alert-type'=>'error'
                       );
            return Redirect()->back()->with($notification);
        }
        
        

    }
}
