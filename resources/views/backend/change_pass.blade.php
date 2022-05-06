@extends('backend.layouts.app')
@section('title', 'Change Password')
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
                            <p class="mb-0">Change Password</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Password</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{url('change-password/'.$userID)}}" method="post">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="oldpassword"> Old Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                                                        @if ($errors->has('oldpassword'))
                                                            <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="newpassword"> New Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                                                        @if ($errors->has('newpassword'))
                                                            <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-lg-4 col-form-label" for="password_confirmation"> Confirm Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                        @if ($errors->has('newpassword'))
                                                            <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-10 mr-5 mt-3">
                                                        <button type="submit" name="submit" class="btn btn-primary float-right">
                                                            Submit
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