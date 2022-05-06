@extends('frontend.layouts.app')
@section('title', 'Job List')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Current Jobs</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>Current Jobs</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--=================================
inner banner -->
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            @include('backend.message')
            @if($errors->has('cv'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $errors->first('cv') }}
            </div>
            @endif
        </div>
    </div>
</div>
<!--=================================
job-list -->
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
<section class="space-ptb">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <!--=================================
                right-sidebar -->


                <div class="row">
                    @foreach($jobsResult as $job)
                    <div class="col-12">
                        <div class="job-list ">
                            <div class="job-list-logo">
                                <img class="img-fluid" src="{{ asset('storage/images/' . $job->file) }}" alt="">
                            </div>
                            <div class="job-list-details">
                                <div class="job-list-info">
                                    <div class="job-list-title">
                                        <h5 class="mb-0"><a href="{{ route('show-job-details', $job->id) }}">{{ $job->title }}</a></h5>
                                    </div>
                                    <div class="job-list-option">
                                        <ul class="list-unstyled">
                                            <li> <span>via</span> <a href="#">{{ $job->company_name }}</a> </li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>{{ $job->address }}</li>
                                            <li><i class="fas fa-filter pr-1"></i>{{ $job->jobCategoryDetails->title }}</li>
                                            <li><a class="freelance" href="#"><i class="fas fa-suitcase pr-1"></i>{{ $job->job_type }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list-favourite-time">
                                <a class="btn btn-light mb-2 btn-sm" href="{{ route('show-job-details', $job->id) }}">View </a>
                                <button type="button" class="btn btn-secondary mb-2 btn-sm jobDetails" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$job->id}}" data-title="{{$job->title}}">Apply</button>
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
job-list -->

<!--=================================
feature -->
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
                    <a class="ml-auto align-self-center" href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
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
feature -->


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
