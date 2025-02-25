@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Mon compte</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Mon compte</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{ Auth::user()->name }}</h5>
												<p class="main-profile-name-text">{{ Auth::user()->email }}</p>
											</div>
										</div>
										
										
										<div class="row">
											{{-- <div class="col-md-4 col mb20">
												
												<h6 class="text-small text-muted mb-0">{{ __('app.ihala') }}</h6><h5>{{ DB::table('users')->where("ape", Auth::user()->id)->count() }}</h5>
											</div>
											<div class="col-md-4 col mb20">
												
												<h6 class="text-small text-muted mb-0">{{ __('app.she') }}</h6><h5>{{ DB::table('shares')->where("user_id", Auth::user()->id)->sum('number_shers') }}</h5>
											</div> --}}
											<div class="col-md-4 col mb20">
												
												<h6 class="text-small text-muted mb-0">{{ __('app.d') }}</h6><h5>1</h5>

											</div>
										</div>
										<hr class="mg-y-10">
										<a href="{{ url('profile/update') }}"><h5 class="text-small text-muted mb-0">Modifier mon compte </h5></a>
										<a href="{{ url('password/update') }}"><h5 class="text-small text-muted mb-0">Modifier le mot de passe </h5></a>

										<hr class="mg-y-10">
										
										
										
										
										
										
										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										
										<div class="form-group">
											<label for="FullName">ID</label>
											<input type="text" type="hidden" value="DG-{{ Auth::user()->id }}" id="FullName" class="form-control" disabled>
										</div>
											<div class="form-group">
												<label for="FullName">nom et prénom</label>
												<input type="text" value="{{ Auth::user()->name }}" id="FullName" class="form-control"disabled>
											</div>
											{{-- <div class="form-group">
												<label for="FullName">{{ __('app.cin') }}</label>
												<input type="text" value="{{ Auth::user()->national }}" id="FullName" class="form-control"disabled>
											</div>
											<div class="form-group">
												<label for="FullName">{{ __('app.adrss') }}</label>
												<input type="text" value="{{ Auth::user()->adress }}" id="FullName" class="form-control"disabled>
											</div> --}}
											{{-- <div class="form-group">
												<label for="FullName">{{ __('app.num_1') }}</label>
												<input type="text" value="{{ Auth::user()->num_1 }}" id="FullName" class="form-control"disabled>
											</div> --}}
											{{-- <div class="form-group">
												<label for="FullName">{{ __('app.num_2') }}</label>
												<input type="text" value="{{ Auth::user()->num_2 }}" id="FullName" class="form-control"disabled>
											</div> --}}
											<div class="form-group">
												<label for="FullName">{{ __('app.email') }}</label>
												<input type="text" value="{{ Auth::user()->email }}" id="FullName" class="form-control"disabled>
											</div>
											{{-- <div class="form-group">
												<label for="FullName">{{ __('app.rip') }}</label>
												<input type="number" value="{{ Auth::user()->rip }}" id="FullName" class="form-control"disabled>
											</div> --}}
										
									</div>
								</div>
							</div>
							
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection