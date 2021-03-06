<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Yajra\Datatables\Datatables;
	use App\Traits\UserTrait;
	use App\Traits\StockTrait;
	use App\MemberBonus;
	use App\MemberTree;
	use App\Point;
	use App\Product;
	use App\User;
	use App\TopupBalance;
	use App\Dealer;
	use App\StockManager;
	use Illuminate\Support\Facades\Auth;
	
	class ReportController extends Controller
	{
		use UserTrait,StockTrait;
		public function data(Request $request)
		{
			$data = MemberBonus::where('user_id',Auth::user()->id)->where('bonus_type',$request->type)->get();
			return Datatables::of($data)
			->toJSON();
		}
		public function sales()
		{
			$users = User::where('user_type','user')->get();
			return view('admin.report.sales',compact('users'));
		}
		public function stock()
		{
			return view('admin.report.stock');
		}
		
		public function stockData()
		{
			$data = Product::all();
			return Datatables::of($data)
			->addColumn('stock',function($data){
				$stock = $this->getAvailableStockByUser(null,$data->id);
				return 'In : '.$stock['stock_in'].' | Out : '.$stock['stock_out'].' | Available : '.$stock['available_stock'];
			})
			->addColumn('action',function($data){
				if(Auth::user()->hasAnyRole(['admin', 'manager'])){
					return '<button class="btn btn-primary btn-sm addStock" data-product_id="'.$data->id.'">Add Stock</button>';
					}else{
					return '';
				}
			})
			->toJSON();
		}
		public function stockAdd(Request $request)
		{
			$data = new StockManager;
			$data->user_id = Auth::User()->id;
			$data->delivery_user_id = null;
			$data->product_id = $request->product_id;
			$data->product_qty = $request->quantity;
			$data->stock_flow = 'in';
			$data->stock_status = 'Delivered';
			$data->save();
			
			$totalStockPV = $data->Product->product_point * $request->quantity;
			
			Point::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  Auth::User()->id,
			'point_amount' => $totalStockPV,
			'point_flow' => 'in',
			'point_details' => 'You have received '.$totalStockPV.' PV for new stock of '.$data->Product->product_name.' and product quantity is '.$request->quantity,
			'point_status' => 'active'
			]);
			
			return response()->json([
            'status' => 'success',
            'message' => 'Stock Successfully Added' 
			]);
		}
		
		public function generation()
		{
			return view('admin.report.generation');
		}
		public function transfered()
		{
			$users = User::where('user_type','user')->get();
			return view('admin.report.transfered',compact('users'));
		}public function SponsoreIncome()
		{
			return view('admin.report.sponsore_income');
		}
		public function MatchingIncome()
		{
			return view('admin.report.matching_income');
		}
		public function MatchingRoyaltyIncome()
		{
			return view('admin.report.matching_royalty_income');
		}
		public function Incentive()
		{
			return view('admin.report.incentive');
		}
		public function AchieverRoyaltyIncome()
		{
			return view('admin.report.achiever_royalty_income');
		}
		public function ClubAchiver()
		{
			return view('admin.report.club_achiver');
		}
		
		public function StockiestIncome()
		{
			return view('admin.report.stockiest_income');
		}
		public function StockiestSponsorIncome()
		{
			return view('admin.report.stockiest_sponsor_income');
		}
		
		public function DailyCashBack()
		{
			return view('admin.report.daily_cashback');
		}
		public function DailyCashBackRe()
		{
			return view('admin.report.daily_cashback_re');
		}
		
		public function Signup()
		{
			return view('admin.report.signup');
		}
		public function Order()
		{
			return view('admin.report.order');
		}
		
		public function SignupData()
		{
			$data = User::where('register_by',Auth::user()->id)->get();
			return Datatables::of($data)->toJSON();
		}
		public function OrderData()
		{
			$data = TopupBalance::where('user_id',Auth::user()->id)->where('is_order','1')->get();
			return Datatables::of($data)->toJSON();
		}
		
		public function SponsoreList()
		{
			return view('admin.report.sponsor_list');
		}
		
		public function SponsoreListData()
		{
			$data = MemberTree::where('sponsor_id',Auth::user()->id)->whereNotNull('sponsor_id')->get();
			
			return Datatables::of($data)
			->addColumn('name',function($data){
				return $data->sponsor_id ? $data->Sponsor->name : '';
			})
			->addColumn('username',function($data){
				return $data->sponsor_id ? $data->Sponsor->username: '';
			})
			->addColumn('created_at',function($data){
				return $data->sponsor_id ? $data->Sponsor->created_at : '';
			})
			->addColumn('status',function($data){
				
				if( $data->sponsor_id){
					if($data->Sponsor->is_premium !=null){
						return $data->Sponsor->is_premium;
					}
					else{
						return 'Member';
					}
				}
				else{
					return '';
				}
			})
			->toJSON();
		}
		
	}
