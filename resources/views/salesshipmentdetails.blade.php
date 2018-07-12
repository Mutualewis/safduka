@extends ('layouts.dashboard')
@section('page_heading','Actual Shipment Details')
@section('section')
<div class="col-sm-14 col-md-offset-1">
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
	
	use Ngea\country;

	use Ngea\VesselDetails;

	if (!isset($contract )) {
		$contract = NULL;
	}

	if (!isset($date)) {
		$date = NULL;
	}

	if (!isset($destination )) {
		$destination = NULL;
	}

	if (!isset($mark )) {
		$mark = NULL;
	}

	if (!isset($sct_id  )) {
		$sct_id  = NULL;
	}


	if (!isset($disposaldate  )) {
		$disposaldate  = NULL;
	}

	if (!isset($vessel  )) {
		$vessel  = NULL;
	}	


	if (!isset($cid  )) {
		$cid  = NULL;
	}	

	if (isset($sales_contract)){		

		$sct_id = $sales_contract->id;

		$cid = $sales_contract->ctr_id;

		$contract = $sales_contract->sct_number;

		$destination = $sales_contract->sct_destination;

	}

	if (isset($vessel_details)){		

		$vessel = $vessel_details->vd_name;

		$mark = $vessel_details->vd_mark;

		$date = $vessel_details->vd_ship_date;

		$date = date("m/d/Y", strtotime($date));

	}

	if ($mark == null && $cid != null) {

		$country_details = country::where('id', $cid)->first();

		$vessel_details = VesselDetails::orderBy('id', 'desc')->first();

		$mark_no = null;

		if ($vessel_details != null) {
			
			$mark_no = $vessel_details->vd_mark;

			$mark_no = substr($mark_no,8,5) + 1;

		}		

		$country_code = $country_details->ctr_code;

		$country_license = $country_details->ctr_license;

		$mark = $country_code .'/'. $country_license . '/' . $mark_no;

	}

?>
    <div class="col-md-6">
	        <form role="form" method="POST" action="salesshipmentdetails">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
	        		<div class="form-group col-md-6">
	        			<label>Contract Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="contract" style="text-transform:uppercase; " placeholder="Search Contract..."  value="{{ old('contract'). $contract }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchButtonContract" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>
	                    </span>
	                    </div>
	                </div>	
 		            <div class="form-group col-md-6">
		                <label>Destination</label>
		                <input class="form-control"  id="destination"  name="destination" value="{{ old('destination').$destination  }}" disabled>	
		            </div> 

		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label>Vessel</label>
		                <input class="form-control"  id="vessel"  name="vessel" value="{{ old('vessel').$vessel  }}">
		            </div>	    

		            <div class="form-group col-md-6">
		            	<label>Shipment Date</label>
		           		<input class="form-control"  id="date"  name="date" value="{{ old('date').$date  }}">
		            </div>

		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label>Mark</label>
		                <input class="form-control"  id="mark"  name="mark" value="{{ old('mark').$mark  }}">
		            </div>	 


		        </div>

		        <div class="row">


	        	</div>
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitshipmentdetails" class="btn btn-lg btn-success btn-block">Add/Update Shipment Details</button>
		            </div>
		        </div>
	</div>
</form>

</div>	
@stop
