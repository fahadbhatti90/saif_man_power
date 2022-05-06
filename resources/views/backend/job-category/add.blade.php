@extends('backend.layouts.app')
@section('title', 'Add Job-Category')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Job Category</h4>
                            <p class="mb-0">Add Job-Category</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Job Category</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Job Category</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Job-Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{ route('store-jobcategory') }}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="title">Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}" required>
                                                        @if ($errors->has('title'))
										                    <span class="text-danger">{{ $errors->first('title') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="image">Image (optional)<span
                                                            class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="positions">Positions
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="number" class="form-control" id="positions" name="positions" placeholder="Enter positions" value="{{ old('positions') }}" required>
                                                        @if ($errors->has('positions'))
                                                            <span class="text-danger">{{ $errors->first('positions') }}</span>
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