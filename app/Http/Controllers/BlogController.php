<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class BlogController extends Controller
{
    public function blog(){

    	$post = DB::table('posts')->join('post_categories','posts.category_id','post_categories.id')->select('posts.*','post_categories.category_name_en','post_categories.category_name_bn')->paginate(10);
    	return view('pages.blog',compact('post'));
  
    }

    public function English(){
    	Session::get('lang');
    	session()->forget('lang');
    	Session::put('lang','english');
    	return redirect()->back();
    }

    public function Bangla(){
    	Session::get('lang');
    	session()->forget('lang');
    	Session::put('lang','bangla');
    	return redirect()->back();
    }

    public function PostDetails($id){

    	$post_details = DB::table('posts')->where('id',$id)->get();
    	return view('pages.post_details',compact('post_details'));

    }
}
