@extends ('layouts.dashboard')
@section('page_heading','Processing Results Quality')
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
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}
	if (!isset($ref_no)) {
		$ref_no = NULL;
	}
	if (!isset($other_instructions)) {
		$other_instructions = NULL;
	}
	if (!isset($prc)) {
		$prc = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	if (!isset($zone)) {
		$zone   = NULL;
	}

	if (!isset($release_no )) {
		$release_no = NULL;
	}
	if (!isset($date )) {
		$date = NULL;
	}

	if (!isset($grn )) {
		$grn = NULL;
	}
	if (!isset($dispatch_kilograms )) {
		$dispatch_kilograms = NULL;
	}

	if (!isset($delivery_kilograms )) {
		$delivery_kilograms = NULL;
	}
	if (!isset($tare_kilograms )) {
		$tare_kilograms = NULL;
	}
	if (!isset($moisture )) {
		$moisture = NULL;
	}
	if (!isset($batch_kilograms )) {
		$batch_kilograms = NULL;
	}
	if (!isset($wrhse )) {
		$wrhse = NULL;
	}
	if (!isset($pkg)) {
		$pkg = NULL;
	}
	if (!isset($rw)) {
		$rw = NULL;
	}
	if (!isset($clm)) {
		$clm = NULL;
	}
	if (!isset($bskt)) {
		$bskt = NULL;
	}
	if (!isset($basket )) {
		$basket = NULL;
	}
	if (!isset($grn_number )) {
		$grn_number = NULL;
	}
	if (!isset($wbtk )) {
		$wbtk = NULL;
	}
	if (!isset($ot_season )) {
		$ot_season = NULL;
	}
	if (!isset($rlno )) {
		$rlno = NULL;
	}
	if (!isset($btnumber )) {
		$btnumber = NULL;
	}
	if (!isset($bags )) {
		$bags = NULL;
	}
	if (!isset($pockets )) {
		$pockets = NULL;
	}

	if (!isset($rtid )) {
		$rtid = NULL;
	}
	if (!isset($rfid)) {
		$rfid = NULL;
	}
	if (!isset($cupid)) {
		$cupid = NULL;
	}
	if (!isset($acidity)) {
		$acidity = NULL;
	}
	if (!isset($body)) {
		$body = NULL;
	}
	if (!isset($flavour)) {
		$flavour = NULL;
	}
	if (!isset($description)) {
		$description = NULL;
	}


	$screen = 0;
	$process = 0;
	$weight = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$ot_season = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$weight = NULL;
	$packages = NULL;

	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
	}

	if (isset($results_view)) {
		$batch_kilograms = $results_view->prts_weight;
		$packages = $results_view->prts_packages;
		$rw = $results_view->loc_row; 
		$clm = $results_view->loc_column;
		$zone = $results_view->btc_zone; 
		$grade = $results_view->cgrad_id;
		$bskt = $results_view->bs_id;
		$wrhse = $results_view->wr_id;

		$cupid = $results_view->cp_id;
		$acidity = $results_view->sqltyd_acidity;
		$body = $results_view->sqltyd_body;
		$flavour = $results_view->sqltyd_flavour;
		$description = $results_view->sqltyd_description;
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
	$BULKING_PROCESS = 4;
	//old('outt_number'). $outt_number }}
?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="/processingresultsquality" id="processingresultsqualityform">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<h3  data-toggle="collapse" data-target="#green">Instructions </h3>
            	 <!-- <label class="glyphicon glyphicon-menu-down"></label></h3>   -->
            	<!-- <div id='green' class='collapse in' > -->		
	        	<div class="row">
		            <div class="form-group col-md-4">
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
		            <div class="form-group col-md-4">
		                <label >Processing Type</label>
		                <select class="form-control" name="process_type" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($processing) && count($processing) > 0)
										@foreach ($processing->all() as $value)
											@if ($prc ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->prcss_name }}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->prcss_name }}</option>
											@endif
										@endforeach									
							@endif  
		                </select>	
		            </div>
	        		<div class="form-group col-md-4">
	        			<label>Instruction Number</label>
		                <select class="form-control" name="ref_no" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($refno) && count($refno) > 0)
										@foreach ($refno->all() as $value)
											@if ($rfid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->pr_instruction_number }}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->pr_instruction_number }}</option>
											@endif

										@endforeach
									
							@endif
		                </select>	
	                </div>	

	        	</div>

 				<h3>Results</h3>
	
	        	<div class="row">
	 		            <div class="form-group col-md-4">
			                <label>Results Type</label>
			                <select class="form-control" name="results_type" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($resultsType) && count($resultsType) > 0)
											@foreach ($resultsType->all() as $value)
												@if ($rtid ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->prt_name}}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->prt_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>		
			            </div>
	        	
	            <?php 
	            	if ($prc != $BULKING_PROCESS) {
		            			?>

		            			<?php

		            	} else {
		            		?>
		            		<?php

		            	}
		            ?>

		            <div class="form-group col-md-4">
		                <label>Weight</label>
		                <input class="form-control"  id="batch_kilograms"  name="batch_kilograms" oninput="myFunction()" value="{{ old('batch_kilograms').$batch_kilograms  }}" disabled>
		            </div>

		            <div class="form-group col-md-4">
		                <label >Packages</label>
		                <input class="form-control"  id="packages"  name="packages" oninput="myFunction()" value="{{ old('packages').$packages  }}" disabled>
		            </div>	            
	            </div>	

				<h3>Quality</h3>

	            <div class="row">

		            <div class="form-group col-md-4">
		                <label>Internal Basket</label>
		                <select class="form-control" name="basket">
		               		<option></option>
							@if (isset($basket))
										@foreach ($basket->all() as $value)
										@if ($bskt ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->ibs_quality. " (". $value->ibs_code.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->ibs_quality. " (". $value->ibs_code.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
		            
		            <div class="form-group col-md-4">
		                <label>Grade(Not Necessary)</label>
		                <select class="form-control" name="coffee_grade">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
										@foreach ($CoffeeGrade->all() as $cgrade)
											@if ($grade ==  $cgrade->id)
												<option value="{{ $cgrade->id }}" selected="selected">{{ $cgrade->cgrad_name}}</option>
											@else
												<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-4">
		                <label>Cup Score</label>
		                <select class="form-control" name="cup">
		                	<option></option> 
							@if (isset($cupscore) && count($cupscore) > 0)
										@foreach ($cupscore->all() as $value)
											@if ($cupid ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->cp_score . " (".$value->cp_quality.")"}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->cp_score . " (".$value->cp_quality.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

		        </div>

		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Acidity</label>
		                <input class="form-control"  id="acidity"  name="acidity" oninput="myFunction()" value="{{ old('acidity').$acidity  }}" >
		            </div>	  
		            <div class="form-group col-md-4">
		                <label >Body</label>
		                <input class="form-control"  id="body"  name="body" oninput="myFunction()" value="{{ old('body').$body  }}" >
		            </div>	
		            <div class="form-group col-md-4">
		                <label >Flavour</label>
		                <input class="form-control"  id="flavour"  name="flavour" oninput="myFunction()" value="{{ old('flavour').$flavour  }}" >
		            </div>	

		        </div>

	        	<div class="row">
		            <div class="form-group col-md-12">
						<label>Description</label>
						<textarea class="form-control" rows="3" name="description" value="{{ old('description') }}"><?php echo htmlspecialchars($description); ?></textarea>
		            </div>
		        </div>

		        

		        

				<?php
					if (isset($prdetails)){
						if ($prdetails->pr_confirmed_by != NULL) {
							?>
								<div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block" disabled>Add/Update Quality Processing Results</button>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="confirmresults" class="btn btn-lg btn-danger btn-block" disabled>Confirmed!!</button>
						            </div>
						        </div>
							<?php

						} else {
							?>
								<div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block">Add/Update Quality Processing Results</button>
						            </div>
						        </div>
						        <div class="row">
						            <div class="form-group col-md-12">
						           		<button type="submit" name="confirmresults" class="btn btn-lg btn-danger btn-block">Confirm Results</button>
						            </div>
						        </div>
							<?php 
						}
					}
				?>


		        <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printresults" class="btn btn-lg btn-success btn-block">Print Processing Results</button>
		            </div>
		        </div>

			

	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Coffee In Instruction</h3>
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
						Cert
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
						Quality
					</th>
					<th>
						Location
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

						if (isset($StockView)) {
							foreach ($StockView->all() as $value) {
								$total += $value->weight; 
								$count += 1;
								$id = $value->id;

								$total_bags += $value->bags;

								$total_pkts += $value->pockets;

					    		$total_value = ($value->weight)/50 * ($value->price);

								$total_price += $total_value;					
					

								echo "<tr>";

									echo "<td>".$value->sale."</td>";
									echo "<td>".$value->lot."</td>";
									echo "<td>".$value->name."</td>";
									echo "<td>".$value->cert."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->weight."</td>";
									echo "<td>".$value->bags."</td>";
									echo "<td>".$value->pockets."</td>";						
									echo "<td>".$value->quality."(".$value->code.")"."</td>";		
									echo "<td width='12%'>".$value->location."</td>";	
									echo "<td><input type='hidden' class='form-control' name='totalkilos' size='5' value='$total'></td>";
									echo "<td><input type='hidden' class='form-control' name='totalvalue' size='5' value='$total_value'></td>";	

								echo "</tr>";

							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count." Lot(s)</td>";
						?>
						<td></td>
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
						<td></td>
						
					  </tr>
				</tbody>
				</table>





	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Instruction Results</h3>
				<table class="table table-striped">
				<thead>
				<tr>				  
					<th>
						Result Type
					</th>
					<th>
						Weight
					</th>
					<th>
						Packages
					</th>
					<th>
						Location
					</th>
					<th>
						Grade
					</th>
					<th>
						Basket
					</th>
					<th>
						Cup
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
						Desc
					</th>
				  </tr>
				</thead>
				<tbody>



					<?php
						$total_packages = 0;
						$total_pkts = 0;
						$count = 0;
						$count_green = 0;
						$count_process = 0;
						$count_screen = 0;
						$count_cup = 0;
						$total_price = 0;
						$total = 0;

						if (isset($ProcessResults) && count($ProcessResults) > 0) {

							foreach ($ProcessResults->all() as $value) {
								$count += 1;
								$id = $value->id;

								$total += $value->weight_out; 

								$total_packages += $value->packages_out;						
								

								echo "<tr>";

									echo "<td>".$value->result_type."</td>";								
									echo "<td>".$value->weight_out."</td>";
									echo "<td>".$value->packages_out."</td>";
									echo "<td>".$value->wr_name."-".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
									echo "<td>".$value->cgrad_name."</td>";
									echo "<td>".$value->ibs_code."</td>";
									echo "<td>".$value->cp_score."</td>";
									echo "<td>".$value->sqltyd_acidity."</td>";
									echo "<td>".$value->sqltyd_body."</td>";
									echo "<td>".$value->sqltyd_flavour."</td>";
									echo "<td>".$value->sqltyd_description."</td>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count." Results</td>";
						?>
					    <?php
						    echo "<td>".$total." KGs</td>";					
						    echo "<td>".$total_packages." Pkgs</td>";
						?>						
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
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
			$( "#processingresultsqualityform" ).submit();
		}
	})
</script>
@endpush