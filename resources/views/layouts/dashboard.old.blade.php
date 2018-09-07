@extends('layouts.plane')

@section('body')

<?php
    use Ngea\User;
    use Ngea\Person;
    use Ngea\Role;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    Auth::check();
    $user = Auth::user();
    $person_id = null;
    $department_id = null;
    $user_role_id = null;

    if ($user != null) {

        $person_id = $user->per_id;

        $user_role_id = $user->roles->first()->id;

        $personDetails = Person::where('id', $person_id)->first();

        if ($personDetails != null) {

            $department_id = $personDetails->dprt_id;
        }
    }


    $MANAGEMENT = 1;
    $TRADING_SHIPPING = 5;
    $QUALITY = 6;
    $MARKETING = 9;
    $WAREHOUSE = 10;
    $WEIGH_BRIDGE = 12;
    $FINANCE_ACCOUNTS = 14;
   
    $OWNER = 1;
    $ADMIN = 2;
    $SUPERVISOR = 3;
    $INTAKER = 4;


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
                        <li class="hidelist sidebar-search open">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        <li class="hidelist {{ (Request::is('home') ? 'active' : '') }} open">
                            <a href="{{ url ('home') }}"><i class="fa fa-coffee fa-fw"></i> Home</a>
                        </li>  

<!-- 
                        <li class="hidelist {{ (Request::is('home_alternate') ? 'active' : '') }} open">
                            <a href="{{ url ('home_alternate') }}"><i class="fa fa-coffee fa-fw"></i> Home Alternate</a>
                        </li>  -->
            
                        <li class="hidelist sensitive management owner admin">
                            <a href="#"><i class="fa fa-users fa-fw"></i> Registration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('*registeruser') ? 'active' : '') }}  management owner admin">
                                    <a href="{{ url ('registeruser' ) }}">Users</a>
                                </li>
                            </ul>
                        </li>

                        <li class="hidelist {{ (Request::is('createsale') ? 'active' : '') }} intaker supervisor quality trading">
                            <a href="{{ url ('createsale') }}"><i class="fa fa-tag fa-fw"></i> Add/Update a Sale</a>
                        </li> 

                        <li class="hidelist {{ (Request::is('*direct') ? 'active' : '') }} intaker supervisor quality trading">
                            <a href="{{ url ('direct' ) }}"><i class="fa fa-exchange fa-fw"></i> Direct Purchase <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">                             
                                <li class="hidelist {{ (Request::is('*directindividual') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('directindividual' ) }}"> Add Outturn</a>
                                </li>                               
                                <li class="hidelist {{ (Request::is('*directuploadoutturns') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('directuploadoutturns' ) }}"> Upload Outturns List</a>
                                </li>        
                                <li class="hidelist {{ (Request::is('directqualitydetails') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('directqualitydetails' ) }}"> Quality Details</a>      
                                </li>    
                                <li class="hidelist {{ (Request::is('directqualitydetailslist') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('directqualitydetailslist' ) }}"> Quality Details List</a>      
                                </li>                                   
                                <li class="hidelist {{ (Request::is('*directcodeupload') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('directcodeupload' ) }}"> Upload Quality Codes</a>
                                </li>         
                            </ul>
                        </li>


                       <li class="hidelist {{ (Request::is('*auction') ? 'active' : '') }}  intaker supervisor quality trading">
                            <a href="{{ url ('auction' ) }}"><i class="fa fa-gavel fa-fw"></i> Auction<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li class="hidelist {{ (Request::is('*catalogueindividual') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('catalogueindividual' ) }}">Intake Individual</a>
                                </li>        

                                <li class="hidelist {{ (Request::is('*catalogueupload') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('catalogueupload' ) }}">Upload Catalogue</a>
                                </li>

                                <li class="hidelist {{ (Request::is('*confirmcatalogue') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('confirmcatalogue' ) }}">Confirm Catalogue</a>
                                </li>  

                                <li class="hidelist {{ (Request::is('cataloguequalitydetailslist') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('cataloguequalitydetailslist' ) }}">Quality</a>      
                                </li> 

                                <li class="hidelist {{ (Request::is('*confirmqualitycatalogue') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('confirmqualitycatalogue' ) }}">Confirm Catalogue Quality</a>
                                </li>   
                                <li class="hidelist {{ (Request::is('*stocklist') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('stocklist' ) }}">Auction List</a>
                                </li> 

                                <li class="hidelist {{ (Request::is('*stockupload') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('stockupload' ) }}">Upload Auction List</a>
                                </li> 
                                <li class="hidelist {{ (Request::is('*confirmauctiondetails') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('confirmauctiondetails' ) }}">Confirm Auction Details</a>
                                </li>  
                            </ul>

                        </li>

                        <li class="open">
                            <a href="#"><i class="fa fa-money fa-fw"></i> Purchase<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li class="hidelist {{ (Request::is('*confirmpurchaseslist') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('confirmpurchaseslist' ) }}">Confirm Auction Purchases</a>
                                </li>  

                                <li class="hidelist {{ (Request::is('directpurchasedetails') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('directpurchasedetails' ) }}"> Direct Purchase Prices</a>      
                                </li> 

                                <li class="hidelist {{ (Request::is('basket') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('basket' ) }}">Basket</a>      
                                </li> 

                                <li class="hidelist {{ (Request::is('basketinternal') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('basketinternal' ) }}">Internal Basket</a>      
                                </li> 

                                <!-- <li class="hidelist {{ (Request::is('directpurchasequality') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('directpurchasequality' ) }}"> Direct Purchase Basket</a>      
                                </li> 
 -->
                                 <li class="hidelist {{ (Request::is('*confirminvoices') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('confirminvoices' ) }}">Invoice</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*confirminvoicesdirect') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('confirminvoicesdirect' ) }}">Invoice Direct</a>
                                </li>    
                                <li class="hidelist {{ (Request::is('briccontracts') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('briccontracts' ) }}">Bric Contracts</a>      
                                </li>    
                                <li class="hidelist {{ (Request::is('briccontractsdirect') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('briccontractsdirect' ) }}">Bric Contracts Direct</a>      
                                </li> 
                                <li class="hidelist {{ (Request::is('*confirmpayment') ? 'active' : '') }}  intaker supervisor accounts">
                                    <a href="{{ url ('confirmpayment' ) }}">Payment</a>
                                </li>  
                                <li class="hidelist {{ (Request::is('*confirmpaymentdirect') ? 'active' : '') }}  intaker supervisor accounts">
                                    <a href="{{ url ('confirmpaymentdirect' ) }}">Payment Direct</a>
                                </li>  
                                <li class="hidelist {{ (Request::is('warrants') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('warrants' ) }}">Warrants</a>      
                                </li>  

                                <li class="hidelist {{ (Request::is('directpurchasewarrants') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('directpurchasewarrants' ) }}"> Direct Purchase Warrants</a>      
                                </li>  
                                <li class="hidelist {{ (Request::is('releaseinstructions') ? 'active' : '') }}  intaker supervisor trading">
                                    <a href="{{ url ('releaseinstructions' ) }}">Release Instructions</a>      
                                </li>  

                            </ul>
                        </li>

                        <li class="hidelist intaker supervisor warehouse weighbridge">
                            <a href="#"><i class="fa fa-truck fa-fw"></i> Weighbridge<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('weighbridge') ? 'active' : '') }} intaker supervisor warehouse weighbridge">
                                    <a href="{{ url ('weighbridge' ) }}">Weighbridge In</a>      
                                </li>                                 
                                <li class="hidelist {{ (Request::is('weighbridgeout') ? 'active' : '') }} intaker supervisor warehouse weighbridge">
                                    <a href="{{ url ('weighbridgeout' ) }}">Weighbridge Out</a>      
                                </li>  
                            </ul>
                        </li>

                        <li class="hidelist intaker supervisor warehouse" >
                            <a href="#"><i class="fa fa-building fa-fw"></i> Warehouse<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('arrivalinformationlist') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('arrivalinformationlist' ) }}">Arrival Information</a>      
                                </li>   
                                <li class="hidelist {{ (Request::is('arrivalqualityinformationlist') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('arrivalqualityinformationlist' ) }}">Arrival Quality Information</a>      
                                </li>   
                                <li class="hidelist {{ (Request::is('*movementspecial') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('movementspecial' ) }}">Movement Instruction</a>      
                                </li>  
                                <li class="hidelist {{ (Request::is('*movementconfirmation') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('movementconfirmation' ) }}">Confirm Movement</a>      
                                </li> 
                                <li class="hidelist {{ (Request::is('*stuffing') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('stuffing' ) }}">Stuffing</a>      
                                </li> 

                            <!--     <li class="hidelist {{ (Request::is('*note') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('note' ) }}"><i class="fa fa-remove fa-fw"></i> Take Out of Stock<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="hidelist {{ (Request::is('noteweight') ? 'active' : '') }} intaker supervisor warehouse">
                                            <a href="{{ url ('noteweight' ) }}"> Weight Note</a>      
                                        </li>    
                                        <li class="hidelist {{ (Request::is('notedispatch') ? 'active' : '') }} intaker supervisor warehouse">
                                            <a href="{{ url ('notedispatch' ) }}"> Dispatch Note</a>      
                                        </li>    
                                    </ul>
                                </li> -->
                            </ul>
                        </li>

                        <li class="hidelist intaker supervisor accounts">
                            <a href="#"><i class="fa fa-dollar fa-fw"></i> Accounts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li class="hidelist {{ (Request::is('*accountssaledetails') ? 'active' : '') }} intaker supervisor accounts">
                                    <a href="{{ url ('accountssaledetails' ) }}">Sale Details</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*accountsdebit') ? 'active' : '') }} intaker supervisor accounts">
                                    <a href="{{ url ('accountsdebit' ) }}">Debit Note</a>
                                </li>    
                            </ul>
                        </li>  

                        <li class="hidelist intaker supervisor quality">
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Sample<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }} intaker supervisor quality"">
                                    <a href="{{ url ('#' ) }}">Type Sample</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }} intaker supervisor quality"">
                                    <a href="{{ url ('#' ) }}">Offer Sample</a>
                                </li>                                        
                                <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }} intaker supervisor quality"">
                                    <a href="{{ url ('#' ) }}">Approval Sample</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }} intaker supervisor quality"">
                                    <a href="{{ url ('#' ) }}">Shipment Sample</a>
                                </li>
                            </ul>
                        </li>  
                        <li class="hidelist intaker supervisor quality warehouse">
                            <a href="#"><i class="fa fa-star fa-fw"></i> Processing<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('*processingprovisional') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('processingprovisional' ) }}">Provisional</a>
                                </li>       
                                <li class="hidelist {{ (Request::is('*processingprovisionalview') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('processingprovisionalview' ) }}">Pending Provisional</a>
                                </li>   
                                                   
                                <li class="hidelist {{ (Request::is('*processinginstructions') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('processinginstructions' ) }}">Issue Instruction</a>
                                </li>                          
                                <li class="hidelist {{ (Request::is('*processinginstructionsview') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('processinginstructionsview' ) }}">Pending Instructions</a>
                                </li>         
                                <li class="hidelist {{ (Request::is('*processinghooper') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('processinghooper' ) }}">Hooper Results</a>
                                </li>     
                                <li class="hidelist {{ (Request::is('*processingresults') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('processingresults' ) }}">Results</a>
                                </li>          
                                <li class="hidelist {{ (Request::is('*processingresultsquality') ? 'active' : '') }} intaker supervisor quality">
                                    <a href="{{ url ('processingresultsquality' ) }}">Results Quality</a>
                                </li>    
                            </ul>
                        </li>

                        <li class="hidelist intaker supervisor trading">

                        <a href="#"><i class="fa fa-ship fa-fw"></i> Contract Execution<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('salescontract') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('salescontract' ) }}">Contract Creation</a>      
                                </li>    
                                <li class="hidelist {{ (Request::is('pendingallocations') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('pendingallocations' ) }}">Pending Allocations</a>      
                                </li>  
                                <li class="hidelist {{ (Request::is('confirmallocations') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('confirmallocations' ) }}">Confirm Bric Allocation</a>      
                                </li>  
                                <li class="hidelist {{ (Request::is('salesshipmentdetails') ? 'active' : '') }} intaker supervisor trading">
                                    <a href="{{ url ('salesshipmentdetails' ) }}">Shipment Details</a>      
                                </li>    
                            </ul>
                        </li>
                       

                        <li class="hidelist intaker supervisor trading warehouse quality accounts management admin weighbridge accounts">
                            <a href="#"><i class="fa fa-file fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist intaker supervisor trading quality management admin ">
                                    <a href="{{ url ('ct' ) }}">Auction <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('ctreport') ? 'active' : '') }} intaker supervisor trading quality management admin">
                                            <a href="{{ url ('ctreport' ) }}">Catalogue</a>      
                                        </li>   
                                        <li class="hidelist {{ (Request::is('ctquality') ? 'active' : '') }} intaker supervisor trading quality management admin ">
                                            <a href="{{ url ('ctquality' ) }}">Catalogue Quality</a>      
                                        </li>     
                                        <li class="hidelist {{ (Request::is('ctqualityreport') ? 'active' : '') }} intaker supervisor trading quality management admin">
                                            <a href="{{ url ('ctqualityreport' ) }}">Catalogue Quality Report</a>      
                                        </li>     
                                    </ul>
                                </li>

