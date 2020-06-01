<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tanggap Covid 19 | KKN-PPM UGM</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/colors.min.css')}}" rel="stylesheet" type="text/css">

	<link href="{{ asset('DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  	<link href="{{ asset('DataTables/Select-1.2.6/css/select.bootstrap4.min.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />

	<link href="{{asset('css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="lib/themes/rtl.css"> -->
	<!-- /global stylesheets -->
	@stack('after_style')

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/libraries/bootstrap.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
	<!-- /theme JS files -->



	<!-- /theme JS files -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/forms/validation/validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/inputs/touchspin.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/switch.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/libraries/jquery_ui/interactions.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/pages/form_validation.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/validation/localization/messages_id.js')}}"> </script>

	<script type="text/javascript" src="{{asset('js/pages/form_select2.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/notifications/jgrowl.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/daterangepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/anytime.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.date.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.time.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/pages/picker_date.js')}}"></script>
	<script src="{{asset('js/plugins/pickers/pickadate/translations/id_ID.js')}}"></script>
	<!-- /theme JS files -->

	<!-- Input upload picture -->
	<script type="text/javascript" src="{{asset('js/plugins/uploaders/fileinput.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/uploader_bootstrap.js')}}"></script>
	<!-- /Input upload picture -->
	<script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/datatables_data_sources.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/tables/footable/footable.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/table_responsive.js')}}"></script>

	@stack('after_script')

</head>

<body>
	<!-- Page header -->
		<div class="page-header page-header-inverse bg-indigo">
			<!-- Page header content -->
			<div class="page-header-content">
				<div class="page-title">
					<h4>KKN-PPM UGM 2020</h4>
				</div>
			</div>
			<!-- /page header content -->


			<!-- Second navbar -->
			<div class="navbar navbar-inverse navbar-transparent" id="navbar-second">
				<ul class="nav navbar-nav visible-xs-block">
					<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
				<div class="navbar-collapse collapse" id="navbar-second-toggle">
					<ul class="nav navbar-nav navbar-nav-material">
						<li><a href="{{url('/')}}">Dashboard</a></li>
						<!-- <li><a href="{{url('/deteksi-dini')}}">Deteksi Dini</a></li>
						<li><a href="{{url('/')}}">Cek Skala Kesehatan</a></li> -->
						<li><a data-toggle="modal" data-target="#modal_theme_primary">Deteksi Dini</a></li>
						<li><a data-toggle="modal" data-target="#modal_theme_primary">Cek Skala Kesehatan</a></li>
						<li><a data-toggle="modal" data-target="#modal_theme_primary">Lapor Pemudik</a></li>
						<li><a href="{{url('/info-grafik-diy')}}">Info Grafis</a></li>
					</ul>
				</div>
			</div>
			<!-- /second navbar -->

		</div>
		<!-- /page header -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
			@yield('content')
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>

	<div id="modal_theme_primary" class="modal fade">
		<div class="modal-dialog  ">
			<div class="login-container">
				<div class="page-container">
					<!-- Page content -->
					<div class="page-content">
						<!-- Main content -->
						<div class="content-wrapper">
							<!-- Content area -->
							<div class="content">
								<!-- Simple login form -->
								<form class="form-horizontal form-validate-jquery" method="POST" action="{{ route('warga.login') }}">
								@csrf
									<div class="panel panel-body login-form">
										<div class="" style="margin:0px">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="text-center">
											<!-- <img src="{{asset('images/covid.jfif')}}" alt="logo" style="width:50%"> -->
											<img src="{{asset('images/blue-covid.jpg')}}" alt="logo" style="width:50%">
											<h5 class="content-group">Tanggap COVID-19 <small class="display-block">Masukkan nomor handphone anda.</small></h5>
										</div>
										<div class="form-group has-feedback has-feedback-left">
			                <input type="text" maxlength="13" minlength="10" id="no_telephone" placeholder="Nomor Handphone" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" required autofocus>
											<div class="form-control-feedback">
												<i class="icon-user text-muted"></i>
											</div>
											@if ($errors->has('no_telepon'))
												<label style="padding-top:7px;color:#F44336;">
													<strong><i class="fa fa-times-circle"></i> {{ $errors->first('no_telepon') }}</strong>
												</label>
											@endif
										</div>
										<div class="form-group">
											<button type="submit" class="btn bg-primary-800 btn-block">Masuk <i class="icon-circle-right2 position-right"></i></button>
										</div>
										<div class="text-center">
											<h5 class="content-group"><i>powered by</i><br><b style="color:#073c64">KKN-PPM UGM 2020</b></h5>
											<h5 class="content-group"></h5>
										</div>
									</div>
								</form>
								<!-- /simple login form -->
							</div>
							<!-- /content area -->
						</div>
						<!-- /main content -->
					</div>
					<!-- /page content -->
				</div>
			</div>
		</div>
	</div>
	<!-- /page container -->
	{{-- @include('sweetalert::alert') --}}
</body>
</html>
