@extends ('layouts.dashboard')
@section('page_heading','Arrival Information')
@section('section')
<div class="col-sm-14 col-md-offset-0">
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
	use Ngea\BatchView;

	if(session('maincountry')!=NULL){
		$cidmain=session('maincountry');
	}

	$autosubmit=false;
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)){
		$cid=$cidmain;
		//$autosubmit=true;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($zone)) {
		$zone   = NULL;
	}

	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}

	if (!isset($grn )) {
		$grn = NULL;
	}
	if (!isset($dispatch_kilograms )) {
		$dispatch_kilograms = NULL;
	}

	if (!isset($delivery_kilograms )) {
		$delivery_kilograms = NULL;
	}
	if (!isset($tare_kilograms )) {
		$tare_kilograms = NULL;
	}
	if (!isset($moisture )) {
		$moisture = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (!isset($wrhse )) {
		$wrhse = NULL;
	}
	if (!isset($pkg)) {
		$pkg = NULL;
	}
	if (!isset($rw)) {
		$rw = NULL;
	}
	if (!isset($clm)) {
		$clm = NULL;
	}
	if (!isset($bskt)) {
		$bskt = NULL;
	}
	if (!isset($basket )) {
		$basket = NULL;
	}
	if (!isset($grn_number )) {
		$grn_number = NULL;
	}
	if (!isset($wbtk )) {
		$wbtk = NULL;
	}
	if (!isset($ot_season )) {
		$ot_season = NULL;
	}
	if (!isset($rlno )) {
		$rlno = NULL;
	}
	if (!isset($btnumber )) {
		$btnumber = NULL;
	}
	if (!isset($bags )) {
		$bags = NULL;
	}
	if (!isset($pockets )) {
		$pockets = NULL;
	}
	if (!isset($packages)) {
		$packages = NULL;
	}
	if (!isset($packages_stock)) {
		$packages_stock = NULL;
	}
	if (!isset($warehouse_count)) {
		$warehouse_count = NULL;
	}
	if (!isset($weigh_scales_count)) {
		$weigh_scales_count = NULL;
	}
	if (!isset($pkg_weight)) {
		$pkg_weight = NULL;
	}
	if (!isset($wsid)) {
		$wsid = NULL;
	}
	if (!isset($packages_batch)) {
		$packages_batch = NULL;
	}
	if (!isset($stock_id)) {
		$stock_id = NULL;
	}
	if (!isset($dispatch_date)) {
		$dispatch_date = NULL;
	}
	if (!isset($st_quality_check)) {
		$st_quality_check = NULL;
	}

	$screen = 0;
	$process = 0;
	$weight = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;
	$grn = NULL;
	$grnConfirmed = NULL;
	$partial = NULL;
	$bought_weight = NULL;
	$ignore_partial = false;

	$pkg_status = NULL;


	if (isset($coffee_details) && !isset($st_quality_check)){

		$ignore_partial = true;

		$sif_lot = $coffee_details->lot;

		$outt_number = $coffee_details->outturn;

		$bskt = $coffee_details->bsid;

		$rlno = $coffee_details->rl_no;

		$grade = $coffee_details->grade;

		$coffee_grower = $coffee_details->mark;		

		$partial = $coffee_details->partial_delivey;	

		$bought_weight = $coffee_details->weight;	

		$packages_stock = CEIL($bought_weight/60);

		$dispatch_kilograms = $bought_weight;	

		$delivery_kilograms = $bought_weight;	

		if ($coffee_details->st_dispatch_date != null) {

			$dispatch_date = $coffee_details->st_dispatch_date;

			$dispatch_date = date("m/d/Y", strtotime($dispatch_date));

		}	


		if (isset($stock_details)){
			
			$partial = $stock_details->st_partial_delivery;	

			$pkg_status = $stock_details->st_package_status;

		}



	} else if (isset($stock_details)){

		$sif_lot = $stock_details->cfd_lot_no;

		$outt_number = $stock_details->cfd_outturn;

		$bskt = $stock_details->bsid;

		if ($bskt == null){

			$bskt = $stock_details->bs_id;	

		}

		$partial = $stock_details->st_partial_delivery;	

		$pkg_status = $stock_details->st_package_status;
			
		$grade = $stock_details->cgrad_name;

		$coffee_grower = $stock_details->cfd_grower_mark;		

		if ($coffee_grower == null){

			$coffee_grower = $stock_details->st_mark;	

		}

		$bought_weight = $stock_details->inv_weight;

		$pkg_status = $stock_details->st_package_status;

		$st_quality_check = $stock_details->st_quality_check;	

		$packages_stock = $stock_details->st_packages;

		$dispatch_kilograms = $stock_details->st_dispatch_net;	

		$delivery_kilograms = $stock_details->st_gross;		

		$tare_kilograms = $stock_details->st_tare;	

		$moisture = $stock_details->st_moisture;

		$pkg = $stock_details->pkg_id;		

		if ($stock_details->st_dispatch_date != null) {

			$dispatch_date = $stock_details->st_dispatch_date;

			$dispatch_date = date("m/d/Y", strtotime($dispatch_date));
			
		}	

	}
		


	if(isset($grn_details)){

		$grn_number = $grn_details->gr_number;	

		$wbtk = $grn_details->wb_id;		

		$grnConfirmed = $grn_details->gr_confirmed_by;	

		$ot_season = $grn_details->csn_id;	

	}

	$gr_confirmed_by = NULL;

	if (isset($grnsview)){

		foreach ($grnsview as $value) {

			$gr_confirmed_by = $value->gr_confirmed_by;

		}

	}

	if (old('rate') != NULL) {
		$rate_id = old('rate');
	}

	if (!isset($rate_id )) {
		$rate_id   = NULL;
	}
	if (old('team') != NULL) {
		$team_id = old('team');
	}

	if (!isset($team_id )) {
		$team_id   = NULL;
	}

?>

    <div class="col-md-6">
	        <form role="form" method="POST" action="arrivalinformation">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

			    <h3>General Information</h3>	
			    <div class="row">
		            <div class="form-group col-md-3">
		                <label>Country</label>
		                <select class="form-control" id="country" name="country" onchange="this.form.submit()">
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
		            	<label>Ticket</label>
		                <select class="form-control" id="weighbridgeTK" name="weighbridgeTK">
		               		<option></option>
							@if (isset($weighbridge_ticket))
										@foreach ($weighbridge_ticket->all() as $value)
										@if ($wbtk ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->wb_ticket}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->wb_ticket}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-3">
		            	<label>Season</label>
		                <select class="form-control" id="outt_season" name="outt_season">
		               		<option></option>
							@if (isset($Season))
										@foreach ($Season->all() as $season)
										@if ($ot_season ==  $season->id)
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@else
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>	

			    	<div class="form-group col-md-3">
			    		<label>GRN</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="grn_number" name="grn_number" name="grn_number" style="text-transform:uppercase; " placeholder="Search/Enter GRN..."  value="{{ $grn_number}}"></input>

		                        <span class="input-group-btn">

			                        <button type="submit" name="searchButtonGrn" class="btn btn-default" formnovalidate>
			                        	<i class="fa fa-search"></i>
			                        </button>

	                    		</span>
	                    </div>
	                </div> 

	            </div>





 				<h3>Outturn</h3>

	        	<div class="row">

	        		<div class="form-group col-md-4">
		           		<label>Outturn</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="outt_number" style="text-transform:uppercase; " placeholder="Add/Search Outturn..."  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	

		            <div class="form-group col-md-4">
		           		<label>Material</label>
		                <select class="form-control" name="coffee_grade">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
										@foreach ($CoffeeGrade->all() as $cgrade)
											@if ($grade ==  $cgrade->id)
												<option value="{{ $cgrade->id }}" selected="selected">{{ $cgrade->cgrad_name}}</option>
											@else
												<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		                <label>Grower</label>
		                <select class="form-control" name="coffee_grower">
		                	<option></option> 
							@if (isset($Growers) && count($Growers) > 0)
										@foreach ($Growers->all() as $value)
											@if ($cgrw ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cg_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cg_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		                                
		            </div>   

	        	</div>

	        	<div class="row">

		            <div class="form-group col-md-4">
		                <label>Dispatch Net Weight</label>
		                <input class="form-control"  id="dispatch_kilograms"  name="dispatch_kilograms" oninput="myFunction()" value="{{ old('dispatch_kilograms').$dispatch_kilograms  }}" required>
		            </div>

		            <div class="form-group col-md-4">
		            	<label>Dispatch Date</label>
		           		<input class="form-control"  id="date"  name="date" value="{{ old('dispatch_date').$dispatch_date  }}" required>
		            </div>	  

	                <input class="form-control" type="hidden"  id="delivery_kilograms"  name="delivery_kilograms" oninput="myFunction()" value="{{ old('delivery_kilograms').$delivery_kilograms  }}" required>

		            <div class="form-group col-md-4">
		                <label>Moisture(%)</label>
		                <input class="form-control"  id="moisture"  name="moisture" oninput="myFunction()" value="{{ old('moisture').$moisture  }}" required>
		            </div>

	            </div>

	            <div class="row">

		            <div class="form-group col-md-4">
		                <label>Packaging Check</label>
		                <select class="form-control" id="package_status" name="package_status" required>
		                	<option></option> 
								@if ($pkg_status ==  0)
									<option value="0" selected="selected">Okay</option>
								@else
									<option value="0" >Okay</option>
								@endif

								@if ($pkg_status ==  1)
									<option value="1" selected="selected">Not Okay</option>
								@else
									<option value="1" >Not Okay</option>
								@endif



		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		                <label>Packaging</label>
		                <select class="form-control" id="packaging"  name="packaging" required>
		                	<option></option> 
								@if (isset($packaging))
											@foreach ($packaging->all() as $value)
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

		            <div class="form-group col-md-2">
			                <label >Packages</label>
			                <input class="form-control"  id="packages_stock"  name="packages_stock" oninput="calculateValue()" value="{{ old('packages_stock').$packages_stock  }}" required>		            
		            </div>	

		            <div class="form-group col-md-2">
		                <label style="color: red;" >Partial</label>
		                <?php
		                	if ($partial == null) {

		                		echo "<input class='form-control' type='checkbox' id='partial' name='partial' value='1' />";

		                	} else {

		                		echo "<input class='form-control' type='checkbox' id='partial' name='partial' value='1' checked/>";

		                	}		                	

		                ?>
		            </div>	

	        	</div>


 				<h3>Batch</h3>
		        <div class="row">
		        	<div class="form-group col-md-4">
		                <label>Warehouse</label>
		                <select class="form-control" name="warehouse" onchange="this.form.submit()">
		                	<option></option> 

					        	<?php

					        		for ($i=0; $i < $warehouse_count; $i++) {  

					        			$id = 0;

					        			$name = null;

					        			foreach ($warehouse[0][$i] as $key => $value) {

					        				if ($key == 'id') {

					        					$id = $value;
					        				}

					        				if ($key == 'wr_name') {
					        					
					        					$name = $value;
					        				}
					        			}
					        			if ($wrhse ==  $id){

					        				echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';

					        			} else {

					        				echo '<option value="'.$id.'" >'.$name.'</option>';

					        			}
					        			
					        		}

	            				?>

	            		</select>
            		</div>

		        	<div class="form-group col-md-4">
		                <label>Weigh Scales</label>
		                <select class="form-control" name="weigh_scales">
		                	<option></option> 

					        	<?php

					        		for ($i=0; $i < $weigh_scales_count; $i++) {  

					        			$id = 0;

					        			$name = null;

					        			foreach ($weigh_scales[0][$i] as $key => $value) {

					        				if ($key == 'id') {

					        					$id = $value;
					        				}

					        				if ($key == 'ws_equipment_number') {
					        					
					        					$name = $value;
					        				}
					        			}
					        			if ($wsid ==  $id){

					        				echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';

					        			} else {

					        				echo '<option value="'.$id.'" >'.$name.'</option>';

					        			}
					        			
					        		}

	            				?>

	            		</select>
            		</div>

		            <div class="form-group col-md-2">
		                <label >Row</label>
		                <select class="form-control" name="row">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_row != NULL)
													@if ($rw ==  $value->id)
														<option value="{{ $value->id }}" selected="selected">{{ $value->loc_row}}</option>
													@else
														<option value="{{ $value->id }}">{{ $value->loc_row}}</option>
													@endif
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>

		            <div class="form-group col-md-2">
		                <label >Column</label>
		                <select class="form-control" name="column">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_column != NULL)
													@if ($clm ==  $value->id)
														<option value="{{ $value->id }}" selected="selected">{{ $value->loc_column}}</option>
													@else
														<option value="{{ $value->id }}">{{ $value->loc_column}}</option>
													@endif
												@endif
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
			                <label >Packages</label>
			                <input class="form-control"  id="packages_batch"  name="packages_batch" oninput="calculateValue()" value="{{ old('packages_batch').$packages_batch  }}">		            
		            </div>		

		            <div class="form-group col-md-2">
		                <label>Weight (KGS)</label>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="arrivalBags()" value="{{ old('batch_kilograms').$batch_kilograms  }}" disabled>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="arrivalBags()" value="{{ old('batch_kilograms').$batch_kilograms  }}" hidden>
		            </div>
		            <div class="form-group col-md-2">
		            	<label></label>
			            <?php
			            	$weigh_scale_session = "scale - ".$wsid."";
			            	
			            	if(session()->has($weigh_scale_session)) {
			            ?>		
			            	<button type="submit" name="resetweight" class="btn btn-lg btn-danger btn-block" formnovalidate>Reset</button>	  	

				        <?php
				        	} else {

				        ?>							          		           	
							<button type="submit" name="fetchweight" class="btn btn-lg btn-success btn-block">Fetch</button>

				        <?php
				        	}
				        ?>

		            </div>	

	        	</div>
				<div class="row">
		            <div class="form-group col-md-4">
						<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Arrival</button>						 
		            </div>	
		            <div class="form-group col-md-4">
						<button type="submit" name="submitbatch" class="btn btn-lg btn-success btn-block">Add Batch</button>	           		
		            </div>	

		            <?php
		            	if($gr_confirmed_by != NULL) {
		            ?>
			            <div class="form-group col-md-4">
							<button type="submit" name="printgrns" class="btn btn-lg btn-warning btn-block" formnovalidate>Print GRN</button>	           		
			            </div>	

			        <?php
			        	} else {

			        ?>
			            <div class="form-group col-md-4">
							<button type="submit" id="confirmgrnsbtn" name="confirmgrns" class="btn btn-lg btn-danger btn-block" formnovalidate>Confirm GRN</button>	           		
			            </div>	

			        <?php
			        	}
			        ?>

		        </div>
			</form>

	</div>
	<div class="col-md-6 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="arrivalinformation">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Outturn(s) In GRN</h3>
				<table class="table table-striped">
				<thead>
				<tr>	
					<th>
						Lot
					</th>
					<th>
						Outturn
					</th>
					<th>
						Mark
					</th>
					<th>
						Grade
					</th>
					<th>
						Gross Weight
					</th>
					<th>
						Net Weight
					</th>
					<th>
						Warrant no.
					</th>
					<th>
						Remove
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
						$total_gross = 0;
						
						if (isset($grnsview)) {

							foreach ($grnsview as $value) {

								$total_gross += $value->st_gross; 

								$total += $value->st_net_weight; 

								$count += 1;

								$id = $value->id;

								$total_bags += $value->st_bags;

								$total_pkts += $value->st_pockets;

								echo "<tr>";

									echo "<td>".$value->cfd_lot_no."</td>";
									echo "<td>".$value->st_outturn."</td>";
									echo "<td>".$value->st_mark."</td>";
									echo "<td>".$value->cgrad_name."</td>";
									echo "<td>".$value->st_gross."</td>";
									echo "<td>".$value->st_net_weight."</td>";
									echo "<td>".$value->war_no."</td>";
									echo "<td>"."<a href='/outturn_delete/{$value->stid}'  class='btn btn-success btn-danger' >Delete</a>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count." Lot(s)</td>";
						?>
						<td></td>
						<td></td>
						<td></td>

					    <?php
						    echo "<td>".$total_gross." KG(s)</td>";
						?>

					    <?php
						    echo "<td>".$total." KG(s)</td>";
						?>
						<td></td>
						<td></td>
						
					  </tr>
				</tbody>
				</table>
		</form>
	</div>
	<div class="col-md-6 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Batch(s) In Outturn</h3>
				<table class="table table-striped">
				<thead>
				<tr>			
					<th>
						Batch Kilos
					</th>
					<th>
						Batch Tare
					</th>
					<th>
						Batch Net
					</th>
					<th>
						Packages
					</th>
					<th>
						Warehouse
					</th>
					<th>
						Row
					</th>
					<th>
						Column
					</th>
					<th>
						Zone
					</th>
					<th>
						Remove
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
						$total_tare = 0;
						$total_net = 0;
						$total_packages = 0;

						if (isset($batchview)) {

							foreach ($batchview as $value) {

								$total += $value->btc_weight; 

								$count += 1;

								$total_tare += $value->btc_tare;

								$total_net += $value->btc_net_weight;

								$total_packages += $value->btc_packages;							

								echo "<tr>";

									echo "<td>".$value->btc_weight."</td>";
									echo "<td>".$value->btc_tare."</td>";
									echo "<td>".$value->btc_net_weight."</td>";
									echo "<td>".$value->btc_packages."</td>";
									echo "<td>".$value->wr_name."</td>";
									echo "<td>".$value->loc_row."</td>";
									echo "<td>".$value->loc_column."</td>";
									echo "<td>".$value->btc_zone."</td>";
									echo "<td>"."<a href='/batch_delete/{$value->btcid}'  class='btn btn-success btn-danger' >Delete</a>";

								echo "</tr>";

							}
						}
					?>
					  <tr>

					    <?php
						    echo "<td>".$count." bt of ".$total." KGS</td>";
						    echo "<td>".$total_tare."</td>";
						    echo "<td>".$total_net." KGS</td>";
						?>
					    <?php
						    echo "<td>".$total_packages." PK</td>";
						?>
					    <?php
						    // echo "<td>".$total_pkts." Pkts</td>";
						?>						
						<td></td>						
						<td></td>						
						<td></td>						
						<td></td>						
					  </tr>
				</tbody>
				</table>
	</div>
</div>	
<!-- Modal -->
<div class="modal fade" id="ratesModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
		  <h4 class="alert-heading">
		  Please select service and team</h4>
		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

						
						
		    <div class="form-group">
			                <label>Service</label>
			                <select class="form-control" name="service" id="service">
			                	<option></option> 
								@if (isset($rates) && count($rates) > 0)
											@foreach ($rates->all() as $rate)
												@if ($rate_id ==  $rate->id)
													<option value="{{ $rate->id }}" selected="selected">{{ $rate->service}}</option>
												@else
												<option value="{{ $rate->id }}" >{{ $rate->service}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
			                <!-- <input type="hidden" name="country" id="country" value="{{ $cid }}">	 -->
			            </div>
						<div class="form-group">
			                <label>Team</label>
			                <select class="form-control" name="team" id="team">
			                	<option></option> 
								@if (isset($teams) && count($teams) > 0)
											@foreach ($teams->all() as $team)
												@if ($team_id ==  $team->id)
													<option value="{{ $team->id }}" selected="selected">{{ $team->tms_grpname}}</option>
												@else
												<option value="{{ $team->id }}" >{{ $team->tms_grpname}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
			                <!-- <input type="hidden" name="country" id="country" value="{{ $cid }}">	 -->
			            </div>
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href='' class='btn btn-danger confirm-delete' id="confirmgrnsModalbtn">Confirm</a>
		<button type="button" id="printgrns" class="btn btn-warning" data-dismiss="modal">Print</button>
      </div>
    </div>
  </div>
</div>
</div>
@stop

@push('scripts')
<script>
$('#confirmgrnsbtn').prop('disabled', true);
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		$('#confirmgrnsbtn').prop('disabled', false);
		if(autosubmit){
			$( "#arrivalInformationForm" ).submit();
		}
	})

	$( "#confirmgrnsbtn" ).click(function(event){
		event.preventDefault();
		$("#ratesModalCenter").modal();	
	})
	$( "#confirmgrnsModalbtn" ).click(function(event){
		event.preventDefault();
		postConfirmMovement()	
	})

	function postConfirmMovement(){
		var t=null;
		var cid = $('#country').val();

		var grn_number = $('#grn_number').val();

		var weighbridgeTK = $('#weighbridgeTK').val();
		var outt_season = $('#warehouse').val();


		var service = $('#service').val();
		var team = $('#team').val();

		console.log("post confirm")
				if(cid==''){
					bootbox.alert("Please select country")
				return
				}
				if(grn_number==''){
					bootbox.alert("Please enter GRN")
				return
				}
				if(weighbridgeTK==''){
					bootbox.alert("Please select weighbridge ticket")
				return
				}
				if(outt_season==''){
					bootbox.alert("Please select season")
				return
				}
				if(team==''){
					bootbox.alert("Please select team")
				return
				}

				var confirmurl = '{{ route('arrivalinformation.confirmArrivalInformation',['cid'=>":cid",'grn_number'=>":grn_number",'weighbridgeTK'=>":weighbridgeTK",'outt_season'=>":outt_season",'service'=>":service",'team'=>":team"]) }}';

				confirmurl = confirmurl.replace(':cid', cid);
				confirmurl = confirmurl.replace(':grn_number', grn_number);
				confirmurl = confirmurl.replace(':weighbridgeTK', weighbridgeTK);
				confirmurl = confirmurl.replace(':outt_season', outt_season);
				confirmurl = confirmurl.replace(':service', service);
				confirmurl = confirmurl.replace(':team', team);
				console.log(confirmurl)
				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape. We are escaping, we are the escapers, meant to escape, does that make us escarpments!"); },
  					backdrop: true,
					closeButton: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
				});
						$.ajax({
						url: confirmurl,
						type: 'GET',
						}).success(function(response) {
						console.log(response)
						if(parseFloat(response.bagstopay)===0){
							dialog.find('.bootbox-body').html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading"><i class="fa fa-exclamation-triangle fa-2x">Cannot confirm. Instruction has 0 packages</i></div>');
						}else{
						dialog.find('.bootbox-body').html(
						'<div class="alert alert-success" role="alert"><h4 class="alert-heading">Update was successful</h4></div>'+
						'<div class="alert alert-warning alert-dismissible" role="alert" class="alert-heading">'+
									'<div class="row align-items-center justify-content-center"><h2>Bags to Pay: '+response.bagstopay+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Rate: '+response.rate+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Service: '+response.service+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Charge: '+response.charge+'</h2></div>'+
									'</div>');
								}
						
						}).error(function(error) {
							console.log(error)
						dialog.find('.bootbox-body').html('<div class="progress"></div>'+
									'<hr><div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">An error occured while attempting to complete process. Contact Database Team</i></div>');
						});
		
					
	}
 //print
 $( "#printgrns" ).click(function(event){
		event.preventDefault();
	printRate()	
	})

