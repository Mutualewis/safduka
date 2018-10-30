@extends ('layouts.dashboard')
@section('page_heading','Arrival Information')
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
	if (!isset($timeout)) {
		$timeout = 1000;
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

    <div class="col-md-14">
	        <form role="form" method="POST" action="arrivalinformationgrns">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		        <div class="row">
		            <div class="form-group col-md-12">
		            	<label>Weighbridge Ticket</label>
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
		        </div>

		        <div class="row">
			    	<div class="form-group col-md-12">
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

	            <div class="row">
		        	<div class="form-group col-md-12">
		                <label>Warehouse</label>
		                <select class="form-control" id="warehouse" name="warehouse">
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
            	</div>

	        	<div class="row">

	        		<div class="form-group col-md-12">
	        			<label>Sale-Lot-Outturn-Grade</label>

		                <select class="form-control" id="outt_number_search" name="outt_number_search" placeholder="Select Outturn" data-search="true" onchange=AjaxFunction();>
		             
		                	<option></option> 
							@if (isset($expected_arrival) && count($expected_arrival) > 0)
										@foreach ($expected_arrival as $value)
											@if ($stock_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->sale.'-'.$value->lot.'-'.$value->outturn.'-'.$value->grade}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->sale.'-'.$value->lot.'-'.$value->outturn.'-'.$value->grade}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>

	                </div>	
	            </div>
	            <div class="row">
		            <div class="form-group col-md-12">
		           		<label>Mark</label>
		                <input type="text"  class="form-control" id="coffee_grower" name="coffee_grower" style="text-transform:uppercase" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" readonly>	                
		            </div> 
		        </div>
		        <div class="row">
		            <div class="form-group col-md-12">
		                <label>Basket</label>
		                <select class="form-control" id="basket"  name="basket" disabled>
		               		<option></option>
							@if (count($basket) > 0)
										@foreach ($basket->all() as $value)
										@if ($bskt ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->bs_code}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->bs_code}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
	        	</div>

		        <div class="row">

		            <div class="form-group col-md-6">
		            	<button type="submit" id ="deliverydetails" name="deliverydetails" class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalDeliveryCenter'onclick='displayDeliveryDetails(event, this)' data-dprtname='{$value->dprt_name}'>Delivery Details</button>
					</div>	

		            <div class="form-group col-md-6">
						<button type="submit" id ="batchdetails" name="batchdetails" class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalBatchCenter'onclick='displayBatch(event, this)' data-dprtname='{$value->dprt_name}'>Add Batch</button>
					</div>	

				</div>


				<div class="row">
					<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
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
			                <?php
		                	if ($role == $admin) {
		                	?>
								<th>
									Remove
								</th>
							<?php 
							}
							
							?>
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
											if ($role == $admin) {
		                	
												echo "<td>"."<a href='/outturn_delete/{$value->stid}'  class='btn btn-success btn-danger' >Delete</a>";
											}
										echo "</tr>";

									}
								}
							?>
							  <tr>
							    <?php
								    echo "<td>".$count." Lot(s)</td>";
								    echo "<td></td>";
								    echo "<td></td>";
								    echo "<td></td>";
							   		echo "<td>".$total_gross." KG(s)</td>";
								    echo "<td>".$total." KG(s)</td>";
								    echo "<td></td>";
								    if ($role == $admin) {
								    echo "<td></td>";
									}
								?>
								
							  </tr>
						</tbody>
						</table>
					</div>
				</div>

				<div class="row">
		            <div class="form-group col-md-12">
						<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Arrival</button>						 
		            </div>	
		        </div>

		        <div class="row">
		            <?php
		            	if($gr_confirmed_by != NULL) {
		            ?>
			            <div class="form-group col-md-12">
							<button type="submit" name="printgrns" class="btn btn-lg btn-warning btn-block" formnovalidate>Print GRN</button>	           		
			            </div>	

			        <?php
			        	} else {

			        ?>
			            <div class="form-group col-md-12">
							<button type="submit" id="confirmgrnsbtn" name="confirmgrns" class="btn btn-lg btn-danger btn-block" formnovalidate>Confirm GRN</button>	           		
			            </div>	

			        <?php
			        	}
			        ?>

		        </div>
			</form>

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


