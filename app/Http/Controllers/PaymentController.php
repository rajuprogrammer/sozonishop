<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
use Session;
use Mail;
use App\Mail\InvoiceMail;
class PaymentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment(Request $request){


        $data=array();
        $data['user_id']=Auth::id();
        $data['payment_id']=uniqid();
        $data['payment_type']=$request->payment;
        $data['payning_amount']=$request->total;
        if ($request->payment=='Bkash') {
            $data['blnc_transection']=$request->bkash_transection;
            $data['payment_method']=$request->bkash;
        }elseif ($request->payment=='Rocket') {
            $data['blnc_transection']=$request->rocket_transection;
            $data['payment_method']=$request->rocket;
        }elseif ($request->payment=='Nagad') {
            $data['blnc_transection']=$request->nagad_transection;
            $data['payment_method']=$request->nagad;
        }

        $data['order_id']=uniqid();
        $data['shipping']=$request->shipping;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['color']=$request->color;
        $data['size']=$request->size;
        if (Session::has('cupon')) {
            $data['subtotal']=Session::get('cupon')['balance'];
        }else{
            $data['subtotal']=Cart::Subtotal() ;
        }
        $data['status']=0;
        $data['date']=date('Y-m-d');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status_code']=mt_rand(100000,999999); 
        $order_id=DB::table('orders')->insertGetId($data);



        // insert shipping details table
        $shipping=array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$request->name;
        $shipping['ship_email']=$request->email;
        $shipping['ship_phone']=$request->phone;
        $shipping['ship_address']=$request->address;
        $shipping['ship_city']=$request->city;

        DB::table('shippings')->insert($shipping);


        //insert data into orderdeatils
        $content=Cart::content();
        $details=array();
        foreach ($content as $row) {
            $details['order_id']= $order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->size;
            $details['quantity']=$row->qty;
            $details['singleprice']=$row->price;
            $details['totalprice']=$row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }
        Cart::destroy();
            if (Session::has('cupon')) {
                Session::forget('cupon');
            }
        $notification=array(
            'messege'=>'Your Order Successfully Done Processed',
            'alert-type'=>'success'
        );

        return Redirect()->route('home')->with($notification);

    }


    public function SuccessList(){
        $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(10)->get();
        return view('pages.returnorder',compact('order'));
    }

    public function RequestReturn($id){
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
        $notification=array(
                'messege'=>'Order Return request done please wait for out confirmationi email',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
    }

    public function orderView($id){

        $order = DB::table('orders')->where('id',$id)->first();

        $details=DB::table('order_details')
        ->join('products','order_details.product_id','products.id')
        ->select('order_details.*','products.image_one')
        ->where('order_details.order_id',$id)->get();
       return view('pages.user_order_view',compact('order','details'));

    }


}
