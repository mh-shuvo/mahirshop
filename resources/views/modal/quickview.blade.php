
<div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row" >
                <div class="col-lg-5 col-md-5 col-sm-8">
                  <div class="modal_tab">  
                    <div class="tab-content product-details-large">
                      <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                        <div class="modal_tab_img">
                          <a href="javascript:void(0)">
                            <img src="{{asset('public/image-not-found.png')}}" id="product_image" style="height: 200px; width: 170px;">
                          </a>    
                        </div>
                      </div>
                    </div>
                  </div>  
                </div> 
                <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="modal_right">
                    <div class="modal_title mb-10 ">
                      <h2 class="float-left pr-2">Name: </h2>
                      <h2 id="product_name"></h2> 
                    </div>
                    <div class="variants_selects">
                      <div class="variants_size">
                        <lebel class="float-left pr-2 text-uppercase width-bold">Brand Name: </lebel>
                        <p id="brand_id"> </p>
                      </div>
                      <div class="variants_color">
                        <lebel class="float-left pr-2 width-bold text-uppercase">Category Name: </lebel>
                        <p id="category_id"> </p>
                      </div>
                    </div> 
                    <div class="modal_price mb-10">
                      <lebel class="float-left width-bold  pr-2 bold text-uppercase">PRICE: </lebel>
                      <span class="new_price" id="product_discount_price"> </span> TK    
                      <del><span class="old_price" id="product_base_price"> </span>TK</del>    
                    </div> <br>
                    <div class="modal_description mb-15" >
                      <lebel class="float-left width-bold  pr-2 text-uppercase text-bold">DESCRIPTION: </lebel>
                      <p id="product_des"> </p>    
                    </div>
                  </div>    
                </div>    
              </div>     
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



@section('extra_js')
<script type="text/javascript">
    /*Porduct Modal Start*/
      
      $(document).on('click','.quickview',function(){
        
        var id = $(this).data('id');
        $(this).ajaxSubmit({
          data: { "product_id": id},
          dataType: 'json',
          method: 'GET',
          url: "{{route('product.get')}}",
          success: function (responseText) {
            let res = responseText.data;
            $("#product_image").attr('src','{{asset("public")}}/'+res.product_image);
            $("#product_name").html(res.product_name);
            $("#product_discount_price").html(res.product_discount_price);
            $("#product_base_price").html(res.product_base_price);
            $("#product_des").html(res.product_des);
            $("#brand_id").html(res.brand_id);
            $("#category_id").html(res.category_id);
            
            $("#productView").modal("show");
          }
        });  
      });
      /*Product Modal End*/
  </script>
@endsection
  