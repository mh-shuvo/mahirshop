@extends('layouts.web')
@section('title','Contact')
@section('css')

@endsection
@section('content')

<section id="contact-us" style="background-color:#F0F0F0; height: 200px; font-weight: 100%;">
	<div class="text-center">
		<h1 style="padding-top:70px;">Contact Us</h1>
	</div>
</section>
	














    <!--contact area start-->
	<div class="container">
		<div class="row my-5" >
			<div class="col-md-6">
				<h1>Contact Us</h1>
				<ul class="list-group pt-4">
					<li class="list-group-item py-3">Address : Corporate Office: 32/8, West Tajmahal Road, Block-C, Mohammadpur, Dhaka-1207, Bangladesh.</li>
					<li class="list-group-item py-3">8801713041774 , +8801976633202
					</li>
					<li class="list-group-item py-3">
						nutrilifeblobal@gmail.com
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<h1>Tell Us Your Message</h1>
				<form action="/action_page.php" class="pt-4">
					<div class="form-group">
					  <label for="name" class="pb-3">Your Name (Requre):</label>
					  <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
					</div>
					<div class="form-group">
						<label for="email" class="pb-3">Email (Requre):</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
					  </div>
					  <div class="form-group">
						<label for="comment" class="pb-3">Comment:</label>
						<textarea class="form-control" rows="5" id="comment"></textarea>
					  </div>

					<button type="send" class="btn btn text-light" style="background-color:#88C74A;">Send</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				  </form>
			</div>
		</div>

	  </div>
    <!--contact area end-->
@endsection
@section('js')

@endsection