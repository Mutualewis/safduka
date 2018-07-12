@extends ('layouts.dashboard')
@section('page_heading','Quality Details')
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
	if (!isset($csn_season)) {
		$csn_season  = 3;
	}
	if (!isset($saleid )) {
		$saleid   = NULL;
	}
	if (!isset($sale_cb_id )) {
		$sale_cb_id   = NULL;
	}
	
	if (!isset($gid)) {
		$gid   = NULL;
	}

	if (!isset($qtype)) {
		$qtype   = NULL;
	}

	$screen = 0;
	$process = 0;
	$sif_lot = NULL;
	$outt_number = NULL;
	$coffee_grower = NULL;
	$dont = NULL;
	$price = NULL;
	$cprice = NULL;
	$bskt = NULL;
	$sst = NULL;
	$warrant_no = NULL;
	$warrant_weight = NULL;
	$comments = NULL;
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
		$cprice = $pdetails->prc_confirmed_price;
		$bskt = $pdetails->bs_id;

		$sst = $pdetails->sst_id;
		$warrant_no = $pdetails->prc_warrant_no;
		$warrant_weight = $pdetails->prc_warrant_weight;
		$comments = $pdetails->prc_purchase_comments;
	}

	if(isset($greensize)){
		$greensizeOLD = $greensize;
		$greensizeall = array();

		foreach ($greensizeOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($greensizeall, $newElement);
			}

		}

	} else {
		$greensizeall = array();		
	}

	if(isset($greencolor)){
		$greencolorOLD = $greencolor;
		$greencolorall = array();

		foreach ($greencolorOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($greencolorall, $newElement);
			}

		}

	} else {
		$greencolorall = array();		
	}

	if(isset($greendefects)){
		$greendefectsOLD = $greendefects;
		$greendefectsall = array();

		foreach ($greendefectsOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($greendefectsall, $newElement);
			}

		}

	} else {
		$greendefectsall = array();		
	}

	if(isset($processing)){
		$processingOLD = $processing;
		$processingall = array();

		foreach ($processingOLD->all() as $field => $value) {
			if ($value->prcss_initial != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['prcss_initial'] = $value->prcss_initial;
				$newElement['prcss_name'] = $value->prcss_name;
				array_push($processingall, $newElement);
			}

		}

	} else {
		$processingall = array();		
	}



	if(isset($rawscore)){
		$rawscoreOLD = $rawscore;
		$rawscoreall = array();

		foreach ($rawscoreOLD->all() as $field => $value) {
			if ($value->rw_score != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['rw_score'] = $value->rw_score;
				$newElement['rw_quality'] = $value->rw_quality;
				array_push($rawscoreall, $newElement);
			}

		}

	} else {
		$rawscoreall = array();		
	}
							        
	if(isset($screens)){
		$screensOld = $screens;
		$screensType = array();

		foreach ($screensOld->all() as $field => $value) {
			if ($value->scr_name != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['scr_name'] = $value->scr_name;
				array_push($screensType, $newElement);
			}

		}
	} else {
		$screensType = array();		
	}
	if(isset($cupscore)){
		$cupscoreOld = $cupscore;
		$cupscoreType = array();

		foreach ($cupscoreOld->all() as $field => $value) {
			if ($value->cp_score != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['cp_score'] = $value->cp_score;
				array_push($cupscoreType, $newElement);
			}

		}
	} else {
		$cupscoreType = array();		
	}


	$lots = array();

	if (isset($sale_lots) && count($sale_lots) > 0) {

		foreach ($sale_lots->all() as $value) {
			$lots[] = $value->id;
		}
	}

	$lotsIDs = array();
	if (isset($sale_lots) && count($sale_lots) > 0) {

		foreach ($sale_lots->all() as $value) {
			$lotsIDs[] = $value->id;
		}
	}

