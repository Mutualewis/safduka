@extends ('layouts.dashboard')
@section('section')

<?php
  use Illuminate\Support\Facades\Redis;
  $total_items = Redis::get('total_items') ;
?>

<div class="col-md-14 col-md-offset-0"> 

    <form role="form" method="POST" action="/home">
      <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
      <input type="text" id="total" name="total" value= "<?php echo $total_items. ' items in cart'; ?>"  disabled>

      <div class="row">
        
          <div class="form-group col-md-4">
              <img src="{{ asset("images/kettle_1.jpg") }}" type="text/javascript" align="center"></img>
              <button type="button" class="btn btn-lg btn-danger btn-block" onclick = "addToCart('kettle_1')" >Add to Cart</button>
          </div>    
        
          <div class="form-group col-md-4">
            <img src="{{ asset("images/ttt_8.jpg") }}" type="text/javascript" align="center"></img>
            <button type="button" class="btn btn-lg btn-danger btn-block" onclick = "addToCart('ttt_8')" >Add to Cart</button>
          </div>       
        
          <div class="form-group col-md-4">
            <img src="{{ asset("images/subwoofer_with_bluetooth.jpg") }}" type="text/javascript" align="center">
            <button type="button" class="btn btn-lg btn-danger btn-block" onclick = "addToCart('subwoofer_with_bluetooth')" >Add to Cart</button>
          </div>                
   
    </form>

    </div>


</div>


@push('scripts')

<script>

function addToCart(cartItem){

  var token = document.getElementById("_token").value;

  var url = '{{ route('home.addToCart',['token'=>":token",'cartItem'=>":cartItem"]) }}';
  
  url = url.replace(':token', token);
  
  url = url.replace(':cartItem', cartItem);
  
  $.ajax({
  
  url: url,
  
  type: 'GET',
  
  }).success(function(response) {
    
    var total = jQuery.parseJSON(response);
    
    document.getElementById("total").value = total + " items in cart";
  
  }).error(function(error) {
    
    console.log(error)
  });  
}
</script>
@endpush
@stop