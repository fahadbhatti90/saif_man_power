@extends('frontend.layouts.app')
@section('title', 'Achievements')
@section('mycontents')

    <style>
        .btn:focus,
        .btn:active,
        button:focus,
        button:active {
            outline: none !important;
            box-shadow: none !important;
        }

        #image-gallery .modal-footer {
            display: block;
        }

        .thumb {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .thumbnail-title {
            font: 1.2em sans-serif;
        }
    </style>

    <!--=================================
    inner banner -->
    <div class="header-inner bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Achievements</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Home </a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-chevron-right"></i>
                            <span> Achievements</span></li>
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
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">Awards</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($achievements as $achievement)
                            @if($achievement->achievement_type == 'Awards')
                                <div class="col-lg-3 col-md-4 col-xs-6 col-sm-6 thumb">
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                       data-title="{{ $achievement->title }}"
                                       data-image="{{ asset('storage/images/' . $achievement->image) }}"
                                       data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ asset('storage/images/' . $achievement->image) }}"
                                             alt="">
                                        <div class="text-center">
                                            <span class="thumbnail-title custome_font_style">{{ $achievement->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">Certificate</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($achievements as $achievement)
                            @if($achievement->achievement_type == 'Certificate')
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                       data-title="{{ $achievement->title }}"
                                       data-image="{{ asset('storage/images/' . $achievement->image) }}"
                                       data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ asset('storage/images/' . $achievement->image) }}"
                                             alt="">
                                        <div class="text-center ">
                                            <span class="thumbnail-title custome_font_style">{{ $achievement->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="section-title center">
                        <h2 class="title">Awards Picture</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($achievements as $achievement)
                            @if($achievement->achievement_type == 'Awards Picture')
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                       data-title="{{ $achievement->title }}"
                                       data-image="{{ asset('storage/images/' . $achievement->image) }}"
                                       data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ asset('storage/images/' . $achievement->image) }}"
                                             alt="">
                                        <div class="text-center">
                                            <span class="thumbnail-title custome_font_style">{{ $achievement->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
  candidate post-box list -->








    {{--          <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
    {{--            <div class="modal-dialog modal-dialog-centered modal-lg">--}}
    {{--              <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                  --}}
    {{--                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span--}}
    {{--                      class="sr-only">Close</span>--}}
    {{--                  </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                  <img id="image-gallery-image" class="img-responsive col-md-12" src="">--}}
    {{--                </div>--}}
    {{--				<div><h4 class="modal-title text-center" style="text-align: center;" id="image-gallery-title"></h4></div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                  <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i--}}
    {{--                      class="fa fa-arrow-left"></i>--}}
    {{--                  </button>--}}

    {{--                  <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i--}}
    {{--                      class="fa fa-arrow-right"></i>--}}
    {{--                  </button>--}}
    {{--                </div>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--          </div>--}}

@endsection
