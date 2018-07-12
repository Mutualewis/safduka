@extends ('layouts.dashboard')
@section('page_heading','Weighbridge Out')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-5">
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
	if(session('maincountry')!=NULL){
		$cidmain=session('maincountry');
	}
	$autosubmit=false;
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)){
		$cid=$cidmain;
		$autosubmit=true;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}

	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}
	if (!isset($driver_name )) {
		$driver_name = NULL;
	}	if (!isset($driver_id )) {
		$driver_id = NULL;
	}	if (!isset($movement_permit )) {
		$movement_permit = NULL;
	}	if (!isset($weighbridge_ticket )) {
		$weighbridge_ticket = NULL;
	}	if (!isset($weighbridge_weight_in)) {
		$weighbridge_weight_in = NULL;
	}	if (!isset($vehicle_plate )) {
		$vehicle_plate = NULL;
	}	if (!isset($weighbridge_weight_out)) {
		$weighbridge_weight_out = NULL;
	
	}	if (!isset($dnn)) {
		$dnn = NULL;
	}
	$screen = 0;
	$process = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		// print_r($cdetails."lewis");
	}

	if (isset($weighbridge)){
		$weighbridge_ticket = $weighbridge->wb_ticket;
		$vehicle_plate = $weighbridge->wb_vehicle_plate;
		$weighbridge_weight_in = $weighbridge->wb_weight_in;
		$weighbridge_weight_out = $weighbridge->wb_weight_out;
		$slr = $weighbridge->slr_id;
		$dnn = $weighbridge->wb_delivery_number;
		$movement_permit = $weighbridge->wb_movement_permit;
		$driver_name = $weighbridge->wb_driver_name;
		$driver_id = $weighbridge->wb_driver_id;
		// $date = $weighbridge->wb_dispatch_date;



	}



	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="weighbridgeout" id="weighbridgeoutform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-6">
			                <label>Country</label>
			                <select class="form-control" name="country"  onchange="this.form.submit()">
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
			            <div class="form-group col-md-6">
			               	<label>Buyer</label>
			                <select class="form-control" name="coffee_buyer" onchange="this.form.submit()">
			               		<option></option>
								@if (isset($buyer) && count($buyer) > 0)										
											@foreach ($buyer->all() as $buyers)
											@if ($sale_cb_id ==  $buyers->id)
												<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->cb_name}}</option>
											@else
												<option value="{{ $buyers->id }}">{{ $buyers->cb_name}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>	

			        </div>

<!-- 		        	<div class="row" >


			            <div class="form-group col-md-6">
			                <label>Seller</label>
			                <select class="form-control" name="seller" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($seller) && count($seller) > 0)
											@foreach ($seller->all() as $sellers)
												@if ($slr ==  $sellers->id)
													<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
												@else
													<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>
			            </div>


			        </div> -->

