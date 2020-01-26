<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Brand;
use Image;


class BrandController extends Controller
{
    public function index () {
       return view('admin.brand.index');
    }

    public function store(Request $request) {
       /* $request->validate([
            'brandName'=>'required',
            'brandSort'=>'required',
            'brandStatus'=>'required',
        ]);

        if (!empty($request->brand_id)) {
            $Brand = Brand::find($request->brand_id);
            $message = "Brand Updated";
            } else {
            $Brand = new Brand;
            $message = "Brand Saved";
        }

        $Brand->brand_name = $request->brandName;
        $Brand->brand_sort = $request->brandSort;
        $Brand->brand_status = $request->brandStatus;
        $Brand->user_id = "1";
        // $Brand->user_id = Auth()->user()->id;
        $Brand->save();*/


        $message = 'Brand Successfully Added';

            $request->validate([
                'brandName'=>'required',
                'brandSort'=>'required',
                'brandStatus'=>'required',
                'brandlogo'=>'required',
            ]);

            if(isset($request->brand_id)){
                $message = 'Brand Successfully Updated';
                $Brand = Brand::find($request->brand_id); 
                
                 if($request->hasFile('brandlogo')){
                    $old_img = public_path($Brand->image);
                    if (file_exists($old_img)) {
                        @unlink($old_img);
                    }
                }

            }else{

                $Brand = new Brand;
                $Brand->user_id = Auth()->user()->id;

            }

            if($request->hasFile('brandlogo')){
                $document = $request->file('brandlogo');
                $brandlogo = 'upload/brandlogo/'.$request->brandName.time() . '.' . $document->getClientOriginalExtension();
                Image::make($document)->resize(400,500)->save(public_path($brandlogo));
            }

            $Brand->brand_name = $request->brandName;
            $Brand->brand_sort = $request->brandSort;
            $Brand->brand_status = $request->brandStatus;
            $Brand->image = $brandlogo;
            $Brand->save();


            
            return response([
                "status" => "success",
                "message" => $message
            ]);
    }

    public function data()
    {
        $Brand = Brand::all();
            return Datatables::of($Brand)
            ->addColumn('action', function (Brand $data){
                return '<a href="javascript:void(0)" class="btn btn-info btn-sm brandEdit" id="'.$data->id.'" brand_name="'.$data->brand_name.'"  image="'.$data->image.'" brand_sort="'.$data->brand_sort.'" status="'.$data->brand_status.'">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm brandDelete" id="'.$data->id.'">Delete</a>';
            })
            ->toJson();
    }

    public function delete (Request $request) {
        Brand::find($request->id)->delete();
        return response()->json([
        'message' => 'Brand deleted'
        ]);
    }

}
