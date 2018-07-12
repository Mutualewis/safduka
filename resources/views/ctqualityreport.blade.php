@extends('layouts.dashboard')
@section('page_heading','Catalogue Quality Report')
@section('section')

<div>
  <table id="catalogue-quality" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Date</th>
            <th>Crop</th>
            <th>Sale</th>
            <th>MKT Agent</th>
            <th>Lot</th>
            <th>Outturn</th>
            <th>Mark</th>
            <th>Warehouse</th>
            <th>Grade</th>
            <th>Bags</th>
            <th>Pockets</th>
            <th>Weight</th>
            <th>Cert</th>
            <th>Green</th>
            <th>Processing</th>
            <th>%</th>
            <th>Screen %</th>
            <th>A</th>
            <th>B</th>
            <th>F</th>
            <th>Comments</th>
            <th>Raw Score</th>
            <th>Cup Score</th>
            <th>Basket</th>
            <th>Avoid</th>
            <th>Price</th>
            <th>Status</th>
            <th>Grower</th>
        </tr>
    </thead>
    <tfoot style="display: table-header-group; text-align:left; width: inherit; max-width:100%;">
        <tr>
            <th>Date</th>
            <th>Crop</th>
            <th>Sale</th>
            <th>MKT Agent</th>
            <th>Lot</th>
            <th>Outturn</th>
            <th>Mark</th>
            <th>Warehouse</th>
            <th>Grade</th>
            <th>Bags</th>
            <th>Pockets</th>
            <th>Weight</th>
            <th>Cert</th>
            <th>Green</th>
            <th>Processing</th>
            <th>%</th>
            <th>Screen %</th>
            <th>A</th>
            <th>B</th>
            <th>F</th>
            <th>Comments</th>
            <th>Raw Score</th>
            <th>Cup Score</th>
            <th>Basket</th>
            <th>Avoid</th>
            <th>Price</th>
            <th>Status</th>
            <th>Grower</th>
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
        ajax: "{{ route('ctqualityreport.getreport') }}",


        columns: [
            {data: 'date', name: 'date'},
            {data: 'csn_season', name: 'csn_season'},
            {data: 'sale', name: 'sale'},
            {data: 'seller', name: 'seller'},
            {data: 'lot', name: 'lot'},
            {data: 'outturn', name: 'outturn'},
            {data: 'mark', name: 'mark'},
            {data: 'warehouse', name: 'warehouse'},
            {data: 'grade', name: 'grade'},
            {data: 'bags', name: 'bags'},
            {data: 'pockets', name: 'pockets'},
            {data: 'weight', name: 'weight'},
            {data: 'cert', name: 'cert'},
            {data: 'green', name: 'green'},
            {data: 'prcss_name', name: 'prcss_name'},
            {data: 'qltyd_prcss_value', name: 'qltyd_prcss_value'},
            {data: 'qltyd_scr_value', name: 'qltyd_scr_value'},
            {data: 'acidity', name: 'acidity'},
            {data: 'body', name: 'body'},
            {data: 'flavour', name: 'flavour'},
            {data: 'final_comments', name: 'tag'},
            {data: 'rw_score', name: 'rw_score'},
            {data: 'cp_score', name: 'cp_score'},
            {data: 'code', name: 'code'},
            {data: 'touch', name: 'touch'},
            {data: 'price', name: 'price'},
            {data: 'status', name: 'status'},
            {data: 'cg_name', name: 'cg_name'}
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
