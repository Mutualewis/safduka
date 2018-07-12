@extends('layouts.dashboard')
@section('page_heading','Welcome')
@section('section')

<link rel="stylesheet" type="text/css" href="{{ asset("plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}" >
<link rel="stylesheet" type="text/css" href="{{ asset("dist/css/adminlte.css") }}" >
<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/bootbox.min.js") }}" ></script>
<div class="col-lg-12 col-lg-offset-0">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<?php
    
    use Ngea\StocksSummary;

    // $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
    //                     ->select('ssm1.*')
    //                     ->leftJoin('stocks_summary_ssm AS ssm2', function ($join) {
    //                         $join->on('ssm1.wr_name', '=', 'ssm2.wr_name')
    //                             ->on('ssm1.ssm_buyer', '=', 'ssm2.ssm_buyer')
    //                             ->on('ssm1.created_at', '<', 'ssm2.created_at');
                                
    //                     })
    //                     ->whereNull('ssm2.wr_name')
    //                     ->groupBy('ssm1.wr_name', 'ssm1.ssm_buyer')
    //                     ->orderBy('ssm1.wr_name')
    //                     ->get();
    $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
                    ->select('ssm1.*' ,DB::raw('sum(ssm_weight) as weight'))
                    ->whereRaw('created_at > (now() - interval 30 minute)')
                    ->groupBy('wr_name')
                    ->get();
    
    $stocksummmarypermonth = DB::table('stocks_summary_ssm as ssm2')
                    ->select('ssm2.*')
                    ->whereRaw('created_at IN (SELECT max(created_at)
                    FROM stocks_summary_ssm GROUP BY MONTH(created_at))')
                    ->get();
    $months = [];
    $totals = [];    
        for ($i = 0; $i < 6; $i++) {
            $value = 0;
            $datecurr = date('Y m', strtotime("-$i month"));
            $months[] = date('F', strtotime("-$i month"));
            foreach($stocksummmarypermonth as $monthvals){
                $ssm_weight = $monthvals->ssm_weight;
                $created_at = $monthvals->created_at;
                $created_at = date('Y m', strtotime($created_at));
                //dump($datecurr == date('Y m d', strtotime($created_at)));
                if($datecurr == $created_at){
                    $value=$value+$ssm_weight;
                }
             }

             $totals[] = $value/60;  
        }

    $months= json_encode(array_reverse($months));
    $totals = json_encode(array_reverse($totals));
    // $StocksSummary
    $warehouse =  array();

    $weight =  array();
    $currentstock = 0;
    

    if (isset($StocksSummary) && count($StocksSummary) > 0) {

        foreach ($StocksSummary as $value) {

            if (!in_array($value->wr_name, $warehouse)) {

                array_push($warehouse, $value->wr_name);

                array_push($weight, $value->weight);

                $currentstock= $currentstock+$value->weight;
                // print_r($value->wr_name."-".$value->weight."<br>");

            }                


        }

    }

    $warehouse = json_encode($warehouse);

    $weight = json_encode($weight);




    // $weight = StocksSummary::select(DB::raw('sum(ssm_weight) as weight'))->groupBy('wr_name')->get()->toArray();

    // // $weight = StocksSummary::select('browser', DB::raw('count(*) as total'))->groupBy('wr_name')->get()->toArray();
    // $weight = json_encode(array_column($weight, 'weight'),JSON_NUMERIC_CHECK);


