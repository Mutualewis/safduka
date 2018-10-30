@extends ('layouts.dashboard')
@section('page_heading','Intake Ticket')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-12">
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
	if (!isset($region_id)) {
		$region_id = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}
	if (!isset($driver_name )) {
		$driver_name = NULL;
	}	
	if (!isset($driver_id )) {
		$driver_id = NULL;
	}	
	if (!isset($movement_permit )) {
		$movement_permit = NULL;
	}	
	if (!isset($weighbridge_ticket )) {
		$weighbridge_ticket = NULL;
	}	
	if (!isset($weighbridge_weight_in)) {
		$weighbridge_weight_in = NULL;
	}	
	if (!isset($vehicle_plate )) {
		$vehicle_plate = NULL;
	}	
	if (!isset($weighbridge_weight_out)) {
		$weighbridge_weight_out = NULL;
	}		
	if (!isset($dnn)) {
		$dnn = NULL;
	}		
	if (!isset($parking_lot)) {
		$parking_lot = NULL;
	}			
	if (!isset($booking_id)) {
		$booking_id = NULL;
	}			
	if (!isset($selected_items)) {
		$selected_items = array();
	}		
	if (!isset($selected_customers)) {
		$selected_customers = array();
	}			
	if (!isset($transporter_id)) {
		$transporter_id = array();
	}	
	
	if (!isset($date_current)) {
		$date_current = NULL;
	}	
	
	if (!isset($time)) {
		$time = NULL;
	}	
	
	if (!isset($weighbridge_id)) {
		$weighbridge_id = NULL;
	}
	
	if (!isset($representative_name)) {
		$representative_name = NULL;
	}
	
	if (!isset($representative_id)) {
		$representative_id = NULL;
	}
	
	if (!isset($document_unit)) {
		$document_unit = NULL;
	}
	
	if (!isset($document_quantity)) {
		$document_quantity = NULL;
	}

	use Ngea\DeliveryItems;
	use Ngea\coffeegrower;


	if (isset($weighbridge)){
		$weighbridge_ticket = $weighbridge->wbi_ticket;
		$vehicle_plate = $weighbridge->wbi_vehicle_plate;
		$weighbridge_weight_in = $weighbridge->wbi_weight_in;
		$weighbridge_weight_out = $weighbridge->wbi_weight_out;

		$dnn = $weighbridge->wbi_delivery_number;

		$movement_permit = $weighbridge->wbi_movement_permit;
		$driver_name = $weighbridge->wbi_driver_name;
		$driver_id = $weighbridge->wbi_driver_id;
		$region_id = $weighbridge->rgn_id;
		$booking_id = $weighbridge->bkg_id;

		$parking_lot = $weighbridge->pl_id;

		$time_in = $weighbridge->wbi_time_in;

    	$date_current=date_create($time_in);
		$date_current = date_format($date_current,"m/d/Y"); 

    	$time =date_create($time_in);
		$time = date_format($time,"H:i:s"); 

		$representative_name = $weighbridge->wbi_representative_name;
		$representative_id = $weighbridge->wbi_representative_id;
		$transporter_id = $weighbridge->trp_id;
		$weighbridge_id = $weighbridge->wb_id;
		$document_unit = $weighbridge->wbi_document_unit;
		$document_quantity = $weighbridge->wbi_document_quantity;


		$selected_items_array = DeliveryItems::where('wbi_id', $weighbridge_id)->get();
		$grower = coffeegrower::get();

		foreach ($selected_items_array->all() as $key => $value) {
			$selected_items[] = $value->it_id;
			$selected_customers[] = $value->cgr_id;
		}
		



// id, ctr_id, csn_id, cb_id, slr_id, wbi_ticket, wbi_delivery_number, wbi_vehicle_plate, wbi_weight_in, wbi_weight_out, wbi_confirmedby, wbi_time_in, wbi_time_out, wbi_movement_permit, wbi_driver_name, wbi_driver_id, wbi_dispatch_date, created_at, updated_at, rgn_id, bkg_id, trp_id, wbi_representative_name, wbi_representative_id, pl_id

// selected_items
// selected_customers







	}
