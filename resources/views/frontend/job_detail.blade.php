@extends('frontend.layouts.app')
@section('title', 'Job Detail')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Job Details</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>  Job Details</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->


<!--=================================
job list -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12">
            @include('backend.message')
            @if($errors->has('cv'))
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $errors->first('cv') }}
              </div>
            @endif
            <div class="job-list border">
              <div class=" job-list-logo">
                <img class="img-fluid" src="{{ asset('storage/images/' . $job->file) }}" alt="">
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0">{{ $job->title }}</h5>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-home fa-flip-horizontal fa-fw"></i> {{ $job->company_name }}</li>
                      <li class="pl-2"><i class="fas fa-map-marker-alt"></i><span class="pl-1">{{ $job->address }}</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-list-favourite-time">
                <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="job-list-time order-1"><i class="far fa-clock pr-1"></i>{{  $job->created_at->diffForHumans() }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="border p-4 mt-4 mt-lg-5">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-debit-card"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Offered Salary</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->currency_id }} {{ $job->min }} - {{ $job->currency_id }} {{ $job->max }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-love"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Gender</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->gender }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-bar-chart"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Career Level</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->career_level }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-apartment"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Industry</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->jobCategoryDetails->title }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-medal"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Experience</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->experience }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-mortarboard"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Qualification</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">{{ $job->qualification }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-4 my-lg-5">
          <h5 class="mb-3 mb-md-4">Job Description</h5>
          <p>{!! $job->description !!}</p>
        </div>
      </div>
      <!--=================================
      sidebar -->
	  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><span id="title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('store-jobapply') }}" novalidate>
          @csrf
          <input type="hidden" name="job_id" id="job_id" value="">
          <!-- <input type="hidden" name=""> -->
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" required>
            <div class="invalid-feedback">
              Please provide a valid name.
            </div>
            @if($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" required>
            <div class="invalid-feedback">
              Please provide a valid email.
            </div>
            @if($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="contact" class="col-form-label">Contact:</label>
            <input type="number" class="form-control" value="{{ old('contact') }}" id="contact" name="contact" required>
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
        @php
            $currentDate = date('Y-m-d');
            $deadline = $job->app_deadline;
            if ($deadline >= $currentDate){
                $apply = 1;
            }else{
                $apply = 0;
            }
        @endphp
      <div class="col-lg-4">
        <div class="sidebar mb-0">
            @if($apply == 1)
          <div class="widget">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-block jobDetails" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$job->id}}" data-title="{{$job->title}}"><i class="far fa-paper-plane"></i>Apply for Job</button>
          </div>
            @endif

          <div class="widget">
            <div class="company-address widget-box">
              <ul class="list-unstyled mt-3">
                <li><a href="tel:+905389635487"><i class="fas fa-home fa-flip-horizontal fa-fw"></i><span class="pl-2">{{ $job->company_name }}</span></a></li>
                <li><a href="#"><i class="fas fa-map-marker-alt fa-fw"></i><span class="pl-2">{{ $job->address }}</span></a></li>
                <li><a href="mailto:ali.potenza@job.com"><i class="fas fa-envelope fa-fw"></i><span class="pl-2">{{ $job->email }}</span></a></li>
              </ul>
            </div>
          </div>
          <div class="widget">
            <div class="jobber-company-view">
              <ul class="list-unstyled">
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-clock fa-2x fa-fw text-primary"></i>
                      <span class="pl-3">{{ $job->app_deadline }}</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-personal-profile fa-2x fa-fw text-primary"></i>
                      <span class="pl-3">{{ $jobapply->count() }} Applications</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--=================================
      sidebar -->
    </div>
  </div>
</section>
<!--=================================
job list -->


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

@endsection
