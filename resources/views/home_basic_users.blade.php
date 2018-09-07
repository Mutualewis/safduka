@extends('layouts.dashboard')
@section('page_heading','Welcome')
@section('section')
    <div class="col-sm-12">
    <?php
        use Ngea\GRNSReceivedSummary;
        use Ngea\StocksSummary;
        use Ngea\PurchasesSummary;
        use Ngea\ProcessingMonthlySummary;
        use Ngea\StuffingSummary;


        $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
                            ->select('ssm1.*', \DB::raw('sum(ssm1.ssm_weight) AS weight_total, sum(ssm1.ssm_value) AS value_total'))
                            ->leftJoin('stocks_summary_ssm AS ssm2', function ($join) {
                                $join->on('ssm1.wr_name', '=', 'ssm2.wr_name')
                                    ->on('ssm1.ssm_buyer', '=', 'ssm2.ssm_buyer')
                                    ->on('ssm1.created_at', '<', 'ssm2.created_at');
                                    
                            })
                            ->whereNull('ssm2.wr_name')
                            ->groupBy('ssm1.wr_name')
                            ->orderBy('ssm1.wr_name')
                            ->get();


        $StuffingSummary = StuffingSummary::all(['weight', 'month', 'year']);
        $GRNSReceivedSummary = GRNSReceivedSummary::all(['weight', 'warehouse_from', 'month', 'csn_season', 'weight_difference', 'percentage_weight_difference']);
        $PurchasesSummary = PurchasesSummary::all(['weight', 'slr_name', 'month', 'csn_season', 'wr_name', 'buyer']);
        $ProcessingMonthlySummary = ProcessingMonthlySummary::all(['total_allocated', 'results', 'diffrence', 'month']);

    ?>

<!--         @section ('panel3_panel_title', 'About Us')
        @section ('panel3_panel_body')
        Through our effort we strive to establish a prosperous, sustainable and diversified group of own coffee farms and farm management organizations. In collaboration with coffee growers, small and large, other related institutions in the producer countries as well as stakeholders of the supply chain, we want to encourage sustainable agricultural practices and thereby contribute to a more stable coffee farming industry.
        @endsection
        @include('widgets.panel', array('class'=>'success', 'header'=>true, 'footer'=>true, 'as'=>'panel3')) -->

<!--         @section ('collapsible_panel_title', 'Ibero EA')
        @section ('collapsible_panel_body')
        @include('widgets.collapse', array('id'=>'1', 'class'=>'success', 'header'=> 'About Us', 'body'=>'Founded just after the country gained its Independence, the roots of Ibero Kenya, one of the oldest green coffee export companies of Neumann Kaffee Gruppe, go all the way back to 9th July 1964. Initially named as Ibero Africa Limited, it was later in 1993 that the company got its current name. Celebrating half a century, the company has been amongst the top exporters in the country and is renowned for its expertise on coffee and excellence in quality. This expertise and knowledge, allied with the recent construction of our ultra-modern facility, enables us to deliver an exceptional level of service and efficiency. From the Kenya highlands, we source, process and deliver a wide range of qualities, from Naturals to the world famous Kenya AA top micro lots. Our presence in East Africa comes with the responsibility to develop a solid and sustainable foundation; Neumann Kaffee Gruppe sustainability programmes in Kenya are implemented with the sole aim of improving the livelihoods of smallholder coffee growers thus empowering their communities. We build for the future by initiating, championing, and providing the youth with opportunities to pursue a career in coffee.','collapseIn'=>true))
        
        @include('widgets.collapse', array('id'=>'2', 'class'=>'success', 'header'=> 'Objectives', 'body'=>'Our core objective is to form long-term partnerships with our clients. We focus upon maintaining our position as the leading provider of farm management services in the region.','collapseIn'=>true))

        @include('widgets.collapse', array('id'=>'3', 'class'=>'success', 'header'=> 'About the Application', 'body'=>'From the application you will be able to track all coffee purchased to when its shipped.','collapseIn'=>true))


        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'collapsible')) -->

