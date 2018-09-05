@extends ('layouts.dashboard')
@section('page_heading','Direct Purchase Warrants')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-14">
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
					  </div> 

				</div>				
			</div>
<?php 
	if (old('country') != NULL) {
		$cid = old('country');
	}

	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season)) {
		$csn_season  = NULL;
	}
	if (!isset($slr)) {
		$slr  = NULL;
	}
	if (!isset($greencomments)) {
		$greencomments = NULL;
	}
	if (!isset($prc)) {
		$prc = NULL;
	}
	if (!isset($scr)) {
		$scr = NULL;
	}
	if (!isset($cupid)) {
		$cupid = NULL;
	}
	if (!isset($rawid)) {
		$rawid = NULL;
	}
	if (!isset($comments)) {
		$comments = NULL;
	}	


	$screen = 0;
	$process = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$ot_season = NULL;
	$coffee_grower = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$ot_season = NULL;
	$warehouse = NULL;
	$millid = NULL;
	$process = NULL;
	$screen = NULL;
	$greencomment = NULL;
	$largest = NULL;
	$cidd = NULL;

	if (isset($cdetails)){
		$cidd = $cdetails->id;
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		$grade = $cdetails->cgrad_id;
		$cnetweight = $cdetails->cfd_weight;
		$bags = $cdetails->cfd_bags;
		$pockets = $cdetails->cfd_pockets;

		$slr = $cdetails->slr_id;
		$warehouse = $cdetails->wr_id;
		$millid = $cdetails->ml_id;

	}

	if (isset($qdetails)){
		$prc = $qdetails->prcss_id;
		$process = $qdetails->qltyd_prcss_value;
		$scr = $qdetails->scr_id;
		$screen = $qdetails->qltyd_scr_value;
		$cupid = $qdetails->cp_id;
		$rawid = $qdetails->rw_id;
		$comments = $qdetails->qltyd_comments;
	}



?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="directpurchasewarrants">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-3 ">
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
			                <label>Seller(Should Be Selected)</label>
			                <select class="form-control" id="seller" name="seller" onchange="this.form.submit()">
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
			        
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Warrant Information</button>
		            </div>

		        </div> 

			    <h3>Outturns</h3>
				<div class="row">		
					<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 600px;">

						<h3>Direct Warrants List</h3>
						<table class="table table-striped">
						<thead>
						<tr>				  
							<th>
								Sale
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
									$lots = array();
									
									if (isset($sale_lots) && count($sale_lots) > 0) {

										foreach ($sale_lots->all() as $sale_lots) {
											$total += $sale_lots->weight; 
											$count += 1;
											$id = $sale_lots->id;
											$war_date = NULL;

											$total_bags += $sale_lots->bags;

											$total_pkts += $sale_lots->pockets;

								    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price);

											$total_price += $total_value;

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

												echo "<td>".$sale_lots->sale."</td>";
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
					
				</div>

	        </form>
	</div>
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
