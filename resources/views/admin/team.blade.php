@extends('layouts.backend')
@section('title','My Team')

@section('css')

@endsection

@section('content')
<div class="row">
	<div class="col-sm-4 offset-sm-4">
		<input type="text" class="form-control" id="searchTeam" name="searchTeam" placeholder="Search here..">
		<span class="col-form-label username_check_status"></span>
	</div>
</div>
<div class="card">
<<<<<<< Updated upstream
	<div class="card-header">
		<h3 class="card-title">1st Generation (<span id="gen1total"></span>)</h3>
	</div>
	<div class="card-body" id="gen1">
		
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">2nd Generation (<span id="gen2total"></span>)</h3>
	</div>
	<div class="card-body" id="gen2">
=======
	<div class="card-body">
		<table id="TeamTable" class="table table-striped table-bordered nowrap text-center">
				<thead>
					<tr>
						<th>Member</th>
						<th>Team A</th>
						<th>Team B</th>
						<th>Team C</th>
					</tr>
				</thead>
				
				<tbody id="TeamTableTbody"></tbody>
			</table>
>>>>>>> Stashed changes
	</div>
	<button class="btn btn-danger btn-sm backId" type="button" username="{{ Auth::user()->username }}">Back</button>
</div>

@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		getTree();
		
<<<<<<< Updated upstream
		function getTree(Id = null){
			
			if(Id == null){
				var Id = '{{Auth::User()->username}}';
=======
		
		function getTree(id = null){
			if('{{Auth::User()->id}}' <= id || id == null ){
				$.ajax({
					type: 'get',
					url: '{{ url('admin/my-team/data/') }}/'+id ,
					success: function(data){
						var rootHtml = '<tr> <td text-center><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+ data.root_profile_picture+'"><br> <b>Name:<b> '+data.root_name+'<br><b>Username: </b>'+data.root_username+'</br> <b>Joining Date: </b>'+data.root_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_left_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_left_profile_picture+'"><br> <b>Name:<b>'+data.root_left_name+'<br><b>Username: </b>'+data.root_left_username+'</br><b>Joining Date: </b>'+data.root_left_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_right_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_right_profile_picture+'"><br> <b>Name:<b> '+data.root_right_name+'<br><b>Username: </b>'+data.root_right_username+'</br><b>Joining Date: </b>'+data.root_right_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_right_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_right_profile_picture+'"><br> <b>Name:<b> '+data.root_right_name+'<br><b>Username: </b>'+data.root_right_username+'</br><b>Joining Date: </b>'+data.root_right_registration_date+' </td> <tr>';
						
						var leftHtml = '<tr> <td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_left_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_left_profile_picture+'"><br> <b>Name:</b>'+data.root_left_name+'<br><b>Username: </b>'+data.root_left_username+'</br><b>Joining Date: </b>'+data.root_left_registration_date+' </td><td><img class="img-circle teamMember" style= "height:80px; width:100ox; cursor:pointer;" data-id="'+data.left_left_username+'" data-root-id="'+data.root_left_username+'" src="{{asset('public/upload/user')}}/'+data.left_left_profile_picture+'"><br><b>Name: </b> '+data.left_left_name+'<br><b>Username: </b>'+data.left_left_username+'</br><b>Joining Date:</b>'+data.left_left_registration_date+'</td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.left_right_username+'" data-root-id="'+data.root_left_username+'" src="{{asset('public/upload/user')}}/'+data.left_right_profile_picture+'"><br> <b>Name: </b>'+data.left_right_name+'<br><b>Username: </b>'+data.left_right_username+'</br><b>Joining Date: </b>'+data.left_right_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.left_right_username+'" data-root-id="'+data.root_left_username+'" src="{{asset('public/upload/user')}}/'+data.left_right_profile_picture+'"><br> <b>Name: </b>'+data.left_right_name+'<br><b>Username: </b>'+data.left_right_username+'</br><b>Joining Date: </b>'+data.left_right_registration_date+' </td> <tr>';
						
						var rightHtml = '<tr> <td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_right_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_right_profile_picture+'"><br> <b>Name:<b> '+data.root_right_name+'<br><b>Username: </b>'+data.root_right_username+'</br><b>Joining Date: </b>'+data.root_right_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.right_left_username+'" data-root-id="'+data.root_right_username+'" src="{{asset('public/upload/user')}}/'+data.right_left_profile_picture+'"><br> <b>Name: </b>'+data.right_left_name+'<br><b>Username: </b>'+data.right_left_username+'</br><b>Joining Date: </b>'+data.left_left_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.right_right_username+'" data-root-id="'+data.root_right_username+'" src="{{asset('public/upload/user')}}/'+data.right_right_profile_picture+'"><br> <b>Name: </b>'+data.right_right_name+'<br><b>Username: </b>'+data.right_right_username+'</br><b>Joining Date: </b>'+data.right_right_registration_date+' </td> <td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.right_right_username+'" data-root-id="'+data.root_right_username+'" src="{{asset('public/upload/user')}}/'+data.right_right_profile_picture+'"><br> <b>Name: </b>'+data.right_right_name+'<br><b>Username: </b>'+data.right_right_username+'</br><b>Joining Date: </b>'+data.right_right_registration_date+' </td> <tr>';
						$("#TeamTable").append(rootHtml);
						$("#TeamTable").append(leftHtml);
						$("#TeamTable").append(rightHtml);
					}
				});
>>>>>>> Stashed changes
			}
			
			$.ajax({
				type: 'get',
				url: '{{ route('admin.team.data') }}',
				data:{
					id:Id
				},
				success: function(data){
					if(data.status == 'success'){
						$("#gen1total").html(data.total_gen_1);
						$("#gen2total").html(data.total_gen_2);
						var gen1 = data.gen_1_data;
						var gen2 = data.gen_2_data;
						$("#gen1").html('');
						$.each( gen1, function( key, value ) {
							var get1html = '<a tabindex="'+key+'" data-id="'+value.users.username+'" class="btn btn-sm btn-primary teamMember" role="button" data-toggle="popover" data-trigger="focus" data-html="true" title="'+value.users.name+'">'+value.users.username+'</a> ';
							$("#gen1").append(get1html);
						});
						
						$("#gen2").html('');
						$.each( gen2, function( key, value ) {
							$.each( value, function( key, value ) {
								var get1html = '<a tabindex="'+key+'" data-id="'+value.users.username+'" class="btn btn-sm btn-primary teamMember" role="button" data-toggle="popover" data-trigger="focus" data-html="true" title="'+value.users.name+'">'+value.users.username+'</a> ';
								$("#gen2").append(get1html);
							});
						});
					}
				}
			});
		}
		
		$(document).on('click','.searchBtn',function(){
			getTree($("#username").val());
		});
		
		$(document).on('click','.back_button',function(){
			getTree($(this).data('id'));
		});
		
		$(document).on('keyup','#searchTeam',function(event){
			if(event.keyCode == 13){
				if($(this).val()!='')
				{
					getTree($(this).val());
					event.preventDefault();
				}
				else{
					$(this).css('border','1px solid red');
					$(".username_check_status").css('color','red');
				}
			}
		});
		
<<<<<<< Updated upstream
		$(document).on('click','.teamMember',function(event){
			getTree($(this).data('id'));
=======
		$(document).on('click','.backId',function(event){
			let u_name = $(this).attr('username');
			$.ajax({
				type: 'get',
				url: '{{ url('admin/search/team/') }}/'+u_name ,
				success: function(response){
					if(response.profile_picture == null){
						$("#root_img").attr('src',"{{asset('public')}}/default.jpg");
					}
					else{
						$("#root_img").attr('src',"{{asset('public/upload/user')}}/"+response.profile_picture);
					}
					$("#root_name").html(response.username);
					$("#root_name_input").val(response.id);
					$("#root_joining").html(response.created_at);
					$("#TeamTableTbody").html('');
					getTree(response.id,$("#search_type").val());
				}
			});
>>>>>>> Stashed changes
			event.preventDefault();
		});
		
		$(document).on("change keyup",'input[name="searchTeam"]',function(event){
			usernameCheck($(this),'.username_check_status');
			event.preventDefault();
		});
		
		$(document).on('keyup','#username',function(event){
			if(event.keyCode == 13){
				getTree($(this).val());
				event.preventDefault();
			}
		});
		
	});
</script>

@endsection					