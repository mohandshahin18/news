@extends('news.parent')


@section('title' , ' Edit Password')

@section('styles')

@endsection



@section('content')



<div class="background">

<main class="container">
    <div class= "row" id='passwordForm'>
      <section class="col-md-8 offset-md-2">
        <div class="card shadow p-5">
          <h3 class="text-uppercase text-center card-header mb-4">Change Password</h3>


          <form >
            @csrf
            <div class="form-group">
                <label for="current_password"> Current Password</label>
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
            <div class="form-group ">
                <a href="#" onclick="performUpdate()" type="button" class="btn btn-primary">Update</a>

              </div>


        </div>
      </section>
    </div>
</main>
</div>
@endsection


@section('scripts')
    <script>
        function performUpdate(){
            let formData = new FormData();
            formData.append('current_password',document.getElementById('current_password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);

            store('/home/update/password' , formData);

        }
    </script>


@endsection

