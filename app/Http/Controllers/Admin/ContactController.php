<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ContactController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

   public function AllContact(){
   	$contact = DB::table('contacts')->get();
   	return view('admin.contact.allcontact',compact('contact'));
   }
}
