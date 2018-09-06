@extends ('layouts.dashboard')
@section('page_heading','Intake')

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





	        <form role="form"  method="POST" action="parchmentintake">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>GRN No.</label>
		                <input class="form-control" name="outt_grn_number" placeholder="e.g. MGR0000" style="text-transform:uppercase" value="{{ old('outt_grn_number') }}">
		                
		            </div>
		            <div class="form-group col-md-3">
		                <label>Outturn No.</label>
		                <input class="form-control" name="outt_number" style="text-transform:uppercase" value="{{ old('outt_number') }}">
		            </div>	 
	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Grower</label>
		                <select class="form-control" name="coffee_grower">
		                	<option></option>
							@if (count($growers) > 0)
										@foreach ($growers->all() as $grower)
											<option value="{{ $grower->id }}">{{ $grower->cgr_grower }}  ({{ $grower->cgr_code }})</option>
										@endforeach
									
							@endif
		                </select>		                
		            </div>
		            <div class="form-group col-md-3">
		                <label>Parchment Type</label>
		                <select class="form-control" name="parchment">
		                	<option></option>
							@if (count($ParchmentType) > 0)
										@foreach ($ParchmentType->all() as $pType)
											<option value="{{ $pType->id }}">{{ $pType->pty_name }}</option>
										@endforeach
									
							@endif
		                </select>		
		            </div>

		        </div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Gross Kilograms</label>
		                <input class="form-control" name="outt_gross_weight" value="{{ old('outt_gross_weight') }}">
		            </div>
		            <div class="form-group col-md-3">
		                <label>Bags</label>
		                <input class="form-control" name="outt_bags" value="{{ old('outt_bags') }}">
		            </div>	        		
	        	</div>

	        	<div class="row">
		            <div class="form-group col-md-3">
		            	<label>Season</label>

		                <select class="form-control" name="season">
		               		<option></option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endforeach
									
							@endif
		                </select>	

		            </div>
					<div class="form-group col-md-3">
						<label>Delivery Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date') }}"/>
					</div>
	            </div>




	        	<div class="row">

		            <div class="form-group col-md-3">
		                <label>Milling Status</label>

		                <select class="form-control" name="milling_status">
		                	<!-- <option></option> -->
							@if (count($MillingStatus) > 0)
										@foreach ($MillingStatus->all() as $mstatus)
											<option value="{{ $mstatus->id }}">{{ $mstatus->mst_name}}</option>
										@endforeach
									
							@endif
		                </select>	

		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-6">
		            <button type="submit" class="btn btn-lg btn-success btn-block">Add</button>
		            </div>
		        </div>
	        </form>
    </div>
</div>
</div>
@stop
