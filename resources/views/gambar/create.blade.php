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
            <li><a href="{{route('gambar.index')}}">Gambar</a></li>
            <li class="active">Unggah</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('gambar.store')}}" method="post" enctype="multipart/form-data" files=true>
                {{ csrf_field() }}
                <fieldset class="content-group">
                <legend class="text-bold">Unggah Gambar</legend>
                <div class="form-group pertanyaan" id="pertanyaan">
                    <label class="control-label col-lg-3">Judul Gambar <span class="text-danger">*</span></label>
                    <div class="col-lg-9 pertanyaan-inner">
                        <textarea type="text" name="judul_gambar" rows="1" class="form-control" required placeholder="">{{ old('judul_gambar') }}</textarea>
                    </div>
                </div>
                <div class="form-group pertanyaan" id="pertanyaan">
                    <label class="control-label col-lg-3">Deskripsi <span class="text-danger">*</span></label>
                    <div class="col-lg-9 pertanyaan-inner">
                        <textarea type="text" name="deskripsi" rows="1" class="form-control" required placeholder="">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
                <div class="form-group pertanyaan" id="pertanyaan">
                    <label class="control-label col-lg-3">Url</label>
                    <div class="col-lg-9 pertanyaan-inner">
                        <textarea type="url" name="url" rows="1" class="form-control" placeholder="">{{ old('url') }}</textarea>
                    </div>
                </div>
                <div class="form-group pertanyaan" id="pertanyaan">
                    <label class="control-label col-lg-3">Gambar <span class="text-danger">*</span></label>
                    <div class="col-lg-9 pertanyaan-inner">
                        <input type="file" name="gambar" class="file-input-custom" data-show-caption="true" data-show-upload="false" accept="image/*">
                    </div>
                </div>
                </fieldset>
            <div>

            <div class="col-md-4">
                <a href="{{route('gambar.index')}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
            </div>
                <div class="col-md-8 text-right">
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
        $(document).ready(function(){
        });
    </script>
@endpush