?>
    <div class="col-md-12">
	        <form role="form" method="POST" action="cataloguequalitydetailslist" id="cataloguequalitydetailslistform">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">



				<div class="row">
		            <div class="form-group col-md-6">
			            <h3>Select Sale</h3>						
		            </div>
		        </div>


		        	<div class="row" >
			            <div class="form-group col-md-3">
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

			            <div class="form-group col-md-3" style="padding-left:20px;">
			            	<label>Season</label>
			                <select class="form-control" id="sale_season" name="sale_season" onchange="this.form.submit()">
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
			                <select class="form-control" id="sale" name="sale">
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
			                <label>Seller(Should Be Selected)</label>
			                <select class="form-control" id="seller" name="seller" onchange="this.form.submit()">
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
			            </div>

			        </div>

		        	<div class="row" >
		            
			            <div class="form-group col-md-3">
			                <label>Quality Analysis Type</label>
			                <select class="form-control" name="qualityTy" onchange="this.form.submit()">
			                	<option></option> 
								@if (isset($QualityType) && count($QualityType) > 0)
											@foreach ($QualityType->all() as $value)
												@if ($qtype ==  $value->id)
													<option value="{{ $value->id }}" selected="selected">{{ $value->qat_name}}</option>
												@else
													<option value="{{ $value->id }}">{{ $value->qat_name}}</option>
												@endif

											@endforeach
										
								@endif
			                </select>
			            </div>



			        </div>

			    <h3>Lots</h3>
			    <div class="row">			
					<h3>Catalogue( <input type="checkbox" checked style='background:red;'> : Bad/Foul, <input type="checkbox" checked style='background:#018c36;'> : No Green, <input type="checkbox" checked style='background:#01ba1a;'> : No Raw, <input type="checkbox" checked style='background:#010f8c;'> : No Cup, <input type="checkbox" checked style='background:#000;'> : Okay)</h3>
		        <?php
		        $lots = array();
				$greencomments_deff_cfdid = array();
				$greencomments_deff_prid = array();

				$gdef = array();

		        if ($qtype == 1) {
		        	
		        ?>	

					<table id="green-deffects-table" class="table table-condensed table-striped" width="100%">
						<thead bgcolor="#086b36">
							<tr>				  
								<th>
									<font color="white"> Lot</font>
								</th>
								<th>
									<font color="white"> Outturn</font>
								</th>
								<th>
									<font color="white"> Mark</font>
								</th>
								<th>
									<font color="white"> Grade</font>
								</th>
								<th>
									<font color="white"> Region</font>
								</th>
								<th>
									<font color="white"> Cert</font>
								</th>
								<th>
									<font color="white"> Size</font>
								</th>
								<th>
									<font color="white"> Color</font>
								</th>
								<th>
									<font color="white"> Deffects</font>
								</th>															
								<th>
									<font color="white"> Process</font>
								</th>
								<th>
									<font color="white"> P Loss(%)</font>
								</th>
								<th style="width: 150px">
									<font color="white"> Comments
								</th>
								<th>
									<font color="white"> Raw
								</th>
								<th style="display: none">
									<font color="white">id</font>
								</th>
								<th style="display: none">
									<font color="white">id</font>
								</th>
								<th style="display: none">
									<font color="white">id</font>
								</th>
								<th style="display: none">
									<font color="white">id</font>
								</th>


							  </tr>						
						</thead>
				</table>
@push('scripts')
<script>
var countryID = document.getElementById("country").value;
var saleSeason = document.getElementById("sale_season").value;
var saleNumber = document.getElementById("sale").value;
var seller = document.getElementById("seller").value;

if (countryID == "") {
	countryID = 0;
}
if (saleSeason == "") {
	saleSeason = 0;
}
if (saleNumber == "") {
	saleNumber = 0;
}
if (seller == "") {
	seller = 0;
}

$(document).ready(function (){  
	var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn",'saleNumber'=>":slno",'seller'=>":slr"]) }}';
	url = url.replace(':id', countryID);
	url = url.replace(':slssn', saleSeason);
	url = url.replace(':slno', saleNumber);
	url = url.replace(':slr', seller);

	var table = $('#green-deffects-table').DataTable({
		dom: 'Bfrtip',  
		type: 'POST',
   		url: 'cataloguequalitydetailslist',
        processing: true,
        deferRender: true,
        ajax: url,
     	buttons: [
     		'pageLength',
	     	{
	     		extend: 'pdf',
	     		exportOptions: {
	     			columns: [1,2,3,4,5,7,8,9,10,11]
	     		}
	     	},
	 		{
	     		extend: 'print',
	     		exportOptions: {
	     			columns: [1,2,3,4,5,7,8,9,10,11]
	     		}
	     	},
	 		{
	     		extend: 'excel',
	     		exportOptions: {
	     			columns: [1,2,3,4,5,7,8,9,10,11]
	     		}
	     	}



     	],
        columns: [
            { data: 'lot', name: 'lot' },
            { data: 'outturn', name: 'outturn'},
            { data: 'mark', name: 'mark'},
            { data: 'grade', name: 'grade'},
            { data: 'region', name: 'region' },
            { data: 'cert', name: 'cert'},

            { data: 'qualityParameterID', name: 'greensize'},
            { data: 'qualityParameterID', name: 'greencolor'},
            { data: 'rw_score', name: 'rw_score'},
            { data: 'prcss_name', name: 'prcss_name'},

            { data: 'qltyd_prcss_value', name: 'qltyd_prcss_value'},
            { data: 'final_comments', name: 'final_comments'},

            { data: 'id', name: 'rawscore'},

            { data: 'dnt', name: 'dnt' },
            { data: 'greencomments', name: 'greencomments' },
            { data: 'rw_quality', name: 'rw_quality' },
            { data: 'cp_quality', name: 'cp_quality' },

        ], 


        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },


        columnDefs: [
	     	{targets: 6,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,6).data();

						var greenSizes = <?php echo json_encode($greensizeall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value);
							});

						} else {
							var selectedAnalysis = " ";

						}


						var select = null;

						var selectStart = "<select class='form-control' id='"+'gs'+ table.cell(meta.row,12).data()+"' name='"+'green_size['+ table.cell(meta.row,12).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<greenSizes.length; i++) {
							extraAnalysisID = greenSizes[i].id.toString();

							if (selectedAnalysisArray.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+greenSizes[i].id+"' selected='selected'>"+"&nbsp"+greenSizes[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+greenSizes[i].id+"'>"+"&nbsp"+greenSizes[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

	     	{targets: 7,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,6).data();

						var greenColors = <?php echo json_encode($greencolorall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value);
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'gc'+ table.cell(meta.row,12).data()+"' name='"+'green_color['+ table.cell(meta.row,12).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<greenColors.length; i++) {
							extraAnalysisID = greenColors[i].id.toString();
							if (selectedAnalysisArray.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+greenColors[i].id+"' selected='selected'>"+"&nbsp"+greenColors[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+greenColors[i].id+"'>"+"&nbsp"+greenColors[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

	     	{targets: 8,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,6).data();

						var greenDeffects = <?php echo json_encode($greendefectsall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value);
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'gd'+ table.cell(meta.row,12).data()+"' name='"+'green_defects['+ table.cell(meta.row,12).data() +"][]' multiple='multiple'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<greenDeffects.length; i++) {
							extraAnalysisID = greenDeffects[i].id.toString();
							if (selectedAnalysis.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+greenDeffects[i].id+"' selected='selected'>"+"&nbsp"+greenDeffects[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+greenDeffects[i].id+"'>"+"&nbsp"+greenDeffects[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},


	     	{targets: 9,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,6).data();

						var processing = <?php echo json_encode($processingall); ?>;

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'pr'+ table.cell(meta.row,12).data()+"' name='"+'processing_type['+ table.cell(meta.row,12).data() +"]'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 

						var processSelected = table.cell(meta.row,9).data();
						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<processing.length; i++) {
							extraAnalysisID = processing[i].id;
							if (processSelected == processing[i].prcss_initial) {
								selectBody += "<option value='"+processing[i].id+"' selected='selected'>"+"&nbsp"+processing[i].prcss_initial+"</option>";
							} else {
								selectBody += "<option value='"+processing[i].id+"'>"+"&nbsp"+processing[i].prcss_initial+"</option>";
							}
						}

						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

			{targets: 10, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "10" style="text-align:center;" type="text" name="'+"processing_value["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">';
			}},

			{targets: 11, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<textarea cols = "15" type="text" name="'+"comments["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">' + $('<div/>').text(data).html() + '</textarea>';
			}},

	

	     	{targets: 12,
			'render': function (data, type, full, meta, row){

				var analysed = table.cell(meta.row,6).data();

				var rawscore = <?php echo json_encode($rawscoreall); ?>;

				if (analysed != null) {
					var selectedAnalysis = analysed.toString();

				} else {
					var selectedAnalysis = " ";

				}

				var select = null;

				var selectStart = "<select class='form-control' id='"+'rws'+ table.cell(meta.row,12).data()+"' name='"+'raw_score['+ table.cell(meta.row,12).data() +"]'>";
			

				var selectBody = null;
				var extraAnalysisID = null; 

				var processSelected = table.cell(meta.row,8).data();
				selectBody += "<option value=''>Not Set</option>"

				for (var i = 0; i<rawscore.length; i++) {
					extraAnalysisID = rawscore[i].id;
					if (processSelected == rawscore[i].rw_score) {
						selectBody += "<option value='"+rawscore[i].id+"' selected='selected'>"+"&nbsp"+rawscore[i].rw_score+"</option>";
					} else {
						selectBody += "<option value='"+rawscore[i].id+"'>"+"&nbsp"+rawscore[i].rw_score+"</option>";
					}
				}


				var selectEnd = "</select>";

				var select = selectStart.concat(selectBody.concat(selectEnd));

				return select;
		}},



     	],

				

		fnDrawCallback: function( oSettings ) {
			var jArray= <?php echo json_encode($lotsIDs); ?>;

		    $(document).ready(function() {

		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#gs";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableFiltering: true
				        });
		   		}

		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#gc";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableClickableOptGroups: true,
				            enableCollapsibleOptGroups: true,
				            enableFiltering: true
				        });
		   		}

		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#gd";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableClickableOptGroups: true,
				            enableCollapsibleOptGroups: true,
				            enableFiltering: true
				        });
		   		}

		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#pr";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableClickableOptGroups: true,
				            enableCollapsibleOptGroups: true,
				            enableFiltering: true
				        });
		   		}

		    	for(var i=0;i<jArray.length;i++){
			    	var str1 = "#rws";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableClickableOptGroups: true,
				            enableCollapsibleOptGroups: true,
				            enableFiltering: true
				        });
		   		}


		    });
		},

        rowCallback: function( nRow, aData, sData, data, iDisplayIndex, iDisplayIndexFull ) {    
        	var smatchdnt = $('td:eq("13")', nRow).html();
        	var smatchgreencomments = $('td:eq("14")', nRow).html();
        	var smatchraw = $('td:eq("15")', nRow).html();
        	var smatchcup = $('td:eq("16")', nRow).html();

	        if (smatchdnt > 0) {
	            $(nRow).css('color', 'red');  
	        } else if (smatchgreencomments != "Set") {
	            $(nRow).css('color', '#018c36');  
	    	} else if (smatchraw == null || smatchraw == "NA") {
	            $(nRow).css('color', '#01ba1a');  
	        } else if (smatchcup == null || smatchcup == "NA") {
            	$(nRow).css('color', '#010f8c');  
	        }         


	        $('td:eq("13")', nRow).hide();
	        $('td:eq("14")', nRow).hide();
	        $('td:eq("15")', nRow).hide();
	        $('td:eq("16")', nRow).hide();

        },			



		'order': [0, 'asc'],



	});
});
</script>
@endpush
		        <?php
		        } else if ($qtype == 2) {
		        	
		        ?>	
				<table id="screen-table"  class="table table-condensed table-striped" width="100%">
					<thead bgcolor="#086b36">
						<tr>		
							<th>
								<font color="white"> Season </font>
							</th>								  
							<th>
								<font color="white"> Lot </font>
							</th>
							<th>
								<font color="white"> Outturn </font>
							</th>
							<th>
								<font color="white"> Mark </font>
							</th>
							<th>
								<font color="white"> Seller </font>
							</th>
							<th>
								<font color="white"> Grade </font>
							</th>
							<th>
								<font color="white"> Weight </font>
							</th>
							<th>
								<font color="white"> Region </font>
							</th>
							<th>
								<font color="white"> Cert </font>
							</th>
							<th>
								<font color="white"> Screen </font>
							</th>

							<th>
								<font color="white"> Screen(%) </font>
							</th>
							<th style="display: none">
								<font color="white">id</font>
							</th>
							<th style="display: none">
								<font color="white">id</font>
							</th>
							<th style="display: none">
								<font color="white">id</font>
							</th>
							<th style="display: none">
								<font color="white">id</font>
							</th>
							<th style="display: none">
								<font color="white">id</font>
							</th>

						</tr>						
					</thead>
				</table>
@push('scripts')
<script>

	var countryID = document.getElementById("country").value;
	var saleSeason = document.getElementById("sale_season").value;
	var saleNumber = document.getElementById("sale").value;
	var seller = document.getElementById("seller").value;
	
	if (countryID == "") {
		countryID = 0;
	}
	if (saleSeason == "") {
		saleSeason = 0;
	}
	if (saleNumber == "") {
		saleNumber = 0;
	}
	if (seller == "") {
		seller = 0;
	}

	$(document).ready(function (){   

		var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn",'saleNumber'=>":slno",'seller'=>":slr"]) }}';

		url = url.replace(':id', countryID);
		url = url.replace(':slssn', saleSeason);
		url = url.replace(':slno', saleNumber);
		url = url.replace(':slr', seller);

		var table = $('#screen-table').DataTable({
			dom: 'Bfrtip',  
	   		type: 'POST',
	   		url: 'cataloguequalitydetailslist',
	        processing: true,
	        deferRender: true,
	     	ajax: url,

	     	buttons: [
	     		'pageLength',
		     	{
		     		extend: 'pdf',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	},
		 		{
		     		extend: 'print',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	}



	     	],
	        columns: [
	            { data: 'csn_season', name: 'csn_season' },
	            { data: 'lot', name: 'lot' },
	            { data: 'outturn', name: 'outturn'},
	            { data: 'mark', name: 'mark'},
	            { data: 'seller', name: 'seller'},
	            { data: 'grade', name: 'grade'},
	            { data: 'weight', name: 'weight' },
	            { data: 'region', name: 'region' },
	            { data: 'cert', name: 'cert'},

	            { data: 'scr_name', name: 'scr_name'},
	            { data: 'qltyd_scr_value', name: 'qltyd_scr_value'},
	            { data: 'id', name: 'id' },

	            { data: 'dnt', name: 'dnt' },
	            { data: 'greencomments', name: 'greencomments' },
	            { data: 'rw_quality', name: 'rw_quality' },
	            { data: 'cp_quality', name: 'cp_quality' },
	        ],    

	        language: {
	            lengthMenu: "Display _MENU_ records per page",
	            zeroRecords: "Nothing found - sorry",
	            info: "Showing page _PAGE_ of _PAGES_",
	            infoEmpty: "No records available",
	            infoFiltered: "(filtered from _MAX_ total records)"
	        },
        	columnDefs: [



	        	{targets: 9,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,9).data();

						var screensType = <?php echo json_encode($screensType); ?>;

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();

						} else {
							var selectedAnalysis = " ";

						}


						var select = null;

						var selectStart = "<select class='form-control' id='"+'sctype'+ table.cell(meta.row,11).data()+"' name='"+'screen_type['+ table.cell(meta.row,11).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 

						for (var i = 0; i<screensType.length; i++) {
								extraAnalysisID = screensType[i].id;
							if (selectedAnalysis == screensType[i].scr_name) {
								selectBody += "<option value='"+screensType[i].id+"' selected='selected'>"+"&nbsp"+screensType[i].scr_name+"</option>";
							} else {
								selectBody += "<option value='"+screensType[i].id+"'>"+"&nbsp"+screensType[i].scr_name+"</option>";
							}
						}

						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

				{targets: 10, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<input  style="text-align:center; width:150px;" type="text" name="'+"screen_value["+ table.cell(meta.row,11).data()+']" value="' + $('<div/>').text(data).html() + '"/>';
				}}

      		],





		    fnDrawCallback: function( oSettings ) {
				var jArray= <?php echo json_encode($lots); ?>;
			    $(document).ready(function() {
			    	for(var i=0;i<jArray.length;i++){
				    	var str1 = "#sctype";
						var str2 = jArray[i];
						var res = str1.concat(str2);

					        $(res).multiselect({
					        	buttonWidth: '150px',
					            enableClickableOptGroups: true,
					            enableCollapsibleOptGroups: true,
					            enableFiltering: true
					        });
			   		}

			    });
		    },

	        rowCallback: function( nRow, aData, sData, data, iDisplayIndex, iDisplayIndexFull ) {    
	        	var smatchdnt = $('td:eq("12")', nRow).html();
	        	var smatchgreencomments = $('td:eq("13")', nRow).html();
	        	var smatchraw = $('td:eq("14")', nRow).html();
	        	var smatchcup = $('td:eq("15")', nRow).html();


		        if (smatchdnt > 0) {
		            $(nRow).css('color', 'red');  
		        } else if (smatchgreencomments != "Set") {
		            $(nRow).css('color', '#018c36');  
		    	} else if (smatchraw == null || smatchraw == "NA") {
		            $(nRow).css('color', '#01ba1a');  
		        } else if (smatchcup == null || smatchcup == "NA") {
	            	$(nRow).css('color', '#010f8c');  
		        }	              

		        $('td:eq("11")', nRow).hide();
		        $('td:eq("12")', nRow).hide();
		        $('td:eq("13")', nRow).hide();
		        $('td:eq("14")', nRow).hide();
		        $('td:eq("15")', nRow).hide();

	        },			



	        'order': [1, 'asc'],

		});
	});
									

