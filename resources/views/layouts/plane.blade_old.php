<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>IBERO</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/datepicker.css") }}" />
	<link href="{{ asset("favicon.ico") }}" rel="shortcut icon" type="image/ico">

	
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap-3.1.1.min.css") }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap-multiselect.css") }}" type="text/css" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ui.jqgrid.css") }}" />

	<script src="{{ asset("assets/jquery-v2.0.3/jquery.js") }}" type="text/javascript"></script>


	<script src="{{ asset("assets/jquery-jqGrid-v4.6.0/js/i18n/grid.locale-en.js") }}" type="text/javascript"></script>

	
	<script src="{{ asset("assets/jquery-jqGrid-v4.6.0/js/jquery.jqGrid.src.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/Chart.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/Chart.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/bootstrap-datepicker.js") }}" type="text/javascript"></script>

	<script type="text/javascript" src="{{ asset("assets/scripts/bootstrap-multiselect.js") }}" ></script>

	<img class="overlay" src="{{ asset("images/logo.png") }}" type="text/javascript" align="right"></img>

</head>
<body> 
	@yield('body')
	@stack('scripts')
	
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.dataTables.css") }}" >
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.datatables.buttons.css") }}" > -->
  
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.dataTables.js") }}" ></script>
<!-- 
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.flash.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.html5.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.print.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.jszip.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/pdfmake.min.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/vfs_fonts.js") }}" ></script> -->
	
	<!-- <script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.dataTables.select.js") }}" ></script> -->




	<!-- <link rel="stylesheet" type="text/css" href="{{ asset("assets/DataTables-1.10.15/css/jquery.dataTables.min.css") }}" /> -->
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/AutoFill-2.2.0/css/autoFill.dataTables.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Buttons-1.3.1/css/buttons.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/KeyTable-2.2.1/css/keyTable.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Responsive-2.1.1/css/responsive.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Scroller-1.4.2/css/scroller.dataTables.min.css") }}" />

	<script type="text/javascript" src="{{ asset("assets/JSZip-3.1.3/jszip.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/pdfmake-0.1.27/build/pdfmake.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/pdfmake-0.1.27/build/vfs_fonts.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/DataTables-1.10.15/js/jquery.dataTables.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/AutoFill-2.2.0/js/dataTables.autoFill.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Buttons-1.3.1/js/dataTables.buttons.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Buttons-1.3.1/js/buttons.colVis.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Buttons-1.3.1/js/buttons.flash.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Buttons-1.3.1/js/buttons.html5.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Buttons-1.3.1/js/buttons.print.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/KeyTable-2.2.1/js/dataTables.keyTable.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Responsive-2.1.1/js/dataTables.responsive.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Scroller-1.4.2/js/dataTables.scroller.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Select-1.2.2/js/dataTables.select.min.js") }}" ></script>




	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>

	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date_second"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>

	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date_third"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>


	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date_third"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>


	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date_fourth"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>


	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="deliveryDate"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	</script>
	

	<script>
	function myFunction() {
	    var x = document.getElementById("grade_kilograms").value;
	    var bags = x/60;
	    var pockets = x % 60;
	    document.getElementById("bags").innerHTML = Math.floor(bags);
	    document.getElementById("pockets").innerHTML = Math.floor(pockets);
	}
	</script>
	
	<script>
	function calculateWeight() {
	    var bag_size = document.getElementById("bag_size").value;
	    var packages = document.getElementById("packages").value;
	    var weight = bag_size * packages;
	    document.getElementById("weight").value = Math.floor(weight);
	}
	</script>

	<script>
	function calculateTotal() {
	    var weight = document.getElementById("grade_kilograms").value;
	    var sweight = document.getElementById("sample_grade_kilograms").value;

	    var total = weight-sweight;
	    document.getElementById("total_kilograms").innerHTML = Math.floor(total);
	}
	</script>

	<script>
	function getPrice() {
	    var price_type = document.getElementById("price_type").value;

	    var call_from = document.getElementById("call_from");

	    if (price_type == 1) {

	    	call_from.style.visibility = 'hidden';

	    } else {

	    	call_from.style.visibility = 'visible';

	    } 
	    

	}
	</script>


	<script>
	function calculateValue() {
	    var rate = document.getElementById("sif_rate").value;
	    var total = document.getElementById("weight_sold").value;
	    var values = parseInt(total)/50 * rate;
	    document.getElementById("sif_value1").innerHTML = values;
	    document.getElementById("sif_value").value = values;
	}
	</script>


</body>
</html>