<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function TodayOrder()
    {
    	$today=date('d-m-y');
    	$order=DB::table('orders')->where('status',0)->where('date',$today)->get();
    	return view('admin.report.today_order',compact('order'));
    }

    public function TodayDelevered()
    {
       	$today=date('d-m-y');
    	$order=DB::table('orders')->where('status',2)->where('date',$today)->get();
    	return view('admin.report.today_order',compact('order'));
    }

    public function ThisMonth()
    {
    	$month=date('F');
    	$order=DB::table('orders')->where('status',3)->where('month',$month)->get();
    	return view('admin.report.today_order',compact('order'));
    }

    public function search()
    {
    	 return view('admin.report.search');
    }

    public function searchByYear(Request $request)
    {
    	 $year=$request->year;
    	 $total=DB::table('orders')->where('status',3)->where('year',$year)->sum('total');
         $order=DB::table('orders')->where('status',3)->where('year',$year)->get();
         return view('admin.report.search_report',compact('order','total'));

    }

    public function searchByMonth(Request $request)
    {
        $month=$request->month;
    	 $total=DB::table('orders')->where('status',3)->where('month',$month)->sum('total');
         $order=DB::table('orders')->where('status',3)->where('month',$month)->get();
         return view('admin.report.search_report',compact('order','total'));
    }

    public function searchByDate(Request $request)
    {
    	  $date=$request->date;
    	  $date=date('Y-m-d');
          // $newdate = date("'Y-m-d", strtotime($date));
          $total=DB::table('orders')->where('status',3)->where('date',$date)->sum('total');
          $order=DB::table('orders')->where('status',3)->where('date',$date)->get();
         return view('admin.report.search_report',compact('order','total'));
    }

}
