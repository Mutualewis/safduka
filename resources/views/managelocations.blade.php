@extends ('layouts.dashboard')
@section('page_heading','Manage Location')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-4">
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
	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="managelocations">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



<!-- 				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Country</h3>						
		            </div>
		        </div> -->

				<div class="row">
		            <div class="form-group col-md-4">
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

		            <div class="form-group col-md-4">
		                <label>Warehouse</label>
		                <select class="form-control" name="warehouse" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($Warehouse))
										@foreach ($Warehouse->all() as $value)
										@if ($wrhse ==  $value->wrid)
											<option value="{{ $value->wrid }}" selected="selected">{{ $value->wr_name}}</option>
										@else
											<option value="{{ $value->wrid }}">{{ $value->wr_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Row</label>
		                <select class="form-control" name="row" onchange="this.form.submit()">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
											@if ($rw ==  $value->loc_row)
												<option value="{{ $value->loc_row }}" selected="selected">{{ $value->loc_row}}</option>
											@else
												<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>
		            </div>
		        </div>
	            <div class="row">
		            <div class="form-group col-md-4">
		                <label >Column</label>
		                <select class="form-control" name="column" onchange="this.form.submit()">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
											@if ($clm ==  $value->loc_column)
												<option value="{{ $value->loc_column }}" selected="selected">{{ $value->loc_column}}</option>
											@else
												<option value="{{ $value->loc_column }}">{{ $value->loc_column}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>
		            </div>	

		         </div>

	   
	        	<h3>New Location</h3>
		        <div class="row">
		            <div class="form-group col-md-4">
		                <label>Warehouse</label>
		                <select class="form-control" name="new_warehouse">
		                	<option></option> 
							@if (isset($Warehouse))
										@foreach ($Warehouse->all() as $value)
											<option value="{{ $value->wrid }}">{{ $value->wr_name}}</option>
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Row</label>
		                <select class="form-control" name="new_row">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
											@endforeach
										
								@endif
		                </select>
		            </div>
		            <div class="form-group col-md-4">
		                <label >Column</label>
		                <select class="form-control" name="new_column">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												<option value="{{ $value->loc_column }}">{{ $value->loc_column}}</option>
											@endforeach
										
								@endif
		                </select>
		            </div>	
		        </div>

		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Zone</label>
		                <input class="form-control"  id="zone"  name="zone" oninput="myFunction()" value="{{ old('zone').$zone  }}">
		            </div>	     
		            <div class="form-group col-md-4">
		                <label>Weight To Move</label>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="myFunction()" value="{{ old('batch_kilograms').$batch_kilograms  }}">
		            </div>

		            <div class="form-group col-md-4">
		                <label >Bags To Move</label>
		                <input class="form-control"  id="bags"  name="bags" oninput="myFunction()" value="{{ old('bags').$bags  }}">
		            </div>		        	
		        </div>

		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Pockets To Move</label>
		                <input class="form-control"  id="pockets"  name="pockets" oninput="myFunction()" value="{{ old('pockets').$pockets  }}">
		            </div>	

		            <div class="form-group col-md-4">
		            	<label></label>
		           		<button type="submit" name="changelocation" class="btn btn-lg btn-danger btn-block">Confirm Movement</button>
		            </div>

	        	</div>
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="changelocation" class="btn btn-lg btn-success btn-block">Instruct Movement</button>
		            </div>
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printarrivalinformation" class="btn btn-lg btn-success btn-block">Print Movement Instruction</button>
		            </div>
		        </div>
			

	</div>

	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<!-- <form role="form" method="POST" action="arrivalinformation"> -->
				<h3>Select Outturn(s) to Move from this location</h3>
				<table class="table table-striped">
				<thead>
				<tr>
					<th>
						Add
					</th>				
					<th>
						Lot
					</th>					
					<th>
						Outturn
					</th>
					<th>
						Season
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
						Zone
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
								$id = $value->id;

								$total_bags += $value->btc_bags;

								$total_pkts += $value->btc_pockets;							

								echo "<tr>";
									echo "<td><input name='batchlocation[]' type='checkbox' value='$id'></td>";
									echo "<td>".$value->lot."</td>";
									echo "<td>".$value->outturn."</td>";
									echo "<td>".$value->csn_season."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->btc_weight."</td>";
									echo "<td>".$value->btc_bags."</td>";
									echo "<td>".$value->btc_pockets."</td>";
									echo "<td>".$value->pkg_name."</td>";
									echo "<td>".$value->btc_zone."</td>";
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
						<td></td>						
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
					  </tr>
				</tbody>
				</table>
	</div>
</form>

</div>	
@stop