<div class="modal fade" id="menuModalDeliveryCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
		  <h4 class="alert-heading">
		  Delivery Details</h4>
		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id = "delivery_modal" style="font-size: 35px;">

            <div class="form-group">
                <label>Dispatch Net Weight</label>
                <input class="form-control"  id="dispatch_kilograms"  name="dispatch_kilograms" oninput="myFunction()" value="{{ old('dispatch_kilograms').$dispatch_kilograms  }}" required>
            </div>

            <div class="form-group">
            	<label>Dispatch Date</label>
           		<input class="form-control"  id="date"  name="date" value="{{ old('dispatch_date').$dispatch_date  }}" required>
            </div>	  
            <div class="form-group">
            	<input class="form-control" type="hidden"  id="delivery_kilograms"  name="delivery_kilograms" oninput="myFunction()" value="{{ old('delivery_kilograms').$delivery_kilograms  }}" required>
        	</div>
            <div class="form-group">
                <label>Moisture(%)</label>
                <input class="form-control"  id="moisture"  name="moisture" oninput="myFunction()" value="{{ old('moisture').$moisture  }}" required>
            </div>

            <div class="form-group">
                <label>Packaging Check</label>
                <select class="form-control" name="package_status" required>
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

            <div class="form-group">
                <label>Packaging</label>
                <select class="form-control" name="packaging" required>
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

            <div class="form-group">
	                <label >Packages</label>
	                <input class="form-control"  id="packages_stock"  name="packages_stock" oninput="calculateValue()" value="{{ old('packages_stock').$packages_stock  }}" required>		            
            </div>	

            <div class="form-group">
                <label style="color: red;" >Partial</label>
                <?php
                	if ($partial == null) {

                		echo "<input class='form-control' type='checkbox' name='partial' value='1' />";

                	} else {

                		echo "<input class='form-control' type='checkbox' name='partial' value='1' checked/>";

                	}		                	

                ?>
            </div>	

				
      </div>
      <div class="modal-footer">
        <button type="button" name="add_items" id="add_items" class="btn btn-primary btn-block" style="font-size: 35px;">Add</button>
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="menuModalBatchCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
		  <h4 class="alert-heading">Batch Details</h4>
			<button type="button" name="add_items" id="add_items" class="btn btn-primary btn-prev" style="font-size: 35px;">Add</button>
			<button type="button" class="btn btn-secondary btn-next" data-dismiss="modal" style="font-size: 35px;">Close</button>

		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id = "batch_modal" style="font-size: 35px;">
	      	<div>
	        	<div class="row">
					<div class="form-group col-md-4">
					    <label>Weigh Scale</label>
					    <select class="form-control" id="weigh_scales" name="weigh_scales">
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

			        <div class="form-group col-md-4">
			            <label >Zone</label>
			            <input class="form-control"  id="zone"  name="zone" oninput="myFunction()" value="{{ old('zone').$zone  }}">
			        </div>	

			        <div class="form-group col-md-4">
			                <label >Packages</label>
			                <input class="form-control"  id="packages_batch"  name="packages_batch" oninput="calculateValue()" value="{{ old('packages_batch').$packages_batch  }}">		            
			        </div>		

			        <div class="form-group col-md-4">
			            <label>Weight (KGS)</label>
			            <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="arrivalBags()" value="{{ old('batch_kilograms').$batch_kilograms  }}" disabled>
			            <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="arrivalBags()" value="{{ old('batch_kilograms').$batch_kilograms  }}" hidden>
			        </div>
			        <div class="form-group col-md-4" id="btn_weight">
			        	<label></label>
						<button type="submit" id="fetch_weight" name="fetchweight" class="btn btn-lg btn-success btn-block" onclick='fetchWeight()'>Fetch</button>
		       
					</div>
				</div>
				<h3  data-toggle="collapse" data-target="#tabpanel">Location</h3> 
				<div id="tabpanel" class="tabpanel">

				    <ul class="nav nav-tabs" role="tablist">

				            <li role="presentation" class="active">
				                <a href="#tab-row" aria-controls="#tab-row" role="tab" data-toggle="tab">Row</a>
				            </li>
				            <li role="presentation">
				                <a href="#tab-column" aria-controls="#tab-column" role="tab" data-toggle="tab">Column</a>
				            </li>
				            <li role="presentation">
				                <a href="#tab-batches" aria-controls="#tab-batches" role="tab" data-toggle="tab">Batches</a>
				            </li>
				    
				    </ul>

				    <div class="tab-content">
			            <div role="tabpanel" class="tab-pane active" class="tab-pane" id="tab-row">
					        <div class="row">		        	
					            <div class="form-group col-md-12" id="row_list" name="row_list">
								
					            </div>
					        </div>
					    </div>

			            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-column">
					        <div class="row">		        	
					            <div class="form-group col-md-12" id="column_list" name="column_list">
					            </div>
					        </div>
					    </div>

			            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-batches">
					        <div class="row">		        	
					            <div class="form-group col-md-12">
									<table class="table table-striped" id="batch_table">
									<thead>
									<tr>			
										<th>
											Kilos
										</th>
										<th>
											Tare
										</th>
										<th>
											Net
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

									</tbody>
									</table>
					            </div>
					        </div>
					    </div>

					</div>
			</div>
				
      </div>
      <div class="modal-footer" id="footer"> 
      </div>
    </div>
  </div>
