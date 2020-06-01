@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">Gambar</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
          <li><a href="{{route('dashboard.index')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
          <li>Galeri</li>
          <li class="active">Gambar</li>
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
        <a href="{{route('gambar.create')}}" class="btn btn-primary btn-sm bg-primary-800"><i class="icon-add position-left"></i>Tambah Data</a>
      </div>

      <table id="table-gambar" class="table">
  			<thead>
  				<tr>
            <th>Id</th>
            <th>No</th>
            <th>Judul</th>
  					<th>Deskripsi</th>
            <th>Gambar</th>
  					<th class="col-md-2">Aksi</th>
            <th></th>
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
var tableGambar;
  $(document).ready(function(){
		/* tabel user */
    tableGambar = $('#table-gambar').DataTable({
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
          url: "{{ url('table/data-gambar') }}",
          type: "GET",
      },

      columns: [
          { data: 'id', name:'id', visible:false},
          { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
          { data: 'judul_gambar', name:'judul_gambar', visible:true},
          { data: 'deskripsi', name:'deskripsi', visible:true},
          { data: 'gambar', name:'gambar', visible:true},
          { data: 'action', name:'action', visible:true},
          { data: '5', defaultContent: "", visible:false},
          { data: '6', defaultContent: "", visible:false}

      ],
    });

    $('#table-gambar tbody').on( 'click', 'button', function () {
        var data = tableGambar.row( $(this).parents('tr') ).data();
          swal({
          text: "Apakah Anda yakin ingin menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "{{ url('delete/data-gambar') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableGambar.ajax.reload();
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
