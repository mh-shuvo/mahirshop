@extends('layouts.backend')
@section('title','Package Commission')
@section('content')
	<div class="card">
	    <div class="card-header">
	        <h5>Package List</h5>
	    </div>
	    <div class="card-body">
	        <div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>Serial</th>
	                        <th>Pack Name</th>
	                        <th>Reffer Commission (%)</th>
	                        <th>Income Limit(Daily)</th>
	                        <th>Income Limit(Monthly)</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@for($i=1; $i<=4; $i++)
	                	<tr>
	                	    <td class="text-center">{{$i}}</td>
	                	    <td>JB package</td>
	                	    <td>{{$i}}.00</td>
	                	    <td>{{$i}}.00</td>
	                        <td>{{$i}}.00</td>
	                	</tr>
	                	@endfor
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th>Serial</th>
	                        <th>Pack Name</th>
	                        <th>Reffer Commission (%)</th>
	                        <th>Income Limit(Daily)</th>
	                        <th>Income Limit(Monthly)</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
	    </div>
	</div>
@endsection