?>
    <div class="col-lg-12">


              <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{number_format($currentstock/60)}}</h3>

                <p>total Stocks</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#"  data-toggle='modal' data-target='#stockModalCenter' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="totalreceived"><i class="fa fa-spinner fa-spin fa-2x"></i> </h3>

                <p>Total Received</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" data-toggle='modal' data-target='#receivedModalCenter' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="totalpurchased"><i class="fa fa-spinner fa-spin fa-2x"></i> </h3>

                <p>Total Purchased</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#"  data-toggle='modal' data-target='#purchasedModalCenter' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="totalstuffed"><i class="fa fa-spinner fa-spin fa-2x"></i> </h3>

                <p>Total Stuffed</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#"  data-toggle='modal' data-target='#stuffedModalCenter' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-8">
                    <p class="text-center">
                      <strong>Stocks:</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="320" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-4">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Storage Per Warehouse</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart"  width="1000" height="1000"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-4">
                    <ul class="chart-legend clearfix piedetail">
                      
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                <ul class="nav nav-pills flex-column segmentspc" >
                  
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->

                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-lg-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stock Locations</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-lg-flex">
                <div class="chart">
                <h2>Total Stocks</h2>
                    <canvas id="bar" width="900" height="600"></canvas>
                  </div>
                 
                </div><!-- /.d-lg-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            

            
          </div>
          <!-- /.col -->

          <div class="col-lg-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fa fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Processed summary</span>
                <span class="info-box-number"><a href="#" data-toggle='modal' data-target='#processedModalCenter' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></span>
               
              </div>
              <!-- /.info-box-content -->
              
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa fa-heart-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa fa-cloud-download"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-comment-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->


    </div>    

    <!-- Stocks Modal -->
  <div class="modal fade" id="stockModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="min-width: 700 !important;">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
          <h4 class="alert-heading"></h4>
        </div>
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
                <div class="form-group col-lg-6">
                    <h2>Total Stocks</h2>
                        <div class="row">
                            <div class="panel panel-default" style="padding: 5px;">                    
                                <table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
                                    <thead>
                                        <tr>
                                            <th>WAREHOUSE</th>
                                            <th>BUYER</th>
                                            <th class="sum">WEIGHT</th>
                                            <th class="sum">BAGS</th>
                                            <th class="sum">VALUE</th>
                                            <th class="sum">AVERAGE STORAGE(days)</th>
                                        </tr>
                                    </thead>
                                    <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
                                        <tr>
                                            <th>WAREHOUSE</th>
                                            <th>BUYER</th>
                                            <th>WEIGHT</th>
                                            <th>BAGS</th>
                                            <th>VALUE</th>
                                            <th>AVERAGE STORAGE</th>      
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>

                        </div>

                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
        <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
      </div>
    </div>
  </div>
</div>
</div>

<!--- received modal -->
    <!-- Modal -->
<div class="modal fade" id="receivedModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="min-width: 800 !important;">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
          <h4 class="alert-heading"></h4>
        </div>
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group col-lg-6">
                    <h2>Total Received in Ibero</h2>
                    <div class="row">
                        <div class="panel panel-default" style="padding: 5px;">                    
                            <table id="received-table" class="table table-condensed table-striped" style="width: 100%;" >
                                <thead>
                                    <th>WAREHOUSE FROM</th>
                                    <th>BUYER</th>
                                    <th>MONTH</th>
                                    <th>SEASON</th>
                                    <th class="sum">BAGS</th>
                                    <th class="sum">GAINS/LOSSES</th>
                                    <th class="sum">PERCENTAGE</th>
                                </thead>
                                <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
                                    <th>WAREHOUSE FROM</th>
                                    <th>BUYER</th>
                                    <th>MONTH</th>
                                    <th>SEASON</th>
                                    <th>BAGS</th>
                                    <th>GAINS/LOSSES</th>
                                    <th>PERCENTAGE</th>
                                </tfoot>

                            </table>
                        </div>

                    </div>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
        <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
      </div>
    </div>
  </div>
</div>
</div>


        <!-- Purchased Modal -->
    <div class="modal fade" id="purchasedModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="min-width: 650 !important;">
        <div class="modal-header">
            <h3 class="modal-title" id="title">
            <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"></h4>
            </div>
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
    <div class="form-group col-lg-6">
                    <h2>Total Purchased</h2>
                    <div class="row">
                        <div class="panel panel-default" style="padding: 5px;">                    
                            <table id="purchased-table" class="table table-condensed table-striped" style="width: 100%;" >
                                <thead>
                                    <tr>
                                        <th>SELLER</th>
                                        <th>WAREHOUSE</th>
                                        <th>BUYER</th>
                                        <th>MONTH</th>
                                        <th>SEASON</th>
                                        <th class="sum">BAGS</th>
                                    </tr>
                                </thead>
                                <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
                                    <tr>
                                        <th>SELLER</th>
                                        <th>WAREHOUSE</th>
                                        <th>BUYER</th>
                                        <th>MONTH</th>
                                        <th>SEASON</th>
                                        <th>BAGS</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                    </div>
                </div>
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
        </div>
        </div>
    </div>
    </div>
  </div>
  
        <!-- Processed Modal -->
    <div class="modal fade" id="processedModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="min-width: 650 !important;">
        <div class="modal-header">
            <h3 class="modal-title" id="title">
            <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"></h4>
            </div>
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
    <div class="form-group col-lg-6">
                    <h2>Total Processed</h2>
                    <div class="row">
                        <div class="panel panel-default" style="padding: 5px;">                    
                            <table id="processed-table" class="table table-condensed table-striped" style="width: 100%;" >
                                <thead>
                                    <tr>
                                        <th>BUYER</th>
                                        <th>YEAR</th>
                                        <th>MONTH</th>
                                        <th class="sum">TOTAL BAGS INSTRUCTED</th>
                                        <th class="sum">RESULTS</th>
                                        <th class="sum">GAINS/LOSS</th>
                                    </tr>
                                </thead>
                                <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
                                    <tr>
                                        <th>BUYER</th>
                                        <th>YEAR</th>
                                        <th>MONTH</th>
                                        <th>TOTAL INSTRUCTED</th>
                                        <th>RESULTS</th>
                                        <th>GAINS/LOSS</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                    </div>
                </div>
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
        </div>
        </div>
    </div>
    </div>
    </div>

        <!-- Modal -->
