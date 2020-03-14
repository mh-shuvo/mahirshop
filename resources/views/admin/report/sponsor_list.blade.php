@extends('layouts.backend')
@section('title','Sponsore List')
@section('css')
    
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Your Sponsore List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="SponsoreListTable"></table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#SponsoreListTable").DataTable({
            processing: true,
            serverside: true,
            ajax:"{{route('admin.report.sponsor_list.data')}}",
            columns:[
                {title: 'Name', data : 'name'},
                {title: 'Username',data : 'username'},
                {title: 'Registration Date', data : 'created_at'},
                {title: 'Status',data : 'status'},
            ]
        });
    </script>
@endsection