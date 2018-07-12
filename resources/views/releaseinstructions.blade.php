@extends ('layouts.dashboard')
@section('page_heading','Release Instructions')
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
	if (!isset($saleid )) {
		$saleid   = [];
	}
	if (old('coffee_buyer') != NULL) {
		$oldbuyers = old('cofee_buyer');
		//dd(old('cofee_buyer'));
	}
	//print_r(old('coffee_buyer'));
	
	if (!isset($sale_cb_ids )) {
		$sale_cb_ids   = [];
	}

	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($rl_date )) {
		$rl_date = NULL;
	}
	if (!isset($ref_no)) {
		$ref_no = NULL;
	}
	if (!isset($slr)) {
		$slr = [];
	}

	if (!isset($date)) {
		$date = NULL;
	}
	if (!isset($wrhse )) {
		$wrhse = NULL;
	}
	if (!isset($coffee_baskets )) {
		$coffee_baskets = NULL;
	}
	
	$screen = 0;
	$process = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
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
    <div class="col-md-5">
	        <form role="form" method="POST" action="releaseinstructions" id="releaseinstructionsform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-6">
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

			            <div class="form-group col-md-6" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" name="sale_season">
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

			        </div>

		        	<div class="row" >

			            <div class="form-group col-md-6">
			               	<label>Buyer</label>
			                <select class="form-control" id="select-buyer" name="coffee_buyer[]" multiple="multiple" value="old">
			               		<!-- <option >None Selected</option> -->
								@if (isset($buyer) && count($buyer) > 0)										
											@foreach ($buyer->all() as $buyers)
											@if (in_array($buyers->id, $sale_cb_ids))
												<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->cb_name}}</option>
											@else
												<option value="{{ $buyers->id }}">{{ $buyers->cb_name}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>	
			            <div class="form-group col-md-6">
			                <label>Seller</label>
			                <select class="form-control" id="select-seller" name="seller[]"  multiple="multiple">
							<!-- <option>None Selected</option> -->
								@if (isset($seller) && count($seller) > 0)
											@foreach ($seller->all() as $sellers)
												@if (in_array($sellers->id, $slr))
													<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
												@else
													<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>
			            </div>
			        </div>

				<div class="row" >

				<div class="form-group col-md-6">
					<label>Basket</label>
					<select class="form-control" id="select-basket" name="coffee_basket">
						<option value=''>---Select Basket---</option>
						@if (isset($basket) && count($basket) > 0)										
									@foreach ($basket->all() as $baskets)
									@if ($coffee_baskets ==  $baskets->id)
										<option value="{{ $baskets->id }}" selected="selected">{{ $baskets->bs_code}}  {{$baskets->bs_quality}}</option>
									@else
										<option  value="{{ $baskets->id }}">{{ $baskets->bs_code}}  {{$baskets->bs_quality}}</option>
									@endif
									@endforeach
								
						@endif
					</select>
					</div>
					
				<div class="col-md-6">
				<label></label>
				<span class="input-group-btn">
				
				<button type="submit" name="searchButton" class="btn btn-warning">
				Search     <i class="fa fa-search"></i>
				</button>

				</span>
				</div>

				</div>

	        	<div class="row">
		            <div class="form-group col-md-6">
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
	           		<div class="form-group col-md-6">
		                <label>Sale</label>
		                <select class="form-control" id="select-sale" name="sale[]" multiple="multiple">
		                	<option>Sale No.</option> 
							@if (isset($sale) && count($sale) > 0)
										@foreach ($sale->all() as $sales)
										@if (in_array($sales->id, $saleid))
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

			    <h3>Additional Information</h3>	

<!-- 	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>To</label>
		                <select class="form-control" name="to" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($to) && count($to) > 0)
										@foreach ($to->all() as $value)
											@if ($slr ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->slr_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-6">
		                <label>Att</label>
		                <select class="form-control" name="att" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($att) && count($att) > 0)
										@foreach ($att->all() as $value)
											@if ($slr ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->slr_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>

	            </div>


	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>CC</label>
		                <select class="form-control" name="cc" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($cc) && count($cc) > 0)
										@foreach ($cc->all() as $value)
											@if ($slr ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->slr_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-6">
		                <label>From</label>
		                <select class="form-control" name="from" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($from) && count($from) > 0)
										@foreach ($from->all() as $value)
											@if ($slr ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->slr_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->slr_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>Coffee To Be Released
		            </div>

	            </div>

 -->
	        	<div class="row">

	        		<div class="form-group col-md-6">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{$ref_no }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" value="search" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	

		            <div class="form-group col-md-6">
		                <select class="form-control" name="trp">
		                	<option>Transporter</option> 
							@if (isset($transporters) && count($transporters) > 0)
										@foreach ($transporters->all() as $value)
											@if ($trp ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->trp_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->trp_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
	            </div>
	            <div class="row">
		            <div class="form-group col-md-6">
		            	<label>Release Instruction Number</label>
		           		<input class="form-control" name="release_no" style="text-transform:uppercase" value="{{ old('release_no'). $release_no }}" readonly="readonly">
		           		<input class="form-control" type="hidden" name="release_no" style="text-transform:uppercase" value="{{ old('release_no'). $release_no }}">
		            </div>  
		            <div class="form-group col-md-6">
		            	<label>Date</label>
		           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
		            </div>   
	            </div>



<!-- 	 	        <div class="row">


	            </div>
 -->

			    <h3>Add</h3>			
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row">
					<div class="col-md-12 col-md-offset-0 pre-scrollable">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<table class="table table-striped">
								<thead>
								<tr>
									<th>
										Add
									</th>	
									<th>
										Sale
									</th>
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
										Kilos
									</th>
									<th>
										Bags
									</th>
									<th>
										Pkts
									</th>
									<th>
										Warrant no.
									</th>
									<th>
										Basket
									</th>
		<!-- 							<th>
										Prompt Date
									</th>

									<th>
										Remaining
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
										$count = 0;
										$count_green = 0;
										$count_process = 0;
										$count_screen = 0;
										$count_cup = 0;
										$current_date = date("m/d/Y");
										$total = 0;

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $value) {
												$total += $value->warrant_weight; 
												$count += 1;
												$id = $value->id;

												
													if ($value->rl_no == NULL) {
														echo "<tr>";
														echo "<td><input name='tobereleased[]' type='checkbox' value='$id' ></td>";	
													} else {
														echo "<tr style='color:red;'>";
														echo "<td><input name='tobereleased[]' type='checkbox'  value='$id' checked='checked'></td>";	
													}
													

													echo "<td>".$value->sale."</td>";
													echo "<td>".$value->lot."</td>";
													echo "<td>".$value->outturn."</td>";
													echo "<td>".$value->grade."</td>";
													echo "<td>".$value->warrant_weight."</td>";
													echo "<td>".$value->bags."</td>";
													echo "<td>".$value->pockets."</td>";
													echo "<td>".$value->warrant_no."</td>";
													echo "<td>".$value->code."</td>";
													// echo "<td>".$prompt_date."</td>";
													// echo "<td>".$date_diff."</td>";									
													echo "<input type='hidden' name ='itemId' value='$id'>";
													echo "<input type='hidden' name ='$count' value='$id'>";
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
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td><!-- 
										<td></td>
										<td></td> -->
									  </tr>
								</tbody>
								</table>
						</div>
					</div>


	      


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Release Instruction</button>
		            </div>
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printreleaseinstructions" class="btn btn-lg btn-success btn-block">Print Release Instruction</button>
		            </div>
		        </div>
			</form>

	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="releaseinstructions">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Coffee To Be Released</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					<th>
						Sale
					</th>
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
						Kilos
					</th>
					<th>
						Bags
					</th>
					<th>
						Pkts
					</th>
					<th>
						Basket
					</th>
					<th>
						Warrant no.
					</th>
					<th>
						Seller
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
					<th>'slr', 'sale_cb_id',
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

						if (isset($sale_lots_released) && count($sale_lots_released) > 0) {

							foreach ($sale_lots_released->all() as $value) {
									// print_r($season->acat_id);
								$total += $value->warrant_weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($value->warrant_weight)/50 * ($value->price);

								$total_price += $total_value;
								// $total_price += $sale_lots->price;


							
								if ($value->warrant_no == NULL) {
							
									echo "<tr style='color:red;'>";
								
								} else {

									echo "<tr>";
								}

									echo "<td>".$value->sale."</td>";								
									echo "<td>".$value->lot."</td>";
									echo "<td>".$value->outturn."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->warrant_weight."</td>";
									echo "<td>".$value->bags."</td>";
									echo "<td>".$value->pockets."</td>";
									echo "<td>".$value->code."</td>";
									echo "<td>".$value->warrant_no."</td>";
									
									echo "<td>".$value->seller. "</td>";

								echo "</tr>";
							}

						}
					?>
					  <tr>
					  	<!-- <td>Total:</td> -->
					    <?php
						    echo "<td>".$count." Lot(s)</td>";
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
						
					  </tr>
				</tbody>
				</table>
		</form>
	</div>
</div>	
<style type="text/css">
    .multiselect-container {
        min-width: 100% !important;
    }
</style>
@stop

@push('scripts')

<script>
	
	$(document).ready(function (){ 
		
		$('#select-buyer').multiselect({
            buttonWidth: '100%',
			includeSelectAllOption: true,
            selectAllText: 'Check all!'
        });
		$('#select-seller').multiselect({
			buttonWidth: '100%',
			includeSelectAllOption: true,
            selectAllText: 'Check all!'
		});
		$('#select-sale').multiselect({
			buttonWidth: '100%',
			includeSelectAllOption: true,
            selectAllText: 'Check all!',
			enableFiltering: true,
            filterPlaceholder: 'Search for sale...',
			maxHeight: 400
		});

	});// end document ready function


</script>


@endpush

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#releaseinstructionsform" ).submit();
		}
	})
</script>
@endpush