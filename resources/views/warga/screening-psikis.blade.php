@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('warga.kirimScrePsi',$warga->id)}}" method="post" enctype="multipart/form-data" files=true>
                {{ csrf_field() }}
                <fieldset class="content-group">
                  <legend class="text-bold">Cek Skala Kesehatan</legend>
                  <div class="" id="div-alert">
                    <div class="alert alert-info no-border">
                      <span class="text-semibold"></span> Kuesioner ini terdiri dari berbagai pernyataan yang mungkin sesuai dengan pengalaman anda dalam menghadapi situasi hidup sehari-hari. Terdapat empat pilihan jawaban yang disediakan untuk setiap pernyataan yaitu:
                      <div class="row">
                        <div class="col-md-1" style="width:2%">
                            0
                        </div>
                        <div class="col-md-1" style="width:98%">
                          : Tidak sesuai dengan saya sama sekali, atau <b>tidak pernah</b>.
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-1" style="width:2%">
                            1
                        </div>
                        <div class="col-md-1" style="width:98%">
                          : Sesuai dengan saya sampai tingkat tertentu, atau <b>kadang kadang</b>.
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-1" style="width:2%">
                            2
                        </div>
                        <div class="col-md-1" style="width:98%">
                          : Sesuai dengan saya sampai batas yang dapat dipertimbangkan, atau <b>lumayan sering</b>.
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-1" style="width:2%">
                            3
                        </div>
                        <div class="col-md-1" style="width:98%">
                          : Sangat sesuai dengan saya, atau <b>sering sekali</b>.
                        </div>
                      </div>
                      Selanjutnya, anda diminta untuk menjawab dengan cara memilih satu angka yang paling sesuai dengan pengalaman anda selama satu minggu belakangan ini.  Tidak ada jawaban yang benar ataupun salah, karena itu isilah sesuai dengan keadaan diri anda yang sesungguhnya, yaitu berdasarkan jawaban pertama yang terlintas dalam anda.
                    </div>
                  </div>
                  <div class="" style="display:none" id="div-table">
                    <table class="table table-togglable table-hover">
                      <thead>
                        <tr>
                          <!-- <th>No</th>
                          <th>Pertanyaan</th>
                          <th class="col-md-2">Jawaban</th> -->

                          <th data-toggle="true">No</th>
                          <th data-hide="phone">Pertanyaan</th>
                          <th data-hide="phone,tablet" class="col-md-2">Jawaban</th>
                        </tr>
                      </thead>
                      @foreach ($pertanyaan as $key => $value)
                      <tbody>
                        <td width="57px">{{$key+1}}</td>
                        <td>{{$value->pertanyaan}}</td>
                        <td>
                          <div class="form-group">
                            <input type="hidden" name="pertanyaan_id[{{$key}}]" value="{{$value->id}}">
                            <div class="col-md-12" style="margin:0px;padding:0px">
                              <label class="radio-inline">
                                <input type="radio" name="jawaban[{{$key}}]" class="styled" value="0" required>
                                Tidak pernah
                              </label>
                            </div>
                            <div class="col-md-12" style="margin:0px;padding:0px">
                              <label class="radio-inline">
                                <input type="radio" name="jawaban[{{$key}}]" class="styled" value="1" required>
                                Kadang-kadang
                              </label>
                            </div>
                            <div class="col-md-12" style="margin:0px;padding:0px">
                              <label class="radio-inline">
                                <input type="radio" name="jawaban[{{$key}}]" class="styled" value="2" required>
                                Lumayan Sering
                              </label>
                            </div>
                            <div class="col-md-12" style="margin:0px;padding:0px">
                              <label class="radio-inline">
                                <input type="radio" name="jawaban[{{$key}}]" class="styled" value="3" required>
                                Sering
                              </label>
                            </div>
                          </div>
                        </td>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </fieldset>
            <div id="div-back">
                <div class="col-xs-6">
                    <a href="{{route('warga.list',$trigTel)}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
                </div>
                <div class="col-xs-6 text-right">
                    <a id="btn-lanjutkan" class="btn btn-primary bg-primary-800">Lanjutkan <i class="icon-arrow-right14 position-right"></i></a>
                </div>
            </div>
            <div id="div-save" style="display:none">
                <div class="col-xs-6">
                    <a id="btn-sebelumnya" type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Sebelumnya</a>
                </div>
                <div class="col-xs-6 text-right" id="simpan">
                    <button type="submit" class="btn btn-primary bg-primary-800">Simpan <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
@push('after_script')
<script>
  $(document).ready(function () {
      $("#btn-lanjutkan").on("click", function () {
          $('#div-back').hide();
          $('#div-save').fadeIn();
          $('#div-alert').hide();
          $('#div-table').fadeIn();
      });
      $("#btn-sebelumnya").on("click", function () {
          $('#div-back').fadeIn();
          $('#div-save').hide();
          $('#div-alert').fadeIn();
          $('#div-table').hide();
      });
  });
</script>
@endpush
