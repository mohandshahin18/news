@extends('cms.parent')

@section('title','Profile')

@section('styles')

@endsection


@section('sub-title' , 'profile')

@section('content')

<div class="container-fluid">
    {{-- <div class="name">
        <h3>Hello <i class=" fas fa-hand-middle-finger"></i>
        </i></h3>
    </div> --}}
    <div class="row">

        <div class="offset-1 col-md-10">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if (Auth::guard('admin')->id())
                    @if (auth('admin')->user()->image !='')
                  <a href="#" data-toggle="modal" data-target="#image">  <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/images/admin/' . auth('admin')->user()->image) }}"alt="User Image"></a>
                    @else
                    <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1.svg') }}"alt="User Image"  style="width: 100px;">
                    @endif
                    @endif


                     @if (Auth::guard('author')->id())
                    @if (auth('author')->user()->image !='')
                    <a href="# data-toggle="modal" data-target="#image""><img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/images/author/' . auth('author')->user()->image) }}"alt="User Image"></a>
                    @else
                    <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1.svg') }}"alt="User Image" style="width: 100px;">
                    @endif
                    @endif

                </div>

                @if (Auth::guard('admin')->id())
                <h3 class="profile-username text-center"> {{ auth('admin')->user()->full_name }}</h3>
                @elseif (Auth::guard('author')->id())
                <h3 class="profile-username text-center"> {{ auth('author')->user()->full_name }}</h3>

                @endif

                @php
                use App\Models\Admin;
                use App\Models\Author;

                use Spatie\Permission\Models\Role;
                $roles = Role::all();
                $admins=Admin::all();
                $authors=Author::all();

                @endphp


                @if(Auth::guard('admin')->id())
                    @foreach($admins as $admin)
                    @if (Auth::guard('admin')->id() == $admin->id)
                        @foreach($admin->roles as $role)
                        <p class="text-muted text-center">{{ $role->name}}</p>
                        @endforeach
                        @endif
                    @endforeach
                @elseif (Auth::guard('author')->id())
                        @foreach($authors as $author)
                        @if (Auth::guard('author')->id() == $author->id)
                            @foreach($author->roles as $role)
                            <p class="text-muted text-center">{{ $role->name}}</p>
                            @endforeach
                            @endif
                        @endforeach
                @endif


                @if(Auth::guard('admin')->id())

                @foreach($admins as $admin)
                @if (Auth::guard('admin')->id() == $admin->id)

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Mobile</b> <a class="float-right">{{ $admin->user->mobile }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $admin->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <a class="float-right">{{ $admin->user->gender }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>Date Of Birth</b> <a class="float-right">{{ $admin->user->date_of_birth }}</a>
                    </li>

                    <li class="list-group-item" >
                        @if($admin->user->status == 'active')
                        <b>Status</b> <a class="float-right" style="display: flex ; align-items: center; gap: 3px">  <span style="background: #28a745;  padding:5px; border-radius: 50%;">  </span>{{ $admin->user->status }}</a>
                        @elseif($admin->user->status == 'inactive')
                        <b>Status</b> <a class="float-right"> {{ $admin->user->status }}</a>

                        @endif
                    </li>

                    <li class="list-group-item">
                        <b>Country</b> <a class="float-right">{{ $admin->user->country->country_name }}</a>
                    </li>
                </ul>
                <a href="{{ route('edit-profile-admin') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                @endif
                @endforeach


                @elseif (Auth::guard('author')->id())
                @foreach($authors as $author)
                @if (Auth::guard('author')->id() == $author->id)

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Mobile</b> <a class="float-right">{{ $author->user->mobile }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $author->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <a class="float-right">{{ $author->user->gender }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>Date Of Birth</b> <a class="float-right">{{ $author->user->date_of_birth }}</a>
                    </li>

                    <li class="list-group-item" >

                        @if($author->user->status == 'active')
                        <b>Status</b> <a class="float-right" style="display: flex ; align-items: center; gap: 3px">  <span style="background: #28a745;  padding:5px; border-radius: 50%;">  </span>{{ $author->user->status }}</a>
                        @elseif($author->user->status == 'inactive')
                        <b>Status</b> <a class="float-right"> {{ $author->user->status }}</a>
                        @endif
                    </li>

                    <li class="list-group-item" >
                        <b>Country</b> <a class="float-right">{{ $author->user->country->country_name }}</a>
                    </li>
                </ul>

                <a href="{{ route('edit-profile-author') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                @endif
                @endforeach
                @endif

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>




    </div>
</div>


<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content"  style="background: transparent; box-shadow:unset; border: unset">

        <div class="modal-body">
            @if (Auth::guard('admin')->id())
                    @if (auth('admin')->user()->image !='')
                    <img  src="{{ asset('storage/images/admin/' . auth('admin')->user()->image) }}"alt="User Image" style=" width: 100%; height: auto;">

                    @endif
                    @endif


                     @if (Auth::guard('author')->id())
                    @if (auth('author')->user()->image !='')
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/images/author/' . auth('author')->user()->image) }}"alt="User Image" style=" width: 100%; height: auto;">

                    @endif
                    @endif
        </div>

      </div>
    </div>
  </div>



@endsection

@section('scripts')

@endsection