<div class="modal fade" id="stuffedModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="min-width: 600px;">
        <div class="modal-header">
            <h3 class="modal-title" id="title">
            <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"></h4>
            </div>
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
   
                    <h2>Total Stuffed</h2>
  
                   
                        <div class="panel panel-default" style="padding: 5px;">                    
                            <table id="stuffed-table" class="table table-condensed table-striped" >
                                <thead>
                                    <tr>
                                        <th>BUYER</th>
                                        <th>MONTH</th>
                                        <th>YEAR</th>
                                        <th class="sum">BAGS</th>
                                    </tr>
                                </thead>
                                <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
                                    <tr>
                                        <th>BUYER</th>
                                        <th>MONTH</th>
                                        <th>YEAR</th>
                                        <th>BAGS</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                    
               
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
        </div>
        </div>
    </div>
    </div>
    </div>
<!-- stocks -->
        @push('scripts')
        <script>
            $(document).ready(function (){   

            var url = '{{ route('dashboardView.getstocksummary') }}';

            var table = $('#stocks-table').DataTable({
                dom: 'Bfrtip',          
                type: 'POST',
                url: 'home_alternate',
                processing: true,
                deferRender: true,
                ajax: url,
                autoWidth: true,
                pageLength: 5,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                       
                columns: [
                    { data: 'wr_name', name: 'wr_name'},
                    { data: 'buyer', name: 'buyer'},
                    { data: 'weight', name: 'weight'},
                    { data: 'bags', name: 'bags'},
                    { data: 'value', name: 'value'},
                    { data: 'ssm_average_storage', name: 'ssm_average_storage'},

                ],   

                columnDefs: [

                    {targets: 2, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,2).data();

                            weight = Math.floor(weight);

                            return weight.toLocaleString();
                    }},

                    {targets: 3, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,3).data();

                            var bags = Math.floor(weight);
                            
                            return bags.toLocaleString();
                    }},

                    {targets: 4, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,4).data();

                            var bags = Math.floor(weight);
                            
                            return bags.toLocaleString();
                    }}


                ],

                footerCallback: function(row, data, start, end, display) {
                 
                  var api = this.api();
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                   
                    $(this.footer()).html(sum.toLocaleString());
                  });
                },


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

                    this.api().columns('.sum').every(function () {
                        var column = this;

                        var sum = column
                           .data()
                           .reduce(function (a, b) { 
                               a = parseInt(a, 10);
                               if(isNaN(a)){ a = 0; }
                               
                               b = parseInt(b, 10);
                               if(isNaN(b)){ b = 0; }
                               
                               return a + b;
                           });

                        sum = Math.floor(sum);
                        
                        $(column.footer()).html(sum.toLocaleString());
                    });


                },

                order: [],

           });

        });


        </script>
        @endpush

