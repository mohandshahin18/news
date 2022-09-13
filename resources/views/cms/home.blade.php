@extends('cms.parent')

@section('title','Home')

@section('styles')

@endsection

@section('dashboard_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="row">

        @php
        use App\Models\Admin;
        $count = Admin::count('id');
        @endphp

        @canAny(['Index-Admin' , 'Create-Admin'])
        @if(Auth::guard('admin')->id())
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>Admins Numbers</h3>
                </div>
                <div class="icon">

                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admins.index')}}" class="small-box-footer">Read More <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        @endif
        @endcanAny



        @php
        use App\Models\Author;
        $serCount = Author::count('id');
        @endphp


        @canAny(['Index-Author' , 'Create-Author'])
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary text-center">
                <div class="inner">
                    <h3>{{$serCount}}</h3>

                    <h3>Authors Numbers</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                @if(Auth::guard('admin')->id())
                <a href="{{route('authors.index')}}" class="small-box-footer"> Read More <i class="fa fa-arrow-circle-left"></i></a>
                @elseif(Auth::guard('author')->id())
                <a href="{{route('index-author')}}" class="small-box-footer"> Read More <i class="fa fa-arrow-circle-left"></i></a>
                @endif
            </div>
        </div>
        <!-- ./col -->

        @endcanAny


        @php
        use App\Models\Article;
        $count = Article::count('id');
        @endphp


        @canAny(['Index-Article' , 'Create-Article'])
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-red text-center">
                        <div class="inner">
                            <h3>{{$count}}</h3>

                            <h3>Articles Numbers</h3>
                        </div>
                        <div class="icon">

                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('articles.index')}}" class="small-box-footer">Read More <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
        @endcanAny



        @php
        use App\Models\category;
        $serCount = category::count('id');
        @endphp

            @canAny(['Index-Category' , 'Create-Category'])
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-primary text-center">
                    <div class="inner">
                        <h3>{{$serCount}}</h3>

                        <h3>Categories Numbers</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    @if(Auth::guard('admin')->id())
                    <a href="{{route('categories.index')}}" class="small-box-footer"> Read More <i class="fa fa-arrow-circle-left"></i></a>
                    @elseif(Auth::guard('author')->id())
                    <a href="{{route('categories.index')}}" class="small-box-footer"> Read More <i class="fa fa-arrow-circle-left"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            @endcanAny



        @php
        use App\Models\Country;
        $count = Country::count('id');
        @endphp

        @canAny('Index-Country' , 'Create-Country')
        @if(Auth::guard('admin')->id())
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>Countries Numbers</h3>
                </div>
                <div class="icon">

                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('countries.index')}}" class="small-box-footer">Read More <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        @endif
        @endcanAny


        @php
        use App\Models\City;
        $serCount = City::count('id');
        @endphp

        @canAny(['Index-City' , 'Create-City'])
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-primary text-center">
                    <div class="inner">
                        <h3>{{$serCount}}</h3>

                        <h3>Cities Numbers</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('cities.index')}}" class="small-box-footer"> Read More <i class="fa fa-arrow-circle-left"></i></a>

                </div>
            </div>
            <!-- ./col -->
        @endcanAny





    </div>
</div>

@endsection

@section('scripts')

@endsection
