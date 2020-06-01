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
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-primary-800">
		<div class="navbar-header" style="padding-left:25px">
			<!-- <a href="#"><img src="{{asset('img/web_transparent_fit_ruko_logo_v2_white.png')}}" alt="" style="height:47px"></a> -->
			<h5 style="height:20px">Tanggap Covid 19 | KKN-PPM UGM </h5>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<a href="{{url('/')}}"><i class="icon-switch2"></i> Keluar</a>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
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
	<!-- /page container -->
	{{-- @include('sweetalert::alert') --}}
</body>
</html>
