@extends('layouts.app')
@section('content')
<!-- Content area -->
<div class="content">
    <!-- Profile info -->
    <!-- User thumbnail -->
    <div class="thumbnail">
        <div class="caption text-center">
        @php
        $role = Auth::user()->getRoleNames()->toArray();
        $role = implode(', ',$role);
        @endphp
            <h6 class="text-semibold no-margin">{{$data->name}} <small class="display-block">{{$role}}</small></h6>
        </div>
    </div>
    <!-- /user thumbnail -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Informasi Akun</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form action="{{route('user.update-profil',$data->id)}}" method="post" enctype="multipart/form-data" files=true>
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="text" readonly="readonly" name="name" value="{{$data->name}}" class="form-control">
                            @if ($errors->has('name'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('name') }}</strong>
                            </label>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" readonly="readonly" name="email" value="{{$data->email}}" class="form-control">
                            @if ($errors->has('email'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i> {{ $errors->first('email') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button id="back-profil" style="display:none" onclick="backProfile(); return false;" class="btn btn-default"><i class="icon-arrow-left13 position-left"></i> Kembali</button>
                    <button id="save-profil" style="display:none" type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
                <div class="text-right">
                    <button id="edit-profil" onclick="editProfile()" class="btn btn-primary">Ubah <i class="icon-arrow-right14 position-right"></i></button>
                </div>
        </div>
    </div>
    <!-- /profile info -->

    <!-- Account settings -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Pengaturan Akun</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form action="{{route('user.update-password',$data->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Password Baru</label>
                            <input type="password" readonly="readonly" name="password" placeholder="Masukkan password baru" class="form-control">
                            @if ($errors->has('password'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password') }}</strong>
                            </label>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label>Ulangi Password</label>
                            <input type="password" readonly="readonly" name="password_confirmation" placeholder="Ulangi password baru" class="form-control">
                            @if ($errors->has('password_confirmation'))
                            <label style="padding-top:7px;color:#F44336;">
                            <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password_confirmation') }}</strong>
                            </label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button id="back-password" style="display:none" onclick="backPassword(); return false;" class="btn btn-default"><i class="icon-arrow-left13 position-left"></i> Kembali</button>
                    <button id="save-password" style="display:none" type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
                <div class="text-right">
                    <button id="edit-password" onclick="editPassword()" class="btn btn-primary">Ubah <i class="icon-arrow-right14 position-right"></i></button>
                </div>
        </div>
    </div>
    <!-- /account settings -->
</div>
<!-- /content area -->
@endsection
@push('after_script')
<script>
    function editProfile() {
        $('#save-profil').show();
        $('#back-profil').show();
        $("input[name='name']").prop('readonly', false);;
        $("input[name='email']").prop('readonly', false);
        $('#edit-profil').hide();
    }
    function backProfile() {
        $('#save-profil').hide();
        $('#back-profil').hide();
        $("input[name='name']").prop('readonly', true);
        $("input[name='email']").prop('readonly', true);
        $('#edit-profil').show();
    }
    function editPassword() {
        $('#save-password').show();
        $('#back-password').show();
        $("input[name='password']").prop('readonly', false);
        $("input[name='password_confirmation']").prop('readonly', false);
        $('#edit-password').hide();
    }
    function backPassword() {
        $('#save-password').hide();
        $('#back-password').hide();
        $("input[name='password']").prop('readonly', true);
        $("input[name='password_confirmation']").prop('readonly', true);
        $('#edit-password').show();
    }
</script>
@endpush
