@extends('cms.parent')


@section('title' , 'Index Article')

@section('styles')

@endsection

@section('main-title' , 'Index   Article ' )

@section('sub-title' , 'index article')

@section('article_open' , 'menu-is-opening menu-open')
@section('article_active' , 'active')
@section('my-article-index-active' , 'active')


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Category</h3> --}}

          @can('Create-Article')

          @if( Auth::guard('author')->id())
          <a href="{{ route('createAritcle' , $id) }}" type="button" class="btn btn-primary">Add New Article </a>
          @endif

          {{-- <a href="{{ route('createAritcle' , $id) }}" type="button" class="btn btn-primary">Add New Article </a> --}}

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
                {{-- <th>ID</th> --}}
                <th>Title</th>
                <th>Short Description</th>
                <th>Category</th>
                <th>Image</th>

                @canAny(['Edit-Article' , 'Delete-Article' ])
                <th>Settings</th>
                @endcanAny
              </tr>
            </thead>
            <tbody>

                @foreach($articles as $article)

                    <tr>
                        {{-- <td>{{ $article->id }}</td> --}}
                        <td style="max-width: 270px; overflow: hidden;">{{ $article->title ?  $article->title : "Not Found"}}</td>
                        <td  style="max-width: 270px; overflow: hidden;">{{ $article->short_description ? $article->short_description  : "Not Found"}}</td>
                        <td>{{ $article->category->name ?$article->category->name  : "Not Found"}}</td>
                        <td>
                            <img class=" img-bordered-sm" src="{{ asset('storage/images/article/'.$article->image) }}" width="50" height="50" alt="User Image">

                        </td>
                        @canAny(['Edit-Article' , 'Delete-Article' ])
                        <td>
                            <div style="display: flex; gap: 5px;">
                                @can('Edit-Article')
                                @if(Auth::guard('author' )->id())

                                <a href="{{ route('articles.edit' , $article->id )}}" type="button" class="btn btn-primary">Edit</a>
                                @endif

                                @endcan


                                @can('Delete-Article')
                                {{-- @if(Auth::guard('author' )->id() ) --}}
                                <a href="#" onclick="performDestroy({{ $article->id }},this)" type="button" class="btn btn-danger">Delete</a>
                                {{-- @endif --}}
                                @endcan

                              </div>
                        </td>
                        @endcanAny
                      </tr>

                @endforeach



            </tbody>
          </table>

        </div>


        <div class="card-footer" >
            @if( Auth::guard('admin')->id())
            <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>
            @elseif(Auth::guard('author')->id())
            <a href="{{ route('index-author') }}" type="button" class="btn btn-primary">Index Author</a>
            @endif
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

