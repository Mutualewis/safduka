@extends ('layouts.dashboard')
@section('page_heading','Processing Instructions')
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
	if (!isset($reference_no)) {
		$reference_no = NULL;
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
		$grade = 1;
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
	if (!isset($instructions_checked )) {
		$instructions_checked  = NULL;
	}
	if(isset($prdetails)){
		$reference = $prdetails->pr_reference_name;
		$prc_season = $prdetails->csn_id;
		$contractID = $prdetails->sct_id;
		$date = date("m/d/Y", strtotime($prdetails->pr_date));
	}


	if (!isset($reference)) {
		$reference = NULL;
	}

	if (!isset($prc_season)) {
		$prc_season = 3;
	}

	if (!isset($contractID)) {
		$contractID = NULL;
	}

	$BULKING_PROCESS = 4;



	if (isset($selectedContract)) {
		$reference = $selectedContract->sct_description;
		$salesContractID = $selectedContract->id;
	}
	if (!isset($salesContractID)) {
		$salesContractID = NULL;
	}
	if(isset($extraProcessing)){
		$extraProcessingOld = $extraProcessing;
		$extraProcessing = array();

		foreach ($extraProcessingOld->all() as $field => $value) {
			if ($value->prcss_initial != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['prcss_name'] = $value->prcss_initial;
				array_push($extraProcessing, $newElement);
			}

		}
	} else {
		$extraProcessing = array();		
	}
	$lots = array();

	if (isset($StockView) && count($StockView) > 0) {

		foreach ($StockView->all() as $value) {
			$lots[] = $value->id;
		}
	}


?>
    <div class="col-md-12">
	        <form id="stocksForm" role="form" method="POST" action="processinginstructions">

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
			            	<label>Processing Season</label>
			                <select class="form-control" name="processing_season">
			               		<option>Season</option>
								@if (count($Season) > 0)
											@foreach ($Season->all() as $season)
											@if ($prc_season ==  $season->id)
												<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
											@else
												<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
											@endif
											@endforeach
										
								@endif
			                </select>
			            </div>

			            <div class="form-group col-md-3">
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
			            <div class="form-group col-md-3">
			                <label >Contract Number</label>
							<?php
								if ($prc == $BULKING_PROCESS) {
				               		echo "<select class='form-control' name='contract'  onchange='this.form.submit()'>";
				               			echo "<option></option> ";
				               			if (isset($contract)) {
				               				foreach ($contract->all() as $value) {

				               					if ($contractID ==  $value->id) {
				               						echo "<option value='".$value->id."' selected='selected'>".$value->sct_number."</option>";
				               					} else {
				               						echo "<option value='".$value->id."'>".$value->sct_number."</option>";
				               					}
				               				}
				               			}
				               		echo "</select>";
								} else {
				               		echo "<select class='form-control' name='contract' disabled>";
				               		echo "</select>";									
								}
							?>

			            </div>
		            </div>
		            <div class="row">

		        		<div class="form-group col-md-3">
		        			<label>Reference</label>
			            	<?php
								if ($prc == $BULKING_PROCESS) {
									if ($salesContractID != 1) {
										echo "<input type='text' class='form-control' name='reference' id ='reference' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."' disabled></input>";	
									} else {
										echo "<input type='text' class='form-control' name='reference' id ='reference' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."'></input>";	
									}
																					
								} else {
									echo "<input type='text' class='form-control' name='reference' id ='reference' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."' disabled></input>";
								}
							?>
						</div>	

			            <div class="form-group col-md-3">
			            	<label>Processing Date</label>
			           		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date') }}"/>
			            </div>   
			            
		        		<div class="form-group col-md-3">
		        			<label>Instruction Number</label>
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{ $reference_no }}" maxlength="7"></input>
			                        <span class="input-group-btn">
			                        <button type="submit" name="searchInstruction" class="btn btn-default">
			                        	<i class="fa fa-search"></i>
			                        </button>

		                    </span>
		                    </div>
		                </div>	

			        </div>

			            <?php
			            	if (isset($title)) {
			            		echo "<label>".$title."</label>";
			            	}
	            			if (isset($input_type)) {
	            				if ($input_type == "Select") {
	            					echo "<div class='row'>";
	            						echo "<div class='form-group col-md-4'>";
			            					echo "<select class='form-control' name='instructions_selected' >";

	            				}
	            			}
			            	if (isset($processing_instruction)) {
			            		foreach ($processing_instruction->all() as $value) {
			            			if (isset($input_type)) {
			            				if ($input_type == "Checkbox") {
			            					if (isset($instructions_checked) && in_array($value->id, $instructions_checked)) {
			            						?>
													<div class="row">
														<div class="form-group col-md-12">
					            							<input type="checkbox" name="instructions_checked[]" value="{{ $value->id }}" checked> {{ $value->pri_name}}&nbsp&nbsp
					            						</div>
					            					</div>			            						
			            						<?php
			            					} else {


			            					?>
												<div class="row">
													<div class="form-group col-md-12">
				            							<input type="checkbox" name="instructions_checked[]" value="{{ $value->id }}"> {{ $value->pri_name}}&nbsp&nbsp
				            						</div>
				            					</div>
			            					<?php
			            					}

			            				} else if ($input_type == "Select") {
			            					if (isset($instructions_selected) && $value->id == $instructions_selected) {
				            					?>
			            							<option value="{{ $value->id }}" selected="selected">{{ $value->pri_name}}</option>		            						
				            					<?php
			            					} else {
			            						?>
			            							<option value="{{ $value->id }}" >{{ $value->pri_name}}</option>
			            						<?php
			            					}

			            				}
			            			}
			            		}
		            			if (isset($input_type)) {
		            				if ($input_type == "Select") {
				            		echo "</select>";

			            				echo "</div>";
		            				echo "</div>";
			            			}
			            		}
			            	}




			            ?>
			            
	        	<div class="row">
					<div class="form-group col-md-12">
						<label>Other Instructions</label>
						<textarea class="form-control" rows="3" name="other_instructions" value="{{ old('other_instructions').$other_instructions  }}"><?php echo htmlspecialchars($other_instructions); ?></textarea>
					</div>
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
		                <select class="form-control" name="sale">
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
		                <select class="form-control" name="basket">
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
								<select class="form-control" id="certification" name="certification">
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
					<?php
						$submit_disabled = false;

						if (isset($StockView) && count($StockView) > 0) {
							foreach ($StockView->all() as $value) {
								if ($value->ended != NULL && $value->prcssid == $prid) {
									$submit_disabled = true;
								}
							}
						}

							?>					
							<?php
							?>
					            <div class="form-group col-md-3">
					           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block">Add/Update Processing Instruction</button>
					            </div>						
							<?php
					?>
		            <div class="form-group col-md-3">
		           		<button type="submit" name="printprocessingnstructions" class="btn btn-lg btn-success btn-block">Print Processing Instruction</button>
		            </div>

	            </div>
			    		
	        	<div class="row">
	        		<div class="panel panel-default">
	        			<h3>Add</h3>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sidney</td>
                <td>23</td>
                <td>2010/09/20</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011/06/07</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010/03/11</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011/08/14</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sidney</td>
                <td>37</td>
                <td>2011/06/02</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009/10/22</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011/05/07</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008/10/26</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011/03/09</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/12/09</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008/12/16</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010/02/12</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009/02/14</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008/12/11</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008/09/26</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011/05/03</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009/08/19</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013/08/11</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/07/07</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012/04/09</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
    </table>
@push('scripts')

<script>

$(document).ready(function() {
    $('#example').DataTable( {
        processing: true,
        deferRender: true,

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );


</script>

@endpush
					</div>
	        	</div>
			</form>		

	</div>
</div>	

<style type="text/css">
	table {
	    table-layout:fixed;
	}

	.div-table-content {
	  height:300px;
	  overflow-y:auto;
	}

	input[type='checkbox'] {
	    -webkit-appearance:none;
	    width:20px;
	    height:20px;
	    background:white;
	    border-radius:3px;
	    border:2px solid #555;
	    margin-top: 1px;
	    padding: 5px;


	}
	input[type='checkbox']:checked {
	    background: green;
	}
	input[type=radio]:checked ~ .check {
	  border: 5px solid #0DFF92;
	}

	input[type=radio]:checked ~ .check::before{
	  background: #0DFF92;
	}

	input[type=radio]:checked ~ label{
	  color: #0DFF92;
	}


</style>
@stop
