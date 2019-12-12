<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Unit;

class UnitController extends Controller
{
    public function index()
    {
    	return view('admin.unit.index');
    }
    public function data()
    {
    	$Unit = Unit::select('id','unit_name','unit_sort','unit_status');
            return Datatables::of($Unit)
            ->addColumn('action', function (Unit $data){
                return '<a href="javascript:void(0)" class="btn btn-info btn-sm unitEdit" id="'.$data->id.'" unit_name="'.$data->unit_name.'"  unit_sort="'.$data->unit_sort.'" unit_status="'.$data->unit_status.'">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm unitDelete" data-id="'.$data->id.'">Delete</a>';
            })
            ->toJson();
    }
    public function store(Request $request)
    {
    	$request->validate([
            'unitName' => 'required',
            'unitSort' => 'required',
            'unitStatus' => 'required',
        ]);

        if (!empty($request->unit_id)) {
            $Unit = Unit::find($request->unit_id);
            $message = "Unit Updated";
            } else {
            $Unit = new Unit;
            $message = "Unit Saved";
        }

        $Unit->user_id = '1';
        // $Unit->user_id = Auth()->user()->id;
        $Unit->unit_name = $request->unitName;
        $Unit->unit_sort = $request->unitSort;
        $Unit->unit_status = $request->unitStatus;
        $Unit->save();
    }
    public function delete (Request $request) {
        Unit::find($request->id)->delete();
        return response()->json([
            'message' => 'Unit Deleted'
        ]);
    }
}
