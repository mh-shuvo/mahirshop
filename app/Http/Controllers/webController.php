<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use App\User;
	use App\Traits\UserTrait;
	use App\Traits\TopupTrait;
	use App\Traits\StockTrait;
	use App\Traits\PointTrait;
	use App\MemberTree;
	use App\MemberBonus;
	use App\Banner;
	use App\Product;
	use App\Category;
	use App\Brand;
	use App\Point;
	use App\Country;
	use App\Divisions;
	use App\Districts;
	use App\Upazila;
	use App\Dealer;
	use App\StockManager;
	use App\Orders;
	use App\TopupBalance;
	use Auth;
	use Cog\Laravel\Optimus\Facades\Optimus;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Carbon;
	
	class webController extends Controller
	{
		use UserTrait,TopupTrait,StockTrait,PointTrait;
		
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		public function index(){
			$banners = Banner::where('banner_type','Slide')->where('banner_status','active')->get();
			$featured_products = Product::where('product_featured','True')->where('product_status','Active')->get();
			$featured_products_random = Product::where('product_featured','True')->where('product_status','Active')->inRandomOrder()->limit(3)->get();
			$products = Product::get();
			$categorys = Category::all();
			$rand_products = Product::inRandomOrder()->get();
			return view ('welcome',compact('banners','categorys','featured_products','products','featured_products_random','rand_products'));
		}
		
		public function login(){
			return view ('login');
		}
		
		public function contactus(){
			$categorys = Category::all();
			return view ('contactus',compact('categorys'));
		}
		
		public function aboutus(){
			$categorys = Category::all();
			return view ('aboutus',compact('categorys'));
		}

		public function Gallery(){
			$categorys = Category::all();
			return view('gallery',compact('categorys'));
		}

		public function Achivers(){
			$categorys = Category::all();
			return view('achivers',compact('categorys'));
		}
		
		public function Shop(){
			$products = Product::where('product_status','Active')->paginate(9);
			$categorys = Category::get();
			$brands = Brand::get();
			$rand_products = Product::inRandomOrder()->limit(4)->get();
			return view ('shop',compact('products','categorys','brands','rand_products'));
		}
		
		public function SingleProduct($id){
			$product = Product::find($id);
			$related_products = Product::where('category_id',$product->id)->get();
			return view('product',compact('product','related_products'));
		}
		
		public function ProductByCategory($id){
			$categorys = Category::get();
			$brands = Brand::get();
			$products = Product::where('category_id',$id)->paginate(6);
			$rand_products = Product::inRandomOrder()->limit(4)->get();
			return view('shop',compact('categorys','brands','products','rand_products'));
		}
		
		public function ProductByBrand($id){
			$categorys = Category::get();
			$brands = Brand::get();
			$products = Product::where('brand_id',$id)->paginate(6);
			$rand_products = Product::inRandomOrder()->limit(4)->get();
			return view('shop',compact('categorys','brands','products','rand_products'));
		}
		
		public function ShoppingCart()
		{
			return view('shopping_cart');
		}
		
		public function userOrderComplete(Request $request)
		{
			$id = $request->id;
			return view('order_complete',compact('id'));
		}
		
		public function Checkout()
		{
			
			$divisions = Divisions::all();
			$districts = Districts::all();
			$upazilas = Upazila::all();
			$countrys = Country::all();
			$dealers = Dealer::all();
			$dealersDistricts = Districts::whereExists(function ($query) {
				$query->select(DB::raw(1))
				->from('dealers')
				->whereRaw('dealers.district_id = districts.id');
			})
			->get();
			$avaliableTopup = $this->AvaliableTopupBalanceByUser()->topup_avaliable;
			return view('checkout',compact('divisions','districts','countrys','dealers','dealersDistricts','upazilas','avaliableTopup'));
		}
		
		public function AddProductToCart(Request $request)
		{
			
			$cart = $request->session()->get('cart');
			$product = Product::find($request->product_id);
			
			if(isset($cart[$product->id])) {
				if(isset($request->product_cart_remove)){
					
					if(isset($cart[$product->id])) {
						unset($cart[$product->id]);
					}
					
					$request->session()->put('cart', $cart);
					$cartTotal = $this->getCartSubtotal($request);
					return response()->json([
					"status" => "delete",
					"product_id" => $product->id,
					"point_subtotal" => $cartTotal['point_subtotal'],
					"price_subtotal" => $cartTotal['price_subtotal'],
					]);
					
					}elseif(isset($request->product_qty)){
					$cart[$product->id]['product_qty'] = $request->product_qty;
					
					$cart[$product->id]['product_point_total'] = $cart[$product->id]['product_qty'] * $product->product_point;
					$cart[$product->id]['product_price_total'] = $cart[$product->id]['product_qty'] * $product->product_price;
					
					}else{
					$cart[$product->id]['product_qty'] = $cart[$product->id]['product_qty'] + 1;
					
					$cart[$product->id]['product_point_total'] = $cart[$product->id]['product_qty'] * $product->product_point;
					$cart[$product->id]['product_price_total'] = $cart[$product->id]['product_qty'] * $product->product_price;
				}
				}else{
				$cart[$product->id] = [
				"product_id" => $product->id,
				"product_price" => $product->product_price,
				"product_name" => $product->product_name,
				"product_image" => $product->product_image,
				"product_qty" => 1,
				"product_point" => $product->product_point,
				"product_point_total" => $product->product_point,
				"product_price_total" => $product->product_price
				];
			}
			
			
			$request->session()->put('cart', $cart);
			$cartTotal = $this->getCartSubtotal($request);
			
			return response()->json([
			"status" => "success",
			"product_id" => $product->id,
			"product_price" => $product->product_price,
			"product_name" => $product->product_name,
			"product_image" => $product->product_image,
			"product_point" => $product->product_point,
			"product_qty" => $cart[$product->id]['product_qty'],
			"product_point_total" => $cart[$product->id]['product_point_total'],
			"product_price_total" => $cart[$product->id]['product_price_total'],
			"point_subtotal" => $cartTotal['point_subtotal'],
			"price_subtotal" => $cartTotal['price_subtotal'],
			]);
		}
		
		public function getCartSubtotal($request)
		{
			$cartTotal = [];
			$cartTotal['point_subtotal'] = 0;
			$cartTotal['price_subtotal'] = 0;
			
			$carts = $request->session()->get('cart');
			
			foreach($carts as $cart){
				$cartTotal['point_subtotal'] += $cart['product_point_total'];
				$cartTotal['price_subtotal'] += $cart['product_price_total'];
			}
			
			$request->session()->put('cart_total', $cartTotal);
			return $cartTotal;
		}
		
		public function CartSubmit(Request $request)
		{ 
			
			$cartTotal = $request->session()->get('cart_total');
			$carts = $request->session()->get('cart');
			
			$request->validate([
			'delivery_type' => 'required',
			'delivery_from' => 'required'
			]);
			
			if($this->AvaliableTopupBalanceByUser()->topup_avaliable < $cartTotal['price_subtotal']){
				return response()->json([
				"status" => "error",
				'message' => 'TopUp balance not available you need more '.($cartTotal['price_subtotal'] - $this->AvaliableTopupBalanceByUser()->topup_avaliable).' Tk for purchase this order.'
				],422);
			}
			
			if(!$cartTotal ||  $cartTotal['price_subtotal'] < 0){
				return response()->json([
				"status" => "error",
				'message' => 'Cart is empty. Add some product first'
				],422);
			}
			
			if($request->delivery_from == 'dealer'){
				$request->validate([
				'dealer_list' => 'required'
				]);
				}elseif($request->delivery_from == 'user'){
				$request->validate([
				'user_name' => 'required',
				'user_phone' => 'required',
				'user_address' => 'required',
				'post_code' => 'required'
				]);
			}
			
			$order = new Orders;
			
			if(Auth::user()->hasRole('accountant')){
				$getCompany = Dealer::where('dealer_type','admin')->first();
				$order->order_delivery_from = 'admin';
				}else{
				$getCompany = Dealer::where('dealer_type','company')->first();
				$order->order_delivery_from = $request->delivery_from;
			}
			
			foreach($carts as $cart){
				if($request->delivery_from == 'company'){
					$stockUser = $getCompany->user_id;
					}elseif($request->delivery_from == 'dealer'){
					$stockUser = $request->dealer_list;
				}
				$stock = $this->getAvailableStockByUser($stockUser,$cart['product_id']);
				if($stock['available_stock'] < $cart['product_qty']){
					return response()->json([
					"status" => "error",
					'message' => 'Product Out Of Stock'
					],422);
				}
			}
			
			
			
			$order->user_id = Auth::user()->id;
			$order->order_delivery_type = $request->delivery_type;
			$order->order_net_amount = $cartTotal['price_subtotal'];
			$order->order_amount = $cartTotal['price_subtotal'];
			$order->order_total_point = $cartTotal['point_subtotal'];
			$order->order_delivery_status = 'pending';
			$order->order_status = 'complete';
			
			if($request->delivery_from == 'company'){
				$order->order_delivery_from_user_id = $getCompany->user_id;
				}elseif($request->delivery_from == 'dealer'){
				$order->order_delivery_from_user_id = $request->dealer_list;
				}else if($request->delivery_from == 'user'){
				$order->order_delivery_name	 = $request->user_name;
				$order->order_delivery_phone	 = $request->user_phone;
				$order->order_delivery_address = $request->user_address;	
				$order->order_district = $request->state;	
				$order->order_postcode = $request->post_code;	
			}
			
			if(Auth::user()->hasRole('dealer')){
				$order->is_dealer_order = true;
			}
			
			$order ->save();
			
			TopupBalance::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  Auth::User()->id,
			'topup_amount' => $cartTotal['price_subtotal'],
			'topup_type' => 'user',
			'topup_flow' => 'out',
			'topup_details' => 'You have purchase '.$order->getRouteKey().' this order with '.$cartTotal['price_subtotal'].' Tk TopUp balance.',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			TopupBalance::create([
			'user_id' => $order->order_delivery_from_user_id,
			'from_user_id' =>  Auth::User()->id,
			'topup_amount' => $cartTotal['price_subtotal'],
			'topup_type' => 'user',
			'topup_flow' => 'in',
			'topup_details' => 'You have received '.$cartTotal['price_subtotal'].' Tk TopUp balance for delivered '.$order->getRouteKey().' this order from '.Auth::User()->username.' .',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			$pointIn = new Point;
			$pointIn->user_id = Auth::User()->id;
			$pointIn->from_user_id = Auth::User()->id;
			$pointIn->point_amount = $cartTotal['point_subtotal'];
			$pointIn->point_flow = 'in';
			if(Auth::user()->hasRole('user')){
				$pointIn->is_order = true;
			}
			$pointIn->point_details = 'You have received '.$cartTotal['point_subtotal'].' PV for order '.$order->getRouteKey();
			$pointIn->point_status = 'active';
			$pointIn->save();
			
			
			foreach($carts as $cart){
				$stock = new StockManager;
				$stock->user_id = Auth::user()->id;
				if($request->delivery_from == 'company'){
					$stock->delivery_user_id = $getCompany->user_id;
					}elseif($request->delivery_from == 'dealer'){
					$stock->delivery_user_id = $request->dealer_list;
					}elseif($request->delivery_from == 'user'){
					$stock->delivery_user_id = Auth::user()->id;
				}
				$stock->order_id = $order ->id;
				$stock->product_id = $cart['product_id'];
				$stock->product_qty = $cart['product_qty'];
				if(Auth::user()->hasRole('user')){
					$stock->stock_flow = 'out';
					}else{
					$stock->stock_flow = 'in';
				}
				$stock->stock_status = 'ordered';
				$stock->save();
			}
			
			$availablePV = $this->AvaliablePointByUser();
			$getMember = MemberTree::where('user_id',Auth::User()->id)->first();
			$sponsorBonusPerPV = config('mlm.sponsor_bonus') / 25;
			$sponsorBonus = $sponsorBonusPerPV * $cartTotal['point_subtotal'];
			 
			if(Auth::user()->hasRole('user')){
    			$sponsorBonusData = new MemberBonus();
    			$sponsorBonusData->user_id = $getMember->sponsor_id;
    			$sponsorBonusData->from_user_id = $getMember->user_id;
    			$sponsorBonusData->bonus_type = 'sponsor';
    			$sponsorBonusData->amount = $sponsorBonus;
    			$sponsorBonusData->details = 'You have received '.$sponsorBonus.' Tk Sponsor bonus for '.$cartTotal['point_subtotal'].' PV sales commission from '.$getMember->Users->username;
    			$sponsorBonusData->status = 'active';
    			$sponsorBonusData->save();
			}
			
			$checkUpdate = false;
			if($availablePV->point_available > 0){
				if($availablePV->point_available >= config('mlm.matching_pv') && !$getMember->is_valid){
					$getMember->is_valid = Carbon::now();
					$checkUpdate = true;
				}
				
				if($availablePV->point_available >= config('mlm.premium_registration_point') && !$getMember->is_premium){
					Point::create([
					'user_id' => $getMember->user_id,
					'from_user_id' =>  $getMember->user_id,
					'point_amount' => config('mlm.premium_registration_point'),
					'point_flow' => 'out',
					'point_details' => 'Your account auto upgraded to Premium with '.config('mlm.premium_registration_point').' PV',
					'point_status' => 'active'
					]);
					
					$getMember->is_premium = Carbon::now();
					$checkUpdate = true;
					new SendSmsController([Auth::User()->phone],'Your account successfully  auto upgrade to Premium with '.config('mlm.premium_registration_point').' PV','upgrade');
				}
				
				if($checkUpdate){
					$getMember->save();
				}
			}
			
			new SendSmsController([Auth::user()->phone],'You have received '.$cartTotal['point_subtotal'].' PV for order '.$order->getRouteKey(),'cart-order');
			
			$request->session()->forget('cart');
			$request->session()->forget('cart_total');
			
			return response()->json([
			"status" => "success",
			"orderId" => $order->getRouteKey(),
			"redirectUrl" => route('shopping.order.complete', ['id' => $order->getRouteKey()]),
			"message" => "Your Order Successfully Placed"
			]);
		}
		
		function GetDelarsByCityId($id){
			$dealersUpazila = Upazila::whereExists(function ($query) {
				$query->select(DB::raw(1))
				->from('dealers')
				->whereRaw('dealers.upazila_id = upazilas.id');
			})
			->get();
			
			if(!$dealersUpazila){
				return response()->json([
				"status" => "error"
				]);
			}
			
			return response()->json([
			"status" => "success",
			"upazilas" => $dealersUpazila
			]);
		}
		
		function GetDelarsByUpazilaId($id){
			$dealers = Dealer::where('upazila_id',$id)->get();
			
			if(!$dealers){
				return response()->json([
				"status" => "error"
				]);
			}
			
			return response()->json([
			"status" => "success",
			"union" => $dealers
			]);
		}
		
		function GetDelarsList(Request $request){
			
			$dealers = Dealer::where('district_id',$request->district_id)->where('dealer_type', '!=', 'admin')->select('id','user_id');
			
			if($request->upazila_id != null){
				$dealers->where('upazila_id',$request->upazila_id);
			}
			
			if($request->union_id != null){
				$dealers->where('dealer_union',$request->union_id);
			}
			
			$dealers = $dealers->get();
			
			if(!$dealers){
				return response()->json([
				"status" => "error"
				]);
			}
			
			foreach($dealers as $k => $v){
				$dealers[$k]['dealer_name'] = $v->User->name;
			}
			
			return response()->json([
			"status" => "success",
			"dealer" => $dealers
			]);
		}
		
		function GetDelarsById($id){
			$dealers = Dealer::find($id);
			$dealer =json_encode($dealers);
			return response($dealer);
		}
		
		public function showId($id)
		{
			return Optimus::connection('main')->decode($id);
		}
		public function GetProductById(Request $request)
		{
			$result = Product::where('id', $request->product_id)->first();
			if (!file_exists(public_path($result->product_image)) || $result->product_image == null) {
				$result->product_image = 'image-not-found.png';
			}
			$result->category_id = $result->Category->category_name;
			$result->brand_id = $result->Brand->brand_name;
			return response([
			'data' => $result
			]);
		}
		
	}
