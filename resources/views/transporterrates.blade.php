@extends ('layouts.dashboard')
@section('page_heading','Transporter Rate Settings')

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
	
   if (old('warehouse') != NULL) {
		$wr_id = old('warehouse');
	}
	if (!isset($wr_id)) {
		$wr_id = NULL;
    }
    
    if (old('transporter') != NULL) {
		$trp_id = old('transporter');
	}
	if (!isset($trp_id)) {
		$trp_id = NULL;
	}
    
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingstransportrates">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Transporter</label>
			                <select class="form-control" id="transporter" name="transporter" required>
			                	<option></option> 
								@if (isset($transporters) && count($transporters) > 0)
											@foreach ($transporters->all() as $transporter)
												@if ($trp_id ==  $transporter->id)
													<option value="{{ $transporter->id }}" selected="selected">{{ $transporter->trp_name }}</option>
												@else
                                                <option value="{{ $transporter->id }}" >{{ $transporter->trp_name }}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

                <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Warehouse</label>
			                <select class="form-control" id="warehouse" name="warehouse" required>
			                	<option></option> 
								@if (isset($warehouses) && count($warehouses) > 0)
											@foreach ($warehouses->all() as $warehouse)
												@if ($wr_id ==  $warehouse->id)
													<option value="{{ $warehouse->id }}" selected="selected">{{ $warehouse->wr_name }}</option>
												@else
                                                <option value="{{ $warehouse->id }}" >{{ $warehouse->wr_name }}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Rate</label>
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
				<h3>Transporters</h3>
				<table class="table table-striped" id="process-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
                    <th>
						Transporter
					</th>
					<th>
						Warehouse
					</th>
					<th>
						Rate
					</th>
                
                    <th>
						Date Ended
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

						if (isset($transportrates) && count($transportrates) > 0) {
							foreach ($transportrates as $value) {
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
									echo "<td>".$value->trp_name."</td>";
                                    echo "<td>".$value->wr_name."</td>";
                                    echo "<td>".$value->rate."</td>";
                                    echo "<td>".$value->date_ended."</td>";
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
var path= "{{URL::to('settingstransportrates')}}";
$(document).ready(function (){  
	var table = $('#process-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var processID=val.id;
	

	  var url = '{{ route('settingstransportrates.transport_rate_delete',['id'=>":id"]) }}';
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