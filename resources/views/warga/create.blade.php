@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary">Lihat Data Penambah <i class="icon-user position-right"></i></button> -->

            <form class="form-horizontal form-validate-jquery" action="{{route('warga.store',$warga->no_telepon)}}" method="post" enctype="multipart/form-data" files=true>
              {{ csrf_field() }}

                <fieldset class="content-group col-md-12">
                    <legend class="text-bold">Tambah Data Anggota</legend>
                    <div class="alert alert-info no-border">
                      <span class="text-semibold"></span> Isikan data-data berikut sesuai dengan data anggota yang akan ditambahkan.
            		    </div>
                    <div class="form-group nama" id="">
                        <label class="control-label col-lg-3">Nomor Telepon <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="number" placeholder="08**********" maxlength="13" minlength="10" class="form-control" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required autofocus>
                            @if ($errors->has('nomor_telepon'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('nomor_telepon') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group nik" id="nik">
                      <label class="control-label col-lg-3">NIK <span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                        <input type="number" placeholder="NIK" class="form-control" maxlength="16" minlength="16" name="nik" value="{{ old('nik') }}" required autofocus>
                        @if ($errors->has('nik'))
                        <label style="padding-top:7px;color:#F44336;">
                          <strong><i class="fa fa-times-circle"></i> {{ $errors->first('nik') }}</strong>
                        </label>
                        @endif
                      </div>
                    </div>
                    <div class="form-group" id="">
                        <label class="control-label col-lg-3">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="date" name="tanggal_lahir" class="form-control" value="" placeholder="Tanggal lahir" required autofocus>
                              </div>
                            @if ($errors->has('nik'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('tanggal_lahir') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group nama" id="nama">
                        <label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Nama" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                            @if ($errors->has('nama'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('nama') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" class="form-control select-search" id="" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <optgroup label="Pilih Jenis Kelamin">
                                  <option value="laki-laki" {{collect(old('jenis_kelamin'))->contains('laki-laki') ? 'selected':''}}>Laki-laki</option>
                                  <option value="perempuan" {{collect(old('jenis_kelamin'))->contains('perempuan') ? 'selected':''}}>Perempuan</option>
                                </optgroup>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('jenis_kelamin') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="alert alert-info no-border">
                      <span class="text-semibold"></span> Alamat berikut diisi sesuai dengan alamat pada KTP.
            		    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Provinsi <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="hidden" name="provinsi" value="34" required autofocus>
                            <select class="form-control" name="" id="provinsi" disabled>
                                @foreach ($provinsi as $data)
                                <option value="34" {{ ($data->id == '34') ? 'selected' : '' }}>{{$data->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('provinsi'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('provinsi') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Kota / Kabupaten <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" name="kota_kabupaten" id="kabupaten" required>
                            </select>
                            @if ($errors->has('kota_kabupaten'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kota_kabupaten') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Kecamatan <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                            </select>
                            @if ($errors->has('kecamatan'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kecamatan') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Kelurahan <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                            </select>
                            @if ($errors->has('kelurahan'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kelurahan') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">RW <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" data-placeholder="Pilih RW" name="rw" id="rw" required>
                                <option value="">Pilih RW</option>
                                <optgroup label="Pilih RW">
                                  @for ($rw = 1; $rw <= 15; $rw++ )
                                  <option value="{{$rw}}" {{collect(old('rw'))->contains($rw) ? 'selected':''}}>RW {{$rw}}</option>
                                  @endfor
                                </optgroup>
                            </select>
                            @if ($errors->has('rw'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i>{{ $errors->first('rw') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">RT <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" data-placeholder="Pilih RT" name="rt" id="rt" required>
                                <option value="">Pilih RT</option>
                                <optgroup label="Pilih RT">
                                  @for ($rt = 1; $rt <= 53; $rt++ )
                                  <option value="{{$rt}}" {{collect(old('rt'))->contains($rt) ? 'selected':''}}>RT {{$rt}}</option>
                                  @endfor
                                </optgroup>
                            </select>
                            @if ($errors->has('rt'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('rt') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Status Kependudukan <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            @php
                              $status_kependudukan = ['Warga Setempat','Perantau'];
                            @endphp
                            <select name="status_kependudukan" data-placeholder="Pilih Status Kependudukan" class="form-control select-search" id="status_kependudukan" required>
                                <option value="">Pilih Status Kependudukan</option>
                                <optgroup label="Pilih Status Kependudukan">
                                  @foreach ($status_kependudukan as $key => $value)
                                  <option value="{{$value}}" {{collect(old('status_kependudukan'))->contains($value) ? 'selected':''}}>{{$value}}</option>
                                  @endforeach
                                </optgroup>
                            </select>
                            @if ($errors->has('status_kependudukan'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('status_kependudukan') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div id="div-lokasi-rantau" style="display:none">
                      <div class="alert alert-info no-border">
                        <span class="text-semibold"></span> Alamat perantau diisi sesuai dengan data lokasi rantau.
                      </div>
                      <div class="form-group" id="">
                          <label class="control-label col-lg-3">Tanggal Pulang <span class="text-danger">*</span></label>
                          <div class="col-lg-9">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="date" name="tanggal_pulang" id="tanggal_pulang" class="form-control" value="" placeholder="Tanggal pulang dari perantauan" autofocus>
                                </div>
                              @if ($errors->has('nik'))
                              <label style="padding-top:7px;color:#F44336;">
                              <strong><i class="fa fa-times-circle"></i> {{ $errors->first('tanggal_pulang') }}</strong>
                              </label>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-lg-3">Provinsi <span class="text-danger">*</span></label>
                          <div class="col-lg-9">
                              <select class="form-control" data-placeholder="Pilih Provinsi" name="provinsi_rantau" id="provinsi_rantau">
                                <option value="">Pilih Provinsi</option>
                                <optgroup label="Pilih Provinsi">
                                  @foreach ($provinsi as $data)
                                  <option value="{{$data->id}}" {{collect(old('provinsi_rantau'))->contains($data->id) ? 'selected':''}}>{{$data->name}}</option>
                                  @endforeach
                                </optgroup>
                              </select>
                              @if ($errors->has('provinsi_rantau'))
                              <label style="padding-top:7px;color:#F44336;">
                              <strong><i class="fa fa-times-circle"></i> {{ $errors->first('provinsi_rantau') }}</strong>
                              </label>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-lg-3">Kota / Kabupaten <span class="text-danger">*</span></label>
                          <div class="col-lg-9">
                              <select class="form-control" name="kota_kabupaten_rantau" id="kota_kabupaten_rantau">
                              </select>
                              @if ($errors->has('kota_kabupaten_rantau'))
                              <label style="padding-top:7px;color:#F44336;">
                              <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kota_kabupaten_rantau') }}</strong>
                              </label>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-lg-3">Kecamatan <span class="text-danger">*</span></label>
                          <div class="col-lg-9">
                              <select class="form-control" name="kecamatan_rantau" id="kecamatan_rantau">
                              </select>
                              @if ($errors->has('kecamatan_rantau'))
                              <label style="padding-top:7px;color:#F44336;">
                              <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kecamatan_rantau') }}</strong>
                              </label>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-lg-3">Kelurahan <span class="text-danger">*</span></label>
                          <div class="col-lg-9">
                              <select class="form-control" name="kelurahan_rantau" id="kelurahan_rantau">
                              </select>
                              @if ($errors->has('kelurahan_rantau'))
                              <label style="padding-top:7px;color:#F44336;">
                              <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kelurahan_rantau') }}</strong>
                              </label>
                              @endif
                          </div>
                      </div>
                    </div>
                </fieldset>

                <div class="col-md-12">

                    <div class="col-xs-6">
                        <a href="{{route('warga.list',$warga->no_telepon)}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="submit" class="btn btn-primary bg-primary-800">Simpan <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /content area -->

<!-- Primary modal -->
<div id="modal_theme_primary" class="modal fade">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Data Penambah</h6>
			</div>

			<div class="modal-body">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /primary modal -->
@endsection
@push('after_script')
<script>
  $(document).ready(function(){
    $('#status_kependudukan').change(function(){
        var status_kependudukan = $(this).find(":selected").val();
        if (status_kependudukan == 'Perantau') {
            $("#div-lokasi-rantau").slideDown('fast');
            $("#tanggal_pulang").prop('required',true);
            $("#provinsi_rantau").prop('required',true);
            $("#kota_kabupaten_rantau").prop('required',true);
            $("#kecamatan_rantau").prop('required',true);
            $("#kelurahan_rantau").prop('required',true);
        } else {
            $("#div-lokasi-rantau").slideUp('fast');
            $("#tanggal_pulang").prop('required',false);
            $("#provinsi_rantau").prop('required',false);
            $("#kota_kabupaten_rantau").prop('required',false);
            $("#kecamatan_rantau").prop('required',false);
            $("#kelurahan_rantau").prop('required',false);
        }
    });
    var status_kependudukan_old = $('#status_kependudukan').find(":selected").val();
    if (status_kependudukan_old == 'Perantau') {
        $("#div-lokasi-rantau").slideDown('fast');
        $("#tanggal_pulang").prop('required',true);
        $("#provinsi_rantau").prop('required',true);
        $("#kota_kabupaten_rantau").prop('required',true);
        $("#kecamatan_rantau").prop('required',true);
        $("#kelurahan_rantau").prop('required',true);
    } else {
        $("#div-lokasi-rantau").slideUp('fast');
        $("#tanggal_pulang").prop('required',false);
        $("#provinsi_rantau").prop('required',false);
        $("#kota_kabupaten_rantau").prop('required',false);
        $("#kecamatan_rantau").prop('required',false);
        $("#kelurahan_rantau").prop('required',false);
    }
    var status_kependudukan_perantau = $('#status_kependudukan_pelapor').find(":selected").val();
    if (status_kependudukan_perantau == 'Perantau') {
        $("#div-lokasi-rantau-pelapor").show();
    }
    $('#rt').select2();
    $('#rw').select2();
    $('#provinsi').select2();
    $('#provinsi_rantau').select2();
    $('#kabupaten').select2({
      ajax : {
          url :  "{{ url('select2/data-kabupaten') }}",
          dataType: 'json',
          data: {
            province_id : $('#provinsi').find(":selected").val()
          },
          processResults: function(data){
              return {
                  results: data
              };
          },
          cache : true,
      },
    });
    ajaxChained('#provinsi','#kabupaten','kabupaten');
    ajaxChained('#kabupaten','#kecamatan','kecamatan');
    ajaxChained('#kecamatan','#kelurahan','kelurahan');

    $('#kota_kabupaten_rantau').select2({
      ajax : {
          url :  "{{ url('select2/data-kabupaten') }}",
          dataType: 'json',
          data: {
            province_id : $('#provinsi_rantau').find(":selected").val()
          },
          processResults: function(data){
              return {
                  results: data
              };
          },
          cache : true,
      },
    });
    ajaxChained('#provinsi_rantau','#kota_kabupaten_rantau','kabupaten');
    ajaxChained('#kota_kabupaten_rantau','#kecamatan_rantau','kecamatan');
    ajaxChained('#kecamatan_rantau','#kelurahan_rantau','kelurahan');

    function ajaxChained(source,target,slug){
      $(source).on('change',function(){
      var pid = $(source+' option:selected').val();

      $.ajax({
            type: 'GET',
            url: "{{ url('select2/data') }}"+"/"+slug+"/"+pid,
            dataType: 'html',
            data: { id : pid },
            success: function(txt){
            }
        }).done(function(data){
            data = $.parseJSON(data);
            var list_html = '';
            $.each(data, function(i, item) {
                list_html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
            });
            $(target).html(list_html);
            $(target).select2({placeholder: data.length +' results'});
        });
      })
    }
  });

</script>
@endpush
