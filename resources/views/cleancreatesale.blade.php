@extends ('layouts.dashboard')
@section('page_heading','Create Sale')
@section('section')
<div class="col-sm-12">
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
		$sample_weight = NULL;
		$cnetweight = NULL;
		$cwar_number = NULL;
		$bags = 0;
		$pockets = 0;
		$grade = NULL;

		$sl_no = NULL;
		$saleTy = NULL;
		$total_weight = NULL;
		$total_lots = NULL;
		$sale_date = NULL;
		$csn_season = NULL;

		if (isset($sale) && count($sale) > 0) {
			$sl_no = $sale->sl_no ;
			$saleTy = $sale->sltyp_id ;
			$total_weight = $sale->sl_total_weight ;
			$total_lots = $sale->sl_total_lots ;
			$csn_season = $sale->csn_id;
			$sale_date = date("m/d/Y", strtotime($sale->sl_date));

		}

?>
	        <form role="form" method="POST" action="cleancreatesale">

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


		            <div class="form-group col-md-3">
		                <label>Sale Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $sale_date }}"/>	                
		            </div>   

		        </div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Total Weight</label>
		                <input class="form-control" name="total_weight" style="text-transform:uppercase" value="{{ old('total_weight'). $total_weight }}">
		            </div>	
		            <div class="form-group col-md-3">
		                <label>Total Lots</label>
		                <input class="form-control" name="total_lots" style="text-transform:uppercase" value="{{ old('total_lots'). $total_lots }}">
		            </div>	
		        </div>
					

				<div class="row">
		            <div class="form-group col-md-6">
		           		<button type="submit" class="btn btn-lg btn-success btn-block">Save/Update</button>
		           		
		            </div>
		        </div>

	        </form>
    </div>
</div>
@stop
