@extends('layouts.backend')
@section('title','Message')

@section('css')

@endsection

@section('content')
	<div class="card">
		<div class="card-header">
		
				<div class="dropdown-info dropdown open float-right m-b-15 mb-3">
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#send-massage">Send Message</button>
				</div>
	
			<div class="card-body table-border-style">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped text-center table-sm">
			
							<thead>
								<tr>
									<th>Id:</th>
									<th>Sender ID:</th>
									<th>Sender Name:</th>
									<th>Subject:</th>
									<th>Read:</th>
								</tr>
							</thead>
			
						</table>
					</div>
				</div>
		</div>		
	</div>		
	
	
	
	
	
<!-- Send Message Modal -->
    <div class="modal fade" id="send-massage" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Send Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="main" method="post" action="/" novalidate>
                        <div class="form-group row">
							<label class="col-sm-3 col-form-label">Member ID:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="member-id" name="member-id" placeholder="Member ID">
								<span class="messages"></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Subject:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
								<span class="messages"></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Message:</label>
							<div class="col-sm-9">
								<textarea rows="3" cols="9" class="form-control"placeholder="Message"></textarea>
									<span class="messages"></span>
							</div>
						</div>	
						
						<div class="form-group row">
							<label class="col-sm-3"></label>
							<div class="col-sm-9">
								<div>
									<button type="submit" class="btn btn-sm bg-success m-b-0 ">Send Email</button>
									<button type="submit" class="btn btn-sm bg-primary m-b-0 ml-2 ">Refresh</button>
								</div>
							</div>
						</div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>	

@endsection

@section('js')

@endsection