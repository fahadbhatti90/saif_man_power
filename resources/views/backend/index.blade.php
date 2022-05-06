@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('mycontents')
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h2 class="text-black font-w600 mb-0">Dashboard</h2>
						<p class="mb-0">Welcome to Management Dashbaord!</p>
					</div>
					
					
				</div>
                <div class="row">
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<span class="mr-3 bgl-primary fa fa-user-md">
										<!-- <i class="ti-user"></i> -->
									</span>
									<div class="media-body">
										<a href="{{ url('show-job') }}">
											<h3 class="mb-0 text-black"><span class="counter ml-0">{{ $jobs->count() }}</span></h3>
											<p class="mb-0">Jobs</p>
											<!-- <small>4% (30 days)</small> -->
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<span class="mr-3 bgl-primary  fa fa-list-alt">
										<!-- <i class="ti-user"></i> -->
									</span>
									<div class="media-body">
										<a href="{{ url('show-jobcategory') }}">
											<h3 class="mb-0 text-black"><span class="counter ml-0">{{ $jobcategories->count() }}</span></h3>
											<p class="mb-0">Job Cagtegories</p>
											<!-- <small>4% (30 days)</small> -->
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<span class="mr-3 bgl-primary fa fa-users">
										<!-- <i class="ti-user"></i> -->
									</span>
									<div class="media-body">
										<a href="{{ url('show-job') }}">
											<h3 class="mb-0 text-black"><span class="counter ml-0">{{ $recruiters->count() }}</span></h3>
											<p class="mb-0">Recruiters</p>
											<!-- <small>4% (30 days)</small> -->
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<span class="mr-3 bgl-primary fa fa-briefcase">
										<!-- <i class="ti-user"></i> -->
									</span>
									<div class="media-body">
										<a href="{{ url('show-applyjob') }}">
											<h3 class="mb-0 text-black"><span class="counter ml-0">{{ $jobapplies->count() }}</span></h3>
											<p class="mb-0">Job Applies</p>
											<!-- <small>4% (30 days)</small> -->
										</a>
									</div>
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


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
@endsection