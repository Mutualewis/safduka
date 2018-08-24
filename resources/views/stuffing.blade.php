@extends ('layouts.dashboard')
@section('page_heading','Stuffing')
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

	if (!isset($country )) {
		$country = NULL;
	}
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
	if (!isset($contract )) {
		$contract = NULL;
	}
	if (!isset($description )) {
		$description = NULL;
	}
	if (!isset($shipmonth)) {
		$shipmonth = NULL;
	}
	
	$date = NULL;

	$date_second = NULL;
	
	$date_third = NULL;

	$date_fourth = NULL;


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
	if (!isset($instruction_id)) {
		$instruction_id  = NULL;
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
		$weight = NULL;
	}
 

	if (!isset($client_reference )) {
		$client_reference = NULL;
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

			$client_reference = $SalesContract->sct_client_reference;

			$bskt = $SalesContract->bs_id;
			$clid = $SalesContract->cl_id;



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
	        <form role="form" method="POST" action="stuffing">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<h2>Search Contract</h2>

				<div class="row">
		            <div class="form-group col-md-6">
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
	        		<div class="form-group col-md-6">
	        			<label>Contract Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="contract" id="ref_no" style="text-transform:uppercase; " placeholder="Search Contract..."  value="{{ old('contract'). $contract }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchButtonContract" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>
	                    </span>
	                    </div>
	                </div>	
		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label >Weight</label>
		                <input class="form-control"  id="weight"  name="weight" value="{{ old('weight').$weight }}" disabled="disabled">
		            </div>	


		            <div class="form-group col-md-6">
		                <label >Quantity</label>
		                <input class="form-control"  id="packages"  name="packages" value="{{ old('packages').$packages }}" disabled="disabled">
		            </div>	

		        </div>

		        <div class="row">

 		            <div class="form-group col-md-6">
		                <label>Shipment Type</label>
		                <select class="form-control" name="shipment type" disabled="disabled">
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


		            <div class="form-group col-md-6">
		                <label>Bag Type</label>
		                <select class="form-control" name="packaging" disabled="disabled">
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

		        </div>

		        <div class="row">
 		            <div class="form-group col-md-6">
		                <label>Select Instruction *</label> 
		                <select class="form-control" id="instruction" name="instruction" >
		                	<option></option> 
							@if (isset($SalesContractSummary) && count($SalesContractSummary) > 0)
										@foreach ($SalesContractSummary->all() as $value)
											@if ($instruction_id ==  $value->stid)
												<option value="{{ $value->stid }}" selected="selected">{{ $value->pr_instruction_number}}</option>
											@else
												<option value="{{ $value->stid }}">{{ $value->pr_instruction_number}}</option>
											@endif
										@endforeach									
							@endif
		                </select>		
		            </div>   
		        </div>

		        <h2>Stuffing</h2>

				<div class="row">

		            <div class="form-group col-md-6">
		                <label>Weight Note No.</label>
		                <input class="form-control"  id="weight_note_no"  name="weight_note_no" value="{{ old('weight_note_no').$weight_note_no  }}">
		            </div>	

		            <div class="form-group col-md-6">
		            	<label>Weighbridge Ticket</label>
		                <select class="form-control" name="weighbridgeTK">
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
		        	<div class="form-group col-md-6">
		            	<label>Stuffed Weight</label>
		        		<input class="form-control"  id="weight_staffed"  name="weight_staffed" value="{{ old('weight_staffed').$weight_staffed }}">
		        	</div>  

		            <div class="form-group col-md-6">
		            	<label>Stuffing Date</label>
		           		<input class="form-control"  id="date"  name="date" value="{{ old('date').$date  }}">
		            </div>

		        </div>

		        <div class="row">

		            <div class="form-group col-md-6">
		            	<label>Container Number</label>
		           		<input class="form-control"  id="container_number"  name="container_number" value="{{ $container_number }}">
		            </div>

 		            <div class="form-group col-md-6">
		                <label>Shipper</label>
		                <select class="form-control" id="shipper" name="shipper" >
		                	<option></option> 
							@if (isset($shippers) && count($shippers) > 0)
										@foreach ($shippers->all() as $value)
											@if ($shipperid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->shp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->shp_name}}</option>
											@endif
										@endforeach									
							@endif
		                </select>		
		            </div>   
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="createsalescontract" class="btn btn-lg btn-success btn-block">Add/Update Stuffing</button>
		            </div>
		        </div>
		        
				<div class="row">
		            <div class="form-group col-md-12">
		            	<?php
		            	if ($sct_confirmed == null) {		            	
		            	?>
		           		<button type="submit" name="confirmcontract" class="btn btn-lg btn-danger btn-block" onclick="return confirm('Are you sure you want to confirm this contract?');">Confirm Contract</button>
		           		<?php
		           		} else {
		           		?>
		           		<button type="submit" name="confirmcontract" class="btn btn-lg btn-danger btn-block" onclick="return confirm('Are you sure you want to confirm this contract?');" disabled>Confirmed</button>
		           		<?php
		           		}
		           		?>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirminstruction" id="generatechargesbtn" class="btn btn-lg btn-warning btn-block">Generate Charges</button>
		            </div>
		        </div>	

	</div>



