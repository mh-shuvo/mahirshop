<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/dist/css/style.css')}}">
    <style>
    
    </style>
</head>
    <body onload="window.print()">

        <div class="container">
            <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title text-center">Order Information</h3>
                </div>
                <div class="card-body">
                    <div class="row invoice-contact">
                        <div class="col-md-8">
                            <div class="invoice-box row">
                                <div class="col-sm-12">

                                    <table class="table table-responsive invoice-table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>{{config('mlm.company.name')}} </td>
                                            </tr>
                                            <tr>
                                                <td>{{config('mlm.company.address')}}</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{config('mlm.company.email')}}" target="_top">{{config('mlm.company.email')}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{config('mlm.company.phone')}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row invoive-info">
                            <div class="col-md-4 col-xs-4" style="width:33.33%;float:left;padding-left:10px;">
                                <h6>Client Information :</h6>
                                <h6 class="m-0">{{ $order->User->name }}</h6>
                                <p class="m-0 m-t-10">{{ $order->User->address }}</p>
                                <p class="m-0">{{ $order->User->phone }}</p>
                                <p>{{ $order->User->email }}</p>
                            </div>
                            <div class="col-md-4 col-xs-4" style="width:33.33%;float:left;">
                                <h6>Order Information :</h6>
                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>Date :</th>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status :</th>
                                            <td>
                                                @if($order->order_status == 'Pending')
                                                <span class="label label-warning" id="order_status">{{$order->order_status}}</span> @else
                                                <span class="label label-primary" id="order_status">{{$order->order_status}}</span> @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 col-xs-4" style="width:33.33%;float:left;" >
                                <h6 class="m-b-20">Invoice Number :<span>{{ $order->id }}</span></h6>
                                <h6 class="text-uppercase text-primary">Total Point :
															<span>{{ $order->order_total_point }}</span>
														</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table invoice-detail-table">
                                        <thead>
                                            <tr class="thead-default">
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                            <tr>
                                                <th>{{$item->product_id}}</th>
                                                <td>{{$item->Product->product_name}}</td>
                                                <td>{{$item->product_qty}}</td>
                                                <td>
                                                    <?php
												$product_price = 0;
													if($item->Product->product_discount_price && $item->Product->product_discount_price > 0){
														$product_price = $item->Product->product_discount_price;
														}else{
														$product_price = $item->Product->product_base_price;
													}
													echo $product_price;
												?>
                                                </td>
                                                <td>
                                                    {{$product_price * $item->product_qty}}
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                @if ($order->order_delivery_from == 'office')
                                <table class="table table-responsive invoice-table invoice-total">
                                    <tbody>
                                        <tr>
                                            <th>Office Name</th>
                                            <td>{{Auth()->User()->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Office Phone</th>
                                            <td>{{Auth()->User()->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{Auth()->User()->address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @elseif($order->order_delivery_from == 'dealer')
                                <table class="table table-responsive invoice-table invoice-total">
                                    <tbody>
                                        <tr>
                                            <th>Dealer Name</th>
                                            <td>{{$order->Dealer->dealer_delivery_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Dealer District</th>
                                            <td>{{$order->Dealer->dealer_delivery_city}}</td>
                                        </tr>
                                        <tr>
                                            <th>Dealer Phone</th>
                                            <td>{{$order->Dealer->dealer_delivery_phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Dealer Address</th>
                                            <td>{{$order->Dealer->dealer_delivery_address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @elseif($order->order_delivery_from == 'user')
                                <table class="table table-responsive invoice-table invoice-total">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$order->order_delivery_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{$order->order_phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{$order->order_delivery_city}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$order->order_delivery_address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @else
                                <p class="text-center">No Delivery Address Added</p>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-responsive invoice-table invoice-total">
                                    <tbody>
                                        <tr>
                                            <th>Sub Total :</th>
                                            <td>{{$order->order_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount (0%) :</th>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="text-info">
                                            <td>
                                                <hr/>
                                                <h5 class="text-primary">Total :</h5>
                                            </td>
                                            <td>
                                                <hr/>
                                                <h5 class="text-primary">{{$order->order_net_amount}}</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{asset('public/backend/bower_components/bootstrap/js/bootstrap.min.js ')}}"></script>
        <script>
            $(document).ready(function() {
                alert(123);
            })
        </script>
    </body>

</html>