<?php 
    // $StocksSummary
    
    $warehouse = StocksSummary::select(['wr_name'])->groupBy('wr_name')->get()->toArray();  

    $warehouse = json_encode(array_column($warehouse, 'wr_name'),JSON_NUMERIC_CHECK);

    $weight = StocksSummary::select(DB::raw('sum(ssm_weight) as weight'))->groupBy('wr_name')->get()->toArray();
    // $weight = StocksSummary::select('browser', DB::raw('count(*) as total'))->groupBy('wr_name')->get()->toArray();
    $weight = json_encode(array_column($weight, 'weight'),JSON_NUMERIC_CHECK);


    $weight_bric = StocksSummary::select(['ssm_weight'])->where('ssm_buyer', 'BRIC')->get()->toArray();
    $weight_bric = json_encode(array_column($weight_bric, 'weight'),JSON_NUMERIC_CHECK);

    $weight_ibero = StocksSummary::select(['ssm_weight'])->where('ssm_buyer', 'Ibero Kenya Ltd')->get()->toArray();
    $weight_ibero = json_encode(array_column($weight_ibero, 'weight'),JSON_NUMERIC_CHECK);

    $buyer = StocksSummary::select(['ssm_buyer'])->get()->toArray();
    $buyer = json_encode(array_column($buyer, 'ssm_buyer'),JSON_NUMERIC_CHECK);



