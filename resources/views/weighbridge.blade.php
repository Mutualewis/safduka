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
		                <select class="form-control" name="country">
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
                    	<input type="text" class="form-control" name="weighbridge_ticket" style="text-transform:uppercase; " placeholder="weighbridge ticket"  value="{{ $weighbridge_ticket }}"></input>	  
	                </div>	

	        		<div class="form-group col-md-1">
	                    <label></label></br>
	        			<button type="submit" name="searchButton" class="btn btn-lg btn-success btn-bloc">Fetch</button>
	                </div>	

		        </div>

	        	<div class="row" >
		            <div class="form-group col-md-4">
		                <label>Booking Reference Number</label>
		                <select class="form-control" name="country">
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

		            <div class="form-group col-md-4">
		           		<label>Arrival Date</label>
		                <input type="text"  class="form-control" name="date_current" style="text-transform:uppercase" value="{{ old('date_current') }}" disabled>	
		                <input type="hidden"  class="form-control" name="date_current" style="text-transform:uppercase" value="{{ old('date_current') }}">	                
		            </div>

		            <div class="form-group col-md-4">
		           		<label>Arrival Time</label>
		                <input type="text"  class="form-control" name="time" style="text-transform:uppercase" value="{{ old('time')}}" disabled>	                
		                <input type="hidden"  class="form-control" name="time" style="text-transform:uppercase" value="{{ old('time') }}">	     
		            </div>

		        </div>

	        	<div class="row" >
		            <div class="form-group col-md-4">
		                <label>Item Name</label>
		                <select class="form-control" id="select-seller" name="seller[]"  multiple="multiple">
							@if (isset($seller) && count($seller) > 0)
										@foreach ($seller->all() as $sellers)
											@if (in_array($sellers->id, $slr))
												<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
											@else
												<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-4">
		                <label>Customer Name</label>
		                <select class="form-control" id="select-seller" name="seller[]"  multiple="multiple">
							@if (isset($seller) && count($seller) > 0)
										@foreach ($seller->all() as $sellers)
											@if (in_array($sellers->id, $slr))
												<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
											@else
												<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-4">
		                <div class="form-group col-md-1">
		                	<label>Client Representative</label>
		            	</div>

		        		<div class="form-group col-md-4">
	                    	<input type="text" class="form-control" name="weighbridge_ticket" style="text-transform:uppercase; " placeholder="weighbridge ticket"  value="{{ $weighbridge_ticket }}"></input>	  
		                </div>	
	            	</div>
	                <div class="form-group col-md-1">
	                	<label>ID:&nbsp;</label>
	            	</div>
	        		<div class="form-group col-md-3">
                    	<input type="text" class="form-control" name="weighbridge_ticket" style="text-transform:uppercase; " placeholder="weighbridge ticket"  value="{{ $weighbridge_ticket }}"></input>	  
	                </div>	

		        </div>


			    <h3>Transporter Details</h3>
	        	<div class="row">
	        		<div class="form-group col-md-6">
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
		            <div class="form-group col-md-6">
		            	<label>Movement Permit</label>
		                <input type="text"  class="form-control" name="movement_permit" style="text-transform:uppercase" placeholder="Movement Permit" value="{{ old('movement_permit'). $movement_permit }}">	                
		            </div> 
	            </div>

	            <div class="row">
		            <div class="form-group col-md-6">
		           		<label>Driver Name</label>
		                <input type="text"  class="form-control" name="driver_name" style="text-transform:uppercase" value="{{ old('driver_name'). $driver_name }}">	                
		            </div> 
		            <div class="form-group col-md-6">
		           		<label>Driver ID</label>
		                <input type="text"  class="form-control" name="driver_id" style="text-transform:uppercase" value="{{ old('driver_id'). $driver_id }}">	                
		            </div> 
	            	
	            </div>

	            <div class="row">
		            <div class="form-group col-md-6">
		            	<label>Vehicle Plate Number</label>
		           		<input class="form-control" name="vehicle_plate" style="text-transform:uppercase" value="{{ old('vehicle_plate'). $vehicle_plate }}">
		            </div> 
		            <div class="form-group col-md-6">
		                <label>Weight In</label>
		                <input class="form-control" name="weighbridge_weight_in" style="text-transform:uppercase" value="{{ old('weighbridge_weight_in'). $weighbridge_weight_in }}">
		            </div>		             	            
	            </div>
	            <h3>Dispatch Information</h3>
	        	<div class="row" >
<!-- 		            <div class="form-group col-md-6">
		                <label>Seller</label>
		                <select class="form-control" name="seller">
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
		            </div> -->
		            <div class="form-group col-md-6">
		            	<label>Delivery Note Number</label>
		           		<input class="form-control" name="dnn" style="text-transform:uppercase" value="{{ old('dnn'). $dnn }}">
		            </div>  
		            <div class="form-group col-md-6">
		           		<label>Dispatch Date</label>
		                <input type="text"  class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">	                
		            </div>

<!-- 		            <div class="form-group col-md-6">
		            	<label>Dispatch Number</label>
		           		<input class="form-control" name="vehicle_plate" style="text-transform:uppercase" value="{{ old('vehicle_plate'). $vehicle_plate }}">
		            </div>   -->

		        </div>
	            <div class="row">		            

<!-- 		            <div class="form-group col-md-6">
		            <label></label>
		           		<button type="submit" name="printreleaseinstructions" class="btn btn-lg btn-success btn-block">Add Dispatch</button>
		            </div>	 -->	                        
	            </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Weighbridge Information</button>
		            </div>
		            <div class="form-group col-md-12">
		           		<button type="submit" name="print" class="btn btn-lg btn-success btn-block">Print Weighbridge Ticket</button>
		            </div>		            
		        </div>

	</div>
	</form>
</div>	
@stop

