@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<!-- Content area -->
<div class="content">
  <!-- State saving -->
	<div class="panel panel-flat">
    <div style="padding:20px">
      <div class="col-xs-6">
				<a href="{{route('warga.tambah',$warga->no_telepon)}}" class="btn btn-primary btn-sm bg-primary-800"><i class="icon-add position-left"></i>Tambah Anggota</a>
      </div>
			<!-- <div class="col-xs-6 text-right">
				<a href="{{url('/')}}" class="btn btn-primary btn-sm bg-primary-800"><i class="icon-checkmark-circle2 position-left"></i>Selesai Pengisian</a>
      </div> -->
      <input type="hidden" name="no_telepon" id="no_telepon" value="{{$warga->no_telepon}}">

      <table id="table-warga" class="table">
  			<thead>
  				<tr>
						<th width="37px">No</th>
            <th>Id</th>
            <th>NIK</th>
						<th>Nama</th>
            <th>Screening</th>
  					<th>Aksi</th>
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
var tableWarga;
  $(document).ready(function(){
		/* tabel user */
    tableWarga = $('#table-warga').DataTable({
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
          url: "{{ url('table/data-warga') }}",
          type: "GET",
          data: function (d) {
                d.no_telepon = $('#no_telepon').val()
              }
      },

      columns: [
					{ data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
          { data: 'id', name:'id', visible:false},
          { data: 'nik', name:'nik', visible:true},
					{ data: 'nama', name:'nama', visible:true},
          { data: 'screening', name:'screening', visible:true},
          { data: 'action', name:'action', visible:true},
          { data: '5', defaultContent: "", visible:false}
      ],
    });

    $('#table-warga tbody').on( 'click', 'button', function () {
        var data = tableWarga.row( $(this).parents('tr') ).data();
          swal({
          text: "Apakah Anda yakin ingin menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "{{ url('delete/data-warga') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableWarga.ajax.reload();
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
