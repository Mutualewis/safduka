@extends ('layouts.dashboard')
@section('page_heading','Confirm Movement')
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

	if (!isset($basket )) {
		$basket = NULL;
	}
	if (!isset($bskt )) {
		$bskt = NULL;
	}
	if (!isset($wrhse )) {
		$wrhse = NULL;
	}
	if (!isset($rw)) {
		$rw = NULL;
	}
	if (!isset($clm)) {
		$clm = NULL;
	}
	if (!isset($zone)) {
		$zone   = NULL;
	}
	if (!isset($ot_season )) {
		$ot_season = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (!isset($bags )) {
		$bags = NULL;
	}
	if (!isset($pockets )) {
		$pockets = NULL;
	}
	if (!isset($cid )) {
		$cid = NULL;
	}


	$sif_lot = NULL;
	$outt_number = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;

	if (isset($cdetails)){
		$sif_lot = $cdetails->lot;
		$outt_number = $cdetails->outturn;
		$bskt = $cdetails->bsid;
		$rlno = $cdetails->rl_no;
		$grade = $cdetails->grade;
		$coffee_grower = $cdetails->mark;
	}


?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="movementconfirmation" id="movementconfirmationform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


				<div class="row">
		            <div class="form-group col-md-12">
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
		        </div>

		        <div class="row">
		            <div class="form-group col-md-12">
		                <label>Warehouse</label>
		                <select class="form-control" name="warehouse" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($Warehouse))
										@foreach ($Warehouse->all() as $value)
										@if ($wrhse ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->agt_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->agt_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
		        </div>

	   
		        <h3>Confirmation Details</h3>
		        <div class="row">
		            <div class="form-group col-md-4">
		                <label>Warehouse</label>
		                <select class="form-control" name="new_warehouse" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($NewWarehouse))
										@foreach ($NewWarehouse->all() as $value)
										@if ($new_wrhse ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->agt_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->agt_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Row</label>
		                <select class="form-control" name="row">
		                	<option></option> 
								@if (isset($new_location))
											@foreach ($new_location->all() as $value)
												@if ($value->loc_row != NULL)
														<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Column</label>
		                <select class="form-control" name="column"> 
		                	<option></option> 
								@if (isset($new_location))
											@foreach ($new_location->all() as $value)
												@if ($value->loc_column != NULL)													
														<option value="{{ $value->loc_column }}">{{ $value->loc_column}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>	


		        </div>
		        <div class="row">
		            <div class="form-group col-md-6">
		                <label >Zone Moved To</label>
		                <input class="form-control"  name="zone">
		            </div>	     
		            <div class="form-group col-md-6">
		                <label>Weight Moved</label>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="myFunction()" value="{{ old('batch_kilograms').$batch_kilograms  }}" disabled>
		            </div>      	
		        </div>
		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmmovement" class="btn btn-lg btn-danger btn-block">Confirm Movement</button>
		           	</div>
		        </div>
		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printarrivalinformation" class="btn btn-lg btn-success btn-block">Print Movement Details</button>
		            </div>
		        </div>
		        <!-- 
		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printarrivalinformation" class="btn btn-lg btn-success btn-block">Print Movement Instruction</button>
		            </div>
		        </div>
			 -->

	</div>

	<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<!-- <form role="form" method="POST" action="arrivalinformation"> -->
				<h3>Select Outturn(s) to Confirm</h3>
				<table class="table table-striped">
				<thead>
				<tr>
					<th>
						Add
					</th>				
					<th>
						Mvt NO.
					</th>					
					<th>
						Name
					</th>		
					<th>
						Grade
					</th>
					<th>
						Weight
					</th>
					<th>
						Bags
					</th>
					<th>
						Pkts
					</th>
					<th>
						Pckg
					</th>
					<th>
						New Location
					</th>
				</tr>
				</thead>
				<tbody>

					<?php
						$total_bags = 0;
						$total_pkts = 0;
						$count = 0;
						$count_green = 0;
						$count_process = 0;
						$count_screen = 0;
						$count_cup = 0;
						$total_price = 0;
						$total = 0;

						if (isset($stlocdetails)) {

							foreach ($stlocdetails->all() as $value) {
									// print_r($season->acat_id);
								$total += $value->btc_weight; 
								$count += 1;
								$id = $value->stid;

								$total_bags += $value->btc_bags;

								$total_pkts += $value->btc_pockets;							
								echo "<tr>";
									echo "<td><input name='batchlocation[]' type='checkbox' value='$id'></td>";
									echo "<td>".$value->insloc_ref."</td>";
									echo "<td>".$value->name."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->btc_weight."</td>";
									echo "<td>".$value->btc_bags."</td>";
									echo "<td>".$value->btc_pockets."</td>";
									echo "<td>".$value->pkg_name."</td>";
									echo "<td>".$value->new_location."</td>";
								echo "</tr>";	


							}
						}
					?>
					  <tr>
						<td></td>					

					    <?php
					  	    echo "<td>".$count."</td>";
					  	?>
						<td></td>						

					  	<?php
						    echo "<td>".$total." KGs</td>";
						?>
					    <?php
						    echo "<td>".$total_bags." Bags</td>";
						?>
					    <?php
						    echo "<td>".$total_pkts." Pkts</td>";
						?>						
						
						<td></td>						
						<td></td>						
						<td></td>						
					  </tr>
				</tbody>
				</table>
	</div>
</form>

</div>	
@stop

@push('scripts')
<script>
// var autosubmit = <?php echo json_encode($autosubmit); ?>;
// console.log(autosubmit)
// 	$(document).ready(function (){ 
// 		if(autosubmit){
// 			$( "#movementconfirmationform" ).submit();
// 		}
// 	})
</script>
@endpush