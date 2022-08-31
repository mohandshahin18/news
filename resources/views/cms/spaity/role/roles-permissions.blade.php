@extends('cms.parent')

@section('title' , 'Role-Permission')

@section('main-title' , 'Role-Permission')

@section('sub-title' , 'Role-Permission')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header ">
                        <h3 class="card-title"></h3>

                                  <div class="card-tools">
                            <div class="mx-auto pull-right">
                                <div class="">
                                    <form action="" method="GET" role="search">
                                        <div class="input-group input-group-sm" style="width: 500px;">

                                            <input type="text" class="form-control mr-2"  @if( request()->name) value={{request()->name}} @endif name="name" placeholder="Search name" id="name">
                                            <input type="text" class="form-control mr-2"  @if( request()->guard_name) value={{request()->guard_name}} @endif name="guard_name" placeholder="Search guard name" id="guard_name">

                                            <div class="input-group-append">
                                              <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                              </button>
                                            </div>
                                          </div>
                                </div>
                            </div>

                        </div>
                     </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table-striped text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Permission </th>
                              <th>Guard Name</th>
                              <th>Setting</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                              {{-- <span class="tag tag-success">Approved</span>s --}}
                              <td>{{$permission->id}}</td>
                              <td>{{$permission->name}}</td>
                              <td>{{$permission->guard_name}}</td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="permission_{{$permission->id}}"
                                    onchange="storeRolePermission({{$roleId}},{{$permission->id}})" @if($permission->active) checked
                                  @endif>
                                  <label for="permission_{{$permission->id}}">
                                  </label>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <a href="{{ route('roles.index') }}" type="button"  class="btn btn-primary">Return Back</a>
                    </div>

                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
            </section>
            @endsection

            @section('scripts')

            <script>
              function storeRolePermission(roleId, permissionId){
                let data = {
                  permission_id: permissionId,
                };
                store('/cms/admin/roles/'+roleId+'/permissions',data);
              }
            </script>
            @endsection