</div>




</div>
@stop

@push('scripts')
<script>

	$( "#deliverydetails" ).click(function(event){
		event.preventDefault();
	})

	$( "#batchdetails" ).click(function(event){
		event.preventDefault();
	})

</script>
<script>
	var autosubmit = <?php echo json_encode($autosubmit); ?>;
	console.log(autosubmit)


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

				var confirmurl = '{{ route('arrivalinformationgrns.confirmArrivalInformation',['cid'=>":cid",'grn_number'=>":grn_number",'weighbridgeTK'=>":weighbridgeTK",'outt_season'=>":outt_season",'service'=>":service",'team'=>":team"]) }}';

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

					var printurl = '{{ route('arrivalinformationgrns.printarrivalinformation',['grn_number'=>":grn_number",'service'=>":service",'team'=>":team"]) }}';

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

		
	}
	function closeBootBox () {

		var $timeout = <?php echo $timeout; ?>;

		window.setTimeout(function(){
		    bootbox.hideAll();
		}, $timeout);		

	}


	function clearChildren(element) {
	   for (var i = 0; i < element.childNodes.length; i++) {
	      var e = element.childNodes[i];
	      if (e.tagName) switch (e.tagName.toLowerCase()) {
	         case 'input':
	            switch (e.type) {
	               case "radio":
	               case "checkbox": e.checked = false; break;
	               case "button":
	               case "submit":
	               case "image": break;
	               default: e.value = ''; break;
	            }
	            break;
	         case 'select': e.selectedIndex = 0; break;
	         case 'textarea': e.innerHTML = ''; break;
	         default: clearChildren(e);
	      }
	   }
	}
	function fetch_url(outt_number_search) {
		var outt_number_search = $('#outt_number_search').val();
		var grn_number = $('#grn_number').val();
		var url="{{ route('arrivalinformationgrns.getOutturnDetails',['outt_number_search'=>":outt_number_search", 'grn_number'=>":grn_number"]) }}";
		url = url.replace(':outt_number_search', outt_number_search);
		url = url.replace(':grn_number', grn_number);
		return url;

	}

	function fetch_url_scales(warehouse) {
		var url="{{ route('arrivalinformationgrns.getScales',['warehouse'=>":warehouse"]) }}";
		url = url.replace(':warehouse', warehouse);
		return url;

	}

	function fetch_url_locations(warehouse) {
		var url="{{ route('arrivalinformationgrns.getLocations',['warehouse'=>":warehouse"]) }}";
		url = url.replace(':warehouse', warehouse);
		return url;

	}

	function fetch_url_batches() {
		var outt_number_search = $('#outt_number_search').val();
		var grn_number = $('#grn_number').val();
		var url="{{ route('arrivalinformationgrns.getBatch',['outt_number_search'=>":outt_number_search", 'grn_number'=>":grn_number"]) }}";
		url = url.replace(':outt_number_search', outt_number_search);
		url = url.replace(':grn_number', grn_number);
		return url;

	}

	function displayDeliveryDetails(event, value){

		clearChildren(document.getElementById("delivery_modal"));
		var outt_number_search = $('#outt_number_search').val();
		var url = fetch_url(outt_number_search); 

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);
			document.getElementById('dispatch_kilograms').value = obj.st_dispatch_net;
			document.getElementById('moisture').value = obj.st_moisture;
			document.getElementById('date').value = obj.dispatch_date;


			$("#package_status").val(obj.st_package_status);
			$("#packaging").val(obj.pkg_id);
			document.getElementById('packages_stock').value = obj.st_packages;

			if (obj.st_partial_delivery == 1) {
				document.getElementById('partial').checked = true;
			}


		});

        event.preventDefault();

	}	


	function displayBatch(event, value){

		clearChildren(document.getElementById("batch_modal"));
		var warehouse = $('#warehouse').val();
		var url_scales = fetch_url_scales(warehouse); 
		var url_location = fetch_url_locations(warehouse); 
		var url_batches = fetch_url_batches(); 

        $.get(url_scales, function(data, status){
			var scales = jQuery.parseJSON(data);

			var $select = $('#weigh_scales');
			$select.find('option').remove();   
			$select.append('<option></option>');

			$.each(scales,function(key, value) 
			{	
				$select.append('<option value=' + value["id"] + '>' + value["ws_equipment_number"] + '</option>');
			});

		});

        $.get(url_location, function(data, status){
			var locations = jQuery.parseJSON(data);

			$.each(locations,function(key, value) 
			{
				if (value["loc_row"] != null) {

                    var rdb_row = "<label style='font-size: 35px;'><input id=row." + value['id'] + "  onclick=RecordCheck(this) type=radio name=row  value=" + value['id'] + ">&nbsp&nbsp"+ value['loc_row'] +"</label></br>";

                    $('#row_list').append(rdb_row); 

				}
				
				if (value["loc_column"] != null && (value["loc_column"] != 0)) {

                    var rdb_row = "<label style='font-size: 35px;' ><input id=column." + value['id'] + "  onclick=RecordCheck(this) type=radio name=column  value=" + value['id'] + ">&nbsp&nbsp"+ value['loc_column'] +"</label></br>";

                    $('#column_list').append(rdb_row); 
				}
				
			});
      
		});

		
        $.get(url_batches, function(data, status){
			var batch = jQuery.parseJSON(data);

			$('#batch_table tr').not(':first').not(':last').remove();
			var html = '';
		
			$.each(batch,function(key, value) 
			{	

          		html += '<tr><td>' + value["btc_weight"] + 
                    '</td><td>' + value["btc_tare"] + '</td><td>' + value["btc_net_weight"] + '</td><td>' + value["btc_packages"] + '</td><td>' + value["wr_name"] + '</td><td>' + value["loc_row"] + '</td><td>' + value["loc_column"] + '</td><td>' + value["btc_zone"] + '</td><td><a href="/batch_delete/' + value["btcid"] + '"  class="btn btn-success btn-danger">Delete</a></td></tr>';

			});
			$('#batch_table tr').first().after(html);
		});

        event.preventDefault();

	}
	function populateFooter(){

        var btn_add = "<button id=add_items class='btn btn-primary btn-block' style='font-size: 35px;'>Add</button></br>";
        $('#footer').append(btn_add); 

        var btn_add = "<button id=add_items class='btn btn-secondary btn-block' style='font-size: 35px;'>Close</Close></br>";
        $('#footer').append(btn_add); 
	}
	function fetchWeight(){
		var weighscale = document.getElementById("weigh_scales").value;	
		var url="{{ route('arrivalinformationgrns.fetchWeight',['weighscale'=>":weighscale"]) }}";
		url = url.replace(':weighscale', weighscale);
		var dialog = bootbox.alert({
			message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
		}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

		$.ajax({
			url: url,
			dataType: 'json',
			}).done(function(response) {
				if(response.found) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Success</i></div>');
					$("#batch_kilograms").val(response.weight);
					$("#fetch_weight").remove();
			        var btn_add = "<button type='submit' id='reset_weight' name='resetweight' class='btn btn-lg btn-danger btn-block' onclick='resetWeight()' >Reset</button>";
			        $('#btn_weight').append(btn_add); 
					closeBootBox();

				}else if(response.error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
					closeBootBox();
				}
			}).error(function(error) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
				closeBootBox();
		});

	}

	function resetWeight(){
		var weighscale = document.getElementById("weigh_scales").value;	
		var url="{{ route('arrivalinformationgrns.resetWeight',['weighscale'=>":weighscale"]) }}";
		url = url.replace(':weighscale', weighscale);
		var dialog = bootbox.alert({
			message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
		}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

		$.ajax({
			url: url,
			dataType: 'json',
			}).done(function(response) {
				if(response.found) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Success</i></div>');
					$("#batch_kilograms").val('');
					$("#reset_weight").remove();
			        var btn_add = "<button type='submit' id='fetch_weight' name='fetchweight' class='btn btn-lg btn-success btn-block' onclick='fetchWeight()'>Fetch</button>";
			        $('#btn_weight').append(btn_add); 
					closeBootBox();

				}else if(response.error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
					closeBootBox();
				}
			}).error(function(error) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
				closeBootBox();
		});


	}
	
</script>

<style type="text/css">
	
	.modal-dialog {
		overflow: scroll;
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
	}

	.modal-content {
		overflow: scroll;
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}
	
	.modal-open {
		overflow: scroll;
	}

	.img {
	  height: 10;
	  width: 10;
	}

	.radio_buttons{
		transform: scale(2);
	}
	/*	.hide { 
		display: none; 
	}
	table#batch_table td:last-child {
		display: none; 
	}*/

</style>


<script type="text/javascript">

	function AjaxFunction()
	{
		var outt_number_search = $('#outt_number_search').val();
		var grn_number = $('#grn_number').val();
		var url="{{ route('arrivalinformationgrns.getOutturnDetails',['outt_number_search'=>":outt_number_search", 'grn_number'=>":grn_number"]) }}";
		url = url.replace(':outt_number_search', outt_number_search);
		url = url.replace(':grn_number', grn_number);

		$("#basket").val('');
		$("#coffee_grower").val('');
		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var customers = jQuery.parseJSON(response);

			$("#basket").val(customers.bsid);
			$("#coffee_grower").val(customers.st_mark);

		}).error(function(error) {
			console.log(error)
		});

	}
</script>

@endpush