@extends ('layouts.dashboard')
@section('page_heading','Dispatch Information')
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
		if (isset($active_season )) {
			$ot_season = $active_season;
		} else {
			$ot_season = NULL;
		}
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


	if (isset($stock_details)){
		$warehouse_id = $stock_details->warehouse_id;
		$grower_id = $stock_details->cgr_id;
		$item_id = $stock_details->it_id;
		$miller_id = $stock_details->miller_id;
		$miller_by_id = $stock_details->milled_by;
		$material_id = $stock_details->mt_id;
		$moisture = $stock_details->st_moisture;
		$outt_number = $stock_details->st_outturn;
		$basket_id = $stock_details->bs_id;
		$pkg = $stock_details->pkg_id;
		$partial = $stock_details->st_partial_delivery;
		$ot_season = $stock_details->csn_id;	
	}
		

	$gr_confirmed_by = NULL;

	if(isset($grn_details)){
		$warehouse_id = $grn_details->agtid;
		$grn_number = $grn_details->gr_number;	
		$wbtk = $grn_details->wbi_id;		
		$grnConfirmed = $grn_details->gr_confirmed_by;	
		$grower_id = $grn_details->cgr_id;
		$item_id = $grn_details->it_id;
		$miller_id = $grn_details->miller_id;
		$miller_by_id = $grn_details->milled_by;
		$gr_confirmed_by = $grn_details->gr_confirmed_by;

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

	if (!isset($grower_id )) {
		$grower_id   = NULL;
	}

	if (!isset($dispatch_type_id )) {
		$dispatch_type_id   = NULL;
	}

	if (!isset($miller_id )) {
		$miller_id   = NULL;
	}

	if (!isset($material_id )) {
		$material_id   = NULL;
	}


	if (!isset($item_id )) {
		$item_id   = NULL;
	}

	if (!isset($basket_id )) {
		$basket_id   = NULL;
	}

	if (!isset($warehouse_id )) {
		$warehouse_id   = NULL;
	}

?>

    <div class="col-md-14">
	        <form role="form" method="POST" action="movementdispatch">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		        <div class="row">
		            <div class="form-group col-md-12">
		                <label>Warehouse</label>
		                <select class="form-control" id="warehouse" name="warehouse" onchange='fetchWarehouseDetails()'>
		                	<option></option> 
								@if (isset($warehouse))
											@foreach ($warehouse->all() as $value)
											@if ($warehouse_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->agt_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->agt_name}}</option>
											@endif
											@endforeach
										
								@endif
	            		</select>
		            </div>
		        </div>

		        <div class="row">
			    	<div class="form-group col-md-12">
			    		<label>GDN</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="grn_number" name="grn_number" name="grn_number" style="text-transform:uppercase; " placeholder="Search/Enter GDN..."  value="{{ $grn_number}}"></input>

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
		            	<label>Vehicle</label>
		                <select class="form-control" id="weighbridgeTK" name="weighbridgeTK">
		               		<option></option>
							@if (isset($weighbridge_ticket))
										@foreach ($weighbridge_ticket->all() as $value)
										@if ($wbtk ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->wbi_vehicle_plate."( ".$value->wbi_ticket.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->wbi_vehicle_plate." (".$value->wbi_ticket.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
            		</div>
            	</div>

	        	<div class="row">

	        		<div class="form-group col-md-12">
		            	<label>Season</label>
		                <select class="form-control" id="outt_season" name="outt_season">
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
	            </div>

	            <div class="row">
		            <div class="form-group col-md-12">
		                <label>Dispatch Type</label>
		                <select class="form-control searchable" id="dispatch_type" name="dispatch_type" onchange="getDispatch()";>
		                	<option></option> 
							@if (isset($dispatch_type) && count($dispatch_type) > 0)
										@foreach ($dispatch_type->all() as $value)
											@if ($value->id == $dispatch_type_id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->dt_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->dt_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		        </div>

		        <div class="row">
		            <div class="form-group col-md-12" id="agent_type" name="agent_type">
		           <!--      <label>Warehouse To</label>
		                <select class="form-control" id="warehouse" name="warehouse" onchange='fetchWarehouseDetails()'>
		                	<option></option> 
								@if (isset($warehouse))
											@foreach ($warehouse->all() as $value)
											@if ($warehouse_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->agt_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->agt_name}}</option>
											@endif
											@endforeach
										
								@endif
	            		</select> -->
		            </div>
		        </div>


	            <div class="row">
		            <div class="form-group col-md-12">
	        			<label>Outturn-Grade</label>
		                <select class="form-control" id="outt_number_search" name="outt_number_search" placeholder="Select Outturn" data-search="true" onchange="getGrower();">
		                	<option></option> 
							@if (isset($dispatch_queue) && count($dispatch_queue) > 0)
										@foreach ($dispatch_queue as $value)
											@if ($stock_id ==  $value->id)
												<option value="{{ $value->stid }}" selected="selected">{{ $value->st_outturn.'-'.$value->mt_name}}</option>
											@else
												<option value="{{ $value->stid }}">{{ $value->st_outturn.'-'.$value->mt_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>      
		            </div> 
		        </div>

		        <div class="row">
		            <div class="form-group col-md-12">
		                <label>Grower</label>
		                <select class="form-control searchable" id="coffee_grower" name="coffee_grower">
		                	<option></option> 
							@if (isset($growers) && count($growers) > 0)
										@foreach ($growers->all() as $value)
											@if ($grower_id ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cgr_grower." (".$value->cgr_code.")"}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cgr_grower. "(".$value->cgr_code.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>	
		            </div>
	        	</div>

				<div class="row">
					<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
						<h3>Outturn(s) In GDN</h3>
						<table class="table table-striped" id="grn_outturns">
						<thead>
						<tr>	
							<th>
								No.
							</th>
							<th>
								Outturn
							</th>
							<th>
								Material
							</th>
							<th>
								Packages
							</th>
							<th>
								Gross Weight
							</th>
							<th>
								Tare
							</th>
							<th>
								Net Weight
							</th>
							<th>
								Moisture
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

						</tbody>
						</table>
					</div>
				</div>

				<div class="row">
		            <div class="form-group col-md-12">
						<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Dispatch</button>						 
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
							<button type="submit" id="confirmgrnsbtn" name="confirmgrns" class="btn btn-lg btn-danger btn-block" formnovalidate>Confirm GDN</button>	           		
			            </div>	

			        <?php
			        	}
			        ?>

		        </div>
			</form>

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


	$(document).ready(function (){ 
		
	    $(".searchable").searchable({
	        maxListSize: 100,                       // if list size are less than maxListSize, show them all
	        maxMultiMatch: 50,                      // how many matching entries should be displayed
	        exactMatch: false,                      // Exact matching on search
	        wildcards: true,                        // Support for wildcard characters (*, ?)
	        ignoreCase: true,                       // Ignore case sensitivity
	        latency: 200,                           // how many millis to wait until starting search
	        warnMultiMatch: 'top {0} matches ...',  // string to append to a list of entries cut short by maxMultiMatch
	        warnNoMatch: 'no matches ...',          // string to show in the list when no entries match
	        zIndex: 'auto'                          // zIndex for elements generated by this plugin
	    });

	    fetchWarehouseDetails();
	    checkIfReset();
	    refreshOutturnsTable();
	    getMaterials();
	    getOuttturns();

	    var warehouse = $('#warehouse');
	    var coffee_grower = $('#coffee_grower');
	    var select_miller = $('#select_miller');
	    var select_items = $('#select_items');
	    var milled_by = $('#milled_by');
	    var outturn_type = $('#outturn_type');
	    var moisture = $('#moisture');
	    var outt_number = $('#outt_number');
	    var outt_number_search = $('#outt_number_search');
	    var basket = $('#basket');
	    var packaging = $('#packaging');
	    var grn_number = $('#grn_number');

		$('#warehouse option').eq(<?php echo json_encode($warehouse_id); ?>).prop('selected', true);
		coffee_grower.val(<?php echo json_encode($grower_id); ?>).prop('selected', true);
		select_items.val(<?php echo json_encode($item_id); ?>).prop('selected', true);
		select_miller.val(<?php echo json_encode($miller_id); ?>).prop('selected', true);
		outturn_type.val(<?php echo json_encode($material_id); ?>).prop('selected', true);
		basket.val(<?php echo json_encode($basket_id); ?>).prop('selected', true);
		packaging.val(<?php echo json_encode($pkg); ?>).prop('selected', true);
		warehouse.val(<?php echo json_encode($warehouse_id); ?>).prop('selected', true);
		moisture.val(<?php echo json_encode($moisture); ?>);
		outt_number.val(<?php echo json_encode($outt_number); ?>);
		outt_number_search.val(<?php echo json_encode($outt_number); ?>);
		
		grn_number.val(<?php echo json_encode($grn_number); ?>);


		$( "#add_items_delivery" ).on('click', function(){

			var outt_number = $('#outt_number').val();
			var outt_season = $('#outt_season').val();
			var coffee_grower = $('#coffee_grower').val();
			var outturn_type = $('#outturn_type').val();
			var moisture = $('#moisture').val();
			// var basket = $('#basket').val();
			var basket = 0;
			var packaging = null;
	    	var grn_number = $('#grn_number').val();
	    	var warehouse = $('#warehouse').val();



			var url="{{ route('arrivalinformation.addDispatch',['grn_number'=>":grn_number", 'outt_number'=>":outt_number", 'outt_season'=>":outt_season", 'coffee_grower'=>":coffee_grower",'outturn_type'=>":outturn_type",'moisture'=>":moisture", 'basket'=>":basket", 'packaging'=>":packaging", 'warehouse'=>":warehouse"]) }}";

			url = url.replace(':grn_number', grn_number);
			url = url.replace(':outt_number', outt_number);
			url = url.replace(':outt_season', outt_season);
			url = url.replace(':coffee_grower', coffee_grower);
			url = url.replace(':outturn_type', outturn_type);
			url = url.replace(':moisture', moisture);
			url = url.replace(':fetch_weight', fetch_weight);
			url = url.replace(':basket', basket);
			url = url.replace(':packaging', packaging);
			url = url.replace(':warehouse', warehouse);


			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				if (response != null) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
					closeBootBox();
				} else {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
				}

				refreshOutturnsTable();

			}).error(function(error) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
				closeBootBox();
			});  



			event.preventDefault();
		})

		$( "#submitbatch" ).on('click', function(){

			var outt_number = $('#outt_number').val();
			var outt_season = $('#outt_season').val();
			var coffee_grower = $('#coffee_grower').val();
			var warehouse = $('#warehouse').val();
			var pallet_kgs = $('#pallet_kgs').val();

			if (outt_number == '') {
				outt_number = $("#outt_number_select option:selected").text();
				outt_number = outt_number.substr(0, outt_number.indexOf('-')); 
			}


			var grn_number = $('#grn_number').val();
			var outturn_type_batch = $('#outturn_type_batch').val();
			var weigh_scales = $('#weigh_scales').val();
			var packaging = $('#packaging').val();
			var zone = $('#zone').val();
			var packages_batch = $('#packages_batch').val();
			var batch_kilograms = $('#batch_kilograms').val();
			var batch_kilograms_hidden = $('#batch_kilograms_hidden').val();

			if (batch_kilograms_hidden == '') {
				batch_kilograms_hidden = batch_kilograms;
			} else if (batch_kilograms == '') {
				batch_kilograms = batch_kilograms_hidden;
			} 

			batch_kilograms = batch_kilograms-pallet_kgs;
			batch_kilograms_hidden = batch_kilograms_hidden-pallet_kgs;


			var selectedRow = "";
			var selected = $("input[type='radio'][name='row_id']:checked");
			if (selected.length > 0) {
			    selectedRow = selected.val();
			}


			var selectedColumn = "";
			var selected_col = $("input[type='radio'][name='column_id']:checked");
			if (selected_col.length > 0) {
			    selectedColumn = selected_col.val();
			}


			if (packaging == 3) {
				selectedRow = 0;
			    selectedColumn = 0;
			}



			var url="{{ route('arrivalinformation.addBatch',['outt_number'=>":outt_number", 'outt_season'=>":outt_season", 'coffee_grower'=>":coffee_grower",'outturn_type_batch'=>":outturn_type_batch", 'weigh_scales'=>":weigh_scales", 'packaging'=>":packaging", 'zone'=>":zone", 'packages_batch'=>":packages_batch", 'batch_kilograms'=>":batch_kilograms", 'batch_kilograms_hidden'=>":batch_kilograms_hidden", 'selectedRow'=>":selectedRow", 'selectedColumn'=>":selectedColumn", 'warehouse' =>":warehouse", 'grn_number' =>":grn_number", 'pallet_kgs' =>":pallet_kgs"]) }}";

			url = url.replace(':grn_number', grn_number);
			url = url.replace(':outt_number', outt_number);
			url = url.replace(':outt_season', outt_season);
			url = url.replace(':coffee_grower', coffee_grower);
			url = url.replace(':outturn_type_batch', outturn_type_batch);
			url = url.replace(':weigh_scales', weigh_scales);
			url = url.replace(':packaging', packaging);
			url = url.replace(':zone', zone);
			url = url.replace(':packages_batch', packages_batch);
			url = url.replace(':batch_kilograms', batch_kilograms);
			url = url.replace(':batch_kilograms_hidden', batch_kilograms_hidden);
			url = url.replace(':selectedRow', selectedRow);
			url = url.replace(':selectedColumn', selectedColumn);
			url = url.replace(':warehouse', warehouse);
			url = url.replace(':pallet_kgs', pallet_kgs);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
				closeBootBox();
				refreshOutturnsTable();
				populateBatches();

			}).error(function(error) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
				closeBootBox();
			});  



			event.preventDefault();
		})




	});

