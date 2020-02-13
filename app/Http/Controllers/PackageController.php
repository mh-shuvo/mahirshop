<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Yajra\Datatables\Datatables;
	use App\MemberTree;
	use App\Package;
	use App\Designation;
	use App\MemberBonus;
	use App\Point;
	use App\Traits\PointTrait;
	use App\Traits\UserTrait;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Carbon;
	
	class PackageController extends Controller
	{
		use PointTrait,UserTrait;
		
		public function Packages(){
			return view('admin.packages');
		}

		public function AddPackage (Request $request) {
			
			$request->validate([
			'title'=>'required',
			'package_type'=>'required',
			'package_value'=>'required',
			'package_details'=>'required',
			'is_default'=>'required',
			'package_status'=>'required',
			]);
			
			if (!empty($request->id)) {
				$Package = Package::find($request->id);
				$message = "Package Updated";
				} else {
				$Package = new Package;
				$message = "Package Saved";
			}
			
			$Package->title          = $request->title;
			$Package->package_type   = $request->package_type;
			$Package->package_value  = $request->package_value;
			$Package->package_details= $request->package_details;
			$Package->is_default     = $request->is_default;
			$Package->package_status = $request->package_status;
			$Package->save();
			
			return response()->json([
			'status' => 'success',
			'message' => $message
			],422);
		}
		
		public function PackageList()
		{
			
			$Package = Package::orderBy('id','desc')->get();
			
			$data = Datatables::of($Package)
			->addColumn('action', function (Package $Package){
				return '<a href="javascript:void(0)" class="btn btn-info btn-sm packageEdit" package_id="'.$Package->id.'" title="'.$Package->title.'" package_type="'.$Package->package_type.'" package_value="'.$Package->package_value.'" package_details="'.$Package->package_details.'" is_default="'.$Package->is_default.'" package_status="'.$Package->package_status.'">Edit</a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm packageDelete" package_id="'.$Package->id.'">Delete</a>';
			})
			
			->toJson();
			return $data;
		}
		
		public function PackageDelete($id)
		{
			$data = Package::find($id);
			$data->delete();
			
			return response([
			"status" => "Success"
			]);
		}
		
	}
