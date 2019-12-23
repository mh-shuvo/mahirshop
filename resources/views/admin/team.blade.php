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