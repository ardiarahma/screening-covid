@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div>
              <fieldset class="content-group  text-center">
                  <legend class="text-bold">Hasil Skrining COVID-19 </legend>
                  <div class="alert alert-info no-border col-md-12">
                    Hasil dari screening mandiri sebagai berikut : <br>
                    <?php if ($hasil->hasil_skors->gambar): ?>
                      <img src='{{$gambar}}' alt="" style="width:100px"><br>
                    <?php endif; ?>
                    <span class="text-semibold">{{$warga->nama}}</span>,
                    Anda termasuk dalam kategori <span class="text-semibold">{{$hasil->hasil_skors->hasil}}.</span><br>
                    Selanjutnya, yang harus Anda lakukan adalah: <br>
                    {{$hasil->hasil_skors->tatalaksana}}
                  </div>
                  <div class="col-md-12" style="margin-bottom:10px">
                    <a href="{{route('warga.list',$warga->no_telepon)}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
                    <!-- <a href="{{route('warga.editLaporan',$warga->id)}}"type="button" class="btn btn-primary" id=""> <i class="icon-pencil6"></i> Ubah Laporan Hari Ini</a> -->
                  </div>

                  <!-- <div class="panel-body col-md-12">
                    <div class="chart-container">
                      <div class="chart" id="c3-chart"></div>
                    </div>
                  </div> -->
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
