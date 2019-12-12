<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Yajra\Datatables\Datatables;
	use App\User;
	use App\Unit;
	use App\Brand;
	use App\Category;
	use App\Product;
	use Image;
	class ProductController extends Controller
	{
		public function index()
		{
			return view('admin.product.index');
		}
		public function data(){
			$Product = Product::select('id', 'category_id', 'brand_id', 'unit_id','product_name','product_code','product_des','product_base_price','product_discount_price','product_vat', 'product_point', 'product_image', 'product_featured', 'product_type', 'product_status');
            
            return Datatables::of($Product)
            ->addColumn('category_id', function ($Product) {
                return $Product->category->category_name;
			})
			->addColumn('action', function ($Product){
                return '<a href="'.url("/admin/product/edit/".$Product->id).'" class="btn btn-info btn-sm productEdit"><i class="fa fa-edit"></i></a>
				<a href="'.url("/admin/product/delete/".$Product->id).'" class="btn btn-danger btn-sm productDelete"><i class="fa fa-trash"></i></a>';
			})
            
            ->addColumn('brand_id', function ($Product) {
                return $Product->brand->brand_name;
			})
            
            ->addColumn('unit_id', function ($Product) {
                return $Product->unit->unit_name;
			})
            ->toJson();
		}   
		
		public function create()
		{
			$units = Unit::all();
			$brands = Brand::all();
			$categories = Category::all();
			return view('admin.product.create', compact('units', 'brands', 'categories'));
		}
		
		function store(Request $request)
		{
			$message = 'Product Successfully Added';
			if(isset($request->id)){
                $Product = Product::find($request->id); 
                if($request->hasFile('productImg')){
					
					$old_img = public_path($Product->product_image);
					if (file_exists($old_img)) {
						@unlink($old_img);
					}
					
					$document = $request->file('productImg');
					$productImg = 'upload/product/'.$request->productName.time() . '.' . $document->getClientOriginalExtension();
					Image::make($document)->resize(930,1163)->save(public_path($productImg));
				}
				else{
					$productImg = $Product->product_image;
				}
				$message = 'Product Successfully Updated';
			}   
			else{
				$request->validate([
				'categoryId' => 'required',
				'brandId' => 'required',
				'unitId' => 'required',
				'productName' => 'required',
				'productCode' => 'required',
				'productBasePrice' => 'required',
				'productPoint' => 'required',
				'productDes' => 'required',
				'productType' => 'required',
				'productStatus' => 'required',
				'productImg' => 'required',
				]);
				if($request->hasFile('productImg')){
					$document = $request->file('productImg');
					$productImg = 'upload/product/'.$request->productName.time() . '.' . $document->getClientOriginalExtension();
					Image::make($document)->resize(930,1163)->save(public_path($productImg));
				}
				$Product = new Product;
			}
			$Product->user_id = Auth()->user()->id;
			$Product->category_id = $request->categoryId;
			$Product->brand_id = $request->brandId;
			$Product->unit_id = $request->unitId;
			$Product->product_name = $request->productName;
			$Product->product_code = $request->productCode;
			$Product->product_des = $request->productDes;
			$Product->product_base_price = $request->productBasePrice;
			$Product->product_discount_price = $request->productDiscountPrice;
			$Product->product_vat = $request->productVat;
			$Product->product_point = $request->productPoint;
			$Product->product_image = $productImg;
			$Product->product_featured = $request->product_featured;
			$Product->product_type = $request->productType;
			$Product->product_status = $request->productStatus;
			$Product->save();
			
			return response()->json([
			'message' => $message
			]);
		}
		public function edit($id)
		{
			$units = Unit::all();
			$brands = Brand::all();
			$categories = Category::all();
			$product = Product::find($id);
			return view('admin.product.create', compact('units', 'brands', 'categories','product'));
		}
		public function delete($id)
		{
			$product = Product::find($id);
			$product->delete();
			return response()->json([
			'message' => 'Product Successfully Deleted'
			]);
		}
	}
