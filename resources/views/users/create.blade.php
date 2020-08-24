@extends('layouts.app')
@section('css')
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Buat</a></li>
          <li class="breadcrumb-item active">Data User Baru</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <a class="card-title mr-3" href="{{ route('users.index') }}"><i class="fas fa-backward"></i> Kembali</a>
            <h3 class="card-title">
              <i class="fas fa-plus-square"></i>
              Buat User Baru
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Oops!</h5>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
            @endif
            {!! Form::open(array('route' => 'users.store','method'=>'POST','id'=>'user')) !!}
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Nama</strong></label>
                        <div>
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Email</strong></label>
                        <div>
                          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <div>
                          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Confirm Password</strong></label>
                        <div>
                          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','required')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for=""><strong>Role</strong></label>
                        <div>
                          {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="customFile"><strong>Foto User</strong></label>
                    <div class="custom-file">
                      {!! Form::file('foto', null, array('placeholder' => 'Foto User','class' => 'custom-file-input','id'=>'custom-file-input')) !!}
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('js')
<!-- jquery-validation -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      document.getElementById('user').submit();
    }
  });
  $('#user').validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true
      },
      password: {
        required: true
      },
      roles: {
        required: true
      },
    },
    messages: {
      name: "Please accept our name",
      email: "Please accept our email",
      password: "Please accept our password",
      roles: "Please accept our roles",
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection
