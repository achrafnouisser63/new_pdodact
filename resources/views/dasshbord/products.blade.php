@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					
					<div class="col-xl-12 col-lg-12 col-md-12">
						
						<div class="row row-sm">
							@foreach (DB::table('produits')->get() as $pd)
								<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body">
										
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-pink">New</div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" src="{{URL::asset('/assets/img/ecommerce/01.jpg')}}" alt="product-image">
											<a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$pd->name}}</h3>
											{{-- <span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span> --}}
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger"> {{$pd->prix}}DH</h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							
							
							
						</div><ul class="pagination product-pagination mr-auto ">
								<li class="page-item page-prev disabled">
									<a class="page-link" href="#" tabindex="-1">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">6</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item page-next">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection