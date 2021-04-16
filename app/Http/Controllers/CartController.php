<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Auth;
use Session;
class CartController extends Controller
{
    public function AddCart($id){
    	$product = DB::table('products')->where('id',$id)->first();
    	$data = array();
    	 if ($product->discount_price == NULL) {
    	  	$data['id']=$product->id;
    	    $data['name']=$product->product_name;
    	    $data['qty']=1;
    	    $data['price']= $product->selling_price;         
    	    $data['weight']=1;
    	    $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
    	    Cart::add($data);
    	   return response()->json(['success' => 'Successfully Added on your Cart']);
    	   }else{
    	    	$data['id']=$product->id;
    	    	$data['name']=$product->product_name;
    	    	$data['qty']=1;
    	    	$data['price']= $product->discount_price;         	
    	    	$data['weight']=1;
    	    	$data['options']['image']=$product->image_one;  
            	$data['options']['color']='';
            	$data['options']['size']=''; 
    	        Cart::add($data);  
    	        return response()->json(['success' => 'Successfully Added on your Cart']);   
    	 }
    	
    }

    public function AddWislistCart()
    {
        $product = DB::table('products')->where('id',$id)->first();
        $data = array();
         if ($product->discount_price == NULL) {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']= $product->selling_price;         
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
            Cart::add($data);
           return response()->json(['success' => 'Successfully Added on your Cart']);
           }else{
                $data['id']=$product->id;
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;;
                $data['price']= $product->discount_price;           
                $data['weight']=1;
                $data['options']['image']=$product->image_one;  
                $data['options']['color']='';
                $data['options']['size']=''; 
                Cart::add($data);  
                return response()->json(['success' => 'Successfully Added on your Cart']);   
         }
    }


    public function check(){
    	$content=Cart::content();
    	return response()->json($content);
    }

    public function showCart(){
        $cart = Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function removeCart($rowId){
        $cart = Cart::remove($rowId);
        $notification=array(
            'messege'=>'Successfully Remove Cart',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification); 

    }


    public function UpdateCart(Request $request){
        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }

// work here up coming



    public function InsertCart(Request $request){
       $id = $request->product_id;
       $product = DB::table('products')->where('id',$id)->first();
        $data = array();
         if ($product->discount_price == NULL) {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']= $product->selling_price;         
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']=$request->color;
            $data['options']['size']=$request->size;
            Cart::add($data);
            $notification=array(
                    'messege'=>'Successfully Added',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
           }else{
                $data['id']=$product->id;
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;
                $data['price']= $product->discount_price;           
                $data['weight']=1;
                $data['options']['image']=$product->image_one;  
                $data['options']['color']=$request->color;
                $data['options']['size']=$request->size; 
                Cart::add($data);  
                $notification=array(
                    'messege'=>'Successfully Added',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);  
         }
    }

    public function Checkout(){

        if(Auth::check()){
            $cart = Cart::content();
            return view('pages.checkout',compact('cart'));
        }else{
            $notification=array(
                    'messege'=>'AT First Login Your Account',
                    'alert-type'=>'success'
                    );
            return Redirect()->route('login')->with($notification); 
        }
    }

    public function Wishlist(){
        $userid = Auth::id();
        $cart = DB::table('wishlists')->join('products','wishlists.product_id','products.id')->select('products.*','wishlists.user_id')->where('wishlists.user_id',$userid)->get();

        return view('pages.wishlist',compact('cart'));

    }

    public function removeWishlist($id){

        $wishlists = DB::table('wishlists')->where('id',$id)->delete();
        $notification=array(
                    'messege'=>'Successfully Remove Wishlist',
                    'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification); 
    }

    public function Coupon(Request $request){

        $coupon = $request->cupon;
        $check =DB::table('cupons')->where('cupon',$coupon)->first();
        if ($check) {
            Session::put('cupon',[
                'name'=> $check->cupon,
                'discount'=> $check->discount,
                'blance'=> str_replace(',','',Cart::Subtotal()) - $check->discount
            ]);
            $notification=array(
                    'messege'=>'Successfully Coupon Applied',
                    'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);

        }else{
            $notification=array(
                    'messege'=>'Invalid Coupon',
                    'alert-type'=>'error'
                    );
            return Redirect()->back()->with($notification); 
        }
    }


    public function CouponRemove(){

        session::forget('cupon');
        return Redirect()->back(); 
    }





}