</script>


<script>
	var autosubmit = <?php echo json_encode($autosubmit); ?>;


	$( "#confirmgrnsbtn" ).click(function(event){
		// event.preventDefault();
		// $("#ratesModalCenter").modal();	
		event.preventDefault();
		postConfirmMovement()
	})
	$( "#confirmgrnsModalbtn" ).click(function(event){
		event.preventDefault();
		postConfirmMovement()	
	})

	function postConfirmMovement(){
		var t=null;
		var cid = <?php echo json_encode($cidmain); ?>;

		var grn_number = $('#grn_number').val();

		var weighbridgeTK = $('#weighbridgeTK').val();
		var outt_season = $('#warehouse').val();


		var service = $('#service').val();
		var team = $('#team').val();

		var service = 1;
		var team = 1;

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
		var url="{{ route('arrivalinformation.getScales',['warehouse'=>":warehouse"]) }}";
		url = url.replace(':warehouse', warehouse);
		return url;

	}

	function fetch_url_locations(warehouse) {
		var url="{{ route('arrivalinformation.getLocations',['warehouse'=>":warehouse"]) }}";
		url = url.replace(':warehouse', warehouse);
		return url;

	}

	function fetch_url_batches() {
		var outt_number = $('#outt_number').val();
		var outt_season = $('#outt_season').val();
		var outturn_type_batch = $('#outturn_type_batch').val();
		if (outt_number == '') {
			outt_number = $("#outt_number_select option:selected").text();
			outt_number = outt_number.substr(0, outt_number.indexOf('-')); 
		}

		var url="{{ route('arrivalinformationgrns.getBatch',['outt_number'=>":outt_number", 'outt_season'=>":outt_season", 'outturn_type_batch'=>":outturn_type_batch"]) }}";
		url = url.replace(':outt_number', outt_number);
		url = url.replace(':outt_season', outt_season);
		url = url.replace(':outturn_type_batch', outturn_type_batch);
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

	function displayBatch(){

		clearChildren(document.getElementById("batch_modal"));
		var warehouse = $('#warehouse').val();
		if (warehouse == '') {
			warehouse = <?php echo json_encode($warehouse_id); ?>;
		}
		var url_scales = fetch_url_scales(warehouse); 
		var url_location = fetch_url_locations(warehouse); 

        $.get(url_scales, function(data, status){
			var scales = jQuery.parseJSON(data);

			var select = $('#weigh_scales');
			select.find('option').remove();   
			select.append('<option></option>');

			$.each(scales,function(key, value) 
			{	
				select.append('<option value=' + value["id"] + '>' + value["ws_equipment_number"] + '</option>');
			});

		});
        $.get(url_location, function(data, status){
			var locations = jQuery.parseJSON(data);
            $("#row_list").empty();
            $("#column_list").empty();

			$.each(locations,function(key, value) 
			{
				if (value["loc_row"] != null) {

                    var rdb_row = "<label style='font-size: 35px;' class='row_label'><input id=row." + value['id'] + "  onclick=RecordCheck(this) type=radio name=row_id  value=" + value['id'] + ">&nbsp&nbsp"+ value['loc_row'] +"</label></br>";

                    $('#row_list').append(rdb_row); 

				}
				
				if (value["loc_column"] != null && (value["loc_column"] != 0)) {

                    var rdb_row = "<label style='font-size: 35px;' ><input id=column." + value['id'] + "  onclick=RecordCheck(this) type=radio name=column_id  value=" + value['id'] + ">&nbsp&nbsp"+ value['loc_column'] +"</label></br>";

                    $('#column_list').append(rdb_row); 
				}
				
			});
      
		});


	}

	function populateBatches(){
		var url_batches = fetch_url_batches(); 
        $.get(url_batches, function(data, status){
			var batch = jQuery.parseJSON(data);
			$("#batch_table tbody").empty();

			$('#batch_table tr').not(':first').not(':last').remove();
			var html = '';
			$.each(batch,function(key, value) 
				{	

	          		html += '<tr><td>' + value["btc_weight"] + 
	                    '</td><td>' + value["btc_tare"] + '</td><td>' + value["btc_net_weight"] + '</td><td>' + value["btc_packages"] + '</td><td>' + value["wr_name"] + '</td><td>' + value["loc_row"] + '</td><td>' + value["loc_column"] + '</td><td>' + value["btc_zone"] + '</td><td><button type="button" onclick="batch_delete(' + value["btcid"] + ')" class="btn btn-success btn-danger">Delete</button></td></tr>';


				});
				$('#batch_table tr').first().after(html);
		});

	}

	function populateFooter(){

        var btn_add = "<button id=add_items class='btn btn-primary btn-block' style='font-size: 35px;'>Add</button></br>";
        $('#footer').append(btn_add); 

        var btn_add = "<button id=add_items class='btn btn-secondary btn-block' style='font-size: 35px;'>Close</Close></br>";
        $('#footer').append(btn_add); 
	}


</script>




<script type="text/javascript">

	

	function getDispatch()
	{
		var dispatch_type = $('#dispatch_type').val();
		var agent_type = $('#agent_type');

		if (dispatch_type != '') {
			var url="{{ route('movementdispatch.getDispatch',['dispatch_type'=>":dispatch_type"]) }}";			
			url = url.replace(':dispatch_type', dispatch_type);


			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				var $label = $("<label>").text(response.agent_name);
				$label.appendTo(agent_type);
				$("<br>").appendTo(agent_type);

				var sel = $('<select id ="outt_number_select" name ="outt_number_select" width="100%" >').appendTo(agent_type);
				sel.append($("<option>").attr('value','').text(''));

				$.each(response.dispatchType,function(key, value) 
				{
					sel.append($("<option>").attr('value',value["dtid"]).text(value["agt_name"]));
				});	

			}).error(function(error) {
				console.log(error)
			});
		}			

		fetchOutturnNumber();

	}


	function getMaterials()
	{
		var item_id = $('#select_items').val();
		var outturn_type = $('#outturn_type');


		if (item_id != '') {
			var url="{{ route('arrivalinformation.getMaterials',['item_id'=>":item_id"]) }}";
			
			url = url.replace(':item_id', item_id);
			outturn_type.find('option').remove(); 

			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				var material = jQuery.parseJSON(response);
				outturn_type.append('<option></option>');

				$.each(material,function(key, value) 
				{	
					outturn_type.append('<option value=' + key + '>&nbsp;&nbsp;&nbsp;' + value + '</option>');

				});		
				getMaterialsInOutturn();

			}).error(function(error) {
				console.log(error)
			});

		}			

		fetchOutturnNumber();

	}


	function getMaterialsInOutturn()
	{
		var item_id = $('#select_items').val();
		var outt_number = $('#outt_number').val();
		var outt_season = $('#outt_season').val();
    	var grn_number = $('#grn_number').val();
    	var warehouse = $('#warehouse').val();
		var outturn_type_batch = $('#outturn_type_batch');
		
		getGrower();
		if (outt_number == '') {
			outt_number = $("#outt_number_select option:selected").text();
			outt_number = outt_number.substr(0, outt_number.indexOf('-')); 
		}

		if (item_id != '') {
			var url="{{ route('arrivalinformation.getMaterialsInOutturn',['item_id'=>":item_id", 'outt_number'=>":outt_number", 'outt_season'=>":outt_season", 'grn_number'=>":grn_number", 'warehouse'=>":warehouse"] ) }}";			
			url = url.replace(':item_id', item_id);
			url = url.replace(':outt_number', outt_number);
			url = url.replace(':outt_season', outt_season);
			url = url.replace(':grn_number', grn_number);
			url = url.replace(':warehouse', warehouse);

			outturn_type_batch.find('option').remove(); 


			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				var material = jQuery.parseJSON(response);
				outturn_type_batch.append('<option></option>');

				$.each(material,function(key, value) 
				{	
					outturn_type_batch.append('<option value=' + key + '>&nbsp;&nbsp;&nbsp;' + value + '</option>');
					

				});			

			}).error(function(error) {
				console.log(error)
			});

		}

	}

	function getGrower()
	{
		var coffee_grower = $('#coffee_grower');		
		var outt_number_select = $('#outt_number_search :selected').val();

		var url="{{ route('movementdispatch.getGrower',['outt_number_select'=>":outt_number_select"] ) }}";			
		url = url.replace(':outt_number_select', outt_number_select);


		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			coffee_grower.val(response.grower).prop('selected', true);
			if (response.to_dispatch !== null) {
				to_dispatch.val(response.to_dispatch).prop('checked', true);
			}
			
		}).error(function(error) {
			console.log(error)
		});


	
		// coffee_grower.val(value["cgr_id"]).prop('selected', true);
	}


	function refreshOutturnsTable()
	{
    	var grn_number = $('#grn_number').val();
    	var warehouse = $('#warehouse').val();

    	if (grn_number == '') {
    		grn_number = <?php echo json_encode($grn_number); ?>;
    	}

    	if (warehouse == '') {
    		warehouse = <?php echo json_encode($warehouse_id); ?>;
    	}

		var url="{{ route('arrivalinformation.getGRNContents',[ 'grn_number'=>":grn_number", 'warehouse'=>":warehouse"] ) }}";		
		url = url.replace(':grn_number', grn_number);
		url = url.replace(':warehouse', warehouse);

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var outturns = jQuery.parseJSON(response);
			$('#grn_outturns tr').empty();

			$('#grn_outturns tr').not(':first').not(':last').remove();
			var html = '';
			var count = 0;
			var packages = 0;
			var gross = 0;
			var tare = 0;
			var net = 0;

			$.each(outturns,function(key, value) 
			{	
				
				count += 1;
				packages = parseInt(packages) + parseInt(value["st_packages"]);
				gross = parseInt(gross) + parseInt(value["st_gross"]);
				tare = parseInt(tare) + parseInt(value["st_tare"]);
				net = parseInt(net) + parseInt(value["st_net_weight"]);

          		html += '<tr><td>' + count + 
                    '</td><td>' + value["st_outturn"] + '</td><td>' + value["mt_name"] + '</td><td>' + value["st_packages"] + '</td><td>' + value["st_gross"] + '</td><td>' + value["st_tare"] + '</td><td>' + value["st_net_weight"] + '</td><td>' + value["st_moisture"] + '</td><td><button type="button" onclick="outturn_delete(' + value["stid"] + ')"  class="btn btn-success btn-danger">Delete</button></td></tr>';

			});		

			if (count > 0) {

	      		html += '<tr><td>' + count + 
	                ' Outturn(s)</td><td></td><td></td><td>' + packages + '</td><td>' + gross + '</td><td>' + tare + '</td><td>' + net + '</td><td></td><td></td></tr>';

			}
			$('#grn_outturns tr').first().after(html);	

		}).error(function(error) {
			console.log(error)
		});




	}

	function outturn_delete(stock_id)
	{
		var url="{{ route('arrivalinformation.outturn_delete',['stock_id'=>":stock_id"] ) }}";		
		url = url.replace(':stock_id', stock_id);

		
		var dialog = bootbox.alert({
			message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
		}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
					
		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			if (response != null) {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
				closeBootBox();
			} else {
				dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
				closeBootBox();
			}

			refreshOutturnsTable();
			displayBatch();
		}).error(function(error) {
			dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
			closeBootBox();
		});  

	}

	function batch_delete(batch_id)
	{
		var url="{{ route('arrivalinformation.batch_delete',['batch_id'=>":batch_id"] ) }}";		
		url = url.replace(':batch_id', batch_id);

		var dialog = bootbox.alert({
			message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
		}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
			refreshOutturnsTable();
			populateBatches();
			closeBootBox();
		}).error(function(error) {
			dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
			closeBootBox();
		});  

	}

	function fetchOutturnNumber()
	{
		var item_id = $('#select_items').val();
		var miller_id = $('#select_miller').val();
		var moisture = $('#moisture').val();
		var input = $('#outt_number');
		if (moisture == ''){
			moisture = 0;
		}

		// if (moisture != ''){
			if (item_id != '' && miller_id != '') {
				var url="{{ route('arrivalinformation.getOutturn',['item_id'=>":item_id", 'miller_id'=>":miller_id", 'moisture'=>":moisture"]) }}";
				url = url.replace(':item_id', item_id);
				url = url.replace(':miller_id', miller_id);
				url = url.replace(':moisture', moisture);

				$.ajax({
				url: url,
				type: 'GET',
				}).success(function(response) {
					var outturn = jQuery.parseJSON(response);
					if (outturn != null) {
						input.val('');
						input.val(outturn);
					}
					
					input.prop('disabled', false);

				}).error(function(error) {
					input.val('');
					// input.prop('disabled', false);
					console.log(error)
				});

			}			
		// }

	}

	function getOuttturns(){
		var weighbridgeTK = $('#weighbridgeTK').val();
		var outt_number_div = $('#outt_number_div');
		var outt_number = $('#outt_number');
		var searchButtonOuttturn = $('#searchButtonOuttturn');
		var deliverydetails = $('#deliverydetails');
		var batchdetails = $('#batchdetails');
		var coffee_grower = $('#coffee_grower');
		var to_dispatch = $('#to_dispatch');
		

		if (weighbridgeTK == 1) {
			outt_number.hide();			
			searchButtonOuttturn.hide();			
			deliverydetails.hide();			
			// batchdetails.hide();			
			var url="{{ route('arrivalinformationgrns.getOuttturns') }}";

			var sel = $('<select id ="outt_number_select" name ="outt_number_select" width="100%" onchange="getMaterialsInOutturn()" >').appendTo(outt_number_div);
			sel.append($("<option>").attr('value','').text(''));

			$.ajax({
			url: url,
			type: 'GET',
			}).success(function(response) {
				var outturns = jQuery.parseJSON(response);
				$.each(outturns,function(key, value) 
				{	
					sel.append($("<option>").attr('value',value["prtsid"]).text(value["outturn"]+'-'+value["prt_name"]));
				});
			}).error(function(error) {
				console.log(error)
			});  

			var miller_id = $('#select_miller');
			var select_items = $('#select_items');			
			miller_id.val('1').prop('selected', true);
			select_items.val('3').prop('selected', true);

		} else {
			outt_number.show();			
			searchButtonOuttturn.show();			
			deliverydetails.show();			
			batchdetails.show();	
			to_dispatch_label.hide();	
			to_dispatch.hide();	
		}
		
	}

	function fetchWarehouseDetails()
	{
		var warehouse = $('#warehouse').val();
		var weigh_scales = $('#weigh_scales');
		var row = $('#row');
		var column = $('#column');
		var grn_number = $('#grn_number');

		if (warehouse == null) {
			warehouse = <?php echo json_encode($warehouse); ?>;
		}

		var url_grns="{{ route('movementdispatch.generateGDN',['warehouse'=>":warehouse"]) }}";
		url_grns = url_grns.replace(':warehouse', warehouse);
		grn_number.val('');

		$.ajax({
		url: url_grns,
		type: 'GET',
		}).success(function(response) {
			var grn = jQuery.parseJSON(response);
			if (<?php echo json_encode($grn_number); ?> == null) {
				grn_number.val(grn);
			}
		}).error(function(error) {
			console.log(error)
		});

	}


	function checkIfReset()
	{
		var weigh_scales = $('#weigh_scales').val();
		var weigh_scale_session = "scale - "+weigh_scales+"";

		var url="{{ route('arrivalinformation.checkScaleSession',['weigh_scale_session'=>":weigh_scale_session"]) }}";
		url = url.replace(':weigh_scale_session', weigh_scale_session);

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var session = jQuery.parseJSON(response);

			if (session == 1) {
				$("#fetch_weight").replaceWith("<button type='button' id='resetweight' name='resetweight' class='btn btn-lg btn-danger btn-block' formnovalidate onclick='resetWeight()'>Reset</button>");
			} else {
				$("#resetweight").replaceWith("<button type='button' id='fetch_weight' name='fetchweight' class='btn btn-lg btn-success btn-block' onclick='fetchWeight()'>Fetch</button>");
			}

		}).error(function(error) {
			console.log(error)
		});  


	}


	function fetchWeight()
	{
		var weigh_scales = $('#weigh_scales').val();
		var batch_kilograms = $('#batch_kilograms');
		var batch_kilograms_hidden = $('#batch_kilograms_hidden');
		var submitbatch = $('#submitbatch');

		batch_kilograms.val('');

		var url="{{ route('arrivalinformation.getWeight',['weigh_scales'=>":weigh_scales"]) }}";
		url = url.replace(':weigh_scales', weigh_scales);

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var weight = jQuery.parseJSON(response);
			if (weight != 'error') {
				batch_kilograms.val(weight);
				batch_kilograms_hidden.val(weight);
				checkIfReset();
				submitbatch.prop('disabled', false);
			}
		}).error(function(error) {
			console.log(error)
		});  

	}

	function resetWeight()
	{
		var weigh_scales = $('#weigh_scales').val();
		var batch_kilograms = $('#batch_kilograms');
		var batch_kilograms_hidden = $('#batch_kilograms_hidden');
		var submitbatch = $('#submitbatch');

		var url="{{ route('arrivalinformation.reSetWeight',['weigh_scales'=>":weigh_scales"]) }}";
		url = url.replace(':weigh_scales', weigh_scales);

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var weight = jQuery.parseJSON(response);
			if (weight != 'error') {
				batch_kilograms.val(weight);
				batch_kilograms_hidden.val(weight);
				checkIfReset();
				submitbatch.prop('disabled', true);
			}
		}).error(function(error) {
			console.log(error)
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