<!--                                 <li class="hidelist intaker supervisor trading quality management admin ">
                                    <a href="{{ url ('dt' ) }}">Direct <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('dtreport') ? 'active' : '') }} intaker supervisor trading quality management admin">
                                            <a href="{{ url ('dtreport' ) }}">Direct</a>      
                                        </li>   
                                        <li class="hidelist {{ (Request::is('dtquality') ? 'active' : '') }} intaker supervisor trading quality management admin ">
                                            <a href="{{ url ('dtquality' ) }}">Direct Quality</a>      
                                        </li>     

                                    </ul>
                                </li> -->
                                <li class="hidelist intaker supervisor trading quality management admin accounts">
                                    <a href="{{ url ('pu' ) }}">Purchases <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="hidelist {{ (Request::is('*purchaseforallocation') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchaseforallocation' ) }}">Allocation</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*purchaseforallocationreport') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchaseforallocationreport' ) }}">Allocation Per Sale</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*purchaseperseller') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchaseperseller' ) }}">Per Seller</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*purchasecontractsummary') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchasecontractsummary' ) }}">Purchase Contract Summary</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*purchaseaverageprice') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchaseaverageprice' ) }}">Average Prices</a>
                                        </li> 
                                        <li class="hidelist {{ (Request::is('*purchasesummarypercode') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchasesummarypercode' ) }}">Purchases Summary Per Code and Month</a>
                                        </li>  
                                        <li class="hidelist {{ (Request::is('*purchasesummarypercode') ? 'active' : '') }} intaker supervisor trading quality management admin accounts">
                                            <a href="{{ url ('purchasesummarypercode' ) }}">Purchases Summary Per Code and Month</a>
                                        </li>         
                                    </ul>
                                </li>
                                <li class="hidelist intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                    <a href="{{ url ('st' ) }}">Stock <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('*stockall') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockall' ) }}">Stocks</a>
                                        </li> 

                                        <li class="hidelist {{ (Request::is('*stockallandpurchased') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockallandpurchased' ) }}">All Stocks</a>
                                        </li> 


                                        <li class="hidelist {{ (Request::is('*stockexpected') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('stockexpected' ) }}">Expected</a>
                                        </li>   

                                        <li class="hidelist {{ (Request::is('*stockbought') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockbought' ) }}">Bought No Release</a>
                                        </li>      

                                        <li class="hidelist {{ (Request::is('*stocksmovement') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stocksmovement' ) }}">Stocks Movement</a>
                                        </li>           

                                        <li class="hidelist {{ (Request::is('*stockswarrantedvsgrn') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockswarrantedvsgrn' ) }}">Warranted Vs Dispatch Vs GRN</a>
                                        </li>           

                                        <li class="hidelist {{ (Request::is('*stocksperbric') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stocksperbric' ) }}">Stocks per Bric</a>
                                        </li>                 

                                        <li class="hidelist {{ (Request::is('*stocksperbasket') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stocksperbasket' ) }}">Stocks per Basket</a>
                                        </li>                 

                                        <li class="hidelist {{ (Request::is('*stocksperpurchase') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stocksperpurchase' ) }}">Stocks per Contract</a>
                                        </li>                 

                                        <li class="hidelist {{ (Request::is('*stockslongshort') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockslongshort' ) }}">Long/ Short</a>
                                        </li>                  

                                        <li class="hidelist {{ (Request::is('*stocksreconciliation') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stocksreconciliation' ) }}">Stock Reconciliation</a>
                                        </li>  

                                    </ul>
                                </li>

                                <li class="hidelist intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                    <a href="{{ url ('pr' ) }}">Processing <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('*processingresultsgrid') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('processingresultsgrid' ) }}">Processing Results</a>
                                        </li> 

                                        <li class="hidelist {{ (Request::is('*processingsummary') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('processingsummary' ) }}">Processing Summary</a>
                                        </li>   

                                        <li class="hidelist {{ (Request::is('*processingsummarybric') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('processingsummarybric' ) }}">Processing Summary Per Buyer</a>
                                        </li>   

                                        <li class="hidelist {{ (Request::is('*processingsummarystuffed') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('processingsummarystuffed' ) }}">Processing Summary Stuffed</a>
                                        </li>   

                                        <li class="hidelist {{ (Request::is('*processingsalescontractsummary') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('processingsalescontractsummary' ) }}">Sales Contract Summary</a>
                                        </li>   
                               
                                    </ul>
                                </li>

                                <li class="hidelist intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                    <a href="{{ url ('br' ) }}">Breakdown <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('*breakdownwithoutstuffed') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('breakdownwithoutstuffed' ) }}">Breakdown Without Stuffed</a>
                                        </li> 

                                        <li class="hidelist {{ (Request::is('*breakdownfull') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('breakdownfull' ) }}">Breakdown Full</a>
                                        </li>    
                               
                                    </ul>
                                </li>

