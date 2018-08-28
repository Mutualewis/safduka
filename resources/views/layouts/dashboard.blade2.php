@extends('layouts.plane')

@section('body')

<?php
    use Ngea\User;
    use Ngea\Role;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    Auth::check();
            // $user_data = Confide::user();
            // $user = User::where('username', '=', $user_data ->username)->first();
    $user = Auth::user();
?>
<a href="{{ url ('telextensions' ) }}"><strong>Telephone Extensions</strong></a>
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
                <a class="navbar-brand" href="{{ url ('home') }}">NKG East Africa | Management</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-left">
   
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="{{ url ('#') }}"><i class="fa fa-user fa-fw"></i> <?php echo $user->usr_name;?></a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="{{ url ('#') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="{{ url ('reset') }}"><i class="fa fa-key fa-fw"></i> Reset Password</a>
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

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('home') }}"><i class="fa fa-coffee fa-fw"></i> Home</a>
                        </li>  

                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin')) {
                                ?>                       
                                <li >
                                    <a href="#"><i class="fa fa-users fa-fw"></i> Registration<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*registeruser') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('registeruser' ) }}">Users</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }

                        ?>

                        <li {{ (Request::is('createsale') ? 'class="active"' : '') }}>
                            <a href="{{ url ('createsale') }}"><i class="fa fa-tag fa-fw"></i> Add/Update a Sale</a>
                        </li> 
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('intaker')) {
                                ?>   
                                <li >
                                    <a href="#"><i class="fa fa-exchange fa-fw"></i> Direct Sale <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                     
                                        <li {{ (Request::is('*directindividual') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('directindividual' ) }}">Add Outturn</a>
                                        </li>     
                                        <li {{ (Request::is('directqualitydetails') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('directqualitydetails' ) }}">Quality Details</a>      
                                        </li> 
 
                                    </ul>
                                </li>
                                <?php
                            }

                        ?>
                                <li >
                                    <a href="#"><i class="fa fa-gavel fa-fw"></i> Auction<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('intaker')) {
                                ?>   
                                                <li {{ (Request::is('*catalogueindividual') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('catalogueindividual' ) }}">Intake Individual</a>
                                                </li>                                            
                                                <li {{ (Request::is('*catalogueupload') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('catalogueupload' ) }}">Upload Catalogue</a>
                                                </li>

                                <?php
                            }

                        ?>


                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('supervisor')) {
                                ?> 

                                                <li {{ (Request::is('*confirmcatalogue') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('confirmcatalogue' ) }}">Confirm Catalogue</a>
                                                </li>      

                                <?php
                            }

                        ?>

                                               <!--  <li {{ (Request::is('cataloguequalitydetails') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('cataloguequalitydetails' ) }}">Quality Details</a>      
                                                </li> --> 
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('intaker')) {
                                ?>   

                                                <li {{ (Request::is('cataloguequalitydetailslist') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('cataloguequalitydetailslist' ) }}">Quality</a>      
                                                </li> 
                                <?php
                            }

                        ?>

                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('supervisor')) {
                                ?> 


                                                <li {{ (Request::is('*confirmqualitycatalogue') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('confirmqualitycatalogue' ) }}">Confirm Catalogue Quality</a>
                                                </li>   
                                <?php
                            }

                        ?>
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('intaker')) {
                                ?> 
                                                <li {{ (Request::is('*stocklist') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('stocklist' ) }}">Auction List</a>
                                                </li> 

                                                <li {{ (Request::is('*stockupload') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('stockupload' ) }}">Upload Auction List</a>
                                                </li> 
                                <?php
                            }

                        ?>

                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('supervisor')) {
                                ?> 
                                                <li {{ (Request::is('*confirmauctiondetails') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('confirmauctiondetails' ) }}">Confirm Auction Details</a>
                                                </li>   
                                 <?php
                            }

                        ?>
                                    </ul>

                                </li>

                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin') || $user->hasRole('supervisor') || $user->hasRole('intaker')) {
                                ?> 
                                <li >
                                    <a href="#"><i class="fa fa-money fa-fw"></i> Purchase<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                 
<!--                                         <li>
                                            <a href="{{ url ('stock' ) }}">Stock Intake <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li {{ (Request::is('*stockupload') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('stockupload' ) }}">Upload Purchase List</a>
                                                </li>
                                                <li {{ (Request::is('*stockindividual') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('stockindividual' ) }}">Intake Individual</a>
                                                </li>
                                            </ul>

                                        </li> -->
<!-- 
                                        <li {{ (Request::is('*confirmpurchases') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('confirmpurchases' ) }}">Confirm Purchases</a>
                                        </li>   -->



                                        <li {{ (Request::is('*confirmpurchaseslist') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('confirmpurchaseslist' ) }}">Confirm Purchases</a>
                                        </li>  

                                        <li {{ (Request::is('basket') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('basket' ) }}">Basket</a>      
                                        </li> 

                                        <li {{ (Request::is('briccontracts') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('briccontracts' ) }}">Bric Contracts</a>      
                                        </li>  
                                         <li {{ (Request::is('*confirminvoices') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('confirminvoices' ) }}">Invoice</a>
                                        </li>  

                                        <li {{ (Request::is('*confirmpayment') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('confirmpayment' ) }}">Payment</a>
                                        </li>  

                                        <li {{ (Request::is('warrants') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('warrants' ) }}">Warrants</a>      
                                        </li>  
                                        <li {{ (Request::is('releaseinstructions') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('releaseinstructions' ) }}">Release Instructions</a>      
                                        </li>  

                                    </ul>
                                </li>

                                <li >
                                    <a href="#"><i class="fa fa-truck fa-fw"></i> Weighbridge<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('weighbridge') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('weighbridge' ) }}">Weighbridge In</a>      
                                        </li>                                 
                                        <li {{ (Request::is('weighbridgeout') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('weighbridgeout' ) }}">Weighbridge Out</a>      
                                        </li>  
                                    </ul>
                                </li>

                                <li >
                                    <a href="#"><i class="fa fa-building fa-fw"></i> Warehouse<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('arrivalinformation') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('arrivalinformation' ) }}">Arrival Information</a>      
                                        </li>   
                                        <li {{ (Request::is('*movementinstructions') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('movementinstructions' ) }}">Movement Instruction</a>      
                                        </li>   
                                        <li {{ (Request::is('*movementconfirmation') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('movementconfirmation' ) }}">Confirm Movement</a>      
                                        </li>  

                      <!--                      <li {{ (Request::is('*changelocation') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('changelocation' ) }}">Change Outturn Location</a>      
                                        </li>  


                                     <li {{ (Request::is('*samplerequest') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('samplerequest' ) }}">Sample Request</a>      
                                        </li>   -->

                                    </ul>
                                </li>

                                <li >
                                    <a href="#"><i class="fa fa-envelope fa-fw"></i> Sample<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Type Sample</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Offer Sample</a>
                                        </li>                                        
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Approval Sample</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Shipment Sample</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>  

                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('intaker')) {
                                ?>
                                <li >
                                    <a href="#"><i class="fa fa-star fa-fw"></i> Processing<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*processinginstructions') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('processinginstructions' ) }}">Instructions</a>
                                        </li>
                                        <li {{ (Request::is('*processingresults') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('processingresults' ) }}">Results</a>
                                        </li>

                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('intaker')) {
                                ?>
<!--                                 <li >
                                    <a href="#"><i class="fa fa-star fa-fw"></i> Bulking<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('*processinginstructions') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('processinginstructions' ) }}">Instructions</a>
                                        </li>
                                        <li {{ (Request::is('*processingresults') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('processingresults' ) }}">Results</a>
                                        </li>

                                    </ul>
                                </li> -->
                                <?php
                            }
                        ?>
 <!--
                                <li >
                                    <a href="#"><i class="fa fa-envelope fa-fw"></i> Sample<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Type Sample</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Offer Sample</a>
                                        </li>                                        
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Approval Sample</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Shipment Sample</a>
                                        </li>
                                    </ul>
                                </li>  -->

                                 <?php
                            }

                        ?>


                        <li >
                            <a href="#"><i class="fa fa-ship fa-fw"></i> Dispose<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('salescontract') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('salescontract' ) }}">Sales Contract</a>      
                                </li>                                 
                                <li {{ (Request::is('allocate') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('allocate' ) }}">Allocate</a>      
                                </li>  
<!--                                 <li {{ (Request::is('Ship') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('#' ) }}">Ship</a>      
                                </li>   -->

                            </ul>
                        </li>

                        
                        <li>
                            <a href="#"><i class="fa fa-file fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url ('ct' ) }}">Auction <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li {{ (Request::is('ctreport') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('ctreport' ) }}">Catalogue</a>      
                                        </li>   
                                        <li {{ (Request::is('ctquality') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('ctquality' ) }}">Catalogue Quality</a>      
                                        </li>     

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                                <li>
                                    <a href="{{ url ('dt' ) }}">Direct <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li {{ (Request::is('dtreport') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('dtreport' ) }}">Direct</a>      
                                        </li>   
                                        <li {{ (Request::is('dtquality') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('dtquality' ) }}">Direct Quality</a>      
                                        </li>     

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="{{ url ('pu' ) }}">Purchases <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*purchaseforallocation') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('purchaseforallocation' ) }}">Allocation</a>
                                        </li>

                                        <li {{ (Request::is('*purchaseaverageprice') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('purchaseaverageprice' ) }}">Average Prices</a>
                                        </li>                                        
                                  <!--       <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Purchase Control by Quality Code</a>
                                        </li> -->
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="{{ url ('st' ) }}">Stock <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*stockall') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('stockall' ) }}">Stocks</a>
                                        </li>

                                    <!--     <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Stock Per Date</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Stock Position Per Quality</a>
                                        </li>
                                        <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('#' ) }}">Stock Per Location</a>
                                        </li> -->
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>   
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li  {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                    <a href="#">Purchase</a>
                                </li>
                                <li  {{ (Request::is('*statsmilling') ? 'class="active"' : '') }}>
                                    <a href="#">Quality</a>
                                </li>
                                <li  {{ (Request::is('*statssale') ? 'class="active"' : '') }}>
                                    <a href="#">Disposal</a>
                                </li>                    
                            </ul>

                        </li>  



                        <!-- <a href="{{ url ('home') }}"><i class="fa fa-coffee fa-fw"></i> Home</a> -->
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin')) {
                                ?>

                                <li  {{ (Request::is('*activities') ? 'class="active"' : '') }}>
                                    <a href="activities"><i class="fa fa-external-link fa-fw"></i> Activity Logs</a>
                                </li>
                                <?php
                            }

                        ?>
                        <?php 
                            if ($user->hasRole('owner') || $user->hasRole('admin')) {
                                ?>
                                <li >
                                    <a href="#"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        <li>
                                            <a href="{{ url ('#' ) }}">Location <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Country</a>
                                                </li>
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Region</a>
                                                </li>
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Warehouse</a>
                                                </li>
                                            </ul>

                                        </li>


                                        <li>
                                            <a href="{{ url ('#' ) }}">Quality <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Grades</a>
                                                </li>
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Quality Codes</a>
                                                </li>
                                                <li {{ (Request::is('*#') ? 'class="active"' : '') }}>
                                                    <a href="{{ url ('#' ) }}">Allocations</a>
                                                </li>
                                            </ul>

                                        </li>


                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                                <?php
                            }

                        ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
            <div class="row">  
                @yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

