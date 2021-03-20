<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sixer | @yield('title')</title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('admin/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    {{-- Select 2 --}}
    <link href="{{asset('admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="pace-done">
    {{-- mini-navbar --}}
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle"
                                    src="{{ asset('admin/img/profile_small.jpg') }}" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                                    </span>
                                     <span class="text-muted text-xs block">{{Auth::user()->user_type}} </span>
                                    
                                </span> 
                            </a>
                           
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>                   
                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-user"></i> <span class="nav-label">User</span></a>
                    </li>
                    <li>
                        <a href="{{route('customer.index')}}"><i class="fa fa-users"></i> <span class="nav-label">Customer</span></a>
                    </li>
                    <li>
                        <a href="{{route('store.index')}}"><i class="fa fa-home"></i> <span class="nav-label">Store</span></a>
                    </li>
                    <li>
                        <a href="{{route('brand.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Brand</span></a>
                    </li>
                    <li>
                        <a href="{{route('shoedetails.index')}}"><i class="fa fa-cube"></i> <span class="nav-label">Shoe Stock</span></a>
                    </li>
                    <li>
                        <a href="{{route('stock.index')}}"><i class="fa fa-database"></i> <span class="nav-label">Add Stock</span></a>
                    </li>
                    <li>
                        <a href="{{route('order.index')}}"><i class="fa fa-truck"></i> <span class="nav-label">Orders</span></a>
                    </li>
                   
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary navabartoggle" href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Sixer.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                src="{{ asset('admin/img/a7.jpg') }}">
                                        </a>
                                        <div>
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                src="{{ asset('admin/img/a4.jpg') }}">
                                        </a>
                                        <div>
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                src="{{ asset('admin/img/profile.jpg') }}">
                                        </a>
                                        <div>
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               <i class="fa fa-sign-out"></i>  {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                           
                        </li>
                        {{-- <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li> --}}
                    </ul>

                </nav>
            </div>
                @yield('content')

            <div class="footer">
                <div class="pull-right">
                    {{-- 10GB of <strong>250GB</strong> Free. --}}
                </div>
                <div>
                    <strong>Copyright</strong> Keen Tech &copy; 2020-21
                </div>
            </div>
        </div>
       
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script> --}}

    <!-- Flot -->
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.j') }}s"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('admin//plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}">
    </script>
    <script
        src="{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}">
    </script>

    <!-- EayPIE -->
    <script src="{{ asset('admin/js/plugins/easypiechart/jquery.easypiechart.js') }}">
    </script>

    <!-- Sparkline -->
    <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('admin/js/demo/sparkline-demo.js') }}"></script>


    <!-- Sweet alert -->
    <script src="{{asset('admin/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    {{-- Select 2 --}}
    <script  src="{{asset('admin/js/plugins/select2/select2.full.min.js')}}"></script>

     {{-- Data table --}}
     <script src="{{ asset('admin/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
         $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

        });
        $(document).ready(function() {


        


        });
    </script>

    <script>
        $(document).ready(function(){
            $('.navabartoggle').on('click', function () {
                $("body").toggleClass("mini-navbar");
                // SmoothlyMenu();
            });
        });
    </script>

    @yield('script')

    
</body>

</html>
