@extends('layouts.backend')
@section('title','Designation List')

@section('css')

@endsection

@section('content')

<div class="card">

		<div class="card-body">
			<div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th class="text-center">SN</th>
	                        <th class="text-center">Title</th>
	                        <th class="text-center">Details</th>
	                        <th class="text-center">Status</th>
	                        <th class="text-center">Date</th>
	                    </tr>
	                </thead>
	                <tbody class="text-center">
	                	@foreach(App\Designation::all() as $row)
	                		<tr>
	                			<td>{{$row->id}}</td>
	                			<td>{{$row->designation_title}}</td>
	                			<td>{{$row->designation_details}}</td>
	                			<td>{{$row->status}}</td>
	                			<td>@if(!empty($row->created_at)){{$row->created_at->format('d-m-Y')}}@else --/--/----@endif</td>
	                		</tr>
	                	@endforeach

	                </tbody>
	            </table>
	        </div>
		</div>
	</div>

@endsection

@section('js')


@endsection