@extends('cms.parent')


@section('title' , 'Create Admin')

@section('styles')

@endsection

@section('main-title' , 'Create Admin')

@section('sub-title' , 'create admin')

@section('admin_open' , 'menu-is-opening menu-open')
@section('admin_active' , 'active')
@section('admin-create_active' , 'active')


@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


        <div class="row">

            {{-- <input type="text" name="country_id" id="country_id" value="{{ $id }}" class="form-control form-control-solid" hidden/> --}}

            <div class="form-group col-md-4">
                <label for="country_id"> Country Name</label>
                <select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"  >{{ $country->country_name }}</option>

                    @endforeach


                </select>

            </div>



            <div class="form-group col-md-4">
                <label for="role_id">Role Name</label>
                <select class="form-control select2 select2-hidden-accessible" name="role_id" id="role_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($roles as $role )
                    <option value="{{ $role->id }}"  data-select2-id="3">{{ $role->name }}</option>

                    @endforeach


                </select>

            </div>




            {{-- <div class="form-group col-md-4">
                <label for="city_name">Name City</label>
                <select class="form-control select2 select2-hidden-accessible" name="city_name" id="city_name" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($countries as $country )
                    <option value="{{ $country->cities->country_id }}"  data-select2-id="3">{{ $country->cities->city_name }}</option>

                    @endforeach


                </select>

            </div> --}}


            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Enter Mobile of Admin">
            </div>


            <div class="col-md-4">
                <div class="form-group ">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter First Name of Admin">
                  </div>
            </div>

           <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name of Admin">
                </div>

           </div>


           <div class="form-group col-md-4">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Enter Date of Birth of Admin">
          </div>


            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter Email of Admin">
              </div>


            <div class="form-group col-md-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password of Admin">
            </div>


              <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select class="form-control select2 select2-hidden-accessible" name="gender" id="gender" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                           <option value="">All</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                </select>

                </div>

                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select class="form-control select2 select2-hidden-accessible" name="status" id="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                               <option value="">All</option>
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                    </select>

                    </div>


{{--
            <div class="custom-file">

                <label class="custom-file-label" for="image">Choose Image</label>
                <input type="file" class="custom-file-input" name="image" id="image">

              </div> --}}


            <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter image of Admin">
              </div>








          </div>
        </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('admins.index') }}" type="button" class="btn btn-primary">Return Back</a>


        </div>
        </form>

    </div>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('firstname',document.getElementById('firstname').value);
            formData.append('lastname',document.getElementById('lastname').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('gender',document.getElementById('gender').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('image',document.getElementById('image').files[0]);

            formData.append('country_id',document.getElementById('country_id').value);
            formData.append('role_id',document.getElementById('role_id').value);

            store('/cms/admin/admins' , formData);
        }
    </script>


@endsection

