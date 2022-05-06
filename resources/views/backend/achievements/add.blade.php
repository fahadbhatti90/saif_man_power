@extends('backend.layouts.app')
@section('title', 'Add Achievement')
@section('mycontents')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Achievements</h4>
                        <p class="mb-0">Add Achievement</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Achievements</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Achievement</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Achievement</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                @include('backend.message')
                                <form class="form-valide" action="{{ route('store-achievements') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="title">Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           placeholder="Enter title" value="{{ old('title') }}"
                                                           required>
                                                    @if ($errors->has('title'))
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="image">Image <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="image" name="image"
                                                           value="{{ old('image') }}" required>
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="image">Type <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input checked type="radio" id="achievement_type" name="achievement_type"
                                                           value="Certificate" required> Certificate
                                                    <input type="radio" id="achievement_type" name="achievement_type"
                                                           value="Awards" required> Awards
                                                    <input type="radio" id="achievement_type" name="achievement_type"
                                                           value="Awards Picture" required> Awards Picture
                                                    <input type="radio" id="achievement_type" name="achievement_type"
                                                           value="Other Picture" required> Other Picture
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
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
