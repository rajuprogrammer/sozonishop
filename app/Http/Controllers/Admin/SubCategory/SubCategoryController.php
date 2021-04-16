<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use DB;


class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategory(){
    	$category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')
                        ->join('categories','subcategories.category_id','categories.id')
                        ->select('subcategories.*','category_name')
                        ->get();
    	return view('admin.subcategory.subcategory',compact('category','subcategory'));
    }

    public function storesubcategory(Request $request){
        $validatedData = $request->validate([
            'category_id' =>'required',
            'subcategory_name' =>'required|',

        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'messege'=>'Sub Category Inserted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

    }

    public function DeleteSubcat($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Sub Category Deleted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function EditSubcat($id){
        $subcat = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.subcategory.edit_subcategory',compact('subcat','category'));
    }

    public function UpdateSubcat(Request $request,$id){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Sub Category Updated Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->route('sub.categories')->with($notification);

    }


   
}
