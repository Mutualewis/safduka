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
	if (!isset($sale_season)) {
		$sale_season  = NULL;
	}
	if (!isset($seller_id)) {
		$seller_id  = NULL;
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
	if (!isset($sale_id)) {
		$sale_id = NULL;
	}	

	if (!isset($timeout)) {
		$timeout = 0;
	}	

	$screen = 0;
	$process = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$ot_season = NULL;
	$coffee_grower = NULL;
	$grade = NULL;
	$cnetweight = NULL;
	$bags = NULL;
	$pockets = NULL;
	$ot_season = NULL;
	$warehouse = NULL;
	$millid = NULL;
	$process = NULL;
	$screen = NULL;
	$greencomment = NULL;
	$largest = NULL;
	$cidd = NULL;

	if (isset($cdetails)){
		$cidd = $cdetails->id;
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
		$grade = $cdetails->cgrad_id;
		$cnetweight = $cdetails->cfd_weight;
		$bags = $cdetails->cfd_bags;
		$pockets = $cdetails->cfd_pockets;

		$seller_id = $cdetails->slr_id;
		$warehouse = $cdetails->wr_id;
		$millid = $cdetails->ml_id;

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
    <div class="col-md-12">
	        <form role="form" method="POST" action="cataloguequalitydetails">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-12 ">
			                <label>Country</label>
			                <select class="form-control" id="country" name="country"  onchange="this.form.submit()">
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

			         </div>

			         <div class="row" >

			            <div class="form-group col-md-12" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" id="sale_season" name="sale_season">
			               		<option>Sale Season</option>
								@if (isset($Season) && count($Season) > 0)
											@foreach ($Season->all() as $season)
											@if ($sale_season ==  $season->id)
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

		           		<div class="form-group col-md-12">
			                <label>Sale</label>
			                <select class="form-control" id="sale" name="sale">
			                	<option>Sale No.</option> 
								@if (isset($sale) && count($sale) > 0)
									@foreach ($sale->all() as $sales)
										@if ($sale_id ==  $sales->id)
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
			            <div class="form-group col-md-12">
			                <label>Seller(Should Be Selected)</label>
			                <select class="form-control" id="seller" name="seller">
			                	<option></option> 
								@if (isset($seller) && count($seller) > 0)
											@foreach ($seller->all() as $sellers)
												@if ($seller_id ==  $sellers->id)
													<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
												@else
													<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>
			            </div>
			        </div>

			        <div class="row">

			            <div class="form-group col-md-4">
			            	<button type="submit" name="submitlot" class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalGreenCenter'onclick='displayGreen(event, this, null, null, null, null, null)' data-dprtname='{$value->dprt_name}'>Green</button>
						</div>	

			            <div class="form-group col-md-4">
							<button type="submit" name="submitlot" class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalScreenCenter'onclick='displayScreen(event, this, null, null, null, null, null)' data-dprtname='{$value->dprt_name}'>Screen</button>
						</div>	

			            <div class="form-group col-md-4">
			            	<button type="submit" name="submitlot" class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalCupCenter' onclick='displayCup(event, this, null, null, null, null, null)' data-dprtname='{$value->dprt_name}'>Cup</button>

						</div>	

					</div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Quality</button>
		            </div>

		        </div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmquality" class="btn btn-lg btn-danger btn-block">Confirm Quality</button>
		            </div>
		        </div>

	        </form>
	</div>

	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModalGreenCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Outturns Green Analysis</h4>
				<button type="button" name="button_previous_green" id="button_previous_green" class="btn btn-default btn-prev" style="font-size: 35px;">Prev</button>
		        <button type="button" name="button_next_green" id="button_next_green" class="btn btn-default btn-next" style="font-size: 35px;">Next</button>
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id = "green" style="font-size: 35px;">
	      	<div>
	        	<div class="row">

	        		<div class="form-group col-md-4">
                       <input type="text" class="form-control" id="lot_number" name="lot_number" style="text-transform:uppercase; " placeholder="Lot ..." value="{{ old('lot_number') }}"></input>
	                </div>	

	        		<div class="form-group col-md-4">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number" name="outt_number" style="text-transform:uppercase; " placeholder="Search Outturn..."></input>

		                        <span class="input-group-btn">

		                        <button type="submit" id="search_button_green" name="search_button_green" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade" name="coffee_grade" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
								@foreach ($CoffeeGrade->all() as $cgrade)											
									<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
								@endforeach									
							@endif
		                </select>	

		                <input type="hidden" id="cfd_id" name="cfd_id">		

		            </div>        


		            <div class="form-group col-md-4">
		                <input type="text"  class="form-control" id="coffee_grower" name="coffee_grower" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" >	                
		            </div>  

	        	</div>

    			<input type="checkbox" id="dnt" name="dnt" >&nbsp&nbsp <strong style="font-size:35px; color:red;">Do Not Touch(DNT)</strong>

				<h3  data-toggle="collapse" data-target="#green">Green Comments </h3> 

				<div class="tabpanel">

				    <!-- Nav tabs -->
				    <ul class="nav nav-tabs" role="tablist">


				            <li role="presentation" class="active">
				                <a href="#tab-green" aria-controls="#tab-green" role="tab" data-toggle="tab">Green Size</a
				            </li>
				            <li role="presentation">
				                <a href="#tab-color" aria-controls="#tab-color" role="tab" data-toggle="tab">Color</a
				            </li>
				             <!-- onclick="doFunction();"  -->
				            <li role="presentation">
				                <a href="#tab-deffects" aria-controls="#tab-deffects" role="tab" data-toggle="tab">Deffects</a
				            </li>
				            <li role="presentation">
				                <a href="#tab-processing" aria-controls="#tab-processing" role="tab" data-toggle="tab">Processing</a
				            </li>
				            <li role="presentation">
				                <a href="#tab-raw" aria-controls="#tab-raw" role="tab" data-toggle="tab">Raw</a
				            </li>
				    
				    </ul>

				    <!-- Tab panes -->
				    <div class="tab-content">

				            <div role="tabpanel" class="tab-pane active" class="tab-pane" id="tab-green">

					        	<div class="row" >
						            <div class="form-group col-md-12">

						                <table align="left">		                	
						                	<?php

						                		if (isset($greensize) && count($greensize) > 0){

						                			$count = 0;

						                			foreach ($greensize->all() as $value){

						                				$count += 1;

						                				if ($count > 1) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<td><label><input type="radio" id="gs'.$value->id.'" name="greensizes" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

						                			}


						                		}

						                	?>	      
						                	</tr>          	
						                </table>
						            </div>
						        </div>


				            </div>

				            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-color">


						        <div class="row">		        	

						            <div class="form-group col-md-12">

						                <table align="left">		                	
						                	<?php

						                		if (isset($greencolor) && count($greencolor) > 0){

						                			$count = 0;

						                			foreach ($greencolor->all() as $value){

						                				$count += 1;

						                				if ($count > 2) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<td><label><input type="radio" id="gc'.$value->id.'" name="greencolor" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

						                			}


						                		}

						                	?>	      
						                	</tr>          	
						                </table>

						            </div>

						        </div>


				            </div>

				            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-deffects">

						        <div class="row">
						            <div class="form-group col-md-6">

						                <table align="left">		                	
						                	<?php

						                		if (isset($greendefects) && count($greendefects) > 0){

						                			$count = 0;

						                			foreach ($greendefects->all() as $value){

						                				$count += 1;

						                				if ($count > 3) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<td><label><input type="checkbox" id="gd'.$value->id.'" name="greendefects" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

						                			}


						                		}

						                	?>	      
						                	</tr>          	
						                </table>

						            </div>
						        </div>

				            </div>

				            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-processing">

					        	<div class="row" >
						            <div class="form-group col-md-12">

						                <table align="left">		                	
						                	<?php

						                		if (isset($processing) && count($processing) > 0){

						                			$count = 0;

						                			foreach ($processing->all() as $value){

						                				$count += 1;

						                				if ($count > 1) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<td><label><input type="radio" id="process_type'.$value->id.'" name="process_type" value="'.$value->id.'">&nbsp&nbsp'.$value->prcss_name.'</input>&nbsp&nbsp </label></td>';

						                			}

						                		}

						                		echo "</tr>";

						                	?>	        	
						                </table>

						            </div>
						            </br>
						        </div>
						        <div class="row" >

						            <div class="form-group col-md-6">
						                <label>Processing % Loss</label>
						                <input class="form-control" id="process" name="process" type="number" value="0" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
						            </div>	

						        </div>

				            </div>

				            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-raw">

					        	<div class="row" >

						            <div class="form-group col-md-6" style="padding-left:20px;">

						                <table align="left">	

						                	<?php

						                		if (isset($rawscore) && count($rawscore) > 0){

						                			$count = 0;

						                			foreach ($rawscore->all() as $value){

						                				$count += 1;

						                				if ($count > 3) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<label><input type="radio" id="raw'.$value->id.'" name="raw" value="'.$value->id.'">&nbsp&nbsp'.$value->rw_score.'</input>&nbsp&nbsp </label></td>';

						                				// echo '<td><label><input type="checkbox" id="raw'.$value->id.'" name="raw" value="'.$value->id.'">&nbsp&nbsp'.$value->rw_quality.'</input>&nbsp&nbsp </label>';

						                			}

						                		}

						                	?>	  

						                </table>

						            </div>

						            <div class="form-group col-md-12">
										<label>Comments</label>
										<textarea class="form-control" rows="3" id="comments" name="comments" value = "{{ old('comments') }}" style="text-transform:uppercase; font-size: 15px; font-weight: bold;"><?php echo htmlspecialchars($comments); ?></textarea>
						            </div>
						        </div>	 

				            </div>
				        
				    </div>

				</div>


			</div>		
	      </div>
	      <div class="modal-footer">
	        <button type="button" name="button_save_green" id="button_save_green" class="btn btn-primary btn-block" style="font-size: 35px;">Save</button>
	        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModalScreenCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Outturns Screen Analysis</h4>
				<button type="button" name="button_previous_screen" id="button_previous_screen" class="btn btn-default btn-prev" style="font-size: 35px;">Prev</button>
		        <button type="button" name="button_next_screen" id="button_next_screen" class="btn btn-default btn-next" style="font-size: 35px;">Next</button>
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id="screen_div"  style="font-size: 35px;">
	      	<div>
	        	<div class="row">

	        		<div class="form-group col-md-4">
                       <input type="text" class="form-control" id="lot_number_screen" name="lot_number_screen" style="text-transform:uppercase; " placeholder="Lot ..." value="{{ old('lot_number') }}"></input>
	                </div>	

	        		<div class="form-group col-md-4">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_screen" name="outt_number" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;" placeholder="Search Outturn..."  value="{{ old('outt_number'). $outt_number }}" ></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="search_button_screen" id="search_button_screen" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_screen" name="coffee_grade"  style="height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
								@foreach ($CoffeeGrade->all() as $cgrade)											
									<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
								@endforeach									
							@endif
		                </select>		

		                <input type="hidden" id="cfd_id_screen" name="cfd_id_screen">		

		            </div>       


		            <div class="form-group col-md-4">
		                <input type="text"  class="form-control" id="coffee_grower_screen" name="coffee_grower" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" >	                
		            </div>  

	        	</div>

	        	<div class="row" >
		            <div class="form-group col-md-6">
		                <label>Screen Size</label></br>
							@if (isset($screens) && count($screens) > 0)
										@foreach ($screens->all() as $value)										
											<label><input type="radio" id="screen_size{{ $value->id }}" name="screen_size" value="{{ $value->id }}">&nbsp&nbsp {{ $value->scr_name }}</label> </br>
										@endforeach									
							@endif
		            </div>
		        </div>
		        <div class="row" >
		            <div class="form-group col-md-6">
		                <label>Screen % Above</label>
		                <input class="form-control" id="screen" name="screen" type="number"  value="0" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		            </div>	

		        </div>        	
			</div>		
	      </div>
	      <div class="modal-footer">
	        <button type="button" name="button_save_screen" id="button_save_screen" class="btn btn-primary btn-block" style="font-size: 35px;">Save</button>
	        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModalCupCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Outturns Green Analysis</h4>
				<button type="button" name="button_previous_cup" id="button_previous_cup" class="btn btn-default btn-prev" style="font-size: 35px;">Prev</button>
		        <button type="button" name="button_next_cup" id="button_next_cup" class="btn btn-default btn-next" style="font-size: 35px;">Next</button>
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id="cup_div" style="font-size: 35px;">
	      	<div>
	        	<div class="row">

	        		<div class="form-group col-md-4">
                       <input type="text" class="form-control" id="lot_number_cup" name="lot_number_cup" style="text-transform:uppercase; " placeholder="Lot ..." value="{{ old('lot_number') }}"></input>
	                </div>	

	        		<div class="form-group col-md-4">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_cup" name="outt_number" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;" placeholder="Search Outturn..."  value="{{ old('outt_number'). $outt_number }}"></input>

		                        <span class="input-group-btn">

		                        <button type="submit" name="search_button_cup" id="search_button_cup" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
	                    </div>
	                </div>	
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_cup" name="coffee_grade" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($CoffeeGrade) && count($CoffeeGrade) > 0)
								@foreach ($CoffeeGrade->all() as $cgrade)											
									<option value="{{ $cgrade->id }}">{{ $cgrade->cgrad_name}}</option>
								@endforeach									
							@endif
		                </select>		

		                <input type="hidden" id="cfd_id_cup" name="cfd_id_cup">	

		            </div>	        


		            <div class="form-group col-md-4">
		                <input type="text"  class="form-control" id="coffee_grower_cup" name="coffee_grower" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;" placeholder="Grower Mark" value="{{ old('coffee_grower'). $coffee_grower }}" >	                
		            </div>  

	        	</div>

    			<input type="checkbox" id="dnt_cp" name="dnt_cp"  onchange="this.form.submit()">&nbsp&nbsp <strong style="font-size:25px; color:red;">Do Not Touch(DNT)</strong>

	        	<div class="row" >
		            <div class="form-group col-md-6">
		                <label>Cup Score</label></br>
		                <table align="left">		                	
		                	<?php

		                		if (isset($cupscore) && count($cupscore) > 0){

		                			$count = 0;

		                			foreach ($cupscore->all() as $value){

		                				$count += 1;

		                				if ($count > 3) {

		                					$count = 1;

		                					echo "</tr>";

		                					echo "<tr>";

		                				} else if ($count == 0) {

		                					echo "<tr>";

		                				}

		                				echo '<td><label><input type="radio" id="cup'.$value->id.'" name="cup" value="'.$value->id.'">&nbsp&nbsp'.$value->cp_score.'</input>&nbsp&nbsp </label></td>';

		                			}


		                		}

		                	?>	      
		                	</tr>          	
		                </table>
		            </div>
		        </div>

		        <div class="row">
		        	<div class="form-group col-md-4">
		        		<label>Acidity</label>
						<input class="form-control" id="acidity" name="acidity" type="number"  value="{{ old('acidity')  }}" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
					</div>
					<div class="form-group col-md-4">
						<label>Body</label>
						<input class="form-control" id="body" name="body" type="number"  value="{{ old('body')}}" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
					</div>
					<div class="form-group col-md-4">
						<label>Flavour</label>
						<input class="form-control" id="flavour" name="flavour" type="number"  value="{{ old('flavour') }}" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
					</div>
				</div>		        

	        	<div class="row">
		            <div class="form-group col-md-12">
						<label>Comments</label>
						<textarea class="form-control" rows="3" id="comments_cp" name="comments_cp" value="{{ old('comments_cp') }}" style="text-transform:uppercase; height: 35px;  font-weight: bold;"><?php echo htmlspecialchars($comments); ?></textarea>
		            </div>
		        </div>	 
			</div>		
	      </div>
	      <div class="modal-footer">
	        <button type="button" name="button_save_cup" id="button_save_cup" class="btn btn-primary btn-block" style="font-size: 35px;">Save</button>
	        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<?php

		if (isset($sale_lots)) {

			echo '<script type="text/javascript">',
			     'displayLot();',
			     '</script>'
			;

		}

	?>
		
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#cataloguequalitydetailsform" ).submit();
		}
	})


