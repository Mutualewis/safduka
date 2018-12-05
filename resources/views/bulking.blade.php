@extends ('layouts.dashboard')
@section('page_heading','Bulking (Press fetch or search if it takes too long to load)')
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
	if (old('grower') != NULL) {
		$st_cgr = old('grower');
    }
    
	if (!isset($st_cgr)) {
		$st_cgr = NULL;
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


	if (!isset($active_season)) {
		$active_season = NULL;
	}

	if (!isset($prc_season)) {
		$prc_season = $active_season;
	}	
	if (isset($prc_season)) {
		$prc_season = $active_season;
		if($prc_season == 'Season'){
			$prc_season = $active_season;
		}
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
	if(isset($extraBulking)){
		$extraBulkingOld = $extraBulking;
		$extraBulking = array();

		foreach ($extraBulkingOld->all() as $field => $value) {
			if ($value->prcss_initial != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['prcss_name'] = $value->prcss_initial;
				array_push($extraBulking, $newElement);
			}

		}
	} else {
		$extraBulking = array();		
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
			$newElement['stockid'] = (int)$value->stock_id;
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
	        <form id="stocksForm" role="form" method="POST" action="/bulkinginstructions">

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
			            	<label>Bulking Season</label>
			                <select class="form-control" name="Bulking_season">
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
			            	<label>Bulking Date</label>
			           		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date').$date }}" disabled/>
			            </div>   
			            
		        		<div class="form-group col-md-3">
		        			<label>Bulk Outturn Number</label>
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" name="outturn" id ="outturn" placeholder="Outturn No..."  value="{{ old('outturn') }}" ></input>
		                       
		                    </div>
		                </div>	

			        </div>

			         
	        	

	            </div>
				<div class="row">
				<div class="form-group col-md-3">
		        			<label>Bulk Mark</label>
		                    <div class="form-group">
		                        <input type="text" class="form-control" name="mark" id ="mark" placeholder="Mark..."  value="{{ old('mark') }}" ></input>
		                       
		                    </div>
		                </div>
						<div class="form-group col-md-3">
			            	<label>Grower</label>
			                <select class="form-control" name="grower">
			               		<option value="">---select grower---</option>
								@if (count($growers) > 0)
											@foreach ($growers->all() as $grower)
											@if ($st_cgr ==  $grower->id)
												<option value="{{ $grower->id }}" selected="selected">{{ $grower->cgr_grower}}    &&nbsp&nbsp&nbsp&nbsp ( {{ $grower->cgr_mark}} )</option>
											@else
												<option value="{{ $grower->id }}">{{ $grower->cgr_grower}} &nbsp&nbsp&nbsp&nbsp  ( {{ $grower->cgr_mark}} )</option>
											@endif
											@endforeach
										
								@endif
			                </select>
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
					           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block">Add/Update Bulking Instruction</button>
					            </div>						
							<?php
					?>
		            <!-- <div class="form-group col-md-3">
		           		<button type="submit" name="printBulkingnstructions" class="btn btn-lg btn-success btn-block">Print Bulking Instruction</button>
		            </div>
		            
		            <div class="form-group col-md-3">
		           		<button type="submit" name="confirminstruction" class="btn btn-lg btn-danger btn-block">Confirm Instruction</button>
		            </div> -->
	            </div>
			    		
	        	<div class="row">
	        		<div class="panel panel-default" style="padding: 5px;">
			            <div align="right" style="color: blue; font-family: italic; ">
			            	<span style="color: black; font-family: normal;">Totals: </span>
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="totalWeight" ><?php echo number_format($totalWeight, 0);?></span> KGs
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_bags" ><?php echo $total_bags;?></span> Bags
			            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_pkts" ><?php echo $total_pkts;?></span> Pockets
			            	&nbsp&nbsp&nbsp&nbsp&nbsp
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
										Grower
									</th>
									
									<th >
										Outturn
									</th>
									<th >
										Mark
									</th>
									<th>
										Grade
									</th>
									<th >
										Kilos
									</th>

									<th >
										Kilos input
									</th>

									<th>
										Bags
									</th>
									<th>
										Pockets
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
										Grower
									</th>
									
									<th >
										Outturn
									</th>
									<th >
										Mark
									</th>
									<th>
										Grade
									</th>
									<th >
										Kilos
									</th>

									<th >
										Kilos Input
									</th>

									<th>
										Bags
									</th>
									<th>
										Pockets
									</th>
									
						        </tr>
						    </tfoot>

						</table>
@push('scripts')

<script>
	var countryID = document.getElementById("country").value;
	var ref_no = document.getElementById("outturn").value;

	if (countryID == "") {
		countryID = 0;
	}
	if (ref_no == "") {
		ref_no = 0;
	}
	$(document).ready(function (){   

	var url = '{{ route('bulkinginstructions.getstockview',['countryID'=>":id",'ref_no'=>":rf"]) }}';

	url = url.replace(':id', countryID);
	url = url.replace(':rf', ref_no);

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'Bulkinginstructions',
        Bulking: true,
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
			{ data: 'mark', name: 'grower'},
            { data: 'outturn', name: 'outturn' },
            { data: 'mark', name: 'mark' },
            { data: 'grade', name: 'grade'},
            
            { data: 'st_net_weight', name: 'weight'},
			{ data: 'st_net_weight', name: 'st_net_weight'},
            { data: 'st_bags', name: 'bags'},
            { data: 'st_pockets', name: 'pockets'}
            

        ],    

        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },
		columnDefs: [

		{targets: 0,
			'searchable':false,
			'orderable':false,
			'className': 'dt-body-center',
			'render': function (data, type, full, meta, row){
			// var ended = table.cell(meta.row,19).data();
			//var stockid = $('<div/>').text(data).html();
			var stockid = table.cell(meta.row,0).data();
			// var status = table.cell(meta.row,22).data();

		
				// if (ended == null) {
				return '<input type="checkbox" class="chk" name="tobeprocessed[]" value="' + stockid + '" >';
				// } else {
				// 	var viewedfield = '<input type="hidden" name="tobeprocessed[]" value="' + stockid + '" >';
				// 	var hiddenfield = '<input type="checkbox" checked="checked" value="' + stockid + '" disabled>';
				// 	var combined = viewedfield.concat(hiddenfield);
				// 	return combined;
				// }
			


			
		}},
		{targets: 7, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" id="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" value="' + $('<div/>').text(data).html() + '">';
			}},
	
		],
		fnDrawCallback: function( oSettings ) {
			var jArray= <?php echo json_encode($lots); ?>;
		    var stockArray= <?php echo json_encode($stockArray); ?>;

		    $(document).ready(function() {
		    	

			$('.chk').off('click').on('click', function(){
				var selectedID = $(this).val();
				selectedID = parseInt(selectedID);	
				var totalsWeight = null;
				var bags = null;
				var pockets = null;
				
			    var totalWeight= $("#totalWeight").text();
				totalWeight = parseInt(+totalWeight.replace(',', ''), 10);			    
			    var total_bags= $("#total_bags").text();
			    var total_pkts= $("#total_pkts").text();
			   
		    	var stringName = "cweight";
				var stringID = selectedID;
				var res = stringName.concat(stringID);
				res = res.concat("");
				var cweight = null;
				if(document.getElementById(res)==null){
					var stringName = "cweightpurchased";
					var stringID = selectedID;
					var res = stringName.concat(stringID);
					res = res.concat("");
					if(document.getElementById(res)==null){
					var stringName = "cweightbal";
					var stringID = selectedID;
					var res = stringName.concat(stringID);
					res = res.concat("");
					if(document.getElementById(res)==null){
					var stringName = "cweightbalpurchased";
					var stringID = selectedID;
					var res = stringName.concat(stringID);
					res = res.concat("");
				}
				}
				}

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


				totalsWeight = totalsWeight.format();

				$('#totalWeight').html(totalsWeight);
				$('#total_bags').html(bags);
				$('#total_pkts').html(pockets);
				
				
			});


		    });



	    },
	


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

	table .absorbing-column td{
	   word-wrap: break-word;
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