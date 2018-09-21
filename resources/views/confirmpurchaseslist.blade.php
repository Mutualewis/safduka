@extends ('layouts.dashboard')
@section('page_heading','Confirm Purchases')
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
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	$screen = 0;
	$process = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$price = NULL;
	$cprice = NULL;
	$bskt = NULL;
	$sst = NULL;
	$warrant_no = NULL;
	$warrant_weight = NULL;
	$comments = NULL;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		// print_r($cdetails."lewis");
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



	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="confirmpurchaseslist" id="confirmpurchaseslistform">

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
<!-- 				<div class="row">
		            <div class="form-group col-md-3">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-danger btn-block">Confirm Purchase</button>
		            </div>

		        </div> -->

			    <h3>Lots</h3>
			    <div class="row">			
					<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 650px;">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<h3>Catalogue(Those in red are foul/bad)</h3>
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
										Price
									</th>
									<th>
										Value
									</th>
									<th>
										Confirm
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
										$total_lots = 0;
										$total = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												
												
												$id = $sale_lots->id;
												// $count += 1;

	

												// var values = parseInt(total)/50 * rate;
									    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price);
									    		$total_lots += 1;

												
												// $total_price += $sale_lots->price;


											
												if ($sale_lots->dnt > 0 ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

												
													echo "<td width='2%' >".$sale_lots->lot."</td>";
													echo "<td>".$sale_lots->outturn."</td>";
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

													echo "<td><input class='form-control' name='cprice[]' size='5' value='$sale_lots->price'></td>";
													echo "<input class='form-control' type='hidden' name='weight[]' value='$sale_lots->weight'></td>";

													echo "<input class='form-control' type='hidden' name='lotid[]' value='$sale_lots->id'></td>";

													echo "<td>".$total_value."</td>";
													if ($sale_lots->status == "Confirmed") {
														echo "<td><input name='confirmed[$id][]' type='checkbox' checked='checked' value='1'></td>";
														$count += 1;
														$total_price += $total_value;
														$total_bags += $sale_lots->bags;
														$total_pkts += $sale_lots->pockets;
														$total += $sale_lots->weight; 
													} else if ($sale_lots->status != "Withdrawn") {
														echo "<td><input name='confirmed[$id][]' type='checkbox'checked='checked' value='1'></td>";
													} else{
														echo "<td><input name='confirmed[$id][]' type='checkbox' value='1'></td>";
													}
													if ($sale_lots->status == "Withdrawn") {
														echo "<td><input name='confirmed[$id][]' type='checkbox' checked='checked' value='0'></td>";
													} else {
														echo "<td><input name='confirmed[$id][]' type='checkbox' value='0'></td>";
													}													

												echo "</tr>";

											}
										}
									?>
									  <tr>
									  	<td>Total Confirmed:</td>
									    <?php
										    echo "<td>".$count."Lots</td>";
										?>
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
										<td></td>
										

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
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Purchase Information</button>
		            </div>

		        </div>

				<?php
					$total_bags = 0;
					$count = 0;

					if (isset($sale_lots) && count($sale_lots) > 0) {
				?>

				<!--	<div class="row">
			            <div class="form-group col-md-9">
			           		<button type="submit" name="submitcatlogue" class="btn btn-lg btn-success btn-block">Full Catalogue</button>
			            </div>

			        </div>
			        --!>
					-->
				<?php
					}
				?>
	        </form>
	</div>

</div>	

<script type="text/javascript">
// the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

</script>
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#confirmpurchaseslistform" ).submit();
		}
	})
</script>
@endpush