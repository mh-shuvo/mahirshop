<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Brand;


class BrandController extends Controller
{
    public function index () {
       return view('admin.brand.index');
    }

    public function store(Request $request) {
        $request->validate([
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
        $Brand->save();
    }

    public function data()
    {
        $Brand = Brand::select('id','brand_name','brand_sort','brand_status');
            return Datatables::of($Brand)
            ->addColumn('action', function (Brand $data){
                return '<a href="javascript:void(0)" class="btn btn-info btn-sm brandEdit" id="'.$data->id.'" brand_name="'.$data->brand_name.'"  brand_sort="'.$data->brand_sort.'" status="'.$data->brand_status.'">Edit</a>
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
