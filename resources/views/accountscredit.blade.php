@extends ('layouts.dashboard')
@section('page_heading','Credit Note On Stock')
@section('section')
<div class="col-sm-14 col-md-offset-0">
			<div class="row">
				<div class="col-md-14">
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
		//$autosubmit=true;
	}
	if (!isset($cid)) {
		$cid = NULL;
	}
	if (!isset($csn_season)) {
		$csn_season  = 3;
	}
	if (!isset($slr)) {
		$slr  = NULL;
	}
	if (!isset($greencomments)) {
		$greencomments = NULL;
	}
	if (!isset($prc)) {
		$prc = NULL;
	}
	if (!isset($scr)) {
		$scr = NULL;
	}	
	if (!isset($ref)) {
		$ref = NULL;
	}
	if (!isset($paymentamount)) {
		$paymentamount = NULL;
	}

	if (!isset($date)) {
		$date = NULL;
	}

	if (!isset($rawid)) {
		$rawid = NULL;
	}
	if (!isset($comments)) {
		$comments = NULL;
	}	
	if (!isset($saleid)) {
		$saleid = NULL;
	}	
	if (!isset($basket )) {
		$basket = NULL;
	}
	if (!isset($bskt)) {
		$bskt = NULL;
	}
	if (!isset($cupid)) {
		$cupid = NULL;
	}
	if (!isset($acidity)) {
		$acidity = NULL;
	}
	if (!isset($body)) {
		$body = NULL;
	}
	if (!isset($flavour)) {
		$flavour = NULL;
	}
	if (!isset($description)) {
		$description = NULL;
	}
	if (!isset($grade)) {
		$grade = NULL;
	}

	if (!isset($rtid )) {
		$rtid = NULL;
	}

	if (!isset($outt_number )) {
		$outt_number = NULL;
	}	

	if (!isset($credit_no )) {
		$credit_no = NULL;
	}

	if (!isset($sale_cb_id )) {
		$sale_cb_id = NULL;
	}

	if (!isset($goods )) {
		$goods = NULL;
	}	
	if (isset($sellerID)) {
		$slr = $sellerID;
	}	
	if (isset($coffee_buyer)) {
		$sale_cb_id = $coffee_buyer;
	}

// slr
// sale_cb_id
// 	        coffee_buyer
// seller (sellerID)
// credit_no
// goods
// date


	$screen = 0;
	$process = 0;
	$sif_lot = 0;
	$coffee_grower = 0;
	$dont = 0;	
	$greencomment = 0;
	//
	$totalWeight = 0;
	$total_bags = 0;
	$total_value = 0;
	$total_value_sum = 0;
	$confirmed_by = 0;

    $countryID = Input::get('country');

    $coffee_buyer = Input::get('coffee_buyer');

    $sellerID = Input::get('seller');

    $credit_no = Input::get('credit_no');

    $goods = Input::get('goods');

    $date = Input::get('date');

	if (isset($credit_details)){

		$cid = $credit_details->cn_country;

		$sale_cb_id = $credit_details->cn_buyer;

		$slr = $credit_details->cn_seller;

		$credit_no = $credit_details->cn_number;

		$goods = $credit_details->cn_goods;

		$date = date("m/d/Y", strtotime($credit_details->cn_date));

		$confirmed_by = $credit_details->cn_confirmed_by;

	}

	// print_r($credit_details);
	$stockArray = array();
	$lots = array();
	$totalWeight = 0;
	$total_bags = 0;
	$total_pkts = 0;	
	$total_value = 0;
	$total_price = 0;
	$total_diff = 0;

	$total_value_sum = 0;
	$total_diff_sum = 0;

	$total_price = 0;
	$total_diff = 0;
	// print_r($StockView);


	if (isset($StockView) && count($StockView) > 0) {

		foreach ($StockView->all() as $value) {
			
			$lots[] = $value->id;
			$newElement = array();
			$newElement['id'] = (int)$value->id;
			$newElement['weight'] = (int)$value->weight;
			$newElement['bags'] = (int)$value->bags;
			$newElement['pockets'] = (int)$value->pockets;
			$newElement['price'] = (int)$value->price;
			$newElement['value'] = (int) intval(str_replace(",", "", $value->value)); 
			$newElement['diff'] = (int)$value->weight * $value->differential;
			array_push($stockArray, $newElement);

			if ($value->credit_number == $credit_no ) {
				$totalWeight += (int) $value->weight; 
				$total_bags += (int) ($value->weight); 
				$total_value += (int) intval(str_replace(",", "", $value->value)); 
			}
		}

		$total_bags = ceil($total_bags/60);

		// if ($total_value != null) {
		// 	$total_value_sum = $total_value;
		// }		
		// if ($total_diff != null) {
		// 	$total_diff_sum = $total_diff;
		// }
		// if ($total_value != null && $totalWeight != null) {
		// 	$total_price = $total_value/$totalWeight; 
		// }
		// if ($total_diff != null && $totalWeight != null) {
		// 	$total_diff = $total_diff/$totalWeight; 
		// }

	}

