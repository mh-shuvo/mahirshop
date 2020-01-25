<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\CategoryGallery;
use App\Gallery;
use Image;

class GalleryController extends Controller
{

    /*Categorty Gallery Section Start*/
    public function index(){
    	return view('admin.gallery.category_gallery_index');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        if (!empty($request->gallery_id)) {
            $cat_gallery = CategoryGallery::find($request->gallery_id);
            $message = "gallery Updated";
            } else {
            $cat_gallery = new CategoryGallery;
            $message = "gallery Saved";
        }

        $cat_gallery->name = $request->name;
        $cat_gallery->status = $request->status;
        $cat_gallery->save();
    }

    public function data()
    {
        $cat_gallery = CategoryGallery::all();
            return Datatables::of($cat_gallery)
            ->addColumn('action', function (CategoryGallery $data){
                return '<a href="javascript:void(0)" class="btn btn-info btn-sm galleryEdit" 
                id="'.$data->id.'" 
                name="'.$data->name.'" 
				status="'.$data->status.'"

				>Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm galleryDelete" id="'.$data->id.'">Delete</a>';
            })
            ->toJson();
    }

    public function delete (Request $request) {
        CategoryGallery::find($request->id)->delete();
        return response()->json([
        'message' => 'Category Gallery deleted'
        ]);
    }
    /*Categorty Gallery Section End*/





    /*Gallery Section Start*/
    public function galleryIndex (){
        $gal_category= CategoryGallery::all();
        return view('admin.gallery.gallery_index',compact('gal_category'));
    }

    public function galleryStore (Request $request) {
        $image = "";
        $message = "Gallery Successfully Added";

        if(isset($request->gallery_id)){
            $Gallery = Gallery::find($request->gallery_id);
            //UPDATE IMAGE
            if($request->type == 'image'){
                if($request->hasFile('image')){

                    $old_img = public_path($Gallery->image);
                     if (file_exists($old_img)) {
                        @unlink($old_img);
                       }

                    $document = $request->file('image');
                    $file = 'upload/gallery/'.$request->title.time() . '.' . $document->getClientOriginalExtension();
                    Image::make($document)->resize(400,300)->save(public_path($file));
                }
                else{
                    $file = $Gallery->image;
                }
            }
            else{
                $file = $request->video;
            }

            $message = "Gallery Successfully Updated";
        }
        else{
            $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'type'=>'required',
            'status'=>'required',
            'category'=>'required',
            ]);

            if($request->type == 'image'){
                if($request->hasFile('image')){
                            $document = $request->file('image');
                            $file = 'upload/gallery/'.$request->title.time() . '.' . $document->getClientOriginalExtension();
                      
                            Image::make($document)->resize(400,300)->save(public_path($file));
                }
            }
            else{
                  $file = $request->video;
            }
            $Gallery = new Gallery;
        }
        
        $Gallery->title = $request->title;
        $Gallery->desc = $request->desc;
        $Gallery->image =$file;
        $Gallery->type = $request->type;
        $Gallery->gal_cat_id = $request->category;
        $Gallery->status = $request->status;
        $Gallery->save();

        return response()->json([
            'message' => $message
        ]);
    }

    public function galleryData()
    {
        $data = Gallery::all();
            return Datatables::of($data)
            ->addColumn('action', function ($data){
                return '<a href="javascript:void(0)" class="btn btn-info btn-sm galleryEdit" 
                id="'.$data->id.'" 
                title="'.$data->title.'"  
                desc="'.$data->desc.'" 
                gal_cat_id="'.$data->gal_cat_id.'"
                image="'.$data->image.'"
                type="'.$data->type.'"
                status="'.$data->status.'"

                >Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm galleryDelete" id="'.$data->id.'">Delete</a>';
            })
            ->addColumn('gal_cat_id',function($data){
                return $data->categoryGallery->name;
            })
            ->addColumn('image',function($data){
                if($data->type == 'video' && $data->image !=''){
                    $fetch=explode("/",$data->image);
                    $videoid=$fetch[3];
                    return "http://img.youtube.com/vi/".$videoid."/0.jpg";
                }
                else{
                    return $data->image;
                }
            })
            ->toJson();
    }

    public function gallerydelete(Request $request){
        Gallery::find($request->id)->delete();
        return response()->json([
        'message' => 'Gallery deleted'
        ]);
    }




    /*Gallery Section end*/


}
