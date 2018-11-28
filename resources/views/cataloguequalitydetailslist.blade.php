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
	if(isset($acidities)){
		$aciditiesOLD = $acidities;
		$aciditiesall = array();

		foreach ($aciditiesOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($aciditiesall, $newElement);
			}

		}

	} else {
		$aciditiesall = array();		
	}
	if(isset($flavours)){
		$flavoursOLD = $flavours;
		$flavoursall = array();

		foreach ($flavoursOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($flavoursall, $newElement);
			}

		}

	} else {
		$flavoursall = array();		
	}
	if(isset($bodies)){
		$bodiesOLD = $bodies;
		$bodiesall = array();

		foreach ($bodiesOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($bodiesall, $newElement);
			}

		}

	} else {
		$bodiesall = array();		
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
	
	if(isset($coffeequality)){
		$rwqualityOLD = $coffeequality;
		$rwqualityall = array();
		
		foreach ($rwqualityOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['rw_score'] = $value->qp_parameter;
				array_push($rwqualityall, $newElement);
			}
		}

	} else {
		$rwqualityall = array();		
	}
	//dd($partchment); exit;
	if(isset($partchment)){
		$ptqualityOLD = $partchment;
		$ptqualityall = array();
		
		foreach ($ptqualityOLD->all() as $field => $value) {
			if ($value->qp_parameter != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['qp_parameter'] = $value->qp_parameter;
				array_push($ptqualityall, $newElement);
			}
		}

	} else {
		$ptqualityall = array();		
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
	if(isset($coffee_class_cc)){
		$coffee_classOLD = $coffee_class_cc;
		$coffee_classall = array();

		foreach ($coffee_classOLD->all() as $field => $value) {
			if ($value->cc_name != null) {
				$newElement = array();
				$newElement['id'] = $value->id;
				$newElement['cc_name'] = $value->cc_name;
				array_push($coffee_classall, $newElement);
			}

		}

	} else {
		$coffee_classall = array();		
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
	
	if (isset($parchments) && count($parchments) > 0) {

		foreach ($parchments->all() as $value) {
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
								<!-- <th>
									<font color="white"> Lot</font>
								</th> -->
								<th>
									<font color="white"> Outturn</font>
								</th>
								<th>
									<font color="white"> Mark</font>
								</th>
								<th>
									<font color="white"> Grade</font>
								</th>
								<!-- <th>
									<font color="white"> Region</font>
								</th> -->
								<th>
									<font color="white"> Parchment</font>
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
								<!-- <th>
									<font color="white"> Process</font>
								</th>
								<th>
									<font color="white"> P Loss(%)</font>
								</th> -->
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

if (countryID == "") {
	countryID = 0;
}
if (saleSeason == "") {
	saleSeason = 0;
}

$(document).ready(function (){  
	var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn"]) }}';
	url = url.replace(':id', countryID);
	url = url.replace(':slssn', saleSeason);
	console.warn(url)

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
           // { data: 'lot', name: 'lot' },
            { data: 'outturn', name: 'outturn'},
            { data: 'mark', name: 'mark'},
            { data: 'grade', name: 'grade'},
            // { data: 'region', name: 'region' },
            { data: 'pct_id', name: 'parchment'},

            { data: 'qualityParameterID', name: 'greensize'},
            { data: 'qualityParameterID', name: 'greencolor'},
            { data: 'rw_score', name: 'rw_score'},
            // { data: 'prcss_name', name: 'prcss_name'},

            // { data: 'qltyd_prcss_value', name: 'qltyd_prcss_value'},
            { data: 'final_comments', name: 'final_comments'},

            { data: 'id', name: 'rawscore'},

            { data: 'dnt', name: 'dnt' },
            { data: 'final_comments', name: 'greencomments' },
            { data: 'rw_quality', name: 'rw_quality' },
            { data: 'qualityParameterPtyID', name: 'qualityParameterPtyID'},

        ], 


        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },


        columnDefs: [
			{targets: 3,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,12).data();

						var ptscore = <?php echo json_encode($ptqualityall); ?>;


						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'ptdsc'+ table.cell(meta.row,8).data()+"' name='"+'ptdesc['+ table.cell(meta.row,8).data() +"][]' multiple='multiple'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<ptscore.length; i++) {
							extraAnalysisID = ptscore[i].id.toString().trim();
							if (selectedAnalysis.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+ptscore[i].id+"' selected='selected'>"+"&nbsp"+ptscore[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+ptscore[i].id+"'>"+"&nbsp"+ptscore[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				
	     	{targets: 4,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,4).data();

						var greenSizes = <?php echo json_encode($greensizeall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}


						var select = null;

						var selectStart = "<select class='form-control' id='"+'gs'+ table.cell(meta.row,8).data()+"' name='"+'green_size['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<greenSizes.length; i++) {

							extraAnalysisID = greenSizes[i].id.toString().trim();

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

	     	{targets: 5,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,4).data();
						
						var greenColors = <?php echo json_encode($greencolorall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'gc'+ table.cell(meta.row,8).data()+"' name='"+'green_color['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectedAnalysisArray = Object.values(selectedAnalysisArray);

						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<greenColors.length; i++) {

							extraAnalysisID = greenColors[i].id.toString().trim();

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

	     	{targets: 6,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,4).data();

						var greenDeffects = <?php echo json_encode($greendefectsall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'gd'+ table.cell(meta.row,8).data()+"' name='"+'green_defects['+ table.cell(meta.row,8).data() +"][]' multiple='multiple'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<greenDeffects.length; i++) {
							extraAnalysisID = greenDeffects[i].id.toString().trim();
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


	    

			{targets: 7, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<textarea cols = "15" type="text" name="'+"comments["+ table.cell(meta.row,8).data()+']" value="' + $('<div/>').text(data).html() + '">' + $('<div/>').text(data).html() + '</textarea>';
			}},



	     	{targets: 8,
			'render': function (data, type, full, meta, row){

				var analysed = table.cell(meta.row,4).data();

				var rawscore = <?php echo json_encode($rwqualityall); ?>;

				if (analysed != null) {
					var selectedAnalysis = analysed.toString();

				} else {
					var selectedAnalysis = " ";

				}

				var select = null;

				var selectStart = "<select class='form-control' id='"+'rws'+ table.cell(meta.row,8).data()+"' name='"+'raw_score['+ table.cell(meta.row,8).data() +"]'>";
			

				var selectBody = null;
				var extraAnalysisID = null; 

				var processSelected = table.cell(meta.row,11).data();
				selectBody += "<option value=''>Not Set</option>"
				
				for (var i = 0; i<rawscore.length; i++) {
					extraAnalysisID = rawscore[i].id;
					if (processSelected == rawscore[i].id) {
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
			    	var str1 = "#ptdsc";
					var str2 = jArray[i];
					var res = str1.concat(str2);
				        $(res).multiselect({
				        	buttonWidth: '150px',
				            enableClickableOptGroups: true,
				            enableCollapsibleOptGroups: true,
				            enableFiltering: true
				        });
		   		}
		    	// for(var i=0;i<jArray.length;i++){
			    // 	var str1 = "#pr";
				// 	var str2 = jArray[i];
				// 	var res = str1.concat(str2);
				//         $(res).multiselect({
				//         	buttonWidth: '150px',
				//             enableClickableOptGroups: true,
				//             enableCollapsibleOptGroups: true,
				//             enableFiltering: true
				//         });
		   		// }

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
        	var smatchdnt = $('td:eq("9")', nRow).html();
        	var smatchgreencomments = $('td:eq("10")', nRow).html();
        	var smatchraw = $('td:eq("11")', nRow).html();
        	var smatchcup = $('td:eq("12")', nRow).html();

	        if (smatchdnt > 0) {
	            $(nRow).css('color', 'red');  
	        } else if (smatchgreencomments != "Set") {
	            $(nRow).css('color', '#018c36');  
	    	} else if (smatchraw == null || smatchraw == "NA") {
	            $(nRow).css('color', '#01ba1a');  
	        } else if (smatchcup == null || smatchcup == "NA") {
            	$(nRow).css('color', '#010f8c');  
	        }         


	        $('td:eq("9")', nRow).hide();
	        $('td:eq("10")', nRow).hide();
	        $('td:eq("11")', nRow).hide();
	        $('td:eq("12")', nRow).hide();

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
							<!-- <th>
								<font color="white"> Lot </font>
							</th> -->
							<th>
								<font color="white"> Outturn </font>
							</th>
							<th>
								<font color="white"> Mark </font>
							</th>
							<th>
								<font color="white"> Grade </font>
							</th>
							<th>
								<font color="white"> SC18(AA,TT,E) percentage </font>
							</th>
							<th>
								<font color="white"> SC16(AB,TT,B) percentage </font>
							</th>
							<th>
								<font color="white"> SC14(C,T,B) percentage </font>
							</th>
							<th>
								<font color="white"> (T,HE,SB) percentage </font>
							</th>

							<th>
								<font color="white"> SC18(AA,TT,E) class </font>
							</th>
							<th>
								<font color="white"> SC16(AB,TT,B) class </font>
							</th>
							<th>
								<font color="white"> SC14(C,T,B) class </font>
							</th>
							<th>
								<font color="white"> (T,HE,SB) class </font>
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
	
	
	if (countryID == "") {
		countryID = 0;
	}
	if (saleSeason == "") {
		saleSeason = 0;
	}
	
	var jarray = []
	$(document).ready(function (){   

		var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn"]) }}';

		url = url.replace(':id', countryID);
		url = url.replace(':slssn', saleSeason);
	

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
	            { data: 'csn_season', name: 'csn_season' },//0
	            // { data: 'lot', name: 'lot' },
	            { data: 'outturn', name: 'outturn'},//1
	            { data: 'mark', name: 'mark'},//2
	           
	            { data: 'grade', name: 'grade'},//3
	            { data: 'id', name: 'screen' },//4
	            { data: 'id', name: 'screen' },//5
	            { data: 'id', name: 'screen'},//6

	            { data: 'id', name: 'screen'},//7
	            { data: 'id', name: 'screen'},//8
				{ data: 'id', name: 'screen'},//9
				{ data: 'id', name: 'screen'},//10
				{ data: 'id', name: 'screen'},//11
	            { data: 'id', name: 'screen' },//12

	            { data: 'dnt', name: 'dnt' },//13
	            { data: 'qualityParameterSCRID', name: 'qualityParameterSCRID' },//14
	            { data: 'rw_quality', name: 'rw_quality' },//15
	            { data: 'cp_quality', name: 'cp_quality' },//16
	        ],    

	        language: {
	            lengthMenu: "Display _MENU_ records per page",
	            zeroRecords: "Nothing found - sorry",
	            info: "Showing page _PAGE_ of _PAGES_",
	            infoEmpty: "No records available",
	            infoFiltered: "(filtered from _MAX_ total records)"
	        },
        	columnDefs: [



	        	
				{targets: 4, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = ''
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==1){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						return '<input  style="text-align:center; width:150px;" data-screen="'+str1_ss+'" type="text" name="'+"screen_value[1]["+table.cell(meta.row,12).data() +']" value="' + value +'"/>';
						}else{
							return '<input  style="text-align:center; width:150px;" data-screen= type="text" name="'+"screen_value[1]["+ table.cell(meta.row,12).data()+']" value=""/>';
						}
				}},
				{targets: 5, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = ''
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==2){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						return '<input  style="text-align:center; width:150px;" data-screen="'+str1_ss+'" type="text" name="'+"screen_value[2]["+table.cell(meta.row,12).data() +']" value="' + value +'"/>';
						}else{
							return '<input  style="text-align:center; width:150px;" data-screen= type="text" name="'+"screen_value[2]["+ table.cell(meta.row,12).data()+']" value=""/>';
						}
				}},
				{targets: 6, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = ''
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==3){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						return '<input  style="text-align:center; width:150px;" data-screen="'+str1_ss+'" type="text" name="'+"screen_value[3]["+table.cell(meta.row,12).data() +']" value="' + value +'"/>';
						}else{
							return '<input  style="text-align:center; width:150px;" data-screen= type="text" name="'+"screen_value[3]["+ table.cell(meta.row,12).data()+']" value=""/>';
						}
				}},
				{targets: 7, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = ''
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==4){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						return '<input  style="text-align:center; width:150px;" data-screen="'+str1_ss+'" type="text" name="'+"screen_value[4]["+table.cell(meta.row,12).data() +']" value="' + value +'"/>';
						}else{
							return '<input  style="text-align:center; width:150px;" data-screen= type="text" name="'+"screen_value[4]["+ table.cell(meta.row,12).data()+']" value=""/>';
						}
				}},
				{targets: 8,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,12).data();
						
						var coffee_classes = <?php echo json_encode($coffee_classall); ?>;

						var selectedAnalysisArray = [];
						
						var str1_ss = ''
						var value = null;
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = null
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==6){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'sccl'+ table.cell(meta.row,8).data()+"' name='"+'screen_class[6]['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectedAnalysisArray = Object.values(selectedAnalysisArray);

						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<coffee_classes.length; i++) {

							extraAnalysisID = coffee_classes[i].id.toString().trim();
							
							if (extraAnalysisID == value) {
								selectBody += "<option value='"+coffee_classes[i].id+"' selected='selected'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							} else {
								selectBody += "<option value='"+coffee_classes[i].id+"'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				{targets: 9,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,12).data();
						
						var coffee_classes = <?php echo json_encode($coffee_classall); ?>;

						var selectedAnalysisArray = [];
						
						var str1_ss = ''
						var value = null;
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = null
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==7){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'sccl'+ table.cell(meta.row,8).data()+"' name='"+'screen_class[7]['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectedAnalysisArray = Object.values(selectedAnalysisArray);

						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<coffee_classes.length; i++) {

							extraAnalysisID = coffee_classes[i].id.toString().trim();
							
							if (extraAnalysisID == value) {
								selectBody += "<option value='"+coffee_classes[i].id+"' selected='selected'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							} else {
								selectBody += "<option value='"+coffee_classes[i].id+"'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				{targets: 10,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,12).data();
						
						var coffee_classes = <?php echo json_encode($coffee_classall); ?>;

						var selectedAnalysisArray = [];
						
						var str1_ss = ''
						var value = null;
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = null
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==8){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'sccl'+ table.cell(meta.row,8).data()+"' name='"+'screen_class[8]['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectedAnalysisArray = Object.values(selectedAnalysisArray);

						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<coffee_classes.length; i++) {

							extraAnalysisID = coffee_classes[i].id.toString().trim();
							
							if (extraAnalysisID == value) {
								selectBody += "<option value='"+coffee_classes[i].id+"' selected='selected'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							} else {
								selectBody += "<option value='"+coffee_classes[i].id+"'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				{targets: 11,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,12).data();
						
						var coffee_classes = <?php echo json_encode($coffee_classall); ?>;

						var selectedAnalysisArray = [];
						
						var str1_ss = ''
						var value = null;
						var screen_data = table.cell(meta.row,14).data();
						if(screen_data!=null){
						newTemp = screen_data.replace(/'/g, '\"');
						screen_data = JSON.parse(newTemp)
						var str1_ss = null
						var value = null;
						$.each(screen_data, function( index, data ) {
							
							var key = Object.keys(data)[0];
							str1_ss = key;
							if(key==9){
								 value = data[key];
								 str1_ss = key;
							}else{
								
							}
						});
						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'sccl'+ table.cell(meta.row,8).data()+"' name='"+'screen_class[9]['+ table.cell(meta.row,8).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectedAnalysisArray = Object.values(selectedAnalysisArray);

						selectBody += "<option value=''>Not Set</option>"
						for (var i = 0; i<coffee_classes.length; i++) {

							extraAnalysisID = coffee_classes[i].id.toString().trim();
							
							if (extraAnalysisID == value) {
								selectBody += "<option value='"+coffee_classes[i].id+"' selected='selected'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							} else {
								selectBody += "<option value='"+coffee_classes[i].id+"'>"+"&nbsp"+coffee_classes[i].cc_name+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
      		],





		    fnDrawCallback: function( oSettings ) {
				// var jArray= <?php echo json_encode($lots); ?>;
			    // $(document).ready(function() {
			    // 	for(var i=0;i<jArray.length;i++){
				//     	var str1 = "#sctype";
				// 		var str2 = jArray[i];
				// 		var res = str1.concat(str2);

				// 	        $(res).multiselect({
				// 	        	buttonWidth: '150px',
				// 	            enableClickableOptGroups: true,
				// 	            enableCollapsibleOptGroups: true,
				// 	            enableFiltering: true
				// 	        });
			   	// 	}

			    // });
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

		        //$('td:eq("12")', nRow).hide();
		        $('td:eq("12")', nRow).hide();
		        $('td:eq("13")', nRow).hide();
		        $('td:eq("14")', nRow).hide();
		        $('td:eq("15")', nRow).hide();
				$('td:eq("16")', nRow).hide();

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
						<!-- <th>
							<font color="white">Lot </font>
						</th> -->
						<th>
							<font color="white">Outturn </font>
						</th>
						<th>
							<font color="white">Mark </font>
						</th>
						<th>
							<font color="white">Grade </font>
						</th>
						<!-- <th>
							<font color="white">Region </font>
						</th> -->
						<!-- <th>
							<font color="white">Cert </font>
						</th>										 -->
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
							<font color="white">Cup Quality</font>
						</th>
						<th>
							<font color="white">Overall Class </font>
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
	
	if (countryID == "") {
		countryID = 0;
	}
	if (saleSeason == "") {
		saleSeason = 0;
	}
	

	$(document).ready(function (){   

		var url = '{{ route('cataloguequalitydetailslist.getsalelots',['countryID'=>":id",'saleSeason'=>":slssn"]) }}';

		url = url.replace(':id', countryID);
		url = url.replace(':slssn', saleSeason);
	
						
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
	            // { data: 'lot', name: 'lot' },
	            { data: 'outturn', name: 'outturn'},//0
	            { data: 'mark', name: 'mark'},//1
	            { data: 'grade', name: 'grade'},//2
	            // { data: 'region', name: 'region' },
	            // { data: 'cert', name: 'cert'},
	            { data: 'final_comments', name: 'final_comments'},//3

	            { data: 'qualityParameterCupID', name: 'acidity'},//4
	            { data: 'qualityParameterCupID', name: 'body'},//5
	            { data: 'qualityParameterCupID', name: 'flavour'},//6
				{ data: 'cp_quality', name: 'cp_quality'},//7
	            { data: 'overall_class', name: 'overall_class'},//8
	            { data: 'dnt', name: 'dnt' },//9
	            { data: 'id', name: 'id' },//10

	            { data: 'qualityParameterCupID', name: 'qualityParameterCupID' },//11
	            { data: 'rw_quality', name: 'rw_quality' },//12
	            { data: 'cp_quality', name: 'cp_quality' },//13


	        ],    

	        language: {
	            lengthMenu: "Display _MENU_ records per page",
	            zeroRecords: "Nothing found - sorry",
	            info: "Showing page _PAGE_ of _PAGES_",
	            infoEmpty: "No records available",
	            infoFiltered: "(filtered from _MAX_ total records)"
	        },
        	columnDefs: [
	        	
	  


				{targets: 3, 
					'searchable':true,
					'orderable': true,
					'render': function (data, type, full, meta, row){
						return '<textarea class="form-control" rows="2" col="20" name="'+"cup_comments["+ table.cell(meta.row,10).data()+']" value="' + $('<div/>').text(data).html() + '">' + $('<div/>').text(data).html() + '</textarea>';
				}},

				{targets: 4,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,11).data();
						
						var acidities = <?php echo json_encode($aciditiesall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'acd'+ table.cell(meta.row,10).data()+"' name='"+'acidity['+ table.cell(meta.row,10).data() +"][]' multiple='multiple'>";
						
						
						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<acidities.length; i++) {
							extraAnalysisID = acidities[i].id.toString().trim();
							if (selectedAnalysis.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+acidities[i].id+"' selected='selected'>"+"&nbsp"+acidities[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+acidities[i].id+"'>"+"&nbsp"+acidities[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				{targets: 5,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,11).data();

						var bodies = <?php echo json_encode($bodiesall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'bd'+ table.cell(meta.row,10).data()+"' name='"+'body['+ table.cell(meta.row,10).data() +"][]' multiple='multiple'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<bodies.length; i++) {
							extraAnalysisID = bodies[i].id.toString().trim();
							if (selectedAnalysis.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+bodies[i].id+"' selected='selected'>"+"&nbsp"+bodies[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+bodies[i].id+"'>"+"&nbsp"+bodies[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				
				{targets: 6,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,11).data();

						var flavours = <?php echo json_encode($flavoursall); ?>;

						var selectedAnalysisArray = [];

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();
							var selectedAnalysisString = selectedAnalysis.split(',');
							$.each(selectedAnalysisString, function(index, value) { 
								selectedAnalysisArray.push(value.toString().trim());
							});

						} else {
							var selectedAnalysis = " ";

						}

						var select = null;

						var selectStart = "<select class='form-control' id='"+'flv'+ table.cell(meta.row,10).data()+"' name='"+'flavour['+ table.cell(meta.row,10).data() +"][]' multiple='multiple'>";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"
						for (var i = 0; i<flavours.length; i++) {
							extraAnalysisID = flavours[i].id.toString().trim();
							if (selectedAnalysis.indexOf(extraAnalysisID) >= 0) {
								selectBody += "<option value='"+flavours[i].id+"' selected='selected'>"+"&nbsp"+flavours[i].qp_parameter+"</option>";
							} else {
								selectBody += "<option value='"+flavours[i].id+"'>"+"&nbsp"+flavours[i].qp_parameter+"</option>";
							}
						}


						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},
				{targets: 7,
			'render': function (data, type, full, meta, row){

				var analysed = table.cell(meta.row,7).data();

				var rawscore = <?php echo json_encode($rwqualityall); ?>;

				if (analysed != null) {
					var selectedAnalysis = analysed.toString();

				} else {
					var selectedAnalysis = " ";

				}

				var select = null;

				var selectStart = "<select class='form-control' id='"+'cpq'+ table.cell(meta.row,10).data()+"' name='"+'cup_quality['+ table.cell(meta.row,10).data() +"]'>";
			

				var selectBody = null;
				var extraAnalysisID = null; 

				var processSelected = table.cell(meta.row,13).data();
				selectBody += "<option value=''>Not Set</option>"
				
				for (var i = 0; i<rawscore.length; i++) {
					extraAnalysisID = rawscore[i].id;
					if (processSelected == rawscore[i].id) {
						selectBody += "<option value='"+rawscore[i].id+"' selected='selected'>"+"&nbsp"+rawscore[i].rw_score+"</option>";
					} else {
						selectBody += "<option value='"+rawscore[i].id+"'>"+"&nbsp"+rawscore[i].rw_score+"</option>";
					}
				}


				var selectEnd = "</select>";

				var select = selectStart.concat(selectBody.concat(selectEnd));

				return select;
		}},	                
	        	{targets: 8,
					'render': function (data, type, full, meta, row){

						var analysed = table.cell(meta.row,8).data();

						var cupscoreType = <?php echo json_encode($coffee_classall); ?>;

						if (analysed != null) {
							var selectedAnalysis = analysed.toString();

						} else {
							var selectedAnalysis = " ";

						}


						var select = null;

						var selectStart = "<select class='form-control' id='"+'ovrc'+ table.cell(meta.row,10).data()+"' name='"+'overall_class['+ table.cell(meta.row,10).data() +"]' >";
					

						var selectBody = null;
						var extraAnalysisID = null; 
						selectBody += "<option value=''>&nbspNot Set</option>"

						for (var i = 0; i<cupscoreType.length; i++) {
							if (selectedAnalysis == cupscoreType[i].id) {
								selectBody += "<option value='"+cupscoreType[i].id+"' selected='selected'>"+"&nbsp"+cupscoreType[i].cc_name+"</option>";
							} else {
								selectBody += "<option value='"+cupscoreType[i].id+"'>"+"&nbsp"+cupscoreType[i].cc_name+"</option>";
							}
						}

						var selectEnd = "</select>";

						var select = selectStart.concat(selectBody.concat(selectEnd));

						return select;
				}},

				{targets: 9, 
					'className': 'dt-body-center',
					'render': function (data, type, full, meta, row){
						var dnt = table.cell(meta.row,11).data();
						if (dnt > 0 ) {
							return '<input type="checkbox" name="'+"dont["+ table.cell(meta.row,10).data() +']" value="'+ $('<div/>').text(data).html() + '" checked>';	
						} else {
							return '<input type="checkbox" name="'+"dont["+ table.cell(meta.row,10).data() +']" value="'+ $('<div/>').text(data).html() + '" >';	
						}

					}
				}
      		],




		    fnDrawCallback: function( oSettings ) {
				var jArray= <?php echo json_encode($lotsIDs); ?>;
			    $(document).ready(function() {
			    	for(var i=0;i<jArray.length;i++){
				    	var str1 = "#acd";
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
				    	var str1 = "#bd";
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
				    	var str1 = "#flv";
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
	        	// var smatchdnt = $('td:eq("11")', nRow).html();
	        	// var smatchgreencomments = $('td:eq("13")', nRow).html();
	        	// var smatchraw = $('td:eq("14")', nRow).html();
	        	// var smatchcup = $('td:eq("15")', nRow).html();

		        // if (smatchdnt.split(/"/)[5] > 0) {
		        //     $(nRow).css('color', 'red');  
		        // } else if (smatchgreencomments != "Set") {
		        //     $(nRow).css('color', '#018c36');  
		    	// } else if (smatchraw == null || smatchraw == "NA") {
		        //     $(nRow).css('color', '#01ba1a');  
		        // } else if (smatchcup == null || smatchcup == "NA") {
	            // 	$(nRow).css('color', '#010f8c');  
		        // }	 	              
					
				$('td:eq("10")', nRow).hide();
		        $('td:eq("11")', nRow).hide();
		        $('td:eq("12")', nRow).hide();
		        $('td:eq("13")', nRow).hide();
		        

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