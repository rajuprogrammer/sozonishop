<?php

namespace App\Http\Controllers\Admin\Cupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Cupon;
use DB;

class CuponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function cupon(){
    	$cupon = DB::table('cupons')->get();
    	return view('admin.cupon.cupon',compact('cupon'));
    }

    public function storecupon(Request $request){
    	$validatedData = $request->validate([
		    'cupon' =>'required',
		    'discount' =>'required|',
		]);

		$data=array();
		$data['cupon']=$request->cupon;
		$data['discount']=$request->discount;
		DB::table('cupons')->insert($data);
		$notification=array(
            'messege'=>'Cupon Inserted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }


    public function DeleteCupon($id){
    	DB::table('cupons')->where('id',$id)->delete();
    	$notification=array(
            'messege'=>'Cupon Deleted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }


    public function EditCupon($id){
    	$cupon = DB::table('cupons')->where('id',$id)->first();
    	return view('admin.cupon.edit_cupon',compact('cupon'));

    }

    public function UpdateCupon(Request $request,$id){
    	$data=array();
		$data['cupon']=$request->cupon;
		$data['discount']=$request->discount;
		DB::table('cupons')->where('id',$id)->update($data);
		$notification=array(
            'messege'=>'Cupon Update Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->route('admin.cupon')->with($notification);
    }

    public function Seo()
    {
        $seo=DB::table('seo')->first();
        return view('admin.cupon.seo',compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id=$request->id;
         $data=array();
         $data['meta_title']=$request->meta_title;
         $data['meta_author']=$request->meta_author;
         $data['meta_tag']=$request->meta_tag;
         $data['meta_description']=$request->meta_description;
         $data['google_analytics']=$request->google_analytics;
         $data['bing_analytics']=$request->bing_analytics;
         DB::table('seo')->where('id',$id)->update($data);
         $notification=array(
                 'messege'=>'SEO Updated',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }



}
