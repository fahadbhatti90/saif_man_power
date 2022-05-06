@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('mycontents')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Contact Us</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contact us </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
feature-info -->
<section class="space-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-02 text-center">
                    <h2>Let’s Get In Touch!</h2>
                    <p>We have completed over a 1000+ projects for five hundred clients. Give us your next project.</p>
                </div>
            </div>
        </div>
        @include('backend.message')
        <form method="POST" class="needs-validation" action="{{ route('store-contactus') }}" enctype="multipart/form-data" novalidate>
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" name="name" class="form-control" id="Username" placeholder="Enter Your Name" value="{{ old('name') }}" required>
              <div class="invalid-feedback">
                Please provide a valid name.
              </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="subject" class="form-control" id="email" placeholder="Subject" value="{{ old('subject') }}" required>
              <div class="invalid-feedback">
                Please provide a valid subject.
              </div>
                @if ($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email Address" value="{{ old('email') }}" required>
              <div class="invalid-feedback">
                Please provide a valid email.
              </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
              <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number" value="{{ old('phone') }}" required>
              <div class="invalid-feedback">
                Please provide a valid phone number.
              </div>
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="form-group col-12 mb-0">
              <textarea rows="5" name="message" class="form-control" id="message" placeholder="message" value="{{ old('message') }}" required></textarea>
              <div class="invalid-feedback">
                Please provide a valid message.
              </div>
                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif

            </div>
            <div class="col-12 text-center mt-4">
              <button class="btn btn-primary" type="submit">Send your message</button>
            </div>
          </div>
        </form>
    </div>
</section>
<!--=================================
feature-info -->

<!--=================================
Let’s Get In Touch -->
<section class="space-ptb pt-0">

  
  
  
  <div class="container">
    <div class="row">
      @foreach($settings as $setting)
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-placeholder"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Address</h5>
            <span class="d-block">{{ $setting->address }}</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-contact fa-flip-horizontal"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Phone Number</h5>
            <span class="d-block">{{ $setting->phone_no }}</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-approval"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Email</h5>
            <span class="d-block">{{ $setting->company_email }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!--=================================
Let’s Get In Touch -->

@endsection