@extends('news.parent')

@section('title', 'News Detailes')



@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      @foreach ($categories as $category )
      @if($articles->category_id == $category->id )

      <h1 class="mt-4 mb-3">{{ $category->name }}</h1>
      @endif
      @endforeach

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $articles->title }}</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{ asset('news/img/1.jpg') }}" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on  {{ $articles->created_at }} </p>

          <hr>

          <!-- Post Content -->
          <p class="lead">{{ $articles->short_description }}</p>

          <p>{{ $articles->full_description }}</p>





          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <input type="text" name="article_id" id="article_id" value="{{ $articles->id }}" readonly hidden  >


                {{-- <input type="text" value="{{ $comments->article_id }}" name="article_id" id="article_id"> --}}
                <button type="button" onclick="performStore()"  class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          {{-- @foreach ($comments as $comment ) --}}
          {{-- @endforeach --}}


          {{-- @foreach ($articles as $article ) --}}
          @foreach ($comments as $comment )
          @if($comment->article_id == $articles->id )
                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    {{ $comment->comment }}
                    </div>
                </div>
          @endif

          @endforeach
          {{-- @endforeach --}}




        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection

    @section('scripts')

    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('comment',document.getElementById('comment').value);
            formData.append('article_id',document.getElementById('article_id').value);


            store('/home/comments' , formData);
        }
    </script>

    @endsection

