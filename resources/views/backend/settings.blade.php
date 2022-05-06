@extends('backend.layouts.app')
@section('title', 'Settings')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Settings</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" enctype="multipart/form-data" action="{{route('update-setting') }}" method="post">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{getSettingValue('id')}}">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="company_name"> Company Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="company_name"
                                                               name="company_name" placeholder="Enter a company name.."
                                                               value="{{ old('company_name') ?? getSettingValue('company_name')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="company_email"> Company
                                                        Email
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="company_email"
                                                               name="company_email" placeholder="Enter a company email.."
                                                               value="{{ old('company_email') ?? getSettingValue('company_email')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="phone_no"> Phone No
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="phone_no"
                                                               name="phone_no" placeholder="Enter a phone_no.."
                                                               value="{{ old('phone_no') ?? getSettingValue('phone_no')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="address"> Address
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="address" name="address"
                                                               placeholder="Enter a address.."
                                                               value="{{ old('address') ?? getSettingValue('address')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="logo"> Logo
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                       name="logo" id="logo"  >
                                                                <label class="custom-file-label">Choose logo file</label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                 </div>

                                                <div class="col-md-10 text-center">
                                                    <div class="header-logo-preview p-2 col-md-10 offset-2">
                                                        <img src="{{ settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png') }}" class="" width="200px" height="150px">
                                                        <input type="hidden" name="logo" value="{{getSettingValue('logo')}}">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-10 mt-3 text-right">
                                                        <button type="submit" name="submit" class="btn btn-primary">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection