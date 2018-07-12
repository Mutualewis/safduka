@extends ('layouts.dashboard')
@section('page_heading','Allocation')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-10">
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
	if (old('country') != NULL) {
		$cid = old('country');
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
	if (!isset($wrhse)) {
		$wrhse = NULL;
	}
	if (!isset($bskt)) {
		$bskt = NULL;
	}
	if (!isset($basket)) {
		$basket = NULL;
	}
	if (!isset($grade)) {
		$grade = NULL;
	}
	if (!isset($sst)) {
		$sst = NULL;
	}
	if (!isset($crtid)) {
		$crtid = NULL;
	}
	if (!isset($prcf)) {
		$prcf = NULL;
	}
	if (!isset($prid)) {
		$prid = NULL;
	}
	if (!isset($scid)) {
		$scid = NULL;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season )) {
		$csn_season  = NULL;
	}	
	if (!isset($instructions_checked )) {
		$instructions_checked  = NULL;
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


?>
    <div class="col-md-10">
	        <form role="form" method="POST" action="allocate">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<h3  data-toggle="collapse" data-target="#green">Instructions   <label class="glyphicon glyphicon-menu-down"></label></h3>  
            	<div id='green' class='collapse in' >

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

			            <div class="form-group col-md-3">
			                <label >Contract Number</label>
			                <select class="form-control" name="contract" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($SalesContract) && count($SalesContract) > 0)
											@foreach ($SalesContract->all() as $value)
												@if ($scid ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->sct_number }}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->sct_number }}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
			            </div>
		        		
			        </div>

	   
			    <h3>Filter Outturns (Select Any)</h3>	

	        	<div class="row">

	        	    <div class="form-group col-md-3">
	        	    	<label>Outturn Status</label>
		                <select class="form-control" name="st_status">
		                	<option></option> 
							@if (isset($StockStatus) && count($StockStatus) > 0)
										@foreach ($StockStatus->all() as $value)
											@if ($sst ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->sts_name}}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->sts_name}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>
		            </div>
		            <div class="form-group col-md-3">
		            	<label>Season</label>
		                <select class="form-control" name="season">
		               		<option>Season</option>
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




		        </div>



	 	        <div class="row">


		            <div class="form-group col-md-3">
		                <label>Basket</label>
		                <select class="form-control" name="basket" onchange="this.form.submit()">
		               		<option></option>
							@if (count($basket) > 0)
										@foreach ($basket->all() as $value)
										@if ($bskt ==  $value->bs_code)
											<option value="{{ $value->bs_code }}" selected="selected">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@else
											<option value="{{ $value->bs_code }}">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
	           		<div class="form-group col-md-3">
	           			<label>Certification</label>
						@if (isset($Certification))
								<select class="form-control" id="certification" name="certification" onchange="this.form.submit()">
								<option></option>
								@foreach ($Certification->all() as $Certification)
					 					@if ($crtid == $Certification->crt_name)
											<option value="{{ $Certification->crt_name }}" selected="selected"> {{ $Certification->crt_name}}</option>
					
										@else
											<option value="{{ $Certification->crt_name }}"> {{ $Certification->crt_name}}</option>
										@endif
										
									<?php $gid = 0 ;?>

								@endforeach
								</select>
						@endif
					</div>

