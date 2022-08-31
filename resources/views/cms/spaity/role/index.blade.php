@extends('cms.parent')


@section('title' , 'Index Role')

@section('styles')

@endsection

@section('main-title' , 'Index Role')

@section('sub-title' , 'index role')

@section('Role_active' , 'active')


@section('content')

@section('role_open' , 'menu-is-opening menu-open')
@section('role_active' , 'active')
@section('role-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Role</h3> --}}
          <a href="{{ route('roles.create') }}" type="button" class="btn btn-primary">Add New Role</a>


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
                <th>Role Name</th>
                <th>Guard Name</th>
                <th>Permission</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($roles as $role)

                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td><a href="{{ route('roles.permissions.index'  , $role->id)  }}" class="btn btn-info" > ({{ $role->permissions_count }}) Permission/s</a></td>

                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('roles.edit' , $role->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $role->id }},this)" type="button" class="btn btn-danger">Delete</a>
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
        {{ $roles->links() }}
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
            let url  = '/cms/admin/roles/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

