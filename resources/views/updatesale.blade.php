@extends ('layouts.dashboard')
@section('page_heading','Update Sale Information')
@section('section') 
<div class="col-sm-14 col-md-offset-1">
			<div class="row">
				<div class="col-md-8">
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


		$hedge = NULL;
		$nyc = NULL;
		$sale_cb_id= NULL;
		$cid = NULL;


		if (isset($sale) && count($sale) > 0) {
			$sl_no = $sale->sl_no ;
			$saleTy = $sale->sltyp_id ;

			$cid = $sale->ctr_id ;

			$hedge = $sale->sl_hedge ;
			$nyc = $sale->sl_nyc ;


			$sale_cb_id = $sale->cb_id;


			$csn_season = $sale->csn_id;
			$sale_date = date("m/d/Y", strtotime($sale->sl_date));

			$sl_month = $sale->sl_month;
			preg_match_all('!\d+!', $sl_month, $int);

			$trm = $string = substr($sl_month,0,3);
			$trmyear = implode(' ', $int[0]);

			// print_r($trmyear);

		}

?>
	        <form role="form" method="POST" action="createsale">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	<div class="row">


	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="sl_no" placeholder="Search Sale No..." style="text-transform:uppercase"  value="{{ old('sl_no'). $sl_no }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	

		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="sale_season">
		               		<option>Sale Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season ===  $season->id)
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@else
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>


	        	</div>
	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Country</label>
		                <select class="form-control" name="country">
		                	<option></option> 
							@if (isset($country) && count($country) > 0)
										@foreach ($country->all() as $countries)
											@if ($cid ===  $countries->id)
												<option value="{{ $countries->id }}" selected="selected">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@else
												<option value="{{ $countries->id }}">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>


		            <div class="form-group col-md-3">
		                <label>Sale Type</label>
		                <select class="form-control" name="sale_type">
		                	<option></option> 
							@if (isset($SaleType) && count($SaleType) > 0)
										@foreach ($SaleType->all() as $saletype)
											@if ($saleTy ===  $saletype->id)
												<option value="{{ $saletype->id }}" selected="selected">{{ $saletype->sltyp_name}}</option>
											@else
												<option value="{{ $saletype->id }}">{{ $saletype->sltyp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

<!-- 		            <div class="form-group col-md-3">
		            	
		               	<label>Buyer</label>
		                <select class="form-control" name="coffee_buyer">
		               		<option></option>
							@if (isset($buyer) && count($buyer) > 0)										
										@foreach ($buyer->all() as $buyers)
										@if ($sale_cb_id ===  $buyers->id)
											<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->cb_name}}</option>
										@else
											<option value="{{ $buyers->id }}">{{ $buyers->cb_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div> --> 
	        	</div>

	        	<div class="row">



		            <div class="form-group col-md-3">
		                <label>Sale Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $sale_date }}"/>	                
		            </div>   
		            <div class="form-group col-md-3">
		                <label>Hedge</label>
		                <input class="form-control" name="hedge" style="text-transform:uppercase" value="{{ old('hedge'). $hedge }}">
		            </div>	
		        </div>

	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Trading Month</label>
		                <select class="form-control" name="tradingmonth">
		               		<option></option>
							@if (count($tradingMonths) > 0)
										@foreach ($tradingMonths->all() as $tradingMonth)
										@if ($trm ===  $tradingMonth->trm_code)
											<option value="{{ $tradingMonth->trm_code }}" selected="selected">{{ $tradingMonth->trm_code}}</option>
										@else
											<option value="{{ $tradingMonth->trm_code }}">{{ $tradingMonth->trm_code}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	
		            <div class="form-group col-md-3">
		                <label>Trading Year</label>
		                <select class="form-control" name="tradingyear">
		               		<option></option>
							@if (count($years) > 0)
										@foreach ($years as $year)
										@if ($trmyear ===  $year)
											<option value="{{ $year }}" selected="selected">{{ '20'.$year}}</option>
										@else
											<option value="{{ $year}}">{{ '20'.$year}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	

		        </div>

				<div class="row">
		            <div class="form-group col-md-6">
		           		<button type="submit" class="btn btn-lg btn-success btn-block">Save/Update</button>
		           		
		            </div>
		        </div>

	        </form>
    </div>
@stop
