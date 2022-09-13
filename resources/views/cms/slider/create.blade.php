@extends('cms.parent')


@section('title' , 'Create Slider')

@section('styles')

@endsection

@section('main-title' , 'Create Slider')

@section('sub-title' , 'create slider')


{{-- @section('Slider_active' , 'active') --}}

@section('slider_open' , 'menu-is-opening menu-open')
@section('slider_active' , 'active')
@section('slider-create_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Slider</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">





            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image"  placeholder="Enter Image of Slider">
            </div>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title of Slider">
            </div>
            <div class="form-group">
                <label for="description"> Description</label>
                <textarea class="form-control" rows="3"  name="description" id="description"  placeholder="Enter  Description of Slider"></textarea>
              </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('sliders.index') }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('title',document.getElementById('title').value);
            formData.append('description',document.getElementById('description').value);

            store('/cms/admin/sliders' , formData);
        }
    </script>


@endsection

