$(function () {

  'use strict'

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  //var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
  // This will get the first returned node in the jQuery collection.
  //var salesChart       = new Chart(salesChartCanvas)

  // var salesChartData = {
  //   labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  //   datasets: [
  //     {
  //       label               : 'Electronics',
  //       fillColor           : '#dee2e6',
  //       strokeColor         : '#ced4da',
  //       pointColor          : '#ced4da',
  //       pointStrokeColor    : '#c1c7d1',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgb(220,220,220)',
  //       data                : [65, 59, 80, 81, 56, 55, 40]
  //     },
  //     {
  //       label               : 'Digital Goods',
  //       fillColor           : 'rgba(0, 123, 255, 0.9)',
  //       strokeColor         : 'rgba(0, 123, 255, 1)',
  //       pointColor          : '#3b8bba',
  //       pointStrokeColor    : 'rgba(0, 123, 255, 1)',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(0, 123, 255, 1)',
  //       data                : [28, 48, 40, 19, 86, 27, 90]
  //     }
  //   ]
  // }

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
  // salesChart.Line(salesChartData, salesChartOptions)

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  // var pieChart       = new Chart(pieChartCanvas)
  // var PieData        = [
  //   {
  //     value    : 700,
  //     color    : '#dc3545',
  //     highlight: '#dc3545',
  //     label    : 'Chrome'
  //   },
  //   {
  //     value    : 500,
  //     color    : '#28a745',
  //     highlight: '#28a745',
  //     label    : 'IE'
  //   },
  //   {
  //     value    : 400,
  //     color    : '#ffc107',
  //     highlight: '#ffc107',
  //     label    : 'FireFox'
  //   },
  //   {
  //     value    : 600,
  //     color    : '#17a2b8',
  //     highlight: '#17a2b8',
  //     label    : 'Safari'
  //   },
  //   {
  //     value    : 300,
  //     color    : '#007bff',
  //     highlight: '#007bff',
  //     label    : 'Opera'
  //   },
  //   {
  //     value    : 100,
  //     color    : '#6c757d',
  //     highlight: '#6c757d',
  //     label    : 'Navigator'
  //   }
  // ]
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
  // pieChart.Doughnut(PieData, pieOptions)
  //-----------------
  //- END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */

})
