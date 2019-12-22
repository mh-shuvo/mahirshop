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
		public function upgrade(Request $request)
		{

			
			$request->validate([
			'package_id' => 'required',
			]);
			
			return response([
				'status' => 'success',
				'message' => 'Your Package ID is'.$request->package_id
			]);

			exit();
			if(!$this->getTxnPinCheck($request->txn_pin)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Transaction Pin Is Not Correct. Please Try again'
				],422);
			}
			$getPackage = Package::find($request->package_id);
			
			$totalPoint = $this->AvaliablePointByUser();
			if ($totalPoint->point_available < $getPackage->package_value) {
				return response()->json([
				'status' => 'error',
				'message' => 'You need more '.($getPackage->package_value - $totalPoint->point_available).' PV for upgrade your account.'
				],422);
			}
			
			$getMember = Auth::User();
			
			if ($getMember->is_premium) {
				return response()->json([
				'status' => 'error',
				'message' => 'You have already Upgrade your account to '.$getPackage->title.' .'
				],422);
			}
			
			$getMember->package_id = $getPackage->id;
			$getMember->is_premium = Carbon::now();
			$getMember->save();
			
			$getPackageTitle = 'Designation : '.$getPackage->title;
			$getMemberTree = MemberTree::where('user_id', $getMember->id)->first();
			
			if($getPackage->package_value == config('mlm.incentives.plan0.p_condition')){
				
				$getMemberTree->designation = config('mlm.incentives.plan0.name');
				$getMemberTree->save();
				
				$designationData = new Designation();
				$designationData->user_id = $getMember->id;
				$designationData->designation_title = config('mlm.incentives.plan0.title');
				$designationData->designation_name = config('mlm.incentives.plan0.name');
				$designationData->status = 'active';
				$designationData->save();
				$checkUpdate = true;
				$getPackageTitle = 'Designation : '.$designationData->designation_title.' ('.$getPackage->title.')';
			}

			Point::create([
			'user_id' => $getMember->id,
			'from_user_id' =>  $getMember->id,
			'point_amount' => $totalPoint->point_available,
			'point_flow' => 'out',
			'point_details' => 'You have Upgrade your account with '.$totalPoint->point_available.' PV',
			'point_status' => 'active'
			]);
			
			new SendSmsController([Auth::User()->phone],'Your Account successfully upgrade to Premium with '.$totalPoint->point_available.' PV','upgrade');
			
			return response()->json([
			'status' => 'success',
			'package_name' => $getPackageTitle,
			'message' => 'Your account successfully upgrade to Premium'
			]);
		}
		public function renew(Request $request){
			$request->validate([
			'package_id' => 'required',
			]);
			
			return response([
				'status' => 'success',
				'message' => 'Your Package ID is'.$request->package_id
			]);
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
				