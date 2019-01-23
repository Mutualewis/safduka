@extends ('layouts.dashboard')
@section('page_heading','Warehouse Settings')

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
	if (old('warehousetype') != NULL) {
		$wrt_id = old('warehousetype');
	}
	if (!isset($rid)) {
		$wrt_id = NULL;
	}

?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingswarehouse">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Region</label>
			                <select class="form-control" id="region" name="region" required>
			                	<option></option> 
								@if (isset($region) && count($region) > 0)
											@foreach ($region->all() as $regions)
												@if ($rid ==  $regions->id)
													<option value="{{ $regions->id }}" selected="selected">{{ $regions->rgn_name }}</option>
												@else
													<option value="{{ $regions->id }}">{{ $regions->rgn_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Warehouse Type</label>
			                <select class="form-control" id="warehousetype" name="warehousetype" required>
			                	<option></option> 
								@if (isset($warehousetypes) && count($warehousetypes) > 0)
											@foreach ($warehousetypes as $warehousetype)
												@if ($wrt_id ==  $warehousetype->id)
													<option value="{{ $warehousetype->id }}" selected="selected">{{ $warehousetype->wrt_name }}</option>
												@else
													<option value="{{ $warehousetype->id }}">{{ $warehousetype->wrt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="warehouse" name="warehouse" value="{{ old('warehouse') }}" required>
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Initials</label>
		                <input class="form-control" placeholder="Initials" name="initials" value="{{ old('initials') }}" required>
		            </div>		            

		        </div>

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Description</label>
		                <input class="form-control" placeholder="Description" name="description" value="{{ old('description') }}" required>
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
				<h3>Warehouses</h3>
				<table class="table table-striped" id="warehouse-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Warehouse
					</th>
					<th>
						Initials
					</th>
					<th>
						Description
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

						if (isset($warehouse) && count($warehouse) > 0) {
							foreach ($warehouse as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->wr_name."</td>";
									echo "<td>".$value->wr_description."</td>";
									echo "<td>".$value->wr_initials."</td>";
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
var path= "{{URL::to('settingswarehouse')}}";
$(document).ready(function (){  
	var table = $('#warehouse-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
				e.preventDefault();

				var warehouseID=val.id;
	

	 var url = '{{ route('settingswarehouse.warehouse_delete',['id'=>":id"]) }}';
	 url = url.replace(':id', warehouseID);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
				console.log(data);
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