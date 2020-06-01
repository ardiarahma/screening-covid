@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">Pertanyaan</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
          <li><a href="{{route('dashboard.index')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
          <li>Screening Covid</li>
          <li><a href="{{route('covid-pertanyaan.index')}}">Pertanyaan</a></li>
          <li class="active">Ubah</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('covid-pertanyaan.update',$data->id)}}" method="post" enctype="multipart/form-data" files=true>
            @method('PUT')
            @csrf
                <fieldset class="content-group">
                <legend class="text-bold">Ubah Pertanyaan</legend>
                <div class="form-group">
                    <label class="control-label col-lg-3">Kategori <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        @php
                            $kategori = ['Riwayat Kesehatan','Riwayat Perjalanan','Riwayat Penyakit'];
                        @endphp
                        <select name="kategori" class="form-control select-search" id="">
                            @foreach ($kategori as $value)
                                <option value="{{$value}}" {{$data->kategori == $value ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('kategori'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kategori') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Pertanyaan <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <textarea type="text" name="pertanyaan" rows="1" class="form-control"  placeholder="">{{ $data->pertanyaan }}</textarea>
                        @if ($errors->has('pertanyaan'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('pertanyaan') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                </fieldset>
            <div>

            <div class="col-md-4">
                <a href="{{route('covid-pertanyaan.index')}}"type="button" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Kembali</a>
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
