@extends('layouts.app')


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Lihat</a></li>
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
              Lihat data role
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for=""><strong>Nama Role</strong></label>
                        <input type="text" disabled value="{{$role->name}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group table-responsive">
                        <table class="table table-sm table-bordered">
                          <thead>
                            <tr>
                              <th width="10">No</th>
                              <th>Permission</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; ?>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                            <tr>
                              <td><div class="text-center">{{$no}}</div></td>
                              <td><label for="">{{ $v->name }}</label></td>
                            </tr>
                            <?php $no++; ?>
                                @endforeach
                            @endif
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
