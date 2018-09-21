@extends('layouts.dashboard')
@section('page_heading','Processing Charges Report')
@section('section')

<div>
  <table id="catalogue-quality" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Process</th>
            <th>Service</th>
            <th>Rate</th>
            <th>Packages</th>
            <th>Total</th>
            <th>Team</th>
           
        </tr>
    </thead>
    <tfoot style="display: table-header-group; text-align:left; width: inherit; max-width:100%;">
        <tr>
            <th>Process</th>
            <th>Service</th>
            <th>Rate</th>
            <th>Packages</th>
            <th>Total</th>
            <th>Team</th>
        </tr>
    </tfoot>

  </table>
</div>

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#catalogue-quality').DataTable({
    	dom: 'Bfrtip',
    	type: 'POST',
        processing: true,
        deferRender: true,
        ajax: "{{ route('processchargerates.getreport') }}",


        columns: [
            {data: 'prcgs_instruction_no', name: 'process'},
            {data: 'prcgs_service', name: 'service'},
            {data: 'prcgs_rate', name: 'rate'},
            {data: 'bags', name: 'bags'},
            {data: 'prcgs_total', name: 'total'},
            {data: 'tms_grpname', name: 'team'}
        ],
        pageLength: 25,

        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },
     	buttons: [
     		'pageLength',
     		'copy',
	 		{
	     		extend: 'excel',
	     		title: 'Sale_Lots_Quality'
	     	}



     	],
        
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

        }

    });
});
</script>           
@endpush



@stop
