@extends ('layouts.dashboard')
@section('page_heading','Hooper Results')
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
	if (old('country') != NULL) {
		$cid = old('country');
	}

	if (!isset($cid )) {
		$cid   = 1;
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
	if (!isset($supervisor)) {
		$supervisor = NULL;
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
		$supervisor = $prdetails->pr_supervisor;
		$prc_season = $prdetails->csn_id;
		$contractID = $prdetails->sct_id;
		$prc = $prdetails->prcss_id;
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
	$stockArray = array();
	$processing_not_set = 0;


	if (isset($StockView) && count($StockView) > 0) {

		foreach ($StockView->all() as $value) {
			if ($value->prcssid == $prid && $value->prcssid != null && $value->pending_process_all != null && $value->additional_processed == null && $value->processtype == $BULKING_PROCESS) {
				$processing_not_set = 1;
			}

		}

	}

	//added to remove chooper for bulks
	$processing_not_set = 0;
	
?>
    <div class="col-md-12">
	        <form id="stocksForm" role="form" method="POST" action="/processinghooper">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<div id='green' class='collapse in' >
		        	<div class="row" >
			            <div class="form-group col-md-3">
			                <label>Country</label>
			                <select class="form-control" disabled>
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
			                <input type="hidden" name="country" id="country" value="{{ $cid }}">	
			            </div>

			            <div class="form-group col-md-3">
			            	<label>Processing Season</label>
			                <select class="form-control" name="processing_season" disabled>
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
			                 <input type="hidden" name="processing_season" id="processing_season" value="{{ $prc_season }}">
			            </div>

			            <div class="form-group col-md-3">
			                <label >Processing Type</label>
			                <select class="form-control" name="process_type" disabled>
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
			            	<label>Results Date</label>
			           		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ old('date').$date }}" disabled/>
			            </div>   
		            </div>
		            <div class="row">

		        		<div class="form-group col-md-3">
		        			<label>Supervisor</label>
		        			 <input type="text" class="form-control" name="supervisor" id ="supervisor" style="text-transform:uppercase; " value="{{ $supervisor }}" ></input>
						</div>	
			            
		        		<div class="form-group col-md-3">
		        			<label>Instruction Number</label>
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" name="ref_no" id ="ref_no" style="text-transform:uppercase; " placeholder="Ref No..."  value="{{ $ref_no }}" maxlength="7"></input>
			                        <span class="input-group-btn">
			                        <button type="submit" name="searchInstruction" class="btn btn-default">
			                        	<i class="fa fa-search"></i>
			                        </button>

		                    </span>
		                    </div>
		                </div>	

			            <div class="form-group col-md-3">
			                <label >Hooper Capacity</label>
			                <select class="form-control" id="hooper_capacity" name="hooper_capacity">
			                	<option></option> 
								@if (isset($hoopers_capacity) && count($hoopers_capacity) > 0)
											@foreach ($hoopers_capacity->all() as $value)
												@if ($prc ==  $value->id)
													<option value="{{ $value->hp_capacity }}" selected="selected">{{ $value->hp_capacity }}</option>
												@else
													<option value="{{ $value->hp_capacity }}">{{ $value->hp_capacity }}</option>
												@endif
											@endforeach										
								@endif
			                </select>	
			            </div>


			        </div>
			          
	            </div>

	            <?php 
	            		if ($processing_not_set == 0) {
	            			?>
				            <div class="row">
					            <div class="form-group col-md-3">
					           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block">Add/Update Hooper Results</button>
					            </div>	

					            <?php 
					            	if (isset($prc)) {
					            		if ($prc == $BULKING_PROCESS) {
					            			?>
									            <div class="form-group col-md-3">
									                <button type="submit"  id="getchops" name="getchops" type="submit" class="btn btn-lg btn-success btn-block">Get Chops Distribution</button>
									            </div>	

					            			<?php

					            		}
					            	}
					            ?>

				            </div>
			    		
	            			<?php

	            		} else {
	            			?>
				            <div class="row">
					            <div class="form-group col-md-3">
					           		<button type="submit" name="submitresults" class="btn btn-lg btn-success btn-block" disabled>Some Processes Are Not Updated</button>
					            </div>	

					            <?php 
					            	if (isset($prc)) {
					            		if ($prc == $BULKING_PROCESS) {
					            			?>
									            <div class="form-group col-md-3">
									                <button type="submit"  id="getchops" name="getchops" type="submit" class="btn btn-lg btn-success btn-block" disabled>Some Processes Are Not Updated</button>
									            </div>	

					            			<?php

					            		}
					            	}
					            ?>

				            </div>
			    		
	            			<?php            			

	            		}
	            ?>


	        	<div class="row">
	        		<div class="panel panel-default" style="padding: 5px;">			           
						<table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
						    <thead>
						        <tr>
									<th style='text-align:center; display: none;' >
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
										Grade
									</th>
									<th>
										Weight To Hooper
									</th>
									<th>
										Instructed Weight										
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
										Value
									</th>
									<th>
										Diff
									</th>
									<th>
										Packages(tags)
									</th>
									<th>
										Additional Process
									</th>									
									<th>
										Not Found
									</th>	
						        </tr>
						    </thead>
						    <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
						        <tr>
									<th style="display: none;">
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
									<th>
										Grade
									</th>
									<th>
										Instructed Weight
									</th>
									<th>
										New Kilos
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
										Value
									</th>
									<th>
										Diff
									</th>
									<th>
										Packages
									</th>
									<th style="display: none;">
										Additional Process
									</th>									
									<th>
										Not Found
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

	var url = '{{ route('processinghooper.getstockview',['countryID'=>":id",'ref_no'=>":rf"]) }}';

	url = url.replace(':id', countryID);
	url = url.replace(':rf', ref_no);

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'processinghooper',
        processing: true,
        deferRender: true,
     	ajax: url,
     	autoWidth: true,
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
            { data: 'id', name: 'tobeprocessed', searchable: false },
            { data: 'csn_season', name: 'csn_season'},
            { data: 'sale', name: 'sale'},
            { data: 'lot', name: 'lot'},
            { data: 'outturn', name: 'outturn' },
            { data: 'grade', name: 'grade'},
            { data: 'weight', name: 'weight', searchable: false},
            { data: 'weight', name: 'weight'},
            { data: 'cert', name: 'cert'},
            { data: 'quality', name: 'quality'},
            { data: 'price', name: 'price'},
            { data: 'value', name: 'value'},
            { data: 'differential', name: 'differential'},
            { data: 'tags', name: 'tags'},
            { data: 'id', name: 'additionalProcessing'},
            { data: 'id', name: 'tobewithdrawn' , searchable: false},
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
        	{targets: 2,
				'visible':false
			},
        	{targets: 3,
				'visible':false
			},
        	
        	{targets: 8,
				'visible':false
			},
        	{targets: 9,
				'visible':false
			},
        	{targets: 10,
				'visible':false
			},

        	{targets: 11,
				'visible':false
			},
        	{targets: 12,
				'visible':false
			},
        	{targets: 14,
				'visible':false
			},
        	{targets: 16,
				'visible':false
			},

        	{targets: 17,
				'visible':false
			},

			{targets: 0,
				'searchable':false,
				'orderable':false,
				'className': 'dt-body-center',
				'render': function (data, type, full, meta, row){
				var ended = table.cell(meta.row,16).data();
				if (ended == null) {
					return '<input type="checkbox" class="chk" name="tobeprocessed[]" value="' + $('<div/>').text(data).html() + '" >';
				} else {
					var viewedfield = '<input type="hidden" name="tobeprocessed[]" value="' + $('<div/>').text(data).html() + '" >';
					var hiddenfield = '<input type="checkbox" checked="checked" value="' + $('<div/>').text(data).html() + '" disabled>';
					var combined = viewedfield.concat(hiddenfield);
					return combined;
				}

				
			}},

			{targets: 6, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"cweight"+ table.cell(meta.row,0).data()+'" id="'+"cweight"+ table.cell(meta.row,0).data()+'" value="' + $('<div/>').text(data).html() + '">';
			}},

			{targets: 13, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"tags"+ table.cell(meta.row,0).data()+'" id="'+"tags"+ table.cell(meta.row,0).data()+'" value="' + $('<div/>').text(data).html() + '">';
			}},

			{targets: 15, 
				'className': 'dt-body-center',
				'render': function (data, type, full, meta, row){
					return '<input type="checkbox" name="tobewithdrawn[]" value="'+ $('<div/>').text(data).html() + '" >';	

				}
			}
      ],



        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {           
            $('td:eq("0")', nRow).addClass('collapse');   

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

        },



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
