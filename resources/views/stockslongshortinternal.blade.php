@extends ('layouts.dashboard')
@section('page_heading','Stocks Long/ Short Internal')

@section('section')

<div class="col-md-14 col-md-offset-1">

	<div class="row">
		<div class="col-md-6">
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

<?php 
	
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = NULL;
	}

?>

	
<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">
	<form role="form" method="POST" action="settingsthresholds">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
			<table class="table table-striped" id="long_short-table">
			<thead>
			  <tr>				

			  	<th>
					Code
				</th>		

			  	<th>
					Quality
				</th>	

			  	<th class="sum">
					Stock Bags
				</th>	

			  	<th class="sum">
					Allocated Bags
				</th>	

			  	<th class="sum">
					Value
				</th>

			  	<th>
					Bric Diff
				</th>

			  	<th>
					Stock Diff
				</th>
			  	
			  	<?php 

			  		if (isset($months) && count($months) > 0) {

			  			foreach ($months as $value) {

			  				if ($value != null) {

			  					echo "<th class='sum'>".$value."</th>";

			  				}

			  				
			  			}
			  		}


			  	?>

			  	<th class="sum">
					Net Position
				</th>

			  </tr>
			</thead>

            <tfoot>
            	<tr>
				  	<th>
						Totals
					</th>		

				  	<th>
						
					</th>	

				  	<th>
						Stock Bags
					</th>	

				  	<th>
						Allocated Bags
					</th>	

				  	<th>
						Value
					</th>

				  	<th>
						
					</th>

				  	<th>
						
					</th>
				  	
				  	<?php 

				  		if (isset($months) && count($months) > 0) {

				  			foreach ($months as $value) {

				  				if ($value != null) {

				  					echo "<th>".$value."</th>";

				  				}

				  				
				  			}
				  		}


				  	?>

				  	<th>
						Net Position
					</th>
				</tr>
            </tfoot>

			<tbody>

				<?php
					$months = array_map('strtolower', $months);

					if (isset($long_short_details) && count($long_short_details) > 0) {

						foreach ($long_short_details->all() as $key => $value) {

							echo "<tr>";

								echo "<td>".$value->long_code."</td>";
								echo "<td>".$value->bs_quality."</td>";
								echo "<td>".$value->stock_bags."</td>";
								echo "<td>".$value->allocated_bags."</td>";
								echo "<td>".$value->value."</td>";
								echo "<td>".$value->bric_diff."</td>";
								echo "<td>".$value->stock_diff."</td>";

						  		if (isset($months) && count($months) > 0) {

						  			foreach ($months as $value_m) {

						  				if ($value_m != null) {

						  					echo "<td>".$value->{$value_m}."</td>";

						  				}

						  			}
						  		}

						  		echo "<td>".$value->net_position."</td>";

							echo "</tr>";

						}

					}

				?>

			</tbody>
			</table>
	</form>
</div>


@stop

@push('scripts')
<script>
var latestid=null
var rowno=1
var path= "{{URL::to('settingsthresholds')}}";
$(document).ready(function (){  
	var table = $('#long_short-table').DataTable({

                dom: 'Bfrtip',          
                type: 'POST',
                processing: true,
                deferRender: true,
                autoWidth: true,
                pageLength: 100,

                buttons: [
                    'pageLength',
                    {
                        extend: 'copyHtml5', footer: true,
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5', footer: true,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],

                footerCallback: function(row, data, start, end, display) {
                 
                  var api = this.api();
                  api.columns('.sum', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {

						var pat=/\([\d]+\)/;

						if (pat.test(b)) {

						    b = b.replace( /^\D+/g, '');

						    b = parseFloat(b) * -1
						    
						}

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

      


	});//end datatable
});//end doc ready

</script>
@endpush