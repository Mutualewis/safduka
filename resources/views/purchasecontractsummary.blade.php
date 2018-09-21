@extends('layouts.dashboard')
@section('page_heading','Purchase Contract Summary')
@section('section')

<?php 
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season)) {
		$csn_season  = NULL;
	}
	if (!isset($saleid )) {
		$saleid  = NULL;
	}

?>	


<div class="col-sm-12" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
<div class="row">
	<div class="col-md-6 col-md-offset-3" >

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
			<div class="container">
		        <form action="{{ URL::to('purchasecontractsummary') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

		        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


		        	<div class="row" >
			            <div class="form-group col-md-3 ">
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

			            <div class="form-group col-md-3" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" name="sale_season"  onchange="this.form.submit()">
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
			                <label>Sale</label>
			                <select class="form-control" name="sale" >
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
			        </div>



					<div class="row">
			            <div class="form-group col-md-6">
			            	<button type="submit" name="viewpdf" class="btn btn-lg btn-success btn-block">PDF</button>
			            </div>
			        </div>
			       <!--  <div class="row">
			            <div class="form-group col-md-6">
			            	<button type="submit" name="viewexcel" class="btn btn-lg btn-success btn-block">Excel</button>
			            </div>
			        </div> -->

		        </form>
	        </div>
    </div>
</div>
</div>

            
@stop