<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
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


						$created_by = null;
						$created_on = null;
						$updated_by = null;
						$updated_on = null;

						if (isset($SalesContractSummary)) {
							foreach ($SalesContractSummary->all() as $value) {

								$stid = $value->stid;

								$total += $value->stff_weight; 

								$total_contract += $value->contract_weight; 
								$total_allocated += $value->total_allocated; 
								$total_stuffed += $value->stuffed_weight; 
								

								$created_by = $value->user_created;
								$created_on = $value->created_at;
								$updated_by = $value->user_updated;
								$updated_on = $value->updated_at;


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
									echo "<td>"."<a href='/stuffing_delete/{$id}'  class='btn btn-success btn-danger' >Delete</a>";

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
		            	<label>Stuffed Packages</label>
		        		<input class="form-control"  id="packages_staffed"  name="packages_staffed" value="{{ old('packages_staffed') }}">
		    </div>  

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
				<a href='' class='btn btn-danger confirm-delete' id="confirmProcessRateModalbtn">Confirm</a>
				<button type="button" id="printmovementrate" class="btn btn-warning" data-dismiss="modal">Print</button>
			</div>
			</div>
		</div>
		</div>
		</div>


</div>	
@stop


@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#stuffingform" ).submit();
		}
	})

	$( "#generatechargesbtn" ).click(function(event){
		event.preventDefault();
		$("#ratesModalCenter").modal();	
	})
	$( "#confirmProcessRateModalbtn" ).click(function(event){
		event.preventDefault();
		postConfirmMovement()	
	})

	function postConfirmMovement(){
		var t=null;
		var ref = $('#ref_no').val();
		// var process_type = $('#process_type').val();
		var packages = $('#packages_staffed').val();
		var service = $('#service').val();
		var team = $('#team').val();
		
		console.log("post confirm")
				if(ref==''){
					bootbox.alert("Please enter contract number")
				return
				}
				// if(process_type==''){
				// 	bootbox.alert("Please select process type")
				// return
				// }
				if(packages==''){
					bootbox.alert("Please enter packages")
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
				var confirmurl = '{{ route('processrates.calculatestuffingrate',['ref'=>":ref",'packages'=>":packages",'service'=>":service",'team'=>":team"]) }}';

				confirmurl = confirmurl.replace(':ref', ref);
				//confirmurl = confirmurl.replace(':process_type', process_type);
				confirmurl = confirmurl.replace(':packages', packages);
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
						if(response.packages==''){
							dialog.find('.bootbox-body').html('<div class="progress">'+
									'<hr><div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">An error occured while attempting to complete process. Contact Database Team</i></div>');
						}else{
						dialog.find('.bootbox-body').html(
						'<div class="alert alert-success" role="alert"><h4 class="alert-heading">Update was successful</h4></div>'+
						'<div class="alert alert-warning alert-dismissible" role="alert" class="alert-heading">'+
									'<div class="row align-items-center justify-content-center"><h2>Packages: '+response.packages+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Rate: '+response.rate+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Service: '+response.service+'</h2></div>'+
									'<div class="row align-items-center justify-content-center"><h2>Charge: '+response.charge+'</h2></div>'+
									'</div>');
								}
						}).error(function(error) {
							console.log(error)
						dialog.finprocessrates.printprocesswithrated('.bootbox-body').html('<div class="progress">'+
									'<hr><div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">An error occured while attempting to complete process. Contact Database Team</i></div>');
						});
		
					
	}

		 //print
	$( "#printmovementrate" ).click(function(event){
		event.preventDefault();
	printRate()	
	})

function printRate(){
	var t=null;
		var ref = $('#ref_no').val();
		
		// var packages = $('#packages').val();
		var service = $('#service').val();
		var team = $('#team').val();

		console.log("post confirm")
				if(ref==''){
					bootbox.alert("Please select instruction number")
				return
				}
				// if(packages==''){
				// 	bootbox.alert("Please enter packages")
				// return
				// }
				if(service==''){
					bootbox.alert("Please select service")
				return
				}
				if(team==''){
					bootbox.alert("Please select team")
				return
				}
				var printurl = '{{ route('processrates.printstuffingwithrate',['ref'=>":ref",'service'=>":service",'team'=>":team"]) }}';

				printurl = printurl.replace(':ref', ref);
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