<!-- received -->
        @push('scripts')
        <script>
            $(document).ready(function (){   
            var totalreceived=0;
            var url = '{{ route('dashboardView.getstockreceivedsummary') }}';

            var date = new Date();
            var month = date.getMonth();

            var table = $('#received-table').DataTable({
                dom: 'Bfrtip',          
                type: 'POST',
                processing: true,
                deferRender: true,
                ajax: url,
                autoWidth: true,
                pageLength: 5,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],


                
                // "oSearch": {"sSearch": "Initial search"},

                columns: [
                    { data: 'gsm_warehouse_from', name: 'gsm_warehouse_from'},
                    { data: 'buyer', name: 'buyer'},
                    { data: 'gsm_month', name: 'gsm_month'},
                    { data: 'gsm_season', name: 'gsm_season'},
                    { data: 'bags', name: 'bags'},
                    { data: 'bag_difference', name: 'bag_difference'},
                    { data: 'percentage_weight_difference', name: 'percentage_weight_difference'},

                ],   

                columnDefs: [

                    {targets: 4, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){
                          

                            var weight = table.cell(meta.row,4).data();

                            weight = Math.floor(weight);
                            
                            return weight.toLocaleString();
                    }},

                    {targets: 5, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,5).data();

                            weight = Math.floor(weight);
                           
                            return weight.toLocaleString();
                    }}


                ],


                footerCallback: function(row, data, start, end, display) {
                  var totalreceived=0;
                  for(i=0; i<data.length; i++){
                    totalreceived = parseFloat(totalreceived)+parseFloat(data[i].bags)
                  }
                  $('#totalreceived').html(totalreceived.toLocaleString());

                  var api = this.api();
                 
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                   
                    $(this.footer()).html(sum.toLocaleString());
                   
                  });

                    api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                   
                    $(this.footer()).html(sum.toLocaleString());
      
                  });
                },



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

                    this.api().columns('.sum').every(function () {
                        var column = this;

                        var sum = column
                           .data()
                           .reduce(function (a, b) { 
                               a = parseInt(a, 10);
                               if(isNaN(a)){ a = 0; }
                               
                               b = parseInt(b, 10);
                               if(isNaN(b)){ b = 0; }
                               
                               return a + b;
                           });

                        sum = Math.floor(sum);

                        $(column.footer()).html(sum.toLocaleString());
                    });


                },

                // initComplete: function (settings, json) {
                //     this.api().columns('.sum').every(function () {
                //         var column = this;

                //         var sum = column
                //            .data()
                //            .reduce(function (a, b) { 
                //                a = parseInt(a, 10);
                //                if(isNaN(a)){ a = 0; }
                               
                //                b = parseInt(b, 10);
                //                if(isNaN(b)){ b = 0; }
                               
                //                return a + b;
                //            });

                //         $(column.footer()).html('Sum: ' + sum);
                //     });
                // },



                order: [],

           });




        });



        </script>

        @endpush

<!-- purchased -->
        @push('scripts')
        <script>
            $(document).ready(function (){   

            var url = '{{ route('dashboardView.getpurchasedsummary') }}';

            console.log(url)

            var table = $('#purchased-table').DataTable({
                dom: 'Bfrtip',          
                type: 'POST',
                processing: true,
                deferRender: true,
                ajax: url,
                autoWidth: true,
                pageLength: 5,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],                      

                columns: [
                    { data: 'prsm_seller', name: 'prsm_seller'},
                    { data: 'prsm_wr_name', name: 'prsm_wr_name'},
                    { data: 'buyer', name: 'buyer'},
                    { data: 'prsm_month', name: 'prsm_month'},
                    { data: 'prsm_csn_season', name: 'prsm_csn_season'},
                    { data: 'bags', name: 'bags'},

                ],   

                columnDefs: [

                    {targets: 5, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,5).data();

                            weight = Math.floor(weight);

                            return weight.toLocaleString();
                    }}


                ],


                footerCallback: function(row, data, start, end, display) {
                  var totalpurchased=0;
                  for(i=0; i<data.length; i++){
                    totalpurchased = parseFloat(totalpurchased)+parseFloat(data[i].bags)
                  }
                  $('#totalpurchased').html(totalpurchased.toLocaleString());

                  var api = this.api();
                 
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                    
                    $(this.footer()).html(sum.toLocaleString());
                  });
                },


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


                    this.api().columns('.sum').every(function () {
                        var column = this;

                        var sum = column
                           .data()
                           .reduce(function (a, b) { 
                               a = parseInt(a, 10);
                               if(isNaN(a)){ a = 0; }
                               
                               b = parseInt(b, 10);
                               if(isNaN(b)){ b = 0; }
                               
                               return a + b;
                           });

                        sum = Math.floor(sum);

                        $(column.footer()).html(sum.toLocaleString());
                    });


                },

                order: [],

           });

        });


        </script>

        @endpush

  
