@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Les messages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Les messages</span></div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm main-content-mail">
					
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="main-content-body main-content-body-mail card-body">
								<div class="main-mail-header">
									<div>
										<h4 class="main-content-title mg-b-5">Tous les messages</h4>
										
									</div>
									<div>
										<span>1-50 of 1200</span>
										<div class="btn-group" role="group">
											<button class="btn btn-outline-secondary disabled" type="button"><i class="icon ion-ios-arrow-forward"></i></button> <button class="btn btn-outline-secondary" type="button"><i class="icon ion-ios-arrow-back"></i></button>
										</div>
									</div>
								</div><!-- main-mail-list-header -->
								<div class="main-mail-options">
									</div><!-- btn-group -->
								</div>
								<!-- main-mail-options -->
								<div class="main-mail-list">

									@foreach(DB::table('msgs')->orderBy("created_at", "desc")->get() as $msg)
									@if($msg->is_rade=='no')

									<a  href="{{ url('/show_message') }}/{{ $msg->id }}">	<div class="main-mail-item unread" style="  background-color: rgb(22, 120, 206)">
										<div class="main-mail-checkbox">
										</div>
										
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
																						</div>
											<div class="main-mail-subject">
												<strong >{{$msg->name}}	</strong>
											<br>	 <span style=" color:white;">{{$msg->message}}</span>
											</div>
										</div>
										
										<div class="main-mail-date" style=" color:white;">
											{{$msg->created_at}}
										</div>
									</div>
									</a>
									@else
									<a href="{{ url('/show_message') }}/{{ $msg->id }}"> <div class="main-mail-item unread" >
										<div class="main-mail-checkbox">
										</div>
										
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
																						</div>
											<div class="main-mail-subject">
												<strong>{{$msg->message}}	</strong>
											<br>	 <span>{{$msg->message}}</span>
											</div>
										</div>
										
										<div class="main-mail-date">
											{{$msg->created_at}}
										</div>
									</div> 
									</a>





									@endif
									

                                    @endforeach




									{{-- <div class="main-mail-item unread">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star active">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/2.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Albert Ansing
											</div>
											<div class="main-mail-subject">
												<strong>Here's What You Missed This Week</strong> <span>enean commodo li gula eget dolor cum socia eget dolor enean commodo li gula eget dolor cum socia eget dolor...</span>
											</div>
										</div>
										<div class="main-mail-date">
											06:50am
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Carla Guden
											</div>
											<div class="main-mail-subject">
												<strong>4 Ways to Optimize Your Search</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-attachment">
											<i class="typcn typcn-attachment"></i>
										</div>
										<div class="main-mail-date">
											Yesterday
										</div>
									</div>
									<div class="main-mail-item unread">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/10.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Reven Galeon
											</div>
											<div class="main-mail-subject">
												<strong>We're Giving a Macbook for Free</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Yesterday
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/12.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Elisse Tan
											</div>
											<div class="main-mail-subject">
												<strong>Keep Your Personal Data Safe</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 13
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/14.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Marianne Audrey
											</div>
											<div class="main-mail-subject">
												<strong>We've Made Some Changes</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 13
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-avatar bg-gray-800">
											J
										</div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Jane Phoebe
											</div>
											<div class="main-mail-subject">
												<strong>Grab Our Holiday Deals</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 12
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/15.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Raffy Godinez
											</div>
											<div class="main-mail-subject">
												<strong>Just a Few Steps Away</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 05
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star active">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/7.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Allan Cadungog
											</div>
											<div class="main-mail-subject">
												<strong>Credit Card Promos</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 04
										</div>
									</div>
									<div class="main-mail-item">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/10.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Alfie Salinas
											</div>
											<div class="main-mail-subject">
												<strong>4 Ways to Optimize Your Search</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 02
										</div>
									</div>
									<div class="main-mail-item border-bottom-0">
										<div class="main-mail-checkbox">
											<label class="ckbox"><input type="checkbox"> <span></span></label>
										</div>
										<div class="main-mail-star">
											<i class="typcn typcn-star"></i>
										</div>
										<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/1.jpg')}}"></div>
										<div class="main-mail-body">
											<div class="main-mail-from">
												Jove Guden
											</div>
											<div class="main-mail-subject">
												<strong>Keep Your Personal Data Safe</strong> <span>viva mus elemen tum semper nisi enean vulputat enean commodo li gula eget dolor cum socia eget dolor</span>
											</div>
										</div>
										<div class="main-mail-date">
											Oct 02
										</div>
									</div> --}}
								</div>
								<div class="mg-lg-b-30"></div>
							</div>
						</div>
					</div>
					<div class="main-mail-compose">
						<div>
							<div class="container">
								<div class="main-mail-compose-box">
									<div class="main-mail-compose-header">
										<span>{{__('app.new')}}</span>
										<nav class="nav">
											<a class="nav-link" href=""><i class="fas fa-minus"></i></a> <a class="nav-link" href=""><i class="fas fa-compress"></i></a> <a class="nav-link" href=""><i class="fas fa-times"></i></a>
										</nav>
									</div>
									<div class="main-mail-compose-body">
										<div class="form-group">
											<label class="form-label">{{__('app.to')}}</label>
											<div>
												<input class="form-control" placeholder="Enter recipient's email address" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">{{__('app.Subject')}}</label>
											<div>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<textarea class="form-control" placeholder="Write your message here..." rows="8"></textarea>
										</div>
										<div class="form-group mg-b-0">
											<nav class="nav">
												<a class="nav-link" data-toggle="tooltip" href="" title="Add attachment"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add photo"><i class="far fa-image"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add link"><i class="fas fa-link"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Discard"><i class="far fa-trash-alt"></i></a>
											</nav><button class="btn btn-primary">{{__('app.Send')}}</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div><!-- container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--- Internal Check-all-mail js -->
<script src="{{URL::asset('assets/js/check-all-mail.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
@endsection