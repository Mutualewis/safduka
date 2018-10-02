@extends ('layouts.dashboard')
@section('page_heading','Contract Execution')
@section('section')
<div class="col-sm-14 col-md-offset-1">
			<div class="row">
				<div class="col-md-5">
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

	if (!isset($country )) {
		$country = NULL;
	}
	if (!isset($contract )) {
		$contract = NULL;
	}
	if (!isset($description )) {
		$description = NULL;
	}
	if (!isset($shipmonth)) {
		$shipmonth = NULL;
	}
	if (!isset($price)) {
		$price = NULL;
	}
	if (!isset($destination)) {
		$destination = NULL;
	}
	
	$date = NULL;

	$date_second = NULL;
	
	$date_third = NULL;

	$date_fourth = NULL;

	$cancelled = NULL;


	if (!isset($zone)) {
		$zone   = NULL;
	}
	if (!isset($ot_season )) {
		$ot_season = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (!isset($packages )) {
		$packages = NULL;
	}
	if (!isset($pockets )) {
		$pockets = NULL;
	}
	if (!isset($cid )) {
		$cid = NULL;
	}
	if (!isset($clid )) {
		$clid = NULL;
	}
	if (!isset($spid )) {
		$spid = NULL;
	}
	if (!isset($syrid )) {
		$syrid = NULL;
	}


	if (!isset($disposaldate  )) {
		$disposaldate  = NULL;
	}
	if (!isset($disposaldate)) {
		$disposaldate  = NULL;
	}
	if (!isset($weight_note_no)) {
		$weight_note_no  = NULL;
	}
	if (!isset($billoflsnding  )) {
		$billoflsnding  = NULL;
	}
	if (!isset($wbtk)) {
		$wbtk  = NULL;
	}


	if (!isset($pkg)) {
		$pkg = NULL;
	}
	if (!isset($pkg_weight)) {
		$pkg_weight = NULL;
	}	
	if (!isset($container_number )) {
		$container_number = NULL;
	}

	if (!isset($weight_staffed )) {
		$weight_staffed = NULL;
	}

	if (!isset($packaging_method )) {
		$packaging_method = NULL;
	}

	if (!isset($packaging_type )) {
		$packaging_type = NULL;
	}

	if (!isset($complimentarycondition )) {
		$complimentarycondition = NULL;
	}

	if (!isset($weight )) {
		$approved_weight = NULL;
	} 


	if (!isset($approved_weight )) {
		$weight = NULL;
	} 

	if (!isset($client_reference )) {
		$client_reference = NULL;
	}

	if (!isset($fixation_month_id )) {
		$fixation_month_id = NULL;
	}

	if (!isset($price_type_id )) {
		$price_type_id = NULL;
	}

	if (!isset($price_units_id )) {
		$price_units_id = NULL;
	}

	if (!isset($bag_size_id )) {
		$bag_size_id = NULL;
	}

	if (!isset($call_from_id )) {
		$call_from_id = NULL;
	}

	if (!isset($created_by )) {
		$created_by = NULL;
	}

	if (!isset($created_on )) {
		$created_on = NULL;
	}

	if (!isset($updated_by )) {
		$updated_by = NULL;
	}

	if (!isset($updated_on )) {
		$updated_on = NULL;
	}


	if (!isset($bskt )) {
		$bskt = NULL;
	}


	$sct_confirmed = null;
	if (isset($SalesContract)){		
			$cid = $SalesContract->ctr_id;
			$contract = $SalesContract->sct_number;
			$description = $SalesContract->sct_description;
			$packages = $SalesContract->sct_packages;
			$spid = $SalesContract->sct_month;
			$packaging_method = $SalesContract->sct_packaging_method;
			$packaging_type = $SalesContract->pkg_id;
			$sct_confirmed = $SalesContract->sct_stuffed;
			$syrid = $SalesContract->yr_id;
			$weight = $SalesContract->sct_weight;
			$approved_weight = $SalesContract->sct_approved_weight;

			if ($approved_weight == null) {

				$approved_weight = $weight;

			}

			$fixation_month_id = $SalesContract->trm_id;
			$price_type_id = $SalesContract->pt_id;
			$price_units_id = $SalesContract->pu_id;
			$bag_size_id = $SalesContract->bgs_id;

			$destination = $SalesContract->sct_destination;

			$price = $SalesContract->sct_price;

			$cancelled = $SalesContract->sct_cancelled;

			$call_from_id = $SalesContract->cf_id;

			$client_reference = $SalesContract->sct_client_reference;

			$bskt = $SalesContract->bs_id;
			$clid = $SalesContract->cl_id;

			if (!isset($coffeeTy)){

				$coffeeTy = $SalesContract->cl_id;

			}			




			$complimentarycondition = $SalesContract->sct_complemantary_condition;
			// $date = $SalesContract->sct_bulk_date;
			// $date = date("m/d/Y", strtotime($date));
			$disposaldate = $SalesContract->sct_disposal_date;
			$disposaldate = date("m/d/Y", strtotime($disposaldate));

			if ($SalesContract->sct_start_date != null) {
				$date_second = $SalesContract->sct_start_date;
				$date_second = date("m/d/Y", strtotime($date_second));
			}


			if ($SalesContract->sct_start_date != null) {
				$date_third = $SalesContract->sct_end_date;
				$date_third = date("m/d/Y", strtotime($date_third));
			}


			if ($SalesContract->sct_start_date != null) {
				$date_fourth = $SalesContract->sct_date;
				$date_fourth = date("m/d/Y", strtotime($date_fourth));
			}


	}

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="salescontract" id="salescontractform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<h2>Contract Details</h2>

				<div class="row">
		            <div class="form-group col-md-4">
		                <label>Country</label>
		                <select class="form-control" name="country" onchange="this.form.submit()">
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
	        			<label>Contract Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="contract" style="text-transform:uppercase; " placeholder="Search Contract..."  value="{{ old('contract'). $contract }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchButtonContract" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>
	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-4">
		                <label>Coffee Type</label>
		                <select class="form-control" name="coffee_type" onchange="this.form.submit()">
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

		            <div class="form-group col-md-4">
		                <label>Quality Code</label>
		                <select class="form-control" name="basket">
		               		<option></option>
							@if (isset($basket))
										@foreach ($basket->all() as $value)
										@if ($bskt ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->bs_code. " (". $value->bs_quality.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->bs_code. " (". $value->bs_quality.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Description</label>
		                <input class="form-control"  id="description"  name="description" value="{{ old('description').$description  }}">
		            </div>	     

 		            <div class="form-group col-md-4">
		                <label>Consignee</label>
		                <select class="form-control" id="client" name="client" >
		                	<option value="0"></option> 
							@if (isset($client) && count($client) > 0)
										@foreach ($client->all() as $value)
											@if ($clid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cl_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cl_name}}</option>
											@endif
										@endforeach									
							@endif
		                </select>		
		            </div> 
		            
		        </div>

		        <div class="row">

		            <div class="form-group col-md-4">
		            	<label>Contract Date</label>
		           		<input class="form-control"  id="date_fourth"  name="date_fourth" value="{{ old('date_fourth').$date_fourth  }}">
		            </div>	  


  		            <div class="form-group col-md-4">
		                <label>Start Date</label>
		                <input class="form-control"  id="date_second"  name="date_second" value="{{ old('date_second').$date_second  }}">		
		            </div> 

 		            <div class="form-group col-md-4">
		                <label>End Date</label>
		                <input class="form-control"  id="date_third"  name="date_third" value="{{ old('date_third').$date_third  }}">	
		            </div> 
		            
		        </div>

		        <div class="row">

		            <div class="form-group col-md-4">
		                <label >Client Reference</label>
		                <input class="form-control"  id="client_reference"  name="client_reference" value="{{ old('client_reference').$client_reference }}">
		            </div>	

		            <div class="form-group col-md-4">
		                <label >Complimentary Condition</label>
		                <input class="form-control"  id="complimentarycondition"  name="complimentarycondition" value="{{ old('complimentarycondition').$complimentarycondition }}">
		            </div>	

 		            <div class="form-group col-md-4">
		                <label>Type of Loading</label>
		                <select class="form-control" name="packaging_method">
		                	<option value="0"></option> 
		                	@if ($packaging_method ==  1)
		                		<option value="1" selected="selected">Bulking</option> 
		                	@else
		                		<option value="1">Bulking</option> 
		                	@endif

		                	@if ($packaging_method ==  2)
		                		<option value="2" selected="selected">Bags</option> 
		                	@else
		                		<option value="2">Bags</option> 
		                	@endif
		                </select>		
		            </div> 

		        </div>

		        <div class="row">

		            <div class="form-group col-md-4">
		                <label>Bag Type</label>
		                <select class="form-control" name="packaging">
		                	<option></option> 
								@if (isset($Packaging))
											@foreach ($Packaging->all() as $value)
											@if ($packaging_type ==  $value->id)
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
		                <label>Bag Size</label>
		                <select class="form-control" id="bag_size" name="bag_size" onchange="calculateWeight()">
		                	<option></option> 
								@if (isset($bagSizes))
											@foreach ($bagSizes->all() as $value)
											@if ($bag_size_id ==  $value->id)
												<option value="{{ $value->bgs_size }}" selected="selected">{{ $value->bgs_size}}</option>
											@else
												<option value="{{ $value->bgs_size }}">{{ $value->bgs_size}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		                <label >Quantity/Packages</label>
		                <input class="form-control"  id="packages" name="packages" value="{{ old('packages').$packages }}" oninput="calculateWeight()">
		            </div>


		        </div>

		        <div class="row">
		            
		            <div class="form-group col-md-4">
		                <label >Weight</label>
		                <input class="form-control"  id="weight_old"  name="weight_old" value="{{ old('weight').$weight }}" disabled>
		                <input class="form-control"  type="hidden"  id="weight"  name="weight" value="{{ old('weight').$weight }}">
		            </div>	

		            <div class="form-group col-md-4">
		                <label>Fixation Month</label>
		                <select class="form-control" name="fixation_month">
		                	<option></option> 
								@if (isset($tradingMonths))
											@foreach ($tradingMonths->all() as $value)
											@if ($fixation_month_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->trm_code}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->trm_code}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>			

		            </div>

		            <div class="form-group col-md-4">
		                <label >Destination</label>
		                <input class="form-control"  id="destination"  name="destination" value="{{ old('destination').$destination }}">
		            </div>	

		        </div>

		        <div class="row">

		            <div class="form-group col-md-4">
		                <label >Price</label>
		                <input class="form-control"  id="price"  name="price" value="{{ old('price').$price }}">
		            </div>	


		            <div class="form-group col-md-4">
		                <label>Price Unit</label>
		                <select class="form-control" name="price_units">
		                	<option></option> 
								@if (isset($priceUnits))
											@foreach ($priceUnits->all() as $value)
											@if ($price_units_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->pu_units}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->pu_units}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		                <label>Type of Price</label>
		                <select class="form-control" id="price_type" name="price_type" onchange="getPrice()">
		                	<option></option> 
								@if (isset($priceType))
											@foreach ($priceType->all() as $value)
											@if ($price_type_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->pt_type}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->pt_type}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>	
		            </div>

		        </div>

		        <div class="row">
		        <?php
		        	if ($price_type_id != 1) {
		        ?>
		            <div  id="call_from" class="form-group col-md-4">
		                <label>Call From</label>
		                <select class="form-control" name="call_from">
		                	<option></option> 
								@if (isset($callFrom))
											@foreach ($callFrom->all() as $value)
											@if ($call_from_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cf_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cf_name}}</option>
											@endif
											@endforeach
										
								@endif
		                </select>			
		            </div>

		        <?php 
		    	}
		    	?>



		            <div class="form-group col-md-4">
		                <label style="color: red;" >Cancel Contract</label>
		                <?php
		                	if ($role == $admin) {
		                	
			                	if ($cancelled == null) {

			                		echo "<input class='form-control' type='checkbox' name='cancel' value='1' />";

			                	} else {

			                		echo "<input class='form-control' type='checkbox' name='cancel' value='1' checked/>";

			                	}

			                } else {

			                	echo "<input class='form-control' type='checkbox' name='cancel' value='1' disabled/>";

			                }	                	

		                ?>
		            </div>	

		            <div class="form-group col-md-4">
		                <label >Approved Weight</label>
		                <input class="form-control"  id="weight"  name="approved_weight" value="{{ old('approved_weight').$approved_weight }}">
		            </div>	


		        </div>


				<div class="row">
		            <div class="form-group col-md-12">

		            	<button type="submit" name="createsalescontract" class="btn btn-lg btn-success btn-block">Add/Update Contract</button>
		            	
		            	<?php
		            	if ($sct_confirmed == null) {		            	
		            	?>
		            		<!-- <button type="submit" name="createsalescontract" class="btn btn-lg btn-success btn-block">Add/Update Contract</button> -->
		           		<?php
		           		} else {
		           		?>
		           			<!-- <button type="submit" name="createsalescontract" class="btn btn-lg btn-success btn-block" disabled>Add/Update Contract</button> -->
		           		<?php
		           		}
		           		?>
		            </div>
		        </div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printcontractsummary" class="btn btn-lg btn-success btn-block">Print Contract Summary</button>
		            </div>
		        </div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printinstruction" class="btn btn-lg btn-success btn-block">Print Instruction</button>
		            </div>
		        </div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printhistory" class="btn btn-lg btn-success btn-block">Download History</button>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printexactlots" class="btn btn-lg btn-success btn-block">Download Results Allocations</button>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printallocation" class="btn btn-lg btn-success btn-block">Download Allocation</button>
		            </div>
		        </div>

	</div>



