@extends('cms.parent')


@section('title' , 'Edit Role')

@section('styles')

@endsection

@section('main-title' , 'Edit Role')

@section('sub-title' , 'edit role')


@section('role_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">



          <div class="row">
            <div class="form-group col-md-6">
                <label for="guard_name">Guard Name</label>
                <select class="form-control " name="guard_name" id="guard_name" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="admin" @if($roles->guard_name == 'admin') selected @endif>Admin</option>
                    <option value="author" @if($roles->guard_name == 'author') selected @endif>Auhtor</option>
                    <option value="web" @if($roles->guard_name == 'web') selected @endif>User</option>

                </select>

            </div>

            <div class="form-group col-md-6">
              <label for="name">Name Of Role</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $roles->name }}" placeholder="Enter name of Role">
            </div>
          </div>




          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick=" performUpdate({{ $roles->id }},this) "  type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('roles.index') }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performUpdate(id){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('guard_name',document.getElementById('guard_name').value);

            storeRoute('/cms/admin/update_roles/'+id , formData);

        }
    </script>


@endsection

