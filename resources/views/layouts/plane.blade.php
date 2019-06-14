<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Safduka</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/datepicker.css") }}" />
	<link href="{{ asset("favicon.ico") }}" rel="shortcut icon" type="image/ico">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/chosen.min.css") }}" />	
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap-multiselect.css") }}" type="text/css" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ui.jqgrid.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/jquery.dataTables.yadcf.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.timepicker.min.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/demo.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/normalize.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ns-default.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/css/ns-style-attached.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/slick/slick.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/slick/slick-theme.css") }}" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset("assets/select2/select2.min.css") }}" />

	<script src="{{ asset("assets/jquery-v2.0.3/jquery.js") }}" type="text/javascript"></script>	
	<script src="{{ asset("assets/jquery-jqGrid-v4.6.0/js/jquery.jqGrid.src.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/bootstrap-datepicker.js") }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset("assets/scripts/bootstrap-multiselect.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/slick/slick.min.js") }}" ></script>
				
</head>
<body> 
	@yield('body')
	@stack('scripts')

	<link type="text/css" rel="stylesheet" href="{{ asset("assets/css/selectstyle.css") }}"/>
	<link type="text/css" rel="stylesheet" href="{{ asset("assets/sh/shCore.css") }}"/>
	<link type="text/css" rel="stylesheet" href="{{ asset("assets/sh/shThemeDefault.css") }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/AutoFill-2.2.0/css/autoFill.dataTables.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Buttons-1.3.1/css/buttons.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/KeyTable-2.2.1/css/keyTable.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Responsive-2.1.1/css/responsive.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/Scroller-1.4.2/css/scroller.dataTables.min.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.dataTables.css") }}" >
	
 	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/modernizr.custom.js") }}" ></script>
 	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/classie.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/notificationFx.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/bootbox.min.js") }}" ></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery.searchabledropdown-1.0.8.min.js") }}"></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/jquery-migrate-1.4.1.min.js") }}"></script>
	<script type="text/javascript" charset="utf8" src="{{ asset("assets/js/selectstyle.js") }}"></script>
	<script type="text/javascript" src="{{ asset("assets/sh/shCore.js") }}"></script>
	<script type="text/javascript" src="{{ asset("assets/sh/shBrushJScript.js") }}"></script>	
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
	<script type="text/javascript" src="{{ asset("assets/Select-1.2.2/js/dataTables.select.min.js") }}" ></script>
	<script type="text/javascript" src="{{ asset("assets/js/jquery.timepicker.min.js") }}" ></script>
	<script type="text/javascript" src="https://www.simplify.com/commerce/v1/simplify.js"></script>

</body>
</html>