@extends('backend.layouts.app')
@section('title', 'Add User')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Users</h4>
                            <p class="mb-0">Add User</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add User</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{ route('store-user') }}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="name">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                                                        @if ($errors->has('name'))
										                    <span class="text-danger">{{ $errors->first('name') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="val-email">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="email" class="form-control" id="val-email" name="email" placeholder="Your valid email.." value="{{ old('email') }}" required>
                                                        @if ($errors->has('email'))
										                    <span class="text-danger">{{ $errors->first('email') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="password">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." required>
                                                        @if ($errors->has('password'))
										                    <span class="text-danger">{{ $errors->first('password') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="password">Confirm Password <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="confirm password" required>
                                                        @if ($errors->has('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="usertype">Usertype
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" id="usertype" name="usertype" required>
                                                            <option value="">Please select</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="-">Normal User</option>
                                                        </select>
                                                        @if ($errors->has('usertype'))
										                    <span class="text-danger">{{ $errors->first('usertype') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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