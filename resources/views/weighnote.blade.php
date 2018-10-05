@extends ('layouts.dashboard')
@section('page_heading','Weight Note')
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
	if (!isset($wn_number )) {
		$wn_number = NULL;
	}
	if (!isset($outturn )) {
		$outturn = NULL;
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
	if (!isset($purpose)) {
		$purpose = NULL;
	}
	if (!isset($cgrad_id)) {
		$cgrad_id = NULL;
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


	if (isset($weight_note_details)){
		$wbtk =  $weight_note_details->wb_id;
		$wn_number = $weight_note_details->wn_number;
		$outturn = $weight_note_details->st_outturn;
		$cgrad_id = $weight_note_details->cgrad_id;
		$bskt = $weight_note_details->bs_id;
		$pkg = $weight_note_details->pkg_id;
		$packages_stock = $weight_note_details->wn_packages;
		$purpose = $weight_note_details->wn_purpose;
		if (isset($stock_details)){
			$outturn = $stock_details->st_outturn;
		}
	} else if (isset($stock_details)){
		$outturn = $stock_details->st_outturn;
		$cgrad_id = $stock_details->cgrad_id;
		$bskt = $stock_details->bs_id;
		$pkg = $stock_details->pkg_id;
		$packages_stock = $stock_details->st_packages;
	}

?>


    <div class="col-md-6">
	        <form role="form" method="POST" action="weighnote">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

			    <h3>General Information</h3>	
			    <div class="row">
		            <div class="form-group col-md-4">
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

		            <div class="form-group col-md-4">
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

			    	<div class="form-group col-md-4">
			    		<label>Weight Note No.</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="wn_number" name="wn_number" name="wn_number" style="text-transform:uppercase; " placeholder="Search/Enter WN..."  value="{{ $wn_number}}"></input>

		                        <span class="input-group-btn">

			                        <button type="submit" name="searchButtonWn" class="btn btn-default" formnovalidate>
			                        	<i class="fa fa-search"></i>
			                        </button>

	                    		</span>
	                    </div>
	                </div> 

	            </div>


	        	<div class="row">
					<div class="form-group col-md-12">
						<label>Purpose</label>
						<textarea class="form-control" rows="3" name="purpose" value="{{ old('purpose').$purpose  }}"><?php echo htmlspecialchars($purpose); ?></textarea>
					</div>
	            </div>




 				<h3>Outturn</h3>

	        	<div class="row">

			    	<div class="form-group col-md-4">
			    		<label>Outturn</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outturn" name="outturn" name="outturn" style="text-transform:uppercase; " placeholder="Search/Enter Outturn..."  value="{{ $outturn}}"></input>

		                        <span class="input-group-btn">

			                        <button type="submit" name="searchButtonOutt" class="btn btn-default" formnovalidate>
			                        	<i class="fa fa-search"></i>
			                        </button>

	                    		</span>
	                    </div>
	                </div> 

		            <div class="form-group col-md-4">
		                <label>Grade</label>
		                <select class="form-control" name="cgrad_id">
		               		<option></option>
							@if (isset($coffeeGrade))
										@foreach ($coffeeGrade->all() as $value)
										@if ($cgrad_id ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->cgrad_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->cgrad_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label>Basket</label>
		                <select class="form-control" name="basket">
		               		<option></option>
							@if (isset($basket))
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

		            <div class="form-group col-md-4">
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

		            <div class="form-group col-md-4">
			                <label >Packages</label>
			                <input class="form-control"  id="packages_stock"  name="packages_stock" oninput="calculateValue()" value="{{ old('packages_stock').$packages_stock  }}" required>		            
		            </div>	


	        	</div>


 				<h3>Measure</h3>
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
							<button type="submit" name="fetchweight" class="btn btn-lg btn-success btn-block" formnovalidate>Fetch</button>

				        <?php
				        	}
				        ?>

		            </div>	
		           
		        </div> 		

				<div class="row">
		            <div class="form-group col-md-6">
						<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Weight Note</button>						 
		            </div>	
		            <div class="form-group col-md-6">
						<button type="submit" name="printweightnote" class="btn btn-lg btn-warning btn-block" formnovalidate>Print Weight Note</button>	           		
		            </div>

		        </div>
			</form>

	</div>
	<div class="col-md-6 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="arrivalinformation">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Outturn(s) In Weight Note</h3>
				<table class="table table-striped">
				<thead>
				<tr>	
					<th>
						Outturn
					</th>
					<th>
						Grade
					</th>
					<th>
						Basket
					</th>
					<th>
						Packaging
					</th>
					<th>
						Packages
					</th>
					<th>
						Grosss Weight
					</th>
					<th>
						Tare Weight
					</th>
					<th>
						Net Weight
					</th>
					<th>
						Delete
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
						$gross_weight = 0;
						$tare = 0;
						
						if (isset($weight_note_outturns)) {

							$tare = $weight_note_outturns->pkg_weight*$weight_note_outturns->wn_packages;
							$packages = $weight_note_outturns->wn_packages;
							$weight = $weight_note_outturns->wn_weight;
							$gross_weight = $weight_note_outturns->wn_weight-$tare;

							echo "<tr>";

								echo "<td>".$weight_note_outturns->st_outturn."</td>";
								echo "<td>".$weight_note_outturns->cgrad_name."</td>";
								echo "<td>".$weight_note_outturns->bs_quality."</td>";
								echo "<td>".$weight_note_outturns->pkg_name."</td>";
								echo "<td>".$weight_note_outturns->wn_packages."</td>";
								echo "<td>".$weight_note_outturns->wn_weight."</td>";
								echo "<td>".$tare."</td>";
								echo "<td>".($weight_note_outturns->wn_weight-$tare)."</td>";
								echo "<td>"."<a href='/weight_note_delete/{$weight_note_outturns->wnid}'  class='btn btn-success btn-danger' >Delete</a>";

							echo "</tr>";

						} 
					?>
					  <tr>
					    <?php
						    echo "<td>1 Lot(s)</td>";
						?>
						<td></td>
						<td></td>
						<td></td>

					    <?php
						    echo "<td>".$packages."</td>";
						    echo "<td>".$weight." KG(s)</td>";
						    echo "<td>".$tare." KG(s)</td>";
						    echo "<td>".$gross_weight." KG(s)</td>";
						?>

						<td></td>
						
					  </tr>
				</tbody>
				</table>
		</form>
	</div>

</div>	

</div>
@stop
