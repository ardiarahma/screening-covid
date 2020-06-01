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
            <li>Screening Covid</li>
            <li><a href="{{route('covid-skor.index')}}">Skor</a></li>
            <li class="active">Tambah</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('covid-skor.store')}}" method="post" enctype="multipart/form-data" files=true>
                {{ csrf_field() }}
                <fieldset class="content-group">
                <legend class="text-bold">Tambah Skor</legend>
                <div class="form-group">
                    <label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" name="hasil" class="form-control" value="{{ old('hasil') }}" placeholder="">
                        @if ($errors->has('hasil'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('hasil') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Nilai Batas Bawah <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="number" name="nilai_batas_bawah" class="form-control" value="{{ old('nilai_batas_bawah') }}" placeholder="">
                        @if ($errors->has('nilai_batas_bawah'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('nilai_batas_bawah') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Nilai Batas Atas <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="number" name="nilai_batas_atas" class="form-control" value="{{ old('nilai_batas_atas') }}" placeholder="">
                        @if ($errors->has('nilai_batas_atas'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('nilai_batas_atas') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Interpretasi</label>
                    <div class="col-lg-9">
                        <textarea type="text" name="interpretasi" rows="3" class="form-control"  placeholder="">{{ old('interpretasi') }}</textarea>
                        @if ($errors->has('interpretasi'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('interpretasi') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Tatalaksana</label>
                    <div class="col-lg-9">
                        <textarea type="text" name="tatalaksana" rows="3" class="form-control"  placeholder="">{{ old('tatalaksana') }}</textarea>
                        @if ($errors->has('tatalaksana'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('tatalaksana') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                </fieldset>
            <div>

            <div class="col-md-4">
                <a href="{{route('covid-skor.index')}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
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
