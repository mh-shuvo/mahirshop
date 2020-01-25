<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Category;
use Image;

class CategoryController extends Controller
{
    public function data () {
        $Category = Category::all();
            return Datatables::of($Category)
            ->addColumn('action', function (Category $data){
                return '<a href="javascript:vodi(0)" class="btn btn-info btn-sm categoryEdit" id="'.$data->id.'" category_name="'.$data->category_name.'" category_sort="'.$data->category_sort.'" category_featured="'.$data->category_featured.'" category_status="'.$data->category_status.'">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm categoryDelete" id="'.$data->id.'">Delete</a>';
            })
            ->toJson();
    }

    public function index () {
        return view('admin.category.index');
    }

    public function store (Request $request) {

        $message = 'Category Successfully Added';

            $request->validate([
            'categoryName' => 'required',
            'categorySort' => 'required',
            'Featured' => 'required',
            'categoryStatus' => 'required',
            'categorylogo' => 'required',
            ]);

            if(isset($request->categoryId)){
                $message = 'Category Successfully Updated';
                $Category = Category::find($request->categoryId); 
                
                 if($request->hasFile('categorylogo')){
                    $old_img = public_path($Category->image);
                    if (file_exists($old_img)) {
                        @unlink($old_img);
                    }
                }

            }else{

                $Category = new Category;
                $Category->user_id = Auth()->user()->id;

            }

            if($request->hasFile('categorylogo')){
                $document = $request->file('categorylogo');
                $categorylogo = 'upload/categorylogo/'.$request->categoryName.time() . '.' . $document->getClientOriginalExtension();
                Image::make($document)->resize(500,600)->save(public_path($categorylogo));
            }

            
            $Category->category_name = $request->categoryName;
            $Category->category_sort = $request->categorySort;
            $Category->category_featured = $request->Featured;
            $Category->image = $categorylogo;
            $Category->category_status = $request->categoryStatus;
            $Category->save();

            
            return response([
                "status" => "success",
                "message" => $message
            ]);
    }

    public function delete (Request $request) {
        Category::find($request->id)->delete();
        return response()->json([
            'message' => "Category Deleted"
        ]);
    }
}
