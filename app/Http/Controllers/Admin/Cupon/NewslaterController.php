<?php

namespace App\Http\Controllers\Admin\Cupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewslaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function newslater(){
    	$newslater = DB::table('newslaters')->get();
    	return view('admin.cupon.newslater',compact('newslater'));
    }

    public function DeleteNews($id){
    	DB::table('newslaters')->where('id',$id)->delete();
    	$notification=array(
            'messege'=>'Newslater Deleted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
