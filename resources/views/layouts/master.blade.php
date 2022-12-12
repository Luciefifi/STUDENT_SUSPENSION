<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>@yield("title")</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    @section("sidebar")

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">

        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                            <!-- <img s{{asset('rc="images/logo.png')}}" alt="" /> --><span>Student-Suspension</Student-Suspension></span>
                        </a></div>
                    <li class="label">Main</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span class="badge badge-primary"></span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="index.html">Dashboard 1</a></li>
                        </ul>
                    </li>

                        @role('Admin')
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Colleges <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/colleges">All colleges</a></li>
                            <li><a href="/createCollege">create college</a></li>

                        
                        </ul>


                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Schools <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/schools">All  Schools</a></li>
                            <li><a href="/createSchool">create School</a></li>

                        
                        </ul>
                        @endrole



                       
                        @hasanyrole('Admin|HOD')
                        
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Departments <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/departments">All Departments</a></li>
                            <li><a href="/createDepartment">create Department</a></li>

                        
                        </ul>
                         <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Programs <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/programs">All Programs</a></li>
                            <li><a href="/createProgram">create Program</a></li>

                        
                        </ul>

                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Students<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/Students">All students</a></li>
                            <li><a href="/createStudent">create Student</a></li>

                        
                        </ul> 
                        @endhasanyrole
                        @role('Admin')

                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Users<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/Users">All user</a></li>
                            <li><a href="/createUser">create User</a></li>

                        
                        </ul>
                        @endrole
                        @role('student')
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> suspension<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/suspension">request suspension</a></li>
                            <li><a href="/progress">progress</a></li>

                        
                        </ul>
                        @endrole
            
                </ul>
                </li>

                
                </ul>
            </div>
        </div>
    </div>
    @show
    @section("header")
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                       
                       
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ Auth::user()->name }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    
                                    <div class="dropdown-content-body">
                                        <ul>                                            
                                            <li>
                                                <form id ="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                                                @csrf
                                                </form>
                                                  
                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                                        <i class="ti-power-off"></i>
                                                        <span>Logout</span>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @show

    <div class="content-wrap">

        @yield("content")
    </div>

    <!-- jquery vendor -->
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{asset('js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <!-- bootstrap -->

    <script src="{{asset('js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{asset('js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{asset('js/lib/calendar-2/pignose.init.js')}}"></script>


    <script src="{{asset('js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('js/dashboard2.js')}}"></script>

</body>