@extends ('layouts.dashboard')
@section('page_heading','Processing Instructions (Press fetch or search if it takes too long to load)')
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

	if (!isset($selected_date)) {
		$date = date("m/d/Y");
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
		$prc_season = 4;
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
	if ($reference == "INTERNAL") {

		if(isset($prdetails)){
			$reference = $prdetails->pr_reference_name;
		}

		if ($reference === null) {
			$reference = "INTERNAL";
		}

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
	$stockArray = array();
	$lots = array();
	$totalWeight = 0;
	$total_bags = 0;
	$total_pkts = 0;	
	$total_value = 0;
	$total_price = 0;
	$total_diff = 0;

	$total_value_sum = 0;
	$total_diff_sum = 0;

	$total_price = 0;
	$total_diff = 0;
	

					
	if (isset($StockView) && count($StockView) > 0) {

		foreach ($StockView->all() as $value) {
			
			$lots[] = $value->id;
			$newElement = array();
			$newElement['id'] = (int)$value->id;
			$newElement['weight'] = (int)$value->weight;
			$newElement['bags'] = (int)$value->bags;
			$newElement['pockets'] = (int)$value->pockets;
			$newElement['price'] = (int)$value->price;
			$newElement['value'] = (int) intval(str_replace(",", "", $value->value)); 
			$newElement['diff'] = (int)$value->weight * $value->differential;
			array_push($stockArray, $newElement);

			if ($value->prcssid == $prid && $value->ended != null && $value->prcssid != null) {
				$totalWeight += (int) $value->weight; 
				$total_bags += (int) $value->bags; 
				$total_pkts += (int) $value->pockets; 
				$total_value += (int) intval(str_replace(",", "", $value->value)); 
				$total_price += (int) $value->price; 
				$total_diff += (int) $value->weight * $value->differential; 
			}
		}
		if ($total_value != null) {
			$total_value_sum = $total_value;
		}		
		if ($total_diff != null) {
			$total_diff_sum = $total_diff;
		}
		if ($total_value != null && $totalWeight != null) {
			$total_price = $total_value/($totalWeight/50); 
		}
		if ($total_diff != null && $totalWeight != null) {
			$total_diff = $total_diff/$totalWeight; 
		}

	}
?>
    <div class="col-md-12">
	        <form id="stocksForm" role="form" method="POST" action="/processinginstructions">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<!-- <h3  data-toggle="collapse" data-target="#green">Instructions   <label class="glyphicon glyphicon-menu-down"></label></h3>   -->
            	<div id='green' class='collapse in' >
		        	<div class="row" >
			            <div class="form-group col-md-3">
			                <label>Country</label>
			                <select class="form-control" id="country" name="country" onchange="this.form.submit()">
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
			                <input type='hidden' name='old_contract' id='old_contract' value='{{ $contractID }}' >
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
										echo "<input type='text' class='form-control' style='text-transform:uppercase;' placeholder='Ref NAME...'  value='".$reference."' disabled></input>";	
										echo "<input type='hidden' name='reference' id='reference' value='".$reference."'>";	
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
			           		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date').$date }}" disabled/>
			            </div>   
			            
		        		<div class="form-group col-md-3">
		        			<label>Instruction Number</label>
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{ $reference_no }}" maxlength="7"></input>
		                        <input type='hidden' name='old_ref_no' id='old_ref_no' value='{{ $reference_no }}' >
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



	            <div class="row">
		            <div class="form-group col-md-3">
		            	<button type="submit" name="filter" class="btn btn-lg btn-success btn-block">Fetch</button>
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
		            <div class="form-group col-md-3">
		           		<button type="submit" name="printprocessingnstructionsprices" class="btn btn-lg btn-success btn-block">Print Instruction With Prices</button>
		            </div>
		            <div class="form-group col-md-3">
		           		<button type="submit" name="confirminstruction" class="btn btn-lg btn-danger btn-block">Confirm Instruction</button>
		            </div>
	            </div>
			    		
	        	<div class="row">
	        		<div class="panel panel-default" style="padding: 5px;">
			            <div align="right" style="color: blue; font-family: italic; ">
			            	<span style="color: black; font-family: normal;">Totals: </span>
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="totalWeight" ><?php echo number_format($totalWeight, 0);?></span> KGs
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_bags" ><?php echo $total_bags;?></span> Bags
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_pkts" ><?php echo $total_pkts;?></span> Pockets
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_value" ><?php echo number_format($total_value, 2);?></span> $ Value
			            	<input type="hidden" name="total_value_sum" id="total_value_sum" value=<?php echo $total_value_sum ;?>>
			            	<input type="hidden" name="total_diff_sum" id="total_diff_sum" value=<?php echo $total_diff_sum ;?>>

			            	&nbsp&nbsp<span style="color: black; font-family: normal;">Averages: </span>
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_price" ><?php echo number_format($total_price, 2);?></span> $ Price

			            	
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_diff" ><?php echo number_format($total_diff, 2);?></span> Diff
			            </div>   
			             <div class="col s12 m3 right-align">
			               <span style="font-size:18px;font-weight:500;" multiple="true">Multiple Codes:</span>
			               <select multiple="true" id="codeFltr">
			               </select>
			             </div>
						<table id="stocks-table" class="table table-condensed table-striped" >
						    <thead>
						        <tr>
									<th style='text-align:center;' >
										<input type='checkbox' name='select_all' value='1' id='example-select-all'>
									</th>	
									<th>
										Season
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
										Mark
									</th>
									<th>
										Grade
									</th>
									<th  style="display: none;">
										Kilos
									</th>
									<th style='text-align:center;' >
										Weight
									</th>
									<th>
										Cert
									</th>
									<th>
										Code
									</th>
									<th>
										Quality
									</th>
									<th>
										Price
									</th>
									<th>
										Value
									</th>
									<th>
										Diff
									</th>
									<th>
										Location
									</th>
									<th>
										Additional Process
									</th>									
									<th>
										Withdraw
									</th>									
									<th>
										Provisional
									</th>
						        </tr>
						    </thead>
						    <tfoot style="display: table-header-group; text-align:left; width: inherit; max-width:100%;">
						        <tr>
									<th>
										Select
									</th>	
									<th>
										Season
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
									<th class="absorbing-column">
										Mark
									</th>
									<th>
										Grade
									</th>
									<th style="display: none;">
										Kilos
									</th>
									<th>
										New Kilos
									</th>									
									<th>
										Cert
									</th>
									<th>
										Code
									</th>
									<th>
										Quality
									</th>
									<th>
										Price
									</th>
									<th>
										Value
									</th>
									<th>
										Diff
									</th>
									<th>
										Location
									</th>
									<th style="display: none;">
										Additional Process
									</th>									
									<th style="display: none;">
										Withdraw
									</th>									
									<th>
										Provisional
									</th>
						        </tr>
						    </tfoot>

						</table>
@push('scripts')

<script>
	var countryID = document.getElementById("country").value;
	var ref_no = document.getElementById("ref_no").value;

	if (countryID == "") {
		countryID = 0;
	}
	if (ref_no == "") {
		ref_no = 0;
	}
	$(document).ready(function (){   

	var url = '{{ route('processinginstructions.getstockview',['countryID'=>":id",'ref_no'=>":rf"]) }}';

	url = url.replace(':id', countryID);
	url = url.replace(':rf', ref_no);

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'processinginstructions',
        processing: true,
        deferRender: true,
     	ajax: url,
     	autoWidth: true,
     	pageLength: 100,

     	buttons: [
     		'pageLength' , 
     		'colvis',
     	],

        columns: [
            { data: 'id', name: 'tobeprocessed', searchable: false },
            { data: 'csn_season', name: 'csn_season'},
            { data: 'sale', name: 'sale'},
            { data: 'lot', name: 'lot'},
            { data: 'outturn', name: 'outturn' },
            { data: 'mark', name: 'mark' },
            { data: 'grade', name: 'grade'},
            { data: 'weight', name: 'weight'},
            { data: 'weight', name: 'weight'},
            { data: 'cert', name: 'cert'},
            { data: 'code', name: 'code'},
            { data: 'quality', name: 'quality'},
            { data: 'price', name: 'price'},
            { data: 'value', name: 'value'},
            { data: 'differential', name: 'differential'},
            { data: 'location', name: 'location'},
            { data: 'id', name: 'additionalProcessing'},
            { data: 'id', name: 'tobewithdrawn' , searchable: false},
            { data: 'pbk_instruction_number', name: 'pbk_instruction_number'},
            { data: 'ended', name: 'ended' , searchable: false},
            { data: 'prcssid_all', name: 'prcssid_all' , searchable: false},
            

        ],    

        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },

        columnDefs: [


        	{targets: 18,
				'visible':true
			},

        	{targets: 19,
				'visible':false
			},
        	{targets: 20,
				'visible':false
			},
						{targets: 5, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					if (data!=null) {
						var str=data;
					}else{
						str='';
					}
					var strlen=str.length
					var remlen=0
						var n = str.indexOf("/");
						var j = str.indexOf("-");
						var str1=str.substr(0,n)
						var str2='';
						if (n==-1&&j==-1) {
							if (strlen<8) {
							return $('<div/>').text(data).html();
							}else{
								var str1=str.substr(0,8)
								var str2='';
								if (strlen>8) {
									var remlen=strlen-8;
									var str2=str.substr(8,remlen)
								}
								var content=str1+'<br>'+str2;
						
								return content;
							}
						}else if(n!=-1&&j==-1){

							if (n<8) {
							 var n = str.indexOf("/");
								var str1=str.substr(0,n)
								var str2='';
								if (strlen>n) {
										var remlen=strlen-n;
										var str2=str.substr(n,remlen)
									}
									var content=str1+'<br>'+str2;
									return content;
							}else{
								var str1=str.substr(0,8)
								var str2='';
								if (strlen>n) {
									var remlen=strlen-n;
									var str2=str.substr(8,remlen)
								}
								var content=str1+'<br>'+str2;
								
								return content;
							}

							
						}else{
							var n = str.indexOf("-");
							if (n<8) {
							var str1=str.substr(0,n)
							var str2='';
							if (strlen>n) {
									var remlen=strlen-n;
									var str2=str.substr(n,remlen)
								}
								var content=str1+'<br>'+str2;
								return content;
							}else{
								var str1=str.substr(0,6)
								var str2='';
								if (strlen>n) {
									var remlen=strlen-n;
									var str2=str.substr(6,remlen)
								}
								var content=str1+'<br>'+str2;
								
								return content;
							}
							
						}
						

					//var marklength = data.length;
					
			}},

			{targets: 0,
				'searchable':false,
				'orderable':false,
				'className': 'dt-body-center',
				'render': function (data, type, full, meta, row){
				var ended = table.cell(meta.row,19).data();
				if (ended == null) {
					return '<input type="checkbox" class="chk" name="tobeprocessed[]" value="' + $('<div/>').text(data).html() + '" >';
				} else {
					var viewedfield = '<input type="hidden" name="tobeprocessed[]" value="' + $('<div/>').text(data).html() + '" >';
					var hiddenfield = '<input type="checkbox" checked="checked" value="' + $('<div/>').text(data).html() + '" disabled>';
					var combined = viewedfield.concat(hiddenfield);
					return combined;
				}

				
			}},

			{targets: 7, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" id="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" value="' + $('<div/>').text(data).html() + '">';
			}},
	
        	{targets: 16,
				'render': function (data, type, full, meta, row){
					var processed = table.cell(meta.row,20).data();
					var extraProcessing= <?php echo json_encode($extraProcessing); ?>;

					if (processed != null) {
						var selectedProcessing = processed.toString();

					} else {
						var selectedProcessing = " ";

					}


					var select = null;
					var ended = table.cell(meta.row,19).data();
					
					var selectStart = "<select class='form-control' id='"+'additionalProcessingID'+ table.cell(meta.row,0).data()+"' name='"+'additionalProcessing['+ table.cell(meta.row,0).data() +"][]' multiple='multiple'>";


					var selectBody = null;
					var extraProcessingID = null; 
						for (var i = 0; i<extraProcessing.length; i++) {
								extraProcessingID = extraProcessing[i].id;
							
								selectBody += "<option value='"+extraProcessing[i].id+"'>"+"&nbsp"+extraProcessing[i].prcss_name+"</option>";
							
						}
					

					var selectEnd = "</select>";

					var select = selectStart.concat(selectBody.concat(selectEnd));

					return select;
			}},

			{targets: 17, 
				'className': 'dt-body-center',
				'render': function (data, type, full, meta, row){
					var ended = table.cell(meta.row,19).data();
					if (ended == null) {
						return '<input type="checkbox" name="tobewithdrawn[]" value="'+ $('<div/>').text(data).html() + '" disabled>';	
					} else {
						return '<input type="checkbox" name="tobewithdrawn[]" value="'+ $('<div/>').text(data).html() + '" >';	
					}

				}
			}
      ],


	    fnDrawCallback: function( oSettings ) {
			var jArray= <?php echo json_encode($lots); ?>;
		    var stockArray= <?php echo json_encode($stockArray); ?>;


		    $(document).ready(function() {
		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#additionalProcessingID";
					var str2 = jArray[i];
					var res = str1.concat(str2);

			        $(res).multiselect({
			        	buttonWidth: '150px',
			            enableClickableOptGroups: true,
			            enableCollapsibleOptGroups: true,
			            enableFiltering: true
			        });
		   		}

			$('.chk').off('click').on('click', function(){
				var selectedID = $(this).val();
				selectedID = parseInt(selectedID);	
				var totalsWeight = null;
				var bags = null;
				var pockets = null;
				var selectedPrice = 0;
				var selectedValue = 0;
				var selectedDiff = 0;

			    var totalWeight= $("#totalWeight").text();
				totalWeight = parseInt(+totalWeight.replace(',', ''), 10);			    
			    var total_bags= $("#total_bags").text();
			    var total_pkts= $("#total_pkts").text();
			    var total_value= $("#total_value").text();
				total_value = parseInt(+total_value.replace(',', ''), 10);			    
			    var total_price= $("#total_price").text();
				total_price = parseInt(+total_price.replace(',', ''), 10);			    
			    var total_diff= $("#total_diff").text();
				total_diff = parseInt(+total_diff.replace(',', ''), 10);			    
			    var total_value_sum= $("#total_value_sum").text();						    
			    var total_diff_sum= $("#total_diff_sum").text();
					

				if (total_value_sum == 0) {
					total_value_sum= $("#total_value_sum").val();
				}
				if (total_diff_sum == 0) {
					total_diff_sum= $("#total_diff_sum").val();
				}

				total_diff_sum = parseInt(+total_diff_sum.replace(',', ''), 10);
				total_value_sum = parseInt(+total_value_sum.replace(',', ''), 10);	

				

		    	var stringName = "cweight[";
				var stringID = selectedID;
				var res = stringName.concat(stringID);
				res = res.concat("]");
				var cweight = null;
				cweight = document.getElementById(res).value;

				Number.prototype.format = function(n,x){
					var re = '(\\d)(?=(\\d{'+(x || 3)+'})+'+(n>0?'\\.':'$')+')';
					return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re,'g'), '$1,');
				};

				if ($(this).is(':checked')) {
					totalsWeight = totalWeight + parseInt(cweight, 10);
				    bags = Math.floor(totalsWeight / 60);
				    pockets = Math.floor(totalsWeight % 60);
				} else {
					totalsWeight = totalWeight - parseInt(cweight, 10);
				    bags = Math.floor(totalsWeight / 60);
				    pockets = Math.floor(totalsWeight % 60);					
				}
				for (var i = 0; i<stockArray.length; i++) {
					if (stockArray[i].id == selectedID) {
						selectedPrice = stockArray[i].price;
						if ($(this).is(':checked')) {
							selectedValue = stockArray[i].value;
							selectedDiff = stockArray[i].diff;
							selectedValue = parseInt(total_value_sum, 10) + parseInt(selectedValue, 10);
							selectedDiff = parseInt(selectedDiff, 10) + parseInt(total_diff_sum, 10);						
						} else {
							selectedValue = stockArray[i].value;
							selectedDiff = stockArray[i].diff;
							selectedValue = parseInt(total_value_sum, 10) - parseInt(selectedValue, 10);
							selectedDiff = parseInt(total_diff_sum, 10) - parseInt(selectedDiff, 10);	


						}

					}
				}


				total_price = selectedValue/(totalsWeight/50); 
				total_diff = selectedDiff/totalsWeight; 



				totalsWeight = totalsWeight.format();

				total_price = total_price.format(2);
				total_diff = total_diff.format(2);

				$('#totalWeight').html(totalsWeight);
				$('#total_bags').html(bags);
				$('#total_pkts').html(pockets);
				$('#total_value').html(selectedValue.format(2));
				$('#total_value_sum').html(selectedValue);
				$('#total_price').html(total_price);
				$('#total_diff').html(total_diff);
				$('#total_diff_sum').html(selectedDiff);
				
			});


		    });



	    },


        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {           
            $('td:eq("8")', nRow).addClass('collapse');   
            $('td:eq("8")', nRow).addClass('collapse');   

        },

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select style="width: 100%; text-align: left;"><option value=""></option></select>')
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



			this.api().columns([10]).every( function () {
				var column = this;
				var select = $("#codeFltr"); 
				column.data().unique().sort().each( function ( d, j ) {
				  select.append( '<option value="'+d+'">'+d+'</option>' )
				} );
			} );


			$("#codeFltr").multiselect();
        },



   });


    $('#codeFltr').on('change', function(){
    	var search = [];
      
      $.each($('#codeFltr option:selected'), function(){
      		search.push($(this).val());
      });
      
      search = search.join('|');
      table.column(10).search(search, true, false).draw();  
    });


   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      // var rows = table.rows({ 'search': 'applied' }).nodes();
      // $('input[type="checkbox"]', rows).prop('checked', this.checked);


   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
    

   $('#stocksForm').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element 
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         } 
      });
   });






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
	table .absorbing-column {
	    width: 100%;
	}
	.div-table-content {
	  height:300px;
	  overflow-y:auto;
	}
	td.last {
	    width: 1px;
	    white-space: nowrap;
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

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#stocksForm" ).submit();
		}
	})
</script>
@endpush