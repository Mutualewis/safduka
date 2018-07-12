@extends ('layouts.dashboard')
@section('page_heading','Sales Stats (2015/2016)')
@section('section')

<?php 

	$sum_sales = array_sum(json_decode($Sales));
	$sum_milled = array_sum(json_decode($Milled));
	// $sum_intake = array_sum(json_decode($intake));
	$sum_available = $sum_milled - $sum_sales;
?>
<table>
	<tr>
		<td align="right">
			<h3><strong>Total Clean:    </strong></h3>
		</td>
		<td align="right">
			<h3><?php echo number_format($sum_milled); ?></h3>
		</td>
	</tr>
	<tr>
		<td align="right">
			<h4><strong>Total Sales:</strong></h4>
		</td>
		<td align="left">
			<h4><?php echo number_format($sum_sales); ?></h4>
		</td>
	</tr>
	</tr>
	<tr>
		<td align="right">
			<h4><strong>Total Available:</strong></h4>
		</td>
		<td align="left">
			<h4><?php echo number_format($sum_available) ; ?></h4>
		</td>
	</tr>
</table>
<div>
</div>

<div class="col-sm-12">	
	<div class="row">
		<canvas id="line" width="1400" height="600"></canvas>
	</div>
	<br><br><br><br>
	<div class="row">
		<canvas id="bar" width="1400" height="600"></canvas>
	</div>
	<br><br><br><br>
</div>


<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"> -->
<!-- </script> -->

<script type="text/javascript">
// var div = document.getElementById("dom-target");
// var myData = div.textContent;
var months = <?php echo $Month ;?>;
var milled = <?php echo $Total_Milled ;?>;
var sales = <?php echo $Total_Sales ;?>;
var intake = <?php echo $Total_Intake ;?>;

var data = {
    labels: months,
    datasets: [
        {
            label: "Sales",
            fillColor: "rgba(228,235,239,0.7)",
            strokeColor: "#dcdcdc",
            pointColor: "#dcdcdc",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: sales
        },
        {
            label: "Clean",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "#aecad8",
            pointColor: "#97bbcd",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: milled
        }
    ]
};

var contextLine = document.getElementById("line").getContext("2d");
new Chart(contextLine).Line(data, {
   responsive : false,
   animation: true,
   barValueSpacing : 5,
   barDatasetSpacing : 1,
   tooltipFillColor: "rgba(0,0,0,0.8)",                
   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
});

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