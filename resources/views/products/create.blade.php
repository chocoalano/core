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
          <li class="breadcrumb-item active">Data Produk</li>
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
            <a class="card-title mr-3" href="{{ route('products.index') }}"><i class="fas fa-backward"></i> Back</a>
            <h3 class="card-title">
              <i class="fas fa-plus-square"></i>
              Buat Product Baru
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
            <form id="product" action="{{ route('products.store') }}" method="post">
              @csrf
                 <div class="row">
            		    <div class="col-xs-12 col-sm-12 col-md-12">
            		        <div class="form-group">
            		            <strong>Name:</strong>
            		            <input type="text" name="name" class="form-control" placeholder="Name">
            		        </div>
            		    </div>
            		    <div class="col-xs-12 col-sm-12 col-md-12">
            		        <div class="form-group">
            		            <strong>Detail:</strong>
            		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            		        </div>
            		    </div>
            		    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            		            <button type="submit" class="btn btn-primary">Submit</button>
            		    </div>
            		</div>
            </form>
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
      document.getElementById('product').submit();
    }
  });
  $('#product').validate({
    rules: {
      name: {
        required: true
      },
      detail: {
        required: true
      },
    },
    messages: {
      name: "Please accept our name",
      detail: "Please accept our detail",
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
