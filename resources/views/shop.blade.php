@extends('layouts.web')
@section('title','Product')
@section('css')

@endsection
@section('content')

<div class="container">
    <div class="row">
              <!-- End header-->
      <div class="ogami-breadcrumb">
        <div class="container">
          <ul>
          <li> <a class="breadcrumb-link" href="{{route('welcome')}}"> <i class="fas fa-home"></i>Home</a></li>
          <li> <a class="breadcrumb-link active" href="{{route('shop')}}">Shop</a></li>
          </ul>
        </div>
      </div>
      <!-- End breadcrumb-->
      <div class="shop-layout">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="shop-sidebar">
                <button class="no-round-btn" id="filter-sidebar--closebtn">Close sidebar</button>
                <div class="shop-sidebar_department">
                  <div class="department_top mini-tab-title underline">
                    <h2 class="title">All Categories</h2>
                  </div>
                  <div class="department_bottom">
                    <ul>
                        @foreach ($categorys as $category)
                    <li>
                      <a class="department-link active" href="{{url('product/category/')}}/{{$category->id}}">{{ $category->category_name }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="shop-sidebar_department">
                    <div class="department_top mini-tab-title underline">
                      <h2 class="title">Brands</h2>
                    </div>
                    <div class="department_bottom">
                        <ul>
                            @foreach ($brands as $brand)
                        <li> <a class="department-link" href="{{$category->id}}">{{ $category->category_name}}</a></li>
                          @endforeach
                        </ul>
                    </div>
                  </div>


                <div class="shop-sidebar_tag">
                  <div class="tag_top mini-tab-title underline">
                    <h2 class="title">Product tag</h2>
                  </div>
                  <div class="tag_bottom"><a class="tag-btn" href="shop_grid+list_3col.html">organic</a><a      class="tag-btn" href="shop_grid+list_3col.html">vegatable</a><a class="tag-btn" href="shop_grid+list_3col.html">fruits</a><a class="tag-btn" href="shop_grid+list_3col.html">fresh meat</a><a class="tag-btn" href="shop_grid+list_3col.html">fastfood</a><a class="tag-btn" href="shop_grid+list_3col.html">natural</a>
                  
                </div>
                </div>
                </div>

              </div>
              
              <div class="filter-sidebar--background" style="display: none"></div>
            </div>
            <div class="col-xl-9">
              <div class="shop-grid-list">
                <div class="shop-products">
                  <div class="shop-products_top mini-tab-title underline">
                    <div class="row align-items-center">



                      <div class="col-6 col-xl-4">
                        <h2 class="title">Shop</h2>
                      </div>
                      <div class="col-6 text-right">
                        <div id="show-filter-sidebar">
                          <h5> <i class="fas fa-bars"></i>Show sidebar</h5>
                        </div>
                      </div>
                      <div class="col-12 col-xl-8">
                        <div class="product-option">
                          <div class="product-filter">
                            <select class="select-form" id="sort" name="">
                              <option value="A-Z">A to Z</option>
                              <option value="Z-A">Z to A</option>
                              <option value="High to low price">High to low price</option>
                              <option value="Low to height price">Low to height</option>
                            </select>
                            <select class="select-form" id="sort" name="">
                              <option value="A-Z">Show 10</option>
                              <option value="Z-A">Show 20</option>
                              <option value="High to low price">Show 30</option>
                            </select>
                          </div>
                          <div class="view-method">
                            <p class="active" id="grid-view"><i class="fas fa-th-large"></i></p>
                            <p id="list-view"><i class="fas fa-list"></i></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--`ing column-->
                  </div>


                  
                  <div class="shop-products_bottom">
                    <div class="row no-gutters-sm">
                        @foreach ($products as $product)
                      <div class="col-6 col-md-4">
                        <div class="product">
                        <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="{{asset('public/frontend/assets/images/img1.jpg')}}"alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                          <h5 class="product-type">{{$product->product_name}}</h5>
                          <h3 class="product-price py-3">{{$product->product_discount_price}} 
                          <del>{{$product->product_base_price}}</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn hide"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>

                  <div class="shop-pagination mt-4">
                    <ul>
                      <li>
                        <button class="no-round-btn smooth active">1</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth">2</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth">3</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth"> <i class="arrow_carrot-2right"></i></button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End shop layout-->


	</div>
</div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $(".pagination").addClass('list-inline');
	});
</script>
@endsection