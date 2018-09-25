@extends ('layouts.dashboard')
@section('page_heading','Buyer Settings')

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
	
   if (old('buyertype') != NULL) {
		$bt_id = old('buyertype');
	}
	if (!isset($bt_id)) {
		$bt_id = NULL;
	}
	
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsbuyers">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	 <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Buyer Type</label>
			                <select class="form-control" id="buyertype" name="buyertype" required>
			                	<option></option> 
								@if (isset($buyertypes) && count($buyertypes) > 0)
											@foreach ($buyertypes as $buyertype)
												@if ($bt_id ==  $buyertype->id)
													<option value="{{ $buyertype->id }}" selected="selected">{{ $buyertype->bt_name }}</option>
												@else
													<option value="{{ $buyertype->id }}">{{ $buyertype->bt_name }}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="Buyer Name" name="cb_name" value="{{ old('cb_name') }}" required>
		            </div>		            

		        </div>


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Code</label>
		                <input class="form-control" placeholder="Code" name="cb_code" value="{{ old('cb_code') }}" required>
		            </div>		            

		        </div>


		          <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Email</label>
		                <input class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
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
		<form role="form" method="POST" action="settingsbuyers">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Buyers</h3>
				<table class="table table-striped" id="buyers-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Name
					</th>
					<th>
						Code
					</th>
					<th>
						Email
					</th>
					<th>
						Buyer Type
					</th>
					
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($buyers) && count($buyers) > 0) {
							foreach ($buyers as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->cb_name."</td>";
									echo "<td>".$value->cb_code."</td>";
									echo "<td>".$value->cb_email."</td>";
									echo "<td>".$value->bt_name."</td>";
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
var path= "{{URL::to('settingsbuyers')}}";
$(document).ready(function (){  
	var table = $('#buyers-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var buyerID=val.id;
	

	  var url = '{{ route('settingsbuyers.buyer_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', buyerID);
	 
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