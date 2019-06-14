@extends ('layouts.dashboard')
@section('page_heading','Login')
@section('section')

<?php
  use Illuminate\Support\Facades\Redis;
  $total_items = Redis::get('total_items') ;
?>

<div class="col-md-14 col-md-offset-0"> 
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
            
    <form role="form" method="POST" action="create" id="createForm">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

        <div class="row">
          <div class="form-group col-md-10">
                <label>Enter Number To Validate</label><br>
                <input class="form-control"  type="text" id="number" name="number" value= ""  placeholder="+254"><br>
                <input class="form-control"  type="text" id="token" name="token" value= ""  placeholder="Token">
          </div>    
        </div>

        <div class="row">
          <div class="form-group col-md-10">
                <button name="send" type="submit" class="btn btn-lg btn-danger btn-block">Send</button>
          </div>    
          <div class="form-group col-md-10">
                <button name="validate" type="submit" class="btn btn-lg btn-success btn-block">Validate</button>
          </div>    
        </div>
   
    </form>

    </div>


</div>

@stop