</script>

<script type="text/javascript">


	function fetch_url(cfd_id, direction, lot_number, outt_number, coffee_grade) {

		var country_id = document.getElementById("country").value;

		var sale_season = document.getElementById("sale_season").value;

		var sale_number = document.getElementById("sale").value;

		var seller = document.getElementById("seller").value;

		if (country_id == "") {

			country_id = 0;

		}
		if (sale_season == "") {

			sale_season = 0;

		}
		if (sale_number == "") {

			sale_number = 0;

		}
		if (seller == "") {

			seller = 0;

		}	
		if (cfd_id == "") {

			cfd_id = 0;

		}	
		if (direction == "") {

			direction = 0;

		}			

		var url = '{{ route('cataloguequalitydetails.getLots',['country_id'=>":id",'sale_season'=>":slssn",'sale_number'=>":slno",'seller'=>":slr",'cfd_id'=>":cfd_id",'direction'=>":direction",'lot_number'=>":lot_number",'outt_number'=>":outt_number",'coffee_grade'=>":coffee_grade"]) }}';

		url = url.replace(':id', country_id);

		url = url.replace(':cfd_id', cfd_id);

		url = url.replace(':slssn', sale_season);

		url = url.replace(':slno', sale_number);

		url = url.replace(':slr', seller);

		url = url.replace(':direction', direction);

		url = url.replace(':lot_number', lot_number);

		url = url.replace(':outt_number', outt_number);

		url = url.replace(':coffee_grade', coffee_grade);

		return url;

	}

	function closeBootBox () {

		var $timeout = <?php echo $timeout; ?>;

		window.setTimeout(function(){
		    bootbox.hideAll();
		}, $timeout);		

	}


	function clearChildren(element) {
	   for (var i = 0; i < element.childNodes.length; i++) {
	      var e = element.childNodes[i];
	      if (e.tagName) switch (e.tagName.toLowerCase()) {
	         case 'input':
	            switch (e.type) {
	               case "radio":
	               case "checkbox": e.checked = false; break;
	               case "button":
	               case "submit":
	               case "image": break;
	               default: e.value = ''; break;
	            }
	            break;
	         case 'select': e.selectedIndex = 0; break;
	         case 'textarea': e.innerHTML = ''; break;
	         default: clearChildren(e);
	      }
	   }
	}

	function displayGreen (event, value, cfd_id, direction, lot_number, outt_number, coffee_grade){

		clearChildren(document.getElementById("green"));

		var url = fetch_url(cfd_id, direction, lot_number, outt_number, coffee_grade); 

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);

		    document.getElementById('lot_number').value = obj.cfd_lot_no;

		    document.getElementById('outt_number').value = obj.cfd_outturn;

		    document.getElementById('coffee_grade').value = obj.cgrad_id;

		    document.getElementById('cfd_id').value = obj.cfd_id;

		    document.getElementById('coffee_grower').value = obj.cfd_grower_mark;

		    if (obj.cfd_dnt == 1) {

		    	document.getElementById("dnt").checked = true;

		    } else {

		    	document.getElementById("dnt").checked = false;

		    }

		    var quality_params = null;

			quality_params = obj.qualityParameterID;

			if (quality_params != null) {

				$.each(quality_params.split(","), function(i,e){

			    	var str1_gd = "gd";

					var str2_gd = e;

					var res_gd = str1_gd.concat(str2_gd);

					if (document.getElementById(res_gd) != null) {
					
						document.getElementById(res_gd).checked = true;
					
					}

			    	var str1_gc = "gc";

					var str2_gc = e;

					var res_gc = str1_gc.concat(str2_gc);

					if (document.getElementById(res_gc) != null) {
					
						document.getElementById(res_gc).checked = true;
					
					}


			    	var str1_gs = "gs";

					var str2_gs = e;

					var res_gs = str1_gs.concat(str2_gs);

					if (document.getElementById(res_gs) != null) {

						document.getElementById(res_gs).checked = true;
					}

			    	var str1_pt = "process_type";

					var str2_pt = obj.prcss_id;

					var res_pt = str1_pt.concat(str2_pt);

					if (document.getElementById(res_pt) != null) {

						document.getElementById(res_pt).checked = true;
					}

					if (obj.qltyd_prcss_value != null) {

						document.getElementById('process').value = obj.qltyd_prcss_value;

					} else {

						document.getElementById('process').value =  0;
					}

	        

			    	var str1_rw = "raw";

					var str2_rw = obj.rw_id;

					var res_rw = str1_rw.concat(str2_rw);

					if (document.getElementById(res_rw) != null) {

						document.getElementById(res_rw).checked = true;
					}


					if (obj.qltyd_comments != null) {

						document.getElementById('comments').value = obj.qltyd_comments; 

					} else {

						document.getElementById('comments').value = 'empty';
					}

		
				});	



			} else {

				document.getElementById('comments').value = 'empty';

				document.getElementById('process').value =  0;

			}

        });


		event.preventDefault();

	}

	function displayScreen(event, value, cfd_id, direction, lot_number, outt_number, coffee_grade){

		clearChildren(document.getElementById("screen_div"));

		var url = fetch_url(cfd_id, direction, lot_number, outt_number, coffee_grade);

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);

		    document.getElementById('lot_number_screen').value = obj.cfd_lot_no;

		    document.getElementById('outt_number_screen').value = obj.cfd_outturn;

		    document.getElementById('coffee_grade_screen').value = obj.cgrad_id;

		    document.getElementById('cfd_id_screen').value = obj.cfd_id;

		    document.getElementById('coffee_grower_screen').value = obj.cfd_grower_mark;

	    	var str1_ss = "screen_size";

			var str2_ss = obj.scr_id;

			var res_ss = str1_ss.concat(str2_ss);

			if (document.getElementById(res_ss) != null) {

				document.getElementById(res_ss).checked = true;
			}

			document.getElementById('screen').value = obj.qltyd_scr_value;

        });

		event.preventDefault();

	}

	function displayCup(event, value, cfd_id, direction, lot_number, outt_number, coffee_grade){

		clearChildren(document.getElementById("cup_div"));

		var url = fetch_url(cfd_id, direction, lot_number, outt_number, coffee_grade);

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);

		    document.getElementById('lot_number_cup').value = obj.cfd_lot_no;

		    document.getElementById('outt_number_cup').value = obj.cfd_outturn;

		    document.getElementById('coffee_grade_cup').value = obj.cgrad_id;

		    document.getElementById('cfd_id_cup').value = obj.cfd_id;

		    document.getElementById('coffee_grower_cup').value = obj.cfd_grower_mark;

		    if (obj.cfd_dnt == 1) {

		    	document.getElementById("dnt_cp").checked = true;

		    } else {

		    	document.getElementById("dnt_cp").checked = false;

		    }

	    	var str1_cp = "cup";

			var str2_cp = obj.cp_id;

			var res_cp = str1_cp.concat(str2_cp);

			if (document.getElementById(res_cp) != null) {

				document.getElementById(res_cp).checked = true;
			}

			if (obj.qltyd_comments != null) {

				document.getElementById('comments_cp').value = obj.qltyd_comments; 

			} else {

				document.getElementById('comments_cp').value = 'empty';
			}

			if (obj.qltyd_acidity != null) {

				document.getElementById('acidity').value = obj.qltyd_acidity; 

			} else {

				document.getElementById('acidity').value = 0;
			}

			if (obj.qltyd_body != null) {

				document.getElementById('body').value = obj.qltyd_body; 

			} else {

				document.getElementById('body').value = 0;
			}

			if (obj.qltyd_flavour != null) {

				document.getElementById('flavour').value = obj.qltyd_flavour; 

			} else {

				document.getElementById('flavour').value = 0;
			}


        });	

		event.preventDefault();

	}


	$(document).ready(function() {	

		$('#button_next_green').on('click', function(){

			var cfd_id = document.getElementById("cfd_id").value;

			var direction = 'Next';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}


		    var greensize = {};

		    greensize = $('input[name=greensizes]:checked').map(function(){

		        return this.value;

		    }).get();

		    greensize = JSON.stringify(greensize);


		    var greencolor = {};

		    greencolor = $('input[name=greencolor]:checked').map(function(){

		        return this.value;

		    }).get();

		    greencolor = JSON.stringify(greencolor);


		    var greendefects = {};

		    greendefects = $('input[name=greendefects]:checked').map(function(){

		        return this.value;

		    }).get();

		    greendefects = JSON.stringify(greendefects);


		    var process_type = {};

		    process_type = $('input[name=process_type]:checked').map(function(){

		        return this.value;

		    }).get();

		    process_type = JSON.stringify(process_type);


			if (document.getElementById("process") != null) {

				var process_loss = document.getElementById("process").value;	

			} else {

				var process_loss = null;

			}

		    var raw = {};

		    raw = $('input[name=raw]:checked').map(function(){

		        return this.value;

		    }).get();

		    raw = JSON.stringify(raw);

			if (document.getElementById("comments") != null) {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveGreen',['cfd_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'process_type'=>":process_type",'process_loss'=>":process_loss",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			url = url.replace(':process_type', process_type);

			url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    		
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_previous_green').on('click', function(){

			var cfd_id = document.getElementById("cfd_id").value;

			var direction = 'Previous';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}



		    var greensize = {};

		    greensize = $('input[name=greensizes]:checked').map(function(){

		        return this.value;

		    }).get();

		    greensize = JSON.stringify(greensize);


		    var greencolor = {};

		    greencolor = $('input[name=greencolor]:checked').map(function(){

		        return this.value;

		    }).get();

		    greencolor = JSON.stringify(greencolor);


		    var greendefects = {};

		    greendefects = $('input[name=greendefects]:checked').map(function(){

		        return this.value;

		    }).get();

		    greendefects = JSON.stringify(greendefects);


		    var process_type = {};

		    process_type = $('input[name=process_type]:checked').map(function(){

		        return this.value;

		    }).get();

		    process_type = JSON.stringify(process_type);


			if (document.getElementById("process") != null) {

				var process_loss = document.getElementById("process").value;	

			} else {

				var process_loss = null;

			}

		    var raw = {};

		    raw = $('input[name=raw]:checked').map(function(){

		        return this.value;

		    }).get();

		    raw = JSON.stringify(raw);

			if (document.getElementById("comments") != null) {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveGreen',['cfd_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'process_type'=>":process_type",'process_loss'=>":process_loss",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			url = url.replace(':process_type', process_type);

			url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);


			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_save_green').on('click', function(){
			var cfd_id = document.getElementById("cfd_id").value;

			var direction = 'Next';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}


		    var greensize = {};

		    greensize = $('input[name=greensizes]:checked').map(function(){

		        return this.value;

		    }).get();

		    greensize = JSON.stringify(greensize);


		    var greencolor = {};

		    greencolor = $('input[name=greencolor]:checked').map(function(){

		        return this.value;

		    }).get();

		    greencolor = JSON.stringify(greencolor);


		    var greendefects = {};

		    greendefects = $('input[name=greendefects]:checked').map(function(){

		        return this.value;

		    }).get();

		    greendefects = JSON.stringify(greendefects);


		    var process_type = {};

		    process_type = $('input[name=process_type]:checked').map(function(){

		        return this.value;

		    }).get();

		    process_type = JSON.stringify(process_type);


			if (document.getElementById("process") != null) {

				var process_loss = document.getElementById("process").value;	

			} else {

				var process_loss = null;

			}

		    var raw = {};

		    raw = $('input[name=raw]:checked').map(function(){

		        return this.value;

		    }).get();

		    raw = JSON.stringify(raw);

			if (document.getElementById("comments") != null) {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveGreen',['cfd_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'process_type'=>":process_type",'process_loss'=>":process_loss",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			url = url.replace(':process_type', process_type);

			url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);


			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#search_button_green').on('click', function(){

			var direction = 'Search';

			var lot_number = null;

			lot_number = document.getElementById("lot_number").value;

			if (lot_number == "") {

				lot_number = 0;

			}


			var outt_number = null;

			outt_number = document.getElementById("outt_number").value;

			if (outt_number == "") {

				outt_number = 0;

			}

			var coffee_grade = null;

			coffee_grade = document.getElementById("coffee_grade").value;

			if (coffee_grade == "") {

				coffee_grade = 0;

			}



			displayGreen(event, null, null, direction, lot_number, outt_number, coffee_grade);

		});





		$('#button_next_screen').on('click', function(){

			var cfd_id = document.getElementById("cfd_id_screen").value;

			var direction = 'Next';

		    var screen_size = {};

		    screen_size = $('input[name=screen_size]:checked').map(function(){

		        return this.value;

		    }).get();

			if (document.getElementById("screen") != null) {

				var screen = document.getElementById("screen").value;

			} else {

				var screen = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveScreen',['cfd_id'=>":id",'screen_size'=>":screen_size",'screen'=>":screen"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':screen_size', screen_size);

			url = url.replace(':screen', screen);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});



		});


		$('#button_previous_screen').on('click', function(){

			var cfd_id = document.getElementById("cfd_id_screen").value;

			var direction = 'Previous';

		    var screen_size = {};

		    screen_size = $('input[name=screen_size]:checked').map(function(){

		        return this.value;

		    }).get();

			if (document.getElementById("screen") != null) {

				var screen = document.getElementById("screen").value;

			} else {

				var screen = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveScreen',['cfd_id'=>":id",'screen_size'=>":screen_size",'screen'=>":screen"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':screen_size', screen_size);

			url = url.replace(':screen', screen);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_save_screen').on('click', function(){

			var cfd_id = document.getElementById("cfd_id_screen").value;

			var direction = 'Next';

		    var screen_size = {};

		    screen_size = $('input[name=screen_size]:checked').map(function(){

		        return this.value;

		    }).get();

			if (document.getElementById("screen") != null) {

				var screen = document.getElementById("screen").value;

			} else {

				var screen = null;

			}


			var url = '{{ route('cataloguequalitydetails.saveScreen',['cfd_id'=>":id",'screen_size'=>":screen_size",'screen'=>":screen"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':screen_size', screen_size);

			url = url.replace(':screen', screen);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#search_button_screen').on('click', function(){

			var direction = 'Search';

			var lot_number = null;

			lot_number = document.getElementById("lot_number_screen").value;

			if (lot_number == "") {

				lot_number = 0;

			}


			var outt_number = null;

			outt_number = document.getElementById("outt_number_screen").value;

			if (outt_number == "") {

				outt_number = 0;

			}

			var coffee_grade = null;

			coffee_grade = document.getElementById("coffee_grade_screen").value;

			if (coffee_grade == "") {

				coffee_grade = 0;

			}

			displayScreen(event, null, null, direction, lot_number, outt_number, coffee_grade);

		});






		$('#button_next_cup').on('click', function(){

 			var cfd_id = document.getElementById("cfd_id_cup").value;

		    var cup = {};

		    var direction = 'Next';

		    cup = $('input[name=cup]:checked').map(function(){

		        return this.value;

		    }).get();


			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt_cp = document.getElementById("dnt_cp").value;

			} else {

				var dnt_cp = null;

			}


			if (document.getElementById("acidity") != null) {

				var acidity = document.getElementById("acidity").value;

			} else {

				var acidity = null;

			}

			if (document.getElementById("body") != null) {

				var body = document.getElementById("body").value;

			} else {

				var body = null;

			}

			if (document.getElementById("flavour") != null) {

				var flavour = document.getElementById("flavour").value;

			} else {

				var flavour = null;

			}

			if (document.getElementById("comments_cp") != null) {

				var comments_cp = document.getElementById("comments_cp").value;

			} else {

				var comments_cp = null;

			}

			var url = '{{ route('cataloguequalitydetails.saveCup',['cfd_id'=>":id",'cup'=>":cup",'dnt_cp'=>":dnt_cp",'acidity'=>":acidity",'body'=>":body",'flavour'=>":flavour",'comments_cp'=>":comments_cp"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':cup', cup);

			url = url.replace(':dnt_cp', dnt_cp);

			url = url.replace(':acidity', acidity);

			url = url.replace(':body', body);

			url = url.replace(':flavour', flavour);

			url = url.replace(':comments_cp', comments_cp);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});


			

		});

		$('#button_previous_cup').on('click', function(){

 			var cfd_id = document.getElementById("cfd_id_cup").value;

		    var cup = {};

		    var direction = 'Previous';

		    cup = $('input[name=cup]:checked').map(function(){

		        return this.value;

		    }).get();


			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt_cp = document.getElementById("dnt_cp").value;

			} else {

				var dnt_cp = null;

			}


			if (document.getElementById("acidity") != null) {

				var acidity = document.getElementById("acidity").value;

			} else {

				var acidity = null;

			}

			if (document.getElementById("body") != null) {

				var body = document.getElementById("body").value;

			} else {

				var body = null;

			}

			if (document.getElementById("flavour") != null) {

				var flavour = document.getElementById("flavour").value;

			} else {

				var flavour = null;

			}

			if (document.getElementById("comments_cp") != null) {

				var comments_cp = document.getElementById("comments_cp").value;

			} else {

				var comments_cp = null;

			}

			var url = '{{ route('cataloguequalitydetails.saveCup',['cfd_id'=>":id",'cup'=>":cup",'dnt_cp'=>":dnt_cp",'acidity'=>":acidity",'body'=>":body",'flavour'=>":flavour",'comments_cp'=>":comments_cp"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':cup', cup);

			url = url.replace(':dnt_cp', dnt_cp);

			url = url.replace(':acidity', acidity);

			url = url.replace(':body', body);

			url = url.replace(':flavour', flavour);

			url = url.replace(':comments_cp', comments_cp);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_save_cup').on('click', function(){

 			var cfd_id = document.getElementById("cfd_id_cup").value;

		    var cup = {};

		    var direction = 'Next';

		    cup = $('input[name=cup]:checked').map(function(){

		        return this.value;

		    }).get();


			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt_cp = document.getElementById("dnt_cp").value;

			} else {

				var dnt_cp = null;

			}


			if (document.getElementById("acidity") != null) {

				var acidity = document.getElementById("acidity").value;

			} else {

				var acidity = null;

			}

			if (document.getElementById("body") != null) {

				var body = document.getElementById("body").value;

			} else {

				var body = null;

			}

			if (document.getElementById("flavour") != null) {

				var flavour = document.getElementById("flavour").value;

			} else {

				var flavour = null;

			}

			if (document.getElementById("comments_cp") != null) {

				var comments_cp = document.getElementById("comments_cp").value;

			} else {

				var comments_cp = null;

			}

			var url = '{{ route('cataloguequalitydetails.saveCup',['cfd_id'=>":id",'cup'=>":cup",'dnt_cp'=>":dnt_cp",'acidity'=>":acidity",'body'=>":body",'flavour'=>":flavour",'comments_cp'=>":comments_cp"]) }}';

			url = url.replace(':id', cfd_id);

			url = url.replace(':cup', cup);

			url = url.replace(':dnt_cp', dnt_cp);

			url = url.replace(':acidity', acidity);

			url = url.replace(':body', body);

			url = url.replace(':flavour', flavour);

			url = url.replace(':comments_cp', comments_cp);

			var dialog = bootbox.alert({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayCup(event, null, cfd_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#search_button_cup').on('click', function(){

			var direction = 'Search';

			var lot_number = null;

			lot_number = document.getElementById("lot_number_cup").value;

			if (lot_number == "") {

				lot_number = 0;

			}


			var outt_number = null;

			outt_number = document.getElementById("outt_number_cup").value;

			if (outt_number == "") {

				outt_number = 0;

			}

			var coffee_grade = null;

			coffee_grade = document.getElementById("coffee_grade_cup").value;

			if (coffee_grade == "") {

				coffee_grade = 0;

			}

			displayCup(event, null, null, direction, lot_number, outt_number, coffee_grade);

		});
		

   });


</script>
<style type="text/css">
	
.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
	
</style>
@endpush