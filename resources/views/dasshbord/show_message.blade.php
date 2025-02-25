
@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Les Messages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Message</span></div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if($msg )
				<!-- row opened -->
				<div class="row row-sm">
					<!-- Col -->
					
					<!-- /Col -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Message <span class="badge badge-primary"></span></h4>
							</div>
							<div class="card-body">
								<div class="email-media">
									<div class="mt-0 d-sm-flex">
										<img class="ml-2 rounded-circle avatar-xl" src="{{URL::asset('assets/img/faces/6.jpg')}}" alt="avatar">
										<div class="media-body">
											<div class="float-left d-none d-md-flex fs-15">
												<span class="mr-3">{{ $msg->created_at }}</span>
												<small class="mr-3"><i class="bx bx-star tx-18" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
												<a href="{{Redirect::back()}}"><small class="mr-3"><i class="bx bx-reply tx-18" data-toggle="tooltip" title="" data-original-title="Reply"></i></small></a>
												
											</div>
											<div class="media-title  font-weight-bold mt-3">{{  $msg->name}}  <span class="text-muted">/ telephone: ( {{ $msg->phone }} )</span></div>
											
											<small class="mr-2 d-md-none"><i class="fe fe-star text-muted" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
											<a href="{{Redirect::back()}}"><small class="mr-3"><i class="bx bx-reply tx-18" data-toggle="tooltip" title="" data-original-title="Reply"></i></small></a>
										</div>
									</div>
								</div>
								<div class="eamil-body mt-5">
									
									<p>{{ $msg->message }}</p>
									<hr>
									
								</div>
							</div>
							<div class="card-footer text-left">
								{{-- <a class="btn btn-info mt-1 mb-1"  href="{{ url('/messages_send') }}/{{ $msg->id }}"><i class="fa fa-share"></i> Reply</a> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>@endif
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
