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
		$prc_season = NULL;
	}

	if (!isset($contractID)) {
		$contractID = NULL;
	}

	$BULKING_PROCESS = 4;

	$screen = 0;
	$process = 0;
	if (isset($cdetails)){
		$sif_lot = $cdetails->cfd_lot_no;
		$outt_number = $cdetails->cfd_outturn;
		$coffee_grower = $cdetails->cfd_grower_mark;
		$dont = $cdetails->cfd_dnt;
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
    <div class="col-md-12">
	        <form role="form" method="POST" action="processinginstructions">

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
		        			<label>Instruction Number</label>
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{$ref_no }}"></input>
			                        <span class="input-group-btn">
			                        <button type="submit" name="searchInstruction" class="btn btn-default">
			                        	<i class="fa fa-search"></i>
			                        </button>

		                    </span>
		                    </div>
		                </div>	
		            </div>
		            <div class="row">

		        		<div class="form-group col-md-3">
		        			<label>Reference</label>
			            	<?php
								if ($prc == $BULKING_PROCESS) {
									echo "<input type='text' class='form-control' name='reference' id ='reference' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."'></input>";													
								} else {
									echo "<input type='text' class='form-control' name='reference' id ='reference' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."' disabled></input>";
								}
							?>
						</div>	

			            <div class="form-group col-md-3">
			            	<label>Processing Date</label>
			           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
			            </div>   

			            <div class="form-group col-md-3">
			                <label >Contract Number</label>
							<?php
								if ($prc == $BULKING_PROCESS) {
				               		echo "<select class='form-control' name='contract'>";
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

			            					#instructions_selected


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
						<table id="stocks-table" class="table table-condensed" >
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
										Cert
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
									<th>
										Withdraw
									</th>
						        </tr>
						    </thead>
						</table>
@push('scripts')

<script>
$(function() {
    var t = $('#stocks-table').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: '{!! route('processinginstructions.getstockview') !!}',
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'sale', name: 'sale', searchable: false },
            { data: 'lot', name: 'lot' , searchable: false},
            { data: 'outturn', name: 'outturn' },
            { data: 'grade', name: 'grade' , searchable: false},
            { data: 'weight', name: 'weight', searchable: false },
            { data: 'bags', name: 'bags' , searchable: false},
            { data: 'pockets', name: 'pockets' , searchable: false},
            { data: 'cert', name: 'cert' , searchable: false},
            { data: 'quality', name: 'quality' , searchable: false},
            { data: 'price', name: 'price', searchable: false },
            { data: 'location', name: 'location' , searchable: false},
            { data: 'id', name: 'id', searchable: false }
        ]
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1; 
        } );
    } ).draw();    
});
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
