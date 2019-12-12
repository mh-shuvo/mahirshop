<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Banner;
use Image;
class BannerController extends Controller
{
    public function index()
    {
    	return view('admin.banner.index');
	}
	public function data()
	{
		$data = Banner::all();
		return Datatables::of($data)
		->addColumn('action',function($data){
			return '<a href="'.url('admin/product/banner/edit/').'/'.$data->id.'" class="btn btn-primary btn-sm BannerEdit"><i class="fa fa-edit"></i></a>';
		})->toJSON();
	}
	public function create()
	{
		return view('admin.banner.create');
	}
    public function AddBanner (Request $request) {
		$message = "Banner Successfully Added";
		if(isset($request->id)){
			$Banner = Banner::find($request->id);
			//UPDATE IMAGE 
			if($request->hasFile('bannerImage')){

				$old_img = public_path($Banner->banner_image);
				 if (file_exists($old_img)) {
					@unlink($old_img);
				   }

				$document = $request->file('bannerImage');
				$bannerImage = 'upload/banner/'.$request->productName.time() . '.' . $document->getClientOriginalExtension();
				Image::make($document)->resize(1920,585)->save(public_path($bannerImage));
			}
			else{
				$bannerImage = $Banner->banner_image;
			}
			$message = "Banner Successfully Updated";
		}
		else{
			$request->validate([
				'bannerName' => 'required',
				'bannerSort' => 'required',
				'bannerDes' => 'required',
				'bannerType' => 'required',
				'bannerImage' => 'required',
				'bannerStatus' => 'required',
			]);
	
			if($request->hasFile('bannerImage')){
						$document = $request->file('bannerImage');
						$bannerImage = 'upload/banner/'.$request->productName.time() . '.' . $document->getClientOriginalExtension();
						Image::make($document)->resize(1920,585)->save(public_path($bannerImage));
			}
			$Banner = new Banner;
		}

		
		
    	$Banner->user_id = Auth()->user()->id;
    	$Banner->banner_name = $request->bannerName;
    	$Banner->banner_des = $request->bannerDes;
    	$Banner->banner_sort = $request->bannerSort;
    	$Banner->banner_image = $bannerImage;
    	$Banner->banner_type = $request->bannerType;
    	$Banner->banner_status = $request->bannerStatus;
    	$Banner->save();

    	return response()->json([
    		'message' => $message
    	]);
	}
	public function edit($id)
	{
		$data = Banner::find($id);
		return view('admin.banner.create',compact('data'));
	}
}
