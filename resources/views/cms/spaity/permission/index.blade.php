@extends('cms.parent')


@section('title' , 'Index Permission')

@section('styles')

@endsection

@section('main-title' , 'Index Permission')

@section('sub-title' , 'index permission')

@section('permission_active' , 'active')


@section('content')

@section('permission_open' , 'menu-is-opening menu-open')
@section('permission_active' , 'active')
@section('permission-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Permission</h3> --}}
          <a href="{{ route('permissions.create') }}" type="button" class="btn btn-primary">Add New Permission</a>


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
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($permissions as $permission)

                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td> <span class="badge bg-success">  {{ $permission->guard_name }} </span></td>

                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('permissions.edit' , $permission->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $permission->id }},this)" type="button" class="btn btn-danger">Delete</a>
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
        {{ $permissions->links() }}
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
            let url  = '/cms/admin/permissions/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

