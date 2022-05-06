 @extends('backend.layouts.app')
@section('title', 'Contact us')
@section('mycontents')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Contact us</h4>
                            <span>Contact us</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Contact Us</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Contact us</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Contact us</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                {{--<th>Status</th>--}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach($contact as $row)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td title="{{ $row->name }}">{{ $row->name }}</td>
                                                <td title="{{ $row->subject }}">{{  substr($row->subject, 0, 10)  }}</td>
                                                <td title="{{ $row->email }}">{{  substr($row->email, 0, 10)  }}</td>
                                                <td title="{{ $row->phone }}">{{  substr($row->phone, 0, 10)  }}</td>
                                                <td title="{{ $row->message }}">{{  substr($row->message, 0, 10)  }}</td>

                                                {{--<td>
                                                    <span class="badge badge-rounded badge-{{($row->status == 'active') ? 'success': 'danger' }}">{{$row->status}}</span>
                                                </td>--}}
                                                <td>
                                                    <a  href="javascript:void(0)" data-url="changeStatus-contactus" data-status='inactive' data-id="{{$row->id}}" class="btn btn-danger shadow btn-sm sharp change-status-record {{($row->status == 'active') ? '' : 'd-none'}}" title="Suspend Record"><i class="fa fa-trash"></i></a>
                                                    <a  href="javascript:void(0)" data-url="changeStatus-contactus" data-status='active' data-id="{{$row->id}}" class="btn btn-success shadow btn-sm sharp change-status-record {{($row->status == 'inactive') ? '' : 'd-none'}}" title="Active Record"><i class="fa fa-refresh"></i></a>
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
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection
