@extends('layouts.plane')

@section('body')

 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p  class="navbar-left" style="font-size: 44px; font-family: -webkit-pictograph !important; font-weight: bold !important; color: darkgreen !important;">Safduka
                    <label style="font-size: 14px;">Powered by</label><br>
                
                    <img src="{{ asset("images/logo.png") }}" type="text/javascript" align="center"></img>
                </p>
            </div>

            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
   
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="{{ url ('create') }}"><i class="fa fa-user fa-fw"></i> Log In</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url ('viewcart') }}"><i class="fa fa-sign-out fa-fw"></i> View Cart</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
        </nav>

@push('scripts')

@endpush

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
           </div>
            <div class="row">  
                @yield('section')

            </div>
        </div>
    </div>
@stop

@section ('body')
<div class="continer row col-sm-12">
  <h2>Deals of The Week</h2>
  <div class="col-md-5 col-md-offset-4">
    <img src="{{ asset("images/5129128a.jpg") }}" type="text/javascript" align="center"></img>
  </div>
  <div class="col-md-5 col-md-offset-4">
    <img src="{{ asset("images/5129128a.jpg") }}" type="text/javascript" align="center"></img>
  </div>
  <div class="col-md-5 col-md-offset-4">
    <img src="{{ asset("images/5129128a.jpg") }}" type="text/javascript" align="center"></img>
  </div>
</div>
@stop