</script>
@endpush		
								
		        <?php
		        } else if ($qtype == 3) {
		        	
		        ?>	

				<table id="cup-table" class="table table-condensed table-striped" width="100%">
					<thead  bgcolor="#086b36">
						<th>
							<font color="white">Lot </font>
						</th>
						<th>
							<font color="white">Outturn </font>
						</th>
						<th>
							<font color="white">Mark </font>
						</th>
						<th>
							<font color="white">Grade </font>
						</th>
						<th>
							<font color="white">Region </font>
						</th>
						<th>
							<font color="white">Cert </font>
						</th>										
						<th>
							<font color="white">Comments </font>
						</th>
						<th>
							<font color="white">Acidity </font>
						</th>
						<th>
							<font color="white">Body </font>
						</th>
						<th>
							<font color="white">Flavour </font>
						</th>
						<th>
							<font color="white">Cup </font>
						</th>
						<th>
							<font color="white">Don't Touch </font>
						</th>
						<th style="display: none">
							<font color="white">id</font>
						</th>
						<th style="display: none">
							<font color="white">id</font>
						</th>
						<th style="display: none">
							<font color="white">id</font>
						</th>
						<th style="display: none">
							<font color="white">id</font>
						</th>


					</thead>
				</table>
@push('scripts')
<script>

	var countryID = document.getElementById("country").value;
	var saleSeason = document.getElementById("sale_season").value;
	var saleNumber = document.getElementById("sale").value;
	var seller = document.getElementById("seller").value;
	if (countryID == "") {
		countryID = 0;
	}
	if (saleSeason == "") {
		saleSeason = 0;
	}
	if (saleNumber == "") {
		saleNumber = 0;
	}
	if (seller == "") {
		seller = 0;
	}

	$(document).ready(function (){   

		var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn",'saleNumber'=>":slno",'seller'=>":slr"]) }}';

		url = url.replace(':id', countryID);
		url = url.replace(':slssn', saleSeason);
		url = url.replace(':slno', saleNumber);
		url = url.replace(':slr', seller);
						
		var table = $('#cup-table').DataTable({
			dom: 'Bfrtip',  
	   		type: 'POST',
	   		url: 'cataloguequalitydetailslist',
	        processing: true,
	        deferRender: true,
	     	ajax: url,

	     	buttons: [
	     		'pageLength',
		     	{
		     		extend: 'pdf',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	},
		 		{
		     		extend: 'print',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	}



	     	],	        

	     	columns: [
	            { data: 'lot', name: 'lot' },
	            { data: 'outturn', name: 'outturn'},
	            { data: 'mark', name: 'mark'},
	            { data: 'grade', name: 'grade'},
	            { data: 'region', name: 'region' },
	            { data: 'cert', name: 'cert'},
	            { data: 'final_comments', name: 'final_comments'},

	            { data: 'acidity', name: 'acidity'},
	            { data: 'body', name: 'body'},
	            { data: 'flavour', name: 'flavour'},
	            { data: 'cp_score', name: 'cp_score'},
	            { data: 'dnt', name: 'dnt' },
	            { data: 'id', name: 'id' },

	            { data: 'greencomments', name: 'greencomments' },
	            { data: 'rw_quality', name: 'rw_quality' },
	            { data: 'cp_quality', name: 'cp_quality' },


	        ],    

	        language: {
	            lengthMenu: "Display _MENU_ records per page",
	            zeroRecords: "Nothing found - sorry",
	            info: "Showing page _PAGE_ of _PAGES_",
	            infoEmpty: "No records available",
	            infoFiltered: "(filtered from _MAX_ total records)"
	        },
        	columnDefs: [
	        	
	  


				{targets: 6, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<textarea class="form-control" rows="2" col="20" name="'+"cup_comments["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">' + $('<div/>').text(data).html() + '</textarea>';
				}},

				{targets: 7, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<input  style="text-align:center; width:150px;" type="text" onkeypress="return allowOnlyNumberAndDot(this.id);" name="'+"acidity["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">';
				}},
				{targets: 8, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<input  style="text-align:center; width:150px;" type="text" onkeypress="return allowOnlyNumberAndDot(this.id);" name="'+"body["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">';
				}},
				{targets: 9, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<input  style="text-align:center; width:150px;" type="text" onkeypress="return allowOnlyNumberAndDot(this.id);" name="'+"flavour["+ table.cell(meta.row,12).data()+']" value="' + $('<div/>').text(data).html() + '">';
				}},

					                
	        	{targets: 10,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,10).data();

						var cupscoreType = <?php echo json_encode($cupscoreType); ?>;

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();

						} else {
							var selectedAnalysis = " ";

						}


						var select = null;

						var selectStart = "<select class='form-control' id='"+'cptype'+ table.cell(meta.row,12).data()+"' name='"+'cup_score['+ table.cell(meta.row,12).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 

						for (var i = 0; i<cupscoreType.length; i++) {
							if (selectedAnalysis == cupscoreType[i].cp_score) {
								selectBody += "<option value='"+cupscoreType[i].id+"' selected='selected'>"+"&nbsp"+cupscoreType[i].cp_score+"</option>";
							} else {
								selectBody += "<option value='"+cupscoreType[i].id+"'>"+"&nbsp"+cupscoreType[i].cp_score+"</option>";
							}
						}

						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

				{targets: 11, 
					'className': 'dt-body-center',
					'render': function (data, type, full, meta, row){
						var dnt = table.cell(meta.row,11).data();
						if (dnt > 0 ) {
							return '<input type="checkbox" name="'+"dont["+ table.cell(meta.row,12).data() +']" value="'+ $('<div/>').text(data).html() + '" checked>';	
						} else {
							return '<input type="checkbox" name="'+"dont["+ table.cell(meta.row,12).data() +']" value="'+ $('<div/>').text(data).html() + '" >';	
						}

					}
				}
      		],




		    fnDrawCallback: function( oSettings ) {
				var jArray= <?php echo json_encode($lots); ?>;
			    $(document).ready(function() {
			    	for(var i=0;i<jArray.length;i++){
				    	var str1 = "#cptype";
						var str2 = jArray[i];
						var res = str1.concat(str2);

					        $(res).multiselect({
					        	buttonWidth: '150px',
					            enableClickableOptGroups: true,
					            enableCollapsibleOptGroups: true,
					            enableFiltering: true
					        });
			   		}

			    });
		    },
	        
	       					
	        rowCallback: function( nRow, aData, sData, data, iDisplayIndex, iDisplayIndexFull ) {    
	        	var smatchdnt = $('td:eq("11")', nRow).html();
	        	var smatchgreencomments = $('td:eq("13")', nRow).html();
	        	var smatchraw = $('td:eq("14")', nRow).html();
	        	var smatchcup = $('td:eq("15")', nRow).html();

		        if (smatchdnt.split(/"/)[5] > 0) {
		            $(nRow).css('color', 'red');  
		        } else if (smatchgreencomments != "Set") {
		            $(nRow).css('color', '#018c36');  
		    	} else if (smatchraw == null || smatchraw == "NA") {
		            $(nRow).css('color', '#01ba1a');  
		        } else if (smatchcup == null || smatchcup == "NA") {
	            	$(nRow).css('color', '#010f8c');  
		        }	 	              


		        $('td:eq("12")', nRow).hide();
		        $('td:eq("13")', nRow).hide();
		        $('td:eq("14")', nRow).hide();
		        $('td:eq("15")', nRow).hide();

	        },		



	        'order': [0, 'asc'],

		});
	});
									

</script>
@endpush				

				<?php
			        
			    }
			    ?>	
				</div>
				<div class="row">
		            <div class="form-group col-md-12">
		           		<button type="submit" name="submitlot" class="btn btn-lg btn-success btn-block">Add/Update Quality Information</button>
		            </div>
		        </div>
	        </form>
	</div>

