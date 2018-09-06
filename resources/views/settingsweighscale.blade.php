@extends ('layouts.dashboard')
@section('page_heading','Weigh Scale Settings')

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

	if (!isset($cid)) {
		$cid = NULL;
	}

	if (!isset($wrhse)) {
		$wrhse = NULL;
	}

	if (!isset($warehouse_count)) {
		$warehouse_count = NULL;
	}
	
?>

	<div class="col-md-6 col-md-offset-0">	

	        <form role="form" method="POST" action="/settingsweighscale">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	         	<div class="row">
	        		
		            <div class="form-group col-md-6">

		            	<label>Country</label>
			                <select class="form-control" name="country" onchange="this.form.submit()" required>
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
		                <label>Warehouse</label>
		                <select class="form-control" name="warehouse" onchange="this.form.submit()">
		                	<option></option> 

					        	<?php

					        		for ($i=0; $i < $warehouse_count; $i++) {  

					        			$id = 0;

					        			$name = null;

					        			foreach ($warehouse[0][$i] as $key => $value) {

					        				if ($key == 'id') {

					        					$id = $value;
					        				}

					        				if ($key == 'wr_name') {
					        					
					        					$name = $value;
					        				}
					        			}
					        			if ($wrhse ==  $id){

					        				echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';

					        			} else {

					        				echo '<option value="'.$id.'" >'.$name.'</option>';

					        			}
					        			
					        		}

	            				?>

	            		</select>
            		</div>




		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Station Number</label>
		                <input class="form-control" placeholder="Station" name="station" value="{{ old('station') }}">
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Equipment Number</label>
		                <input class="form-control" placeholder="Equipment Number" name="equipment" value="{{ old('equipment') }}">
		            </div>		            

		        </div>

		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Baud Rate</label>
		                <input class="form-control" placeholder="Baud" name="baud" value="{{ old('baud') }}">
		            </div>		            

		        </div>
	        	
	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Parity</label>
		                <input class="form-control" placeholder="Parity" name="parity" value="{{ old('parity') }}">
		            </div>		            

		        </div>
	        	
	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Stop Bits</label>
		                <input class="form-control" placeholder="Stop Bits" name="stopBits" value="{{ old('stopBits') }}">
		            </div>		            

		        </div>
	        	
	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Data Bits</label>
		                <input class="form-control" placeholder="Data Bits" name="dataBits" value="{{ old('dataBits') }}">
		            </div>		            

		        </div>
	        	
	        	<div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Port Name</label>
		                <input class="form-control" placeholder="Port" name="port" value="{{ old('port') }}">
		            </div>		            

		        </div>
	        	
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submitsettings" class="btn btn-lg btn-success btn-block">Update/ Add</button>						
		            </div>

		        </div>


    </div>
	<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">	
				<h3>Weigh Scales</h3>
				<table class="table table-striped" id="buyers-table">
				<thead>
				  <tr>
					
					<th></th>

					<th>
						Station
					</th>

					<th>
						Eq. Number
					</th>

					<th>
						Baud Rate
					</th>

					<th>
						Parity
					</th>

					<th>
						Stop Bits 
					</th>

					<th>
						Data Bits 
					</th>
					
					<th>
						Port Name
					</th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($weigh_scales) && count($weigh_scales) > 0) {

							for ($i=0; $i < $weigh_scales_count; $i++) {  

								echo "<tr>";
									foreach ($weigh_scales[0][$i] as $key => $value) {

										if ($key == 'id') {

											echo "<td>"."<a id='".$value."' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
										}		

										if ($key == 'ws_station') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_equipment_number') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_baud_rate') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_parity') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_stop_bits') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_data_bits') {

											echo "<td>".$value."</td>";

										}

										if ($key == 'ws_port_name') {

											echo "<td>".$value."</td>";

										}								

									}
								echo "</tr>";

							}

								echo "<tr>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
								echo "</tr>";
						}
					?>
				</tbody>
				</table>
	</div>
	</form>



</div>
@stop

@push('scripts')
<script>
var path= "{{URL::to('settingsweighscale')}}";
$(document).ready(function (){  
	var table = $('#buyers-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var trpID=val.id;

	  alert(trpID);
	

	  var url = '{{ route('settingsweighscale.weigh_scale_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', trpID);
	 
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