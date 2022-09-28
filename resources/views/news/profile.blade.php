@extends('news.parent')

@section('title', 'Profile')


@section('style')

@endsection


@section('content')
<div class="container emp-profile shadow">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    {{-- @if(Auth::user()->image == null)
                    <img  src="{{ asset('cms/dist/img/user1.svg') }}" style="border: none"/>

                    @else
                    <img  src="{{ asset('storage/images/visitor/'.Auth::user()->image) }}"/>

                    @endif --}}


                    @if(Auth::user()->image == null)
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                                <div class="kt-avatar__holder" style="background-image: url({{ asset('cms/dist/img/user1.svg') }})"></div>
                            </div>
                    @else
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                                <div class="kt-avatar__holder" data-toggle="modal" data-target="#image" style="background-image: url({{ asset('storage/images/visitor/'.Auth::user()->image) }}); cursor:pointer;"></div>
                            </div>
                    @endif



                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{ auth('visitor')->user()->full_name }}
                            </h5>

                            <p class="proile-rating"></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
            {{-- <div class="col-md-2 ">
                <a href="{{ route('update_Profile_visitor' , Auth::guard('visitor')->id()) }}" class=" btn-block profile-edit-btn"><b>Edit Profile</b></a>

            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    {{-- <a href="#" onclick="performSUpdate({{ $visitors->id }})" type="button" class="btn btn-info">save</a> --}}

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth('visitor')->user()->full_name }}</p>
                                    </div>
                                </div>
                                @foreach($visitors as $visitor)
                                @if (Auth::guard('visitor')->id() == $visitor->id)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $visitor->email  }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $visitor->mobile  }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $visitor->gender  }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Date of birth</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $visitor->date_of_birth  }}</p>
                                    </div>
                                </div>

                                @endif
                                @endforeach
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

 <!-- Modal -->
 <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content"  style="background: transparent; box-shadow:unset; border: unset">

        <div class="modal-body">
                    @if (auth('visitor')->user()->image !='')
                    <img  src="{{ asset('storage/images/visitor/' . auth('visitor')->user()->image) }}"alt="User Image" style=" width: 100%; height: auto; border: 1px solid #fff">

                    @endif

        </div>

      </div>
    </div>
  </div>





@endsection

@section('scripts')



@endsection

