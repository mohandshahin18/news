@extends('news.parent')

@section('title', 'Contact')


@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Contact Form -->

          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="mobile">Phone Number:</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="message">Message:</label>
                <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="button" onclick="performStore()"  class="btn btn-primary" >Send Message</button>
          </form>
        </div>

      </div>
      <!-- /.row -->



      <!-- /.row -->

    </div>
    <!-- /.container -->



    @endsection



    @section('scripts')
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    {{-- <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/contact_me.js') }}"></script> --}}


    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('message',document.getElementById('message').value);

            store('/home/contacts' , formData);
        }
    </script>

    @endsection