<!-- 	        	<div class="row">

	           		<div class="form-group col-md-6">
		                <label>Sale</label>
		                <select class="form-control" name="sale" onchange="this.form.submit()">
		                	<option>Sale No.</option> 
							@if (isset($sale) && count($sale) > 0)
										@foreach ($sale->all() as $sales)
											@if ($saleid ==  $sales->id)
												<option value="{{ $sales->id }}" selected="selected">{{ $sales->sl_no}}</option>
											@else
												<option value="{{ $sales->id }}">{{ $sales->sl_no}}</option>
											@endif

										@endforeach
							@else
								<option>No Sale Found</option>		
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-6">
		                <label>Transporter</label>
		                <select class="form-control" name="trp" disabled>
		                	<option></option> 
							@if (isset($transporters) && count($transporters) > 0)
										@foreach ($transporters->all() as $value)
											@if ($trp ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->trp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->trp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
	            </div> -->

			    <h3>Delivery Information</h3>
<!-- 	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Driver Name</label>
		                <input class="form-control" name="driver_name" style="text-transform:uppercase" value="{{ old('driver_name'). $driver_name }}">
		            </div>
		            <div class="form-group col-md-6">
		            	<label>Driver ID</label>
		           		<input class="form-control" name="driver_id" style="text-transform:uppercase" value="{{ old('driver_id'). $driver_id }}">
		            </div>  
	            </div> -->

	        	<div class="row">
<!-- 		            <div class="form-group col-md-6">
		                <label>Movement Permit</label>
		                <input class="form-control" name="movement_permit" style="text-transform:uppercase" value="{{ old('movement_permit'). $movement_permit }}">
		            </div> -->

	        		<div class="form-group col-md-6">
	                    <label>Weighbridge Ticket</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="weighbridge_ticket" style="text-transform:uppercase; " placeholder="weighbridge ticket"  value="{{ old('weighbridge_ticket'). $weighbridge_ticket }}"></input>
		                        <span class="input-group-btn"><br>
		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	


<!-- 		            <div class="form-group col-md-6">
		            	<label>Ticket Number</label>
		           		<input class="form-control" name="weighbridge_ticket" style="text-transform:uppercase" value="{{ old('weighbridge_ticket'). $weighbridge_ticket }}">
		            </div> 
 -->
		            <div class="form-group col-md-6">
		            	<label>Movement Permit</label>
		                <input type="text"  class="form-control" name="movement_permit" style="text-transform:uppercase" placeholder="Movement Permit" value="{{ old('movement_permit'). $movement_permit }}" readonly>	                
		            </div> 


	            </div>

	            <div class="row">
		            <div class="form-group col-md-6">
		           		<label>Driver Name</label>
		                <input type="text"  class="form-control" name="driver_name" style="text-transform:uppercase" value="{{ old('driver_name'). $driver_name }}" readonly>	                
		            </div> 
		            <div class="form-group col-md-6">
		           		<label>Driver ID</label>
		                <input type="text"  class="form-control" name="driver_id" style="text-transform:uppercase" value="{{ old('driver_id'). $driver_id }}" readonly>	                
		            </div> 
	            	
	            </div>
	            <div class="row">
		            <div class="form-group col-md-6">
		            	<label>Vehicle Plate Number</label>
		           		<input class="form-control" name="vehicle_plate" style="text-transform:uppercase" placeholder="vehicle plate"  value="{{ old('vehicle_plate'). $vehicle_plate }}" readonly>
		            </div>  
		            <div class="form-group col-md-6">
		                <label>Weight Out</label>
		                <input class="form-control" name="weighbridge_weight_out" style="text-transform:uppercase" value="{{ old('weighbridge_weight_out'). $weighbridge_weight_out }}">
		            </div>		            	            
	            </div>
				
				<h3>Dispatch Information</h3>
	            <div class="row">	

		            <div class="form-group col-md-6">
		            	<label>Delivery Note Number</label>
		           		<input class="form-control" name="dnn" style="text-transform:uppercase" value="{{ old('dnn'). $dnn }}" readonly>
		            </div>  
		            <div class="form-group col-md-6">
		           		<label>Dispatch Date</label>
		                <input type="text"  class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}" readonly>	                
		            </div>

		        </div>
	      


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Weighbridge Information</button>
		            </div>				
		            <div class="form-group col-md-12">
		           		<button type="submit" name="print" class="btn btn-lg btn-success btn-block">Print Weighbridge Ticket</button>
		            </div>		
		        </div>
			</form>

	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="weighbridgeout">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Brought </h3>
				<table class="table table-striped">
				<thead>
				<tr>	
					<th>
						Date
					</th>							  
<!-- 					<th>
						Driver Name
					</th>
					<th>
						Driver ID
					</th>
					<th>
						Mvt. Permit
					</th> -->
					<th>
						Weighbridge Ticket
					</th>
					<th>
						Vehicle Plate
					</th>

					<th>
						Weight In
					</th>
					<th>
						Weight Out
					</th>
					<th>
						Unloaded
					</th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$total_bags = 0;
						$total_pkts = 0;
						$count = 0;
						$count_green = 0;
						$count_process = 0;
						$count_screen = 0;
						$count_cup = 0;
						$total_price = 0;
						$total = 0;

						if (isset($weighbridge_all) && count($weighbridge_all) > 0) {

							foreach ($weighbridge_all->all() as $value) {
									// print_r($season->acat_id);
								$total += $value->weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($value->weight)/50 * ($value->price);

								$total_price += $total_value;
								// $total_price += $sale_lots->price;


							
								// if ($value->warrant_no == NULL) {
							
								// 	echo "<tr style='color:red;'>";
								
								// } else {

								// 	echo "<tr>";
								// }
									echo "<tr>";

									$date=date_create($value->wb_date);
									$date = date_format($date,"m/d/Y");	
									// $date = date("m/d/Y", strtotime($date));
									$diff_weight = $value->wb_weight_in - $value->wb_weight_out;
									echo "<td>".$date."</td>";								
									echo "<td>".$value->wb_ticket."</td>";
									echo "<td>".$value->wb_vehicle_plate."</td>";
									echo "<td>".$value->wb_weight_in."</td>";
									echo "<td>".$value->wb_weight_out."</td>";
									echo "<td>".$diff_weight."</td>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
						<td></td>
					    <td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
				</tbody>
				</table>
		</form>
	</div>
</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#weighbridgeoutform" ).submit();
		}
	})
</script>
@endpush