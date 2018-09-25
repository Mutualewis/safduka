@extends ('layouts.dashboard')
@section('page_heading','Movement Instructions')
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

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="movementinstructions">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
												@if ($value->loc_row != NULL)
													@if ($rw ==  $value->loc_row)
														<option value="{{ $value->loc_row }}" selected="selected">{{ $value->loc_row}}</option>
													@else
														<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
													@endif
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
												@if ($value->loc_column != NULL)
													@if ($clm ==  $value->loc_column)
														<option value="{{ $value->loc_column }}" selected="selected">{{ $value->loc_column}}</option>
													@else
														<option value="{{ $value->loc_column }}">{{ $value->loc_column}}</option>
													@endif
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
		                <select class="form-control" name="new_warehouse" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($NewWarehouse))
										@foreach ($NewWarehouse->all() as $value)
										@if ($new_wrhse ==  $value->wrid)
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
		                <select class="form-control" name="new_row">
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
		                <select class="form-control" name="new_column">
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
<!-- 		        <h3>Confirmation Details</h3>
		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Zone Moved To</label>
		                <input class="form-control"  id="zone"  name="zone" oninput="myFunction()" value="{{ old('zone').$zone  }}">
		            </div>	     
		            <div class="form-group col-md-4">
		                <label>Weight Moved</label>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="myFunction()" value="{{ old('batch_kilograms').$batch_kilograms  }}">
		            </div> -->
<!-- 		            <div class="form-group col-md-4">
		            	<label></label>
		            </div> -->
<!-- 		            <div class="form-group col-md-4">
		                <label >Bags To Move</label>
		                <input class="form-control"  id="bags"  name="bags" oninput="myFunction()" value="{{ old('bags').$bags  }}">
		            </div>		 -->        	
		        <!-- </div> -->

<!-- 		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Pockets To Move</label>
		                <input class="form-control"  id="pockets"  name="pockets" oninput="myFunction()" value="{{ old('pockets').$pockets  }}">
		            </div>	



	        	</div> -->
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="instructmovement" class="btn btn-lg btn-success btn-block">Instruct Movement</button>
		            </div>
		        </div>
<!-- 		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmmovement" class="btn btn-lg btn-danger btn-block">Confirm Movement</button>
		           	</div>
		        </div> -->
		        <div class="row">
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
						Zone
					</th>
					<th>
						New Zone
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
								if ($value->btc_instructed_by == NULL) {
									echo "<tr>";
										echo "<td><input name='batchlocation[]' type='checkbox' value='$id'></td>";
										echo "<td>".$value->name."</td>";
										echo "<td>".$value->grade."</td>";
										echo "<td>".$value->btc_weight."</td>";
										echo "<td>".$value->btc_bags."</td>";
										echo "<td>".$value->btc_pockets."</td>";
										echo "<td>".$value->pkg_name."</td>";
										echo "<td>".$value->btc_zone."</td>";
						                echo "<td><select class='form-control' name='newzone$id'>";
						               		echo "<option></option>";
						               		echo "<option>1</option>";
						               		echo "<option>2</option>";
						               		echo "<option>3</option>";
						               		echo "<option>4</option>";
						               		echo "<option>5</option>";
						               		echo "<option>6</option>";	
						               		echo "<option>7</option>";
						               		echo "<option>8</option>";
						               		echo "<option>9</option>";
						               		echo "<option>10</option>";
						               		echo "<option>11</option>";
						               		echo "<option>12</option>";													
						                echo "</select></td>";

									echo "</tr>";									
								} else if(($value->btc_instructed_by != NULL)) {
									echo "<tr style='color:#cacdd1;'>";
										echo "<td><input type='checkbox' value='$id' checked='checked' disabled></td>";
										echo "<td>".$value->name."</td>";
										echo "<td>".$value->grade."</td>";
										echo "<td>".$value->btc_weight."</td>";
										echo "<td>".$value->btc_bags."</td>";
										echo "<td>".$value->btc_pockets."</td>";
										echo "<td>".$value->pkg_name."</td>";
										echo "<td>".$value->btc_zone."</td>";
						                echo "<td><select class='form-control' name='newzone$id'>";
						               		echo "<option></option>";
						               		echo "<option>1</option>";
						               		echo "<option>2</option>";
						               		echo "<option>3</option>";
						               		echo "<option>4</option>";
						               		echo "<option>5</option>";
						               		echo "<option>6</option>";	
						               		echo "<option>7</option>";
						               		echo "<option>8</option>";
						               		echo "<option>9</option>";
						               		echo "<option>10</option>";
						               		echo "<option>11</option>";
						               		echo "<option>12</option>";													
						                echo "</select></td>";
									echo "</tr>";										
								}


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
					  </tr>
				</tbody>
				</table>
	</div>
</form>

</div>	
@stop
