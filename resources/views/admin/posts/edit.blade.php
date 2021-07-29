@extends('layouts.admin_layout')


@section('title', 'Редагувати статтю')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редагувати статтю: {{$posts['title']}}</h1>
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
   <form action="{{ route('posts.update', $posts['id']) }}" method="POST">
     @csrf
     @method('PUT')
     <div class="card-body">
       <div class="form-group">
         <label for="exampleInputEmail1">Назва</label>
         <input type="text" value="{{$posts['title']}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введіть назву статті" required>
       </div>

                    <div class="form-group">
                               <!-- select -->
                    <div class="form-group">
                      <label>Виберіть категорію</label>
                      <select name="cat_id" class="form-control" required>
                      @foreach($category as $categories)
                        <option value="{{$categories['id']}}" @if ($categories['id'] == $posts['cat_id']) selected @endif>{{$categories['title']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                      <div class="form-group">
                        <textarea name="text" class="editor">{{$posts['text']}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="feature_image">Зображення статті</label>
                        <img src="{{ $posts['img'] }}" alt="" class="img-uploaded" style="display:block; width: 300px">
                        <input type="text" value="{{ $posts['img'] }}" name="img" class="form-control" id="feature_image" name="feature_image" value="" readonly>
                        <a href=""  class="popup_selector" data-inputid="feature_image">Вибрати зображення</a>
                      </div>
                </div>
   </form>
    </div>



     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Зберегти</button>
     </div>
        </div>

 </div>
 <!-- /.card -->
  </div>

</section>
<!-- /.content -->

@endsection