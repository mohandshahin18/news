@extends('cms.parent')


@section('title' , 'Index Author')

@section('styles')

@endsection

@section('main-title' , 'Index Author')

@section('sub-title' , 'index author')

@section('author_open' , 'menu-is-opening menu-open')
@section('author_active' , 'active')
@section('author-index_active' , 'active')


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Author</h3> --}}
          <a href="{{ route('authors.create') }}" type="button" class="btn btn-primary">Add New Author</a>


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
                <th>Email</th>
                <th>Mobile</th>
                <th>Article</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Image</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($authors as $author)

                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->user ? $author->user->firstname . " " . $author->user->lastname : "Not Found"  }}</td>
                        {{-- <td>{{ $author->user ? $author->user->lastname : "Not Found"}}</td> --}}
                        <td>{{ $author->email }}</td>
                        <td>{{ $author->user ? $author->user->mobile : "Not Found"}}</td>
                        <td><a href="{{ route('indexArticle' , ['id'=>$author->id]) }}" class="btn btn-info"> ({{ $author->articles_count }})  articles/s  </a></td>
                        <td>{{ $author->user ? $author->user->gender : "Not Found"}}</td>
                        <td>{{ $author->user ? $author->user->status : "Not Found" }}</td>

                        <td>
                            <img class="img-circle img-bordered-sm" src="{{ asset('storage/images/author/'.$author->user->image) }}" width="50" height="50" alt="User Image">
                        </td>
                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('authors.edit' , $author->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $author->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              </div>
                        </td>
                      </tr>

                @endforeach



            </tbody>
          </table>
        </div>


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $authors->links() }}
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
            let url  = '/cms/admin/authors/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

