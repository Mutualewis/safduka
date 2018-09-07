@extends ('layouts.dashboard')
@section('page_heading','Weight Note')
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
	if (old('country') != NULL) {
		$cid = old('country');
	}

	if (!isset($country )) {
		$country = NULL;
	}
	if (!isset($contract )) {
		$contract = NULL;
	}
	if (!isset($description )) {
		$description = NULL;
	}
	if (!isset($shipmonth)) {
		$shipmonth = NULL;
	}
	if (!isset($date)) {
		$date = NULL;
	}
	if (!isset($zone)) {
		$zone   = NULL;
	}
	if (!isset($ot_season )) {
		$ot_season = NULL;
	}
	if (!isset($container_number )) {
		$container_number = NULL;
	}
	if (!isset($bulk_cdi )) {
		$bulk_cdi = NULL;
	}
	if (!isset($pockets )) {
		$pockets = NULL;
	}
	if (!isset($cid )) {
		$cid = NULL;
	}
	if (!isset($shipperid)) {
		$shipperid = NULL;
	}
	if (!isset($spid )) {
		$spid = NULL;
	}
	if (!isset($disposaldate)) {
		$disposaldate  = NULL;
	}
	if (!isset($weight_note_no)) {
		$weight_note_no  = NULL;
	}
	if (!isset($billoflsnding  )) {
		$billoflsnding  = NULL;
	}
	if (!isset($pkg)) {
		$pkg = NULL;
	}
	if (!isset($pkg_weight)) {
		$pkg_weight = NULL;
	}	

	if (isset($SalesContract)){		
			$cid = $SalesContract->ctr_id;
			$contract = $SalesContract->sct_number;
			$description = $SalesContract->sct_description;
			$packages = $SalesContract->sct_packages;
			$spid = $SalesContract->sct_month;
			$date = $SalesContract->sct_bulk_date;
			$date = date("m/d/Y", strtotime($date));
			$disposaldate = $SalesContract->sct_disposal_date;
			$disposaldate = date("m/d/Y", strtotime($disposaldate));
	}
?>
    <div class="col-md-6">
	        <form role="form" method="POST" action="noteweight">

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
		                <label>Weight Note No.</label>
		                <input class="form-control"  id="weight_note_no"  name="weight_note_no" value="{{ old('weight_note_no').$weight_note_no  }}">
		            </div>	

		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label>Bulk</label>
		                <input class="form-control"  id="bulk_cdi"  name="vessel" value="{{ $bulk_cdi }}" disabled>
		                <input type="hidden" id="bulk_cdi"  name="bulk_cdi" value="{{ $bulk_cdi }}">
		            </div>	    

		            <div class="form-group col-md-6">
		            	<label>Container Number</label>
		           		<input class="form-control"  id="container_number"  name="vessel" value="{{ $container_number }}">
		            </div>

		        </div>

		        <div class="row">

 		            <div class="form-group col-md-6">
		                <label>Shipper</label>
		                <select class="form-control" id="destination" name="destination" >
		                	<option></option> 
							@if (isset($shippers) && count($shippers) > 0)
										@foreach ($shippers->all() as $value)
											@if ($shipperid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->shp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->shp_name}}</option>
											@endif
										@endforeach									
							@endif
		                </select>		
		            </div>     

		            <div class="form-group col-md-6">
		            	<label>Stuffing Date</label>
		           		<input class="form-control"  id="date"  name="date" value="{{ old('date').$date  }}">
		            </div>

		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label>Packaging</label>
		                <select class="form-control" name="packaging">
		                	<option></option> 
								@if (isset($Packaging))
											@foreach ($Packaging->all() as $value)
											@if ($pkg ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->pkg_name}}</option>
												<?php $pkg_weight = $value->pkg_weight; ?>
											@else
												<option value="{{ $value->id }}">{{ $value->pkg_name}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>		
		            </div>

	        	</div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitweightnote" class="btn btn-lg btn-success btn-block">Add/Update Sales Contract</button>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printweightnote" class="btn btn-lg btn-success btn-block">Print Weight Note</button>
		            </div>
		        </div>
	</div>
</form>

</div>	
@stop