<!--                                 <li class="hidelist intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                    <a href="{{ url ('br' ) }}">Breackdown <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li class="hidelist {{ (Request::is('*stockall') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse">
                                            <a href="{{ url ('stockall' ) }}">Stocks</a>
                                        </li> 

                                        <li class="hidelist {{ (Request::is('*stockexpected') ? 'active' : '') }} intaker supervisor trading quality management admin accounts warehouse weighbridge">
                                            <a href="{{ url ('stockexpected' ) }}">Expected</a>
                                        </li>   
                               
                                    </ul>
                                </li> -->

                            </ul>
                        </li>   
                        <li class="hidelist intaker supervisor trading quality management admin accounts warehouse weighbridge">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }}">
                                    <a href="#">Purchase</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*statsmilling') ? 'active' : '') }}">
                                    <a href="#">Quality</a>
                                </li>
                                <li class="hidelist {{ (Request::is('*statssale') ? 'active' : '') }}">
                                    <a href="#">Disposal</a>
                                </li>                    
                            </ul>

                        </li>  
                        <li class="hidelist {{ (Request::is('*activities') ? 'active' : '') }} admin management">
                            <!-- <a href="activities"><i class="fa fa-external-link fa-fw"></i> Activity Logs</a> -->
                        </li>

                        <li class="hidelist intaker supervisor accounts">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Tools<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="hidelist {{ (Request::is('*accountscreditarrival') ? 'active' : '') }} intaker supervisor accounts">
                                    <a href="{{ url ('accountscreditarrival') }}">Credit Note On Arrival</a>
                                </li>   
                                <li class="hidelist {{ (Request::is('*accountscredit') ? 'active' : '') }} intaker supervisor accounts">
                                    <a href="{{ url ('accountscredit') }}">Credit Note On Stock</a>
                                </li>   
                                  
                                <li class="hidelist {{ (Request::is('*manageindividual') ? 'active' : '') }} intaker supervisor warehouse">
                                    <a href="{{ url ('manageindividual' ) }}">Manage Individual</a>      
                                </li>  

                            </ul>
                        </li>  


                        <li class="hidelist admin">
                            <a href="settings"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="{{ url ('settings' ) }}">Location <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="hidelist {{ (Request::is('*settingscountry') ? 'active' : '') }}">
                                            <a href="{{ url ('settingscountry' ) }}">Country</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsregion' ) }}">Region</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*#') ? 'active' : '') }}">
                                            <a href="{{ url ('settingswarehouse' ) }}">Warehouse</a>
                                        </li>
                                    </ul>

                                </li>

                                <li>
                                    <a href="{{ url ('settings' ) }}">Quality <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="hidelist {{ (Request::is('*settingsgrades') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsgrades' ) }}">Grades</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*settingsgrades') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsquality' ) }}">Quality Codes</a>
                                        </li>
                                    </ul>

                                </li>



                                <li>
                                    <a href="{{ url ('settings' ) }}">Green <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="hidelist {{ (Request::is('*settingscup') ? 'active' : '') }}">
                                            <a href="{{ url ('settingscup' ) }}">Cup</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*#settingsraw') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsraw' ) }}">Raw</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*settingsscreen') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsscreen' ) }}">Screen</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*settingssize') ? 'active' : '') }}">
                                            <a href="{{ url ('settingssize' ) }}">Size</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*settingscolor') ? 'active' : '') }}">
                                            <a href="{{ url ('settingscolor' ) }}">Color</a>
                                        </li>
                                        <li class="hidelist {{ (Request::is('*settingsdeffects') ? 'active' : '') }}">
                                            <a href="{{ url ('settingsdeffects' ) }}">Deffects</a>
                                        </li>
                                    </ul>

                                </li>


                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
