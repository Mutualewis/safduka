@extends ('layouts.dashboard')
@section('page_heading','Direct Purchase Basket')
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
	        <form role="form" method="POST" action="directpurchasequality">

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


			    <h3>Outturns</h3>
			    <div class="row">			
					<div class="col-md-14 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<h3>Direct Quality List(Those in red are foul/bad)</h3>
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
										Region
									</th>
									<th>
										Cert
									</th>
									<th>
										Green
									</th>

									<th>
										Cup
									</th>
									<th>
										Raw
									</th>
									<th>
										Process(%)
									</th>
									<th>
										Screen(%)
									</th>
									<th>
										A
									</th>
									<th>
										B
									</th>		
									<th>
										F
									</th>									
									<th>
										Value
									</th>								
									<th>
										Basket
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
										$total_lots = 0;
										$total = 0;
										$sale_cb_id = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												
												
												$id = $sale_lots->id;
												$count += 1;

												$total += $sale_lots->weight;
												$total_bags += $sale_lots->bags;
												$total_pkts += $sale_lots->pockets;
												$prc_fob_id = $sale_lots->prc_fob_id;
												$prc_fob_price = null;
												$prc_basket = $sale_lots->bsid;

												// print_r($id);
												// print_r("<br>");

												foreach ($fob->all() as $value) {
													
													if ($prc_fob_id == $value->id) {
														$prc_fob_price = $value->fob_price;
													} else if($prc_fob_id == null){
														if ($value->id == 1) {
															$prc_fob_price = $value->fob_price;
														}
													}
												}

												// if ($sale_cb_id == NULL) {

												// }

	

												// var values = parseInt(total)/50 * rate;
									    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price + $prc_fob_price);
									    		$total_lots += 1;

												
												$total_price += $total_value;


											
												if ($sale_lots->dnt > 0 ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

												
													echo "<td width='2%' >".$sale_lots->sale."</td>";
													echo "<td>".$sale_lots->outturn."</td>";
													echo "<td>".$sale_lots->mark."</td>";
													echo "<td>".$sale_lots->grade."</td>";
													echo "<td>".$sale_lots->weight."</td>";
													echo "<td>".$sale_lots->bags."</td>";
													echo "<td>".$sale_lots->pockets."</td>";
													echo "<td>".$sale_lots->warehouse."</td>";
													echo "<td>".$sale_lots->region."</td>";
													echo "<td>".$sale_lots->cert."</td>";
													echo "<td width='10%' >".$sale_lots->green."</td>";
													echo "<td>".$sale_lots->cp_score."</td>";
													echo "<td>".$sale_lots->rw_score."</td>";
													if($sale_lots->prcss_name != NULL){
														echo "<td>".$sale_lots->prcss_name."(".$sale_lots->qltyd_prcss_value.")". "</td>";
													} else {
														echo "<td></td>";
													}
													if($sale_lots->scr_name != NULL){
														echo "<td>".$sale_lots->scr_name."(".$sale_lots->qltyd_scr_value.")".  "</td>";
													} else {
														echo "<td></td>";
													}
													echo "<td>".$sale_lots->acidity."</td>";
													echo "<td>".$sale_lots->body."</td>";
													echo "<td>".$sale_lots->flavour."</td>";

													echo "<input class='form-control' type='hidden' name='lotid[]' value=".$id."></td>";

													echo "<td>".$total_value."</td>";

									                echo "<td width='15%'><select class='form-control' name='basket[$id]'>";
									                	echo "<option></option>";
														if (isset($basket) && count($basket) > 0){									
																	foreach ($basket->all() as $value) {
																		if ($prc_basket == $value->id ) {
																			echo "<option value='$value->id' selected='selected'>$value->bs_quality ($value->bs_code)</option>";
																		}
																		else{
																			echo "<option value='$value->id'>$value->bs_quality ($value->bs_code)</option>";
																		}
																	}
																
														}
									                echo "</select></td>";


												echo "</tr>";

											}
										}
									?>
									  <tr>
									  	<td>Total Confirmed:</td>
									    <?php
										    echo "<td>".$count."Outturns</td>";
										?>
										<td></td>
										<td></td>
									    <?php
										    echo "<td>".$total."KGs</td>";
										?>
									    <?php
										    echo "<td>".$total_bags."Bags</td>";
										?>
									    <?php
										    echo "<td>".$total_pkts."Pkts</td>";
										?>						
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<!-- <td></td> -->
										

									    <?php
										    echo "<td>".$total_price."$</td>";
										    echo "<input class='form-control' type='hidden' name='total_lots' value='$total_lots'></td>";
										?>
										<td></td>
									  </tr>
								</tbody>
								</table>
					</div>
				</div>
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Purchase Details</button>
		            </div>

		        </div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmpurchase" class="btn btn-lg btn-danger btn-block">Confirm Purchase Details</button>
		            </div>
		        </div>
	        </form>
	</div>
</div>	
@stop
