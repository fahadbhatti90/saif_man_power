@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">About Us</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> About us </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
Millions of jobs -->
<section class="space-ptb" style="background-image: url(front_end/images/google-map.png); background-position: center center; background-repeat: no-repeat;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        {{--<h2 class="mb-4">Millions of jobs, finds the one that's right for you</h2>--}}
         <h2 class="mb-4 text-center">SAIF MAN POWER SERVICES PAKISTAN OVERSEAS EMPLOYMENT PROMOTERS LICENCE NO. MPD/3024/RWP</h2>
      </div>
      <div class="col-lg-10 text_style_custom" style="text-align: justify;">
        <div>
          {{--<p class="mb-lg-5 mb-4 lead">We also know those epic stories, those modern-day legends surrounding the early failures of such supremely successful folks as Michael Jordan and Bill Gates. We can look a bit further back in time to Albert Einstein or even further back to Abraham Lincoln.</p>--}}
            <p class="mb-lg-3 mb-2 lead">We have the pleasure to take an opportunity to introduce ourself as one of the leading Manpower (All Categories) Exporter of Pakistan.
            </p>
            <p class="mb-lg-3 mb-2 lead ">
                We are actively engaged in the personnel placement
            services since 1999. We enjoy a great reputation for selecting really capable and excellent workers
                through very strict and standard tests keeping in view the requirements of our prospective
                principals and employers. We also keep an up to date data of personnel available for employment.
                 We have elaborated arrangements for the testing of all kinds of tradesmen both in-door as well as at sites
                where practical work is in progress.
            </p>
            <p class="mb-lg-3 mb-2 lead">
                We guarantee the quality of workers recruited by us in writing and incase of any dispute or dissatisfaction for
                any recruited worker, we assure his repatriation/replacement at our own expense within probationary period
                of 90 days.We are capable of meeting any demand of supplying manpower within the record period of 30 days with
                our efficient management.
                We believe in serving our clients in a manner that they come to us again, and this is the only SECRETE
                 OF OUR SUCCESS. Moreover, it is only due to our most efficient and round the clock work
                because we maintain the Moto "WWE ALWAYS SUCCEED"."PERSONNEL PLACEMENT" is our business.
            </p>
            <p class="mb-lg-3 mb-2 lead">May we get competent, reliable, hardworking,loyal and disciplined workers
            for you Organization.
            </p>
            <p class="mb-lg-3 mb-2 lead text-center">
                AZHAR-UL-ISLAM
            </p>
            <p class="mb-lg-3 mb-2 lead text-center">
                (Managing Director)
            </p>
          <img class="img-fluid mt-lg-4 mt-3" src="front_end/images/about/about-img1.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Millions of jobs -->



<!--=================================
counter -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="bg-dark py-5">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="counter mb-5 mb-lg-0 justify-content-center">
                <div class="counter-icon">
                  <i class="flaticon-curriculum"></i>
                </div>
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="{{ $jobs->count() }}" data-speed="10">{{ $jobs->count() }}</span>
                  <label class="mb-0 text-white">Jobs Posted</label>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter mb-5 mb-lg-0 justify-content-center">
                <div class="counter-icon">
                  <i class="flaticon-resume"></i>
                </div>
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="{{ $jobapply->count() }}" data-speed="10">{{ $jobapply->count() }}</span>
                  <label class="mb-0 text-white">Jobs Filled</label>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter mb-5 mb-sm-0 justify-content-center">
                <div class="counter-icon">
                  <i class="flaticon-users"></i>
                </div>
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="{{ $recruiterjobs->count() }}" data-speed="10">{{ $recruiterjobs->count() }}</span>
                  <label class="mb-0 text-white">Recruiters</label>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter justify-content-center">
                <div class="counter-icon">
                  <i class="fa fa-list-alt"></i>
                </div>
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="{{ $jobcategory->count() }}" data-speed="10">{{ $jobcategory->count() }}</span>
                  <label class="mb-0 text-white">Job Categoires</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
counter -->



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
          <a class="ml-auto align-self-center" href="{{ url('job') }}">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
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
          <a class="ml-auto align-self-center" href="{{ url('post-job') }}">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
    </div>
  </div>
</section>--}}
<!--=================================
feature info section -->

@endsection
