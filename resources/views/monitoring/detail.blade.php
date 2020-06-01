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
            <li><a href="{{route('monitoring.index')}}">Monitoring</a></li>
            <li class="active">Detail</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
  <!-- State saving -->
	<div class="panel panel-flat">
    <div style="padding:20px">
      <div class="alert alert-info no-border col-md-12">
        <span class="text-semibold col-md-12">Detail Data Warga</span>
        <div class="col-md-12" style="padding-right:0px;">
          <div class="row">
            <div class="col-md-2">
              Nama
            </div>
            <div class="col-md-10">
              : {{$data->nama}}
            </div>
          </div>
        </div>
        <div class="col-md-12" style="padding-right:0px;">
          <div class="row">
            <div class="col-md-2">
              NIK
            </div>
            <div class="col-md-10">
              : {{$data->nik}}
            </div>
          </div>
        </div>
        <div class="col-md-12" style="padding-right:0px;">
          <div class="row">
            <div class="col-md-2">
              No Telepon
            </div>
            <div class="col-md-10">
              : {{$data->no_telepon}}
            </div>
          </div>
        </div>
        <div class="col-md-12" style="padding-right:0px;">
          <div class="row">
            <div class="col-md-2">
              RT / RW
            </div>
            <div class="col-md-10">
              : {{$data->rt}} / {{$data->rw}}
            </div>
          </div>
        </div>
      </div>
      <h4 class="text-center">Riwayat Skrining</h4>
      <table id="table-monitoring" class="table">
  			<thead>
  				<tr>
            <th>Id</th>
            <th style="width:5px">No</th>
            <th>Tanggal Skrining</th>
            <th>Hasil Skrining</th>
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
    data = {{$data->id}};
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
          url: "{{ url('table/data-monitoring') }}"+"/"+data,
          type: "GET",
      },

      columns: [
          { data: 'id', name:'id', visible:false},
          { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
          { data: 'tanggal_pengisian', name:'tanggal_pengisian', visible:true},
          { data: 'hasil_skors.hasil', name:'hasil_skors.hasil', visible:true},
          { data: '5', defaultContent: "", visible:false},
          { data: '5', defaultContent: "", visible:false}
      ],
    });
  });

</script>
@endpush
