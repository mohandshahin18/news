@extends('cms.parent')


@section('title' , 'Edit Author')

@section('styles')

@endsection

@section('main-title' , 'Edit Author')

@section('sub-title' , 'edit author')


{{-- @section('author_open' , 'menu-is-opening menu-open') --}}
@section('author_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Author</h3>
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
                    {{-- <option value="{{ $authors->id}}"  >{{ $authors->country->country_name }}</option> --}}
                    {{-- <option selected >{{ $authors->country->country_name }} </option> --}}

                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"  data-select2-id="3">{{ $country->country_name }}</option>

                    @endforeach


                </select>

            </div>



            <div class="col-md-4">
                <div class="form-group ">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $authors->user->firstname }}" placeholder="Enter First Name of Author">
                  </div>
            </div>

           <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $authors->user->lastname }}" placeholder="Enter Last Name of Author">
                </div>

           </div>

            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $authors->user->mobile }}" placeholder="Enter Mobile of Author">
            </div>

            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"  value="{{ $authors->email }}" placeholder="Enter Email of Author">
              </div>


            {{-- <div class="form-group col-md-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password of Author">
            </div> --}}


              <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select class="form-control select2 select2-hidden-accessible" name="gender" id="gender" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                           <option selected >{{ $authors->user->gender }} </option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                </select>

                </div>

                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select class="form-control select2 select2-hidden-accessible" name="status" id="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                               <option selected>{{ $authors->user->status }}</option>
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                    </select>

                    </div>


            <div class="form-group col-md-4">
              <label for="date_of_birth">Date Of Birth</label>
              <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $authors->user->date_of_birth }}" placeholder="Enter Date of Birth of Author">
            </div>

            <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input type="file" class="form-control" value="{{ $authors->user->image }}" name="image" id="image"  placeholder="Enter image of Author">
              </div>


            <div class="form-group col-md-4">
                <label for="file">File</label>
                <input type="file" class="form-control" value="{{ $authors->user->file }}" name="file" id="file"  placeholder="Enter image of Author">
              </div>







          </div>
        </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performSUpdate({{ $authors->id }})" type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>


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
            formData.append('file',document.getElementById('file').files[0]);

            formData.append('country_id',document.getElementById('country_id').value);

            storeRoute('/cms/admin/update_authors/'+id , formData);
        }
    </script>


@endsection

