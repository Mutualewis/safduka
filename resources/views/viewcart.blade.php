@extends ('layouts.dashboard')
@section('page_heading','Cart Items')
@section('section')

<?php
  use Illuminate\Support\Facades\Redis;
  $total_items = Redis::get('total_items') ;
  if (!isset($items)) {
  	$items = null;
  } else {
  	$items = json_encode($items);
  }
?>

<div class="col-md-14 col-md-offset-0"> 

    <form role="form" method="POST" action="/viewcart">
	<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<input type="text" id="total" name="total" value= "<?php echo $total_items. ' items in cart'; ?>"  disabled>

	<input type="button" name="makepayment" class="btn btn-default" data-toggle='modal' data-target='#menuModal' value="Pay">
		<i class="fa fa-money"> </i>
	</input>

	<div class="row">
		<div class="panel panel-default" style="padding: 5px;">			           
			<table id="carts-table" class="table table-condensed table-striped" style="width: 100%;" >
			    <thead>
			        <tr>								
						<th>
							Item
						</th>
						<th>
							Quantity
						</th>								
			        </tr>
			    </thead>
			    <tfoot style="display: table-header-group; text-align:left; width: inherit; width:100%;">
			        <tr>							
						<th>
							Item
						</th>
						<th>
							Quantity
						</th>			
			        </tr>
			    </tfoot>

			</table>   
		</div>

    </form>
	<!-- Modal -->
	<div class="modal fade form-group col-md-12" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="title">
	        <div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Make Payments</h4>
		
			</div>
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body" id="payment_div" style="font-size: 35px;">
			<div>
			    <label>Credit Card Number: </label><br>
			    <input id="cc-number" type="text" maxlength="20" autocomplete="off" value="" autofocus />
			</div>
			<div>
			    <label>CVC: </label><br>
			    <input id="cc-cvc" type="text" maxlength="4" autocomplete="off" value=""/>
			</div>
			<div>
			    <label>Expiry Date: </label>
			    <select id="cc-exp-month">
			        <option value="01">Jan</option>
			        <option value="02">Feb</option>
			        <option value="03">Mar</option>
			        <option value="04">Apr</option>
			        <option value="05">May</option>
			        <option value="06">Jun</option>
			        <option value="07">Jul</option>
			        <option value="08">Aug</option>
			        <option value="09">Sep</option>
			        <option value="10">Oct</option>
			        <option value="11">Nov</option>
			        <option value="12">Dec</option>
			    </select>
			    <select id="cc-exp-year">
			        <option value="15">2015</option>
			        <option value="16">2016</option>
			        <option value="17">2017</option>
			        <option value="18">2018</option>
			        <option value="19">2019</option>
			        <option value="20">2020</option>
			        <option value="21">2021</option>
			        <option value="22">2022</option>
			        <option value="23">2023</option>
			        <option value="24">2024</option>
			    </select>
			</div>	
	      </div>
	      <div class="modal-footer">
	        <input id="process-payment-btn" type="button" class="btn btn-primary btn-block" style="font-size: 35px;" value="Process Payment"></input>
	        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" style="font-size: 35px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


</div>


@push('scripts')

<script>
var tableData = <?php echo $items; ?>; 

  $(document).ready(function (){   
    $("#simplify-payment-form").on("submit", function() {
        // Disable the submit button
        $("#process-payment-btn").attr("disabled", "disabled");
        // Generate a card token & handle the response
        SimplifyCommerce.generateToken({
            key: "YOUR_PUBLIC_KEY",
            card: {
                number: $("#cc-number").val(),
                cvc: $("#cc-cvc").val(),
                expMonth: $("#cc-exp-month").val(),
                expYear: $("#cc-exp-year").val()
            }
        }, simplifyResponseHandler);
        // Prevent the form from submitting
        return false;
    });

    var url = '{{ route('viewcart.getItems') }}';

    var table = $('#carts-table').DataTable({
        dom: 'Bfrtip',        
        type: 'POST',
        url: 'viewcart',
        processing: true,
        deferRender: true,
        data: tableData,
        autoWidth: true,
        pageLength: 50,

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
		  { data: 'item', name: 'item', searchable: false },
		  { data: 'quantity', name: 'quantity'}

		],    

		language: {
		  lengthMenu: "Display _MENU_ records per page",
		  zeroRecords: "Nothing found - sorry",
		  info: "Showing page _PAGE_ of _PAGES_",
		  infoEmpty: "No records available",
		  infoFiltered: "(filtered from _MAX_ total records)"
		},


		columnDefs: [
		{ targets: 0,
		  render: function(data) {
		    return '<img src="/images/'+data+'.jpg">'
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

          order: [],

   });
  });

</script>


<script type="text/javascript">
    function simplifyResponseHandler(data) {
        var $paymentForm = $("#simplify-payment-form");
        // Remove all previous errors
        $(".error").remove();
        // Check for errors
        if (data.error) {
            // Show any validation errors
            if (data.error.code == "validation") {
                var fieldErrors = data.error.fieldErrors,
                        fieldErrorsLength = fieldErrors.length,
                        errorList = "";
                for (var i = 0; i < fieldErrorsLength; i++) {
                    errorList += "<div class='error'>Field: '" + fieldErrors[i].field +
                            "' is invalid - " + fieldErrors[i].message + "</div>";
                }
                // Display the errors
                $paymentForm.after(errorList);
            }
            // Re-enable the submit button
            $("#process-payment-btn").removeAttr("disabled");
        } else {
            // The token contains id, last4, and card type
            var token = data["id"];
            // Insert the token into the form so it gets submitted to the server
            $paymentForm.append("<input type='hidden' name='simplifyToken' value='" + token + "' />");
            // Submit the form to the server
            $paymentForm.get(0).submit();
        }
    }
    $(document).ready(function() {

    });
</script>

@endpush
@stop