</div>	
<p id="demo"></p>

<script type="text/javascript">
	var jArray= <?php echo json_encode($lots); ?>;

    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gs";
			var str2 = jArray[i];
			var res = str1.concat(str2);
		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableFiltering: true
		        });
   		}
    });

    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gc";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableClickableOptGroups: true,
		            enableCollapsibleOptGroups: true,
		            enableFiltering: true
		        });
   		}

    });


    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#gd";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableClickableOptGroups: true,
		            enableCollapsibleOptGroups: true,
		            enableFiltering: true
		        });
   		}

    });


    $(document).ready(function() {
    	for(var i=0;i<jArray.length;i++){
	    	var str1 = "#prc";
			var str2 = jArray[i];
			var res = str1.concat(str2);

		        $(res).multiselect({
		        	buttonWidth: '150px',
		            enableFiltering: true
		        });
   		}

    });
</script>

<script type="text/javascript">
	function allowOnlyNumberAndDot(txt)
    {
        if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
        {
          	return true;
        }
        else
        {
            event.keyCode=0;
            alert("Only Numbers with dot allowed !!");
            return false;
        }

    }

</script>
<style type="text/css">
	table {
	    table-layout:auto;
	}

	.div-table-content {
	  height:500px;
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

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#cataloguequalitydetailslistform" ).submit();
		}
	})
</script>
@endpush