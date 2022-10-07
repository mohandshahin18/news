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
        {{-- <li class="breadcrumb-item active">{{ $articles->id }}</li> --}}
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded"  src="{{ asset('storage/images/article/'. $articles->image) }}" style="display: block; margin: auto;" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on  {{ $articles->created_at }} </p>
          {{-- <p>Posted on  {{ $articles->author_id }} </p> --}}

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
                        <textarea class="form-control" id="comment" name="comment" placeholder="Enter a comment" style="min-height: 80px !important"  rows="3"></textarea>
                        </div>
                        <input type="text" name="article_id" id="article_id" value="{{ $articles->id }}" readonly  hidden >
                        <input type="text" name="visitor_id" id="visitor_id" value="{{ auth('visitor')->user()->id  }}" readonly  hidden >
                        {{-- <input type="text" name="image" id="image" value="{{ auth('visitor')->user()->image  }}" readonly  hidden > --}}


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
                        <textarea class="form-control" placeholder="Enter a comment" style="min-height: 80px !important"  rows="3" ></textarea>
                        </div>

                        <button type="button" data-toggle="modal"  data-target="#login" class="btn btn-primary" >Submit</button>
                    </form>
                    </div>
                </div>
          @endif




            <div class="content-comment" >
                @foreach ($comments as $comment )

                @if($comment->article_id == $articles->id )



                      <!-- Single Comment -->
                      <div class="media mb-4 comment" >
                          @if($comment->visitor->image == null)
                          {{-- <img class="d-flex mr-3 rounded-circle" src="{{ asset('cms/dist/img/user1.svg') }}"  width="50" height="50" alt=""> --}}
                          <div class="img-comment" style="background-image: url({{ asset('cms/dist/img/user.png') }})"></div>


                          @else
                          {{-- <img class="d-flex mr-3 rounded-circle" src="{{ asset('storage/images/visitor/'. $comment->image) }}"  width="50" height="50" alt=""> --}}
                          <div class="img-comment" style="background-image: url({{ asset('storage/images/visitor/'.$comment->visitor->image) }})"></div>

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
                          {{ $comment->comment }} <br>
                          {{-- @if (Auth::guard('visitor')->id()) --}}
                          <div class="like-dev" >
                              @php
                                   $like_count = 0;
                                   $dislike_count = 0;

                                   $like_status = "btn-secondry";
                                   $dislike_status = "btn-secondry";
                              @endphp
                              @foreach ($comment->likes as $like )
                                  @php

                                      if($like->like == 1){
                                          $like_count++;
                                      }
                                      if($like->like == 0){
                                          $dislike_count++;
                                      }
                                      if (Auth::check()) {

                                          if($like->like == 1 && $like->visitor_id == Auth::user()->id ){
                                          $like_status = "btn-primary";
                                          }
                                          if($like->like == 0 && $like->visitor_id == Auth::user()->id ){
                                              $dislike_status = "btn-danger";
                                          }
                                      }
                                  @endphp
                              @endforeach

                              <span style="color: #74788d ; font-size: 13px; margin-right: 13px">{{ $comment->created_at->diffForHumans(); }}</span>
                              <button  type="button"  data-commentid="{{ $comment->id }}_l" data-like=" {{  $like_status }} " class="like btn {{ $like_status }} "  @if(Auth::check()==0) data-toggle="modal"  data-target="#login" @endif><span class="like_count"> {{  $like_count }}</span>  <i  class="fas fa-thumbs-up"  ></i> </button>
                              <button   type="button" data-commentid="{{ $comment->id }}_d" data-like=" {{  $dislike_status }}" class=" dislike btn {{  $dislike_status }} "  @if(Auth::check()==0) data-toggle="modal"  data-target="#login" @endif><span class="dislike_count">{{  $dislike_count }}</span>  <i  class="fas fa-thumbs-down"  ></i> </button>


                            </div>
                          {{-- <input type="text" value="{{ $comment->id }}" id="comment_id" name="" id="" hidden> --}}
                          {{-- @else --}}
                          {{-- {{-- <div class="like-dev"  data-toggle="modal"  data-target="#login"><i class="fas fa-thumbs-up  " aria-hidden="true"></i></div> --}}
                          {{-- <button type="button" data-toggle="modal"  data-target="#login" class="btn btn-secondry "><span>{{  $like_count }}</span> Like <i  class="fas fa-thumbs-up" aria-hidden="true" ></i> </button>
                          <button type="button" data-toggle="modal"  data-target="#login" class="btn btn-secondry"><span>{{  $dislike_count }}</span> Dislike <i  class="fas fa-thumbs-down" aria-hidden="true" ></i> </button> --}}
                          {{-- @endif --}}

                          </div>

                      </div>
                      <hr>
                      {{-- @else --}}

                @endif

                @endforeach
            </div>


          <div style="display: flex; align-items: center; justify-content: center;">
            {{-- {{ $comments->links() }} --}}
        </div>



        </div>


        <div class="col-md-4">

            @foreach($Allarticles as $Allarticle )
            @if($articles->category_id == $Allarticle->category_id )

            <!-- Side Widget -->
            <div class="card my-4 ">
                <a href="{{ route('news.detailes',$Allarticle->id) }}">
                    <h5 class="card-header title-same">{{$Allarticle->title}}</h5>
                </a>
                <div class="card-body same-news" style="">
                    <a href="{{ route('news.detailes',$Allarticle->id) }}"><img class="img-card"  src="{{ asset('storage/images/article/'. $Allarticle->image) }}" alt=""></a>
                <a href="{{ route('news.detailes',$Allarticle->id) }}"><p > {{$Allarticle->short_description}}</p></a>
                </div>
            </div>

            @endif
            @endforeach

          </div>





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
    <script type="text/javascript" src="{{ asset('cms/js/like.js') }}">    </script>
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('comment',document.getElementById('comment').value);
            formData.append('visitor_id',document.getElementById('visitor_id').value);
            // formData.append('image',document.getElementById('image').value);
            formData.append('article_id',document.getElementById('article_id').value);


            store('/home/comments' , formData);
        }




    function performDestroy(id , referance){
        let url  = '/home/comments/'+id;
        confirmDestroy(url,referance);
    }


    var url="{{ route('like') }}";
    var url_dis="{{ route('dislike') }}";
    var token ="{{ Session::token() }}" ;

    </script>




    @endsection

