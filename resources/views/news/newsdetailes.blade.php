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
          <img class="img-fluid rounded" src="{{ asset('storage/images/article/'. $articles->image) }}" style="display: block; margin: auto;" alt="">

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




        </div>

        @foreach ($categories as $category )
        @if($articles->category_id == $category->id )

        <div class="col-md-4">
            @foreach($category->articles as $article )

            <!-- Side Widget -->
            <div class="card my-4 ">
                <a href="{{ route('news.detailes',$article->id) }}">
                    <h5 class="card-header title-same">{{$article->title}}</h5>
                </a>
                <div class="card-body same-news" style="">
                    <a href="{{ route('news.detailes',$article->id) }}"><img class="img-card"  src="{{ asset('storage/images/article/'. $article->image) }}" alt=""></a>
                 <a href="{{ route('news.detailes',$article->id) }}"><p > {{$article->short_description}}</p></a>
                </div>
              </div>

            @endforeach

          </div>


        @endif
        @endforeach









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

