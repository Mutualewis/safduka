@extends('layouts.dashboard')
@section('page_heading','Warehouse Charges Report')
@section('section')

<div>
  <table id="warehouse-charges" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>Gr number</th>
            <th>Sale</th>
            <th>Season</th>
            <th>Lot</th>
            <th>Outturn</th>
            <th>Seller</th>
            <th>Warehouse Name</th>
            <th>Mark</th>
            <th>Grade</th>
            <th>Outturn Bags</th>
            <th>Outturn Weight</th>
            <th>Outturn Pockets</th>
            <th>Warrant No</th>
            <th>Prompt Date</th> 
            <th>Dispatch Date</th>     
            <th>Storage Days</th>
            <th>Storage Rate</th>
            <th>Storage Charges</th>
            <th>Handling Rate Per Bag</th>
            <th>Handling charges</th>
            <th>Warrant Rate</th>
            <th>Warrant charges</th>
        </tr>
    </thead>
    <tfoot style="display: table-header-group; text-align:left; width: inherit; max-width:100%;">
        <tr>
            <th>Gr number</th>
            <th>Sale</th>
            <th>Season</th>
            <th>Lot</th>
            <th>Outturn</th>
            <th>Seller</th>
            <th>Warehouse Name</th>
            <th>Mark</th>
            <th>Grade</th>
            <th>Outturn Bags</th>
            <th>Outturn Weight</th>
            <th>Outturn Pockets</th>
            <th>Warrant No</th>
            <th>Prompt Date</th> 
            <th>Dispatch Date</th>     
            <th>Storage Days</th>
            <th>Storage Rate</th>
            <th>Storage Charges</th>
            <th>Handling Rate Per Bag</th>
            <th>Handling charges</th>
            <th>Warrant Rate</th>
            <th>Warrant charges</th>
        </tr>
    </tfoot>

  </table>
</div>

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    var url = "{{ route('warehousechargerates.getreport') }}";
    console.log(url)
    oTable = $('#warehouse-charges').DataTable({
    	dom: 'Bfrtip',
    	type: 'POST',
        processing: true,
        deferRender: true,
        ajax: url,


        columns: [
            {data: 'gr_number', name: 'gr_number'},
            {data: 'sale', name: 'sale'},
            {data: 'csn_season', name: 'csn_season'},
            {data: 'lot', name: 'lot'},
            {data: 'outturn', name: 'outturn'},
            {data: 'seller', name: 'seller'},
            {data: 'wr_name', name: 'wr_name'},
            {data: 'mark', name: 'mark'},
            {data: 'grade', name: 'grade'},
            {data: 'ott_weight', name: 'ott_weight'},
            {data: 'ott_bags', name: 'ott_bags'},
            {data: 'ott_pockets', name: 'ott_pockets'},
            {data: 'warrant_no', name: 'warrant_no'},
            {data: 'prompt_date', name: 'prompt_date'},
            {data: 'wb_dispatch_date', name: 'wb_dispatch_date'},
            {data: 'storage_days', name: 'storage_days'},
            {data: 'storage_rate', name: 'storage_rate'},
            {data: 'storage_charges', name: 'storage_charges'},
            {data: 'handling_bag_rate', name: 'handling_bag_rate'},
            {data: 'handling_charges', name: 'handling_charges'},
            {data: 'warrant_rate', name: 'warrant_rate'},
            {data: 'warrant_rate', name: 'warrant_rate'}
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
	     		title: 'Warehouse Charges'
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
