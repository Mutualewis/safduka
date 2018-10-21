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

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap-multiselect.css") }}" type="text/css" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ui.jqgrid.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.timepicker.min.css") }}" />

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/demo.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/normalize.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ns-default.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ns-style-attached.css") }}" />

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/slick/slick.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/slick/slick-theme.css") }}" />

	<script src="{{ asset("assets/jquery-v2.0.3/jquery.js") }}" type="text/javascript"></script>


	<script src="{{ asset("assets/jquery-v2.0.3/jquery.js") }}" type="text/javascript"></script>

	

	
	<script src="{{ asset("assets/jquery-jqGrid-v4.6.0/js/jquery.jqGrid.src.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/Chart.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/Chart.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/bootstrap-datepicker.js") }}" type="text/javascript"></script>

	<script type="text/javascript" src="{{ asset("assets/scripts/bootstrap-multiselect.js") }}" ></script>


	<script type="text/javascript" src="{{ asset("assets/slick/slick.min.js") }}" ></script>
				

 <p  class="overlay" style="font-size: 42px; font-family: -webkit-pictograph !important;
    font-weight: bold !important;
    color: darkgreen !important;">IBERO <?php echo $value = session('countryname');?> LIMITED<p>
	<!-- <img class="overlay" src="{{ asset("images/logo.png") }}" type="text/javascript" align="right"></img> -->

</head>
<body> 
	@yield('body')
	@stack('scripts')
	
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.dataTables.css") }}" > -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.datatables.buttons.css") }}" > -->
	

 <script type="text/javascript" charset="utf8" src="{{ asset("assets/js/modernizr.custom.js") }}" ></script>
 	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/classie.js") }}" ></script>

	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/notificationFx.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/bootbox.min.js") }}" ></script>

	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.searchabledropdown-1.0.8.min.js") }}"></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery-migrate-1.4.1.min.js") }}"></script>



	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/selectstyle.js") }}"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset("assets/css/selectstyle.css") }}"/>


	<script type="text/javascript" src="{{ asset("assets/sh/shCore.js") }}"></script>
	<script type="text/javascript" src="{{ asset("assets/sh/shBrushJScript.js") }}"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset("assets/sh/shCore.css") }}"/>
	<link type="text/css" rel="stylesheet" href="{{ asset("assets/sh/shThemeDefault.css") }}"/>
<!-- 
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.flash.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.html5.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.buttons.print.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.datatables.jszip.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/pdfmake.min.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/vfs_fonts.js") }}" ></script> -->
	
	<!-- <script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.dataTables.select.js") }}" ></script> -->



	<!-- <script type="text/javascript" src="{{ asset("assets/js/chosen.jquery.min.js") }}" ></script> -->

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
	<script type="text/javascript" src="{{ asset("assets/js/dataTables.scroller.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/js/dataTables.fixedColumns.min.js") }}" ></script>
	<!-- <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}" ></script> -->
	<script type="text/javascript" src="{{ asset("assets/js/jquery.dataTables.yadcf.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/Select-1.2.2/js/dataTables.select.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/js/jquery.timepicker.min.js") }}" ></script>




	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date"]'); //our date input has the name "date"	  
	      date_input.attr("autocomplete", "off");
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
	    	var time_input = $('input[name="time"]'); 
	    	$(time_input).timepicker();
		    $(time_input).timepicker('setTime', new Date());
	    })
	</script>


	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date_second"]'); //our date input has the name "date"
	      date_input.attr("autocomplete", "off");
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
	      date_input.attr("autocomplete", "off");
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
	      date_input.attr("autocomplete", "off");
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
	      date_input.attr("autocomplete", "off");
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
		  // if (confirm('are you sure?')) {

		  // }

		$(document).ready(function() {
			$("#outt_number_search").searchable({
				maxListSize: 100,						// if list size are less than maxListSize, show them all
				maxMultiMatch: 50,						// how many matching entries should be displayed
				exactMatch: false,						// Exact matching on search
				wildcards: true,						// Support for wildcard characters (*, ?)
				ignoreCase: true,						// Ignore case sensitivity
				latency: 200,							// how many millis to wait until starting search
				warnMultiMatch: 'top {0} matches ...',	// string to append to a list of entries cut short by maxMultiMatch 
				warnNoMatch: 'no matches ...',			// string to show in the list when no entries match
				zIndex: 'auto'							// zIndex for elements generated by this plugin
		   	});
		});
			

	</script>

	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="deliveryDate"]'); //our date input has the name "date"
	      date_input.attr("autocomplete", "off");
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
	    function RunFile() {
		    WshShell = new ActiveXObject("WScript.Shell");
		    WshShell.Exec("c:/GetIndicatorWeight.exe");
	    }
	</script>


	<script>
	function calculateWeight() {
	    var bag_size = document.getElementById("bag_size").value;
	    var packages = document.getElementById("packages").value;
	    var weight = bag_size * packages;
	    document.getElementById("weight").value = Math.floor(weight);
	    document.getElementById("weight_old").value = Math.floor(weight);
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