@extends ('layouts.dashboard')
@section('page_heading','Add/Update a Sale')
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
		use Ngea\trading_months;

		$hedge = NULL;
		$margin = NULL;
		$nyc = NULL;
		$sale_cb_id= NULL;
				
		$csn_season = NULL;
		$sale_date = NULL;
		$trm = NULL;
		$trmyear = NULL;
		$sale_confirmed = NULL;
		$coffeeTy = NULL;
		$monthName = NULL;
	
		if(session('maincountry')!==NULL){
			$cid=session('maincountry');
		}
		if (!isset($cid)) {
			$cid = NULL;
		}

		if (!isset($saleTy)) {
			$saleTy = NULL;
		}

		if (!isset($sl_no)) {
			$sl_no = NULL;
		}

		if (isset($sale) && count($sale) > 0) {
			$sl_no = $sale->sl_no ;
			$saleTy = $sale->sltyp_id ;

			$cid = $sale->ctr_id ;

			$hedge = $sale->sl_hedge ;
			$margin = $sale->sl_margin;
			$nyc = $sale->sl_nyc ;


			$sale_cb_id = $sale->cb_id;

			$sale_confirmed = $sale->sl_auction_confirmedby;


			$csn_season = $sale->csn_id;
			$sale_date = date("m/d/Y", strtotime($sale->sl_date));

			$sl_month = $sale->sl_month;
			preg_match_all('!\d+!', $sl_month, $int);

			$trm = $string = substr($sl_month,0,3);
			$trmyear = implode(' ', $int[0]);
			$trmyear = '20'.$trmyear;

			$monthName = trading_months::where('trm_code', $trm)->first();
			if ($monthName != NULL) {
				$monthName = $monthName->trm_month;
			}
			

			$coffeeTy = substr($trm,0,1);
			if ($coffeeTy == "K") {
				$coffeeTy = 1; 
			} else if ($coffeeTy == "R") {
				$coffeeTy = 2; 
			}




		}


?>
	        <form role="form" method="POST" action="createsale">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<?php 
			if($sale_confirmed == null){
			?>
	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Country</label>
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


		            <div class="form-group col-md-3">
		                <label>Sale Type</label>
		                <select class="form-control" name="sale_type" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($SaleType) && count($SaleType) > 0)
										@foreach ($SaleType->all() as $saletype)
											@if ($saleTy ==  $saletype->id)
												<option value="{{ $saletype->id }}" selected="selected">{{ $saletype->sltyp_name}}</option>
											@else
												<option value="{{ $saletype->id }}">{{ $saletype->sltyp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

	        	</div>



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
										@if ($csn_season ==  $season->id)
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
		                <label>Margin</label>
		                <input class="form-control" name="margin" style="text-transform:uppercase" value="{{ old('margin'). $margin }}">
		            </div>	

		            <div class="form-group col-md-3">
		                <label>Coffee Type</label>
		                <select class="form-control" name="coffee_type">
		                	<option></option> 
							@if (isset($coffeeType) && count($coffeeType) > 0)
										@foreach ($coffeeType->all() as $value)
											@if ($coffeeTy ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->ctyp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->ctyp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>
	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Trading Month</label>
		                <select class="form-control" name="tradingmonth">
		               		<option></option>
							@if (count($months) > 0)
										@foreach ($months->all() as $value)
										@if (strtolower($monthName) ==  strtolower($value->mth_name))
											<option value="{{ $value->id }}" selected="selected">{{ $value->mth_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->mth_name}}</option>
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
										@foreach ($years as $value)
										@if ($trmyear ==  $value->yr_name)
											<option value="{{ $value->id }}" selected="selected">{{ $value->yr_name}}</option>
										@else
											<option value="{{ $value->id}}">{{ $value->yr_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	

		        </div>

				<div class="row">
		            <div class="form-group col-md-6">
		           		<button type="submit" name="submitsale" class="btn btn-lg btn-success btn-block">Save/Update</button>
		           		
		            </div>
		        </div>
		<?php 
		} else {		
		?>

	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Country</label>
		                <select class="form-control" name="country" disabled>
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


		            <div class="form-group col-md-3">
		                <label>Sale Type</label>
		                <select class="form-control" name="sale_type" disabled>
		                	<option></option> 
							@if (isset($SaleType) && count($SaleType) > 0)
										@foreach ($SaleType->all() as $saletype)
											@if ($saleTy ==  $saletype->id)
												<option value="{{ $saletype->id }}" selected="selected">{{ $saletype->sltyp_name}}</option>
											@else
												<option value="{{ $saletype->id }}">{{ $saletype->sltyp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

	        	</div>

	        	<div class="row">


	        		<div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="sl_no" placeholder="Search Sale No..." style="text-transform:uppercase"  value="{{ old('sl_no'). $sl_no }}" disabled></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	


		            <div class="form-group col-md-3">
		            	
		                <select class="form-control" name="sale_season" disabled>
		               		<option>Sale Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season ==  $season->id)
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
		                <label>Sale Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $sale_date }}" disabled/>	                
		            </div>   
		            <div class="form-group col-md-3">
		                <label>Hedge</label>
		                <input class="form-control" name="hedge" style="text-transform:uppercase" value="{{ old('hedge'). $hedge }}" disabled>
		            </div>	
		        </div>
		        <div class="row">
		            <div class="form-group col-md-3">
		                <label>Margin</label>
		                <input class="form-control" name="margin" style="text-transform:uppercase" value="{{ old('margin'). $margin }}" disabled>
		            </div>	

		            <div class="form-group col-md-3">
		                <label>Coffee Type</label>
		                <select class="form-control" name="coffee_type" disabled>
		                	<option></option> 
							@if (isset($coffeeType) && count($coffeeType) > 0)
										@foreach ($coffeeType->all() as $value)
											@if ($coffeeTy ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->ctyp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->ctyp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>
	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Trading Month</label>
		                <select class="form-control" name="tradingmonth" disabled>
		               		<option></option>
							@if (count($months) > 0)
										@foreach ($months->all() as $value)
										@if (strtolower($monthName) ==  strtolower($value->mth_name))
											<option value="{{ $value->id }}" selected="selected">{{ $value->mth_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->mth_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	


		            <div class="form-group col-md-3">
		                <label>Trading Year</label>
		                <select class="form-control" name="tradingyear" disabled>
		               		<option></option>
							@if (count($years) > 0)
										@foreach ($years as $value)
										@if ($trmyear ==  $value->yr_name)
											<option value="{{ $value->id }}" selected="selected">{{ $value->yr_name}}</option>
										@else
											<option value="{{ $value->id}}">{{ $value->yr_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	

		        </div>
<!-- 		        <div class="row">
		            <div class="form-group col-md-3">
		                <label>Margin</label>
		                <input class="form-control" name="margin" style="text-transform:uppercase" value="{{ old('margin'). $margin }}" disabled>
		            </div>	
		        </div> -->

				<div class="row">
		            <div class="form-group col-md-6">
		           		<button type="submit" class="btn btn-lg btn-success btn-block" disabled>Auction Already Confirmed</button>		           		
		            </div>
		        </div>

	        <?php
	        } 
	        ?>
	        </form>
    </div>
@stop
