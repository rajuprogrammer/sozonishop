<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ContactController extends Controller
{
    public function index(){
    	return view('pages.contact');
    }


    public function StoreContact(Request $request){
    	$validated = $request->validate([
        	'name' => 'required|max:255',
        	'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        	'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        	'message' => 'required|',
    	]);

    	$data = array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['message']=$request->message;

    	DB::table('contacts')->insert($data);
    	$notification=array(
            'messege'=>'Thank You for Contact to us.',
            'alert-type'=>'success'
            );
        return Redirect()->to('/')->with($notification);
    }

    public function faq(){
        return view('pages.faq');
    }

    public function TermsCondition(){
        return view('pages.termsconditon');            
    }

    public function ErrorPage(){
        return view('pages.404');
    }
}
