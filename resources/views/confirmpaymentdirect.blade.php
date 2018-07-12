@extends ('layouts.dashboard')
@section('page_heading','Confirm Payment Direct')
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
	if (!isset($inv)) {
		$inv = NULL;
	}	
	if (!isset($ref)) {
		$ref = NULL;
	}
	if (!isset($paymentamount)) {
		$paymentamount = NULL;
	}
	if (!isset($invoiced )) {
		$invoiced  = NULL;
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
			// $invoice = $value->invoice;
			if($value->payment_date != NULL){
				$sale_cb_id = $value->cbid;
				$date = $value->payment_date;
				$ref = $value->py_no;
				$paymentamount = $value->payment;
				$date = date("m/d/Y", strtotime($date));
				$confirmedby = $value->payment_confirmedby;
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
    <div class="col-md-12">
	        <form role="form" method="POST" action="confirmpaymentdirect" id="confirmpaymentdirectform">

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
		            </div>
		            <div class="row" >
			        <?php 
			        	if ($slr != NULL) {
			        		?>


				            <div class="form-group col-md-3">
				            	<label>Refrence Number</label>
				           		<input class="form-control" name="ref" style="text-transform:uppercase" value="{{ old('ref'). $ref }}">
				            </div>

				            <div class="form-group col-md-3">
				            	<label>Payment Amount ($)</label>
				           		<input class="form-control" name="paymentamount" style="text-transform:uppercase" value="{{ old('paymentamount'). $paymentamount }}">
				            </div>

				            <div class="form-group col-md-3">
				            	<label>Payment Date</label>
				           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
				            </div>
						        
			        		<?php
			        	}
		        		?>

		          
		        </div>


	        	<h3>Lots In Invoice (Those in red are past prompt date)</h3>	
	        	<div class="row" >
					<div class="col-md-14 pre-scrollable " style="max-height: 600px;">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<table class="table table-striped">
								<thead>
								<tr>				  
									<th>
										Add
									</th>
									<th>
										Bric
									</th>	
									<th>
										Sale
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
										Total Value
									</th>
									<th>
										Prompt Date
									</th>

									<th>
										Remaining
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
										$current_date = date("m/d/Y");
										$count_invoiced = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												if ($sale_lots->status != "Withdrawn" ) {
													$total += $sale_lots->sum_weight; 
													$count += 1;
													$id = $sale_lots->id;

													$total_bags += $sale_lots->sum_bags;

													$total_pkts += $sale_lots->sum_pockets;

													// var values = parseInt(total)/50 * rate;
										    	
													$average_price = $sale_lots->avrg_price/$sale_lots->sum_weight;

													$total_price += $average_price;
													// $total_price += $sale_lots->price;

													$total_value = ($sale_lots->sum_weight)/50 * ($average_price);
												
													$prompt_date = date("m/d/Y", strtotime($value->prompt_date));

													$date_diff = date_diff(date_create($current_date), date_create($prompt_date));

													$date_diff = $date_diff->format("%R%a days");
													//echo $date_diff;												
													if ($date_diff < 0 ) {												
														echo "<tr style='color:red;'>";

													
													} else {
														echo "<tr>";
													}	

														echo "<td><input name='paymentlot[]' type='checkbox' checked='checked' value='$id'></td>";	
														echo "<td>".$sale_lots->bric."</td>";
														echo "<td>".$sale_lots->sale."</td>";
														echo "<td>".$sale_lots->csn_season."</td>";
														echo "<td>".$sale_lots->outturn."</td>";
														echo "<td>".$sale_lots->mark."</td>";
														echo "<td>".$sale_lots->grade."</td>";									
														echo "<td>".$sale_lots->sum_bags."</td>";
														echo "<td>".$sale_lots->sum_pockets."</td>";
														echo "<td>".$sale_lots->sum_weight."</td>";									
														echo "<td>".$average_price. "</td>";
														echo "<td>".$total_value." $</td>";
														echo "<td>".$prompt_date."</td>";
														echo "<td>".$date_diff."</td>";		



													echo "</tr>";
												}

											}
										}
									?>
									  <tr>
									  	<!-- <td>Total:</td> -->
									    <?php
										    echo "<td>".$count." Outturns</td>";
										?>
										<td></td>
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
										    echo "<td></td>";
										    echo "<input class='form-control' type='hidden' name='count_invoiced' value='".$count_invoiced."'";
										?>
										<td></td>
										<td></td>
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
					           		<button type="submit" name="confirmpaymentdirect" class="btn btn-lg btn-success btn-block">Confirm Payment</button>
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
			$( "#confirmpaymentdirectform" ).submit();
		}
	})
</script>
@endpush