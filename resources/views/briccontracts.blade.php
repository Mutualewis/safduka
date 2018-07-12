@extends ('layouts.dashboard')
@section('page_heading','Assign Purchase Contracts')
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
	if (!isset($bskt)) {
		$bskt  = NULL;
	}	
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($bric )) {
		$bric   = NULL;
	}
	if (!isset($date )) {
		$date   = NULL;
	}
	if (!isset($confirmedby )) {
		$confirmedby   = NULL;
	}		
	if (isset($sale_lots)){
		foreach ($sale_lots->all() as $value) {
			$bric = $value->bric;
			if($value->br_date != NULL){
				$date = $value->br_date;
				$date = date("m/d/Y", strtotime($date));
				$confirmedby = $value->br_confirmedby;
			}
		}		
	}


	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="briccontracts" id="briccontractsform">

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
	            <?php
	            	if ($bskt != NULL) {
	            	
	            ?>

				    <h3>Bric</h3>			
		        	
		        	<div class="row" >

			            <div class="form-group col-md-6">
			            	<label>Bric Contract Number</label>
			           		<input class="form-control" name="bric" style="text-transform:uppercase" value="{{ old('bric'). $bric }}">
			            </div>

			            <div class="form-group col-md-6">
			            	<label>Bric Date</label>
			           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
			            </div>       

			        </div>

			        <?php 
			        	if ($confirmedby == NULL) {
			        		?>
								<div class="row">
						            <div class="form-group col-md-14">
						           		<button type="submit" name="submitbric" class="btn btn-lg btn-success btn-block">Confirm Bric</button>
						            </div>

						        </div>
			        		<?php
			        	} else {
			        		?>
								<div class="row">
						            <div class="form-group col-md-14 col-md-offset-4" style="color:red;">
										<h3>Already confirmed by <?php echo $confirmedby;?></h3>
						            </div>

						        </div>

			        		<?php		        		
			        	}
			        ?>



			    <?php
			    	}
			    ?>

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
				-->

				<?php
					}
				?>
	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Catalogue</h3>
				<table class="table table-striped">
				<thead>
				<tr>		
					<!-- <th>
						QualityCode
					</th>		   -->
					<th>
						Lot
					</th>
					<th>
						Outturn
					</th>
					<th>
						Quality grp
					</th>
					<th>
						Cert
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
						Raw
					</th>
					<th>
						Cup
					</th>
					<th>
						Processing
					</th>
					<th>
						Screen
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
						Costs
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
						Bric_Value
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
						$total_fob = 0;

						$bric_value = 0;
						$total_bric_value = 0;

						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $sale_lots) {
								// print_r($season->acat_id);
								$total += $sale_lots->weight; 
								$count += 1;
								$id = $sale_lots->id;

								$total_bags += $sale_lots->bags;

								$total_pkts += $sale_lots->pockets;

								// var values = parseInt(total)/50 * rate;
					    		$total_value = ($sale_lots->weight)/50 * ($sale_lots->price) ;

					    		$diff = ($sale_lots->price)/1.1023 - ($sale_lots->hedge);
					    		$diff = round( $diff, 2, PHP_ROUND_HALF_UP);

					    		$total_cost += ($sale_lots->weight) * ($sale_lots->price);
					    		$total_diff += ($sale_lots->weight) * ($diff);


								$bric_value = $sale_lots->price + $sale_lots->sl_margin;

								$bric_value = ($sale_lots->weight)/50 * $bric_value;


					    		if ($sale_lots->fobprice != null) {
					    			// $total_value = $total_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
					    			$bric_value = $bric_value + ($sale_lots->weight)/50 *$sale_lots->fobprice;
					    		}

								$total_price += $total_value;

								$total_bric_value += $bric_value;
								// $total_price += $sale_lots->price;

									echo "<tr>";								

									// echo "<td>".$sale_lots->code."(".$sale_lots->quality.")"."</td>";									
									echo "<td>".$sale_lots->lot."</td>";
									echo "<td>".$sale_lots->outturn."</td>";
									echo "<td>".$sale_lots->cp_quality." ".$sale_lots->final_comments."</td>";
									echo "<td>".$sale_lots->cert."</td>";

									echo "<td>".$sale_lots->acidity."</td>";
									echo "<td>".$sale_lots->body."</td>";
									echo "<td>".$sale_lots->flavour."</td>";
									echo "<td>".$sale_lots->rw_score."</td>";
									echo "<td>".$sale_lots->cp_score."</td>";
									echo "<td>".$sale_lots->qltyd_prcss_value."</td>";
									echo "<td>".$sale_lots->qltyd_scr_value."</td>";

									echo "<td>".$sale_lots->grade."</td>";
									echo "<td>".$sale_lots->weight."</td>";
									echo "<td>".$sale_lots->bags."</td>";
									echo "<td>".$sale_lots->pockets."</td>";									
									// echo "<td>".$sale_lots->cert."</td>";
									// echo "<td>".$sale_lots->code."</td>";
									// echo "<td>".$sale_lots->quality."</td>";


									echo "<td>".$sale_lots->price. "</td>";
									echo "<td> $".$total_value."</td>";
									echo "<td>".$sale_lots->sl_margin. "</td>";

									echo "<td>".$sale_lots->fobprice. "</td>";

									echo "<td> $".$bric_value."</td>";
									echo "<td>".$sale_lots->hedge."</td>";
									echo "<td>".$diff."</td>";
									echo "<td>".$sale_lots->month."</td>";

								echo "</tr>";

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
						<td></td>
						<td></td>
						<td></td>
					    <?php
						    echo "<td>".$total." KGs</td>";
						?>

					    <?php
						    echo "<td>".ceil($total/60)." Bags</td>";
						?>
					    <?php
						    // echo "<td>".$total_pkts." Pkts</td>";
						?>						
						<td></td>
						

					    <?php
					    	if ($total_cost != NULL && $total != NULL) {
						   		echo "<td>".round($total_cost/$total, 3, PHP_ROUND_HALF_UP)." </td>";
					    	}

						    echo "<td>$".round($total_price, 2, PHP_ROUND_HALF_UP)."</td>";
						    echo "<td></td>";
						    echo "<td></td>";
						    
						    echo "<td>$".round($total_bric_value, 2, PHP_ROUND_HALF_UP)."</td>";
						    echo "<td></td>";

					    	if ($total_diff != NULL && $total != NULL) {
						   		echo "<td>".round($total_diff/$total, 2, PHP_ROUND_HALF_UP)." </td>";
					    	}						    
						    
							echo "<input type='hidden' name ='total_cost' value='".round($total_cost/$total, 3, PHP_ROUND_HALF_UP)."'>";
							echo "<input type='hidden' name ='total_kilos' value='$total'>";
						}
							
						?>
						<td></td>
						<td></td>
						<td></td>

						
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
			$( "#briccontractsform" ).submit();
		}
	})
</script>
@endpush