<!-- processed -->
        @push('scripts')
        <script>
            $(document).ready(function (){   

            var url = '{{ route('dashboardView.getprocessingsummary') }}';
            console.log(url)
            var table = $('#processed-table').DataTable({
                dom: 'Bfrtip',          
                type: 'POST',
                processing: true,
                deferRender: true,
                ajax: url,
                autoWidth: true,
                pageLength: 5,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                      

                columns: [
                    { data: 'buyer', name: 'buyer'},
                    { data: 'prssm_year', name: 'prssm_year'},
                    { data: 'prssm_month', name: 'prssm_month'},
                    { data: 'total_allocated', name: 'total_allocated'},
                    { data: 'results', name: 'results'},
                    { data: 'difference', name: 'difference'},

                ],   

                columnDefs: [

                    {targets: 3, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,3).data();

                            weight = Math.floor(weight);

                            return weight.toLocaleString();
                    }},

                    {targets: 4, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,4).data();

                            weight = Math.floor(weight);
                            
                            return weight.toLocaleString();
                    }},

                    {targets: 5, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,5).data();

                            weight = Math.floor(weight);
                            
                            return weight.toLocaleString();
                    }}


                ],


                footerCallback: function(row, data, start, end, display) {
                  var api = this.api();
                 
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                    console.log(sum); //alert(sum);
                    $(this.footer()).html(sum.toLocaleString());
                  });
                },


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

                    this.api().columns('.sum').every(function () {
                        var column = this;

                        var sum = column
                           .data()
                           .reduce(function (a, b) { 
                               a = parseInt(a, 10);
                               if(isNaN(a)){ a = 0; }
                               
                               b = parseInt(b, 10);
                               if(isNaN(b)){ b = 0; }
                               
                               return a + b;
                           });

                        sum = Math.floor(sum);

                        $(column.footer()).html(sum.toLocaleString());
                    });


                },

                order: [],

           });

        });


        </script>

        @endpush

<!-- stuffed        -->
        @push('scripts')
        <script>
            $(document).ready(function (){
              console.log("document ready")   

            var url = '{{ route('dashboardView.getstuffingsummary') }}';

            var table = $('#stuffed-table').DataTable({
                dom: 'Bfrtip',          
                type: 'POST',
                processing: true,
                deferRender: true,
                ajax: url,
                autoWidth: true,
                pageLength: 5,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],

                columns: [
                    { data: 'buyer', name: 'buyer'},
                    { data: 'stsm_month', name: 'stsm_month'},
                    { data: 'stsm_year', name: 'stsm_year'},
                    { data: 'bags', name: 'bags'},

                ],   

                columnDefs: [

                    {targets: 3, 
                        'searchable':true,
                        'orderable': true,


                        'render': function (data, type, full, meta, row){

                            var weight = table.cell(meta.row,3).data();

                            weight = Math.floor(weight);

                            return weight.toLocaleString();
                    }}


                ],


                footerCallback: function(row, data, start, end, display) {
                  console.log(data)
                  var totalpurchased=0;
                  for(i=0; i<data.length; i++){
                    var bags = data[i].bags
                    if(bags!=null)
                    totalpurchased = parseFloat(totalpurchased)+parseFloat(data[i].bags)
                  }
                  $('#totalstuffed').html(totalpurchased.toLocaleString());


                  var api = this.api();
                 
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                    console.log(sum); //alert(sum);
                    $(this.footer()).html(sum.toLocaleString());
                  });
                },


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

                    this.api().columns('.sum').every(function () {
                        var column = this;

                        var sum = column
                           .data()
                           .reduce(function (a, b) { 
                               a = parseInt(a, 10);
                               if(isNaN(a)){ a = 0; }
                               
                               b = parseInt(b, 10);
                               if(isNaN(b)){ b = 0; }
                               
                               return a + b;
                           });

                        sum = Math.floor(sum);

                        $(column.footer()).html(sum.toLocaleString());
                    });


                },

                order: [],

           });

        });


        </script>

        @endpush
   

    </div>




           

<script type="text/javascript">
// var div = document.getElementById("dom-target");
// var myData = div.textContent;
warehouse = <?php echo $warehouse ;?>;
weight = <?php echo $weight ;?>;
console.log(warehouse)
console.log(weight)
var data = {
    labels: warehouse,
    datasets: [
        {
            label: "Bric",
            fillColor: "rgba(228,235,239,0.7)",
            strokeColor: "#dcdcdc",
            pointColor: "#dcdcdc",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: weight
        }
    
    ]
};

//document.body.style.zoom="120%"

// var contextLine = document.getElementById("line").getContext("2d");
// new Chart(contextLine).Line(data, {
//    responsive : false,
//    animation: true,
//    barValueSpacing : 5,
//    barDatasetSpacing : 1,
//    tooltipFillColor: "rgba(0,0,0,0.8)",                
//    multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
// });

