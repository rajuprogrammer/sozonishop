<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
// use Image;
class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function postcategory(){
    	$postcategory = DB::table('post_categories')->get();
    	return view('admin.blogpost.postcategory',compact('postcategory'));
    }

    public function storepostcategory(Request $request){
    	$validatedData = $request->validate([
            'category_name_en' =>'required|unique:post_categories|',
            'category_name_bn' =>'required|unique:post_categories|',
        ]);

        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;
        DB::table('post_categories')->insert($data);
        $notification=array(
                    'messege'=>'Successfully Insertd Post Category',
                    'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);
    }

    public function DeletePostCategory($id){
    	DB::table('post_categories')->where('id',$id)->delete();
    	$notification=array(
                    'messege'=>'Successfully Deleted Post Category',
                    'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);

    }

     public function EditPostCategory($id){
     	$postcategory = DB::table('post_categories')->where('id',$id)->first();
     	return view('admin.blogpost.edit_postcategory',compact('postcategory'));
    	
    }

     public function UpdatePostCategory(Request $request,$id){

        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;
        $postcategoryUpdate = DB::table('post_categories')->where('id',$id)->update($data);
        if ($postcategoryUpdate) {
        	$notification=array(
                    'messege'=>'Successfully Update Post Category',
                    'alert-type'=>'success'
                );
        	return Redirect()->route('postcategory')->with($notification);
        }else{
        	$notification=array(
                    'messege'=>'Nothing to Chagne Post Category',
                    'alert-type'=>'success'
                );
        	return Redirect()->route('postcategory')->with($notification);
        }
    	
    }


    public function index(){

        $post = DB::table('posts')->join('post_categories','posts.category_id','post_categories.id')->select('posts.*','post_categories.category_name_en')->get();

        return view('admin.blogpost.index',compact('post'));

    }

    public function createpost(){
        $category = DB::table('post_categories')->get();
        return view('admin.blogpost.create',compact('category'));
    }

    public function storepost(Request $request){

        $validatedData = $request->validate([
            'post_title_en' =>'required|unique:posts|max:255|',
            'post_title_bn' =>'required|unique:posts|max:255',
            'post_image' =>'required|mimes:jpeg,jpg,png,PNG,JPG,JPEG|max:1000',
            'details_en' =>'required|',
            'details_bn' =>'required|',
        ]);

        $data = array();
        $data['category_id']=$request->category_id;
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        $post_image =$request->file('post_image');

        if ($post_image) {
            $image_one_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
            $data['post_image']='public/media/post/'.$image_one_name;
            DB::table('posts')->insert($data);

            $notification=array(
                    'messege'=>'Post Insert Successfully',
                    'alert-type'=>'success'
                );
            return Redirect()->route('all.blogpost')->with($notification);

        }else{
            DB::table('posts')->insert($data);

            $notification=array(
                    'messege'=>'Post Insert Successfully',
                    'alert-type'=>'success'
                );
            return Redirect()->route('all.blogpost')->with($notification);
        }

       
    }

    public function DeletePost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);

        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
                    'messege'=>'Post Deleted Successfully',
                    'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
    }

    public function EditPost($id){
        $category = DB::table('post_categories')->get();
        $post = DB::table('posts')->where('id',$id)->first();
        return view('admin.blogpost.edit_blogpost',compact('post','category'));
    }

    public function UpdatePost(Request $request,$id){

        $validatedData = $request->validate([
            'post_title_en' =>'required|max:255|',
            'post_title_bn' =>'required|max:255',
            'post_image' =>'mimes:jpeg,jpg,png,PNG,JPG,JPEG|max:1000',
        ]);

        $old_image=$request->old_image;
        $data = array();
        $data['category_id']=$request->category_id;
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        $post_image =$request->file('post_image');

        if ($post_image) {
            
            $image_one_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
            $data['post_image']='public/media/post/'.$image_one_name;
            unlink($old_image);
            DB::table('posts')->where('id',$id)->update($data);

            $notification=array(
                    'messege'=>'Post Update Successfully',
                    'alert-type'=>'success'
                );
            return Redirect()->route('all.blogpost')->with($notification);
        }else{
            $data['post_image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);

            $notification=array(
                    'messege'=>'Post Update Successfully',
                    'alert-type'=>'success'
                );
            return Redirect()->route('all.blogpost')->with($notification);
        }
       

       

    }


}
