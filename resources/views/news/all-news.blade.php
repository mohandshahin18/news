@extends('news.parent')

@section('title', 'All News')



@section('content')


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      {{-- @foreach ($categories as $category )
      @if($articles->category_id == $category->id ) --}}

      <h1 class="mt-4 mb-3">{{ $categories->name }}</h1>

      {{-- @endif
      @endforeach --}}

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $categories->name }}</li>
      </ol>


      @foreach ($articles as $article )
      {{-- @if($article->category_id == $categories->id) --}}


        <!-- news title One -->
        <div class="row">
            <div class="col-md-7">
            <a href="{{ route('news.detailes',$article->id) }}">
                <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{ asset('storage/images/article/'.$article->image) }}" alt="">
            </a>
            </div>
            <div class="col-md-5">
            <h3 style="height: 72px; overflow: hidden;">{{ $article->title }}</h3>
            <p style="height: 52px; overflow: hidden;">{{ $article->short_description }}</p>
            <a class="btn btn-primary" href="{{ route('news.detailes',$article->id) }}">View news title
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            </div>
        </div>
        <!-- /.row -->
        <hr>

      {{-- @endif --}}
      @endforeach


      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $articles->links() }}

    </div>


{{--
      <hr> --}}

    </div>
    <!-- /.container -->


    @endsection
