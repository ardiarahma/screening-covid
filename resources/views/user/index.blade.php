@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">User</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">User</li>
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
        <a href="{{route('user.create')}}" class="btn btn-primary btn-sm bg-primary-800"><i class="icon-add position-left"></i>Tambah Data</a>
      </div>

      <table id="table-user" class="table">
  			<thead>
  				<tr>
            <th>Id</th>
  					<th>Nama</th>
            <th>Email</th>
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
var tableUser;
  $(document).ready(function(){
		/* tabel user */
    tableUser = $('#table-user').DataTable({
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
          url: "{{ url('table/data-user') }}",
          type: "GET",
      },

      columns: [
          { data: 'id', name:'id', visible:false},
          { data: 'name', name:'name', visible:true},
          { data: 'email', name:'email', visible:true},
          { data: 'action', name:'action', visible:true},
          { data: 'created_at', name:'created_at', visible:false},
          { data: 'updated_at', name:'updated_at', visible:false}
      ],
    });

    $('#table-user tbody').on( 'click', 'button', function () {
        var data = tableUser.row( $(this).parents('tr') ).data();
          swal({
          text: "Apakah Anda yakin ingin menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "{{ url('delete/data-user') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableUser.ajax.reload();
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
