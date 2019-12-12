@extends('layouts.backend')
@section('title','Order View')
@section('content')
<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark row">
		<div class="col-sm-10">
			<h3 class="block-title center text-white">Order Information</h3>
		</div>
		<div class="col-sm-1">
			<a class="btn btn-default btn-block btn-sm" href="{{url('admin/order-print/')}}/{{$order->id}}">
					<i class="fa fa-print"></i> Print
				</a>
		</div>
	</div>
    <div class="block-content font-size-sm">
		
        <div class="row">
			
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6 text-right text-bold font-weight-bold">Order Id</div>
                    <div class="col-sm-6">
						<span id="order_id">{{ $order->id }}</span>
					</div>
				</div>
                <div class="row">
                    <div class="col-sm-6 text-right font-weight-bold">Order Type</div>
                    <div class="col-sm-6">
						<span id="order_delivery_type">
							@if ($order->order_delivery_type == 'cod')
                            Cash on Delivery
							@else
							Self
							@endif
						</span>
					</div>
				</div>
                <div class="row">
                    <div class="col-sm-6 text-right font-weight-bold">Order Status</div>
					<div class="col-sm-6" id="order_status">{{$order->order_status}}</div>
				</div>
			</div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6 text-right font-weight-bold">Username</div>
					<div class="col-sm-6" id="username">{{$order->User->name}}</div>
				</div>
                <div class="row">
                    <div class="col-sm-6 text-right font-weight-bold">Total Point</div>
					<div class="col-sm-6" id="total_point">{{$order->order_total_point}}</div>
				</div>
                <div class="row">
                    <div class="col-sm-6 text-right font-weight-bold">Delivery Status</div>
					<div class="col-sm-6" id="delivery_status">{{$order->order_delivery_status}}</div>
				</div>
			</div>
		</div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
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
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold">Delivery Address</h4>
					</div>
					
					
					
                    @if ($order->order_delivery_from == 'office')
					
                    <div class="col-sm-12 office_section">
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Office Name:</div>
                            <div class="col-sm-6">
                                <span id="office_name">{{Auth()->User()->name}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Office Phone</div>
                            <div class="col-sm-6">
                                <span id="office_phone">{{Auth()->User()->phone}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Address</div>
                            <div class="col-sm-6">
                                <span id="office_address">{{Auth()->User()->address}}</span>
							</div>
						</div>
					</div>
                    @elseif($order->order_delivery_from == 'dealer')
                    <div class="col-sm-12 delar_section">
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Dealer Name:</div>
                            <div class="col-sm-6">
                                <span id="dealer_name">{{$order->User->dealer_delivery_name}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Dealer Phone</div>
                            <div class="col-sm-6">
                                <span id="dealer_phone">{{$order->User->phone}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Dealer Address</div>
                            <div class="col-sm-6">
                                <span id="dealer_address">{{$order->User->address}}</span>
							</div>
						</div>
					</div>
                    @elseif($order->order_delivery_from == 'user')
                    <div class="col-sm-12 user_section">
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">order_delivery_address</div>
                            <div class="col-sm-6">
                                <span id="user_city">{{$order->order_delivery_city}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Name:</div>
                            <div class="col-sm-6">
								<span id="user_name">{{$order->order_delivery_name}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Phone</div>
                            <div class="col-sm-6">
								<span id="user_phone">{{$order->order_phone}}</span>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-6 text-right font-weight-bold">Address</div>
                            <div class="col-sm-6">
								<span id="user_address">{{$order->order_delivery_address}}</span>
							</div>
						</div>
					</div>
                    @else
                    <div class="col-sm-12">
						<p class="text-center">No Delivery Address Added</p>
					</div>
                    @endif
				</div>
			</div>
            <div class="col-sm-6">
                <h2>Total: <span id="total">{{$order->order_net_amount}}</span></h2>
			</div>
		</div>
		<div class="row">
			div.col-sm-
		</div>
	</div>
	
</div>
@endsection
@section('js')

@endsection