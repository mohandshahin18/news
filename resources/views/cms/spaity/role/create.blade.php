@extends('cms.parent')


@section('title' , 'Create Role')

@section('styles')

@endsection

@section('main-title' , 'Create Role')

@section('sub-title' , 'create Role')


{{-- @section('Role_active' , 'active') --}}

@section('role_open' , 'menu-is-opening menu-open')
@section('role_active' , 'active')
@section('role-create_active' , 'active')


@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


        <div class="row">
            <div class="form-group col-md-6">
                <label for="guard_name">Guard Name</label>
                <select class="form-control select2 select2-hidden-accessible" name="guard_name" id="guard_name" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                           <option value="">All</option>
                           <option value="admin">Admin</option>
                           <option value="author">Auhtor</option>
                           <option value="web">User</option>
                </select>

            </div>
            <div class="form-group col-md-6">
              <label for="name">Name Of Role</label>
              <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name of Role">
            </div>
        </div>




          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('roles.index') }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('guard_name',document.getElementById('guard_name').value);

            store('/cms/admin/roles' , formData);
        }
    </script>


@endsection

