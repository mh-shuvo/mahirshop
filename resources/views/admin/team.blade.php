@extends('layouts.backend')
@section('title','My Team')

@section('css')

@endsection

@section('content')
<div class="block">
	<div class="block-content">
		<div class="row">
			<div class="col-sm-4 offset-sm-4">
				<input type="text" class="form-control" id="searchTeam" name="searchTeam">
				<span class="col-form-label username_check_status"></span>
			</div>
		</div>
		<br>
		<div class="dt-responsive table-responsive">
			<table id="TeamTable" class="table table-striped table-bordered nowrap text-center">
				<thead>
					<tr>
						<th>Member</th>
						<th>Team A</th>
						<th>Team B</th>
					</tr>
				</thead>
				
				<tbody id="TeamTableTbody">
					
				</tbody>
				
			</table>
			<!--div id="backButton"></div-->
			<button class="btn btn-danger btn-sm backId" type="button">Back</button>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	
	$(document).ready(function(){
		getTree();
		
		
		function getTree(id = null){
			if('{{Auth::User()->id}}' <= id || id == null ){
				$.ajax({
					type: 'get',
					url: '{{ url('admin/my-team/data/') }}/'+id ,
					success: function(data){
						var rootHtml = '<tr> <td text-center><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+ data.root_profile_picture+'"><br> <b>Name:<b> '+data.root_name+'<br><b>Username: </b>'+data.root_username+'</br> <b>Joining Date: </b>'+data.root_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_left_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_left_profile_picture+'"><br> <b>Name:<b>'+data.root_left_name+'<br><b>Username: </b>'+data.root_left_username+'</br><b>Joining Date: </b>'+data.root_left_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_right_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_right_profile_picture+'"><br> <b>Name:<b> '+data.root_right_name+'<br><b>Username: </b>'+data.root_right_username+'</br><b>Joining Date: </b>'+data.root_right_registration_date+' </td> <tr>';
						
						var leftHtml = '<tr> <td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_left_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_left_profile_picture+'"><br> <b>Name:</b>'+data.root_left_name+'<br><b>Username: </b>'+data.root_left_username+'</br><b>Joining Date: </b>'+data.root_left_registration_date+' </td><td><img class="img-circle teamMember" style= "height:80px; width:100ox; cursor:pointer;" data-id="'+data.left_left_username+'" data-root-id="'+data.root_left_username+'" src="{{asset('public/upload/user')}}/'+data.left_left_profile_picture+'"><br><b>Name: </b> '+data.left_left_name+'<br><b>Username: </b>'+data.left_left_username+'</br><b>Joining Date:</b>'+data.left_left_registration_date+'</td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.left_right_username+'" data-root-id="'+data.root_left_username+'" src="{{asset('public/upload/user')}}/'+data.left_right_profile_picture+'"><br> <b>Name: </b>'+data.left_right_name+'<br><b>Username: </b>'+data.left_right_username+'</br><b>Joining Date: </b>'+data.left_right_registration_date+' </td> <tr>';
						
						var rightHtml = '<tr> <td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.root_right_username+'" data-root-id="'+data.root_username+'" src="{{asset('public/upload/user')}}/'+data.root_right_profile_picture+'"><br> <b>Name:<b> '+data.root_right_name+'<br><b>Username: </b>'+data.root_right_username+'</br><b>Joining Date: </b>'+data.root_right_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.right_left_username+'" data-root-id="'+data.root_right_username+'" src="{{asset('public/upload/user')}}/'+data.right_left_profile_picture+'"><br> <b>Name: </b>'+data.right_left_name+'<br><b>Username: </b>'+data.right_left_username+'</br><b>Joining Date: </b>'+data.left_left_registration_date+' </td><td><img class="img-circle teamMember" style="height:80px; width:100ox; cursor:pointer;" data-id="'+data.right_right_username+'" data-root-id="'+data.root_right_username+'" src="{{asset('public/upload/user')}}/'+data.right_right_profile_picture+'"><br> <b>Name: </b>'+data.right_right_name+'<br><b>Username: </b>'+data.right_right_username+'</br><b>Joining Date: </b>'+data.right_right_registration_date+' </td> <tr>';
						$("#TeamTable").append(rootHtml);
						$("#TeamTable").append(leftHtml);
						$("#TeamTable").append(rightHtml);
					}
				});
			}
		}
		$(document).on('click','.searchBtn',function(event){
			let u_name = $("#username").val();
			$.ajax({
				type: 'get',
				url: '{{ url('admin/search/team/') }}/'+u_name ,
				success: function(data){
					$("#TeamTableTbody").html('');
					getTree(data);
				}
			});
			event.preventDefault();
		});
		
		$(document).on('keyup','#searchTeam',function(event){
			if(event.keyCode == 13){
				if($(this).val()!='')
				{
					let u_name = $(this).val();
					$.ajax({
						type: 'get',
						url: '{{ url('admin/search/team/') }}/'+u_name ,
						success: function(data){
							$("#TeamTableTbody").html('');
							getTree(data);
						}
					});
					event.preventDefault();
				}
				else{
					$(this).css('border','1px solid red');
					$(".username_check_status").css('color','red');
				}
			}
		});
		
		$(document).on('click','.backId',function(event){
			let u_name = $(this).data('id');
			$.ajax({
				type: 'get',
				url: '{{ url('admin/search/team/') }}/'+u_name ,
				success: function(data){
					$("#TeamTableTbody").html('');
					getTree(data);
				}
			});
			event.preventDefault();
		});
		
		$(document).on("change keyup",'input[name="searchTeam"]',function(){
			usernameCheck($(this),'.username_check_status');
		});
		
		$(document).on('click','.teamMember',function(event){
			let u_name = $(this).data('id');
			$(".backId").attr("data-id",$(this).data('root-id'));
			$.ajax({
				type: 'get',
				url: '{{ url('admin/search/team/') }}/'+u_name ,
				success: function(data){
					$("#TeamTableTbody").html('');
					getTree(data);
				}
			});
			event.preventDefault();
		});
		
		$(document).on('keyup','#username',function(event){
			if(event.keyCode == 13){
				
				let u_name = $(this).val();
				$.ajax({
					type: 'get',
					url: '{{ url('admin/search/team/') }}/'+u_name ,
					success: function(data){
						$("#TeamTableTbody").html('');
						getTree(data);
					}
				});
				
			}
			event.preventDefault();
		});
	});
</script>

@endsection				