@extends('warga.layouts.app')
@section('content')
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

@endsection
@push('after_script')
<script type='text/javascript'>
	var divElement = document.getElementById('viz1589546527095'); var vizElement = divElement.getElementsByTagName('object')[0]; if (divElement.offsetWidth > 800) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else if (divElement.offsetWidth > 500) { vizElement.style.width = '1124px'; vizElement.style.height = '4250px'; } else { vizElement.style.width = '100%'; vizElement.style.height = '1400px'; } var scriptElement = document.createElement('script'); scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js'; vizElement.parentNode.insertBefore(scriptElement, vizElement);
</script>
@endpush
