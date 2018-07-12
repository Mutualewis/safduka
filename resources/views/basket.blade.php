@extends ('layouts.dashboard')
@section('page_heading','Basket')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-4">
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
	if (!isset($crt )) {
		$crt   = NULL;
	}
	if (!isset($grade )) {
		$grade   = NULL;
	}
	if (!isset($cupid )) {
		$cupid   = NULL;
	}
	if (!isset($crt )) {
		$crt   = NULL;
	}
	if (isset($sale_lots)){
		foreach ($sale_lots->all() as $value) {
			$bric = $value->bric;
			if($value->invoice_date != NULL){
				$date = $value->invoice_date;
				$date = date("m/d/Y", strtotime($date));
				$confirmedby = $value->br_confirmedby;
			}
		}		
	}


	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="basket" id="basketform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



		            <h3>Select Sale</h3>						



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

			        </div>

		        	<div class="row" >

		           		<div class="form-group col-md-6">
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

			            <div class="form-group col-md-6">
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

	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Basket</label>
		                <select class="form-control" name="basket" onchange="this.form.submit()">
		               		<option></option>
							@if (count($basket) > 0)
										@foreach ($basket->all() as $value)
										@if ($bskt ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
	            </div>

	            <h3>Filter</h3>
	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Grade</label>
		                <select class="form-control" name="coffee_grade">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
										@foreach ($CoffeeGrade->all() as $cgrade)
											@if ($grade ==  $cgrade->cgrad_name)
												<option value="{{ $cgrade->cgrad_name }}" selected="selected">{{ $cgrade->cgrad_name}}</option>
											@else
												<option value="{{ $cgrade->cgrad_name }}">{{ $cgrade->cgrad_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>	  
		            <div class="form-group col-md-6">
		                <label>Cup Score</label>
		                <select class="form-control" name="cup">
		                	<option></option> 
							@if (isset($cupscore) && count($cupscore) > 0)
										@foreach ($cupscore->all() as $value)
											@if ($cupid ==  $value->id)
												<option value="{{ $value->cp_quality }}" selected="selected">{{ $value->cp_score . " (".$value->cp_quality.")"}}</option>
											@else
												<option value="{{ $value->cp_quality }}">{{ $value->cp_score . " (".$value->cp_quality.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>
		        </div>

	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label>Certified</label>
		                <select class="form-control" name="certified">
		                	<option></option>
							@if ($crt == 'Yes')
								<option value="Yes" selected="selected">Yes</option>
							@else
								<option value="Yes">Yes</option>
							@endif	
							@if ($crt == 'No')
								<option value="No" selected="selected">No</option>
							@else
								<option value="No">No</option>
							@endif									
		                </select>		
		            </div>	  
		            <div class="form-group col-md-6">
		            	<label></label>
		           		<button type="submit" name="filter" class="btn btn-lg btn-success btn-block">Filter</button>
		            </div>
		        </div>
			    <div class="row">			
					<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 350px;">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
								<h3>Lots in this basket or unassigned</h3>
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
										Outturn
									</th>
									<th>
										Grade
									</th>
									<th>
										Cup
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
										$any_confirmed = false;

										if (isset($sale_lots_unassigned) && count($sale_lots_unassigned) > 0) {

											foreach ($sale_lots_unassigned->all() as $value) {
													// print_r($season->acat_id);
												
												
												$id = $value->id;

	

												// var values = parseInt(total)/50 * rate;
									    		$total_value = ($value->weight)/50 * ($value->price);
									    		$total_lots += 1;

									    		if ($value->bric != NULL) {
													$any_confirmed = true;
												}
												
												// $total_price += $sale_lots->price;


											
												if ($value->dnt > 0 ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

													if ($value->bsid == $bskt) {
														echo "<td><input name='basketlot[]' type='checkbox' checked='checked' value='$id'></td>";
														$count += 1;
														$total_price += $total_value;
														$total_bags += $value->bags;
														$total_pkts += $value->pockets;
														$total += $value->weight; 

													} else {
														echo "<td><input name='basketlot[]' type='checkbox' value='$id'></td>";
													}	

													echo "<td>".$value->lot."</td>";
													echo "<td>".$value->outturn."</td>";
													echo "<td>".$value->grade."</td>";
													echo "<td>".$value->cp_score."</td>";
													echo "<td>".$value->weight."</td>";
													echo "<td>".$value->bags."</td>";
													echo "<td>".$value->pockets."</td>";
													echo "<td>".$value->warehouse."</td>";
													echo "<td>".$value->region."</td>";
													echo "<td>".$value->cert."</td>";
													
												

												echo "</tr>";

											}
										}
									?>
									  <tr>
									    <?php
										    echo "<td>".$count."Lots</td>";
										?>
										<td></td>
										<td></td>
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

									    <?php
										    echo "<input class='form-control' type='hidden' name='total_lots' value='$total_lots'></td>";
										?>
										<td></td>
									  </tr>
								</tbody>
								</table>
					</div>
				</div>


		        <?php 
		        	if ($any_confirmed == false) {
		        		?>
							<div class="row">
					            <div class="form-group col-md-6">
					            	<label></label>
					           		<button type="submit" name="selectall" class="btn btn-lg btn-success btn-block">Select All</button>
					            </div>
					            <div class="form-group col-md-6">
					            	<label></label>
					           		<button type="submit" name="unselectall" class="btn btn-lg btn-warning btn-block">Unselect All</button>
					            </div>		            
					        </div>
					        <div class="row">
					            <div class="form-group col-md-12">
					           		<button type="submit" name="updatebasket" class="btn btn-lg btn-success btn-block">Add/Update Basket</button>
					            </div>
					        </div>
		        		<?php
		        	} else {
		        		?>
							<div class="row">
					            <div class="form-group col-md-12 col-md-offset-2" style="color:red;">
									<h3>The quality basket already has a bric contract.</h3>
					            </div>

					        </div>

		        		<?php		        		
		        	}
		        ?>


	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 900px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Basket</h3>
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
						Code
					</th>
					<th>
						Quality
					</th>
					<th>
						Price($)/50 KG
					</th>
					<th>
						Value
					</th>
					<th>
						Hedge
					</th>
					<th>
						Diff
					</th>
					<th>
						Month
					</th>
					<th>
						
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
						$diff = 0;
						$count_confirmed = 0;
						$total_cost = 0;
						$total_diff = 0;
						$total = 0;

						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $sale_lots) {
									// print_r($season->acat_id);
								$total += $sale_lots->weight; 
								$count += 1;
								$id = $sale_lots->id;

								$total_bags += $sale_lots->bags;

								$total_pkts += $sale_lots->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price);

					    		$diff = ($sale_lots->price)/1.10231 - ($sale_lots->hedge);
					    		$diff = round( $diff, 2, PHP_ROUND_HALF_UP);

					    		$total_cost += ($sale_lots->weight) * ($sale_lots->price);
					    		$total_diff += ($sale_lots->weight) * ($diff);

								$total_price += $total_value;
								// $total_price += $sale_lots->price;


			
								echo "<tr>";

									echo "<td>".$sale_lots->lot."</td>";
									echo "<td>".$sale_lots->outturn."</td>";
									echo "<td>".$sale_lots->mark."</td>";

									echo "<td>".$sale_lots->grade."</td>";
									echo "<td>".$sale_lots->weight."</td>";
									echo "<td>".$sale_lots->bags."</td>";
									echo "<td>".$sale_lots->pockets."</td>";									
									// echo "<td>".$sale_lots->cert."</td>";
									echo "<td>".$sale_lots->code."</td>";
									echo "<td>".$sale_lots->quality."</td>";


									echo "<td>".$sale_lots->price. "</td>";
									echo "<td> $".$total_value."</td>";
									echo "<td>".$sale_lots->hedge."</td>";
									echo "<td>".$diff."</td>";
									echo "<td>".$sale_lots->month."</td>";


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
						<td></td>
						<td></td>
						

					    <?php
					    	if ($total_cost != NULL && $total != NULL) {
						   		echo "<td>".round($total_cost/$total, 2, PHP_ROUND_HALF_UP)." </td>";
					    	}
						    echo "<td>$".round($total_price, 2, PHP_ROUND_HALF_UP)."</td>";
						    echo "<td></td>";

					    	if ($total_diff != NULL && $total != NULL) {
						   		echo "<td>".round($total_diff/$total, 2, PHP_ROUND_HALF_UP)." </td>";
					    	}						    
						    
						?>
						<td></td>

					    <?php
						    echo "<input class='form-control' type='hidden' name='count_confirmed' value='".$count_confirmed."'";
						?>
						<?php
						    // echo "<td>".$count_process." Not Set</td>";
						?>
<!-- 						<?php
						    // echo "<td>".$count_screen." Not Set</td>";
						?>
						<?php
						    // echo "<td>".$count_cup." Not Set</td>";
						?> -->
					  </tr>
				</tbody>
			</table>
	</div>
	</form>

</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#basketform" ).submit();
		}
	})
</script>
@endpush