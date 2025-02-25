@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Produits</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Ajouter des produits</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@section('content')
@if (\Session::has('msg'))
<div class="alert alert-success">
<ul>
   <li>{!! \Session::get('msg') !!}</li>
  </ul>
</div>
@endif
@if (\Session::has('msg_2'))
<div class="alert alert-danger">
<ul>
   <li>{!! \Session::get('msg_2') !!}</li>
  </ul>
</div>
@endif
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Ajouter des produits</h6>
									<p class="text-muted card-sub-title">First import a latest version of jquery in your page. Then the jquery.sumoselect.min.js and its css (sumoselect.css)</p>
								</div>

								<form class="form-horizontal"  action="{{url('addprod')}}" method="POST" enctype="multipart/form-data">
									@csrf

								<div class="mb-4">
									<div class="form-group">
									<p class="mg-b-10">Catégories</p>
									<select name="categori" class="form-control SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
										<!--placeholder-->
										{{-- <option title="Catégories"  value="" name="">Catégories</option> --}}
										@foreach (DB::table('categorees')->get() as $ctg)
											<option value="{{$ctg->id}}">{{$ctg->name}}</option>
										@endforeach
										
										
									</select></div>
									<div class="form-group">
										
										<input type="text" class="form-control" name="name" placeholder="Name">
										@if($errors->has('name'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('name') }}</div>@endif
									
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="Materiels" placeholder="Materiels">
										@if($errors->has('Materiels'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('Materiels') }}</div>@endif
									
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="colors" placeholder="colors">
										@if($errors->has('colors'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('colors') }}</div>@endif
									
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="id_prod" placeholder="id_prod">
										@if($errors->has('id_prod'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('id_prod') }}</div>@endif
									
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="prix" placeholder="prix">
										@if($errors->has('number'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('number') }}</div>@endif
									
									</div>
                                          <div class="form-group">
										<textarea class="form-control"  name="description" placeholder="Description"  id="exampleFormControlTextarea1" rows="3"></textarea>
										@if($errors->has('description'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('description') }}</div>@endif
									
									
								</div>
								<div class="form-group">

										<input type="file" name="files" accept="image/jpg, image/png, image/jpeg, image/png," >								
										@if($errors->has('files'))
										<div class="error alert alert-danger alert-dismissible fade show">{{ $errors->first('files') }}</div>@endif
									
								</div>
								</div>
								
								
							</div>
						</div>
					</div>
					
				</div>
				
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">une photo du produit</h6>
									<p class="text-muted card-sub-title">Téléchargez une photo du produit.</p>
								</div>
								<div class="row mb-4">
									
								</div>
								
							
							<div class="form-group mb-0 mt-3 justify-content-end">
								<div>
									<button type="submit" class="btn btn-primary">Ajouter</button>
									<button type="submit" class="btn btn-secondary">Annuler</button>
								</div></form>
							</div></div>
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
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection