@extends ('layouts.dashboard')
@section('page_heading','Warrant')
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
    <form role="form" method="POST" action="warrant">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
            <div class="form-group col-md-6">
           		<button type="submit" name="submit_warrant" class="btn btn-lg btn-success btn-block">Add/Update Warrant</button>
            </div>
            <div class="form-group col-md-6">
           		<button type="submit" name="print_warrant" class="btn btn-lg btn-success btn-block">Print Warrant</button>
            </div>
        </div>

		<input class='form-control' type='hidden' name='stock_items' id='stock_items' value=''>

	    <div class="col-md-12">
		    <h3>Outturns</h3>
		    <div class="row">			
				<div class="panel panel-default" style="padding: 5px;max-height: 800px;">		
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
							<table id="stocks-table" class="table table-condensed table-striped" style="width: 100%;" >
							<thead>
							<tr>				  
								<th style='text-align:center;' >
									<input type='checkbox' name='select_all' value='1' id='example-select-all'>
								</th>	
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
									Package
								</th>
								<th>
									Location
								</th>

								<th>
									Serial
								</th>
							  </tr>
							</thead>
							<tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
								<th>
									Select
								</th>	
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
									Package
								</th>
								<th>
									Location
								</th>							
							</tfoot>

							<tbody>



								<?php
									$total_bags = 0;
									$total_pkts = 0;
									$count = 0;
									$count_green = 0;
									$count_process = 0;
									$count_screen = 0;
									$count_cup = 0;
									$total_price = 0;
									$total_lots = 0;
									$total = 0;

									if (isset($stocks_details) && count($stocks_details) > 0) {

										foreach ($stocks_details->all() as $value) {
											$id = $value->stid;
											$agt_id = $value->st_owner_id;
								    		$total_value = ($value->weight)/50 * ($value->price);
								    		$total_lots += 1;
											echo "<tr>";
												echo "<td width='2%' ><input type='checkbox' class='chkWarrant' name='chkWarrant' value=' $id' onclick='computeBricPrice()'></td>";
												echo "<td width='2%' >".$value->csn_season."</td>";
												echo "<td>".$value->gr_number."</td>";
												echo "<td>".$value->st_outturn."</td>";
												echo "<td>".$value->grade."</td>";
												echo "<td>".$value->st_mark."</td>";
												echo "<td>".$value->st_net_weight."</td>";
												echo "<td>".$value->st_packages."</td>";
												echo "<td>".$value->st_bags."</td>";
												echo "<td>".$value->st_pockets."</td>";
												echo "<td>".$value->pkg_name."</td>";
												echo "<td>".$value->location."</td>";
												echo "<input class='form-control' type='hidden' name='stock_id[]' value='$value->id'></td>";

								                echo "<td width='15%'><input class='form-control' type='text' name='stock_id[]' value='$value->id'></td></td>";										

											echo "</tr>";

										}
									}
								?>
								
							</tbody>

							</table>
				</div>
			</div>

		</div>
	</form>
</div>	

@push('scripts')
<script>
	$(document).ready(function() {
	    var table = $('#stocks-table').DataTable({
			dom: 'Bfrtip',      	
	   		type: 'POST',
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
	function updateOwner(selected)
	{
		selected_array.push(selected);
		$('#stock_items').val(selected_array);
	}
</script>
<style type="text/css">


</style>
@endpush
@stop

