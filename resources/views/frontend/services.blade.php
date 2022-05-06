@extends('frontend.layouts.app')
@section('title', 'Services')
@section('mycontents')
    <!--=================================
inner banner -->
    <div class="header-inner bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Services</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Home </a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-chevron-right"></i> <span> Services</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
    inner banner -->

    <!--=================================
    Services we offer -->
    <section class="space-ptb">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mb-3 text_style_custom">
                        <h2>Services we offer</h2>
                        <span class="lead">We truly care about our users and our product. We are dedicated to providing you with the best experience possible.</span>
                    </div>


                    <div class="p-4 bg-dark mt-4">
                        <div class="row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="counter mb-3 mb-sm-0 justify-content-center">
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ $jobs->count() }}"
                                              data-speed="10">{{ $jobs->count() }}</span>
                                        <label class="mb-0 text-white">Jobs Posted</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="counter mb-3 mb-sm-0 justify-content-center">
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ $jobapply->count() }}"
                                              data-speed="10">{{ $jobapply->count() }}</span>
                                        <label class="mb-0 text-white">Jobs Filled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter mb-0 justify-content-center">
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="{{ $recruiterjobs->count() }}"
                                              data-speed="10">{{ $recruiterjobs->count() }}</span>
                                        <label class="mb-0 text-white">Recruiters</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img class="img-fluid w-100" src="front_end/images/about/about-03.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="container mb-5 text_style_custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-3">
                        <h2>Available Hospital Staff</h2>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">
                                <li>Doctors All Categories ( Consultants, Specialist, GPs)</li>
                                <li>Staff Nurses (Nurses, Head Nurses, Nursing Supervisors)</li>
                                <li>Medical/Lab Technicians (All Categories)</li>
                                <li>IT Managers</li>
                                <li>Software,Hardware and Network Engineers</li>
                                <li>System Analyst</li>
                                <li>Admin Managers</li>
                                <li>Finance Managers</li>
                                <li>Senior/Junior Accountants</li>
                                <li>Accounts Auditors</li>
                                <li>Secretaries/Admin Assistant</li>
                                <li>Pharmacists</li>
                                <li>Maintenance Managers</li>


                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">

                                <li>Telephone Operators</li>
                                <li>Telecom Technicians</li>
                                <li>HVAC Foremen</li>
                                <li>Food Supervisor</li>
                                <li>Heavy Bus Drivers</li>
                                <li>LTV Drivers</li>
                                <li>Fishing Carpenters</li>
                                <li>Plumbers</li>
                                <li>Electricians</li>
                                <li>General Workers</li>
                                <li>Painters</li>
                                <li>Cooks</li>
                                <li>Bio Medical Engineers</li>
                                <li>Bio Medical Technicians</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">

                                <li>Housekeepers</li>
                                <li>HVAC Technicians</li>
                                <li>Time Keepers</li>
                                <li>Store Keepers</li>
                                <li>Laundry Supervisors</li>
                                <li>Tailors</li>
                                <li>Waiters</li>
                                <li>Computer Operators</li>
                                <li>Bakers</li>
                                <li>Water Treatment Technicians</li>
                                <li>Data Entry Operators/Supervisors</li>
                                <li>Hair Dresser</li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container mb-5 text_style_custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-3">
                        <h2>Available Building, Road & Pipe Line Construction Staff</h2>
                     </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">
                                <li>Project Managers (Civil, Electrical, Mechanical)</li>
                                <li>Planning Engineers</li>
                                <li>Electrical Engineers</li>
                                <li>Site Engineers (All Categories)</li>
                                <li>Estimate Engineers</li>
                                <li>Telecom Engineers</li>
                                <li>Architects</li>
                                <li>IT Managers</li>
                                <li>Software, Hardware and Network Engineers</li>
                                <li>System Analyst</li>
                                <li>Marketing Managerial and Related Staff</li>
                                <li>Admin Managers</li>
                                <li>Finance Managers</li>
                                <li>Senior/ Junior Accountants</li>
                                <li>Accounts Auditors</li>
                                <li>Quantity Surveyors</li>
                                <li>Land Surveyors</li>
                                <li>Civil Surveyors</li>
                                <li>Auto Cads (Civil, Electrical & Mechanical)</li>
                                <li>Secretaries</li>
                                <li>Computer Operators</li>
                                <li>Camp Bosses</li>
                                <li>Time Keepers</li>
                                <li>Store Keepers</li>

                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">
                                <li>Telecom Technicians</li>
                                <li>Civil Foremen/ Supervisors</li>
                                <li>Mechanical Foremen/ Supervisors</li>
                                <li>Electrical Foremen/ Supervisors</li>
                                <li>Fishing Foremen/ Supervisors</li>
                                <li>Excavation Foremen</li>
                                <li>HVAC Foremen</li>
                                <li>Instruments Supervisors</li>
                                <li>Crush Plant Operators</li>
                                <li>Asphalt Plant Operators</li>
                                <li>Tower Crane Operators</li>
                                <li>Mobile Crane Operators</li>
                                <li>Dozer Operators</li>
                                <li>Grader Operator</li>
                                <li>Shovel Operators</li>
                                <li>Excavators Operators</li>
                                <li>Roller Operators</li>
                                <li>Pump Operators</li>
                                <li>Heavy Duty Drivers</li>
                                <li>LTV Drivers</li>
                                <li>Heavy Duty Equipment Mechanics</li>
                                <li>Auto Electrician Light/Heavy Equipment</li>
                                <li>Masons ( Block, Plasterer, Tile)</li>
                                <li>Shuttering Carpenters</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul class="pl-3 mb-0 list-style-2">
                                <li>Fishing Carpenters</li>
                                <li>Steel Fixer</li>
                                <li>Steel Erectors</li>
                                <li>Plumbers</li>
                                <li>Electricians</li>
                                <li>HVAC Technicians</li>
                                <li>Welders/ X-Ray Welders(3G, 6G, Argon, SMAW, GTAW)</li>
                                <li>Pipe Fabricators</li>
                                <li>Scuff Folders</li>
                                <li>Duct Fabricators</li>
                                <li>Scuff Folders</li>
                                <li>Duct Fitters</li>
                                <li>Pipe Fitters</li>
                                <li>Machinists</li>
                                <li>Painters</li>
                                <li>Security Guards</li>
                                <li>Facility Guards</li>
                                <li>Facility Workers</li>
                                <li>Helper/Labors</li>
                                <li>Cooks</li>
                                <li>Warehouse Keepers</li>
                                <li>Riggers</li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--=================================
    Services we offer -->



    <!--=================================
    feature info section -->
    {{--<section class="feature-info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="feature-info feature-info-02 p-4 p-lg-5 bg-primary">
                        <div class="feature-info-icon mb-3 mb-sm-0 text-dark">
                            <i class="flaticon-team"></i>
                        </div>
                        <div class="feature-info-content text-white pl-sm-4 pl-0">
                            <p>Jobseeker</p>
                            <h5 class="text-white">Looking For Job?</h5>
                        </div>
                        <a class="ml-auto align-self-center" href="{{ url('job') }}">Apply now<i
                                class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
                        <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
                            <i class="flaticon-job-3"></i>
                        </div>
                        <div class="feature-info-content text-white pl-sm-4 pl-0">
                            <p>Recruiter</p>
                            <h5 class="text-white">Are You Recruiting?</h5>
                        </div>
                        <a class="ml-auto align-self-center" href="{{ url('post-job') }}">Post a job<i
                                class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!--=================================
    feature info section -->

@endsection
