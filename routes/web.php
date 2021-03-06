<?php
	/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		|
		| Here is where you can register web routes for your application. These
		| routes are loaded by the RouteServiceProvider within a group which
		| contains the "web" middleware group. Now create something great!
		|
	*/
	
	Route::get('/','webController@Index')->name('welcome');
	Route::get('shop','webController@Shop')->name('shop');
	Route::get('login','webController@Login')->name('login');
	Route::get('contactus','webController@Contactus')->name('contactus');
	Route::get('aboutus','webController@Aboutus')->name('aboutus');
	Route::get('gallery','webController@Gallery')->name('gallery');
	Route::get('achivers','webController@Achivers')->name('achivers');
	Route::get('shopping-cart','webController@ShoppingCart')->name('shopping.cart')->middleware('auth');
	Route::get('checkout','webController@Checkout')->name('checkout')->middleware('auth');
	Route::get('order-complete/{id}','webController@userOrderComplete')->name('shopping.order.complete')->middleware('auth');
	Route::get('product/category/{id}', 'webController@ProductByCategory')->name('product.category');
	Route::get('get_product/', 'webController@GetProductById')->name('product.get');
	Route::get('product/brand/{id}', 'webController@ProductByBrand')->name('product.brand');
	Route::get('product/{id}', 'webController@SingleProduct')->name('product.single');
	Route::get('product/cart/update', 'webController@AddProductToCart')->name('product.cart.update');
	Route::post('cart-submit','webController@CartSubmit')->name('cart.submit');
	Route::get('dealer/city/{id}','webController@GetDelarsByCityId');
	Route::get('dealer/union/{id}','webController@GetDelarsByUpazilaId');
	Route::get('dealer/list/','webController@GetDelarsList')->name('dealer.list');
	Route::get('dealer/{id}','webController@GetDelarsById');
	
	Route::prefix('admin')->group(function() {
		Route::get('/','AdminController@index')->name('admin.index');
		Route::get('/designation','AdminController@Designation')->name('admin.designation');
		Route::get('/id-card','AdminController@idCard')->name('admin.id_card');
		
		Route::get('/my-team','AdminController@myTeam')->name('admin.team');
		Route::get('/my-team/data','AdminController@MyTeamList')->name('admin.team.data');
		// withdraw Route
		Route::get('/withdrow','AdminController@Withdrow')->name('admin.withdrow');
		//  withdrow route
		//Route::get('withdraw/data','AdminController@withdrawData')->name('admin.withdraw.data');
		Route::get('/withdrow','AdminController@Withdrow')->name('admin.withdrow');
		Route::get('withdraw/data','AdminController@withdrawData')->name('admin.withdraw.data');
		Route::post('withdraw/submit','AdminController@withdrawSubmit')->name('admin.withdraw.submit');
		
		Route::get('/topup','TopUpController@topup')->name('admin.topup');
		Route::post('topup/transfer', 'TopUpController@UserTopupTransfer')->name('admin.topup.transfer');
		Route::get('topup/list', 'TopUpController@UserTopupList')->name('admin.topup.data');
		
		
		Route::post('member_check', 'AdminController@getMemberCheck')->name('admin.member_check');
		
		Route::get('/referd-reward','AdminController@refardReward')->name('admin.refard_archiver');
		Route::get('/member/daily-earn','AdminController@memberDailyEarn')->name('admin.member.daily_earn');
		Route::get('/notice','AdminController@notice')->name('admin.notice');
		Route::get('/message','AdminController@message')->name('admin.message');
		
		Route::get('/order','AdminController@order')->name('admin.order');
		Route::get('/order/data','AdminController@orderData')->name('admin.order.data');
		Route::get('/order/single/{id}','AdminController@orderSingle')->name('admin.order.single');
		
		/*Ecommerce*/
		Route::group(['middleware' => ['permission:view product']], function () {
			Route::get('/product/','ProductController@index')->name('admin.product');
			Route::get('/product/data','ProductController@data')->name('admin.product.data');
			Route::get('/product/create','ProductController@create')->name('admin.product.create');
			Route::post('/product/store','ProductController@store')->name('admin.product.store');
			Route::get('/product/edit/{id}','ProductController@edit')->name('admin.product.edit');
			Route::get('/product/delete/{id}','ProductController@delete')->name('admin.product.delete');
			
			Route::get('/product/brand','BrandController@index')->name('admin.brand.index');
			Route::post('/product/brand/store','BrandController@store')->name('admin.brand.store');
			Route::get('/product/brand/data','BrandController@data')->name('admin.brand.data');
			Route::get('/product/brand/delete/','BrandController@delete')->name('admin.brand.delete');
			
			Route::get('/product/category','CategoryController@index')->name('admin.category.index');
			Route::post('/product/category/store','CategoryController@store')->name('admin.category.store');
			Route::get('/product/category/data','CategoryController@data')->name('admin.category.data');
			Route::get('/product/category/delete','CategoryController@delete')->name('admin.category.delete');
			
			Route::get('/product/unit','UnitController@index')->name('admin.unit.index');
			Route::post('/product/unit/store','UnitController@store')->name('admin.unit.store');
			Route::get('/product/unit/data','UnitController@data')->name('admin.unit.data');
			Route::get('/product/unit/delete','UnitController@delete')->name('admin.unit.delete');
			
			Route::get('/product/banner','BannerController@index')->name('admin.banner');
			Route::get('/product/banner/create','BannerController@create')->name('admin.banner.create');
			Route::get('/product/banner/edit/{id}','BannerController@edit')->name('admin.banner.edit');
			Route::post('/product/banner/store', 'BannerController@AddBanner')->name('add.banner');
			Route::get('/product/banner/data', 'BannerController@data')->name('admin.banner.data');
			
			
			/* Category Gallery Route Start*/
			Route::get('/gallery/category','GalleryController@index')->name('category.gallery.index');
			Route::post('/gallery/category/store','GalleryController@store')->name('category.gallery.store');
			Route::get('/gallery/category/data','GalleryController@data')->name('category.gallery.data');
			Route::get('/gallery/category/delete','GalleryController@delete')->name('category.gallery.delete');
			/*Category Gallery Route End*/
			
			/*Gallery Route Start*/
			Route::get('/gallery','GalleryController@galleryIndex')->name('gallery.index');
			Route::post('/gallery/add','GalleryController@galleryStore')->name('gallery.store');
			
			Route::get('/gallery/data','GalleryController@galleryData')->name('gallery.data');
			Route::get('/gallery/delete','GalleryController@gallerydelete')->name('gallery.delete');
			/*Gallery Route End*/
		});
		
		/*Superadmin*/
		Route::group(['middleware' => ['permission:view user_manager']], function () {
			Route::get('/superadmin/member/','SuperadminController@member')->name('admin.superadmin.member');
			Route::get('/superadmin/member/data','SuperadminController@memberData')->name('admin.superadmin.member.data');
			Route::get('/superadmin/member/data/{id}','SuperadminController@SingleMemberData')->name('admin.superadmin.member.single.data');
			Route::post('/superadmin/member/freesignup','SuperadminController@MemberFreeSignupSubmit')->name('admin.superadmin.member.freesignup');
			Route::post('member/change/premium', 'SuperadminController@ChangePemiumStatus')->name('admin.member.change.premium');
			Route::get('member/change/banned/', 'SuperadminController@ChangeBannedStatus')->name('admin.member.change.banned');
			// withdraw Route
			Route::get('superadmin/withdrow','SuperadminController@Withdrow')->name('admin.superadmin.withdrow');
			Route::get('superadmin/withdraw/data','SuperadminController@withdrawData')->name('admin.superadmin.withdraw.data');
			Route::post('superadmin/withdraw/submit','SuperadminController@withdrawSubmit')->name('admin.superadmin.withdraw.submit');
			Route::get('superadmin/withdraw/single','SuperadminController@SingleWithdraw')->name('admin.superadmin.single.withdraw');
			Route::post('superadmin/withdraw/change-status','SuperadminController@WithdrawStatusChange')->name('admin.superadmin.single.withdraw.change_status');
			Route::get('superadmin/user/data','SuperadminController@userListData')->name('admin.superadmin.user.data');
			
		});
		
		Route::group(['middleware' => ['role:admin']], function () {
			Route::post('/superadmin/renew-manual/','SuperadminController@renewAccount')->name('admin.superadmin.placement');
			Route::get('/superadmin/report/','SuperadminController@report')->name('admin.superadmin.report');
			Route::get('/superadmin/report/data/','SuperadminController@reportData')->name('admin.superadmin.report.data');
			Route::get('/superadmin/topup','SuperadminController@topup')->name('admin.superadmin.topup');
			Route::get('/superadmin/topup/data','SuperadminController@topupData')->name('admin.superadmin.topup.data');
			Route::post('/superadmin/topup/store','SuperadminController@topupStore')->name('admin.superadmin.topup.store');
			Route::get('packages', 'PackageController@Packages')->name('packages');
			Route::post('add/package','PackageController@AddPackage')->name('add.package');
			Route::get('package-list', 'PackageController@PackageList')->name('list.package');
			Route::get('package/delete/{id}', 'PackageController@PackageDelete')->name('delete.package');
		});
		Route::post('package/upgrade','UserController@upgrade')->name('package.upgrade');
		Route::post('package/renew','UserController@renew')->name('package.renew');
		
		Route::group(['middleware' => ['permission:view order|view account|view dealer_management']], function () {
			Route::get('/order-received/','SuperadminController@Order')->name('admin.superadmin.order');
			Route::get('/order-received/data','SuperadminController@OrderData')->name('admin.superadmin.order.data');
			Route::get('/order-received/single/{id}','SuperadminController@OrderSingle')->name('admin.superadmin.order.single');
			Route::get('/order-received/delete/{id}','SuperadminController@OrderDelete')->name('admin.superadmin.order.delete');
			Route::get('/order-received/status/change','SuperadminController@OrderStatusChange')->name('admin.superadmin.order.status_change');
			Route::get('/order-received/delivery/status/change','SuperadminController@OrderDeliveryStatusChange')->name('admin.superadmin.order.delivery_status_change');
			
		});
		Route::get('/order-print/{id}','AdminController@OrderPrint')->name('admin.order.print');
		
		Route::get('/superadmin/users','SuperadminController@Users')->name('admin.superadmin.users');
		
		// Create Member
		Route::get('member/create', 'UserController@CreateMember')->name('admin.superadmin.member.create');
		Route::post('member/store', 'UserController@StoreMember')->name('admin.superadmin.member.store');
		Route::post('member/update', 'UserController@UpdateMember')->name('admin.superadmin.member.update');
		
		Route::group(['middleware' => ['permission:view dealer_management']], function () {
			/*Delars*/
			Route::get('/delars','DelarController@index')->name('admin.delars');
			Route::post('/delars/store','DelarController@store')->name('admin.delars.store');
			Route::get('/delars/topup','DelarController@topup')->name('admin.delars.topup');
			Route::get('/delars/data','DelarController@data')->name('admin.delars.data');
		});
		/*Vendors*/
		Route::get('/paynow','AdminController@paynow')->name('admin.paynow');//
		
		/*Report*/
		Route::group(['middleware' => ['role:admin|manager|dealer']], function () {
			Route::get('/report/sales','ReportController@sales')->name('admin.report.sales');
			Route::get('/report/stock','ReportController@stock')->name('admin.report.stock');
			Route::get('/report/stock/data','ReportController@stockData')->name('admin.report.stock.data');
			Route::post('/report/stock/add','ReportController@stockAdd')->name('admin.report.stock.add');
			Route::get('/report/transaction','ReportController@transaction')->name('admin.report.transaction');
			Route::get('/report/transfered','ReportController@transfered')->name('admin.report.transfered');
		});
		Route::get('/report/sponsore_income', 'ReportController@SponsoreIncome')->name('admin.report.sponsor_income');
		Route::get('/report/matching_income', 'ReportController@MatchingIncome')->name('admin.report.matching_income');
		Route::get('/report/matching_royalty_income', 'ReportController@MatchingRoyaltyIncome')->name('admin.report.matching_royalty_income');
		Route::get('/report/incentive', 'ReportController@Incentive')->name('admin.report.incentive');
		Route::get('/report/achiever_royalty_income', 'ReportController@AchieverRoyaltyIncome')->name('admin.report.achiever_royalty_income');
		Route::get('/report/club_achiver', 'ReportController@ClubAchiver')->name('admin.report.club_achiver');
		Route::get('/report/generation', 'ReportController@generation')->name('admin.report.generation');
		Route::get('/report/stockiest_income', 'ReportController@StockiestIncome')->name('admin.report.stockiest_income');
		Route::get('/report/stockiest_sponsor_income', 'ReportController@StockiestSponsorIncome')->name('admin.report.stockiest_sponsor_income');
		Route::get('report/daily_cash_back','ReportController@DailyCashBack')->name('admin.report.daily_cash_back');
		Route::get('report/daily_cash_back_re','ReportController@DailyCashBackRe')->name('admin.report.daily_cash_back_re');
		Route::get('report/signup','ReportController@Signup')->name('admin.report.signup');
		Route::get('report/signup/data','ReportController@SignupData')->name('admin.report.registrationData');
		Route::get('report/order','ReportController@Order')->name('admin.report.order');
		Route::get('report/order/data','ReportController@OrderData')->name('admin.report.orderData');
		Route::get('report/sponsor-list/','ReportController@SponsoreList')->name('admin.report.sponsor_list');
		Route::get('report/sponsor-list/data','ReportController@SponsoreListData')->name('admin.report.sponsor_list.data');
		
		Route::get('report/data','ReportController@data')->name('admin.report.data');
		Route::get('report/pv','ReportController@PV')->name('admin.report.pv');
		Route::get('report/pv/data','ReportController@PVData')->name('admin.report.pv.data');
		Route::get('profile','AdminController@profile')->name('profile');
		Route::post('user/update/profile', 'AdminController@updateProfile')->name('user.update.profile');
		Route::post('user/update/password', 'AdminController@updatePassword')->name('user.update.password');
		Route::post('user/update/transaction_password', 'AdminController@updateTxnPassword')->name('user.update.txn.password');
		
	});
	
	Auth::routes(['register' => false]);
	
	Route::get('/home', 'HomeController@index')->name('home');
