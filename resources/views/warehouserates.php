@extends ('layouts.dashboard')
@section('page_heading','Service Rate Settings')

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
	
   if (old('region') != NULL) {
		$rid = old('region');
	}
	if (!isset($rid)) {
		$rid = NULL;
	}
    if (old('process') != NULL) {
		$p_id = old('process');
	}
	if (!isset($p_id)) {
		$p_id = NULL;
	}
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsprocessrates">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	  <div class="row">
	        		
                 
	        		
		            <div class="form-group col-md-6">
		            	<label>Service</label>
		                <input class="form-control" placeholder="service" name="service" value="{{ old('service') }}" required>
		            </div>		            

		          
                </div> 

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Rate Per Bag</label>
		                <input class="form-control" placeholder="rate" name="rate" value="{{ old('rate') }}" required>
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
		<form role="form" method="POST" action="settingsmills">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Services</h3>
				<table class="table table-striped" id="process-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Service
					</th>
					<th>
						Rate per bag
					</th>
					<th>
						Active
					</th>
					
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($processrates) && count($processrates) > 0) {
							foreach ($processrates as $value) {
								$count += 1;
                                $id = $value->id;
                                if($value->active==1){
                                    $active='YES';
                                }else {
                                    # code...
                                    $active='NO';
                                }
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->service."</td>";
									echo "<td>".$value->rate."</td>";
									echo "<td>".$active."</td>";
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
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
var path= "{{URL::to('settingsprocessrates')}}";
$(document).ready(function (){  
	var table = $('#process-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var processID=val.id;
	

	  var url = '{{ route('settingsprocessrates.process_rates_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', processID);
	 
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