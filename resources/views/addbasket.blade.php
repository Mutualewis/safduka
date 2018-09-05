@extends ('layouts.dashboard')
@section('page_heading','Add Basket')
@section('section')
<div class="col-sm-14 col-md-offset-1">
			<div class="row">
				<div class="col-md-6">
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

	// if (old('sale_season')  != NULL) {
	// 	$csn_season = old('sale_season');		
	// }

	// if (old('sale')  != NULL) {
	// 	$sale = old('sale');		
	// }
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
		$bskt = $pdetails->bs_id;

		$sst = $pdetails->sst_id;
		$warrant_no = $pdetails->prc_warrant_no;
		$warrant_weight = $pdetails->prc_warrant_weight;
		$comments = $pdetails->qltyd_comments;
	}



	//old('outt_number'). $outt_number }}

?>
    <div class="col-md-8">
	        <form role="form" method="POST" action="addbasket">

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

			        </div>


			    <h3>Filter</h3>			

	        	<div class="row">
		            <div class="form-group col-md-3">
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

	        		<!-- <div class="form-group col-md-3">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="sif_lot" style="text-transform:uppercase; " placeholder="Search LOT..."  value="{{ old('sif_lot'). $sif_lot }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
	        		<div class="form-group col-md-3">
	                    <input type="text" class="form-control" name="outt_number"  style="text-transform:uppercase" placeholder="Outturn" value="{{ old('outt_number'). $outt_number }}"></input>
	                </div>

		            <div class="form-group col-md-3">
		                <input type="text"  class="form-control" name="coffee_grower" style="text-transform:uppercase" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" >	                
		            </div>   -->

	        	</div>
	        	<h3>Assign to Basket</h3>	
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row">
		  
		            <div class="form-group col-md-3">
		                <label>Basket</label>
		                <select class="form-control" name="basket">
		               		<option></option>
							@if (count($basket) > 0)
										@foreach ($basket->all() as $value)
										@if ($bskt ===  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->bs_quality. " (". $value->bs_code.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		        </div>

	        	<h3>Lots In Sale</h3>	
	        	<!-- <h3  data-toggle="collapse" data-target="#green">Purchase Control   <label class="glyphicon glyphicon-menu-down"></label></h3>  -->
	        	<div class="row">
					<div class="col-md-9 col-md-offset-0 pre-scrollable">
						<form role="form" method="POST" action="addbasket">
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
										Outturn
									</th>
									<th>
										Grade
									</th>
									<th>
										Cup
									</th>
									<th>
										Raw
									</th>

									<th>
										Status
									</th>
									<th>
										Price
									</th>
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

										if (isset($sale_lots) && count($sale_lots) > 0) {

											foreach ($sale_lots->all() as $sale_lots) {
													// print_r($season->acat_id);
												$total += $sale_lots->weight; 
												$count += 1;
												$id = $sale_lots->id;

												

											
												if ($sale_lots->dnt > 0 ) {
											
													echo "<tr style='color:red;'>";
												
												} else {

													echo "<tr>";
												}

												
													echo "<td><input type='checkbox'></td>";

													echo "<td>".$sale_lots->lot."</td>";
													echo "<td>".$sale_lots->outturn."</td>";
													echo "<td>".$sale_lots->grade."</td>";
													echo "<td>".$sale_lots->cp_quality."</td>";
													echo "<td>".$sale_lots->rw_quality."</td>";
													// echo "<td>".$sale_lots->code. '('.$sale_lots->quality.')'. "</td>";
													// echo "<td>".$sale_lots->code. "</td>";
													echo "<td>".$sale_lots->status. "</td>";
													echo "<td>".$sale_lots->price. "</td>";
													// echo "<td>".$sale_lots->weight."</td>";
													echo "<input type='hidden' name ='itemId' value='$id'>";
													echo "<input type='hidden' name ='$count' value='$id'>";
													// if ($sale_lots->greencomments == "Set" || $sale_lots->dnt > 0 ) {
													// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";										
													// } else {
													// 	$count_green += 1;
													// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
													// }
													// if ($sale_lots->prcss_name != NULL || $sale_lots->dnt > 0 ) {
													// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
													// } else {
													// 	$count_process += 1;										
													// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
													// }
													// if ($sale_lots->scr_name != NULL || $sale_lots->dnt > 0 ) {
													// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
													// } else {
													// 	$count_screen += 1;
													// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
													// }

													// if ($sale_lots->cp_quality != NULL && $sale_lots->rw_quality != NULL  || $sale_lots->dnt > 0 ) {
													// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
													// } else {
													// 	$count_cup += 1;
													// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
													// }
												echo "</tr>";

				// <input type='submit' name='deletebutton' class='btn btn-lg btn-success btn-block' id= '$id' . ' value='Delete' >$id
											}
										}
									?>
									  <tr>
									  	<!-- <td>Total:</td> -->
									    <?php
										    echo "<td>".$count." Lots</td>";
										?>

									    <?php
										    echo "<td>".$count_green." Not Set</td>";
										?>
									    <?php
										    echo "<td>".$count_green." Not Set</td>";
										?>
										<?php
										    echo "<td>".$count_process." Not Set</td>";
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
						</form>
						</div>

		        </div>


	      

	<!-- 			<h3  data-toggle="collapse" data-target="#green">Bric   <label class="glyphicon glyphicon-menu-down"></label></h3>
	        	<div class="row">
		            <div class="form-group col-md-3">
		                <label>Bric Contract</label>
		                <input class="form-control" name="hedge" style="text-transform:uppercase" value="{{ old('hedge'). $hedge }}">
		            </div>	  
		        </div> -->
<!-- 			 	<div class="row">
		            <div class="form-group col-md-9"> -->
		   <!--          <div class="row">
		            <div class="form-group col-md-9"> -->



				<div class="row">
		            <div class="form-group col-md-9">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Basket</button>
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

				<?php
					}
				?>
	        </form>
	</div>
	<div class="col-md-4 col-md-offset-0 pre-scrollable">
		<form role="form" method="POST" action="addbasket">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Catalogue</h3>
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
						Cup
					</th>
					<th>
						Raw
					</th>

					<th>
						Basket
					</th>
					<th>
						Status
					</th>

					<th>
						Warrant
					</th>
					<th>
						Price
					</th>
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

						if (isset($sale_lots) && count($sale_lots) > 0) {

							foreach ($sale_lots->all() as $sale_lots) {
									// print_r($season->acat_id);
								$total += $sale_lots->weight; 
								$count += 1;
								$id = $sale_lots->id;

								

							
								if ($sale_lots->dnt > 0 ) {
							
									echo "<tr style='color:red;'>";
								
								} else {

									echo "<tr>";
								}

								
									echo "<td>".$sale_lots->lot."</td>";
									echo "<td>".$sale_lots->outturn."</td>";
									echo "<td>".$sale_lots->grade."</td>";
									echo "<td>".$sale_lots->cp_quality."</td>";
									echo "<td>".$sale_lots->rw_quality."</td>";
									// echo "<td>".$sale_lots->code. '('.$sale_lots->quality.')'. "</td>";
									echo "<td>".$sale_lots->code. "</td>";
									echo "<td>".$sale_lots->status. "</td>";
									echo "<td>".$sale_lots->warrant_no. "</td>";
									echo "<td>".$sale_lots->price. "</td>";
									// echo "<td>".$sale_lots->weight."</td>";
									echo "<input type='hidden' name ='itemId' value='$id'>";
									echo "<input type='hidden' name ='$count' value='$id'>";
									// if ($sale_lots->greencomments == "Set" || $sale_lots->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";										
									// } else {
									// 	$count_green += 1;
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }
									// if ($sale_lots->prcss_name != NULL || $sale_lots->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_process += 1;										
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }
									// if ($sale_lots->scr_name != NULL || $sale_lots->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_screen += 1;
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }

									// if ($sale_lots->cp_quality != NULL && $sale_lots->rw_quality != NULL  || $sale_lots->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_cup += 1;
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }
								echo "</tr>";

// <input type='submit' name='deletebutton' class='btn btn-lg btn-success btn-block' id= '$id' . ' value='Delete' >$id
							}
						}
					?>
					  <tr>
					  	<!-- <td>Total:</td> -->
					    <?php
						    echo "<td>".$count." Lots</td>";
						?>

					    <?php
						    echo "<td>".$count_green." Not Set</td>";
						?>
					    <?php
						    echo "<td>".$count_green." Not Set</td>";
						?>
						<?php
						    echo "<td>".$count_process." Not Set</td>";
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
		</form>
	</div>
</div>	
@stop
