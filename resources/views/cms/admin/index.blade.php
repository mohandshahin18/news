@extends('cms.parent')


@section('title' , 'Index Admin')

@section('styles')

<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('main-title' , 'Index Admin')

@section('sub-title' , 'index admin')

@section('admin_open' , 'menu-is-opening menu-open')
@section('admin_active' , 'active')
@section('admin-index-active' , 'active')


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          @can('Create-Admin')
          <a href="{{ route('admins.create') }}"  class="btn btn-primary">Add New Admin</a>

          @endcan





          <div class="card-tools">
            <form action="" method="POST">
                  <div class="col-md-6" >
                     <div class="input-group mb-3" style="width: 230px;">
                            <input type="text" class="form-control live-search-box" placeholder="Search admin" >
                                <div class="input-group-prepend">
                                        <span class="input-group-text " id="basic-addon1" > <i class="fas fa-search"></i></span>
                                </div>
                     </div>
                 </div>
            </form>
          </div>



        </div>


        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th> Name</th>
                {{-- <th>Country</th> --}}
                <th>Email</th>
                <th>Mobile</th>
                {{-- <th>Gender</th> --}}
                {{-- <th>Status</th> --}}
                <th>Role Name</th>

                <th>Image</th>
                @canAny(['Edit-Admin' , 'Delete-Admin'])
                <th>Settings</th>
                @endcanAny
              </tr>
            </thead>
            <tbody>

                @foreach($admins as $admin)

                    <tr class="live-search-list">
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->user ? $admin->user->firstname . " " . $admin->user->lastname: "Not Found" }}</td>
                        {{-- <td>{{ $admin->user->country ? $admin->user->country->country_name : "Not Found"}}</td> --}}
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->user ? $admin->user->mobile : "Not Found"}}</td>
                        {{-- <td>{{ $admin->user ? $admin->user->gender : "Not Found"}}</td> --}}
                        {{-- <td>{{ $admin->user ? $admin->user->status : "Not Found" }}</td> --}}

                        @foreach($admin->roles as $role)
                            <td>{{ $role->name ? $role->name : "Not Found"}}</td>
                        @endforeach

                        <td>
                            <img class="img-circle img-bordered-sm" src="{{ asset('storage/images/admin/'.$admin->user->image) }}" width="50" height="50" alt="User Image">

                        </td>


                        @canAny(['Edit-Admin' , 'Delete-Admin'])
                        <td>
                            <div style="display: flex; gap: 5px;">
                                @can('Edit-Admin')
                                <a href="{{ route('admins.edit' , $admin->id )}}" type="button" class="btn btn-primary">Edit</a>
                                @endcan

                                @can('Delete-Admin')
                                {{-- @if(Auth::guard('admin')->id() == 1) --}}
                                <a href="#" onclick="performDestroy({{ $admin->id }},this)" type="button" class="btn btn-danger">Delete</a>

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


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $admins->links() }}
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
            let url  = '/cms/admin/admins/'+id;
            confirmDestroy(url,referance);
        }

        ////////////////////////////////////////////


    </script>
@endsection

