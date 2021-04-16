<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SiteSetting(){
    	$setting=DB::table('sitesettings')->first();
    	return view('admin.setting.site_setting',compact('setting'));
    }


    public function UpdateSetting(Request $request)
    {
    	 $id=$request->id;
    	 $data=array();
    	 $data['phone_one']=$request->phone_one;
    	 $data['phone_two']=$request->phone_two;
    	 $data['email']=$request->email;
    	 $data['address']=$request->address;
    	 $data['facebook']=$request->facebook;
    	 $data['youtube']=$request->youtube;
    	 $data['rss']=$request->rss;
    	 $data['twitter']=$request->twitter; 
    	 $data['google_plus']=$request->google_plus; 
    	 $data['pinterest']=$request->pinterest; 
    	 $data['linkedin']=$request->linkedin; 
    	 DB::table('sitesettings')->where('id',$id)->update($data);
    	 $notification=array(
                 'messege'=>'Setting Update',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function DatabaseBackup(){
        return view('admin.setting.db_backup')->with('files',File::allFiles('storage/app/Laravel'));
    }

    public function BackupNow(){

        \Artisan::call('backup:run');
        $notification=array(
                 'messege'=>'Successfully Database Back',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }


    public function DeleteDatabase($getFilename){

        Storage::delete('Laravel/'.$getFilename);
        $notification=array(
                 'messege'=>'Successfully Database Delete',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);

    }

    public function DownloadDatabase($getFilename){
        $path = storage_path('app\Laravel/'.$getFilename);
        return response()->download($path);

    }


    public function Developer(){
        return view('admin.setting.developer');
    }

    public function AllDeveloper(){
        
        $developer = DB::table('developers')->get();
        return view('admin.setting.alldeveloper',compact('developer'));
    }

    public function StoreDeveloper(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'details' => 'required|',
        ]); 

        $data=array();
        $data['name']=$request->name;
        $data['position']=$request->position;
        $data['details']=$request->details;


        // return response()->json($data);

        $images =$request->file('images');

        if ($images) {
            $image_one_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(300,300)->save('public/media/developer/'.$image_one_name);
            $data['images']='public/media/developer/'.$image_one_name;
            $developer = DB::table('developers')->insert($data);
            $notification=array(
                        'messege'=>'Product Inserted Successfully',
                        'alert-type'=>'success'
                    );
            return Redirect()->route('admin.all.developer')->with($notification);
        }

       
    }

    public function DeleteDeveloper($id){

        DB::table('developers')->where('id',$id)->delete();
        $notification=array(
                        'messege'=>'Successfully Deleted Developer',
                        'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
    }

    public function EditDeveloper($id){
        $developer = DB::table('developers')->where('id',$id)->first();
        return view('admin.setting.editdeveloper',compact('developer'));
    }


    public function UpdateDeveloper(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'details' => 'required|',
        ]); 


        $oldlogo = $request->oldlogo;
        $data=array();
        $data['name']=$request->name;
        $data['position']=$request->position;
        $data['details']=$request->details;


        $images =$request->file('images');

        if ($images) {
            unlink($oldlogo);
            $image_one_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(300,300)->save('public/media/developer/'.$image_one_name);
            $data['images']='public/media/developer/'.$image_one_name;

            $developer = DB::table('developers')->where('id',$id)->update($data);
            $notification=array(
                        'messege'=>'Successfully Developer Updated',
                        'alert-type'=>'success'
                    );
            return Redirect()->route('admin.all.developer')->with($notification);
        }else{
            $developer = DB::table('developers')->where('id',$id)->update($data);
            $notification=array(
                        'messege'=>'Successfully Developer Updated',
                        'alert-type'=>'success'
                    );
            return Redirect()->route('admin.all.developer')->with($notification);
        }

    }


}
