@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div>
              <fieldset class="content-group">
                  <legend class="text-bold">Hasil Cek Skala Kesehatan </legend>

                  <div class="alert alert-info no-border col-md-12">
                    Terimakasih sudah mengisi cek skala kesehatan. <br>
                    Beberapa tips yang dapat dilakukan untuk mengatasi stress/kecemasan selama pandemi Covid-19:
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          1.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Bicarakan/ceritakan perasaan yang anda alami kepada orang-orang terdekat atau yang dipercaya. Kita dapat menghubungi teman, keluarga, dll melalui sosial media, telfon maupun videocall meski sedang melakukan social distancing.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          2.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Pertahankan gaya hidup sehat dengan memakan makanan bergizi dan seimbang, istirahat cukup, konsumsi air putih dan rajin berolahraga.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          3.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Jangan jadikan rokok, alkohol atau obat-obatan lain sebagai pelarian emosi. Lakukanlah kegiatan-kegiatan positif dan bermanfaat sebagai sarana mengelola stress.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          4.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Kumpukan/Baca informasi yang akurat untuk membantu anda mengambil tindakan pencegahan lainnya bisa dari info Kementrian Kesehatan RI, WHO, dsb.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          5.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Kelola kekhawatiran dan kecemasan dengan mengurangi paparan informasi negatif dan denang melakukan kegiatan yang bermanfaat.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1" style="width:2%">
                          6.
                      </div>
                      <div class="col-md-1" style="width:98%">
                        Gunakan cara-cara mengelola stress yang pernah dilakukan sebelumnya untuk mengelola perasaan yang anda alami selama wabah pandemi.
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12" style="margin-bottom:10px">
                      <a href="{{route('warga.list',$warga->no_telepon)}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
                      <!-- <a href="{{route('warga.editLaporan',$warga->id)}}"type="button" class="btn btn-primary" id=""> <i class="icon-pencil6"></i> Ubah Laporan Hari Ini</a> -->
                  </div>
              </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
@push('after_script')
<script type="text/javascript" src="{{asset('js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/visualization/c3/c3.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            type:'GET',
            url : "{{ url('warga/chart') }}" + "/" + "{{$warga->id}}",
            success:function(data){
            //alert(data.success);
            var chart = c3.generate({
                bindto: '#c3-chart',
                size: { height: 300 },
                point: {
                    r: 4
                },
                data: {
                    x: 'x',
                    columns: data,
                },
                grid: {
                    y: {
                        show: true
                    }
                },
                axis: {
                    x: {
                        label: 'Laporan ke-',
                        start: 1
                    },
                    y: {
                        label: 'Total Skor'
                    },
                }
            });
            }
        });
    });
</script>
@endpush
