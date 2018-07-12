@extends ('layouts.dashboard')
@section('page_heading','Debit Note')
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
					  </div> <!-- end .flash-message -->

				</div>				
			</div>
<?php 
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = 1;
	}
	if (!isset($csn_season)) {
		$csn_season  = 3;
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
	if (!isset($ref)) {
		$ref = NULL;
	}
	if (!isset($paymentamount)) {
		$paymentamount = NULL;
	}

	if (!isset($date)) {
		$date = NULL;
	}

	if (!isset($rawid)) {
		$rawid = NULL;
	}
	if (!isset($comments)) {
		$comments = NULL;
	}	
	if (!isset($saleid)) {
		$saleid = NULL;
	}	
	if (!isset($basket )) {
		$basket = NULL;
	}
	if (!isset($bskt)) {
		$bskt = NULL;
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
	if (!isset($grade)) {
		$grade = NULL;
	}

	if (!isset($rtid )) {
		$rtid = NULL;
	}

	if (!isset($outt_number )) {
		$outt_number = NULL;
	}

	$screen = 0;
	$process = 0;
	$sif_lot = 0;
	$coffee_grower = 0;
	$dont = 0;	
	$greencomment = 0;

	if (isset($StockQuality)){
		$cupid = $StockQuality->cp_id;
		$acidity = $StockQuality->sqltyd_acidity;
		$body = $StockQuality->sqltyd_body;
		$flavour = $StockQuality->sqltyd_flavour;
		$description = $StockQuality->sqltyd_description;
	}

	if (isset($stock_cup)){
	}
			
	if (isset($Stock)){			
		$bskt = $Stock->ibs_id;		
		$grade = $Stock->cgrad_id;
	}



?>
    <div class="col-md-14">
        <form role="form" method="POST" action="accountsdebit">

        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="row">
	            <div class="form-group col-md-6">
		            <h3>Select Contract</h3>						
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
	               	<label>Debit To</label>
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
	            	<label>Debit No.</label>
	                <select class="form-control" name="invoiced" onchange="this.form.submit()">
	               		<option></option>
						@if (isset($invoiced))
									@foreach ($invoiced->all() as $value)
									@if ($inv ==  $value->invoice)
										<option value="{{ $value->invoice }}" selected="selected">{{ $value->invoice}}</option>
									@else
										<option value="{{ $value->invoice }}">{{ $value->invoice}}</option>
									@endif
									@endforeach
								
						@endif
	                </select>
	            </div>

	            <div class="form-group col-md-3">
	            	<label>Refrence Number</label>
	           		<input class="form-control" name="ref" style="text-transform:uppercase" value="{{ old('ref'). $ref }}">
	            </div>

	            <div class="form-group col-md-3">
	            	<label>Amount ($)</label>
	           		<input class="form-control" name="paymentamount" style="text-transform:uppercase" value="{{ old('paymentamount'). $paymentamount }}">
	            </div>

	            <div class="form-group col-md-3">
	            	<label>Date</label>
	           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
	            </div>
	          
	        </div>
		<div class="row">
			<div class="col-md-14 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
						<h3>Select Outturn(s) to Move from this location</h3>
						<table class="table table-striped">
						<thead>
						<tr>
							<th>
								Add
							</th>				
							<th>
								Name
							</th>		
							<th>
								Grade
							</th>
							<th>
								Weight
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
								Pckg
							</th>
							<th>
								Location
							</th>
							<th>
								New Zone
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
								$total = 0;
								$id = 0;

								if (isset($stlocdetails)) {

									foreach ($stlocdetails->all() as $value) {
										$total += $value->btc_weight; 
										$count += 1;
										$id = $value->stid;
										$btid = $value->id;

										$total_bags += $value->btc_bags;

										$total_pkts += $value->btc_pockets;							
										if ($value->btc_instructed_by == NULL) {
											echo "<tr>";
												echo "<td><input name='batchlocation[]' type='checkbox' value='$id'></td>";
												echo "<td>".$value->name."</td>";
												echo "<td>".$value->grade."</td>";
												echo "<td>".$value->btc_weight."</td>";
												echo "<td>".$value->btc_bags."</td>";
												echo "<td>".$value->btc_pockets."</td>";
												echo "<td>".$value->code."</td>";
												echo "<td>".$value->pkg_name."</td>";
												echo "<td>".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
								                echo "<td><select class='form-control' name='newzone$id'>";
								               		echo "<option></option>";
								               		echo "<option>1</option>";
								               		echo "<option>2</option>";
								               		echo "<option>3</option>";
								               		echo "<option>4</option>";
								               		echo "<option>5</option>";
								               		echo "<option>6</option>";	
								               		echo "<option>7</option>";
								               		echo "<option>8</option>";
								               		echo "<option>9</option>";
								               		echo "<option>10</option>";
								               		echo "<option>11</option>";
								               		echo "<option>12</option>";													
								                echo "</select></td>";
												echo "<td><input name='tobewithdrawn[]' type='checkbox' value='$btid' disabled></td>";

											echo "</tr>";									
										} else if(($value->btc_instructed_by != NULL)) {
											echo "<tr style='color:#cacdd1;'>";
												echo "<td><input type='checkbox' value='$id' checked='checked' disabled></td>";
												echo "<td>".$value->name."</td>";
												echo "<td>".$value->grade."</td>";
												echo "<td>".$value->btc_weight."</td>";
												echo "<td>".$value->btc_bags."</td>";
												echo "<td>".$value->btc_pockets."</td>";
												echo "<td>".$value->code."</td>";
												echo "<td>".$value->pkg_name."</td>";
												echo "<td>".$value->loc_row.$value->loc_column.$value->btc_zone."</td>";
								                echo "<td><select class='form-control' name='newzone$id'>";
								               		echo "<option></option>";
								               		echo "<option>1</option>";
								               		echo "<option>2</option>";
								               		echo "<option>3</option>";
								               		echo "<option>4</option>";
								               		echo "<option>5</option>";
								               		echo "<option>6</option>";	
								               		echo "<option>7</option>";
								               		echo "<option>8</option>";
								               		echo "<option>9</option>";
								               		echo "<option>10</option>";
								               		echo "<option>11</option>";
								               		echo "<option>12</option>";													
								                echo "</select></td>";
												echo "<td><input name='tobewithdrawn[]' type='checkbox' value='$btid'></td>";

											echo "</tr>";										
										}


									}
								}
							?>
							  <tr>
								<td></td>					

							    <?php
							  	    echo "<td>".$count."</td>";
							  	?>
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
								<td></td>						
							  </tr>
						</tbody>
						</table>
			</div>
		</div>



	</form>

	</div>


</div>	
@stop