@push('scripts')

<script type="text/javascript">

    // $(".hidelist").hide();   

    var user_role_id= <?php echo json_encode($user_role_id); ?>;
    
    var department_id= <?php echo json_encode($department_id); ?>;

    var MANAGEMENT= <?php echo json_encode($MANAGEMENT); ?>;

    var TRADING_SHIPPING= <?php echo json_encode($TRADING_SHIPPING); ?>;
    
    var QUALITY= <?php echo json_encode($QUALITY); ?>;
    
    var WAREHOUSE= <?php echo json_encode($WAREHOUSE); ?>;
    
    var WEIGH_BRIDGE= <?php echo json_encode($WEIGH_BRIDGE); ?>;
    
    var OWNER= <?php echo json_encode($OWNER); ?>;
    
    var ADMIN= <?php echo json_encode($ADMIN); ?>;
    
    var SUPERVISOR= <?php echo json_encode($SUPERVISOR); ?>;
    
    var ADMIN= <?php echo json_encode($ADMIN); ?>;
    
    var INTAKER= <?php echo json_encode($INTAKER); ?>;

    if ($(".open").text() != null) {
         $(".open").show();
    }    

    if (user_role_id == OWNER) {
         $("li").show();  
    }

    if (department_id == MANAGEMENT) {
         $(".management").show();  
    }

    if (user_role_id == ADMIN) {
         $(".admin").show();  
    }
    

    if (user_role_id == SUPERVISOR) {
        
        if ($(".supervisor").text() != null) {

            if (department_id == TRADING_SHIPPING) {

                $(".supervisor.trading").show();  

            }

            if (department_id == QUALITY) {

                $(".supervisor.quality").show();  

            }

            if (department_id == WAREHOUSE) {

                $(".supervisor.warehouse").show();  

            }

            if (department_id == WEIGH_BRIDGE) {

                $(".supervisor.weighbridge").show();  

            }

            if (department_id == FINANCE_ACCOUNTS) {

                $(".supervisor.accounts").show();  

            }
        }  

    }
  

    if (user_role_id == INTAKER) {
        
        if ($(".supervisor").text() != null) {

            if (department_id == TRADING_SHIPPING) {

                $(".intaker.trading").show();  

            }

            if (department_id == QUALITY) {

                $(".intaker.quality").show();  

            }

            if (department_id == WAREHOUSE) {

                $(".intaker.warehouse").show();  

            }

            if (department_id == WEIGH_BRIDGE) {

                $(".intaker.weighbridge").show();  

            }

            if (department_id == FINANCE_ACCOUNTS) {

                $(".intaker.accounts").show();  

            }
        }  

    }




</script>

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

