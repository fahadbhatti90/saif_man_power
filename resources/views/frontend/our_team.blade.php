@extends('frontend.layouts.app')
@section('title', 'Our Team')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Our Team</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Our Team</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
candidate post-box list -->
<section class="space-ptb">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">


        <div class="row">
            @foreach($team as $row)
          <div class="col-md-4 mb-3">
            <div class="candidate-list candidate-grid">
              <div class="candidate-list-image">
                <img class="img-fluid" src="{{ asset('storage/images/' . $row->image) }}" alt="" >
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h3 ><a  class="our_team_employee_name" href="#">{{ $row->name }}</a></h3>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li class="our_team_employee_designation"><i class="fas fa-filter pr-1"></i>{{ $row->designation }}</li>
                    </ul>
                  </div>
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
candidate post-box list -->

@endsection