?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="weighbridge" id="weighbridgeform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Basic Details</h3>				
		            </div>
		        </div>

	        	<div class="row" >
		            <div class="form-group col-md-4">
		                <label>Location</label>
		                <select class="form-control" id="region" name="region" onclick='fetchWeighbridge()'>
		                	<option></option> 
							@if (isset($region) && count($region) > 0)
										@foreach ($region->all() as $value)
											@if ($region_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->rgn_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->rgn_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

	        		<div class="form-group col-md-4">
	                    <label>Weighbridge Ticket</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="weighbridge_ticket" style="text-transform:uppercase; " placeholder="weighbridge ticket"  value="{{ $weighbridge_ticket }}"></input>
		                        <span class="input-group-btn"><br>
		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>
	                    </span>
	                    </div>
	                </div>	

	        		<div class="form-group col-md-3">
	                    <label>Parking Lot Number</label>
                    	<input type="text" class="form-control" id="parking_lot" name="parking_lot" style="text-transform:uppercase; " placeholder="Parking Lot Number"  value="{{ $parking_lot }}"></input>	  
	                </div>	

	        		<div class="form-group col-md-1">
	                    <label> </label></br>
	        			<button type="button" name="searchButton" class="btn"  onclick='fetchParking()' >Fetch</button>
	                </div>	

		        </div>

	        	<div class="row" >
		            <div class="form-group col-md-4">
		                <label>Booking Reference Number</label>
		                <select class="form-control" name="booking">
		                	<option></option> 
							@if (isset($booking) && count($booking) > 0)
										@foreach ($booking->all() as $value)
											@if ($booking_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->bkg_ref_no}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->bkg_ref_no}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		           		<label>Arrival Date</label>
		                <input type="text"  class="form-control" name="date_current" style="text-transform:uppercase" value="{{ old('date_current').$date_current }}" disabled>	
		                <input type="hidden"  class="form-control" name="date_current" style="text-transform:uppercase" value="{{ old('date_current').$date_current }}">	                
		            </div>

		            <div class="form-group col-md-4">
		           		<label>Arrival Time</label>
		                <input type="text"  class="form-control" name="time" style="text-transform:uppercase" value="{{ old('time').$time}}" disabled>	                
		                <input type="hidden"  class="form-control" name="time" style="text-transform:uppercase" value="{{ old('time').$time }}">	     
		            </div>

		        </div>

	        	<div class="row" >
		            <div class="form-group col-md-4">
		                <label>Item Name</label>
		                <select class="form-control" id="select-items" name="items[]"  multiple="multiple" onchange=fetchClients();>
							@if (isset($items) && count($items) > 0)
										@foreach ($items->all() as $value)
											@if (in_array($value->id, $selected_items))
												<option value="{{ $value->id }}" selected="selected">{{ $value->it_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->it_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-4">
		                <label>Customer Name</label>
		                <select class="form-control" id="select-customer" name="customer[]"  multiple="multiple">
							@if (isset($grower) && count($grower) > 0)
										@foreach ($grower->all() as $value)
											@if (in_array($value->id, $selected_customers))
												<option value="{{ $value->id }}" selected="selected">{{ $value->cgr_grower}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cgr_grower}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            
		            </div>

	        		<div class="form-group col-md-4">
	        			<label>Client Representative Name</label>
                    	<input type="text" class="form-control" name="representative_name" style="text-transform:uppercase; " placeholder="Name" value="{{ old('representative_name'). $representative_name }}"></input>	  
	                </div>	
		        </div>

		        <div class="row">
	        		<div class="form-group col-md-4">
	        			<label>Client Representative ID</label>
                    	<input type="text" class="form-control" name="representative_id" style="text-transform:uppercase; " placeholder="ID" value="{{ old('representative_id'). $representative_id }}"></input>	  
	                </div>	
		            <div class="form-group col-md-4">
		                <label>Weigh Bridge</label>
		                <select class="form-control" id="weighbridge" name="weighbridge">
		                	<option></option> 
							@if (isset($weighbridges) && count($weighbridges) > 0)
										@foreach ($weighbridges->all() as $value)
											@if ($weighbridge_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->wb_number}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->wb_number}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>		

		            <div class="form-group col-md-3">
		                <label>First Weight</label>
		                <input class="form-control" name="weighbridge_weight_in" style="text-transform:uppercase" value="{{ old('weighbridge_weight_in'). $weighbridge_weight_in }}">
		            </div>	

		            <div class="form-group col-md-1">
		            	<label></label>
			            <?php
			            	$weigh_scale_session = "scale - ".$cid."";
			            	
			            	if(session()->has($weigh_scale_session)) {
			            ?>		
			            	<button type="submit" name="resetweight" class="btn btn-lg btn-danger btn-block" formnovalidate>Reset</button>	  	

				        <?php
				        	} else {

				        ?>							          		           	
							<button type="submit" name="fetchweight" class="btn btn-lg btn-success btn-block" disabled>Fetch</button>

				        <?php
				        	}
				        ?>

		            </div>	

		        </div>

		        <div class="row">
	        		<div class="form-group col-md-4">
	        			<label>Document Units</label>
                    	<input type="text" class="form-control" name="document_unit" style="text-transform:uppercase; " placeholder="document unit" value="{{ old('document_unit'). $document_unit }}"></input>	  
	                </div>	
	        		<div class="form-group col-md-4">
	        			<label>Document Quantity</label>
                    	<input type="text" class="form-control" name="document_quantity" style="text-transform:uppercase; " placeholder="document quantity" value="{{ old('document_quantity'). $document_quantity }}"></input>	  
	                </div>	

		        </div>

			    <h3>Transporter Details</h3>
	            <div class="row">
		            <div class="form-group col-md-4">
		                <label>Transporter</label>
		                <select class="form-control" name="transporter">
		                	<option></option> 
							@if (isset($transporters) && count($transporters) > 0)
										@foreach ($transporters->all() as $value)
											@if ($transporter_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->trp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->trp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>		

		            <div class="form-group col-md-4">
		           		<label>Driver Name</label>
		                <input type="text"  class="form-control" name="driver_name" style="text-transform:uppercase" value="{{ old('driver_name'). $driver_name }}">	                
		            </div> 
		            <div class="form-group col-md-4">
		           		<label>Driver ID</label>
		                <input type="text"  class="form-control" name="driver_id" style="text-transform:uppercase" value="{{ old('driver_id'). $driver_id }}">	                
		            </div>  
	            	
	            </div>


	        	<div class="row">
		            <div class="form-group col-md-4">
		            	<label>Vehicle Plate Number</label>
		           		<input class="form-control" name="vehicle_plate" style="text-transform:uppercase" value="{{ old('vehicle_plate'). $vehicle_plate }}">
		            </div> 	 
		            <div class="form-group col-md-4">
		            	<label>Movement Permit</label>
		                <input type="text"  class="form-control" name="movement_permit" style="text-transform:uppercase" placeholder="Movement Permit" value="{{ old('movement_permit'). $movement_permit }}">	                
		            </div> 
	            </div>

	            <h3>Dispatch Information</h3>
	        	<div class="row" >
		            <div class="form-group col-md-6">
		            	<label>Delivery Note Number</label>
		           		<input class="form-control" name="dnn" style="text-transform:uppercase" value="{{ old('dnn'). $dnn }}">
		            </div>  
		            <div class="form-group col-md-6">
		           		<label>Dispatch Date</label>
		                <input type="text"  class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">	                
		            </div>

		        </div>
	            <div class="row">		            
                       
	            </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submit_weighbridge_info" class="btn btn-lg btn-success btn-block">Add/Update Weighbridge Information</button>
		            </div>
		            <div class="form-group col-md-12">
		           		<button type="submit" name="print" class="btn btn-lg btn-success btn-block" disabled>Print Weighbridge Ticket</button>
		            </div>		            
		        </div>

	</div>
	</form>
</div>	

<script type="text/javascript">

function fetchClients()
{
	
	var item_id = $('#select-items').val();

	var url="{{ route('weighbridge.getCustomer',['item_id'=>":item_id"]) }}";
	url = url.replace(':item_id', item_id);

	$.ajax({
	url: url,
	type: 'GET',
	}).success(function(response) {
		var customers = jQuery.parseJSON(response);

		var select = $('#select-customer');
		select.multiselect('destroy');
		select.find('option').remove();    

		$.each(customers,function(key, value) 
		{	
			select.append('<option value=' + value["id"] + '>' + value["name"] + '</option>');

		});
		initMultiSelect();

	}).error(function(error) {
		console.log(error)
	});


}


function fetchWeighbridge()
{
	var region_id = $('#region').val();
	var url="{{ route('weighbridge.getWeighbridge',['region_id'=>":region_id"]) }}";
	url = url.replace(':region_id', region_id);

	$.ajax({
	url: url,
	type: 'GET',
	}).success(function(response) {
		var weighbridge = jQuery.parseJSON(response);

		var select = $('#weighbridge');
		select.find('option').remove();      

		$.each(weighbridge,function(key, value) 
		{	
			select.append('<option value=' + value["id"] + '>' + value["wb_number"] + '</option>');

		});  


	}).error(function(error) {
		console.log(error)
	});


}

function fetchParking()
{
	
	var item_id = $('#select-items').val();

	var url="{{ route('weighbridge.getParking') }}";

	$.ajax({
	url: url,
	type: 'GET',
	}).success(function(response) {
		var parking_lot = jQuery.parseJSON(response);
		var input = $('#parking_lot'); 
		input.val(parking_lot);

		initMultiSelect();

	}).error(function(error) {
		console.log(error)
	});


}


fetchWeighbridge
</script>


<script>
	
	$(document).ready(function (){ 
		
		$('#select-items').multiselect({
            buttonWidth: '100%',
			includeSelectAllOption: true,
			enableFiltering: true,
            selectAllText: 'Check all!'
        });

		$('#select-customer').multiselect({
			buttonWidth: '100%',
			includeSelectAllOption: true,
			enableFiltering: true,
            selectAllText: 'Check all!'
		});

	});// end document ready function

    function initMultiSelect(){

		$('#select-customer').multiselect({
			buttonWidth: '100%',
			enableFiltering: true,
			includeSelectAllOption: true,
            selectAllText: 'Check all!'
		});
    }
</script>

@stop