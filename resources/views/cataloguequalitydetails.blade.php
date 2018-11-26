@extends ('layouts.dashboard')
@section('page_heading','Arrival Quality Details')
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
			            <h3>Details</h3>						
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
			                <select class="form-control" id="crop_season" name="crop_season">
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

			        

			        <div class="row">

						 <div class="form-group col-md-4">
			            	<button  class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalParchmentCenter'onclick='displayParchment(event, this, null, null, null, null, null)' >Parchment</button>
						</div>	

			            <div class="form-group col-md-4">
			            	<button class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalGreenCenter'onclick='displayGreen(event, this, null, null, null, null, null)' >Green</button>
						</div>	

			            <div class="form-group col-md-4">
							<button class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalScreenCenter'onclick='displayScreen(event, this, null, null, null, null, null)'>Screen</button>
						</div>	

			            <!-- <div class="form-group col-md-4">
			            	<button  class="btn btn-lg btn-warning btn-block" data-toggle='modal' data-target='#menuModalCupCenter' onclick='displayCup(event, this, null, null, null, null, null)' >Cup</button>

						</div>	 -->

					</div>


				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Quality</button>
		            </div>

		        </div>


				<!-- <div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="confirmquality" class="btn btn-lg btn-danger btn-block">Confirm Quality</button>
		            </div>
		        </div> -->

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
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_green" name="outt_number_green" style="text-transform:uppercase; " placeholder="Search Outturn..."></input>

		                        <span class="input-group-btn">

		                        <button type="submit" id="search_button_green" name="search_button_green" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
						<div class="alert-dismissible alert-info" id="outt_number_display_green"></div>
	                    </div>
	                </div>
				
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_green" name="coffee_grade_green" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($partchment_types) && count($partchment_types) > 0)
								@foreach ($partchment_types->all() as $partchment_type)											
									<option value="{{ $partchment_type->id }}">{{ $partchment_type->pty_name}}</option>
								@endforeach									
							@endif
		                </select>	

		                <input type="hidden" id="st_id_green" name="st_id_green">		

		            </div>
					<div class="alert-dismissible alert-info" id="coffee_grower_display_green"></div>        
	        	</div>

				

				

    			<input type="checkbox" id="dnt" name="dnt" >&nbsp&nbsp <strong style="font-size:35px; color:red;">Do Not Touch(DNT)</strong>

				<h3  data-toggle="collapse" data-target="#green">Green Comments </h3> 

				<div class="tabpanel">

				    <!-- Nav tabs -->
				    <ul class="nav nav-tabs" role="tablist">


				            <li role="presentation" class="active">
				                <a href="#tab-green" aria-controls="#tab-green" role="tab" data-toggle="tab">Green Size</a>
				            </li>
				            <li role="presentation">
				                <a href="#tab-color" aria-controls="#tab-color" role="tab" data-toggle="tab">Color</a>
				            </li>
				             <!-- onclick="doFunction();"  -->
				            <li role="presentation">
				                <a href="#tab-deffects" aria-controls="#tab-deffects" role="tab" data-toggle="tab">Deffects</a>
				            </li>
				           
				            <li role="presentation">
				                <a href="#tab-raw" aria-controls="#tab-raw" role="tab" data-toggle="tab">Quality</a>
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

				            

				            <div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-raw">

					        	<div class="row" >

						            <div class="form-group col-md-6" style="padding-left:20px;">

						                <table align="left">	

						                	<?php

						                		if (isset($coffeequality) && count($coffeequality) > 0){

						                			$count = 0;

						                			foreach ($coffeequality->all() as $value){

						                				$count += 1;

						                				if ($count > 3) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<label><input type="radio" id="raw'.$value->id.'" name="raw" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

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
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_screen" name="outt_number_sreen" style="text-transform:uppercase; " placeholder="Search Outturn..."></input>

		                        <span class="input-group-btn">

		                        <button type="submit" id="search_button_screen" name="search_button_screen" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
						<div class="alert-dismissible alert-info" id="outt_number_display_screen"></div>
	                    </div>
	                </div>
				
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_screen" name="coffee_grade_screen" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($partchment_types) && count($partchment_types) > 0)
								@foreach ($partchment_types->all() as $partchment_type)											
									<option value="{{ $partchment_type->id }}">{{ $partchment_type->pty_name}}</option>
								@endforeach									
							@endif
		                </select>	

		                <input type="hidden" id="st_id_screen" name="st_id_screen">		

		            </div>
				</div>
				<div class="alert-dismissible alert-info" id="coffee_grower_display_screen"></div>      							
	        	<div class="row" >
		           
		                <label>Screen Size</label></br>
							@if (isset($screensanalysis) && count($screensanalysis) > 0)
										@foreach ($screensanalysis->all() as $value)
										@if ($value->acat_level==1)		<div class="form-group col-md-6">							
											<label>{{ $value->acat_name }}</label>
											<input type="number" id="screen_size{{ $value->id }}" name="screen_size" value="{{ $value->id }}">
											</div>
											 </br>
											 @endif
										@endforeach									
							@endif
		           
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
			  <h4 class="alert-heading">Outturns Cup Analysis</h4>
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
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_cup" name="outt_number_cup" style="text-transform:uppercase; " placeholder="Search Outturn..."></input>

		                        <span class="input-group-btn">

		                        <button type="submit" id="search_button_cup" name="search_button_cup" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
						<div class="alert-dismissible alert-info" id="outt_number_display_cup"></div>
	                    </div>
	                </div>
				
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_cup" name="coffee_grade_cup" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($partchment_types) && count($partchment_types) > 0)
								@foreach ($partchment_types->all() as $partchment_type)											
									<option value="{{ $partchment_type->id }}">{{ $partchment_type->pty_name}}</option>
								@endforeach									
							@endif
		                </select>	

		                <input type="hidden" id="st_id_cup" name="st_id_cup">		

				</div>        
				</div>
				<div class="alert-dismissible alert-info" id="coffee_grower_display_cup"></div> 						
    			<input type="checkbox" id="dnt_cp" name="dnt_cp"  onchange="this.form.submit()">&nbsp&nbsp <strong style="font-size:25px; color:red;">Do Not Touch(DNT)</strong>
				
				
				
	        	

		        <div class="tabpanel">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">


		<li role="presentation" class="active">
			<a href="#tab-acid" aria-controls="#tab-acid" role="tab" data-toggle="tab"> Acidity</a>
		</li>
		<li role="presentation">
			<a href="#tab-body" aria-controls="#tab-body" role="tab" data-toggle="tab">Body</a>
		</li>
		 <!-- onclick="doFunction();"  -->
		<li role="presentation">
			<a href="#tab-flavour" aria-controls="#tab-flavour" role="tab" data-toggle="tab">Flavour</a>
		</li>
	   
		<li role="presentation">
			<a href="#tab-cupquality" aria-controls="#tab-cupquality" role="tab" data-toggle="tab">Quality</a>
		</li>

</ul>

<!-- Tab panes -->
<div class="tab-content">

		<div role="tabpanel" class="tab-pane active" class="tab-pane" id="tab-acid">

			<div class="row" >
				<div class="form-group col-md-12">

					<table align="left">		                	
						<?php

							if (isset($acidities) && count($acidities) > 0){

								$count = 0;

								foreach ($acidities->all() as $value){

									$count += 1;

									if ($count > 1) {

										$count = 1;

										echo "</tr>";

										echo "<tr>";

									} else if ($count == 0) {

										echo "<tr>";

									}

									echo '<td><label><input type="checkbox" id="cpacid'.$value->id.'" name="acidity" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

								}


							}

						?>	      
						</tr>          	
					</table>
				</div>
			</div>


		</div>

		<div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-body">


			<div class="row">		        	

				<div class="form-group col-md-12">

					<table align="left">		                	
						<?php

							if (isset($bodies) && count($bodies) > 0){

								$count = 0;

								foreach ($bodies->all() as $value){

									$count += 1;

									if ($count > 2) {

										$count = 1;

										echo "</tr>";

										echo "<tr>";

									} else if ($count == 0) {

										echo "<tr>";

									}

									echo '<td><label><input type="checkbox" id="body'.$value->id.'" name="body" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

								}


							}

						?>	      
						</tr>          	
					</table>

				</div>

			</div>


		</div>

		<div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-flavour">

			<div class="row">
				<div class="form-group col-md-6">

					<table align="left">		                	
						<?php

							if (isset($flavours) && count($flavours) > 0){

								$count = 0;

								foreach ($flavours->all() as $value){

									$count += 1;

									if ($count > 3) {

										$count = 1;

										echo "</tr>";

										echo "<tr>";

									} else if ($count == 0) {

										echo "<tr>";

									}

									echo '<td><label><input type="checkbox" id="flv'.$value->id.'" name="flavour" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

								}


							}

						?>	      
						</tr>          	
					</table>

				</div>
			</div>

		</div>

		

		<div role="tabpanel" class="tab-pane" class="tab-pane" id="tab-cupquality">

			<div class="row" >

				<div class="form-group col-md-6" style="padding-left:20px;">

					<table align="left">	

						<?php

							if (isset($coffeequality) && count($coffeequality) > 0){

								$count = 0;

								foreach ($coffeequality->all() as $value){

									$count += 1;

									if ($count > 3) {

										$count = 1;

										echo "</tr>";

										echo "<tr>";

									} else if ($count == 0) {

										echo "<tr>";

									}

									echo '<label><input type="radio" id="cpq'.$value->id.'" name="cup" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

									// echo '<td><label><input type="checkbox" id="raw'.$value->id.'" name="raw" value="'.$value->id.'">&nbsp&nbsp'.$value->rw_quality.'</input>&nbsp&nbsp </label>';

								}

							}

						?>	  

					</table>

				</div>

				<div class="form-group col-md-12">
					<label>Comments</label>
					<textarea class="form-control" rows="3" id="comments_cp" name="comments_cp" value = "{{ old('comments_cp') }}" style="text-transform:uppercase; font-size: 15px; font-weight: bold;"><?php echo htmlspecialchars($comments); ?></textarea>
				</div>
			</div>	 

		</div>
	
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


	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModalParchmentCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Outturns Parchment Analysis</h4>
				<button type="button" name="button_previous_parchment" id="button_previous_parchment" class="btn btn-default btn-prev" style="font-size: 35px;">Prev</button>
		        <button type="button" name="button_next_parchment" id="button_next_parchment" class="btn btn-default btn-next" style="font-size: 35px;">Next</button>
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id = "parchment" style="font-size: 35px;">
	      	<div>
	        	<div class="row">

	        		
	        		<div class="form-group col-md-4">
	                    <div class="input-group custom-search-form">
	                        <input type="text" class="form-control" id="outt_number_parchment" name="outt_number_parchment" style="text-transform:uppercase; " placeholder="Search Outturn..."></input>

		                        <span class="input-group-btn">

		                        <button type="submit" id="search_button_parchment" name="search_button_parchment" class="btn btn-default">
		                        	<i class="fa fa-search"></i>
		                        </button>

	                    </span>
						<div class="alert-dismissible alert-info" id="outt_number_display_partchment"></div>
	                    </div>
	                </div>
				
		            <div class="form-group col-md-4">
		                <select class="form-control" id="coffee_grade_parchment" name="coffee_grade_parchment" style="text-transform:uppercase; height: 35px; font-size: 15px; font-weight: bold;">
		                	<option></option> 
							@if (isset($partchment_types) && count($partchment_types) > 0)
								@foreach ($partchment_types->all() as $partchment_type)											
									<option value="{{ $partchment_type->id }}">{{ $partchment_type->pty_name}}</option>
								@endforeach									
							@endif
		                </select>	

		                <input type="hidden" id="st_id_partchment" name="st_id_partchment">		

		            </div>
					<div class="alert-dismissible alert-info" id="coffee_grower_display_partchment"></div>        
	        	</div>

    			<!-- <input type="checkbox" id="dnt" name="dnt" >&nbsp&nbsp <strong style="font-size:35px; color:red;">Do Not Touch(DNT)</strong> -->

				<h3  data-toggle="collapse" data-target="#parchment">Parchment </h3> 

				<div class="tabpanel">

				    <!-- Nav tabs -->
				    <ul class="nav nav-tabs" role="tablist">


				            
				             <!-- onclick="doFunction();"  -->
				            <li role="presentation">
				                <a href="#tab-description" aria-controls="#tab-description" role="tab" data-toggle="tab">Parchment description</a>
				            </li>
				           
				    
				    </ul>

				    <!-- Tab panes -->
				    <div class="tab-content">

				            <div role="tabpanel" class="tab-pane active" class="tab-pane" id="tab-description">

						        <div class="row">
						            <div class="form-group col-md-6">

						                <table align="left">		                	
						                	<?php
												
						                		if (isset($partchment) && count($partchment) > 0){

						                			$count = 0;
													
						                			foreach ($partchment->all() as $value){
														
						                				$count += 1;

						                				if ($count > 3) {

						                					$count = 1;

						                					echo "</tr>";

						                					echo "<tr>";

						                				} else if ($count == 0) {

						                					echo "<tr>";

						                				}

						                				echo '<td><label><input type="checkbox" id="pq'.$value->id.'" name="parchmentquality" value="'.$value->id.'">&nbsp&nbsp'.$value->qp_parameter.'</input>&nbsp&nbsp </label></td>';

						                			}


						                		}

						                	?>	      
						                	</tr>          	
						                </table>

						            </div>
						        </div>

				            </div>
				        
				    </div>

				</div>


			</div>		
	      </div>
	      <div class="modal-footer">
	        <button type="button" name="button_save_parchment" id="button_save_parchment" class="btn btn-primary btn-block" style="font-size: 35px;">Save</button>
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


	function fetch_url(st_id, direction , outt_number, coffee_grade) {

		var season = null;

		season = document.getElementById("crop_season").value;

		if (season == "") {

			season = 0;

		}

		var url = '{{ route('cataloguequalitydetails.getLots',['crop_season'=>":crop_season",'st_id'=>":st_id",'direction'=>":direction",'outt_number'=>":outt_number",'coffee_grade'=>":coffee_grade"]) }}';

	
		url = url.replace(':st_id', st_id);

		url = url.replace(':crop_season', season);

		url = url.replace(':direction', direction);

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

	function displayGreen (event, value, st_id, direction , outt_number, coffee_grade, season){
		event.preventDefault();
		clearChildren(document.getElementById("green"));

		var url = fetch_url(st_id, direction , outt_number, coffee_grade);

        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);
			console.log(obj)
		   $('#outt_number_display_green').html(obj.st_outturn);

			//document.getElementById('coffee_grade').value = obj.pty_id;

			document.getElementById('st_id_green').value = obj.st_id;

			$('#coffee_grower_display_green').html(obj.st_mark);

		    if (obj.dont == 1) {

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

			    	// var str1_pt = "process_type";

					// var str2_pt = obj.prcss_id;

					// var res_pt = str1_pt.concat(str2_pt);

					// if (document.getElementById(res_pt) != null) {

					// 	document.getElementById(res_pt).checked = true;
					// }

					// if (obj.qltyd_prcss_value != null) {

					// 	document.getElementById('process').value = obj.qltyd_prcss_value;

					// } else {

					// 	document.getElementById('process').value =  0;
					// }

	        

			    	var str1_rw = "raw";

					var str2_rw = obj.cup_quality;

					var res_rw = str1_rw.concat(str2_rw);

					if (document.getElementById(res_rw) != null) {

						document.getElementById(res_rw).checked = true;
					}


					if (obj.qltyd_comments != null) {

						document.getElementById('comments').value = obj.qltyd_comments; 

					} else {

						document.getElementById('comments').value = null;
					}

		
				});	



			} else {

				document.getElementById('comments').value = null;

				// document.getElementById('process').value =  0;

			}

        });

	}
	
	function displayScreen(event, value, st_id, direction, outt_number, coffee_grade, season){

		clearChildren(document.getElementById("screen_div"));

		var url = fetch_url(st_id, direction , outt_number, coffee_grade);
        $.get(url, function(data, status){

            var obj = jQuery.parseJSON(data);
			console.log(obj)
		     $('#outt_number_display_screen').html(obj.st_outturn);

			//document.getElementById('coffee_grade').value = obj.pty_id;

			document.getElementById('st_id_screen').value = obj.st_id;

			$('#coffee_grower_display_screen').html(obj.st_mark);
			
			var screen_data = null;
			screen_data = obj.qualityParameterSCRID
			console.log(screen_data)
			if(screen_data!=null){
				newTemp = screen_data.replace(/'/g, '\"');
			screen_data = JSON.parse(newTemp)
			$.each(screen_data, function( index, data ) {
				var str1_ss = "screen_size";
				var key = Object.keys(data)[0];
  				var value = data[key];
				var str2_ss = key;

				var res_ss = str1_ss.concat(str2_ss);
				console.log(res_ss)
				if (document.getElementById(res_ss) != null) {

					document.getElementById(res_ss).value = value;
				}
			});
			}	
		
			
        });

		event.preventDefault();

	}

	function displayCup(event, value, st_id, direction, outt_number, coffee_grade, season){

		event.preventDefault();

		clearChildren(document.getElementById("cup_div"));

		var url = fetch_url(st_id, direction , outt_number, coffee_grade);
        $.get(url, function(data, status){
			
            var obj = jQuery.parseJSON(data);
			console.log(obj)
		     $('#outt_number_display_cup').html(obj.st_outturn);

			//document.getElementById('coffee_grade').value = obj.pty_id;

			document.getElementById('st_id_cup').value = obj.st_id;

			$('#coffee_grower_display_cup').html(obj.st_mark);
			var quality_params = null;

			quality_params = obj.qualityParameterCupID;

			if (quality_params != null) {

				$.each(quality_params.split(","), function(i,e){

					var str1_gd = "cpacid";

					var str2_gd = e;

					var res_gd = str1_gd.concat(str2_gd);

					if (document.getElementById(res_gd) != null) {
					
						document.getElementById(res_gd).checked = true;
					
					}

					var str1_gc = "body";

					var str2_gc = e;

					var res_gc = str1_gc.concat(str2_gc);

					if (document.getElementById(res_gc) != null) {
					
						document.getElementById(res_gc).checked = true;
					
					}


					var str1_gs = "flv";

					var str2_gs = e;

					var res_gs = str1_gs.concat(str2_gs);

					if (document.getElementById(res_gs) != null) {

						document.getElementById(res_gs).checked = true;
					}

					// var str1_pt = "process_type";

					// var str2_pt = obj.prcss_id;

					// var res_pt = str1_pt.concat(str2_pt);

					// if (document.getElementById(res_pt) != null) {

					// 	document.getElementById(res_pt).checked = true;
					// }

					// if (obj.qltyd_prcss_value != null) {

					// 	document.getElementById('process').value = obj.qltyd_prcss_value;

					// } else {

					// 	document.getElementById('process').value =  0;
					// }



					var str1_rw = "cpq";

					var str2_rw = obj.cup_quality;

					var res_rw = str1_rw.concat(str2_rw);

					if (document.getElementById(res_rw) != null) {

						document.getElementById(res_rw).checked = true;
					}


					if (obj.qltyd_comments != null) {

						document.getElementById('comments_cp').value = obj.qltyd_comments; 

					} else {

						document.getElementById('comments_cp').value = null;
					}


				});	



			} else {

				document.getElementById('comments_cp').value = null;

				// document.getElementById('process').value =  0;

			}

			


        });	



	}
	
	function displayParchment (event, value, st_id, direction , outt_number, coffee_grade, season){
	
		event.preventDefault();
	
	clearChildren(document.getElementById("parchment"));
	
	var url = fetch_url(st_id, direction , outt_number, coffee_grade); 
	console.log(url)
	$.get(url, function(data, status){

		var obj = jQuery.parseJSON(data);
		console.log(obj)
		if(!jQuery.isEmptyObject(obj)){
		$('#outt_number_display_partchment').html(obj.st_outturn);

		//document.getElementById('coffee_grade').value = obj.pty_id;

		document.getElementById('st_id_partchment').value = obj.st_id;

		$('#coffee_grower_display_partchment').html(obj.st_mark);

		if (obj.dont == 1) {

			document.getElementById("dnt").checked = true;

		} else {

			document.getElementById("dnt").checked = false;

		}

		var quality_params = null;

		quality_params = obj.qualityParameterID;

		if (quality_params != null) {

			$.each(quality_params.split(","), function(i,e){


				var str1_rw = "pq";

				var str2_rw = obj.pct_id;

				var res_rw = str1_rw.concat(str2_rw);

				if (document.getElementById(res_rw) != null) {

					document.getElementById(res_rw).checked = true;
				}


				// if (obj.qltyd_comments != null) {

				// 	document.getElementById('comments').value = obj.qltyd_comments; 

				// } else {

				// 	document.getElementById('comments').value = null;
				// }


			});	



		} 
	}
	});



}


	$(document).ready(function() {	

		$('#button_next_green').on('click', function(){

			var st_id = document.getElementById("st_id_green").value;

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


			// if (document.getElementById("process") != null) {

			// 	var process_loss = document.getElementById("process").value;	

			// } else {

			// 	var process_loss = null;

			// }

			var raw = {};

			raw = $('input[name=raw]:checked').map(function(){

				return this.value;

			}).get();

			raw = JSON.stringify(raw);

			if (document.getElementById("comments").value != "") {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}



			var url = '{{ route('cataloguequalitydetails.saveGreen',['st_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			// url = url.replace(':process_type', process_type);

			// url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						

			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
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

			var st_id = document.getElementById("st_id_green").value;

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


			// if (document.getElementById("process") != null) {

			// 	var process_loss = document.getElementById("process").value;	

			// } else {

			// 	var process_loss = null;

			// }

			var raw = {};

			raw = $('input[name=raw]:checked').map(function(){

				return this.value;

			}).get();

			raw = JSON.stringify(raw);

			if (document.getElementById("comments").value != "") {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}



			var url = '{{ route('cataloguequalitydetails.saveGreen',['st_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			// url = url.replace(':process_type', process_type);

			// url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						

			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
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
			
			var st_id = document.getElementById("st_id_green").value;

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


			// if (document.getElementById("process") != null) {

			// 	var process_loss = document.getElementById("process").value;	

			// } else {

			// 	var process_loss = null;

			// }

		    var raw = {};

		    raw = $('input[name=raw]:checked').map(function(){

		        return this.value;

		    }).get();

		    raw = JSON.stringify(raw);

			if (document.getElementById("comments").value != "") {

				var comments = document.getElementById("comments").value;

			} else {

				var comments = null;

			}
			
			

			var url = '{{ route('cataloguequalitydetails.saveGreen',['st_id'=>":id",'dnt'=>":dnt",'greensize'=>":greensize",'greencolor'=>":greencolor",'greendefects'=>":greendefects",'raw'=>":raw", 'comments'=>":comments"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':greensize', greensize);

			url = url.replace(':greencolor', greencolor);

			url = url.replace(':greendefects', greendefects);

			// url = url.replace(':process_type', process_type);

			// url = url.replace(':process_loss', process_loss);

			url = url.replace(':raw', raw);

			url = url.replace(':comments', comments);

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayGreen(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#search_button_green').on('click', function(e){

		e.preventDefault();
		var direction = 'Search';

		var season = null;

		season = document.getElementById("crop_season").value;
		
		if (season == "") {

			season = 0;

		}


		var outt_number = null;

		
		 outt_number=$('#outt_number_green').val()
		
		if (outt_number == "") {

			outt_number = 0;

		}
		
		var coffee_grade = null;

		coffee_grade =$("#coffee_grade_green").val();
		
		if (coffee_grade == "") {

			coffee_grade = 0;

		}


			displayGreen(event, null, null, direction, outt_number, coffee_grade, season);

		});

		
		$('#search_button_parchment').on('click', function(e){
		e.preventDefault();
		var direction = 'Search';

		var season = null;

		season = document.getElementById("crop_season").value;
		
		if (season == "") {

			season = 0;

		}


		var outt_number = null;

		
		 outt_number=$('#outt_number_parchment').val()
		
		if (outt_number == "") {

			outt_number = 0;

		}
		
		var coffee_grade = null;

		coffee_grade =$("#coffee_grade_parchment").val();
		
		if (coffee_grade == "") {

			coffee_grade = 0;

		}
		
		displayParchment(event, null, null, direction, outt_number, coffee_grade, season);

		});

		$('#search_button_screen').on('click', function(e){
		e.preventDefault();
		var direction = 'Search';

		var season = null;

		season = document.getElementById("crop_season").value;
		
		if (season == "") {

			season = 0;

		}


		var outt_number = null;

		
		outt_number=$('#outt_number_screen').val()
		
		if (outt_number == "") {

			outt_number = 0;

		}
		
		var coffee_grade = null;

		coffee_grade =$("#coffee_grade_screen").val();
		
		if (coffee_grade == "") {

			coffee_grade = 0;

		}
		
		displayScreen(event, null, null, direction, outt_number, coffee_grade, season);

		});


		$('#button_next_screen').on('click', function(){

			var st_id = document.getElementById("st_id_screen").value;
			
			var direction = 'Next';

		    var screen_size = [];
			
			for (i=1 ; i<5 ; i++){
				if (document.getElementById("screen_size"+i) != null) {
				var id = i;
				var screen = document.getElementById("screen_size"+i).value;
				var screenobj = {id:id, screensize: screen}
				} else {

				var id = i;
				var screen = null;
				var screenobj = {id:id, screensize: screen}
				}
				screen_size.push(screenobj)	
			}


			var url = '{{ route('cataloguequalitydetails.saveScreenA') }}';

			

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
			let data = {_token: CSRF_TOKEN, screens:screen_size, st_id : st_id}
			console.log(JSON.stringify(data))
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: 'json',
				}).done(function(response) {
					
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					console.log(error)
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});
		});


		$('#button_previous_screen').on('click', function(){

				var st_id = document.getElementById("st_id_screen").value;
			
			var direction = 'Previous';

		    var screen_size = [];
			
			for (i=1 ; i<5 ; i++){
				if (document.getElementById("screen_size"+i) != null) {
				var id = i;
				var screen = document.getElementById("screen_size"+i).value;
				var screenobj = {id:id, screensize: screen}
				} else {

				var id = i;
				var screen = null;
				var screenobj = {id:id, screensize: screen}
				}
				screen_size.push(screenobj)	
			}


			var url = '{{ route('cataloguequalitydetails.saveScreenA') }}';

			

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
			let data = {_token: CSRF_TOKEN, screens:screen_size, st_id : st_id}
			console.log(JSON.stringify(data))
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: 'json',
				}).done(function(response) {
					
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					console.log(error)
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_save_screen').on('click', function(){

			var st_id = document.getElementById("st_id_screen").value;
			
			var direction = 'Next';

		    var screen_size = [];
			
			for (i=1 ; i<5 ; i++){
				if (document.getElementById("screen_size"+i) != null) {
				var id = i;
				var screen = document.getElementById("screen_size"+i).value;
				var screenobj = {id:id, screensize: screen}
				} else {

				var id = i;
				var screen = null;
				var screenobj = {id:id, screensize: screen}
				}
				screen_size.push(screenobj)	
			}


			var url = '{{ route('cataloguequalitydetails.saveScreenA') }}';

			

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
			let data = {_token: CSRF_TOKEN, screens:screen_size, st_id : st_id}
			console.log(JSON.stringify(data))
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: 'json',
				}).done(function(response) {
					
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayScreen(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					console.log(error)
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});








		$('#button_next_cup').on('click', function(){

 			var st_id = document.getElementById("st_id_cup").value;

			var cup = null;

			var flavour =[]
			var acidity =[]
			var body =[]
			var taint =[]

			var direction = 'Next';

			acidity = $('input[name=acidity]:checked').map(function(){

				return this.value;

			}).get();
			body = $('input[name=body]:checked').map(function(){

			return this.value;

			}).get();

			flavour = $('input[name=flavour]:checked').map(function(){

			return this.value;

			}).get();

			cup = $('input[name=cup]:checked').map(function(){

			return this.value;

			}).get();


			var dont = document.getElementById("dnt_cp");

			if (dont.checked) {

				var dnt_cp = document.getElementById("dnt_cp").value;

			} else {

				var dnt_cp = null;

			}




			if (document.getElementById("comments_cp").value != "") {

				var comments_cp = document.getElementById("comments_cp").value;

			} else {

				var comments_cp = null;

			}

			var url = '{{ route('cataloguequalitydetails.saveCup') }}';

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
					

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	

			datacup = {flavour:flavour, acidity:acidity, body: body, taint: taint, cup:cup, dnt_cp: dnt_cp, comments_cp : comments_cp}

			let data = {_token: CSRF_TOKEN, datacup:datacup, st_id : st_id}
			console.log(JSON.stringify(data))
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayCup(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayCup(event, null, st_id, direction, null, null, null);
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

 		var st_id = document.getElementById("st_id_cup").value;

		var cup = null;

		var flavour =[]
		var acidity =[]
		var body =[]
		var taint =[]

		var direction = 'Previous';

		acidity = $('input[name=acidity]:checked').map(function(){

			return this.value;

		}).get();
		body = $('input[name=body]:checked').map(function(){

		return this.value;

		}).get();

		flavour = $('input[name=flavour]:checked').map(function(){

		return this.value;

		}).get();

		cup = $('input[name=cup]:checked').map(function(){

		return this.value;

		}).get();


		var dont = document.getElementById("dnt_cp");

		if (dont.checked) {

			var dnt_cp = document.getElementById("dnt_cp").value;

		} else {

			var dnt_cp = null;

		}




		if (document.getElementById("comments_cp").value != "") {

			var comments_cp = document.getElementById("comments_cp").value;

		} else {

			var comments_cp = null;

		}

		var url = '{{ route('cataloguequalitydetails.saveCup') }}';

		var dialog = bootbox.dialog({
			message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
		}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
				

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	

		datacup = {flavour:flavour, acidity:acidity, body: body, taint: taint, cup:cup, dnt_cp: dnt_cp, comments_cp : comments_cp}

		let data = {_token: CSRF_TOKEN, datacup:datacup, st_id : st_id}
		console.log(JSON.stringify(data))
		$.ajax({
			method: "POST",
			url: url,
			data: data,
			dataType: 'json',
			}).done(function(response) {
				if(response.updated) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
					closeBootBox();
					displayCup(event, null, st_id, direction, null, null, null);
				} else if(response.inserted) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
					closeBootBox();
					displayCup(event, null, st_id, direction, null, null, null);
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

 			var st_id = document.getElementById("st_id_cup").value;

		    var cup = null;

			var flavour =[]
			var acidity =[]
			var body =[]
			var taint =[]

		    var direction = 'Next';

		    acidity = $('input[name=acidity]:checked').map(function(){

		        return this.value;

		    }).get();
			body = $('input[name=body]:checked').map(function(){

			return this.value;

			}).get();

			flavour = $('input[name=flavour]:checked').map(function(){

			return this.value;

			}).get();

			cup = $('input[name=cup]:checked').map(function(){

			return this.value;

			}).get();


			var dont = document.getElementById("dnt_cp");

			if (dont.checked) {

				var dnt_cp = document.getElementById("dnt_cp").value;

			} else {

				var dnt_cp = null;

			}


			

			if (document.getElementById("comments_cp").value != "") {

				var comments_cp = document.getElementById("comments_cp").value;

			} else {

				var comments_cp = null;

			}
			
			var url = '{{ route('cataloguequalitydetails.saveCup') }}';

			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
					
    
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	

			datacup = {flavour:flavour, acidity:acidity, body: body, taint: taint, cup:cup, dnt_cp: dnt_cp, comments_cp : comments_cp}

			let data = {_token: CSRF_TOKEN, datacup:datacup, st_id : st_id}
			console.log(JSON.stringify(data))
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayCup(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayCup(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});
		
		$('#button_save_parchment').on('click', function(e){
			e.prevent
			var st_id = document.getElementById("st_id_partchment").value;
			console.log(st_id)
			var direction = 'Next';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}


		    var parchmentdesc = {};

		    parchmentdesc = $('input[name=parchmentquality]:checked').map(function(){

		        return this.value;

		    }).get();

			if(jQuery.isEmptyObject(parchmentdesc)){
				bootbox.alert('Nothing selected!');
				return false
			}
		    parchmentdesc = JSON.stringify(parchmentdesc);	

			var url = '{{ route('cataloguequalitydetails.saveParchment',['st_id'=>":id",'dnt'=>":dnt",'parchmentdesc'=>":parchmentdesc"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':parchmentdesc', parchmentdesc);
			console.log(url)
			
			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_next_parchment').on('click', function(e){
			e.prevent
			var st_id = document.getElementById("st_id_partchment").value;

			var direction = 'Next';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}


		    var parchmentdesc = {};

		    parchmentdesc = $('input[name=parchmentquality]:checked').map(function(){

		        return this.value;

		    }).get();
			
			if(jQuery.isEmptyObject(parchmentdesc)){
				bootbox.alert('Nothing selected!');
				return false
			}

		    parchmentdesc = JSON.stringify(parchmentdesc);	

			var url = '{{ route('cataloguequalitydetails.saveParchment',['st_id'=>":id",'dnt'=>":dnt",'parchmentdesc'=>":parchmentdesc"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':parchmentdesc', parchmentdesc);

			
			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		});

		$('#button_previous_parchment').on('click', function(e){
			e.prevent
			var st_id = document.getElementById("st_id_partchment").value;

			var direction = 'Previous';

			var dont = document.getElementById("dnt");

			if (dont.checked) {

				var dnt = document.getElementById("dnt").value;

			} else {

				var dnt = null;

			}


		    var parchmentdesc = {};

		    parchmentdesc = $('input[name=parchmentquality]:checked').map(function(){

		        return this.value;

		    }).get();
			console.log(parchmentdesc)
			if(jQuery.isEmptyObject(parchmentdesc)){
				bootbox.alert('Nothing selected!');
				return false
			}

		    parchmentdesc = JSON.stringify(parchmentdesc);	

			var url = '{{ route('cataloguequalitydetails.saveParchment',['st_id'=>":id",'dnt'=>":dnt",'parchmentdesc'=>":parchmentdesc"]) }}';

			url = url.replace(':id', st_id);

			url = url.replace(':dnt', dnt);

			url = url.replace(':parchmentdesc', parchmentdesc);

			
			var dialog = bootbox.dialog({
				message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
			}).css({'opacity': '0.2', 'font-weight' : 'bold', color: '#F00', 'font-size': '2em', 'filter': 'alpha(opacity=50)' /* For IE8 and earlier */} );
						
    
			$.ajax({
				url: url,
				dataType: 'json',
				}).done(function(response) {
					if(response.updated) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					} else if(response.inserted) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
						closeBootBox();
						displayParchment(event, null, st_id, direction, null, null, null);
					}else if(response.error) {
						dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Some fields have not been filled!</i></div>');
						closeBootBox();
					}
				}).error(function(error) {
					dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x"> Some fields have not been filled!</i></div>');
					closeBootBox();
			});

		})

		$('#search_button_cup').on('click', function(){

			var direction = 'Search';

			var season = null;

			season = document.getElementById("crop_season").value;

			if (season == "") {

				season = 0;

			}


			var outt_number = null;


			outt_number=$('#outt_number_cup').val()

			if (outt_number == "") {

				outt_number = 0;

			}

			var coffee_grade = null;

			coffee_grade =$("#coffee_grade_cup").val();

			if (coffee_grade == "") {

				coffee_grade = 0;

			}

			displayCup(event, null, null, direction, outt_number, coffee_grade, season);

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

<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>