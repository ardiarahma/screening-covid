@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">Skor</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Screening Psikis</li>
            <li class="active">Skor</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
  <!-- State saving -->
	<div class="panel panel-flat">
    <div style="padding:20px">
      <div class="col-md-1">
        <a href="{{route('psikis-skor.create')}}" class="btn btn-primary btn-sm bg-primary-800"><i class="icon-add position-left"></i>Tambah Data</a>
      </div>

      <table id="table-skor" class="table">
  			<thead>
  				<tr>
            <th>Id</th>
            <th>No</th>
            <th>Kategori</th>
  					<th>Tingkat</th>
            <th>Nilai Batas Bawah</th>
            <th>Nilai Batas Atas</th>
  					<th class="col-md-2">Aksi</th>
            <th></th>
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
var tableSkor;
  $(document).ready(function(){
		/* tabel user */
    tableSkor = $('#table-skor').DataTable({
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
          url: "{{ url('table/data-psikis-skor') }}",
          type: "GET",
      },

      columns: [
          { data: 'id', name:'id', visible:false},
          { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
          { data: 'kategori_hasil', name:'kategori_hasil', visible:true},
          { data: 'hasil', name:'hasil', visible:true},
          { data: 'batas_bawah', name:'batas_bawah', visible:true},
          { data: 'batas_atas', name:'batas_atas', visible:true},
          { data: 'action', name:'action', visible:true},
          { data: '5', defaultContent: "", visible:false}
      ],
    });

    $('#table-skor tbody').on( 'click', 'button', function () {
        var data = tableSkor.row( $(this).parents('tr') ).data();
          swal({
          text: "Apakah Anda yakin ingin menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "{{ url('delete/data-psikis-skor') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableSkor.ajax.reload();
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
  });

</script>
@endpush
