 @extends('backend.layouts.app')
@section('title', 'All Jobs')
@section('mycontents')

        <!--**********************************
            Content body start
        ***********************************-->

    <style>
        td{
            color: black;
        }

        .jobDetails{
            color: #2F4CDD;
        }

        .jobDetails:hover{
            text-decoration: underline;
        }
    </style>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Jobs</h4>
                            <span>All Jobs</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">All Jobs</a></li>
                        </ol>
                    </div>
                    @include('backend.message')
                </div>
                <!-- row -->
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                  Launch demo modal
                </button> -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Job Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="modal-body">
                            <div>
                                <label class="font-weight-bold">Job Title:</label>
                                <span id="title"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">company name:</label>
                                <span id="name"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">Address:</label>
                                <span id="address"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">application deadline:</label>
                                <span id="app_deadline"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">job category:</label>
                                <span id="job_sector"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">min:</label>
                                <span id="min"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">max:</label>
                                <span id="max"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">currency:</label>
                                <span id="currency"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">career level:</label>
                                <span id="career_level"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">experience:</label>
                                <span id="experience"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">gender:</label>
                                <span id="gender"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">job type:</label>
                                <span id="job_type"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">qualification:</label>
                                <span id="qualification"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">country:</label>
                                <span id="country"></span>
                            </div>
                            <div>
                                <label class="font-weight-bold">city:</label>
                                <span id="city"></span>
                            </div>
                            <!-- <div>
                                <label class="font-weight-bold">file:</label>
                                <span id="file"></span>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Jobs</h4>
                                <a href="{{( url('add-job') )}}">
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-plus pr-2"></span>Add Job</button>
                                </a>
                            </div>
                            <div class="card-body default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#admin"><i class="la la-user mr-2"></i> Admin Jobs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#recruiter"><i class="la la-users mr-2"></i> Recruiters Jobs</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                        <div class="tab-pane fade show active" id="admin" role="tabpanel">
                                            <div class="pt-4">

                                                <div class="row">
                                                <div class="col-12">
                                                    <div class="card">

                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="display custom-datatable" style="min-width: 845px">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Title</th>
                                                                            <th>Company Name</th>
                                                                            <th>Job Category</th>
                                                                            {{--<th>Status test</th>--}}
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 0; ?>
                                                                        @foreach($adminjobs as $row)
                                                                        <tr>
                                                                            <td>{{ ++$no }}</td>
                                                                            <td>
                                                                                <a href="" class="jobDetails"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalLong"
                                                                                data-id="{{$row->id}}"
                                                                                data-title="{{$row->title}}" data-company_name="{{$row->company_name}}"
                                                                                data-address="{{$row->address}}"
                                                                                data-email="{{$row->email}}"
                                                                                data-app_deadline="{{$row->app_deadline}}" data-job_sector="{{$row->jobCategoryDetails->title}}"
                                                                                data-min="{{$row->min}}"
                                                                                data-max="{{$row->max}}"
                                                                                data-currency="{{$row->currency}}"
                                                                                data-career_level="{{$row->career_level}}" data-experience="{{$row->experience}}" data-gender="{{$row->gender}}"
                                                                                data-job_type="{{$row->job_type}}"
                                                                                data-qualification="{{$row->qualification}}"
                                                                                data-file="{{$row->file}}"
                                                                                data-country="{{$row->country}}"
                                                                                data-city="{{$row->city}}">
                                                                                    {{ $row->title }}
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <!-- <img src="{{ asset('storage/images/' . $row->file) }}" height="75" width="75" alt="" /> -->

                                                                                <!-- <embed src="{{ asset('storage/images/' . $row->file) }}" style="width:70px; height:70px;" frameborder="0"> -->
                                                                                {{ $row->company_name }}
                                                                            </td>
                                                                            <td>{{$row->jobCategoryDetails->title}}</td>
                                                                            {{--<td><span class="badge badge-rounded badge-{{($row->status == 'active') ? 'success': 'danger' }}">{{$row->status}}</span></td>
                                                                            --}}<td>

                                                                                <a href="{{ route('edit-job', $row->id) }}">
                                                                                    <button class="btn btn-primary btn-sm">Edit</button>
                                                                                </a>
                                                                                <a  href="javascript:void(0)" data-url="changeStatus-job" data-status='inactive' data-id="{{$row->id}}" class="btn btn-danger shadow btn-sm sharp change-status-record {{($row->status == 'active') ? '' : 'd-none'}}" title="Suspend Record"><i class="fa fa-trash"></i></a>
                                                                                <a  href="javascript:void(0)" data-url="changeStatus-job" data-status='active' data-id="{{$row->id}}" class="btn btn-success shadow btn-sm sharp change-status-record {{($row->status == 'inactive') ? '' : 'd-none'}}" title="Active Record"><i class="fa fa-refresh"></i></a>
                                                                            </td>

                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="recruiter" role="tabpanel">
                                            <div class="pt-4">

                                                <div class="row">
                                                <div class="col-12">
                                                    <div class="card">

                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table  class="display  custom-datatable" style="min-width: 845px">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Title</th>
                                                                            <th>Company Name</th>
                                                                            <th>Job Category</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 0; ?>
                                                                        @foreach($recruiterjobs as $row)
                                                                        <tr>
                                                                            <td>{{ ++$no }}</td>
                                                                            <td>
                                                                                <a href="" class="jobDetails"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalLong"
                                                                                data-id="{{$row->id}}"
                                                                                data-title="{{$row->title}}" data-description="{{$row->description}}" data-company_name="{{$row->company_name}}"
                                                                                data-address="{{$row->address}}"
                                                                                data-email="{{$row->email}}"
                                                                                data-app_deadline="{{$row->app_deadline}}" data-job_sector="{{$row->jobCategoryDetails->title}}"
                                                                                data-min="{{$row->min}}"
                                                                                data-max="{{$row->max}}"
                                                                                data-currency="{{$row->currency}}"
                                                                                data-career_level="{{$row->career_level}}" data-experience="{{$row->experience}}" data-gender="{{$row->gender}}"
                                                                                data-job_type="{{$row->job_type}}"
                                                                                data-qualification="{{$row->qualification}}"
                                                                                data-file="{{$row->file}}"
                                                                                data-country="{{$row->country}}"
                                                                                data-city="{{$row->city}}">
                                                                                    {{ $row->title }}
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <!-- <img src="{{ asset('storage/images/' . $row->file) }}" height="75" width="75" alt="" /> -->

                                                                                <!-- <embed src="{{ asset('storage/images/' . $row->file) }}" style="width:70px; height:70px;" frameborder="0"> -->
                                                                                {{ $row->company_name }}
                                                                            </td>
                                                                            <td>{{ $row->jobCategoryDetails->title }}</td>
                                                                            <td><span class="badge badge-rounded badge-{{($row->status == 'active') ? 'success': 'danger' }}">{{$row->status}}</span></td>
                                                                            <td>

                                                                                <a href="{{ route('edit-job', $row->id) }}">
                                                                                    <button class="btn btn-primary btn-sm">Edit</button>
                                                                                </a>
                                                                                <a  href="javascript:void(0)" data-url="changeStatus-job" data-status='inactive' data-id="{{$row->id}}" class="btn btn-danger shadow btn-sm sharp change-status-record {{($row->status == 'active') ? '' : 'd-none'}}" title="Suspend Record"><i class="fa fa-trash"></i></a>
                                                                                <a  href="javascript:void(0)" data-url="changeStatus-job" data-status='active' data-id="{{$row->id}}" class="btn btn-success shadow btn-sm sharp change-status-record {{($row->status == 'inactive') ? '' : 'd-none'}}" title="Active Record"><i class="fa fa-refresh"></i></a>
                                                                            </td>

                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>

				</div>

            </div>
        </div>

        <script>
            $('body').on("click", ".jobDetails", function (e) {
                e.preventDefault();
                $('#exampleModalLong').modal('show');
                var title = $(this).data('title');
                var company_name = $(this).data('company_name');
                var address = $(this).data('address');
                var app_deadline = $(this).data('app_deadline');
                var job_sector = $(this).data('job_sector');
                var min = $(this).data('min');
                var max = $(this).data('max');
                var currency = $(this).data('currency');
                var career_level = $(this).data('career_level');
                var experience = $(this).data('experience');
                var gender = $(this).data('gender');
                var job_type = $(this).data('job_type');
                var qualification = $(this).data('qualification');
                var file = $(this).data('file');
                $('#file').attr("src", $(this).data('file'));
                var country = $(this).data('country');
                var city = $(this).data('city');


                $('#title').html(title);
                $('#name').html(company_name);
                $('#address').html(address);
                $('#app_deadline').html(app_deadline);
                $('#job_sector').html(job_sector);
                $('#min').html(min);
                $('#max').html(max);
                $('#currency').html(currency);
                $('#career_level').html(career_level);
                $('#experience').html(experience);
                $('#gender').html(gender);
                $('#job_type').html(job_type);
                $('#qualification').html(qualification);
                $('#file').html(file);
                $('#country').html(country);
                $('#city').html(city);

                // var title = $(this).data('id');
                // $(".modal-body #id").val(id);
                // As pointed out in comments,
                // it is unnecessary to have to manually call the modal.
                // $('#addBookDialog').modal('show');
            });
        </script>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
