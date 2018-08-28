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

    <div class="col-md-12">
	        <form id="stocksForm" role="form" method="POST" action="pendingallocations">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        	<div class="row">
	        		<div class="panel panel-default" style="padding: 5px;">			           
						<table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
						    <thead>
						        <tr>
									<th>
										Contract
									</th>								
									<th>
										Quality Code
									</th>
									<th>
										Client
									</th>									
									<th>
										Destination
									</th>
									<th>
										Stuffed Weight
									</th>
									<th>
										Date
									</th>		
									<th>
										Update Allocation
									</th>								
						        </tr>
						    </thead>
						    <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
						        <tr>
									<th>
										Contract
									</th>								
									<th>
										Quality Code
									</th>
									<th>
										Client
									</th>									
									<th>
										Destination
									</th>
									<th>
										Stuffed Weight
									</th>
									<th>
										Date
									</th>	
									<th style="display: none;">
										Update Allocation
									</th>	
						        </tr>
						    </tfoot>

						</table>
@push('scripts')

<script>

	$(document).ready(function (){   

	var url = '{{ route('pendingallocations.getpendinginstructions') }}';

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'pendingallocations',
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
			{targets: 6, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<a href="/update/' + $('<div/>').text(data).html() +  ' ">Update Allocations</a>';
			}},

		],

        columns: [
            { data: 'sct_number', name: 'sct_number', searchable: false },
            { data: 'bs_code', name: 'bs_code'},
            { data: 'cl_name', name: 'cl_name'},
            { data: 'sct_destination', name: 'sct_destination'},
            { data: 'stuffed_weight', name: 'stuffed_weight'},
            { data: 'sct_date', name: 'sct_date'},
            { data: 'sctid', name: 'sctid', searchable: false },

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