?>



    <div class="col-md-14">
        <form role="form" method="POST" action="accountscredit" id="accountscreditform">

        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="row" >
	            <div class="form-group col-md-3 ">
	                <label>Country</label>
	                <select class="form-control" id="country" name="country">
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

	            <div class="form-group col-md-3">
	               	<label>Credit To</label>
	                <select class="form-control" name="coffee_buyer">
	               		<option></option>
						@if (isset($seller) && count($seller) > 0)										
									@foreach ($seller->all() as $buyers)
									@if ($sale_cb_id ==  $buyers->id)
										<option value="{{ $buyers->id }}" selected="selected">{{ $buyers->slr_name}}</option>
									@else
										<option value="{{ $buyers->id }}">{{ $buyers->slr_name}}</option>
									@endif
									@endforeach
								
						@endif
	                </select>
	            </div>	

	            <div class="form-group col-md-3">
	                <label>Seller</label>
	                <select class="form-control" name="seller">
	                	<option></option> 
						@if (isset($seller) && count($seller) > 0)
									@foreach ($seller->all() as $sellers)
										@if ($slr ==  $sellers->id)
											<option value="{{ $sellers->id }}" selected="selected">{{ $sellers->slr_name}}</option>
										@else
											<option value="{{ $sellers->id }}">{{ $sellers->slr_name}}</option>
										@endif

									@endforeach
								
						@endif
	                </select>
	            </div>

        		<div class="form-group col-md-3">
        			<label>Credit No.</label>
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" id="credit_no" name="credit_no" style="text-transform:uppercase; " placeholder="Credit No...."  value="{{ old('credit_no'). $credit_no }}"></input>

	                        <span class="input-group-btn">

	                        <button type="submit" name="searchButton" class="btn btn-default">
	                        	<i class="fa fa-search"></i>
	                        </button>

                    </span>
                    </div>
                </div>
			</div>

            <div class="row" >


	            <div class="form-group col-md-3">
	            	<label>Goods</label>
	           		<input class="form-control" name="goods" style="text-transform:uppercase" value="{{ old('goods'). $goods }}">
	            </div>

	            <div class="form-group col-md-3">
	            	<label>Date</label>
	           		<input class="form-control" name="date" style="text-transform:uppercase" value="{{ old('date'). $date }}">
	            </div>
	          
	        </div>

            <div class="row">
	            <div class="form-group col-md-3">
	            	<button type="submit" name="filter" class="btn btn-lg btn-success btn-block">Fetch</button>
	            </div>
	            <?php
	            	if ($confirmed_by != null) {
	            	?>
			            <div class="form-group col-md-3">
			           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block" disabled>Add/Update Credit Note</button>
			            </div>						
				
			            <div class="form-group col-md-3">
			           		<button type="submit" name="printprocessingnstructions" class="btn btn-lg btn-success btn-block" disabled>Print Credit Note</button>
			            </div>

			            <div class="form-group col-md-3">
			           		<button type="submit" name="confirminstruction" class="btn btn-lg btn-danger btn-block" disabled>Confirmed</button>
			            </div>	     

	            	<?php
	            	} else {

	            ?>
			            <div class="form-group col-md-3">
			           		<button type="submit" name="submitinstruction" class="btn btn-lg btn-success btn-block">Add/Update Credit Note</button>
			            </div>						
				
			            <div class="form-group col-md-3">
			           		<button type="submit" name="printprocessingnstructions" class="btn btn-lg btn-success btn-block">Print Credit Note</button>
			            </div>

			            <div class="form-group col-md-3">
			           		<button type="submit" name="confirminstruction" class="btn btn-lg btn-danger btn-block">Confirm Instruction</button>
			            </div>

	            <?php
	            	}
	            ?>

            </div>

		<div class="row">
			<div class="panel panel-default" style="padding: 5px;">
	            <div align="right" style="color: blue; font-family: italic; ">
	            	<span style="color: black; font-family: normal;">Totals: </span>
	            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="totalWeight" ><?php echo number_format($totalWeight, 0);?></span> KGs
	            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_bags" ><?php echo $total_bags;?></span> Bags
	            	&nbsp&nbsp&nbsp&nbsp&nbsp<span id="total_value" ><?php echo number_format($total_value, 2);?></span> $ Value
	            	<input type="hidden" name="total_value_sum" id="total_value_sum" value=<?php echo $total_value_sum ;?>>
	            </div> 
	            <table id="stocks-table" class="table table-condensed table-striped" >
					<thead>
						<tr>
							<th style='text-align:center;' >
								<input type='checkbox' name='select_all' value='1' id='example-select-all'>
							</th>	
							<th>
								Season
							</th>
							<th>
								Outturn
							</th>
							<th>
								Grade
							</th>
							<th>
								Bric
							</th>
							<th  style="display: none;">
								Kilos
							</th>
							<th style='text-align:center;' >
								Weight
							</th>
							<th>
								Code
							</th>
							<th>
								Quality
							</th>
							<th>
								Price
							</th>
							<th>
								Value
							</th>
							<th>
								Location
							</th>	
							<th>
								Status
							</th>								
							<th>
								Withdraw
							</th>
						</tr>
					</thead>

					<tfoot style="display: table-header-group; text-align:left; width: inherit; max-width:100%;">
						<tr>
							<th style='text-align:center;' >
								<input type='checkbox' name='select_all' value='1' id='example-select-all'>
							</th>	
							<th>
								Season
							</th>
							<th>
								Outturn
							</th>
							<th>
								Grade
							</th>
							<th>
								Bric
							</th>
							<th  style="display: none;">
								Kilos
							</th>
							<th style='text-align:center;' >
								Weight
							</th>
							<th>
								Code
							</th>
							<th>
								Quality
							</th>
							<th>
								Price
							</th>
							<th>
								Value
							</th>
							<th>
								Location
							</th>	
							<th>
								Status
							</th>								
							<th>
								Withdraw
							</th>
						</tr>
					</tfoot>			
				</table>

