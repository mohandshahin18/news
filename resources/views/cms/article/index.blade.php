@extends('cms.parent')


@section('title' , 'Index Article')

@section('styles')

@endsection

@section('main-title' , 'Index   Article ' )

@section('sub-title' , 'index article')

{{-- @section('article_open' , 'menu-is-opening menu-open') --}}
@section('article_active' , 'active')
{{-- @section('article-index-active' , 'active') --}}


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Category</h3> --}}
          <a href="{{ route('createAritcle' , $id) }}" type="button" class="btn btn-primary">Add New Article </a>


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
                <th>Title</th>
                <th>Short Description</th>
                <th>Category</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($articles as $article)

                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title ?  $article->title : "Not Found"}}</td>
                        <td >{{ $article->short_description ? $article->short_description  : "Not Found"}}</td>
                        <td>{{ $article->category->name ?$article->category->name  : "Not Found"}}</td>

                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('articles.edit' , $article->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $article->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              </div>
                        </td>
                      </tr>

                @endforeach



            </tbody>
          </table>

        </div>


        <div class="card-footer" >
            <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>
          </div>
        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $articles->links() }}
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
            let url  = '/cms/admin/articles/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

