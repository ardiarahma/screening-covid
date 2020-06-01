<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lapor COVID19</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/colors.min.css')}}" rel="stylesheet" type="text/css">	
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

	<!-- <link rel="stylesheet" href="lib/themes/rtl.css"> -->
	<!-- /global stylesheets -->
	@stack('after_style')

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
	<!-- /theme JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/forms/validation/validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/inputs/touchspin.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/switch.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/libraries/jquery_ui/interactions.min.js')}}"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('js/plugins/pickers/pickadate/translations/id_ID.js')}}"></script>
	<!-- /theme JS files -->

	<!-- Input upload picture -->
	<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/media/fancybox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/gallery.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /theme JS files -->
	<script>
	  $(document).ready(function(){
	    $("#no_telephone").inputmask({
           // suffix : ',-',
           prefix : '08',
           alias: "numeric",
           autoGroup: true,
           rightAlign:false
       });
		 });
  </script>
	@stack('after_script')

</head>

<body>
	
	<!-- Page container -->
	<!-- Second navbar -->
	<!-- <div class="navbar navbar-inverse navbar-transparent " id="navbar-second"> -->
	<nav class="navbar main-nav navbar-expand-lg py-2 fixed-top navbar-toggleable-sm affix">
	<div class="container-fluid container-nav" id="navbar-second" >
				<div class="navbar-collapse collapse" id="navbar-second-toggle" style="float:left;">
				<a class="navbar-brand" href="{{url('/')}}">
				<img class="logo" src="{{asset('images/dpkm.png')}}" alt="logo">
				<!-- TANGGAP COVID-19 -->
				</a>
				</div>
				<ul class="nav navbar-nav visible-xs-block">
					<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
				<div class="navbar-collapse collapse" id="navbar-second-toggle" style="float:right;">
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
			</nav>
	<!-- /second navbar -->
	<div class="page-container bg-slate">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content-center text-center">
				    <!-- <div class="panel panel-flat bg-slate"> -->
				        <!-- <div class="panel-body text-center" style="color:white"> -->
									<h1 style="font-family:sans-serif;font-size:45px">KKN-PPM UGM TANGGAP COVID-19</h1>
									<h3>Jangan panik! Mari bersama lawan COVID-19. Hubungi layanan Yogyakarta Tanggap COVID-19.</h3>
									<div class="col-md-12 row" style="margin-top:20px">
										<div class="col-md-3">
											<!-- <a href="{{url('deteksi-dini')}}" type="button" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default">Deteksi Dini <i class="icon-circle-right2 position-right"></i></a> -->
											<button type="button" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default" data-toggle="modal" data-target="#modal_theme_primary">Deteksi Dini <i class="icon-circle-right2 position-right"></i></i></button>
										</div>
										<div class="col-md-3">
											<!-- <button type="submit" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default">Skrining Dampak Ekonomi <i class="icon-circle-right2 position-right"></i></button> -->
											<button type="button" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default" data-toggle="modal" data-target="#modal_theme_primary">Cek Skala Kesehatan <i class="icon-circle-right2 position-right"></i></i></button>
										</div>
										<div class="col-md-3">
											<button type="button" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default" data-toggle="modal" data-target="#modal_theme_primary">Lapor Pemudik <i class="icon-circle-right2 position-right"></i></i></button>
										</div>
										<div class="col-md-3">
											<a href="{{url('info-grafik-diy')}}" type="button" class="btn btn-lg btn-block btn-flat bg-slate-400 border-default">Infografis Covid-19 <i class="icon-circle-right2 position-right"></i></a>
										</div>
									</div>
				        <!-- </div> -->
				    <!-- </div> -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
					<!-- Content area -->
					<div class="content">
						<!-- Image grid -->
						<h1 class="text-center" style="font-family:sans-serif;font-size:27px; color:#0e636d;" bold>- Galeri Foto -</h1><br>
						<div class="row" >
							@foreach ($gambar as $key => $value)
							<div class="col-lg-3 col-sm-6">
								<div class="thumbnail">
									<div class="thumb">
										<img src='{{asset("storage/images/$value->gambar")}}' alt="">
										<div class="caption-overflow">
											<span>
												<a href='{{asset("storage/images/$value->gambar")}}' data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
											</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					<!-- /image grid -->
					</div>
					<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->

	<!-- Login modal -->
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
	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second">
			<div class="navbar-text">
				&copy; 2020 | KKN PPM UGM
				 <!-- <a href="#">Limitless Web App Kit</a> by <a href="/" target="_blank">KKN PPM UGM</a> -->
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">Help center</a></li>
					<li><a href="#">Policy</a></li>
					<li><a href="#" class="text-semibold">Upgrade your account</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog3"></i>
							<span class="visible-xs-inline-block position-right">Settings</span>
							<span class="caret"></span>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
							<li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
							<li><a href="#"><i class="icon-github"></i> Github</a></li>
							<li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
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
	<!-- /footer -->
	<!-- /login modal -->
	{{-- @include('sweetalert::alert') --}}

	<script type='text/javascript'>
		var divElement = document.getElementById('viz1589546527095'); var vizElement = divElement.getElementsByTagName('object')[0]; if (divElement.offsetWidth > 800) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else if (divElement.offsetWidth > 500) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else { vizElement.style.width = '100%'; vizElement.style.height = '1400px'; } var scriptElement = document.createElement('script'); scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js'; vizElement.parentNode.insertBefore(scriptElement, vizElement);
	</script>
</body>
</html>


