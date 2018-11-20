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
    <div class="col-md-14">
	        <form role="form" method="POST" action="movementindividual" id="movementindividualform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-12">
		                <label>Country</label>
		                <select class="form-control" id="country" name="country"  onchange="this.form.submit()">
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
		        </div>

		        <div class="row">

		            <div class="form-group col-md-12">
		                <label>Warehouse</label>
		                <select class="form-control" id="warehouse" name="warehouse" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($warehouse))
										@foreach ($warehouse->all() as $value)
										@if ($wrhse ==  $value->id)
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
	        			<label>Instruction Number</label>
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{$ref_no }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" id="searchInstruction" name="searchInstruction" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	

	            </div>

	            <div class="row">
		           
		            <div class="form-group col-md-12">
		                <label >Movement Type</label>
		                <select class="form-control" id="MovementType" name="MovementType" >
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

		        <div class="row">

		            <div class="form-group col-md-6">
		                <label >Row</label>
		                <select class="form-control" id="new_row" name="new_row">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_row != NULL)
													<option value="{{ $value->id }}">{{ $value->loc_row}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>
		            <div class="form-group col-md-6">
		                <label >Column</label>
		                <select class="form-control" id="new_column" name="new_column">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_column != NULL)
													<option value="{{ $value->id }}">{{ $value->loc_column}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>	


		        </div>
	   
		        
				<div class="row">
		            <div class="form-group col-md-4">
		            	<label> </label> </br>
						<button type="submit" name="searchButton" class="btn btn-warning" data-toggle='modal' data-target='#menuModalShowItems' onclick='displayStockItems(event, this)' data-dprtname='{$value->dprt_name}'>
							Search<i class="fa fa-search"></i>
						</button>
					</div>

				</div>

	        	<div class="row">
					<div class="form-group col-md-12">
						<label>Reason for Movement</label>
						<textarea class="form-control" rows="3" id="reasonForMovement" name="reasonForMovement" value="{{ old('reasonForMovement').$reasonForMovement  }}"><?php echo htmlspecialchars($reasonForMovement); ?></textarea>
					</div>
	            </div>
				<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
								<h3>Outturn(s) in instruction</h3>
								<table class="table table-striped">
								<thead>
								<tr>			
									<th>
										Name
									</th>		
									<th>
										Material
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
											

												echo "<tr>";
													echo "<td>".$value->st_outturn."</td>";
													echo "<td>".$value->mt_name."</td>";
													echo "<td><input size = '5' style='text-align:center;' type='text'  value='".$value->btc_weight."' disabled></td>";
													echo "<td>".$value->btc_bags."</td>";
													echo "<td>".$value->btc_pockets."</td>";
													echo "<td>".$value->code."</td>";
													echo "<td>".$value->pkg_name."</td>";
													echo "<td>".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
													echo "<td><input name='tobewithdrawn[]' type='checkbox' value='$btid'></td>";
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
					</div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="instructmovement" id="instructmovement" class="btn btn-lg btn-success btn-block">Instruct Movement</button>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirminstruction" id="confirminstruction" class="btn btn-lg btn-danger btn-block">Confirm Instruction</button>
		            </div>
		        </div>			        
		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" id="printMovementInstruction"  name="printMovementInstruction" class="btn btn-lg btn-success btn-block">Print Movement Instruction</button>
		            </div>
		        </div>	
	</div>

</form>



	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModalShowItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Outturns In Selected Location</h4>
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id="items_div"  style="font-size: 35px;">
	      	<div>
	        	
			</div>		
	      </div>
	      <div class="modal-footer">
	        <button type="button" name="add_items" id="add_items" class="btn btn-primary btn-block" style="font-size: 35px;">Add</button>
	        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

@stop


@push('scripts')

<script type="text/javascript">

	function fetch_url() {

		var country_id = document.getElementById("country").value;

		var warehouse = document.getElementById("warehouse").value;

		var new_row =document.getElementById("new_row").value.toString();

		var new_column = document.getElementById("new_column").value;

		var ref_no = document.getElementById("ref_no").value;


		if (country_id == "") {

			country_id = 0;

		}
		if (warehouse == "") {

			warehouse = 0;

		}
		if (new_row == "") {

			new_row = 0;

		}
		if (new_column == "") {

			new_column = 0;

		}
		if (ref_no == "") {

			ref_no = 0;

		}

		var url = '{{ route('movementindividual.getLots',['country_id'=>":id",'warehouse'=>":warehouse",'new_row'=>":new_row",'new_column'=>":new_column",'ref_no'=>":ref_no" ]) }}';

		url = url.replace(':id', country_id);

		url = url.replace(':warehouse', warehouse);

		url = url.replace(':new_row', new_row);

		url = url.replace(':new_column', new_column);

		url = url.replace(':ref_no', ref_no);

		return (url);

	}

	function closeBootBox () {

		var $timeout = <?php echo $timeout; ?>;

		window.setTimeout(function(){
		    bootbox.hideAll();
		}, $timeout);		

	}


	function clearChildren(element) {

	   $(element).empty();
	
	}

	function displayStockItems(event, value){

		clearChildren(document.getElementById("items_div"));

		var url = fetch_url();

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);

			var news = document.getElementsByClassName("modal-body")[0];	

			for(var i = 0; i < obj.length; i++) {

			    var space = document.createElement("p");

			    space.innerHTML = null ;


			    var newCheckBox = document.createElement('input');

			    newCheckBox.type = 'checkbox';

			    newCheckBox.id = 'movement' + obj[i].stid;

			    newCheckBox.name = 'movement';

			    newCheckBox.value = obj[i].id;

			    news.appendChild(newCheckBox);


			    if (obj[i].insloc_ref != null) {

			    	document.getElementById('movement' + obj[i].stid).checked = true;

			    	document.getElementById('movement' + obj[i].stid).setAttribute("disabled", true);

			    }


			    var labelZones = document.createElement("label");

			    labelZones.innerHTML = "&nbsp;<strong>Zone:</strong>&nbsp;" +obj[i].btc_zone;

			    news.appendChild(labelZones);


			    var labelOutt = document.createElement("label");

			    labelOutt.innerHTML = "&nbsp;<strong>Outturn:</strong>&nbsp;" +obj[i].st_outturn;

			    news.appendChild(labelOutt);


			    var labelGrade = document.createElement("label");

			    labelGrade.innerHTML = "&nbsp;<strong>Material:</strong>&nbsp;" +obj[i].mt_name;

			    news.appendChild(labelGrade);


			    var packages = document.createElement("label");

			    packages.innerHTML = "&nbsp;<strong>Packages:</strong>&nbsp;" +obj[i].btc_packages;

			    news.appendChild(packages);



			    var weight = document.createElement("label");

			    weight.innerHTML = "&nbsp;Weight:&nbsp;" ;	    


			    var newInput = document.createElement('input');

			    newInput.type = 'text';

			    newInput.id = 'weight' + obj[i].id;

			    newInput.name = 'weight'+ obj[i].id;

			    newInput.value = obj[i].btc_net_weight;



			    var labelCode = document.createElement("p");

			    labelCode.innerHTML = "&nbsp;<strong>Code:</strong>&nbsp;" +obj[i].code;


			    news.appendChild(labelCode);

			    news.appendChild(weight);

			    news.appendChild(newInput);

			    news.appendChild(space);



			    var count = obj[i].btc_net_weight/2000;

			  //   for (var l = 0; l < count; l++) {

					// var img = document.createElement("img");

					// img.id = 'image' + i + l;
					 
					// img.src = "bag.png";				
					 
					// news.appendChild(img);

					// news.appendChild(space);


					// var theImg = document.getElementById('image' + i + l);

					// theImg.height = 150;
					
					// theImg.width = 150;
			    		    	
    	// 	    }		    




			    
			}


        });

		event.preventDefault();

	}

	$(document).ready(function() {	

		$('#add_items').on('click', function(){


		    movement = $('input[name=movement]:checked').map(function() {

    			return this.value + '-' +document.getElementById("weight"+this.value).value;;

		    }).get();

		    movement = JSON.stringify(movement);

			var ref_no = document.getElementById("ref_no").value;

			var movementType = document.getElementById("MovementType").value;

			var reasonForMovement = document.getElementById("reasonForMovement").value;

			


			if (movement == "") {

				movement = 0;

			}

			if (ref_no == "") {

				ref_no = 0;

			}

			if (movementType == "") {

				movementType = 0;

			}

			if (reasonForMovement == "") {

				reasonForMovement = 0;

			}

			var url = '{{ route('movementindividual.addLots',['movement'=>":movement" , 'ref_no'=>":ref_no", 'movementType'=>":movementType", 'reasonForMovement'=>":reasonForMovement"]) }}';

			url = url.replace(':movement', movement);

			url = url.replace(':ref_no', ref_no);

			url = url.replace(':movementType', movementType);
			
			url = url.replace(':reasonForMovement', reasonForMovement);

			alert(url);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    		
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayStockItems(event, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayStockItems(event, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});



		});

	});


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
	
</style>
@endpush