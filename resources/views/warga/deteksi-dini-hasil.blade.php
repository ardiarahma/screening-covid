@extends('warga.layouts.app')
@section('content')
<div class="content">
  <div class="panel panel-flat bg-slate">
    <div class="panel-body text-center" style="color:white">
      <h1 style="font-family:sans-serif;font-size:30px">Hasil Screening Mandiri COVID-19</h1>
    </div>
  </div>
</div>
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div>
              <fieldset class="content-group  text-center">
                  <!-- <legend class="text-bold">Hasil Skrining COVID-19 </legend> -->
                  <div class="alert alert-info no-border col-md-12">
                    <!-- Hasil dari screening mandiri sebagai berikut : <br> -->
                    <h4 style="font-family:sans-serif;">Anda termasuk dalam kategori <span class="text-semibold">{{$hasil->hasil}}.</span></h4>
                    <?php if ($hasil->gambar): ?>
                      <img src='{{$gambar}}' alt="" style="width:150px"><br>
                    <?php endif; ?>
                    <h4 style="font-family:sans-serif;">Selanjutnya, yang harus Anda lakukan adalah: 
                    <br>
                    <p class="enter-to-p">
                    {{$hasil->tatalaksana}}</p></h4>

                  </div>
                  <div class="col-md-12" style="margin-bottom:10px">
                    <a href="{{url('/')}}" type="button" class="btn btn-default" id=""> <i class="icon-home5"></i> Beranda</a>
                  </div>
              </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
@push('after_script')
<script>
$(document).ready(function(){
			$(".enter-to-p").each(function(){
			        var count = $(this).text().split('\n').length - 1;
			        for (var i = 0; i < count; i++) {
			          var p = $(this).html();
			          var newP = p.replace("\n\n", "</p><p class='mb-4'>");
			          $(this).html(newP);
			        }
			      });
					});
</script>
@endpush
