@extends ('layouts.dashboard')
@section('page_heading','Dispatch Note')
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

	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid )) {
		$cid   = NULL;
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
	if (!isset($pkg_weight)) {
		$pkg_weight = NULL;
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


	if (isset($cdetails)){
		$sif_lot = $cdetails->lot;
		$outt_number = $cdetails->outturn;
		$bskt = $cdetails->bsid;
		$rlno = $cdetails->rl_no;
		$grade = $cdetails->grade;
		$coffee_grower = $cdetails->mark;
	}
	if(isset($grndetails)){
		$grn_number = $grndetails->gr_number;		
		$grnConfirmed = $grndetails->gr_confirmed_by;		
	}
	if(isset($stdetails)){
		$dispatch_kilograms = $stdetails->st_dispatch_net;		
		$delivery_kilograms = $stdetails->st_gross;		
		$tare_kilograms = $stdetails->st_tare;		
		$moisture = $stdetails->st_moisture;		
		$pkg = $stdetails->pkg_id;	
	}

?>

    <div class="col-md-12">
	        <form role="form" method="POST" action="notedispatch">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

			    <h3>General Information</h3>	
			    <div class="row">
		            <div class="form-group col-md-3">
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
		            <div class="form-group col-md-3">
		            	<label>Season</label>
		                <select class="form-control" name="outt_season" onchange="this.form.submit()">
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
			    	<div class="form-group col-md-3">
			    		<label>GDN</label>
                        <input type="text" class="form-control" name="grn_number" style="text-transform:uppercase; " value="{{ $grn_number }}" onfocusout ="this.form.submit()"></input>
	                </div>

			    </div>
			    <div class="row">
   
			    	<div class="form-group col-md-3">
			    		<label>Release/Trucking No.</label>
                        <input type="text" class="form-control" name="grn_number" style="text-transform:uppercase; " value="{{ $grn_number }}" onfocusout ="this.form.submit()"></input>
	                </div>

			    </div>

 				
				<div class="row">	
					<div class="panel panel-default">
						<h3>Stocks</h3>
						<table class="table table-condensed">
						    <thead>
						        <tr>
									<th>
										Lot
									</th>
									<th>
										Outturn
									</th>
									<th>
										Grade
									</th>
									<th>
										Kg
									</th>
									<th>
										Packages
									</th>
									<th>
										Basket
									</th>										
									<th>
										Packaging
									</th>
									<th>
										In GDN
									</th>
									<th>
										Partial
									</th>
						        </tr>
						    </thead>
						</table>

						<div class="div-table-content">
						<table class="table table-condensed table-striped">
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
									$wtotal = 0;
									$lots = array();
									
									if (isset($sale_lots) && count($sale_lots) > 0) {

										foreach ($sale_lots->all() as $value) {
											$total += $value->weight; 
											$count += 1;
											$id = $value->id;
											$war_date = NULL;

											$total_bags += $value->bags;

											$total_pkts += $value->pockets;

											$rw = $value->loc_row_id;

											$clm = $value->loc_column_id;

								    		$total_value = ($value->weight)/50 * ($value->price);

											$total_price += $total_value;

											$pkg = $value->pkg_id;
											if ($value->warrant_date != NULL) {
												$war_date = date("m/d/Y", strtotime($value->warrant_date));
											}
											$lots[] = $value->id;


										
									    	$absolute_difference = abs($value->weight-$value->st_gross);
									    	if ($absolute_difference > 70) {			    		
												echo "<tr style='color:red;'>";								
											} else {
												echo "<tr>";											
											}											
												echo "<td  align='left'>".$value->lot."</td>";
												echo "<td>".$value->outturn."</td>";												
												echo "<td>".$value->grade."</td>";
												echo "<td>".$value->weight."</td>";
												echo "<td>".$value->btc_packages."</td>";
												echo "<td>".$value->code."</td>";

								                echo "<td><select class='form-control' name='package$id'>";
								               		echo "<option></option>";
													if (isset($Packaging)){									
																foreach ($Packaging->all() as $valuepkg) {
																	if ($pkg == $valuepkg->id ) {
																		echo "<option value='$valuepkg->id' selected='selected'>$valuepkg->pkg_name</option>";
																	} else {
																		echo "<option value='$valuepkg->id'>$valuepkg->pkg_name</option>";
																	}
																}
													}
															
								                echo "</select></td>";

								               
												if ($value->gr_number == $grn_number) {
													echo "<td><input name='grn[$id]' type='checkbox' checked='checked' value='1'></td>";
												} else {
													echo "<td><input name='grn[$id]' type='checkbox' value='1'></td>";
												}
												echo "<td><input name='partial$id' type='checkbox' value='1'></td>";

											echo "</tr>";

										}
									}
								?>
								  <tr>
								    <?php
									    echo "<td>".$count." Lots</td>";
									?>
									<td></td>
									<td></td>
									<td></td>
								    <?php
									    echo "<td>".$total." KGs</td>";
									?>
											
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
						    </tbody>
						</table>
					</div>
					<div class="row">
				        <div class="form-group col-md-12">
				       		<button type="submit" name="submitarrivalinfo" class="btn btn-lg btn-success btn-block">Add/Update Dispatch Information</button>
				        </div>
				    </div>
	        	</div>
			</form>

	</div>


</div>	
<script type="text/javascript">
	var jArray= <?php echo json_encode($lots); ?>;

    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gs";
			var str2 = jArray[i];
			var res = str1.concat(str2);
		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableFiltering: true
		            // includeSelectAllOption: true
		        });
   		}
    });

    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gc";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableClickableOptGroups: true,
		            enableCollapsibleOptGroups: true,
		            enableFiltering: true
		            // includeSelectAllOption: true
		        });
   		}

    });


    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gd";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableClickableOptGroups: true,
		            enableCollapsibleOptGroups: true,
		            enableFiltering: true
		            // includeSelectAllOption: true
		        });
   		}

    });


    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#prc";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableFiltering: true
		            // includeSelectAllOption: true
		        });
   		}

    });
</script>

<style type="text/css">
	table {
	    table-layout:fixed;
	}

	.div-table-content {
	  height:600px;
	  overflow-y:auto;
	}

	input[type='checkbox'] {
	    -webkit-appearance:none;
	    width:20px;
	    height:20px;
	    background:white;
	    border-radius:3px;
	    border:2px solid #555;
	    margin-top: 1px;
	    padding: 5px;

	}
	input[type='checkbox']:checked {
	    background: green;
	}
	input[type=radio]:checked ~ .check {
	  border: 5px solid #0DFF92;
	}

	input[type=radio]:checked ~ .check::before{
	  background: #0DFF92;
	}

	input[type=radio]:checked ~ label{
	  color: #0DFF92;
	}


</style>
@stop