function printRate(){
	var t=null;
		var grn_number = $('#grn_number').val();
		var service = $('#service').val();
		var team = $('#team').val();

		console.log("post confirm")
				if(grn_number==''){
					bootbox.alert("Please select GRN number")
				return
				}
				if(service==''){
					bootbox.alert("Please select service")
				return
				}
				if(team==''){
					bootbox.alert("Please select team")
				return
				}

				var printurl = '{{ route('arrivalinformation.printarrivalinformation',['grn_number'=>":grn_number",'service'=>":service",'team'=>":team"]) }}';

				printurl = printurl.replace(':grn_number', grn_number);
				printurl = printurl.replace(':service', service);
				printurl = printurl.replace(':team', team);
				console.log(printurl)
				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape. We are escaping, we are the escapers, meant to escape, does that make us escarpments!"); },
  					backdrop: true,
					closeButton: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Printing...</div>'
				});

				setTimeout(function(){
					dialog.modal('hide')
				}, 1000)
				
   			    window.open(printurl, '_blank');	
						// $.ajax({
						// url: confirmurl,
						// type: 'GET',
						// }).success(function(response) {
						// console.log(response)
						
						// dialog.find('.bootbox-body').html(
						// '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Update was successful</h4></div>'+
						// '<div class="alert alert-warning alert-dismissible" role="alert" class="alert-heading">'+
						// 			'<div class="row align-items-center justify-content-center"><h2>Bags to Pay: '+response.bagstopay+'</h2></div>'+
						// 			'<div class="row align-items-center justify-content-center"><h2>Rate: '+response.rate+'</h2></div>'+
						// 			'<div class="row align-items-center justify-content-center"><h2>Service: '+response.service+'</h2></div>'+
						// 			'<div class="row align-items-center justify-content-center"><h2>Charge: '+response.charge+'</h2></div>'+
						// 			'</div>');
						// }).error(function(error) {
						// 	console.log(error)
						// dialog.find('.bootbox-body').html('<div class="progress">'+
						// 			'<hr><div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">An error occured while attempting to complete process. Contact Database Team</i></div>');
						// });
		
	
}
</script>
@endpush