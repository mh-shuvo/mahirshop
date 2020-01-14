@extends('layouts.web')
@section('title','Order Complete')

@section('content')
<section class="mt-contact-banner" style="background-image: url(http://placehold.it/1920x205);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>Order Complete</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="index.html">home <i class="fa fa-angle-right"></i></a></li>
                    <li>Order Complete</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <!-- Mt About Section of the Page -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec toppadding-zero" style="margin-top: 100px;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <div class="holder" style="margin: 0px;">
                  <h2 class="text-center">Your Order No. is </h2>
                  <h2>ORDER NUMBER</h2>
                  <!-- Bill Detail of the Page -->
                  <form action="#" class="bill-detail" style="width: 100%;">
                    <fieldset>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Order No" value="{{$id}}">
                      </div>
                      <a href="{{route('admin.order')}}" class="process-btn">Back To Order List</a>
                    </fieldset>
                  </form>
                  <!-- Bill Detail of the Page end -->
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection