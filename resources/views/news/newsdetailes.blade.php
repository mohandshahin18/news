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

          @if (Auth::guard('visitor')->id())
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                    <form>
                        <div class="form-group">
                        <textarea class="form-control" id="comment" name="comment" placeholder="Enter a comment"  rows="3"></textarea>
                        </div>
                        <input type="text" name="article_id" id="article_id" value="{{ $articles->id }}" readonly  hidden >
                        <input type="text" name="visitor_id" id="visitor_id" value="{{ auth('visitor')->user()->id  }}" readonly  hidden >
                        <input type="text" name="image" id="image" value="{{ auth('visitor')->user()->image  }}" readonly  hidden >


                        <button type="button" onclick="performStore()"  class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
                @else
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                    <form>
                        <div class="form-group">
                        <textarea class="form-control" placeholder="Enter a comment" rows="3" ></textarea>
                        </div>

                        <button type="button" data-toggle="modal"  data-target="#login" class="btn btn-primary" >Submit</button>
                    </form>
                    </div>
                </div>
          @endif






          @foreach ($comments as $comment )

          @if($comment->article_id == $articles->id )
                <!-- Single Comment -->
                <div class="media mb-4 comment">
                    @if($comment->image == null)
                    <img class="d-flex mr-3 rounded-circle" src="{{ asset('cms/dist/img/user1.svg') }}"  width="50" height="50" alt="">

                    @else
                    <img class="d-flex mr-3 rounded-circle" src="{{ asset('storage/images/visitor/'. $comment->image) }}"  width="50" height="50" alt="">

                    @endif


                    <div class="media-body ">
                        <div class="cont" style="display: flex; justify-content: space-between; align-items: center;">



                            <h5 class="mt-0" style="display: inline-block;"> {{ $comment->visitor->firstname . " " .$comment->visitor->lastname }}</h5>
                            @if (Auth::guard('visitor')->id())
                            @if(Auth::guard('visitor')->user()->id == $comment->visitor->id)
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="left: -60px;">
                                  <li>

                                    <button class="buuton-delete" type="button" onclick="performDestroy({{ $comment->id }},this)" style="" > Delete comment <i class="fas fa-trash-alt"></i></button>

                                  </li>


                                </ul>
                            </div>
                            @endif
                            @endif


                        </div>
                    {{ $comment->comment }}
                    @if (Auth::guard('visitor')->id())
                    <div class="like-dev"  ><i class="fas fa-thumbs-up  unLike" aria-hidden="true"></i></div>
                    @else
                    <div class="like-dev"  data-toggle="modal"  data-target="#login"><i class="fas fa-thumbs-up  " aria-hidden="true"></i></div>

                    @endif

                    </div>

                </div>
                <hr>
                {{-- @else --}}

          @endif

          @endforeach
          <div style="display: flex; align-items: center; justify-content: center;">
            {{ $comments->links() }}
        </div>



        </div>

        {{-- @foreach ($categories as $category )
        @if($articles->category_id == $category->id ) --}}

        <div class="col-md-4">

            @foreach($Allarticles as $article )
            {{-- @foreach ($categories as $category ) --}}
            {{-- @if($articles->category_id == $category->id ) --}}

            {{-- <h1 class="mt-4 mb-3">{{ $category->name }}</h1> --}}



            {{-- @if($article->category_id == $category->id ) --}}

            {{-- <input type="text" value="{{$articles->category_id  }}" name="" id=""> --}}
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
            {{-- @endif --}}

            {{-- @endif --}}

            {{-- @endforeach --}}
            @endforeach

          </div>

{{--
        @endif
        @endforeach --}}









      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #f0f8ff">
          <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div style="text-align: center">
            <h5 style="margin-bottom: 25px;">You must be logged</h5>
            <a href="{{ route('login') }}"  class="btn btn-primary"     style="margin-bottom: 12px;">login</a>
            <h5>or</h5>
            <a href="{{ route('register') }}"  class=""> Regestr now </a>
           {{-- <h5>Dont have accont? </h5> --}}

           </div>
        </div>

      </div>
    </div>
  </div>

    @endsection

    @section('scripts')

    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('comment',document.getElementById('comment').value);
            formData.append('visitor_id',document.getElementById('visitor_id').value);
            formData.append('image',document.getElementById('image').value);
            formData.append('article_id',document.getElementById('article_id').value);


            store('/home/comments' , formData);
        }

    //for button save & unsave in explore section
    $(".unLike").on("click",function(){
      $(this).toggleClass("unLike").toggleClass("like");
    });


    function performDestroy(id , referance){
        let url  = '/home/comments/'+id;
        confirmDestroy(url,referance);
    }
    </script>


    @endsection

