@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">Monitoring</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Monitoring</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
  <!-- State saving -->
	<div class="panel panel-flat">
    <div style="padding:20px">
      <!-- <div class="col-md-12" style="padding-right:0px;padding-bottom:15px">
          <div class="row">
            <div class="col-md-3">
              <select class="form-control" name="provinsi" id="provinsi">
                @foreach ($provinsi as $data)
                <option value="{{$data->id}}" {{ ($data->name == 'DI YOGYAKARTA') ? 'selected' : '' }}>{{$data->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten">
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" name="kecamatan" id="kecamatan">
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" name="kelurahan" id="kelurahan">
              </select>
            </div>
          </div>
      </div> -->
      <div class="col-md-6">
        <form class="" action="{{url('monitoring/export/')}}" method="get">
          <input type="hidden" id="xls-rw" name="rw">
          <input type="hidden" id="xls-rt" name="rt">
          <button type="submit" type="button" class="btn bg-primary-400 btn-labeled btn-labeled-left"><b><i class="icon-drawer-in"></i></b>Unduh Rekap</button>
        </form>
      </div>
      <div class="col-md-6" style="padding-right:0px;padding-bottom:15px">
          <div class="row">
            <div class="col-md-6 pull-right">
              <select class="form-control" data-placeholder="Filter RT" name="rt" id="rt" style="width=100%">
                <option value="">Filter RT</option>
                <optgroup label="Pilih RT">
                  <option value="">Semua RT</option>
                  @for ($rt = 1; $rt <= 53; $rt++ )
                  <option value="{{$rt}}" {{collect(old('rt'))->contains($rt) ? 'selected':''}}>RT {{$rt}}</option>
                  @endfor
                </optgroup>
              </select>
            </div>
            <div class="col-md-6 pull-right">
              <select class="form-control" data-placeholder="Filter RW" name="rw" id="rw" style="width=100%">
                <option value="">Filter RW</option>
                <optgroup label="Pilih RW">
                  <option value="">Semua RW</option>
                  @for ($rw = 1; $rw <= 15; $rw++ )
                  <option value="{{$rw}}" {{collect(old('rw'))->contains($rw) ? 'selected':''}}>RW {{$rw}}</option>
                  @endfor
                </optgroup>
              </select>
            </div>
          </div>
      </div>

      <table id="table-monitoring" class="table">
  			<thead>
  				<tr>
            <th>Id</th>
            <th>Nama</th>
  					<th>No Handphone</th>
            <th>NIK</th>
            <th>RW</th>
            <th>RT</th>
            <th>Kependudukan</th>
  					<!-- <th>Provinsi</th>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
  					<th>Kalurahan</th> -->
  					<th class="col-md-2">Aksi</th>
  				</tr>
  			</thead>
  			<tbody>
  			</tbody>
  		</table>
    </div>
	</div>
	<!-- /state saving -->
</div>
<!-- /content area -->
@endsection

@push('after_script')
<script>
var tableMonitoring;
  $(document).ready(function(){
		/* tabel user */
    tableMonitoring = $('#table-monitoring').DataTable({
      processing	: true,
			serverSide	: true,
			stateSave: true,
      language: {
                  search: "_INPUT_",
                  searchPlaceholder: "Cari data",
                  paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                  }
                },
      ajax		: {
          url: "{{ url('table/data-monitoring') }}",
          type: "GET",
          data: function (d) {
          d.provinsi = $('#provinsi').find(":selected").val(),
          d.kabupaten = $('#kabupaten').find(":selected").val(),
          d.kecamatan = $('#kecamatan').find(":selected").val(),
          d.kelurahan = $('#kelurahan').find(":selected").val(),
          d.rw = $('#rw').find(":selected").val(),
          d.rt = $('#rt').find(":selected").val()
          }
      },

      columns: [
          { data: 'id', name:'id', visible:false},
          { data: 'nama', name:'nama', visible:true},
          { data: 'no_telepon', name:'no_telepon', visible:true},
          { data: 'nik', name:'nik', visible:true},
          { data: 'rw', name:'rw', visible:true},
          { data: 'rt', name:'rt', visible:true},
          { data: 'kependudukan', name:'kependudukan', visible:true},
          // { data: 'provinsi', name:'provinsi', visible:true},
          // { data: 'kabupaten', name:'kabupaten', visible:true},
          // { data: 'kecamatan', name:'kecamatan', visible:true},
          // { data: 'kelurahan', name:'kelurahan', visible:true},
          { data: 'action', name:'action', visible:true},
      ],
    });

    $('#provinsi').change(function() {
      tableMonitoring.draw(true);
    });
    $('#kabupaten').change(function() {
      tableMonitoring.draw(true);
    });
    $('#kecamatan').change(function() {
      tableMonitoring.draw(true);
    });
    $('#kelurahan').change(function() {
      tableMonitoring.draw(true);
    });
    $('#rw').change(function() {
      tableMonitoring.draw(true);
      $('#xls-rw').val($('#rw').find(":selected").val());
    });
    $('#rt').change(function() {
      tableMonitoring.draw(true);
      $('#xls-rt').val($('#rt').find(":selected").val());
    });

    $('#table-monitoring tbody').on( 'click', 'button', function () {
      var data = tableMonitoring.row( $(this).parents('tr') ).data();
        swal({
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "{{ url('delete/data-monitoring') }}"+"/"+data['id'],
            method: 'get',
            success: function(result){
              tableMonitoring.ajax.reload();
              swal("Data yang dipilih berhasil dihapus!", {
                icon: "success",
              });
            }
          });
        } else {
          swal("Data Anda aman!");
        }
      });
    });

    $('#rt').select2();
    $('#rw').select2();
    $('#provinsi').select2();
    $('#kabupaten').select2({
      ajax : {
          url :  "{{ url('select2/data-kabupaten') }}",
          dataType: 'json',
          data: function(params){
              return {
                  term: params.term,
              };
          },
          processResults: function(data){
              return {
                  results: data
              };
          },
          cache : true,
      },
      placeholder: 'Kabupaten'
    });
    $('#kecamatan').select2({placeholder: 'Kecamatan'});
    $('#kelurahan').select2({placeholder: 'Kelurahan'});

    ajaxChained('#provinsi','#kabupaten','kabupaten');
    ajaxChained('#kabupaten','#kecamatan','kecamatan');
    ajaxChained('#kecamatan','#kelurahan','kelurahan');

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
