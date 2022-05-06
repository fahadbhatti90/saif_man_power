<!--=================================
Header -->
<header class="header bg-dark">
    <nav class="navbar navbar-static-top navbar-expand-lg header-sticky">
        <div class="container-fluid">
            <button id="nav-icon4" type="button" class="navbar-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-white" href="/">
                <img class="img-fluid text-white"
                     src="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}"
                     alt="logo">
            <!-- <span class="h5">{{getSettingValue('company_name')}}</span> -->
            </a>
            <div class="navbar-collapse collapse justify-content-start">
                <ul class="nav navbar-nav">
                    <li class="nav-item  {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about-us') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('services') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Services</a>
                    </li>
                    <li class="nav-item {{ Request::is('our_team') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('our_team') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Our Team</a>
                    </li>
                    <li class="nav-item {{ Request::is('achievements') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('achievements') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Achievements</a>
                    </li>
                     <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contact-us') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Contact Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('job') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('job') }}" id="navbarDropdown" role="" data-toggle=""
                           aria-haspopup="true" aria-expanded="false">Jobs</a>
                    </li>
                    @guest
                        @if (Route::has('register'))

                        @endif
                    @else
                        {{--<li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- {{ Auth::user()->name }} -->
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>--}}
                    @endguest
                </ul>
            </div>
            <div class="social-icons-mobile">
                <a href="https://www.facebook.com/saifmanpoweroffical/" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/facebook-icon.png')}}" alt=""></a>
                <a href="https://wa.me/+923314852221" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/whatsapp-icon.jpg')}}" alt=""></a>
                <a href="https://www.youtube.com/channel/UCd7TVnWdLi2atk2Z64dh9Bg" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/youtube-icon.png')}}" alt=""></a>
                <a href="https://twitter.com/ServicesSaif" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/twitter-icon.png')}}" alt=""></a>
               <br/>
                <a class="btn btn-primary btn-md blink" style="margin-top: 61px;margin-left: -13px;" href="{{ url('current-jobs') }}"> {{--<i class="fas fa-plus-circle"></i>--}}Current Jobs</a>
            </div>
            <div class="add-listing">
                <div class="social-icons">
                    <a href="https://www.facebook.com/saifmanpoweroffical/" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/facebook-icon.png')}}" alt=""></a>
                    <a href="https://wa.me/+923314852221" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/whatsapp-icon.jpg')}}" alt=""></a>
                    <a href="https://www.youtube.com/channel/UCd7TVnWdLi2atk2Z64dh9Bg" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/youtube-icon.png')}}" alt=""></a>
                    <a href="https://twitter.com/ServicesSaif" target="_blank"><img width="30" height="30" src="{{ asset('back_end/images/twitter-icon.png')}}" alt=""></a>

                </div>
                {{--<a class="btn btn-white btn-md" href="{{ url('post-job') }}"> <i class="fas fa-plus-circle"></i>Post a
                    job</a>--}}
                <a class="btn btn-primary btn-md blink" href="{{ url('current-jobs') }}"> {{--<i class="fas fa-plus-circle"></i>--}}Current Jobs</a>
                {{--<a class="btn btn-white btn-md blink" href="{{ url('current-jobs') }}"> --}}{{--<i class="fas fa-plus-circle"></i>--}}{{--Current Jobs</a>--}}

            </div>

        </div>
    </nav>
    @if(Request::is('/'))
    <div class="row">
        <div class="col-12">
            <marquee behavior="" onmouseover="this.stop();"
                     onmouseout="this.start();" scrollamount="10" direction="left" class="custom-marquee pt-2">
                <img class="marquee_logo" width="80" height="50"
                     src="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}"
                     alt="logo">  Saif Man  Power Services Pakistan, The Leading Man Power Exporter of Pakistan.
            </marquee>
        </div>
    </div>
    @endif
</header>
<!--=================================
Header -->


