@extends ('layouts.dashboard')
@section('page_heading','Clean Bulk Results')
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
	if (!isset($otttid)) {
		$otttid = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}
	if (!isset($ref_no)) {
		$ref_no = NULL;
	}
	if (!isset($other_instructions)) {
		$other_instructions = NULL;
	}
	if (!isset($prc)) {
		$prc = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (old('country') != NULL) {
		$cid = old('country');
	}
	
	if (old('outturn') != NULL) {
		$otttid = old('outturn');
	}
	$otttid = $st_id_selected;
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
	
	if (!isset($rtid )) {
		$rtid = NULL;
	}
	
	if (!isset($rfid)) {
		$rfid = NULL;
	}
	$screen = 0;
	$process = 0;
	$weight = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$ot_season = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;
	$packages = NULL;

	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		// print_r($cdetails."lewis");
	}
	if (isset($results_view)) {
		$batch_kilograms = $results_view->prts_weight;
		$packages = $results_view->prts_packages;
		$rw = $results_view->loc_row; 
		$clm = $results_view->loc_column;
		$zone = $results_view->btc_zone; 
		$grade = $results_view->cgrad_id;
		$bskt = $results_view->bs_id;
	}

	if (isset($pdetails)){
		$sale_cb_id = $pdetails->cb_id;
		$price = $pdetails->prc_price;
		$cprice = $pdetails->prc_confirmed_price;
		$bskt = $pdetails->bs_id;

		$sst = $pdetails->sst_id;
		$warrant_no = $pdetails->prc_warrant_no;
		$warrant_weight = $pdetails->prc_warrant_weight;
		$comments = $pdetails->prc_purchase_comments;
	}
	$BULKING_PROCESS = 4;
	//old('outt_number'). $outt_number }}
    
	
