@extends('backend.layouts.app')
@section('title', 'Edit User')
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
                            <p class="mb-0">Edit User</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{ route('update-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="name">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $user->name }}" required>
                                                        @if ($errors->has('name'))
										                    <span class="text-danger">{{ $errors->first('name') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="email">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." value="{{ $user->email }}">
                                                        @if ($errors->has('email'))
										                    <span class="text-danger">{{ $errors->first('email') }}</span>
										                @endif
                                                    </div>
                                                </div> -->
                                                
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="usertype">Usertype
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" id="usertype" name="usertype" required value="{{ $user->usertype }}">
                                                            <option selected="">{{ $user->usertype }}</option>
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
                                                        <button type="submit" class="btn btn-primary">Update</button>
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