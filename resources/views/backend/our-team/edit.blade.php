@extends('backend.layouts.app')
@section('title', 'Edit Team Member')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Our Team</h4>
                            <p class="mb-0">Edit Team Member</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Our Team</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Team Member</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Team Member</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{ route('update-ourteam', $ourteam->id) }}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="name">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $ourteam->name }}" required>
                                                        @if ($errors->has('name'))
										                    <span class="text-danger">{{ $errors->first('name') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="designation">Designation
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation" value="{{ $ourteam->designation }}" required>
                                                        @if ($errors->has('designation'))
                                                            <span class="text-danger">{{ $errors->first('designation') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="image">Image <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="file" class="form-control" id="image" name="image">
                                                        @if ($errors->has('image'))
                                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <img src="{{ asset('storage/images/' . $ourteam->image) }}" height="200" width="200" alt="" />
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