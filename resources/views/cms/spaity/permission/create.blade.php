@extends('cms.parent')


@section('title' , 'Create Permission')

@section('styles')

@endsection

@section('main-title' , 'Create Permission')

@section('sub-title' , 'create permission')


{{-- @section('permission_active' , 'active') --}}

@section('permission_open' , 'menu-is-opening menu-open')
@section('permission_active' , 'active')
@section('permission-create_active' , 'active')


@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Permission</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">

{{--

            <div class="form-group">
                <label for="country_id">Name Country</label>
                <select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"  data-select2-id="3">{{ $country->country_name }}</option>

                    @endforeach


                </select>

            </div> --}}

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
              <label for="name">Name Of Permission</label>
              <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name of Permission">
            </div>
        </div>




          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('permissions.index') }}" type="button" class="btn btn-primary">Return Back</a>

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

            store('/cms/admin/permissions' , formData);
        }
    </script>


@endsection