@push('scripts')
<script>
	var countryID = document.getElementById("country").value;
	var credit_no = document.getElementById("credit_no").value;

	if (countryID == "") {
		countryID = 0;
	}
	if (credit_no == "") {
		credit_no = 0;
	}

	$(document).ready(function (){   

	var url = '{{ route('accountscredit.getstockview',['countryID'=>":id",'credit_no'=>":rf"]) }}';

	url = url.replace(':id', countryID);
	url = url.replace(':rf', credit_no);

    var table = $('#stocks-table').DataTable({
		dom: 'Bfrtip',      	
   		type: 'POST',
   		url: 'accountscredit',
        processing: true,
        deferRender: true,
     	ajax: url,
     	autoWidth: true,
     	pageLength: 100,
     	buttons: [
     		'pageLength' , 
     	],
        columns: [
            { data: 'stbid', name: 'stbid', searchable: false },
            { data: 'csn_season', name: 'csn_season'},
            { data: 'st_outturn', name: 'outturn' },
            { data: 'cgrad_name', name: 'grade'},
            { data: 'br_no', name: 'bric' },            
            { data: 'weight', name: 'weight'},
            { data: 'weight', name: 'weight'},
            { data: 'bs_code', name: 'code'},
            { data: 'bs_quality', name: 'quality'},
            { data: 'price', name: 'price'},
            { data: 'value', name: 'value'},
            { data: 'location', name: 'location'},
            { data: 'status', name: 'status'},
            { data: 'stbid', name: 'stbid' , searchable: false},
            { data: 'cfdid', name: 'cfdid'},
            { data: 'credit_number', name: 'credit_number'},


        ],    

        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },


        columnDefs: [

        	{targets: 14,
				'visible':false
			},

			{targets: 15,
				'visible':false
			},

			{targets: 0,
				'searchable':false,
				'orderable':false,
				'className': 'dt-body-center',				
				'render': function (data, type, full, meta, row){
				var cfdid = table.cell(meta.row,14).data();
				var credit_number = table.cell(meta.row,15).data();
				if (cfdid == null) {
					if (credit_number == null) {
						return '<input type="checkbox" class="chk" name="tobeprocessed[]" value="' + $('<div/>').text(data).html() + '" >';
					} else {
						var viewedfield = '<input type="hidden" name="tobeprocessed[]" value="' + $('<div/>').text(data).html()  + '" >';
						var hiddenfield = '<input type="checkbox" checked="checked" value="' + $('<div/>').text(data).html()  + '" disabled>';
						var combined = viewedfield.concat(hiddenfield);
						return combined;

					}
				} else {
					if (credit_number == null) {
						return '<input type="checkbox" class="chk" name="tobeprocessedpurchased[]" value="' + $('<div/>').text(data).html() + '" >';
					} else {

						var viewedfield = '<input type="hidden" name="tobeprocessedpurchased[]" value="' + $('<div/>').text(data).html()  + '" >';
						var hiddenfield = '<input type="checkbox" checked="checked" value="' + $('<div/>').text(data).html()  + '" disabled>';
						var combined = viewedfield.concat(hiddenfield);
						return combined;
					}					
				}

			
			}},

			{targets: 5, 
				'searchable':true,
				'orderable': true,
				'render': function (data, type, full, meta, row){
					return '<input size = "5" style="text-align:center;" type="text" name="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" id="'+"cweight["+ table.cell(meta.row,0).data()+"]"+'" value="' + $('<div/>').text(data).html() + '">';
			}},

			{targets: 13, 
				'className': 'dt-body-center',
				'render': function (data, type, full, meta, row){
					var cfdid = table.cell(meta.row,14).data();
					var credit_number = table.cell(meta.row,15).data();

					if (cfdid == null) {
						if (credit_number == null) {
							return '<input type="checkbox" name="tobewithdrawn[]" value="'+ $('<div/>').text(data).html() + '" disabled>';
						} else {
							return '<input type="checkbox" name="tobewithdrawn[]" value="'+ $('<div/>').text(data).html() + '" >';
						}
						
					} else {
						if (credit_number == null) {
							return '<input type="checkbox" name="tobewithdrawnpurchased[]" value="'+ $('<div/>').text(data).html() + '" disabled>';		
						} else {
							return '<input type="checkbox" name="tobewithdrawnpurchased[]" value="'+ $('<div/>').text(data).html() + '" >';
						}			
					}
				}
			}

     	],

	    fnDrawCallback: function( oSettings ) {
		    var stockArray= <?php echo json_encode($stockArray); ?>;


		    $(document).ready(function() {


			$('.chk').off('click').on('click', function(){
				var selectedID = $(this).val();
				selectedID = parseInt(selectedID);	
				var totalsWeight = null;
				var bags = null;
				var pockets = null;
				var selectedPrice = 0;
				var selectedValue = 0;
				var selectedDiff = 0;

				

			    var totalWeight= $("#totalWeight").text();
				totalWeight = parseInt(+totalWeight.replace(',', ''), 10);		

			    var total_bags= $("#total_bags").text();


			    var total_value= $("#total_value").text();
				total_value = parseInt(+total_value.replace(',', ''), 10);	

				var total_value_sum= $("#total_value_sum").text();				    
					

				if (total_value_sum == 0) {
					total_value_sum= $("#total_value_sum").val();
				}
				total_value_sum = parseInt(+total_value_sum.replace(',', ''), 10);	
				
		
		    	
		    	var stringName = "cweight[";
				var stringID = selectedID;
				var res = stringName.concat(stringID);
				res = res.concat("]");
				var cweight = null;
				cweight = document.getElementById(res).value;

				Number.prototype.format = function(n,x){
					var re = '(\\d)(?=(\\d{'+(x || 3)+'})+'+(n>0?'\\.':'$')+')';
					return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re,'g'), '$1,');
				};

				if ($(this).is(':checked')) {
					totalsWeight = totalWeight + parseInt(cweight, 10);
				    bags = Math.floor(totalsWeight / 60);
				    pockets = Math.floor(totalsWeight % 60);
				} else {
					totalsWeight = totalWeight - parseInt(cweight, 10);
				    bags = Math.floor(totalsWeight / 60);
				    pockets = Math.floor(totalsWeight % 60);					
				}
				

				for (var i = 0; i<stockArray.length; i++) {
					
					if (stockArray[i].id == selectedID) {
						selectedPrice = stockArray[i].price;
						if ($(this).is(':checked')) {
							selectedValue = stockArray[i].value;
							selectedValue = parseInt(total_value_sum, 10) + parseInt(selectedValue, 10);					
						} else {
							selectedValue = stockArray[i].value;
							selectedValue = parseInt(total_value_sum, 10) - parseInt(selectedValue, 10);

						}

					}
				}


				total_price = selectedValue/totalsWeight; 
				total_diff = selectedDiff/totalsWeight; 



				totalsWeight = totalsWeight.format();

				total_price = total_price.format(2);
				total_diff = total_diff.format(2);

				$('#totalWeight').html(totalsWeight);
				$('#total_bags').html(bags);
				$('#total_value').html(selectedValue.format(2));
				$('#total_value_sum').html(selectedValue);
				
			});


		    });



	    },

        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {           
            $('td:eq("6")', nRow).addClass('collapse');   
            $('td:eq("6")', nRow).addClass('collapse');   

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



			this.api().columns([9]).every( function () {
				var column = this;
				console.log(column);
				var select = $("#codeFltr"); 
				column.data().unique().sort().each( function ( d, j ) {
				  select.append( '<option value="'+d+'">'+d+'</option>' )
				} );
			} );


			$("#codeFltr").multiselect();
        },



   });


    $('#codeFltr').on('change', function(){
    	var search = [];
      
      $.each($('#codeFltr option:selected'), function(){
      		search.push($(this).val());
      });
      
      search = search.join('|');
      table.column(9).search(search, true, false).draw();  
    });


   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      // var rows = table.rows({ 'search': 'applied' }).nodes();
      // $('input[type="checkbox"]', rows).prop('checked', this.checked);


   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
    

   $('#stocksForm').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element 
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         } 
      });
   });






});

</script>
@endpush

			</div>
		</div>



	</form>

	</div>


</div>	
@stop

@push('scripts')
<script>
var autosubmit = <?php echo json_encode($autosubmit); ?>;
console.log(autosubmit)
	$(document).ready(function (){ 
		if(autosubmit){
			$( "#accountscreditform" ).submit();
		}
	})
</script>
@endpush