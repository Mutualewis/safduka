@extends ('layouts.dashboard')
@section('page_heading','Pending Allocations')
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
?>
    <div class="col-md-12">
	        <form id="stocksForm" role="form" method="POST" action="processinginstructionsview">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">
	        		<div class="panel panel-default" style="padding: 5px;">			           
						<table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
						    <thead>
						        <tr>
									<th style="display: none;">
										id
									</th>
									<th>
										Season
									</th>									
									<th>
										Process Type
									</th>
									<th>
										Process Number
									</th>
									<th>
										Contract
									</th>									
									<th>
										Weight In
									</th>
									<th>
										Instructions
									</th>
									<th>
										Other Instructions									
									</th>
									<th>
										Supervisor
									</th>
									<th>
										Date
									</th>
									<th>
										Hooper
									</th>
									<th>
										Amend
									</th>
									<th>
										Process Results
									</th>							
									<th>
										Pre-Shipment
									</th>							
									<th>
										Pre-Shipment All
									</th>
						        </tr>
						    </thead>
						    <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
						        <tr>
									<th style="display: none;">
										id
									</th>
									<th>
										Season
									</th>									
									<th>
										Process Type
									</th>
									<th>
										Process Number
									</th>
									<th>
										Contract
									</th>									
									<th>
										Weight In
									</th>
									<th>
										Instructions
									</th>
									<th>
										Other Instructions									
									</th>
									<th>
										Supervisor
									</th>
									<th>
										Date
									</th>
									<th style="display: none;">
										Hooper
									</th>
									<th style="display: none;">
										Amend
									</th>	
									<th style="display: none;">
										Process Results
									</th>							
									<th style="display: none;">
										Pre-Shipment
									</th>						
									<th style="display: none;">
										Pre-Shipment All
									</th>		
						        </tr>
						    </tfoot>

						</table>
@push('scripts')

<script>
	$(document).ready(function (){   

	var url = '{{ route('processinginstructionsview.getprocessview') }}';

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'processinginstructionsview',
        processing: true,
        deferRender: true,
     	ajax: url,
     	autoWidth: true,
     	pageLength: 50,

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

        columnDefs: [
        	{targets: 0,
				'visible':false
			},
			{targets: 10, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/hooper/' + $('<div/>').text(data).html() +  ' ">Hooper</a>';
			}},
			{targets: 12, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/results/' + $('<div/>').text(data).html() +  ' ">Results</a>';
			}},
			{targets: 11, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/amend/' + $('<div/>').text(data).html() +  ' ">Amend</a>';
			}},
			{targets: 13, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/pre_shipment/' + $('<div/>').text(data).html() +  ' ">Download</a>';
			}},
			{targets: 14, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/pre_shipment_all/' + $('<div/>').text(data).html() +  ' ">All</a>';
			}}


		],


        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'season', name: 'season'},
            { data: 'process', name: 'process'},
            { data: 'process_number', name: 'process_number'},
            { data: 'contract_number', name: 'contract_number'},
            { data: 'pr_weight_in', name: 'pr_weight_in'},
            { data: 'process_instructions', name: 'process_instructions'},
            { data: 'process_other_instructions', name: 'process_other_instructions'},
            { data: 'supervisor', name: 'supervisor'},
            { data: 'process_date', name: 'process_date'},
            { data: 'id', name: 'id', searchable: false },
            { data: 'id', name: 'id', searchable: false },
            { data: 'id', name: 'id', searchable: false },
            { data: 'id', name: 'id', searchable: false },
            { data: 'id', name: 'id', searchable: false },

        ],    

        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
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

        order: [],

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