<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		

				<h3>Contract Status</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					<th>
						Contract No.
					</th>
					<th>
						Instruction No.
					</th>
					<th>
						Allocated Weight
					</th>
					<th>
						Stuffed Weight
					</th>
					<th>
						Status
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

						$total_contract = 0;
						$total_allocated = 0;
						$total_stuffed = 0;

						if (isset($SalesContractSummary)) {
							foreach ($SalesContractSummary->all() as $value) {

								$stid = $value->stid;

								$total += $value->stff_weight; 

								$total_contract += $value->contract_weight; 
								$total_allocated += $value->total_allocated; 
								$total_stuffed += $value->stuffed_weight; 
								

								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

					    		$total_value = ($value->weight)/50 * ($value->price);

								$total_price += $total_value;					
					

								echo "<tr>";

									echo "<td>".$value->sct_number."</td>";
									echo "<td>".$value->pr_instruction_number."</td>";
									echo "<td>".$value->total_allocated."</td>";
									echo "<td>".$value->stuffed_weight."</td>";
									echo "<td>".$value->status."</td>";

									echo "<input type='hidden' name='stid' id='stid' value='".$stid."'>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count."</td>";
						?>
						<td></td>
					    <?php
						    echo "<td>".$total_allocated." KGs</td>";
						    echo "<td>".$total_stuffed." KGs</td>";
						?>
						<td></td>
					  </tr>
				</tbody>
				</table>


				<h3>Stuffing Summary</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					<th>
						Weight Note No.
					</th>
					<th>
						Weighbridge Ticket
					</th>
					<th>
						Stuffed Weight
					</th>
					<th>
						Stuffing Date
					</th>
					<th>
						Container Number
					</th>
					<th>
						Shipper
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
						if (isset($StuffingView)) {
							foreach ($StuffingView->all() as $value) {
								$total += $value->stff_weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

					    		$total_value = ($value->weight)/50 * ($value->price);

								$total_price += $total_value;					
					

								echo "<tr>";

									echo "<td>".$value->stff_weight_note."</td>";
									echo "<td>".$value->wb_ticket."</td>";
									echo "<td>".$value->stff_weight."</td>";
									echo "<td>".$value->stff_date."</td>";
									echo "<td>".$value->stff_container."</td>";
									echo "<td>".$value->shpr_id."</td>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count."</td>";
						?>
						<td></td>
					    <?php
						    echo "<td>".$total." KGs</td>";
						?>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
				</tbody>
				</table>

				<label>Created By: <?php echo $created_by; ?></label> <label>On: <?php echo $created_on; ?></label> </br>

				<label>Updated Lastly By: <?php echo $updated_by; ?></label> <label>On: <?php echo $updated_on; ?></label>

	</div>

</form>

</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#salescontractform" ).submit();
		}
	})
</script>
@endpush