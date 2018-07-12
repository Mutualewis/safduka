@extends ('layouts.dashboard')
@section('page_heading','Valuations')
@section('section')
<div class="col-sm-12 col-md-offset-0">
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
<?php 
	if(session('maincountry')!=NULL){
		$cidmain=session('maincountry');
	}
	$autosubmit=false;
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)){
		$cid=$cidmain;
		$autosubmit=true;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}

	if (!isset($cid )) {
		$cid   = NULL;
	}

	if (!isset($csn_season )) {
		$csn_season   = NULL;
	}


?>
    <div class="col-md-6">
	        <form role="form" method="POST" action="toolsvaluation" id="toolsvaluation">

	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
		            <div class="form-group col-md-4">
		                <label>Country</label>
		                <select class="form-control" name="country" onchange="this.form.submit()">
		                	<option></option> 
							@if (isset($country) && count($country) > 0)
										@foreach ($country->all() as $countries)
											@if ($cid ==  $countries->id)
												<option value="{{ $countries->id }}" selected="selected">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@else
												<option value="{{ $countries->id }}">{{ $countries->ctr_name . " (".$countries->ctr_initial.")"}}</option>
											@endif

										@endforeach
									
							@endif
		                </select>		
		            </div>	

		            <div class="form-group col-md-4" style="padding-left:20px;">
		            	<label>Season</label>
		                <select class="form-control" name="sale_season"  onchange="this.form.submit()">
		               		<option>Sale Season</option>
							@if (count($Season) > 0)
										@foreach ($Season->all() as $season)
										@if ($csn_season ==  $season->id)
											<option value="{{ $season->id }}" selected="selected">{{ $season->csn_season}}</option>
										@else
											<option value="{{ $season->id }}">{{ $season->csn_season}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		            <div class="form-group col-md-4" style="padding-left:20px;">
		            	<label>Month</label>
		                <select class="form-control" name="month"  onchange="this.form.submit()">
		               		<option>Month</option>
							@if (count($months) > 0)
										@foreach ($months->all() as $value)
										@if ($csn_season ==  $value->id)
											<option value="{{ $value->id }}" selected="selected">{{ $value->mth_name}}</option>
										@else
											<option value="{{ $value->id }}">{{ $value->mth_name}}</option>
										@endif
										@endforeach
									
							@endif
		                </select>
		            </div>

		        </div>



				<div class="row">
			        <div class="form-group col-md-6">
			       		<button type="submit" name="confirmallocations" class="btn btn-lg btn-success btn-block">Update Valuation</button>
			        </div>

			    </div>

	        	


	</div>
	<div class="row">		
	<div class="col-md-12 col-md-offset-0 pre-scrollable" style="max-height: 600px;">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Valuations</h3>
				<table class="table table-striped" id="valuation-table">
				<thead>
				<tr>		

					<th>
						Secondary Basket
					</th>

					<th>
						Original Basket
					</th>	

					<th>
						Quantity
					</th>

					<th>
						WAD
					</th>

					<th>
						1st M Val
					</th>	

					<th>
						2nd M Val
					</th>

					<th>
						PNL Impact
					</th>

				  </tr>
				</thead>


				<tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
				<tr>	

					<th>
						Secondary Basket
					</th>

					<th>
						Original Basket
					</th>	

					<th>
						Quantity
					</th>

					<th>
						WAD
					</th>

					<th>
						1st M Val
					</th>	

					<th>
						2nd M Val
					</th>

					<th>
						PNL Impact
					</th>

				  </tr>
				</tfoot>

				<tbody>



					<?php
						$count = 0;
						$total_value = 0;
						$total = 0;
						$btotal = 0;
						$contracts = array();
						
						if (isset($valuation) && count($valuation) > 0) {

							foreach ($valuation as $value) {								

								$count += 1;

					    		$total_value += $value->value;

					    		$diff = round( $value->diff, 2, PHP_ROUND_HALF_UP);

					    		$price = round( $value->br_value, 2, PHP_ROUND_HALF_UP);

								// $contracts[] = $value->id;

								$bags = round($value->quantity/60);

								$total += $bags; 

								echo "<tr>";
								
									// echo "<td>".$count."</td>";
									echo "<td>".$value->ibs_quality."</td>";								
									echo "<td>".$value->bs_quality."</td>";
									echo "<td>".$bags."</td>";
									echo "<td>".$diff." </td>";
									echo "<td>".$diff." </td>";
									echo "<td><input class='form-control' name='$value->bs_quality' size='5' value='$diff'></td>";
									echo "<td>".(($diff-$diff)*1.3228*$bags)." </td>";


					               
									// echo "<input class='form-control' type='hidden' name='contracts[]' value='$id'>";

								echo "</tr>";

							}
						}
					?>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>			
						<td></td>			
					  </tr>
				</tbody>

				</table>
			</div>


</form>

</div>	



@stop

@push('scripts')
@push('scripts')
<script>
var path= "{{URL::to('toolsvaluation')}}";
$(document).ready(function (){  
	var table = $('#valuation-table').DataTable({
        dom: 'Bfrtip',          
        type: 'POST',
        url: 'toolsvaluation',
        processing: true,
        deferRender: true,
        autoWidth: true,
        pageLength: 25,

        "order": [[ 0, "asc", 2, "asc" ]],



        columnDefs: [
   		{ "orderable": false, "targets": 0 }],

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

	});//end datatable
});//end doc ready


</script>
@endpush
@endpush