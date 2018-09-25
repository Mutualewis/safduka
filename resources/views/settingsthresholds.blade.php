@extends ('layouts.dashboard')
@section('page_heading','Threshold Settings')

@section('section')

<div class="col-md-14 col-md-offset-1">

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
	if (!isset($cid)) {
		$cid = NULL;
	}

?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsthresholds">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	
	        		 <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Country</label>
			                <select class="form-control" id="country" name="country" required>
			                	<option></option> 
								@if (isset($country) && count($country) > 0)
											@foreach ($country->all() as $countries)
												@if ($cid ==  $countries->id)
													<option value="{{ $countries->id }}" selected="selected">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
												@else
													<option value="{{ $countries->id }}">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>


	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Threshold</label>
		                <input class="form-control" placeholder="Threshold" name="threshold" value="{{ old('threshold') }}">
		            </div>		            

		        </div>


	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Percentage</label>
		                <input class="form-control" placeholder="Percentage" name="percentage" value="{{ old('percentage') }}">
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
		<form role="form" method="POST" action="settingsthresholds">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Thresholds</h3>
				<table class="table table-striped" id="threshold-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Country
					</th>
					<th>
						Threshold
					</th>
					<th>Percentage</th>
					<th>Delete</th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($thresholds) && count($thresholds) > 0) {

							foreach ($thresholds as $value) {
								$count += 1;
								$id = $value->thid;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->ctr_name."</td>";
									echo "<td>".$value->th_name."</td>";
									echo "<td>".$value->th_percentage."</td>";
								
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
								echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>

	<!-- Modal -->
<div class="modal fade" id="menuModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
		  <h4 class="alert-heading"></h4>
		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
        <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
      </div>
    </div>
  </div>
</div>
</div>
@stop

@push('scripts')
<script>
var latestid=null
var rowno=1
var path= "{{URL::to('settingsthresholds')}}";
$(document).ready(function (){  
	var table = $('#threshold-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var departmentID=val.id;
	
	  var url = '{{ route('settingsthresholds.threshold_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', departmentID);
	 
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