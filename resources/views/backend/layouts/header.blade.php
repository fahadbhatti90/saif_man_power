    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('backend/index') }}" class="brand-logo">
                <img class="logo-abbr" src="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}" alt="">
                <h3 class="pl-4 pt-2">{{getSettingValue('company_name')}}</h3>
            </a>

            <div class="nav-control">
                <div class="hamburger" id="toggle_side_bar">
                    {{--<button type="button" >Click Me!</button>--}}
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->



		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown show">


                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link dz-fullscreen primary" href="#">
									<svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg"><path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill=""/><path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill=""/><path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" /><path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill=""/></svg>
                                </a>
							</li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>Hello, <strong>{{  Auth::user()->name }}</strong></span>
									</div>
                                    <img src="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ url('settings') }}" class="dropdown-item ai-icon">
                                        <i class="fa fa-cog" style="font-size: 18px;"></i>
                                        <span class="ml-2">Settings </span>
                                    </a>
                                    <a href="{{ url('change-password') }}" class="dropdown-item ai-icon">
                                        <i class="fa fa-lock" style="font-size: 18px;"></i>
                                        <span class="ml-2">Change Password </span>
                                    </a>

                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" style="font-size: 18px;"></i>
                                        <span class="ml-2">Logout </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{ url('backend/index') }}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-user') }}">Add User</a></li>
                            <li><a href="{{ url('show-user') }}">All Users</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Slider</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-slider') }}">Add Slider</a></li>
                            <li><a href="{{ url('show-slider') }}">All Sliders</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-controls-3"></i>
                            <span class="nav-text">Client</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-client') }}">Add Client</a></li>
                            <li><a href="{{ url('show-client') }}">All Clients</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Achievements</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-achievements') }}">Add Achievement</a></li>
                            <li><a href="{{ url('show-achievements') }}">All Achievements</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Job Category</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-jobcategory') }}">Add Job Category</a></li>
                            <li><a href="{{ url('show-jobcategory') }}">All Job Categories</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="widget-basic" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li> -->
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Our Team</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-ourteam') }}">Add Team Member</a></li>
                            <li><a href="{{ url('show-ourteam') }}">All Team Members</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-notepad"></i>
                            <span class="nav-text">Post a Job</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('add-job') }}">Add Job</a></li>
                            <li><a href="{{ url('show-job') }}">All Jobs</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('show-contactus') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-1"></i>
                            <span class="nav-text">Contact Us</span>
                        </a>
                    </li>
                    <li><a href="{{ url('show-applyjob') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Job Applies</span>
                        </a>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <script>
            $(document).ready(function(){
                $(".content-body").addClass("full_body");
                $(".deznav").toggle();
            });
            $("#toggle_side_bar").click(function(){
                if($(".deznav").is(":visible")){
                    //alert("The paragraph  is visible.");
                    $(".deznav").toggle();
                    $(".content-body").addClass("full_body");
                } else{
                    //alert("The paragraph  is hidden.");
                    $(".deznav").toggle();
                    $(".content-body").removeClass("full_body");
                }
            });
        </script>
        <style>
             .full_body{
                margin-left: 0rem;
            }
        </style>
