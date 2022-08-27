@extends('cms.parent')


@section('title' , 'Edit Admin')

@section('styles')

@endsection

@section('main-title' , 'Edit Admin')

@section('sub-title' , 'edit admin')


{{-- @section('admin_open' , 'menu-is-opening menu-open') --}}
@section('admin_active' , 'active')
{{-- @section('index_active' , 'active') --}}

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


        <div class="row">
            <div class="form-group col-md-4">
                <label for="country_id">Name Country</label>
                <select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected  value="{{ $admins->user->country->id}}" >{{ $admins->user->country->country_name }}</option>

                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"  data-select2-id="3">{{ $country->country_name }}</option>

                    @endforeach


                </select>

            </div>



            <div class="col-md-4">
                <div class="form-group ">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $admins->user->firstname }}" placeholder="Enter First Name of Admin">
                  </div>
            </div>

           <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $admins->user->lastname }}" placeholder="Enter Last Name of Admin">
                </div>

           </div>

            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $admins->user->mobile }}" placeholder="Enter Mobile of Admin">
            </div>

            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"  value="{{ $admins->email }}" placeholder="Enter Email of Admin">
              </div>


            {{-- <div class="form-group col-md-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password of Admin">
            </div> --}}


              <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select class="form-control select2 select2-hidden-accessible" name="gender" id="gender" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                           <option selected >{{ $admins->user->gender }} </option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                </select>

                </div>

                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select class="form-control select2 select2-hidden-accessible" name="status" id="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                               <option selected>{{ $admins->user->status }}</option>
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                    </select>

                    </div>


            <div class="form-group col-md-4">
              <label for="date_of_birth">Date Of Birth</label>
              <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $admins->user->date_of_birth }}" placeholder="Enter Date of Birth of Admin">
            </div>

            <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input type="file" class="form-control" value="{{ $admins->user->image }}" name="image" id="image"  placeholder="Enter image of Admin">
              </div>

              {{-- <div class="custom-file col-md-8">

                <label class="custom-file-label" for="image">{{ $admins->user->image }}</label>
                <input type="file" value="{{ $admins->user->image }}" class="custom-file-input" name="image" id="image">

              </div> --}}








          </div>
        </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performSUpdate({{ $admins->id }})" type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('admins.index') }}" type="button" class="btn btn-primary">Return Back</a>


        </div>
        </form>

    </div>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performSUpdate(id){
            let formData = new FormData();
            formData.append('firstname',document.getElementById('firstname').value);
            formData.append('lastname',document.getElementById('lastname').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('gender',document.getElementById('gender').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('email',document.getElementById('email').value);
            // formData.append('password',document.getElementById('password').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('image',document.getElementById('image').files[0]);

            formData.append('country_id',document.getElementById('country_id').value);

            storeRoute('/cms/admin/update_admins/'+id , formData);
        }
    </script>


@endsection

