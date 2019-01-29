@extends ('layouts.dashboard')
@section('page_heading','Transfer Ownership')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-12">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif	


					<div class="flash-message">
					    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has('alert-' . $msg))

					      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					      @endif
					    @endforeach
					  </div> <!-- end .flash-message -->

				</div>				
			</div>
<div class="col-md-14">
    <form role="form" method="POST" action="transferownership">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
            <div class="form-group col-md-12">
           		<button type="submit" name="submit_ownership" class="btn btn-lg btn-success btn-block">Add/Update Ownership Information</button>
            </div>
        </div>

		<input class='form-control' type='hidden' name='stock_items' id='stock_items' value=''>

		<?php
		if (!isset($agent)) {
			$agent = null;
		}
		?>
	    <div class="col-md-12">
		    <h3>Outturns</h3>
		    <div class="row">			
				<div class="panel panel-default" style="padding: 5px;max-height: 800px;">		
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
							<table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
							<thead>
							<tr>				  
								<th>
									Season
								</th>
								<th>
									GRN
								</th>
								<th>
									Outturn
								</th>
								<th>
									Grade
								</th>
								<th>
									Mark
								</th>
								<th>
									Weight
								</th>
								<th>
									Packages
								</th>
								<th>
									Bags
								</th>	
								<th>
									Pocket
								</th>
								<th>
									Location
								</th>

								<th>
									Owner
								</th>	
								<th style="display: none;">
									ID
								</th>	
							  </tr>
							</thead>
							<tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
								<th>
									Season
								</th>
								<th>
									GRN
								</th>
								<th>
									Outturn
								</th>
								<th>
									Grade
								</th>
								<th>
									Mark
								</th>
								<th>
									Weight
								</th>
								<th>
									Packages
								</th>
								<th>
									Bags
								</th>	
								<th>
									Pocket
								</th>
								<th>
									Location
								</th>

								<th style="display: none;">
									Owner
								</th>	
								<th style="display: none;">
									ID
								</th>								
							</tfoot>
						</table>
				</div>
			</div>

		</div>
	</form>
</div>	

@push('scripts')
<script>
	$(document).ready(function() {
		var url = '{{ route('transferownership.getstockview') }}';
	    var table = $('#stocks-table').DataTable({
			dom: 'Bfrtip',      	
	   		type: 'POST',
	   		ajax: url,
	        processing: true,
	        deferRender: true,
	     	autoWidth: true,
	     	pageLength: 50,
	     	sPlaceHolder: "head:after",

	     	buttons: [
	     		'pageLength',
		     	{
		     		extend: 'pdf',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	},
		 		{
		     		extend: 'print',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	},
		 		{
		     		extend: 'excel',
		     		exportOptions: {
		     			columns: [1,2,3,4,5,7,8,9,10,11]
		     		}
		     	}



	     	],

	        columns: [
	            { data: 'csn_season', name: 'csn_season', searchable: false },
	            { data: 'gr_number', name: 'gr_number'},
				{ data: 'st_outturn', name: 'st_outturn'},
	            { data: 'grade', name: 'grade' },
	            { data: 'st_mark', name: 'st_mark' },
	            { data: 'st_net_weight', name: 'st_net_weight'},
	            { data: 'st_packages', name: 'st_packages'},
				{ data: 'st_bags', name: 'st_bags'},
	            { data: 'st_pockets', name: 'st_pockets'},
	            { data: 'location', name: 'location'},
	            { data: 'st_owner_id', name: 'st_owner_id'},
	            { data: 'stid', name: 'stid'}
	        ],   
								
	        columnDefs: [
		     	{targets: 10,
		     		'render': function (data, type, full, meta, row){
						var agent = <?php echo json_encode($agent); ?>;
						var stockSelected = table.cell(meta.row,11).data();
						var agentSelected = table.cell(meta.row,10).data();

						var select = null;
						var selectStart = "<select class='form-control' id='coffee_agent' name='coffee_agent'  onchange='updateOwner( "+stockSelected+",this.value)'>";				

						var selectBody = null;
						var extraAnalysisID = null; 

						var agentSelected = table.cell(meta.row,10).data();
						selectBody += "<option value=''>Not Set</option>";

						agent.forEach(function(entry) {
							if (agentSelected == entry.agtid) {
								selectBody += "<option value='"+entry.agtid+"' selected='selected'>"+entry.agt_name+"</option>";
							} else {
								selectBody += "<option value='"+entry.agtid+"'>"+entry.agt_name+"</option>";
							}

						});
						var selectEnd = "</select>";
						var select = selectStart.concat(selectBody.concat(selectEnd));
						return select;
					}
		     	},
		     	{targets: 11,
		     		"visible": false
		     	},

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

	        },

	    });
	} );

</script>
<script type="text/javascript">
	var selected_array = new Array();
	var selected = null;
	function updateOwner(stockSelected, agentSelected)
	{
		selected = stockSelected + "-" +agentSelected;
		selected_array.push(selected);
		$('#stock_items').val(selected_array);
		// alert(selected_array);
	}
</script>
<style type="text/css">


</style>
@endpush
@stop

