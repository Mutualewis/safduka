@extends ('layouts.dashboard')
@section('page_heading','Client Settings')

@section('section')

<div class="col-md-12">

	<div class="row">
		<div class="col-md-6">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif	


			<div class="flash-message">
			    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))

			      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
			    @endforeach
			  </div> <!-- end .flash-message -->

		</div>				
	</div>

<?php 
	
   if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($qid)) {
		$cid = NULL;
	}
	
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsclient">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="Client" name="cl_name" value="{{ old('cl_name') }}" required>
		            </div>		            

		        </div>


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Address</label>
		                <textarea class="form-control" placeholder="Address" name="address" value="{{ old('address') }}" required rows="7"></textarea>
		            </div>		            

		        </div>

		          <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Courier</label>
		                <input class="form-control" placeholder="courier" name="courier" value="{{ old('courier') }}" required>
		            </div>		            

		        </div>
		          <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Telephone</label>
		                <input class="form-control" placeholder="Telephone" name="phone" value="{{ old('phone') }}" required >
		            </div>		            

		        </div>
		        <div class="row">
		        <div class="form-group col-md-6">
		            	<label>Email</label>
		                <textarea class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required rows="7"></textarea>
		         </div>	
	        	</div>
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Update/ Add</button>						
		            </div>

		        </div>

	        </form>

    </div>
	<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">
		<form role="form" method="POST" action="settingsclient">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Clients</h3>
				<table class="table table-striped" id="client-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Name
					</th>
					<th>
						Address
					</th>
					<th>
						Courier
					</th>
					<th>
						Telephone
					</th>
					<th>
						Email
					</th>
					
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($clients) && count($clients) > 0) {
							foreach ($clients as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->cl_name."</td>";
									echo "<td>".$value->cl_address."</td>";
									echo "<td>".$value->cl_courier."</td>";
									echo "<td>".$value->cl_telephone."</td>";
									echo "<td>".$value->cl_email."</td>";
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
									echo "</tr>";
									echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>



</div>
@stop

@push('scripts')
<script>
var path= "{{URL::to('settingsclient')}}";
$(document).ready(function (){  
	var table = $('#client-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var clientID=val.id;
	

	  var url = '{{ route('settingsclient.client_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', clientID);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
			  if (data.deletable) {
			  	//location.reload();
			  	$(location).attr('href',path)
			  }else{
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>This item cannot be deleted. It already has other details</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  }
			}).error(function(error) {
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>Error occured on attempt to delete</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  
			});

		}
</script>
@endpush