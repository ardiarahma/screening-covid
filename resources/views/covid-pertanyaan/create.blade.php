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
            <li class="active">Tambah</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('covid-pertanyaan.store')}}" method="post" enctype="multipart/form-data" files=true>
                {{ csrf_field() }}
                <fieldset class="content-group">
                <legend class="text-bold">Tambah Pertanyaan</legend>
                <div class="form-group">
                    <label class="control-label col-lg-3">Kategori <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <select name="kategori" class="form-control select-search" id="">
                            <option value="Riwayat Kesehatan">Riwayat Kesehatan</option>
                            <option value="Riwayat Perjalanan">Riwayat Perjalanan</option>
                            <option value="Riwayat Penyakit">Riwayat Penyakit</option>
                        </select>
                        @if ($errors->has('kategori'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('kategori') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group pertanyaan" id="pertanyaan">
                    <label class="control-label col-lg-3">Pertanyaan <span class="text-danger">*</span></label>
                    <div class="col-lg-9 pertanyaan-inner">
                        <textarea type="text" name="pertanyaan" rows="1" class="form-control" required placeholder="">{{ old('pertanyaan') }}</textarea>
                        <div class="btn-group" role="group">
                            <button type="button" value="" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                        </div>
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

@push('after_script')
    <script>
        $(document).ready(function(){

            function button () { return "<div class='btn-group' role='group'>"+
                            "<button type='button' value='' class='btn btn-default removeButton'><i class='fa fa-minus'></i></button>"+
                            "<button type='button' value='' class='btn btn-default addButton'><i class='fa fa-plus'></i></button>"+
                            "</div>"; }
            function buttonAdd () { return "<div class='btn-group' role='group'>"+
            "<button type='button' value='' class='btn btn-default addButton'><i class='fa fa-plus'></i></button>"+
            "</div>"; }

            var i = 1;
            $(document).on('click', '.addButton', function(){
                i = 1+i;
                var pertanyaan = $('#pertanyaan')
                $('.pertanyaan').find('.btn-group').remove();
                pertanyaan.clone().appendTo('.content-group').last().find('.pertanyaan-inner').append(button).find('textarea').attr('name', 'pertanyaan'+i);
            });
            $(document).on('click', '.removeButton', function(){

                var pertanyaan = $('.content-group')
                pertanyaan.children().last().remove();
                if (pertanyaan.children().find('div').length < 3) {
                    pertanyaan.children().last().find('.pertanyaan-inner').append(buttonAdd);
                } else {
                    pertanyaan.children().last().find('.pertanyaan-inner').append(button);
                }

            });

            jQuery.extend(jQuery.validator.messages, {
            required: "Bagian ini tidak boleh kosong.",
        });

        });
    </script>
@endpush
