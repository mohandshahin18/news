@extends('cms.parent')


@section('title' , ' Edit Password')

@section('styles')

@endsection

@section('main-title' , ' Edit Password')

@section('sub-title' , ' edit password')



@section('passwoed_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input type="password" class="form-control"  id="current_password"  placeholder="Enter the Current Password">
            </div>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control"  id="new_password" placeholder="Enter the New Password">
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control"  id="new_password_confirmation" placeholder="Password Confirmation">
              </div>



          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performUpdate()" type="button" class="btn btn-primary">Update</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performUpdate(){
            let formData = new FormData();
            formData.append('current_password',document.getElementById('current_password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);

            store('/cms/admin/update/password' , formData);

        }
    </script>


@endsection