?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="/cleanbulkresults" id="processingresultsform">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
            	<h3  data-toggle="collapse" data-target="#green">Instructions </h3>
            	 <!-- <label class="glyphicon glyphicon-menu-down"></label></h3>   -->
            	<!-- <div id='green' class='collapse in' > -->		
	        	<div class="row">
		            <div class="form-group col-md-4">
		                <label>Country</label>
		                <select class="form-control" name="country"  onchange="this.form.submit()" disabled>
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
	        			<label>Instruction Number</label>
		                <select class="form-control" name="ref_no" id="ref_no" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($refno) && count($refno) > 0)
										@foreach ($refno->all() as $value)
											@if ($rfid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->pr_instruction_number }}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->pr_instruction_number }}</option>
											@endif

										@endforeach
									
							@endif
		                </select>	
	                </div>	

	        	</div>

							<h3>Outturns</h3>
	
	<div class="row">
			<div class="form-group col-md-4">
				<label>Outturns</label>
				<select class="form-control" name="outturn" onchange="this.form.submit()">
					<option></option> 
					@if (isset($StockView) && count($StockView) > 0)
								@foreach ($StockView->all() as $value)
									@if ($otttid ==  $value->id)
										<option value="{{ $value->id }}" selected="selected">{{ $value->outturn}}</option>
									@else
										<option value="{{ $value->id }}">{{ $value->outturn}}</option>
									@endif

								@endforeach
							
					@endif
				</select>		
			</div>
	
	

					
	</div>	

 				<h3>Results</h3>
	
	        	<div class="row">
	 		            <div class="form-group col-md-4">
			                <label>Results Type</label>
			                <select class="form-control" name="results_type" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($resultsType) && count($resultsType) > 0)
											@foreach ($resultsType->all() as $value)
												@if ($rtid ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->prt_name}}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->prt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>		
			            </div>
	        	
	            <?php 
	            	if ($prc != $BULKING_PROCESS) {
		            			?>
<!-- 	 		            <div class="form-group col-md-4">
			                <label>Results Type</label>
			                <select class="form-control" name="results_type" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($resultsType) && count($resultsType) > 0)
											@foreach ($resultsType->all() as $value)
												@if ($rtid ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->prt_name}}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->prt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>		
			            </div> -->

		            			<?php

		            	} else {
		            		?>
		            		<!-- <input type="hidden" name="results_type" value="1"> -->
		            		<?php

		            	}
		            ?>

		            <div class="form-group col-md-4">
		                <label>Bags</label>
		                <input class="form-control"  id="batch_bags"  name="batch_bags" oninput="myFunction()" value="{{ old('batch_bags')  }}">
		            </div>

		            <div class="form-group col-md-4">
		                <label >Pockets</label>
		                <input class="form-control"  id="pockets"  name="pockets" oninput="myFunction()" value="{{ old('pockets')  }}">
		            </div>	            
	            </div>	

	

				<h3>New Location</h3>
		        <div class="row">
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
		                <?php //echo $location;?>
		                <select class="form-control" name="row">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_row != NULL)
													@if ($rw ==  $value->id)
														<option value="{{ $value->loc_row }}" selected="selected">{{ $value->loc_row}}</option>
													@else
														<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
													@endif
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Column</label>
		                <select class="form-control" name="column">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_column != NULL)
													@if ($clm ==  $value->id)
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
	            <div class="row">
		            <div class="form-group col-md-4">
		                <label >Zone</label>
		                <input class="form-control"  id="zone"  name="zone" oninput="myFunction()" value="{{ old('zone').$zone  }}">
		            </div>	




		        </div>
				<?php
					if (isset($prdetails)){
						if ($prdetails->pr_confirmed_by != NULL) {
							?>
								<div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block" disabled>Add/Update Processing Results</button>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="confirmresults" class="btn btn-lg btn-danger btn-block" disabled>Confirmed!!</button>
						            </div>
						        </div>
							<?php

						} else {
							if (isset($Warehouse)){
								?>
									<div class="row">
							            <div class="form-group col-md-12">
							           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block">Add/Update Processing Results</button>
							            </div>
							        </div>
								<?php 
							}
						}
					}
				?>


		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printresults" class="btn btn-lg btn-success btn-block">Print Processing Results</button>
		            </div>
		        </div>

				<!-- <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirminstruction" id="generatechargesbtn" class="btn btn-lg btn-danger btn-block">Generate Charges</button>
		            </div>
		        </div>		 -->
			

	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Coffee In Instruction</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					
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
						Kilos
					</th>
					<th>
						Bags
					</th>
					<th>
						Pkts
					</th>
					<th>
						Quality
					</th>
					<th>
						Location
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
						
						if (isset($StockView)) {
							foreach ($StockView->all() as $value) {
								$total += $value->weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

					    		$total_value = ($value->weight)/50 * ($value->price);

								$total_price += $total_value;					
					

								echo "<tr>";

									// echo "<td>".$value->sale."</td>";
									// echo "<td>".$value->lot."</td>";
									echo "<td>".$value->outturn."</td>";
									echo "<td>".$value->mark."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->weight."</td>";
									echo "<td>".$value->bags."</td>";
									echo "<td>".$value->pockets."</td>";						
									echo "<td>".$value->quality."(".$value->code.")"."</td>";		
									echo "<td width='12%'>".$value->location."</td>";	
									echo "<td><input type='hidden' class='form-control' name='totalkilos' size='5' value='$total'></td>";
									echo "<td><input type='hidden' class='form-control' name='totalvalue' size='5' value='$total_value'></td>";	

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
						
					  </tr>
				</tbody>
				</table>





	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Instruction Results</h3>
				<table class="table table-striped">
				<thead>
				<tr>
					<th>
						Outturn
					</th>				  
					<th>
						Result Type
					</th>
					<th>
						Weight
					</th>
					<th>
						Packages
					</th>
					<th>
						Bags
					</th>
					<th>
						Pockets
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
				  </tr>
				</thead>
				<tbody>



					<?php
						$total_packages = 0;
						$total_pkts = 0;
						$count = 0;
						$count_green = 0;
						$count_process = 0;
						$count_screen = 0;
						$count_cup = 0;
						$total_price = 0;
						$total = 0;
						
						if (isset($ProcessResults) && count($ProcessResults) > 0) {
							
							foreach ($ProcessResults->all() as $value) {
								$count += 1;
								$id = $value->id;

								$total += $value->weight_out; 

								$total_packages += $value->packages_out;						
								

								echo "<tr>";

								echo "<td>".$value->outturn."</td>";					

									echo "<td>".$value->result_type."</td>";								
									echo "<td>".$value->weight_out."</td>";
									echo "<td>".$value->packages_out."</td>";
									echo "<td>".$value->bags."</td>";
									echo "<td>".$value->pockets."</td>";
									echo "<td>".$value->wr_name."</td>";
									echo "<td>".$value->loc_row."</td>";
									echo "<td>".$value->loc_column."</td>";
									echo "<td>".$value->btc_zone."</td>";
						

								echo "</tr>";

							}
						}
					?>
					  <tr>
					  <td></td>
					  	<!-- <td>Total:</td> -->
					    <?php
						    echo "<td>".$count." Results</td>";
						?>
					    <?php
						    echo "<td>".$total." KGs</td>";					
						    echo "<td>".$total_packages." Pkgs</td>";
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
        
	  	<input type="hidden" name="teamcount" id="teamcount" value="1">
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

						<hr style="height:2px;border:none;color:#333;background-color:#333;">
						<div class="form-group">
			                <label>Team</label>
			                <select class="form-control" name="team_0" id="team_0">
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
						<div class="form-group">
		                <label >Description</label>
		                <input class="form-control"  id="description_0"  name="description_0" value="{{ old('description_0')}}">
		            	</div>

						<hr style="height:2px;border:none;color:#333;background-color:#333;">

						<div class="addteamsdiv">
						</div>
				
			</div>
			<div class="modal-footer">

			<div class="row">
				<div class="col-sm-6 text-left">
					<button type="button" id="addteambtn" class="btn btn-primary"> Add Team</button>
					<button type="button" id="rmteambtn" class="btn btn-dark"> Remove Team</button>
				</div>
				<div class="col-sm-6 text-right">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<a href='' class='btn btn-danger confirm-delete' id="confirmProcessRateModalbtn">Confirm</a>
					<button type="button" id="printmovementrate" class="btn btn-warning" data-dismiss="modal">Print</button>
				</div>
			</div>

				
			</div>
			</div>
		</div>
		</div>
		</div>

	</form>
</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
var teams = null;

var teamcount = 0;
teams = JSON.parse(teams)
	$(document).ready(function (){ 
		// if(autosubmit){
		// 	$( "#processingresultsform" ).submit();
		// }
	})

	$( "#generatechargesbtn" ).click(function(event){
		event.preventDefault();
		$("#ratesModalCenter").modal();
		var teamcount = 0;
		$('#teamcount').val(teamcount)	
	})
	$( "#confirmProcessRateModalbtn" ).click(function(event){
		event.preventDefault();
		postConfirmMovement()	
	})

	$( "#addteambtn" ).click(function(event){
		event.preventDefault();
		var teamcount = $('#teamcount').val();
		console.log(teamcount)
		teamcount=parseInt(teamcount)+1
		$('#teamcount').val(teamcount)
		var sel_head = '<div class="form-group">'+
			                '<label>Team</label>'+
			                '<select class="form-control" name="team_'+teamcount+'" id="team_'+teamcount+'">'+
							'<option></option>';
		var sel_body = '';
		$.each( teams, function( key, value ) {
			sel_body = sel_body+'<option value="'+value.id+'">'+value.tms_grpname+'</option>';
			});         	 
		var sel_end = '</select>';

		var teamsel = sel_head+sel_body+sel_end	
						
			               
		var desc='<div class="form-group">'+
		                '<label >Description</label>'+
		                '<input class="form-control"  id="description_'+teamcount+'"  name="description_'+teamcount+'" }">'+
		            	'</div>'+

						'<hr style="height:2px;border:none;color:#333;background-color:#333;">';
		
		var content = teamsel + desc
		$(".addteamsdiv").append('<div id="teamdiv_'+teamcount+'">'+content+'</div>');
		
	})

	$( "#rmteambtn" ).click(function(event){
		event.preventDefault();
		var teamcount = $('#teamcount').val();
		if(teamcount!=0){
		$( "#teamdiv_"+teamcount).remove();
		teamcount--;
		}else{
			bootbox.alert('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">At least one team is required</i></div>')
		}
		$('#teamcount').val(teamcount)
		console.log(teamcount)
	})

	function postConfirmMovement(){
		var t=null;
		var ref = $('#ref_no').val();
		var process_type = $('#process_type').val();
		var service = $('#service').val();
		var team = $('#team').val();
		var teamcount = $('#teamcount').val();
		console.log(teamcount)
		var teamsdetail = []
		for(i=0; i<=teamcount; i++){
			var team =  $('#team_'+i).val()
			var desc =  $('#description_'+i).val()

			if(team==''){
					bootbox.alert("Please select team")
				return
				}
				if(desc==''){
					bootbox.alert("Please enter description")
				return
				}

			if(teamsdetail==[]){
				teamsdetail=[{ team: team, description: desc }]
			}else{
				teamsdetail.push({ team: team, description: desc })
			}
		}
		
				if(ref==''){
					bootbox.alert("Please select instruction number")
				return
				}
				if(process_type==''){
					bootbox.alert("Please select process type")
				return
				}
				if(service==''){
					bootbox.alert("Please select service")
				return
				}
				
				var confirmurl = '{{ route('processrates.calculateprocessresultsrate',['ref'=>":ref",'process_type'=>":process_type",'service'=>":service",'team'=>":team"]) }}';

				confirmurl = confirmurl.replace(':ref', ref);
				confirmurl = confirmurl.replace(':process_type', process_type);
				confirmurl = confirmurl.replace(':service', service);
				confirmurl = confirmurl.replace(':team', encodeURIComponent(JSON.stringify({ref_no: ref, process_type : process_type, service: service, teamsdetail: teamsdetail})));
				console.log(confirmurl)
				console.log(teamsdetail)
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
				var printurl = '{{ route('processrates.printprocesswithrate',['ref'=>":ref",'service'=>":service",'team'=>":team"]) }}';

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