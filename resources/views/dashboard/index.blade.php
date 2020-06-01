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
      <div class="col-md-6">
        <form class="" action="{{url('persebaran-pemudik/export/')}}" method="get">
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

      <table id="table-persebaran" class="table">
  			<thead>
  				<tr>
            <th style="width:5px">No</th>
            <th>RW</th>
  					<th>RT</th>
            <th>Jumlah Pemudik</th>
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
var tablePersebaran;
  $(document).ready(function(){
    tablePersebaran = $('#table-persebaran').DataTable({
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
          url: "{{ url('table/data-hasil-monitoring') }}",
          type: "GET",
          data: function (d) {
            d.rw = $('#rw').find(":selected").val(),
            d.rt = $('#rt').find(":selected").val()
          }
      },

      columns: [
          { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
          { data: 'rw', name:'rw', visible:true},
          { data: 'rt', name:'rt', visible:true},
          { data: 'jumlah', name:'jumlah', visible:true},
          { data: '5', defaultContent: "", visible:false},
          { data: '5', defaultContent: "", visible:false}
      ],
    });

    $('#rw').change(function() {
      tablePersebaran.draw(true);
      $('#xls-rw').val($('#rw').find(":selected").val());
    });
    $('#rt').change(function() {
      tablePersebaran.draw(true);
      $('#xls-rt').val($('#rt').find(":selected").val());
    });
    $('#rt').select2();
    $('#rw').select2();
  });

</script>
@endpush
