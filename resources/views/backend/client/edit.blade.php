@extends('backend.layouts.app')
@section('title', 'Edit Client')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Clients</h4>
                            <p class="mb-0">Edit Client</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Client</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Client</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Client</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                	@include('backend.message')
                                    <form class="form-valide" action="{{ route('update-client', $client->id) }}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="title">Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $client->title }}" required>
                                                        @if ($errors->has('title'))
										                    <span class="text-danger">{{ $errors->first('title') }}</span>
										                @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="country">Country
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="{{ $client->country }}" required>
                                                        @if ($errors->has('country'))
                                                            <span class="text-danger">{{ $errors->first('country') }}</span>
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
                                                <div class="form-group">
                                                    <img src="{{ asset('storage/images/' . $client->image) }}" height="200" width="200" alt="" />
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
