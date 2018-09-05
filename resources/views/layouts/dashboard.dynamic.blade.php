@extends('layouts.plane')

@section('body')

<?php
    use Ngea\User;
    use Ngea\Person;
    use Ngea\Role;
    use Ngea\Menu;
    use Ngea\group_menu;

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

    $groupmenu = group_menu::all(['id', 'dprt_id', 'mn_id', 'rl_ids'])->where('dprt_id', (string)$department_id);
    $department_menuarray=[];
    $department_menustring='';
    foreach($groupmenu as $department_menu){
        //check role allowed
        $roleIDs=json_decode($department_menu->rl_ids);
        if(empty($roleIDs))
        $roleIDs = array();
        if (in_array($user_role_id, $roleIDs))
            {
            $department_menuarray[]=(int)$department_menu->mn_id;
            }
    }
     $menu = Menu::all(['id', 'mn_name', 'mn_url', 'mn_level', 'mn_icon', 'mn_parent', 'mn_order'])->where('mn_level', (string)1)
     ->whereIn('id', $department_menuarray)
     ->sortby('mn_order')
     ->all();
   
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
                        
                        <?php                        
                        foreach ($menu as $value)
                        {
                            $url=$value->mn_url;
                            $children = Menu::all(['id', 'mn_name', 'mn_url', 'mn_level', 'mn_icon', 'mn_parent', 'mn_order'])
                            ->whereIn('id', $department_menuarray)
                            ->sortBy('mn_order')
                            ->where('mn_parent', (string)$value->id);
                            $count=$children->count();
                        ?>
                        <li class="{{ (Request::is($url) ? 'active' : '') }} open">
                            <a href="{{ url ($url) }}"><i class="fa fa-{{$value->mn_icon}} fa-fw" ></i> {{$value->mn_name}}</a>
                             <?php
                              if ($count>0) {
                                  # code...
                                  
                                ?>
                                <ul class="nav nav-second-level">
                                <?php
                                foreach ($children->all() as $submenu)
                                {
                                    $url=$submenu->mn_url;
                                    $childrensub = Menu::all(['id', 'mn_name', 'mn_url', 'mn_level', 'mn_icon', 'mn_parent', 'mn_order'])
                                    ->whereIn('id', $department_menuarray)
                                    ->sortBy('mn_order')
                                    ->where('mn_parent', (string)$submenu->id);
                                    $countsub=$childrensub->count();
                                ?>
                                <li class="{{ (Request::is($url) ? 'active' : '') }} open">
                                    <a href="{{ url ($url) }}"><i class="fa fa-{{$submenu->mn_icon}} fa-fw" ></i> {{$submenu->mn_name}}</a>
                                     <?php
                                      if ($countsub>0) {
                                          # code...
                                        ?>
                                <ul class="nav nav-third-level">
                                <?php
                                foreach ($childrensub->all() as $submenuthirdlevel)
                                {
                                    $url=$submenuthirdlevel->mn_url;
                                ?>
                                <li class="{{ (Request::is($url) ? 'active' : '') }} open">
                                    <a href="{{ url ($url) }}"><i class="fa fa-{{$submenuthirdlevel->mn_icon}} fa-fw" ></i> {{$submenuthirdlevel->mn_name}}</a>
                                     
                                </li>
                                <?php
                                }
                                ?>
                                </ul>
                                <?php
                                      }
                                     ?>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <?php
                              }
                             ?>
                        </li>
                        <?php
                        }
                        ?>
                        
                      

                    </ul>
                </div>
            </div>
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

