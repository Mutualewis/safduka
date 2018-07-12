@extends ('layouts.dashboard')
@section('page_heading','Warrants')
@section('section')
<div class="col-sm-12 col-md-offset-0">
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
	if (!isset($csn_season)) {
		$csn_season  = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}	
	if (!isset($basket)) {
		$basket  = NULL;
	}
	if (!isset($hedge)) {
		$hedge  = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	// if (!isset($warehouse )) {
	// 	$warehouse = NULL;
	// }

	
	$screen = 0;
	$process = 0;
	$weight = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;

?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="warrants" id="warrantsform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">




				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
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

			            <div class="form-group col-md-3" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" name="sale_season"  onchange="this.form.submit()">
			               		<option>Sale Season</option>
								@if (count($Season) > 0)
											@foreach ($Season->all() as $season)
											@if ($csn_season ==  $season->id)
												<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
											@else
												<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>
		           		<div class="form-group col-md-3">
			                <label>Sale</label>
			                <select class="form-control" name="sale" onchange="this.form.submit()">
			                	<option>Sale No.</option> 
								@if (isset($sale) && count($sale) > 0)
											@foreach ($sale->all() as $sales)
												@if ($saleid ==  $sales->id)
													<option value="{{ $sales->id }}" selected="selected">{{ $sales->sl_no}}</option>
												@else
													<option value="{{ $sales->id }}">{{ $sales->sl_no}}</option>
												@endif

											@endforeach
								@else
									<option>No Sale Found</option>		
								@endif
			                </select>		
			            </div>

			        </div>

		        	<div class="row" >

			            <div class="form-group col-md-3">
			               	<label>Buyer</label>
			                <select class="form-control" name="coffee_buyer" onchange="this.form.submit()">
			               		<option></option>
								@if (isset($buyer) && count($buyer) > 0)										
											@foreach ($buyer->all() as $buyers)
											@if ($sale_cb_id ==  $buyers->id)
												<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->cb_name}}</option>
											@else
												<option value="{{ $buyers->id }}">{{ $buyers->cb_name}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>	
			            <div class="form-group col-md-3">
			                <label>Seller(Optional)</label>
			                <select class="form-control" name="seller" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($seller) && count($seller) > 0)
											@foreach ($seller->all() as $sellers)
												@if ($slr ==  $sellers->id)
													<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
												@else
													<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>
			            </div>
			        </div>

	        	


	</div>
	<div class="row">		
	<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 600px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Catalogue (Those in red do not have warrants)</h3>
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
						Kg
					</th>
					<th>
						Bags
					</th>	
					<th>
						Pkts
					</th>
					<th>
						W/H
					</th>
					<th>
						Serial(Required)
					</th>
					<th>
						Date
					</th>	
					<th>
						W.Weight
					</th>										
					<th>
						Comments
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
						$wtotal = 0;
						// $wrhse = NULL;
						$lots = array();
						
						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $sale_lots) {
									// print_r($season->acat_id);
								$total += $sale_lots->weight; 
								$count += 1;
								$id = $sale_lots->id;
								$war_date = NULL;

								$total_bags += $sale_lots->bags;

								$total_pkts += $sale_lots->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price);

								$total_price += $total_value;
								// $total_price += $sale_lots->price;

								$wrhse = $sale_lots->wrid;
								if ($sale_lots->warrant_date != NULL) {
									$war_date = date("m/d/Y", strtotime($sale_lots->warrant_date));
								}
								$lots[] = $sale_lots->id;
							
								if ($sale_lots->warrant_no == NULL) {
							
									echo "<tr style='color:red;'>";
								
								} else {

									echo "<tr>";
								}

								
									echo "<td>".$sale_lots->lot."</td>";
									echo "<td>".$sale_lots->outturn."</td>";
									echo "<td>".$sale_lots->mark."</td>";
									echo "<td>".$sale_lots->grade."</td>";
									echo "<td>".$sale_lots->weight."</td>";
									echo "<td>".$sale_lots->bags."</td>";
									echo "<td>".$sale_lots->pockets."</td>";


					                echo "<td><select class='form-control' name='warehouse$id'>";
					               		echo "<option></option>";
										if (isset($Warehouse)){									
													foreach ($Warehouse->all() as $value) {
														if ($wrhse == $value->wrid ) {
															echo "<option value='$value->wrid' selected='selected'>$value->wr_initials</option>";
														} else {
															echo "<option value='$value->wrid'>$value->wr_initials</option>";
														}
													}
										}
												
					                echo "</select></td>";

									echo "<td><input class='form-control' name='serial$id' size='5' value='$sale_lots->warrant_no'></td>";		
									echo "<td><input class='form-control' name='date$id' size='5' value='$war_date'></td>";
									echo "<input class='form-control' type='hidden' name='lots[]' value='$id'>";

									if ($sale_lots->warrant_weight == NULL) {
										$wtotal += $sale_lots->weight; 
										echo "<td><input class='form-control' name='warWeight$id' size='5' value='$sale_lots->weight'></td>";
									} else {
										$wtotal += $sale_lots->warrant_weight; 										
										echo "<td><input class='form-control' name='warWeight$id' size='5' value='$sale_lots->warrant_weight'></td>";		
									}
									echo "<td><textarea  class='form-control'  rows='3' name='comments$id'  value='$sale_lots->war_comments'>".$sale_lots->war_comments."</textarea></td>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					  	<!-- <td>Total:</td> -->
					    <?php
						    echo "<td>".$count." Lots</td>";
						?>
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
						<!-- <td></td> -->
						<td></td>
						<td></td>
						<td></td>
						

					    <?php
						    echo "<td>".$wtotal." $</td>";
						?>
						<td></td>
					  </tr>
				</tbody>
				</table>
			</div>


			<div class="row">
		        <div class="form-group col-md-12">
		       		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Warrant Information</button>
		        </div>

		    </div>


</form>

</div>	
	<script>
	   	var jArray= <?php echo json_encode($lots); ?>;

	    $(document).ready(function(){
	    	for(var i=0;i<jArray.length;i++){
		    	var str1 = "input[name='date";
				var str2 = jArray[i];
				var str3 = str1.concat(str2);
				var res = str3.concat("']");


				var date_input=$(res); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				var options={
				format: 'mm/dd/yyyy',
				container: container,
				todayHighlight: true,
				autoclose: true,
				};
				date_input.datepicker(options);
			}
	    })
	</script>
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#warrantsform" ).submit();
		}
	})
</script>
@endpush