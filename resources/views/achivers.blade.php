@extends('layouts.web')
@section('title','Achivers')
@section('css')


<style type="text/css">
  .img-responsive{
    transition: all .3s ease-in-out;
  }
  .img-responsive:hover{
      border:2px solid #90CF53;
      transition: transform .6s;
      transform: scale(1.1);
      z-index: 9999;
  }


.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}


</style>

@endsection
@section('content')
	
    <!--breadcrumbs area start-->
     <div class="aboutus" style="height:200px; background-color: #F0F0F0; padding-top:80px; ">
      <div class="">
        <h1 class="text-center">Achivers</h1>
      </div>
    </div>
    <!--breadcrumbs area end-->
    
    <!--about section area -->
    <section class=" py-3"> 
       <div class="">
            <div class="row">
                <div class="col-12">
                   <div class=" text-center">
                    <h1 style="font-size: 50px;  text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 20px;  color:#90CF53;">Achivers</h1>
                   </div>
                 </div>
               </div>
             </div>    
        </section>

      <section>
          <div class="container">
              <div class="text-center">
              <div>
                  <button class="btn btn-default filter-button" data-filter="all">All</button>
                  @foreach(App\Designation::where('status','active')->get() as $row)
              <button class="btn btn-default filter-button" data-filter="designation_{{$row->id}}">@php echo strtoupper($row->designation_name); @endphp</button>
                  @endforeach
              </div>
              </div>
              <div class="row">
                @foreach(App\MemberTree::all() as $row)
              <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter designation_{{$row->designation}}">
                @php
                    $image = public_path('public/upload/user/'.$row->profile_picture);
                        if (!file_exists($image)) {
                            $image = 'default.jpg';
                        }
                        else{
                            $image = 'upload/user/'.$row->profile_picture;
                        }
                @endphp
                <img src="{{asset('public')}}/{{$image}}" class="img-responsive" style="100%; width:100%;">
                <div>
                    <h4 class="text-center pt-3">{{$row->Users->name}}</h4>
                </div>
                </div>
                  @endforeach
              </div>
        </div>
</section>
               
    <!--about section end-->



	
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>
@endsection
