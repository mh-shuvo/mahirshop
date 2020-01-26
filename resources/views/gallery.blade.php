@extends('layouts.web')
@section('title','Gallery')
@section('css')
@endsection
@section('content')
	
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h3 style="font-size: 40px;">Gallery</h3>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--about section area -->
    <section class=" py-3"> 
       <div class="">
            <div class="row">
                <div class="col-12">
                   <div class=" text-center">
                    <h1 style="font-size: 30px;  text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 20px;  color:#90CF53;">Gallery</h1>
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

                    @foreach(App\CategoryGallery::where('status','Active')->get() as $row)
                        <button class="btn btn-default filter-button" data-filter="{{$row->id}}">{{$row->name}}</button>
                    @endforeach


                </div>
              </div>
              <div class="row">

                @foreach(App\Gallery::where('status','Active')->get() as $row)
                    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter {{$row->gal_cat_id}}">
                            @if($row->type =='image')
                            @php
                                $image = public_path($row->image);
                                if (!file_exists($image)) {
                                    $image = 'photo_gallery.png';
                                }
                                else{
                                    $image = $row->image;
                                }
                            @endphp
                                <img src="{{asset('public')}}/{{$image}}" class="img-responsive" style="height:100%; width:100%;">
                            @else
                            @php
                                 $fetch=explode("/",$row->image);
                                 $videoid=$fetch[3];
                            @endphp
                            <iframe width="400" height="300" src="https://www.youtube.com/embed/{{$videoid}}" style="height:100%; width:100%;"></iframe>
                            @endif
                    </div>
                @endforeach

              </div>
        </div>
</section>
               
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
