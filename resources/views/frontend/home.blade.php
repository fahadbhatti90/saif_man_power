@extends('frontend.layouts.app')
@section('title', 'Home')
@section('mycontents')
    <!--=================================
Banner -->

    <!-- Modal -->
    <div class="modal fade" id="newJobsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Latest Jobs</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($jobs as $job)
                        <div class="col-lg-12 mb-4 mb-sm-0">
                            <div class="job-list">
                                <div class="job-list-logo">
                                    <img class="img-fluid" src="{{ asset('storage/images/' . $job->file) }}" alt="">
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a
                                                    href="{{ route('show-job-details', $job->id) }}">{{ $job->title }}</a>
                                            </h5>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a style="color: #ff8a00;">{{ $job->company_name }}</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pr-1"></i>{{ $job->address }}</li>
                                                <li>
                                                    <i class="fas fa-filter pr-1"></i>{{ $job->jobCategoryDetails->title }}
                                                </li>
                                                <li><a class="freelance" href="#"><i
                                                            class="fas fa-suitcase pr-1"></i>{{ $job->job_type }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <h6><span class="badge badge-primary blink">New</span></h6>
                                    <a class="btn btn-light mb-2 btn-sm"
                                       href="{{ route('show-job-details', $job->id) }}">View </a>
                                    <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-secondary mb-2 btn-sm jobDetails" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$job->id}}" data-title="{{$job->title}}">Apply</button> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <section class="clearfix slider-banner">
        <div id="slider" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <?php $no = 1;
                foreach ($sliders as $slider) {
                ?>
                <div class="carousel-item <?= ($no == '1') ? 'active' : '' ?>">
                    <img class="img-fluid slider-img" src="{{ asset('storage/images/' . $slider->image) }}" alt="">
                    <div class="slider-content">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-7 justify-content-center text-center">
                                    <!-- <h2 class="text-white animated-08"><u>You deserve it</u></h2> -->
                                    <h1 class="text-white animated-08" style="color: #3e4095 !important;-webkit-text-stroke: 2px white;">{{ $slider->title }}</h1>
                                    <!-- <h6 class="mb-2 font-weight-normal text-white animated-08">This is perhaps the single biggest obstacle that all of us must overcome in order to be successful.</h6> -->
{{--                                    <div class="d-flex justify-content-center">--}}
{{--                                        <a href="#" class="btn btn-link animated-08">View more <i--}}
{{--                                                class="fas fa-arrow-right pl-2"></i></a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $no++; }  ?>
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--=================================
    Banner -->

    <!--=================================
    Category-style -->
    {{--<section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-category ">
                        <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="false"
                             data-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xx-items="1"
                             data-space="0" data-autoheight="true">
                            @foreach($jobcategories as $jobcategory)
                                <div class="item">
                                    <div class="category-style bg-white text-center">
                                        <a href="{{ route('show-job-category-details', $jobcategory->id) }}"
                                           class="category-item">
                                            <div class="category-icon mb-4">
                                                <i class="flaticon-account"></i>
                                            </div>
                                            <h6>{{ $jobcategory->title }}</h6>
                                            <span class="mb-0">{{ $jobcategory->positions }} Open Positions</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!--=================================
    Category-style -->




    <!--=================================
    Feature box -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><span id="title"></span></h5>
                    <button type="button" class="close font-lg" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="needs-validation" enctype="multipart/form-data"
                          action="{{ route('store-jobapply') }}" novalidate>
                        @csrf
                        <input type="hidden" name="job_id" id="job_id" value="">
                        <!-- <input type="hidden" name=""> -->
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contact" class="col-form-label">Contact:</label>
                            <input type="number" class="form-control" value="{{ old('contact') }}" id="contact"
                                   name="contact" required>
                            <div class="invalid-feedback">
                                Please provide a valid contact No.
                            </div>
                            @if($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">Upload CV:</label>
                            <input type="file" class="form-control" id="cv" name="cv" required>
                            <div class="invalid-feedback">
                                Please provide a valid cv.
                                CV should not be greater than 2 MBs.
                            </div>
                            @if($errors->has('cv'))
                                <span class="text-danger">{{ $errors->first('cv') }}</span>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--=================================
    Top Companies -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title center">
                        <h2 class="title">Top Clients</h2>
                        <p>Data trends and insights, tips for employers, product updates and best practices</p>
                    </div>
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true"
                         data-items="4" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1"
                         data-space="15" data-autoheight="false">
                        @foreach($clients as $client)
                            <div class="item">
                                <div class="employers-grid mb-4 mb-lg-0">
                                    <div class="employers-list-logo">
                                        <img class="employers-list-image img-fluid" src="{{ asset('storage/images/' . $client->image) }}"
                                             alt="">
                                    </div>
                                    <div class="employers-list-details">
                                        <div class="employers-list-info">
                                            <div class="employers-list-title">
                                                {{--<h5 class="mb-0"><a title="{{ $client->title }}" href="employer-detail.html">{{ substr($client->title, 0,  21)  }}</a>
                                                </h5>--}}
                                                <h5 title="{{$client->title }}" class="mb-0">{{ $client->title.' ( '.$client->country.')' }}
                                                </h5>
                                            </div>
                                            {{--                                    <div class="employers-list-option">--}}
                                            {{--                                        <ul class="list-unstyled">--}}
                                            {{--                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>--}}
                                            {{--                                        </ul>--}}
                                            {{--                                    </div>--}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Top Companies -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('backend.message')
                    @if($errors->has('cv'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $errors->first('cv') }}
                        </div>
                    @endif
                    <div class="browse-job d-flex">
                        <h3 class="mb-4 mb-md-3">Latest Jobs </h3>
                        <div class="justify-content-center flex-fill">

                        </div>
                        <div class="job-found mb-4 mb-md-3">
                            <span class="badge badge-lg badge-primary">{{ $jobscount->count() }}</span>
                            <h6 class="ml-3 mb-0">Jobs Found</h6>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="Jobs" role="tabpanel" aria-labelledby="Jobs-tab">
                            <div class="row">
                                @foreach($jobs as $job)
                                    <div class="col-lg-12 mb-4 mb-sm-0">
                                        <div class="job-list">
                                            <div class="job-list-logo">
                                                <img class="img-fluid" src="{{ asset('storage/images/' . $job->file) }}"
                                                     alt="">
                                            </div>
                                            <div class="job-list-details">
                                                <div class="job-list-info">
                                                    <div class="job-list-title">
                                                        <h5 class="mb-0"><a
                                                                href="{{ route('show-job-details', $job->id) }}">{{ $job->title }}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="job-list-option">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span>via</span>
                                                                <a style="color: #ff8a00;">{{ $job->company_name }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-map-marker-alt pr-1"></i>{{ $job->address }}
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-filter pr-1"></i>{{ $job->jobCategoryDetails->title }}
                                                            </li>
                                                            <li><a class="freelance" href="#"><i
                                                                        class="fas fa-suitcase pr-1"></i>{{ $job->job_type }}
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-list-favourite-time">
                                                <a class="btn btn-light mb-2 btn-sm"
                                                   href="{{ route('show-job-details', $job->id) }}">View </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-secondary mb-2 btn-sm jobDetails"
                                                        data-toggle="modal" data-target="#exampleModalCenter"
                                                        data-id="{{$job->id}}" data-title="{{$job->title}}">Apply
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-12 justify-content-center d-flex mt-4 mt-md-5">
                        <a class="btn btn-white btn-lg" href="job">View More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Feature box -->

    <!--=================================
    Browse listing  -->
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">How it works?</h2>
                        <p>The first thing to remember about success is that it is a process – nothing more,</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Advertise A Job</h5>
                            <p class="mb-0">Use a past defeat as a motivator. Remind yourself you have nowhere to go
                                except.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-profiles"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Recruiter Profiles</h5>
                            <p class="mb-0">Let success motivate you. Find a picture of what epitomizes success to you
                                have already.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-info feature-info-border p-xl-5 p-4 text-center">
                        <div class="feature-info-icon mb-3">
                            <i class="flaticon-job-3"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-black">Find Your dream job</h5>
                            <p class="mb-0">Make a list of your achievements toward your long-term goal and remind
                                your.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--=================================
    Browse listing -->


    <script>
        $('body').on("click", ".jobDetails", function (e) {
            e.preventDefault();
            $('#exampleModalLong').modal('show');
            var id = $(this).data('id');
            var title = $(this).data('title');

            $('input#job_id').val(id);
            $('#title').html(title);
        });
    </script>

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                    $('.modal .modal-dialog').attr('class', 'modal-dialog modal-dialog-centered modal-lg pulse animated');
                   // $("#newJobsModel").modal('show');
                },
                1500);

        });
    </script>

@endsection
