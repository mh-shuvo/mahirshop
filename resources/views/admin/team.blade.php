@extends('layouts.backend')
@section('title','My Team')

@section('css')

@endsection

@section('content')
<div class="card">
	<div class="card-body">
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
					<tr id="root"> 
						<td>
							<img class="img-circle teamMember" id="profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="name"> </b> <br>
							Username: <b id="username"> </b> <br>
							Joining Date: <b id="date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teama_profile" data-id="null"  style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br> 
							Name: <b id="teama_name"> </b> <br>
							Username: <b id="teama_username"> </b> <br>
							Joining Date: <b id="teama_date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teamb_profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="teamb_name"> </b> <br>
							Username: <b id="teamb_username"> </b> <br>
							Joining Date: <b id="teamb_date"> </b> <br>
						</td> 
					</tr>
					<tr id="teamA"> 
						<td>
							<img class="img-circle teamMember" id="profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="name"> </b> <br>
							Username: <b id="username"> </b> <br>
							Joining Date: <b id="date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teama_profile" data-id="null"  style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br> 
							Name: <b id="teama_name"> </b> <br>
							Username: <b id="teama_username"> </b> <br>
							Joining Date: <b id="teama_date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teamb_profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="teamb_name"> </b> <br>
							Username: <b id="teamb_username"> </b> <br>
							Joining Date: <b id="teamb_date"> </b> <br>
						</td> 
					</tr>
					<tr id="teamB"> 
						<td>
							<img class="img-circle teamMember" id="profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="name"> </b> <br>
							Username: <b id="username"> </b> <br>
							Joining Date: <b id="date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teama_profile" data-id="null"  style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br> 
							Name: <b id="teama_name"> </b> <br>
							Username: <b id="teama_username"> </b> <br>
							Joining Date: <b id="teama_date"> </b> <br>
						</td>
						<td>
							<img class="img-circle teamMember" id="teamb_profile" data-id="null" style="height:80px; width:100ox; cursor:pointer;"  src="{{asset('public/upload/user/download.png')}}"><br>
							Name: <b id="teamb_name"> </b> <br>
							Username: <b id="teamb_username"> </b> <br>
							Joining Date: <b id="teamb_date"> </b> <br>
						</td> 
					</tr>
				</tbody>
			</table>
		</div>
		<button class="btn btn-danger back_button" type="button" data-id="null">Back</button>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	
	$(document).ready(function(){
		getTree();
		
		function getTree(Id = null){
			
			if(Id == null){
				var Id = '{{Auth::User()->username}}';
			}
			
			$.ajax({
				type: 'get',
				url: '{{ route('admin.team.data') }}',
				data:{
					id:Id
				},
				success: function(data){
					if(data.status == 'success'){
						$("#root #profile").attr("src", '{{asset('upload/user')}}/'+data.root_profile_picture);
						$("#root #profile").data("id", data.root_username);
						$("#root #name").html(data.root_name);
						$("#root #username").html(data.root_username);
						$("#root #date").html(data.root_registration_date);
						
						$("#root #teama_profile").attr("src", '{{asset('upload/user')}}/'+data.root_left_profile_picture);
						$("#root #teama_profile").data("id", data.root_left_username);
						$("#root #teama_name").html(data.root_left_name);
						$("#root #teama_username").html(data.root_left_username);
						$("#root #teama_date").html(data.root_left_registration_date);
						
						$("#root #teamb_profile").attr("src", '{{asset('upload/user')}}/'+data.root_right_profile_picture);
						$("#root #teamb_profile").data("id", data.root_right_username);
						$("#root #teamb_name").html(data.root_right_name);
						$("#root #teamb_username").html(data.root_right_username);
						$("#root #teamb_date").html(data.root_right_registration_date);
						
						$("#teamA #profile").attr("src", '{{asset('upload/user')}}/'+data.root_left_profile_picture);
						$("#teamA #profile").data("id", data.root_left_username);
						$("#teamA #name").html(data.root_left_name);
						$("#teamA #username").html(data.root_left_username);
						$("#teamA #date").html(data.root_left_registration_date);
						
						$("#teamA #teama_profile").attr("src", '{{asset('upload/user')}}/'+data.left_left_profile_picture);
						$("#teamA #teama_profile").data("id", data.left_left_username);
						$("#teamA #teama_name").html(data.left_left_name);
						$("#teamA #teama_username").html(data.left_left_username);
						$("#teamA #teama_date").html(data.left_left_registration_date);
						
						$("#teamA #teamb_profile").attr("src", '{{asset('upload/user')}}/'+data.left_right_profile_picture);
						$("#teamA #teamb_profile").data("id", data.left_right_username);
						$("#teamA #teamb_name").html(data.left_right_name);
						$("#teamA #teamb_username").html(data.left_right_username);
						$("#teamA #teamb_date").html(data.left_right_registration_date);
						
						$("#teamB #profile").attr("src", '{{asset('upload/user')}}/'+data.root_right_profile_picture);
						$("#teamB #profile").data("id", data.root_right_username);
						$("#teamB #name").html(data.root_right_name);
						$("#teamB #username").html(data.root_right_username);
						$("#teamB #date").html(data.root_right_registration_date);
						
						$("#teamB #teama_profile").attr("src", '{{asset('upload/user')}}/'+data.right_left_profile_picture);
						$("#teamB #teama_profile").data("id", data.right_left_username);
						$("#teamB #teama_name").html(data.right_left_name);
						$("#teamB #teama_username").html(data.right_left_username);
						$("#teamB #teama_date").html(data.right_left_registration_date);
						
						$("#teamB #teamb_profile").attr("src", '{{asset('upload/user')}}/'+data.right_right_profile_picture);
						$("#teamB #teamb_profile").data("id", data.right_right_username);
						$("#teamB #teamb_name").html(data.right_right_name);
						$("#teamB #teamb_username").html(data.right_right_username);
						$("#teamB #teamb_date").html(data.right_right_registration_date);
						$(".back_button").data("id", data.back_username);
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
		
		$(document).on('click','.teamMember',function(event){
			getTree($(this).data('id'));
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