<!-- 		            <div class="form-group col-md-3">
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
		            </div> -->

		            <div class="form-group col-md-3">
		                <label>Processed</label>
			                <select class="form-control" name="process_type_filter" >
			                	<option></option> 
								@if (isset($processing) && count($processing) > 0)
											@foreach ($processing->all() as $value)
												@if ($prcf ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->prcss_name }}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->prcss_name }}</option>
												@endif

											@endforeach
										
								@endif
			                </select>	
		            </div>


	            </div>

	            <div class="row">
		            <div class="form-group col-md-3">
		            	<button type="submit" name="filter" class="btn btn-lg btn-success btn-block">Filter</button>
		            </div>

	            </div>
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
										Price
									</th>
									<th>
										Location
									</th>
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

										$submit_disabled = false;

										if (isset($StockView) && count($StockView) > 0) {

											foreach ($StockView->all() as $value) {											

												if ($value->ended == NULL) {

													$total += $value->weight; 
													$count += 1;
													$id = $value->id;

													
													$prompt_date = date("m/d/Y", strtotime($value->prompt_date));

													$date_diff = date_diff(date_create($current_date), date_create($prompt_date));

													$date_diff = $date_diff->format("%R%a days");
													//echo $date_diff;									
												
													
													echo "<tr>";
												
														if ($prc != 4) {
															if ($value->rl_no == NULL) {
																echo "<td><input name='tobeprocessed[]' type='checkbox' value='$id' ></td>";	
															} else {
																echo "<td><input name='tobeprocessed[]' type='checkbox' checked='checked' value='$id'></td>";	
															}														
														} else {
															if ($value->rl_no == NULL) {
																echo "<td><input name='tobeprocessed[]' type='checkbox' value='$id' ></td>";	
															} else {
																echo "<td><input name='tobeprocessed[]' type='checkbox' checked='checked' value='$id'></td>";	
															}														
														}

													

													echo "<td>".$value->sale."</td>";
													echo "<td>".$value->lot."</td>";
													echo "<td>".$value->name."</td>";
													echo "<td>".$value->cert."</td>";
													echo "<td>".$value->grade."</td>";
													echo "<td><input class='form-control' name='cprice[]' size='5' value='$value->weight'></td>";
													echo "<td>".$value->bags."</td>";
													echo "<td>".$value->pockets."</td>";						
													echo "<td>".$value->quality."(".$value->code.")"."</td>";		
													echo "<td width='12%'>".$value->price."</td>";						
													echo "<td width='12%'>".$value->location."</td>";						
													echo "<input type='hidden' name ='itemId' value='$id'>";
													echo "<input type='hidden' name ='$count' value='$id'>";
												echo "</tr>";

												} else if ($value->ended != NULL ) {

													$total += $value->weight; 
													$count += 1;
													$id = $value->id;

													$submit_disabled = true;

													// echo $value->sale;
													$prompt_date = date("m/d/Y", strtotime($value->prompt_date));

													$date_diff = date_diff(date_create($current_date), date_create($prompt_date));

													$date_diff = $date_diff->format("%R%a days");
													//echo $date_diff;									
												
													
													echo "<tr style='color:#cacdd1;'>";						

													if ($prc != 4) {
															echo "<td><input  type='checkbox' checked='checked' value='$id' disabled></td>";																												
														} else {
															echo "<td><input  type='checkbox' checked='checked' value='$id' disabled></td>";														
													}						
		
													echo "<td>".$value->sale."</td>";
													echo "<td>".$value->lot."</td>";
													echo "<td>".$value->name."</td>";
													echo "<td>".$value->cert."</td>";
													echo "<td>".$value->grade."</td>";
													echo "<td>".$value->weight."</td>";
													echo "<td>".$value->bags."</td>";
													echo "<td>".$value->pockets."</td>";						
													echo "<td>".$value->quality."(".$value->code.")"."</td>";
													echo "<td width='12%'>".$value->price."</td>";			
													echo "<td width='12%'>".$value->location."</td>";						
													echo "<input type='hidden' name ='itemId' value='$id'>";
													echo "<input type='hidden' name ='$count' value='$id'>";
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
					</div>


	      


				<div class="row">
				<?php
					if ($submit_disabled == true) {
						?>
				            <div class="form-group col-md-12">
				           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block" disabled>Add/Update Contract</button>
				            </div>							
						<?php
					} else {
						?>
				            <div class="form-group col-md-12">
				           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block">Add/Update Contract</button>
				            </div>						
						<?php
					}
				?>

		            <div class="form-group col-md-12">
		           		<button type="submit" name="printreleaseinstructions" class="btn btn-lg btn-success btn-block">Print Contract</button>
		            </div>
		        </div>
			</form>

	</div>
	<!--  -->
</div>	
@stop