?>





        <div class="row col-sm-6">
            <h2>Total Stocks</h2>
                <div class="row">
                    <canvas id="bar" width="900" height="400"></canvas>
                    @section ('cotable_panel_title','Total Stocks')
                    @section ('cotable_panel_body')
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>WAREHOUSE</th>
                                <th>WEIGHT</th>
                                <th>BAGS</th>
                                <th>AVERAGE STORAGE</th>
                                <th>VALUE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (isset($StocksSummary) && count($StocksSummary) > 0) {
                                $total_weight = 0;
                                $total_bags = 0;
                                $total_value = 0;

                                foreach ($StocksSummary as $value) {
                                    $total_weight += $value->weight_total;
                                    $total_value += $value->value_total;
                                    
                                    $bags = Round(($value->weight_total)/60);

                                    $total_bags += $bags;
                                    echo "<tr>";
                                        
                                        echo "<td>" . $value->wr_name . "</td>";
                                        echo "<td>" . number_format($value->weight_total, 2, '.', ',') . "</td>";
                                        echo "<td>" . number_format($bags, 2, '.', ',') . "</td>";
                                        echo "<td>" . $value->ssm_average_storage . " DAYS</td>";
                                        echo "<td>" . number_format($value->value_total, 2, '.', ',') . "</td>";

                                    echo "</tr>";

                                }



                            }

                                echo "<tr>";
                                    echo "<td>Total</td>";
                                    echo "<td>" .number_format($total_weight, 2, '.', ','). "</td>";
                                    echo "<td>" .number_format($total_bags, 2, '.', ','). "</td>";
                                    echo "<td>" . "</td>";
                                    echo "<td>" . number_format($total_value, 2, '.', ','). "</td>";
                                echo "</tr>";

                        ?>
                           
                        </tbody>
                    </table>    
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
                   
                </div>


            </div>

            <div class="row col-sm-6">
                <h2>Total Received in Ibero</h2>
                @section ('ctable_panel_title','Total Received')
                @section ('ctable_panel_body')
                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>WAREHOUSE FROM</th>
                            <th>MONTH</th>
                            <th>SEASON</th>
                            <th>WEIGHT</th>
                            <th>GAINS/LOSSES</th>
                            <th>PERCENTAGE</th>
                            <th>VALUE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($GRNSReceivedSummary) && count($GRNSReceivedSummary) > 0) {
                            $total_weight = 0;

                            foreach ($GRNSReceivedSummary->all() as $value) {
                                $total_weight += $value->weight;
                                echo "<tr>";
                                    
                                    echo "<td>" . $value->warehouse_from . "</td>";
                                    echo "<td>" . $value->month . "</td>";
                                    echo "<td>" . $value->csn_season . "</td>";
                                    echo "<td>" . number_format($value->weight, 2, '.', ',') . "</td>";
                                    echo "<td>" . number_format($value->weight_difference, 2, '.', ',') . "</td>";
                                    echo "<td>" . number_format($value->percentage_weight_difference, 2, '.', ',') . " %</td>";

                                    echo "<td>" . $value->value . "</td>";

                                echo "</tr>";

                            }



                        }

                            echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" .number_format($total_weight, 2, '.', ','). "</td>";
                                echo "<td>" . "</td>";
                            echo "</tr>";

                    ?>
                       
                    </tbody>
                </table>    
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'ctable'))

            </div>


            <div class="col-sm-6">
                <h2>Total Purchased</h2>
                @section ('stable_panel_title','Total Purchased')
                @section ('stable_panel_body')
                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>SELLER</th>
                            <th>WAREHOUSE</th>
                            <th>BUYER</th>
                            <th>MONTH</th>
                            <th>SEASON</th>
                            <th>WEIGHT</th>
                            <th>VALUE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($PurchasesSummary) && count($PurchasesSummary) > 0) {
                            $total_weight = 0;

                            foreach ($PurchasesSummary->all() as $value) {
                                $total_weight += $value->weight;
                                echo "<tr>";
                                    
                                    echo "<td>" . $value->slr_name . "</td>";
                                    echo "<td>" . $value->wr_name . "</td>";
                                    echo "<td>" . $value->buyer . "</td>";
                                    echo "<td>" . $value->month . "</td>";
                                    echo "<td>" . $value->csn_season . "</td>";
                                    echo "<td>" . number_format($value->weight, 2, '.', ',') . "</td>";
                                    echo "<td>" . $value->value . "</td>";

                                echo "</tr>";

                            }



                        }

                            echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" .number_format($total_weight, 2, '.', ','). "</td>";
                                echo "<td>" . "</td>";
                            echo "</tr>";

                    ?>
                       
                    </tbody>
                </table> 
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'stable'))

            </div>





            <div class="col-sm-6">
                <h2>Total Processed</h2>
                @section ('htable_panel_title','Total Processed')
                @section ('htable_panel_body')

                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>MONTH</th>
                            <th>TOTAL INSTRUCTED</th>
                            <th>RESULTS</th>
                            <th>GAINS/LOSS</th>
                            <th>VALUE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($ProcessingMonthlySummary) && count($ProcessingMonthlySummary) > 0) {
                            $total_weight = 0;

                            foreach ($ProcessingMonthlySummary->all() as $value) {
                                $total_weight += $value->weight;
                                echo "<tr>";
                                    
                                    echo "<td>" . $value->month . "</td>";
                                    echo "<td>" . number_format($value->total_allocated, 2, '.', ',') . "</td>";
                                    echo "<td>" . number_format($value->results, 2, '.', ',') . "</td>";
                                    echo "<td>" . number_format($value->diffrence, 2, '.', ',') . "</td>";
                                    echo "<td>" . $value->value . "</td>";

                                echo "</tr>";

                            }



                        }

                            echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" .number_format($total_weight, 2, '.', ','). "</td>";
                                echo "<td>" . "</td>";
                            echo "</tr>";

                    ?>
                       
                    </tbody>
                </table>  
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'htable'))

            </div>



            <div class="col-sm-6">
                <h2>Total Stuffed</h2>
                @section ('atable_panel_title','Total Stuffed')
                @section ('atable_panel_body')

                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>MONTH</th>
                            <th>YEAR</th>
                            <th>WEIGHT</th>
                            <th>VALUE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($StuffingSummary) && count($StuffingSummary) > 0) {
                            $total_weight = 0;

                            foreach ($StuffingSummary->all() as $value) {
                                $total_weight += $value->weight;
                                echo "<tr>";
                                    
                                    echo "<td>" . $value->month . "</td>";
                                    echo "<td>" . $value->year . "</td>";
                                    echo "<td>" . number_format($value->weight, 2, '.', ',') . "</td>";
                                    echo "<td>" . $value->value . "</td>";

                                echo "</tr>";

                            }



                        }

                            echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" .number_format($total_weight, 2, '.', ','). "</td>";
                                echo "<td>" . "</td>";
                            echo "</tr>";

                    ?>
                       
                    </tbody>
                </table>  
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
                  
            </div>


    </div>


    <script type="text/javascript">
       setTimeout(function(){
           location.reload();
       },300000);
    </script>

           

<script type="text/javascript">
// var div = document.getElementById("dom-target");
// var myData = div.textContent;

var warehouse = <?php echo $warehouse ;?>;
var weight_bric = <?php echo $weight_bric ;?>;
var weight_ibero = <?php echo $weight_ibero ;?>;
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
// new Chart(context).Line(data);
</script>


@stop
