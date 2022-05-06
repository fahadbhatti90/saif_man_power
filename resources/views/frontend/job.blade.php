@extends('frontend.layouts.app')
@section('title', 'Jobs')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Jobs</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>Jobs</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
category -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 section-title-02">
        <h2 class="text-center">Job Categories</h2>
      </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
      <div class="category-style text-center">
        @foreach($jobcategories as $jobcategory)
        <a href="{{ route('show-job-category-details', $jobcategory->id) }}" class="category-item">
          <div class="category-icon mb-4">
            <i class="flaticon-account"></i>
          </div>
          <h6>{{ $jobcategory->title }}</h6>
          <span class="mb-0">{{ $jobcategory->positions }} Open Positions</span>
        </a>
        @endforeach
      </div>
    </div>
  </div>


  </div>
</section>
<!--=================================
category -->

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
          <a class="ml-auto align-self-center" href="job">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
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
          <a class="ml-auto align-self-center" href="post-job">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
    </div>
  </div>
</section>--}}
<!--=================================
feature info section -->

@endsection
