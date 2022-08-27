@extends('cms.parent')


@section('title' , 'Edit Country')

@section('styles')

@endsection

@section('main-title' , 'Edit Country')

@section('sub-title' , 'edit country')


@section('country_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Country</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('countries.update' , $countries->id) }}" method="POST">
            @csrf
            @method('PUT')

          <div class="card-body">
            <div class="form-group">
              <label for="country_name">Name Of Contry</label>
              <input type="text" class="form-control" name="country_name" id="country_name" value="{{ $countries-> country_name}}" placeholder="Enter name of contry">
            </div>
            <div class="form-group">
              <label for="code">Code Of Country</label>
              <input type="text" class="form-control" name="code" id="code"value="{{ $countries-> code}}"  placeholder="Enter Code of country">
            </div>

            @if($errors->any())


            <div class="alert alert-danger alert-dismissible">
                {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
               @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
               @endforeach
            </div>

            @endif

            @if(session()->has('massage') )

            <div class="alert alert-success alert-dismissible">
                {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                <h5><i class="icon fas fa-check"></i> Success</h5>
               {{ session('massage') }}
            </div>

            @endif
          </div>


          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')

@endsection

