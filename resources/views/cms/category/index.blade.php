@extends('cms.parent')


@section('title' , 'Index Category')

@section('styles')

@endsection

@section('main-title' , 'Index Category')

@section('sub-title' , 'index category')

@section('category_open' , 'menu-is-opening menu-open')
@section('category_active' , 'active')
@section('category-index-active' , 'active')


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Category</h3> --}}
          @can('Create-Category')
          <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary">Add New Category</a>
          @endcan


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                @canAny(['Edit-Category','Delete-Category'])
                <th>Settings</th>
                @endcanAny
              </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name ?  $category->name : "Not Found"}}</td>
                        <td style="max-width: 120px;   overflow: hidden;">{{ $category->description ? $category->description : "Not Found"}}</td>
                        @canAny(['Edit-Category','Delete-Category'])
                        <td>
                            <div style="display: flex; gap: 5px;">
                                @can('Edit-Category')
                                <a href="{{ route('categories.edit' , $category->id )}}" type="button" class="btn btn-primary">Edit</a>

                                @endcan
                                @can('Delete-Category')
                                <a href="#" onclick="performDestroy({{ $category->id }},this)" type="button" class="btn btn-danger">Delete</a>

                                @endcan
                              </div>
                        </td>
                        @endcanAny

                      </tr>

                @endforeach



            </tbody>
          </table>
        </div>


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $categories->links() }}
    </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection


@section('scripts')
    <script>
        function performDestroy(id , referance){
            let url  = '/cms/admin/categories/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

