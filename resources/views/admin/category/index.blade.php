
@extends('layouts.admin_layout')


@section('title', 'Всі категорії')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Всі категорії</h1>
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
    <div class="card">

            <div class="card-body p-0">
              <table class="table table-striped projects">
                  <thead>
                      <tr>
                          <th style="width: 5%">
                              ID
                          </th>
                          <th>
                              Назва
                          </th>

                        <th style="width: 20%">
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($get_category as $categories)

                        <tr>
                          <td>
                              {{ $categories['id'] }}
                          </td>
                          <td>
                            {{ $categories['title'] }}
                          </td>
                          <td>



                              <a class="btn btn-info btn-sm" href="{{ route('category.edit', $categories['id']) }} ">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Редагувати
                              </a>

                              <form action="{{ route('category.destroy', $categories['id']) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                  <i class="fas fa-trash">
                                  </i>
                                  Видалити
                              </button>
                            </form>
                          </td>
                      </tr>
                      @endforeach

                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
  </div>
</section>
<!-- /.content -->

@endsection
