<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Category;

class CategoryController extends Controller
{
    public function data () {
        $Category = Category::select('id','category_name','category_sort','category_featured', 'category_status');
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
        $request->validate([
            'categoryName' => 'required',
            'categorySort' => 'required',
            'Featured' => 'required',
            'categoryStatus' => 'required',
        ]);

        if (!empty($request->categoryId)) {
            $Category = Category::find($request->categoryId);
            $message = "Category Updated";
            } else {
            $Category = new Category;
            $message = "Category Saved";
        }

        $Category->user_id = '1';
        // $Category->user_id = Auth()->user()->id;
        $Category->category_name = $request->categoryName;
        $Category->category_sort = $request->categorySort;
        $Category->category_featured = $request->Featured;
        $Category->category_status = $request->categoryStatus;
        $Category->save();
    }

    public function delete (Request $request) {
        Category::find($request->id)->delete();
        return response()->json([
            'message' => "Category Deleted"
        ]);
    }
}