// var contextBar = document.getElementById("bar").getContext("2d");
// new Chart(contextBar).Bar(data, {
//    responsive : false,
//    animation: true,
//    barValueSpacing : 5,
//    barDatasetSpacing : 1,
//    tooltipFillColor: "rgba(0,0,0,0.8)",                
//    multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
// });
// new Chart(context).Line(data);


    //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieChart       = new Chart(pieChartCanvas)
  var piedata=new Array;
    var i=0;
    var j = 0;
            var colors=[{'name':'danger','code':'#f56954'},{'name':'warning','code':'#f39c12'},{'name':'success','code':'#00a65a'},{'name':'primary','code':'#00c0ef'},{'name':'info','code':'#3c8dbc'},{'name':'dark','code':'#222121'}];

            var segtotal=0
            //console.log(warehouse)
            $.each(warehouse, function( index, value ) {
                console.log(value)
              var segment={};
              if (i==6) {
                i=0;
              }
              
              console.log(colors[i]);
              segment.label=value;
              segment.value=parseInt(weight[j]);
              segtotal=segtotal+segment.value;
              j++
            });
            //console.log(segtotal);
            var segpc=0;
            j=0
            $.each(warehouse, function( index, value ) {
              var segment={};
              if (i==6) {
                i=0;
              }
              
              segment.label=value;
              segment.value=parseInt(weight[j]);
              segment.color=colors[i].code;
              segment.highlight=colors[i].code;
            j++
              segpc=parseInt((segment.value/segtotal)*100);
              console.log(colors[i].name)
              $('.piedetail').append('<li><i class="fa fa-circle-o text-'+colors[i].name+'"></i>'+value+'</li>');
              $('.segmentspc').append('<li><a href="#" style="color : '+colors[i].code+'">'+segment.label+'<span class="pull-right text-'+colors[i].name+'"><i class="fa fa-angle-left"></i>'+segpc+'%</span></a></li>');
              piedata.push(segment);
              i++;
            });

            console.log(piedata);


  var pieOptions     = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    //String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    //Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps       : 100,
    //String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    //String - A legend template
    legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    //String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> users'
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(piedata, pieOptions)
  //-----------------
  //- END PIE CHART -
  //-----------------

  var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var today = new Date();
var d;
var month=[];

for(var i = 6; i > 0; i -= 1) {
  d = new Date(today.getFullYear(), today.getMonth() - i, 1);
  month.push(monthNames[d.getMonth()]);
 
}
months = <?php echo $months ;?>;
totals = <?php echo $totals ;?>;
    //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas)

  var salesChartData = {
    labels  : months,
    datasets: [
      {
        label               : 'Stocks',
        fillColor           : 'rgba(0, 123, 255, 0.9)',
        strokeColor         : 'rgba(0, 123, 255, 1)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(0, 123, 255, 1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(0, 123, 255, 1)',
        data                : totals
      }
    ]
  }

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale               : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - Whether the line is curved between points
    bezierCurve             : true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot                : false,
    //Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  }

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions)


var warehouse = <?php echo $warehouse ;?>;
var weight = <?php echo $weight ;?>;


var data = {
    labels: warehouse,
    datasets: [
        {
            label: "Bric",
            fillColor: "rgba(228,235,239,0.7)",
            strokeColor: "#dcdcdc",
            pointColor: "#dcdcdc",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: weight
        }
    
    ]
};

// var contextLine = document.getElementById("line").getContext("2d");
// new Chart(contextLine).Line(data, {
//    responsive : false,
//    animation: true,
//    barValueSpacing : 5,
//    barDatasetSpacing : 1,
//    tooltipFillColor: "rgba(0,0,0,0.8)",                
//    multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
// });

var contextBar = document.getElementById("bar").getContext("2d");
new Chart(contextBar).Bar(data, {
   responsive : false,
   animation: true,
   barValueSpacing : 5,
   barDatasetSpacing : 1,
   tooltipFillColor: "rgba(0,0,0,0.8)",                
   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
});

</script>

<style type=”text/css”>
    table {
        position: absolute;
    }
    .modal-content {
      min-width: 1000 !important;
    }

</style>

@stop

<script type="text/javascript" charset="utf8" src="{{ asset("plugins/jquery/jquery.min.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("dist/js/adminlte.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("dist/js/demo.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("plugins/sparkline/jquery.sparkline.min.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}" ></script>

<script type="text/javascript" charset="utf8" src="{{ asset("plugins/chartjs-old/Chart.min.js") }}" ></script>
<script type="text/javascript" charset="utf8" src="{{ asset("dist/js/pages/dashboard2.js") }}" ></script>