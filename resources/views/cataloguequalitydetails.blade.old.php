@extends ('layouts.dashboard')
@section('page_heading','Quality Details')
@section('section')
<div class="col-sm-14 col-md-offset-0">
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
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season)) {
		$csn_season  = NULL;
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

	$screen = 0;
	$process = 0;
	$sif_lot = 0;
	$outt_number = 0;
	$coffee_grower = 0;
	$dont = 0;	
	$greencomment = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
	}

	if (isset($qdetails)){
		$prc = $qdetails->prcss_id;
		$process = $qdetails->qltyd_prcss_value;
		$scr = $qdetails->scr_id;
		$screen = $qdetails->qltyd_scr_value;
		$cupid = $qdetails->cp_id;
		$rawid = $qdetails->rw_id;
		$comments = $qdetails->qltyd_comments;
	}

?>
    <div class="col-md-6">
	        <form role="form" method="POST" action="cataloguequalitydetails">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-5 ">
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

			            <div class="form-group col-md-5" style="padding-left:20px;">
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

		           		<div class="form-group col-md-5">
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
			            <div class="form-group col-md-5">
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
							<input class='form-control' type='hidden' name='dntv' value='{{$slr}}'>

			            </div>

			        </div>



			    <h3>Lot</h3>			
	        	<div class="row">
	        		<div class="form-group col-md-5 ">	        			
	        			<button  type="submit" name="previousButton" style="margin-left: 0px; " class="glyphicon glyphicon-menu-left"></button>
	        			<label></label>
	        		</div>
	        		<div class="form-group col-md-5" >
	        			<button  type="submit" name="nextButton" class="glyphicon glyphicon-menu-right pull-right"></button>
	        		</div>
	        	</div>
	
	        	<div class="row">

	        		<div class="form-group col-md-5">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" name="sif_lot" style="text-transform:uppercase; " placeholder="Search LOT..."  value="{{ old('sif_lot'). $sif_lot }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="searchButton" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
	        		<div class="form-group col-md-5">
	                    <input type="text" class="form-control" name="outt_number"  style="text-transform:uppercase" placeholder="Outturn" value="{{ old('outt_number'). $outt_number }}"></input>
	                </div>


	        	</div>

	        	<div class="row">

		            <div class="form-group col-md-5">
		                <input type="text"  class="form-control" name="coffee_grower" style="text-transform:uppercase" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" >	                
		            </div>  

	        	</div>

				<?php
					if (isset($sif_lot) && count($sif_lot) > 0) {
						if ($dont > 0) {
				?>
							<input type="checkbox" name="dnt"  value="0" checked="checked"  onchange="this.form.submit()">&nbsp&nbsp <strong style="font-size:25px; color:red;">Do Not Touch(DNT)</strong>
				<?php
						} else {


				?>
		        			<input type="checkbox" name="dnt" value="1"  onchange="this.form.submit()">&nbsp&nbsp <strong style="font-size:25px; color:red;">Do Not Touch(DNT)</strong>
		     	<?php
		     			}
					}
				?>
		            <h3  data-toggle="collapse" data-target="#green">Green Comments   <label class="glyphicon glyphicon-menu-down"></label></h3>   
		            <?php
						if (isset($sale_lots) && count($sale_lots) > 0) {
							foreach ($sale_lots->all() as $value) {
								if($sif_lot == $value->lot){
									$greencomment = $value->greencomments;
								}								
							}
						}
					

						if ($greencomment == "Set") {
							echo "<div id='green' >";
						} else {
							echo "<div id='green'  >";
						}   
						?>     		     
			            <div class="row">

			           		<div class="form-group col-md-4">
			           			<label>Size</label>
							</div>
			
			           		<div class="form-group col-md-4">
			           			<label>Color</label>
							</div>
			           		<div class="form-group col-md-4">
			           			<label>Deffects</label>
							</div>
						</div> 
						<div class="row pre-scrollable">
							<div class="form-group col-md-4">
								@if (count($greensize) > 0)
										@foreach ($greensize->all() as $greensizes)
										<div class="row">
											<div class="form-group col-md-9">
											<?php $gid = 0 ;?>
											@if (count($greencomments) > 0)
													@foreach ($greencomments->all() as $value)
														@if ($greensizes->id == $value->qp_id)
															<input type="checkbox" checked="checked" name="greensize[]" value="{{ $greensizes->id }}"> {{ $greensizes->qp_parameter}}&nbsp&nbsp
															<?php $gid = $greensizes->id ;?>
														@endif	
											@endforeach	
											@endif
											
											@if ($gid == 0)
												<input type="checkbox" name="greensize[]" value="{{ $greensizes->id }}"> {{ $greensizes->qp_parameter}}&nbsp&nbsp
											@endif
											
											<?php $gid = 0 ;?>
											</div>
										</div>
										@endforeach
										
								@endif	
							</div>
							<div class="form-group col-md-4">
								@if (count($greencolor) > 0)
										@foreach ($greencolor->all() as $greencolors)

										<div class="row">
											<div class="form-group col-md-9">
											<?php $gid = 0 ;?>
											@if (count($greencomments) > 0)
													@foreach ($greencomments->all() as $value)
														@if ($greencolors->id == $value->qp_id)
															<input type="checkbox" checked="checked" name="greencolor[]" value="{{ $greencolors->id }}"> {{ $greencolors->qp_parameter}}&nbsp&nbsp
															<?php $gid = $greencolors->id ;?>
														@endif	
											@endforeach	
											@endif
											
											@if ($gid == 0)
												<input type="checkbox" name="greencolor[]" value="{{ $greencolors->id }}"> {{ $greencolors->qp_parameter}}&nbsp&nbsp
											@endif
											
											<?php $gid = 0 ;?>
											</div>
										</div>


										@endforeach
										
								@endif	
							</div>

							<div class="form-group col-md-4">
								@if (count($greendefects) > 0)
										@foreach ($greendefects->all() as $greendefectss)

										<div class="row">
											<div class="form-group col-md-9">
											<?php $gid = 0 ;?>
											@if (count($greencomments) > 0)
													@foreach ($greencomments->all() as $value)
														@if ($greendefectss->id == $value->qp_id)
															<input type="checkbox" checked="checked" name="greendefects[]" value="{{ $greendefectss->id }}"> {{ $greendefectss->qp_parameter}}&nbsp&nbsp
															<?php $gid = $greendefectss->id ;?>
														@endif	
											@endforeach	
											@endif
											
											@if ($gid == 0)
												<input type="checkbox" name="greendefects[]" value="{{ $greendefectss->id }}"> {{ $greendefectss->qp_parameter}}&nbsp&nbsp
											@endif
											
											<?php $gid = 0 ;?>
											</div>
										</div>
										@endforeach
										
								@endif	
							</div>


						</div>
					</div>
				</br>
				</br>


	        	<div class="row" >
		            <div class="form-group col-md-5">
		                <label>Processing Type</label>
		                <select class="form-control" name="process_type">
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

		            <div class="form-group col-md-5">
		                <label>Processing % Loss</label>
		                <input class="form-control" name="process" type="number"  value="{{ old('process').$process  }}">
		            </div>	

		        </div>


	        	<div class="row" >
		            <div class="form-group col-md-5">
		                <label>Screen Size</label>
		                <select class="form-control" name="screen_size">
		                	<option></option> 
							@if (isset($screens) && count($screens) > 0)
										@foreach ($screens->all() as $value)
											@if ($scr ==  $value->id)
												<option value="{{ $value->id }}" selected="selected">{{ $value->scr_name }}</option>
											@else
												<option value="{{ $value->id }}">{{ $value->scr_name }}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>

		            <div class="form-group col-md-5">
		                <label>Screen % Above</label>
		                <input class="form-control" name="screen" type="number"  value="{{ old('screen').$screen  }}">
		            </div>	

		        </div>


	        	<div class="row" >
		            <div class="form-group col-md-5" style="padding-left:20px;">
		            	<label>Raw Score</label>
		                <select class="form-control" name="raw">
		               		<option></option>
							@if (count($rawscore) > 0)
										@foreach ($rawscore->all() as $value)
										@if ($rawid ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->rw_score. " (".$value->rw_quality.")"}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->rw_score. " (".$value->rw_quality.")"}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-5">
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
		            <div class="form-group col-md-10">
						<label>Comments</label>
						<textarea class="form-control" rows="3" name="comments" value="{{ old('comments') }}"><?php echo htmlspecialchars($comments); ?></textarea>
		            </div>
		        </div>


				<div class="row">
		            <div class="form-group col-md-10">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Quality</button>
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
	<div class="col-md-6 col-md-offset-0 pre-scrollable" style="max-height: 800px;">
		<form role="form" method="POST" action="cataloguequalitydetails">
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
						Green
					</th>
					<th>
						Processing
					</th>
					<th>
						Screen
					</th>					
					<th>
						Cup/Raw
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
							// print_r($sale_lots);

							foreach ($sale_lots->all() as $value) {
									// print_r($season->acat_id);
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
									echo "<td class='active'>".$value->grade."</td>";
									echo "<input type='hidden' name ='itemId' value='$id'>";
									echo "<input type='hidden' name ='$count' value='$id'>";
									if ($value->greencomments == "Set" || $value->dnt > 0 ) {
										echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";										
									} else {
										$count_green += 1;
										echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									}
									if ($value->prcss_name != NULL || $value->dnt > 0 ) {
										echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									} else {
										$count_process += 1;										
										echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									}
									if ($value->scr_name != NULL || $value->dnt > 0 ) {
										echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									} else {
										$count_screen += 1;
										echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									}

									if ($value->cp_quality != NULL && $value->rw_quality != NULL  && $value->cp_quality != "NA" && $value->rw_quality != "NA" || $value->dnt > 0 ) {
										echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									} else {
										$count_cup += 1;
										echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									}
								echo "</tr>";


									// if ($value->prcss_name != NULL && $value->prcss_name != "NA" || $value->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_process += 1;										
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }
									// if ($value->scr_name != NULL && $value->scr_name != "NA" || $value->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_screen += 1;
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }

									// if ($value->cp_quality != NULL && $value->rw_quality != NULL  && $value->cp_quality != "NA" && $value->rw_quality != "NA" || $value->dnt > 0 ) {
									// 	echo "<td>"."<a href='#'  class='btn btn-success btn-block' >Set</a>";
									// } else {
									// 	$count_cup += 1;
									// 	echo "<td>"."<a href='#'  class='btn btn-danger btn-block' >Not Set</a>";
									// }
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
						    echo "<td>".$total." KGS</td>";
						?>
						<td></td>
					    <?php
						    echo "<td>".$count_green." Not Set</td>";
						?>
						<?php
						    echo "<td>".$count_process." Not Set</td>";
						?>
						<?php
						    echo "<td>".$count_screen." Not Set</td>";
						?>
						<?php
						    echo "<td>".$count_cup." Not Set</td>";
						?>
					  </tr>
				</tbody>
				</table>
		</form>
	</div>
</div>	
@stop
