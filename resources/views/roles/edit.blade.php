@extends('layouts.app')


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Edit</a></li>
          <li class="breadcrumb-item active">Data Role</li>
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
            <a class="card-title mr-3" href="{{ route('roles.index') }}"><i class="fas fa-backward"></i> Kembali</a>
            <h3 class="card-title">
              <i class="fas fa-plus-square"></i>
              Edit data role
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            @if (count($errors) > 0)
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
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for=""><strong>Nama Role</strong></label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group table-responsive">
                        <table class="table table-sm table-bordered">
                          <thead>
                            <tr>
                              <th width="10">No</th>
                              <th>Permission</th>
                              <th width="10">Cek</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; ?>
                            @foreach($permission as $value)
                            <tr>
                              <td><div class="text-center">{{$no}}</div></td>
                              <td><label for="">{{ $value->name }}</label></td>
                              <td>
                                <div class="text-center">
                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                </div>
                              </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                          </tbody>
                        </table>
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
