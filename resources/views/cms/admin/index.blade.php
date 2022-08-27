@extends('cms.parent')


@section('title' , 'Index Admin')

@section('styles')

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
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Admin</h3> --}}
          <a href="{{ route('admins.create') }}" type="button" class="btn btn-primary">Add New Admin</a>


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
                <th>ID</th>
                <th>First Namr</th>
                <th>Last Name</th>
                <th>Country</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Image</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($admins as $admin)

                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->user ? $admin->user->firstname : "Not Found" }}</td>
                        <td>{{ $admin->user ? $admin->user->lastname : "Not Found"}}</td>
                        <td>{{ $admin->user->country ? $admin->user->country->country_name : "Not Found"}}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->user ? $admin->user->mobile : "Not Found"}}</td>
                        <td>{{ $admin->user ? $admin->user->gender : "Not Found"}}</td>
                        <td>{{ $admin->user ? $admin->user->status : "Not Found" }}</td>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{ asset('storage/images/admin/'.$admin->user->image) }}" width="50" height="50" alt="User Image">

                        </td>
                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('admins.edit' , $admin->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $admin->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              </div>
                        </td>
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
    </script>
@endsection

