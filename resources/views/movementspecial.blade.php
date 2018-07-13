@extends ('layouts.dashboard')
@section('page_heading','Movement Instructions All')
@section('section')
<div class="col-sm-14 col-md-offset-0">
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
	if (!isset($reasonForMovement )) {
		$reasonForMovement = NULL;
	}
	if (!isset($ref_no )) {
		$ref_no = NULL;
	}
	if (!isset($movementTypeID )) {
		$movementTypeID = NULL;
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

	if (isset($instructedRefDetails)) {
		$ref_no = $instructedRefDetails->ilf_number;
		$movementTypeID = $instructedRefDetails->mit_id;
		$reasonForMovement = $instructedRefDetails->ilf_reason;
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
    <div class="col-md-5">
	        <form role="form" method="POST" action="movementspecial" id="movementspecialform">

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
		                <select class="form-control" id="warehouse" name="warehouse" onchange="this.form.submit()">
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
	        			<label>Instruction Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{$ref_no }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchInstruction" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	

		           
		        </div>
	            <div class="row">
		           
		            <div class="form-group col-md-4">
		                <label >Movement Type</label>
		                <select class="form-control" name="MovementType" >
		                	<option></option> 
							@if (isset($movementInstructionType) && count($movementInstructionType) > 0)
										@foreach ($movementInstructionType->all() as $value)
											@if ($movementTypeID ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->mit_name }}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->mit_name}}</option>
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
	        	<div class="row">
					<div class="form-group col-md-12">
						<label>Reason for Movement</label>
						<textarea class="form-control" rows="3" name="reasonForMovement" value="{{ old('reasonForMovement').$reasonForMovement  }}"><?php echo htmlspecialchars($reasonForMovement); ?></textarea>
					</div>
	            </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="instructmovement" class="btn btn-lg btn-success btn-block">Instruct Movement</button>
		            </div>
		        </div>
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirminstruction" id="confirmmovementspecialbtn" class="btn btn-lg btn-danger btn-block">Confirm Instruction</button>
		            </div>
		        </div>			        
		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printMovementInstruction" class="btn btn-lg btn-success btn-block">Print Movement Instruction</button>
		            </div>
		        </div>	

	</div>

	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
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
						Code
					</th>					
					<th>
						Pckg
					</th>
					<th>
						Location
					</th>
					<th>
						New Zone
					</th>
					<th>
						Withdraw
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
						$id = 0;

						if (isset($stlocdetails)) {

							foreach ($stlocdetails->all() as $value) {
								$total += $value->btc_weight; 
								$count += 1;
								$id = $value->stid;
								$btid = $value->id;

								$total_bags += $value->btc_bags;

								$total_pkts += $value->btc_pockets;							
								if ($value->btc_instructed_by == NULL) {

									echo "<tr>";
										echo "<td><input name='batchlocation[]' type='checkbox' value='$btid'></td>";
										echo "<td>".$value->name."</td>";
										echo "<td>".$value->grade."</td>";
										echo "<td><input size = '5' style='text-align:center;' type='text' name='cweight$btid' id='cweight$btid' value='".$value->btc_weight."'></td>";
										echo "<td>".$value->btc_bags."</td>";
										echo "<td>".$value->btc_pockets."</td>";
										echo "<td>".$value->code."</td>";
										echo "<td>".$value->pkg_name."</td>";
										echo "<td>".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
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
										echo "<td><input name='tobewithdrawn[]' type='checkbox' value='$btid' disabled></td>";
									echo "</tr>";									

								} else if(($value->btc_instructed_by != NULL)) {

									echo "<tr style='color:#cacdd1;'>";
										echo "<td><input type='checkbox' value='$id' checked='checked' disabled></td>";
										echo "<td>".$value->name."</td>";
										echo "<td>".$value->grade."</td>";
										echo "<td><input size = '5' style='text-align:center;' type='text'  value='".$value->btc_weight."'></td>";
										echo "<td>".$value->btc_bags."</td>";
										echo "<td>".$value->btc_pockets."</td>";
										echo "<td>".$value->code."</td>";
										echo "<td>".$value->pkg_name."</td>";
										echo "<td>".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
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
										echo "<td><input name='tobewithdrawn[]' type='checkbox' value='$btid'></td>";
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
						<td></td>						
						<td></td>						
						<td></td>						
					  </tr>
				</tbody>
				</table>
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
        <a href='' class='btn btn-danger confirm-delete' id="confirmmovementspecialModalbtn">Confirm</a>
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
$('#confirmmovementspecialbtn').prop('disabled', true);
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		$('#confirmmovementspecialbtn').prop('disabled', false);
		if(autosubmit){
			$( "#movementspecialform" ).submit();
		}
	})

	$( "#confirmmovementspecialbtn" ).click(function(event){
		event.preventDefault();
		$("#ratesModalCenter").modal();	
	})
	$( "#confirmmovementspecialModalbtn" ).click(function(event){
		event.preventDefault();
		postConfirmMovement()	
	})

	function postConfirmMovement(){
		var t=null;
		var ref = $('#ref_no').val();
		var wrfrom = $('#warehouse').val();
		// var packages = $('#packages').val();
		var service = $('#service').val();
		var team = $('#team').val();

		console.log("post confirm")
				if(ref==''){
					bootbox.alert("Please select instruction number")
				return
				}
				if(wrfrom==''){
					bootbox.alert("Please select warehouse")
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
				var confirmurl = '{{ route('movementspecial.confirmmovementspecialwithrate',['ref'=>":ref",'wrfrom'=>":wrfrom",'service'=>":service",'team'=>":team"]) }}';

				confirmurl = confirmurl.replace(':ref', ref);
				confirmurl = confirmurl.replace(':wrfrom', wrfrom);
				//confirmurl = confirmurl.replace(':packages', packages);
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
 $( "#printmovementrate" ).click(function(event){
		event.preventDefault();
	printRate()	
	})

function printRate(){
	var t=null;
		var ref = $('#ref_no').val();
		var wrfrom = $('#warehouse').val();
		// var packages = $('#packages').val();
		var service = $('#service').val();
		var team = $('#team').val();

		console.log("post confirm")
				if(ref==''){
					bootbox.alert("Please select instruction number")
				return
				}
				if(wrfrom==''){
					bootbox.alert("Please select warehouse")
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
				var printurl = '{{ route('movementspecial.printmovementspecialwithrate',['ref'=>":ref",'wrfrom'=>":wrfrom",'service'=>":service",'team'=>":team"]) }}';

				printurl = printurl.replace(':ref', ref);
				printurl = printurl.replace(':wrfrom', wrfrom);
				//confirmurl = confirmurl.replace(':packages', packages);
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