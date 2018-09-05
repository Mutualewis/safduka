@extends ('layouts.dashboard')
@section('page_heading','Edit Intake')

@section('section')

<div class="col-sm-12">
<div class="row">
	<div class="col-md-9 col-md-offset-3">

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
				if (count($outturn) > 0) {
					$outt_number = $outturn->outt_number;
					$cgr_grower = $outturn->cgr_grower;
					$pty_name = $outturn->pty_name;
					$outt_gross_weight = $outturn->outt_gross_weight;
					$outt_bags = $outturn->outt_bags;
					$csn_season = $outturn->csn_season;
					$outt_delivery_date = $outturn->outt_delivery_date;
					$mst_name = $outturn->mst_name;
					$outt_grn_number = $outturn->outt_grn_number;
					$outt_date_milled = $outturn->outt_date_milled;

					$outt_date_milled = date("m/d/Y", strtotime($outt_date_milled));
					$outt_delivery_date = date("m/d/Y", strtotime($outt_delivery_date));
					// echo $outturn->outt_number;
					//$date=DateTime::createFromFormat('Y-m-d',$outt_delivery_date);
					//print_r($date);
					//$outt_delivery_date = date_format($date,"d-m-Y");

				} else {
					$outt_number = '';
					$cgr_grower = '';
					$pty_name = '';
					$outt_gross_weight = '';
					$outt_bags = '';
					$csn_season = '';
					$outt_delivery_date = '';
					$mst_name = '';
					$outt_grn_number = '';
					$outt_date_milled = '';
				}

				if (count($bulkoutturn) > 0) {
					$boutt_outturn_number = $bulkoutturn->boutt_outturn_number;
					$boutt_percentage = $bulkoutturn->boutt_percentage;

				} else {
					$boutt_outturn_number = '';
					$boutt_percentage = '';
				}

			?>


	        <form role="form"  method="POST" action="parchmentintakeedit">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">	  

	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" placeholder="Search Outturn..."  style="text-transform:uppercase"  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>

		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="season">
		               		<option>Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season ===  $season->csn_season)
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@else
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

	        	</div><br>


	        	<div class="row">

		            <div class="form-group col-md-3">
		            	<label>GRN No.</label>
		                <input class="form-control" name="outt_grn_number" placeholder="" value="{{ old('outt_grn_number').$outt_grn_number  }}"  style="text-transform:uppercase"  >
		            </div> 

		            <div class="form-group col-md-3">
		                <label>Milling Status</label>

		                <select class="form-control" name="milling_status">
		                	<option></option>
							@if (count($MillingStatus) > 0)
										@foreach ($MillingStatus->all() as $mstatus)
											@if ($mst_name ===  $mstatus->mst_name)
												<option value="{{ $mstatus->id }}" selected="selected">{{ $mstatus->mst_name}}</option>
											@else
												<option value="{{ $mstatus->id }}">{{ $mstatus->mst_name}}</option>
											@endif
										@endforeach
									
							@endif
		                </select>	

		            </div>
		        </div> 
<!-- 	        	
	        	<div class="row">


	        	    <div class="form-group col-md-3">
		                <label>PBulk Outturn No.</label>
		                <input class="form-control" name="boutt_outturn_number" value="{{ old('boutt_outturn_number'). $boutt_outturn_number}}">
		            </div> 



		            <div class="form-group col-md-3">
		                <label>Bulk Percentage</label>
		                <input class="form-control" name="percentage" value="{{ old('percentage').$boutt_percentage  }}">
		            </div> 

		        </div> -->



		        

	        	<div class="row">
					<div class="form-group col-md-3">
						<label>Milling Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $outt_date_milled }}" />
					</div>
					
					<div class="form-group col-md-3">
						<label>Delivery Date</label>
						<input class="form-control" id="deliveryDate" name="deliveryDate" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $outt_delivery_date }}" />
					</div>
	            </div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Grower</label>
		                <select class="form-control" name="coffee_grower">
		                	<option></option>
							@if (count($growers) > 0)
										@foreach ($growers->all() as $grower)

											@if ($cgr_grower ===  $grower->cgr_grower)
												<option value="{{ $grower->id }}" selected="selected">{{ $grower->cgr_grower }}  ({{ $grower->cgr_code }})</option>
											@else
												<option value="{{ $grower->id }}">{{ $grower->cgr_grower }}  ({{ $grower->cgr_code }})</option>
											@endif
										@endforeach
									
							@endif
		                </select>		                
		            </div>

<!-- 		            <div class="form-group col-md-3">
		                <label>Grower</label>
		                <input class="form-control" name="coffee_grower" value="{{ old('coffee_grower').$cgr_grower }}" readonly>	                
		            </div> -->
		            <div class="form-group col-md-3">
		                <label>Parchment Type</label>
		                <select class="form-control" name="parchment">
		                	<option></option>
							@if (count($ParchmentType) > 0)
										@foreach ($ParchmentType->all() as $pType)
											@if ($pty_name ===  $pType->pty_name)
												<option value="{{ $pType->id }}" selected="selected">{{ $pType->pty_name }}</option>
											@else
												<option value="{{ $pType->id }}">{{ $pType->pty_name }}</option>
											@endif
											
										@endforeach
									
							@endif
		                </select>		
		            </div>

<!-- 		            <div class="form-group col-md-3">
		                <label>Parchment Type</label>
		                <input class="form-control" name="parchment" value="{{ old('parchment'). $pty_name }}" readonly>
		            </div> -->

		        </div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Gross Kilograms</label>
		                <input class="form-control" name="outt_gross_weight" value="{{ old('outt_gross_weight'). $outt_gross_weight }}">
		            </div>
		            <div class="form-group col-md-3">
		                <label>Bags</label>
		                <input class="form-control" name="outt_bags" value="{{ old('outt_bags').$outt_bags }}">
		            </div>	        		
	        	</div>




				<div class="row">
		            <div class="form-group col-md-6">
		            <button type="submit" class="btn btn-lg btn-success btn-block">Update</button>
		            </div>
		        </div>
	        </form>
    </div>
</div>
</div>
@stop