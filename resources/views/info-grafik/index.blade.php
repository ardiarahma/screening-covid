<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kalirejo Siaga COVID19</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		type="text/css">
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
	<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
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
						<!-- <li><a data-toggle="modal" data-target="#modal_theme_primary">Cek Skala Kesehatan</a></li> -->
						<li><a data-toggle="modal" data-target="#modal_theme_primary">Lapor Pemudik</a></li>
						<li><a href="{{url('/info-grafik-diy')}}">Info Grafis</a></li>
					</ul>
				</div>
			</div>
			<!-- /second navbar -->

		</div>
		<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<div class="panel panel-flat bg-slate">
			<div class="panel-body text-center" style="color:white">
				<h1 style="font-family:sans-serif;font-size:30px">Peta Sebaran Kasus COVID-19 di D.I. Yogyakarta</h1>
			</div>
		</div>
	</div>
	<!-- /content area -->

	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="col-md-12 text-center">
								<div class="col-md-10 col-md-offset-1">
									<div style="margin:5px">
										<span>
											<p style="text-align:left">Peta persebaran tersebut diharapkan dapat memberikan informasi kepada masyarakat. Disamping itu angka persebaran ini harapan kami dapat dijadikan kewaspadaan kita. Tetapi ini <b>tidak menunjukkan zona merah</b>. Karena secara epidemiologis wilayah DIY ini adalah wilayah yang padat, tidak tepisahkan, sehingga jangan dimaknai bahwa hanya kecamatan yang ada kasus yg perlu waspada.</p>
											<p style="text-align:left">Harapan kami semua masyarakat di DIY tetap waspada dan tidak panik, tetapi mengikuti arahan bapak Gubernur bahwa mengurangi keluar rumah bila tidak penting, mengurangi berkumpul dg banyak orang, rajin melakukan cuci tangan dg sabun dan air mengalir, meningkatkan stamina tubuh dg perilaku hidup bersih dan sehat.
											Juga sebagai komitmen keterbukaan informasi publik.</p>
										</span>
									</div>
									<div class='tableauPlaceholder' id='viz1589546527095' style='position: relative'>
										<noscript><a href='https:&#47;&#47;corona.jogjaprov.go.id&#47;map-covid-19-diy'><img
													alt=' '
													src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;92&#47;92D26YRDN&#47;1_rss.png'
													style='border: none' /></a></noscript><object class='tableauViz'
											style='display:none;'>
											<param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
											<param name='embed_code_version' value='3' />
											<param name='path'
												value='views&#47;COVID-19-DIY-CHLOROPLETH&#47;Dashboard1?:embed=y&amp;:toolbar=no&amp;:embed_code_version=3&amp;:loadOrderID=0&amp;:display_count=yes&amp;publish=yes' />
											<param name='toolbar' value='no' />
											<param name='static_image'
												value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;92&#47;92D26YRDN&#47;1.png' />
											<param name='animate_transition' value='yes' />
											<param name='display_static_image' value='yes' />
											<param name='display_spinner' value='yes' />
											<param name='display_overlay' value='yes' />
											<param name='display_count' value='yes' />
											<param name='filter' value='publish=yes' /></object>
									</div>
									<div style="margin:5px;padding-top:5px">
										<h5 style="text-align:left">Sumber: Dinas Kesehatan DIY</h5>
										<ul style="text-align:left">
											<li>Marker&nbsp;<strong><span style="color: #f26daf;">MERAH MUDA&nbsp;</span></strong>untuk&nbsp;<strong>Pasien Sembuh.</strong></li>
											<li><span style="font-size: 10pt;">Marker <strong><span style="color: #e6d707;">KUNING</span></strong> untuk <strong>Pasien Positif COVID-19.</strong></span></li>
											<li>Marker <span style="color: #0000ff;"><strong>BIRU</strong></span>&nbsp;untuk <strong>Pasien Dalam Pengawasan (PDP).</strong></li>
											<li>Marker <strong><span style="color: #acfa09;">HIJAU&nbsp;</span></strong>untuk <strong>Orang Dalam Pemantauan (ODP).</strong></li>
											<li>Titik lokasi <strong>tidak menunjuk pada alamat persis masing-masing kasus</strong>. Melainkan wilayah pada tingkat kecamatan yang tertera pada identitas kasus.</li>
											<li>Data yang tampil akan terus diperbaharui sesuai dengan informasi yang diterima melalui&nbsp;Pemda DIY</li>
											<li>Data yang ditampilkan di peta hanya yang berdomisili di DIY</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->

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
												<h5 class="content-group">Kalirejo Siaga COVID-19 <small class="display-block">Masukkan nomor handphone anda.</small></h5>
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
	{{-- @include('sweetalert::alert') --}}
	<script type='text/javascript'>
		var divElement = document.getElementById('viz1589546527095'); var vizElement = divElement.getElementsByTagName('object')[0]; if (divElement.offsetWidth > 800) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else if (divElement.offsetWidth > 500) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else { vizElement.style.width = '100%'; vizElement.style.height = '1400px'; } var scriptElement = document.createElement('script'); scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js'; vizElement.parentNode.insertBefore(scriptElement, vizElement);
	</script>
</body>

</html>
