 @extends('backend.layouts.app')
@section('title', 'All Team Members')
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
                            <span>All Team Members</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Our Team</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">All Team Members</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        @include('backend.message')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Team Members</h4>
                                <a href="{{( url('add-ourteam') )}}">
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-plus pr-2"></span>Add Team Member</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Designation</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach($ourteam as $row)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/images/' . $row->image) }}" height="75" width="75" alt="" />
                                                </td>
                                                <td>{{ $row->designation }}</td>
                                                <td><span class="badge badge-rounded badge-{{($row->status == 'active') ? 'success': 'danger' }}">{{$row->status}}</span></td>
                                                <td>
                                                    <a href="{{ route('edit-ourteam', $row->id) }}">
                                                        <button class="btn btn-primary btn-sm">Edit</button>
                                                    </a>
                                                    <a  href="javascript:void(0)" data-url="changeStatus-ourteam" data-status='inactive' data-id="{{$row->id}}" class="btn btn-danger shadow btn-sm sharp change-status-record {{($row->status == 'active') ? '' : 'd-none'}}" title="Suspend Record"><i class="fa fa-trash"></i></a>
                                                    <a  href="javascript:void(0)" data-url="changeStatus-ourteam" data-status='active' data-id="{{$row->id}}" class="btn btn-success shadow btn-sm sharp change-status-record {{($row->status == 'inactive') ? '' : 'd-none'}}" title="Active Record"><i class="fa fa-refresh"></i></a>
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