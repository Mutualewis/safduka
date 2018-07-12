@extends ('layouts.dashboard')
@section('page_heading','Manage Individual')
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
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = 1;
	}
	if (!isset($date)) {
		$date = null;
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
	if (!isset($cupid)) {
		$cupid = NULL;
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


	if (!isset($contract )) {
		$contract = NULL;
	}


	if (!isset($valuebric )) {
		$valuebric = NULL;
	}


	if (!isset($bric )) {
		$bric = NULL;
	}


	if (!isset($bsktbric )) {
		$bsktbric = NULL;
	}




	if (!isset($weight )) {
		$weight = NULL;
	}



	if (!isset($wrhse )) {
		$wrhse = NULL;
	}
	if (!isset($rw)) {
		$rw = NULL;
	}
	if (!isset($clm)) {
		$clm = NULL;
	}
	if (!isset($zone)) {
		$zone   = NULL;
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
		$weight = $StockQuality->sqltyd_description;
	}

	if (isset($stock_cup)){
	}
			

	if (isset($Stock)){			
		$bskt = $Stock->ibs_id;		
		$grade = $Stock->cgrad_id;
		$weight = $Stock->st_net_weight;
	}

	// if (isset($stlocdetails)){			
	// 	$wrhse = $stlocdetails->wrid;		
	// 	$rw = $stlocdetails->loc_rowid;		
	// 	$clm = $stlocdetails->loc_columnid;
	// 	$zone = $stlocdetails->btc_zone;
	// }

?>
    <div class="col-md-5">
	        <form role="form" method="POST" action="manageindividual">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



		        	<div class="row" >
			            <div class="form-group col-md-6 ">
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
			                <select class="form-control" name="csn_season"  onchange="this.form.submit()">
			               		<option>Sale Season</option>
								@if (isset($Season))
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


	        	<div class="row">

		            <div class="form-group col-md-6">
		                <label>Grade</label>
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

		            <div class="form-group col-md-6">
		                <label >Processed (optional)</label>
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


	        	</div>



	        	<div class="row">

 		            <div class="form-group col-md-6">
		                <label>Results Type (optional)</label>
		                <select class="form-control" name="results_type">
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

	        		<div class="form-group col-md-6">
	        			<label>Outturn</label>
	                    <div class="input-group custom-search-form">
	                         <input type="text" class="form-control" name="outt_number"  style="text-transform:uppercase" placeholder="Outturn" value="{{ old('outt_number'). $outt_number }}"></input>
		                        <span class="input-group-btn">
		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	       	
	        		
	        	</div>
	        	<div class="row">
		            <div class="form-group col-md-6">
		                <label >Weight</label>
		                <input class="form-control"  id="weight"  name="weight" oninput="myFunction()" value="{{ old('weight').$weight  }}" >
		            </div>
		        </div>

				<h3>Quality</h3>

	            <div class="row">

		            <div class="form-group col-md-6">
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
		            
		            <div class="form-group col-md-6">
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


	        	<h3>Location</h3>
		        <div class="row">
		            <div class="form-group col-md-4">
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

		            <div class="form-group col-md-4">
		                <label >Row</label>
		                <select class="form-control" name="row">
		                	<option></option> 
								@if (isset($location))
									@foreach ($location->all() as $value)
										@if ($value->loc_row != NULL)
											@if ($rw ==  $value->id)
												<option value="{{ $value->loc_row }}" selected="selected">{{ $value->loc_row}}</option>
											@else
												<option value="{{ $value->loc_row }}">{{ $value->loc_row}}</option>
											@endif
										@endif
									@endforeach
										
								@endif
		                </select>
		            </div>
		            <div class="form-group col-md-4">
		                <label >Column</label>
		                <select class="form-control" name="column">
		                	<option></option> 
								@if (isset($location))
									@foreach ($location->all() as $value)
										@if ($value->loc_column != NULL)
											@if ($clm ==  $value->id)
												<option value="{{ $value->loc_column }}"  selected="selected">{{ $value->loc_column}}</option>
											@else
												<option value="{{ $value->loc_column }}">{{ $value->loc_column}}</option>
											@endif
										@endif
									@endforeach
										
								@endif
		                </select>
		            </div>	
		        </div>
		        <div class="row">
		            <div class="form-group col-md-4">
		                <label >Zone</label>
		                <input class="form-control"  name="zone" value="{{ old('zone').$zone  }}" >
		            </div>	       	
		        </div>

		        <h3>Bric</h3>
		        <div class="row">
		            <div class="form-group col-md-6">
		                <label >Contract Number</label>
		                <input class="form-control"  id="contract"  name="contract" oninput="myFunction()" value="{{ old('contract').$contract  }}" >
		            </div>	  
		            <div class="form-group col-md-6">
		                <label >Value</label>
		                <input class="form-control"  id="valuebric"  name="valuebric" oninput="myFunction()" value="{{ old('valuebric').$valuebric  }}" >
		            </div>	

		        </div>
	            <div class="row">

		            <div class="form-group col-md-6">
		                <label>Bric Basket</label>
		                <select class="form-control" name="bric">
		               		<option></option>
							@if (isset($bricbasket))
										@foreach ($bricbasket->all() as $value)
										@if ($bsktbric ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-6">
		                <label>Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date'). $date }}"/>	                
		            </div>  


		            

		       	</div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update</button>
		            </div>
		        </div>

				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="printsticker" class="btn btn-lg btn-success btn-block">Print Sticker</button>
		            </div>
		        </div>


				<?php
					$total_bags = 0;
					$count = 0;
				?>

	        </form>
	</div>
	<div class="col-md-7 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="manageindividual">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Keep Track</h3>
				<table class="table table-striped">
				<thead>
				<tr>		
					<th>
						Outturn
					</th>
					<th>
						Season
					</th>
					<th>
						Grade
					</th>
					<th>
						Weight
					</th>
					<th>
						Packages
					</th>
					<th>
						Reference
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
						$total = 0;

						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $value) {
								$total += $value->weight; 
								$count += 1;
								$id = $value->id;

								if ($value->dnt > 0 ) {
							
									echo "<tr style='color:red;'>";
								
								} else {

									echo "<tr>";
								}
								
									echo "<td>".$value->lot."</td>";
									echo "<td>".$value->outturn."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->grade."</td>";
									echo "<td>".$value->grade."</td>";
									
								echo "</tr>";


							}
						}
					?>
					  <tr>
					    <?php
						    echo "<td>".$count." Lots</td>";
						?>
						<td></td>
						<td></td>

					    <?php
						    echo "<td>".$total." KGS</td>";
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
@stop
