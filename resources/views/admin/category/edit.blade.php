@extends('layouts.admin_layout')


@section('title', 'Редагування категорії')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редагування категорії: {{ $categories['title'] }}</h1>
      </div><!-- /.col -->
      </div><!-- /.row -->
      @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
  <div class="row">
    <div class = "col-lg-12">
    <div class="card card-primary">

   <!-- /.card-header -->
   <!-- form start -->
   <form action="{{ route('category.update', $categories['id']) }}" method="Post">
    @method('Put')
     @csrf
       <div class="card-body">
       <div class="form-group">
         <label for="exampleInputEmail1">Назва</label>
         <input type="text" value="{{ $categories['title'] }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введіть назву категорії" required>
       </div>
     </div>
     <!-- /.card-body -->

     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Обновити</button>
     </div>
   </form>
 </div>
 <!-- /.card -->
  </div>
    </div>
</section>
<!-- /.content -->

@endsection
