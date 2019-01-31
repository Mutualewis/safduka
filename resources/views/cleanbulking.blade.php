@extends ('layouts.dashboard')
@section('page_heading','Clean Bulking (Press fetch or search if it takes too long to load)')
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
	if (old('material') != NULL) {
		$st_mt = old('material');
    }
    
	if (!isset($st_mt)) {
		$st_mt = NULL;
	}

	if (old('warehouse') != NULL) {
		$wrid = old('warehouse');
    }
    
	if (!isset($wrid)) {
		$wrid = NULL;
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
	if (!isset($rw)) {
		$rw = NULL;
	}
	if (!isset($clm)) {
		$clm = NULL;
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


	if (!isset($outturn)) {
		$outturn = NULL;
	}


	if (!isset($zone)) {
		$zone = NULL;
	}

	if (!isset($prc_season)) {
		$prc_season = $active_season;
	}		

	if ($prc_season == null) {
		$prc_season = 2;
	}	

	if (isset($prc_season)) {
		$prc_season = $active_season;
		if($prc_season == 'Season'){
			$prc_season = $active_season;
		}
	}
	if ($prc_season == null) {
		$prc_season = 2;
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
	$mark = null;

	if (isset($StockView) && count($StockView) > 0) {
		foreach ($StockView->all() as $value) {
			$totalWeight += (int) $value->st_net_weight; 
			$total_bags += (int) $value->st_bags; 
			$total_pkts += (int) $value->st_pockets; 
		}
	}

	if (isset($stockViewDetails) && count($stockViewDetails) > 0) {
		$mark = $stockViewDetails->mark;
		$st_cgr = $stockViewDetails->cgr_id;
		$st_mt = $stockViewDetails->mtid;
		$wrid =	$stockViewDetails->wrid;	
	}


?>
    <div class="col-md-12">
	        <form id="cleanbulkingform" role="form" method="POST" action="/cleanbulkinginstructions">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
						<option value="">Season</option>
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
	                        <input type="text" class="form-control" name="outturn" id ="outturn" placeholder="Outturn No..."  value="{{ old('outturn').$outturn }}" ></input>
	                        <span class="input-group-btn">
	                        <button type="submit" id="searchButtonOuttturn" name="searchButton" class="btn btn-default" formnovalidate>
	                        	<i class="fa fa-search"></i>
	                        </button>	                       
	                    </div>
	                </div>	

		        </div>

				<div class="row">
					<div class="form-group col-md-3">
	        			<label>Bulk Mark</label>
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="mark" id ="mark" placeholder="Mark..."  value="{{ old('mark').$mark }}" ></input>
	                       
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
					<div class="form-group col-md-3">
		            	<label>Grade</label>
		                <select class="form-control" name="material">
		               		<option value="">---select grade---</option>
							@if (count($material) > 0)
										@foreach ($material->all() as $materials)
										@if ($st_mt ==  $materials->id)
											<option value="{{ $materials->id }}" selected="selected">{{ $materials->mt_name}} </option>
										@else
											<option value="{{ $materials->id }}">{{ $materials->mt_name}}  </option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
					<div class="form-group col-md-3">
		            	<label>Warehouse</label>
		                <select class="form-control" id="warehouse" name="warehouse" onchange='fetchWarehouseDetails()'>
		               		<option value="">---select warehouse---</option>
							@if (count($warehouse) > 0)
										@foreach ($warehouse->all() as $wr)
									
										@if ($wrid ==  $wr->id)
											<option value="{{ $wr->id }}" selected="selected">{{ $wr->agt_name}} </option>
										@else
											<option value="{{ $wr->id }}">{{ $wr->agt_name}}   </option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>
				</div>

		        <div class="row">

		            <div class="form-group col-md-3">
		                <label>New Row</label>
		                <select class="form-control" id="new_row" name="new_row">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_row != NULL)
													<option value="{{ $value->id }}">{{ $value->loc_row}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>
		            <div class="form-group col-md-3">
		                <label>New Column</label>
		                <select class="form-control" id="new_column" name="new_column">
		                	<option></option> 
								@if (isset($location))
											@foreach ($location->all() as $value)
												@if ($value->loc_column != NULL)
													<option value="{{ $value->id }}">{{ $value->loc_column}}</option>
												@endif
											@endforeach
										
								@endif
		                </select>
		            </div>	

			        <div class="form-group col-md-3">
		                <label >Zone</label>
		                <input class="form-control"  id="new_zone"  name="new_zone" value="{{ old('zone').$zone  }}">
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
									<th>
										Instructed
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
									<th>
										Instructed
									</th>
									
						        </tr>
						    </tfoot>

						</table>

<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jqvalidator/jquery.validate.js") }}" ></script>
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
	localStorage.clear();
	var url = '{{ route('cleanbulkinginstructions.getstockview',['countryID'=>":id",'ref_no'=>":rf"]) }}';

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
            { data: 'st_pockets', name: 'pockets'},
            { data: 'bulked_by', name: 'bulked_by'}
            

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
			var ended = table.cell(meta.row,10).data();
			//var stockid = $('<div/>').text(data).html();
			var stockid = table.cell(meta.row,0).data();
			// var status = table.cell(meta.row,22).data();
			var outturn = table.cell(meta.row,3).data();
			var weight = table.cell(meta.row,6).data();
		
			if (ended == null) {
				return '<input type="checkbox" class="chk" name="tobeprocessed[]" value="' + stockid + '"  data-outturn="' + outturn + '" data-weight="' + weight + '"  value="' + stockid + '" >';
			} else {
				var viewedfield = '<input type="hidden" name="tobeprocessed[]" value="' + stockid + '" >';
				var hiddenfield = '<input type="checkbox" checked="checked" value="' + stockid + '" disabled>';
				var combined = viewedfield.concat(hiddenfield);
				return combined;
			}
	
		}},
    	{targets: 10,
			'visible':false
		},
		{targets: 7, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" id="'+"cweight"+ table.cell(meta.row,0).data()+""+'" value="' + $('<div/>').text(data).html() + '">';
			}},
	
		],



		fnDrawCallback: function( oSettings ) {
			var jArray= <?php echo json_encode($lots); ?>;
		    var stockArray= <?php echo json_encode($stockArray); ?>;

		    $(document).ready(function() {
		    	

			$('.chk').off('click').on('click', function(){
				var selectedID = $(this).val();
				var checked = $(this).is(":checked");
				var outturn = $(this).data('outturn');
				var weight = $(this).data('weight');
				selectedID = parseInt(selectedID);	
				var totalsWeight = null;
				var bags = null;
				var pockets = null;
				
				var data = [];
				
				if (localStorage.getItem("lotsinbulk") != null) {
					data = JSON.parse(localStorage.getItem('lotsinbulk'));
				}
				if(checked){
					
					var result = $.grep(data, function(e){ 
						return e.id == selectedID; 
					});
					console.log(result)
					if(jQuery.isEmptyObject(result)){
					data.push({"id": selectedID,"outturn": outturn,"weight": weight});
					}
				}else{
					data = data.filter(function( obj ) {
					return obj.id !== selectedID;
					});
				}
				
				console.info(data)
			
				localStorage.setItem('lotsinbulk', JSON.stringify(data));

			    var totalWeight= $("#totalWeight").text();
				totalWeight = parseInt(+totalWeight.replace(',', ''), 10);			    
			    // var total_bags= $("#total_bags").text();
			    // var total_pkts= $("#total_pkts").text();
			   
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



   });



</script>

<script>
	
		
		
		// validate signup form on keyup and submit
		 $("#cleanbulkingform").validate({
			rules: {
				material: "required",
				outturn: "required",
				grower: "required",
				Bulking_season: "required",
				warehouse: "required",
				mark: {
					required: true,
					minlength: 2
				},
				// password: {
				// 	required: true,
				// 	minlength: 5
				// },
				// confirm_password: {
				// 	required: true,
				// 	minlength: 5,
				// 	equalTo: "#password"
				// },
				// email: {
				// 	required: true,
				// 	email: true
				// },
				topic: {
					required: ".newsletter:checked",
					minlength: 1
				},
				// agree: "required"
			},
			messages: {
				material: "Please select a grade",
				outturn: "Please enter bulk outturn",
				grower: "Please select a grower",
				mark: {
					required: "Please enter grower mark",
					minlength: "Mark must consist of at least 2 characters"
				},
				Bulking_season: "Please select a valid bulking season",
				warehouse: "Please select a warehouse",
				// password: {
				// 	required: "Please provide a password",
				// 	minlength: "Your password must be at least 5 characters long"
				// },
				// confirm_password: {
				// 	required: "Please provide a password",
				// 	minlength: "Your password must be at least 5 characters long",
				// 	equalTo: "Please enter the same password as above"
				// },
				// email: "Please enter a valid email address",
				// agree: "Please accept our policy",
				// topic: "Please select at least 2 topics"
			},
			submitHandler: function(event) {
				//event.preventDefault();
				var lotsinbulk = [];
				var error =false;
				var alertnone = false;
				
				
				if (localStorage.getItem("lotsinbulk") != null) {
					lotsinbulk = JSON.parse(localStorage.getItem('lotsinbulk'));
				}
			 	
				if(jQuery.isEmptyObject(lotsinbulk)){
					
					alertnone=true
					bootbox.alert("Nothing selected!");
				}
				
				if(alertnone){
					return false
				}
				var str ='outturns </br>'
			    $.each(lotsinbulk, function( index, value ) {
				
				  var weight = value.weight
				  var outturn = value.outturn;
				  var id = value.id;
				 
				  str = str + 'outturn :  '+ outturn + '    weight :  '+ weight +'  </br>'
				
				});
			// 	var url="{{ route('arrivalinformation.getLocations',['warehouse'=>":warehouse"]) }}";

			// 	var warehouse = $('#warehouse').val()
				
			// 	url = url.replace(':warehouse', warehouse);
			// 	console.log(warehouse)
			// 	console.log(url)
			// 	$.get(url, function(data, status){
			// 		console.log(data)
			// 		var locations = jQuery.parseJSON(data);
			// 		var rows = []
			// 		var columns = []
			// 		var rowstr = null;
			// 		var colstr = null;
			// 		$.each(locations,function(key, value) 
			// 		{
			// 			if (value["loc_row"] != null) { 
			// 				var row = value["loc_row"]
			// 				var id = value['id']
			// 				rows.push({text: row, value: id})
			// 				rowstr = rowstr + '<option value ="'+id+'">'+row+'</option>';
			// 			}
						
			// 			if (value["loc_column"] != null && (value["loc_column"] != 0)) {
			// 				var clm = value["loc_column"]
			// 				var id = value['id']
			// 				columns.push({text: clm, value: id})
			// 				colstr = colstr + '<option value ="'+id+'">'+clm+'</option>';
			// 			}
			// 		});
			// 			var inputstr = '<div class="form-group">'+
			// 				  '<label for="rows">Select list:</label>'+
			// 				  '<select class="form-control" id="rows">'+
			// 				    '<option value="">--select row--</option>'+
			// 				    rowstr+
			// 				  '</select>'+
			// 				'</div>';
			// 				var inputstr2 = '<div class="form-group">'+
			// 				  '<label for="cols">Select list:</label>'+
			// 				  '<select class="form-control" id="cols">'+
			// 				    '<option value="">--select column--</option>'+
			// 				    colstr+
			// 				  '</select>'+
			// 				'</div>';
			// 			var dialog = bootbox.dialog({
			// 			title: 'Select Warehouse Locations',
			// 			message: "<div>"+inputstr+inputstr2+"</div>",
			// 			buttons: {
			// 			    cancel: {
			// 			        label: "Cancel",
			// 			        className: 'btn-danger',
			// 			        callback: function(){
			// 			            console.log('Custom cancel clicked');
			// 			        }
			// 			    },
			// 			    ok: {
			// 			        label: "OK",
			// 			        className: 'btn-info',
			// 			        callback: function(){
			// 						bootbox.confirm({ 
			// 						size: "large",
			// 						message: "Are you sure? <br> "+str, 
			// 						callback: function(result){ 
			// 							if(result){
			// 								saveData(lotsinbulk)
			// 							}
			// 						}
			// 						})
			// 			        }
			// 			    }
			// 			}
			// 			});

			
      
			// });
			
				var confirm = false
				bootbox.confirm({ 
				size: "large",
				message: "Are you sure? <br> "+str, 
				callback: function(result){ 
					if(result){
						saveData(lotsinbulk)
					}
				 }
				})
  
				console.log(confirm)
				if(!confirm){
					return false;
				}else{

				}
				return false
				

				return
			}
		});

		// propose username by combining first- and lastname
		// $("#username").focus(function() {
		// 	var firstname = $("#firstname").val();
		// 	var lastname = $("#lastname").val();
		// 	if (firstname && lastname && !this.value) {
		// 		this.value = firstname + "." + lastname;
		// 	}
		// });
		function saveData(lotsinbulk){
			//post
			var url = '{{ route('bulking.saveCleanBulk') }}';
				console.log(url)
				var country = $('[name="country"]').val();
				var outt_season = $('[name="Bulking_season"]').val();
				var outturn = $('[name="outturn"]').val();
				var mark = $('[name="mark"]').val();
				var grower = $('[name="grower"]').val();
				var date = $('[name="date"]').val();
				var row = $('[name="new_row"]').val();
				var column = $('[name="new_column"]').val();
				var zone = $('[name="new_zone"]').val();
				var warehouse = $('[name="warehouse"]').val();
				var material = $('[name="material"]').val();

				
				
				var formdata = { country: country, outt_season: outt_season,outturn: outturn, mark: mark, grower: grower, material: material, date: date , new_row: row, new_column: column, new_zone : zone, warehouse : warehouse }

				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape. We are escaping, we are the escapers, meant to escape, does that make us escarpments!"); },
  					backdrop: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
				});

				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
				let data = {_token: CSRF_TOKEN, data: formdata, lotsinbulk: lotsinbulk}
				console.log(JSON.stringify(data))
				$.ajax({
					method: "POST",
					url: url,
					data: data,
					dataType: 'json',
					}).done(function(response) {
						console.log(response)
						if(response.updated) {
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: purple"><i class="fa fa-exclamation-triangle fa-2x">  Updated</i></div>');
							
						} else if(response.inserted) {
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Saved</i></div>');
							
							
							location.reload();
						}else if(response.error) {
							var msg = '';
							$.each(response.errormsgs, function( index, value ) {
							msg = msg +'<br>'+ value;
						})
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">'+msg +'</i></div>');
							
						}
					}).error(function(error) {
						console.error(error)
						// var msg = '';
						// $.each(response.errormsgs, function( index, value ) {
						// 	msg = msg + value;
						// })
						// dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">'+msg +'</i></div>');
						// closeBootBox();
				});
		}
		



	function fetchWarehouseDetails()
	{
		var warehouse = $('#warehouse').val();
		var row = $('#new_row');
		var column = $('#new_column');

		if (warehouse == null) {
			warehouse = <?php echo json_encode($warehouse); ?>;
		}

		row.find('option').remove();   
		column.find('option').remove();   


		var url="{{ route('arrivalinformation.getLocations',['warehouse'=>":warehouse"]) }}";
		url = url.replace(':warehouse', warehouse);

		$.ajax({
		url: url,
		type: 'GET',
		}).success(function(response) {
			var locations = jQuery.parseJSON(response);

			row.append('<option></option>');
			column.append('<option></option>');
			$.each(locations,function(key, value) 
			{	
				row.append('<option value=' + value["id"] + '>&nbsp;&nbsp;&nbsp;' + value["loc_row"] + '</option>');
				column.append('<option value=' + value["id"] + '>&nbsp;&nbsp;&nbsp;' + value["loc_column"] + '</option>');

			});
		}).error(function(error) {
			console.log(error)
		});  




	}

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
<style type="text/css">
	table {
	    table-layout:fixed;
	}

	.div-table-content {
	  height:600px;
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

	#cleanbulkingform label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
		color: #a94442;
	}
	#cleanbulkingform input.error {
		color: #a94442;
		border: 2px solid red;
	}
	#cleanbulkingform select.error {
		color: #a94442;
		border: 2px solid red;
	}
	.help-block {
    color: #a94442;
	}
	.bootbox.modal > .modal-dialog {
  z-index: 1050 !important;
}
</style>
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
		//	$( "#bulkingform" ).submit();
		}
	})
</script>
@endpush