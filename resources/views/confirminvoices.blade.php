@extends ('layouts.dashboard')
@section('page_heading','Invoice Details')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-9">
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
	if (!isset($slr)) {
		$slr  = NULL;
	}
	if (!isset($confirmedby )) {
		$confirmedby   = NULL;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($invoice  )) {
		$invoice = NULL;
	}	
	if (!isset($date  )) {
		$date = NULL;
	}	

	$screen = 0;
	$process = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		// print_r($cdetails."lewis");
	}
	if (isset($sale_lots)){
		foreach ($sale_lots->all() as $value) {
			$invoice = $value->invoice;
			if($value->invoice_date != NULL){
				$date = $value->invoice_date;
				$date = date("m/d/Y", strtotime($date));
				$confirmedby = $value->invoice_confirmedby;
			}
		}		
	}

	if (isset($pdetails)){
		$sale_cb_id = $pdetails->cb_id;
		$price = $pdetails->prc_price;
		$bskt = $pdetails->bs_id;
		// $invoice = $pdetails->prc_invoice_no;

		$sst = $pdetails->sst_id;
		$warrant_no = $pdetails->prc_warrant_no;
		$warrant_weight = $pdetails->prc_warrant_weight;
		$comments = $pdetails->qltyd_comments;
	}



	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-9">
	        <form role="form" method="POST" action="confirminvoices" id="confirminvoicesform">

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
			                <label>Seller</label>
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
<!-- 			            <div class="form-group col-md-3">
			                <label>Invoice Type</label>
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
			            </div> -->


				        <?php 
				        	if ($slr != NULL) {
				        		?>
					            <div class="form-group col-md-3">
					            	<label>Invoice Number</label>
					           		<input class="form-control" name="invoice" style="text-transform:uppercase" value="{{ old('invoice'). $invoice }}">
					            </div>

					            <div class="form-group col-md-3">
					            	<label>Invoice Date</label>
					           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
					            </div>
							        
				        		<?php
				        	}
				        	// } else {
			        		?>




			        </div>


	        	<h3>Lots In Sale</h3>	
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row" >
					<div class="col-md-14 pre-scrollable " style="max-height: 600px;">
						<!-- <form role="form" method="POST" action="confirmqualitycatalogue"> -->
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<table class="table table-striped">
								<thead>
								<tr>	
									<th>
										Add
									</th>											  
									<th>
										Lot
									</th>
									<th>
										Season
									</th>					
									<th>
										Outturn
									</th>
									<th>
										Marks
									</th>					
									<th>
										Grade
									</th>
									<th>
										Bags
									</th>	
									<th>
										Pkts
									</th>
									<th>
										Kg
									</th>
									<th>
										Price($)/50 KG
									</th>
									<th>
										Value
									</th>
									<th>
										Margin
									</th>
									<th>
										FOB
									</th>	 								
									<th>
										Bric Value
									</th>

				<!-- 
									<th>
										Warrant
									</th>
									<th>
										Price
									</th> -->
				<!-- 					<th>
										Screen
									</th>					
									<th>
										Cup/Raw
									</th> -->

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

										$count_confirmed = 0;

										$lots = array();

										$bric_value = 0;
										$total_bric_value = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												if ($sale_lots->status != "Withdrawn" ) {
													// $total += $sale_lots->weight; 
													$count += 1;
													$id = $sale_lots->id;

													$total_bags += $sale_lots->bags;

													$total_pkts += $sale_lots->pockets;

													// var values = parseInt(total)/50 * rate;
										    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price);

										    		// if ($sale_lots->fobprice != null) {
										    		// 	$total_value = $total_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
										    		// }
												

													$bric_value = $sale_lots->price + $sale_lots->sl_margin;

													$bric_value = ($sale_lots->weight)/50 * $bric_value;


										    		if ($sale_lots->fobprice != null) {
										    			// $total_value = $total_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
										    			$bric_value = $bric_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
										    		}


													$total_price += $total_value;

													$total_bric_value += $bric_value;


													// $total_price += $total_value;
													// $total_price += $sale_lots->price;


													if ($sale_lots->status != "Confirmed" ) {
												
														echo "<tr style='color:red;'>";
														$count_confirmed += 1;

													
													} else {
														echo "<tr>";
													}
													$lots[] = $sale_lots->id;

													echo "<td><input name='invoicelot[]' type='checkbox' checked='checked' value='$id'></td>";			

													echo "<td>".$sale_lots->lot."</td>";
													echo "<td>".$sale_lots->csn_season."</td>";


													echo "<td><input class='form-control' name='invOutturn$id' size='5' value='$sale_lots->outturn'></td>";		

													echo "<td><input class='form-control' name='invMark$id' size='10' value='$sale_lots->mark'></td>";		

													// echo "<td>".$sale_lots->outturn."</td>";
													// echo "<td>".$sale_lots->mark."</td>";
													echo "<td>".$sale_lots->grade."</td>";									
													echo "<td>".$sale_lots->bags."</td>";
													echo "<td>".$sale_lots->pockets."</td>";
													// echo "<td>".$sale_lots->weight."</td>";	

													echo "<input class='form-control' type='hidden' name='lots[]' value='$id'>";	
													if ($sale_lots->inv_weight == NULL) {
														$total += $sale_lots->weight; 
														echo "<td><input class='form-control' name='invWeight$id' size='5' value='$sale_lots->weight'></td>";
													} else {
														$total += $sale_lots->inv_weight; 										
														echo "<td><input class='form-control' name='invWeight$id' size='5' value='$sale_lots->inv_weight'></td>";		
													}


													echo "<td>".$sale_lots->price. "</td>";
													echo "<td>".$total_value. "</td>";
													echo "<td>".$sale_lots->sl_margin. "</td>";
													echo "<td>".$sale_lots->fobprice. "</td>";
													echo "<td>$".$bric_value."</td>";


													echo "</tr>";
												}

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
										<td></td>
										<td></td>
									    <?php
										    echo "<td>".$total_bags." Bags</td>";				
										    echo "<td>".$total_pkts." Pkts</td>";
										    echo "<td>".$total." KGs</td>";					

										?>						
										<td></td>
										

									    <?php
										    echo "<td>".$total_price." $</td>";
										?>
										<td></td>
										<td></td>
										<?php
										    echo "<td>".$total_bric_value." $</td>";
										?>
									  </tr>
								</tbody>
								</table>
						<!-- </form> -->
						</div>

		        </div>

	     
		        <?php 
		        	if ($confirmedby == NULL) {
		        		?>
							<div class="row">
					            <div class="form-group col-md-14">
					           		<button type="submit" name="confirminvoices" class="btn btn-lg btn-success btn-block">Confirm Invoice</button>
					            </div>

					        </div>
		        		<?php
		        	} else {
		        		?>
							<div class="row">
					            <div class="form-group col-md-14 col-md-offset-5" style="color:red;">
									<h3>Already confirmed by <?php echo $confirmedby;?></h3>
					            </div>

					        </div>

		        		<?php		        		
		        	}
		        ?>


	        </form>
	</div>
	
</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#confirminvoicesform" ).submit();
		}
	})
</script>
@endpush