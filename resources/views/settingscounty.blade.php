@extends ('layouts.dashboard')
@section('page_heading','County Settings')

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
	if (old('region') != NULL) {
		$rid = old('region');
	}
	if (!isset($rid)) {
		$rid = NULL;
	}

?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingscountys">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	 <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Country</label>
			                <select class="form-control" id="country" name="country" required>
			                	<option></option> 
								@if (isset($countries) && count($countries) > 0)
											@foreach ($countries->all() as $country)
												@if ($cid ==  $country->id)
													<option value="{{ $country->id }}" selected="selected">{{ $country->ctr_name . " (".$country->ctr_initial.")"}}</option>
												@else
													<option value="{{ $country->id }}">{{ $country->ctr_name . " (".$country->ctr_initial.")"}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>


	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Region</label>
			                <select class="form-control" id="region" name="region" required>
			                	<option></option> 
								@if (isset($regions) && count($regions) > 0)
											@foreach ($regions->all() as $region)
												@if ($rid ==  $region->id)
													<option value="{{ $region->id }}" selected="selected">{{ $region->rgn_name }}</option>
												@else
													<option value="{{ $region->id }}">{{ $region->rgn_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

		        
		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>County</label>
		                <input class="form-control" placeholder="county" name="county" value="{{ old('county') }}" required>
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
		<form role="form" method="POST" action="settingsregion">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Countys</h3>
				<table class="table table-striped" id="county-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						County Name
					</th>
					<th>
						Country
					</th>
					<th>
						Region
					</th>
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($counties) && count($counties) > 0) {
							foreach ($counties as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->cnt_name."</td>";
									echo "<td>".$value->ctr_name."</td>";
									echo "<td>".$value->rgn_name."</td>";
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
var path= "{{URL::to('settingscountys')}}";
$(document).ready(function (){  
	var table = $('#county-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var countyID=val.id;
	

	  var url = '{{ route('settingscountys.county_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', countyID);
	 
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