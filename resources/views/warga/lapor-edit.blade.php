@extends('warga.layouts.app-login')
@section('content')
<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('warga.updateLaporan',$warga->id)}}" method="post" enctype="multipart/form-data" files=true>
                {{ csrf_field() }}
                <fieldset class="content-group">
                  <legend class="text-bold"> Skrining COVID-19</legend>
                  <table class="table">
              			<thead>
              				<tr>
                        <th>No</th>
              					<th>Pertanyaan</th>
              					<th class="col-md-2">Jawaban</th>
              				</tr>
              			</thead>
                    @foreach ($pertanyaan as $key => $value)
              			<tbody>
                        <td width="57px">{{$key+1}}</td>
                        <td>{{$value->pertanyaan}}</td>
                        <td>
                          <div class="form-group">
                            <input type="hidden" name="pertanyaan_id[{{$key}}]" value="{{$value->id}}">
        										<label class="radio-inline">
        											<input type="radio" name="jawaban[{{$key}}]" class="styled" value="ya" {{ ($jawaban[$key]['jawaban']=="ya")? "checked='checked'" : "" }}>
        											Ya
        										</label>
        										<label class="radio-inline">
        											<input type="radio" name="jawaban[{{$key}}]" class="styled" value="tidak" {{ ($jawaban[$key]['jawaban']=="tidak")? "checked='checked'" : "" }}>
        											Tidak
        										</label>
        									</div>
                        </td>
              			</tbody>
                    @endforeach
              		</table>
                </fieldset>
            <div>

            <div class="col-xs-6">
                <a href="{{route('warga.detailLaporan',$warga->id)}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
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
@endsection
@push('after_script')
@endpush
