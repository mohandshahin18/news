@extends('cms.parent')


@section('title' , 'Edit Slider')

@section('styles')

@endsection

@section('main-title' , 'Edit Slider')

@section('sub-title' , 'edit Slider')


@section('slider_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Slider</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>

          <div class="card-body">


            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" value="{{ $sliders->image }}" name="image" id="image"  placeholder="Enter image of Slider">
              </div>



            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ $sliders->title}}">
            </div>
            <div class="form-group col-md-12">
                <label for="description">  Description</label>
                <textarea class="form-control" rows="3"  name="description" id="description"  value=""  placeholder="Enter Description of Article "> {{ $sliders->description}}</textarea>
            </div>


          <!-- /.card-body -->

          <div class="card-footer">
            <a onclick=" performUpdate({{ $sliders->id }},this) " type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('sliders.index') }}" type="button" class="btn btn-primary">Return Back</a>
          </div>
        </form>
      </div>
</div>
</div>


@endsection


@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('title',document.getElementById('title').value);
        formData.append('description',document.getElementById('description').value);

        storeRoute('/cms/admin/update_sliders/'+id , formData);
    }
</script>

@endsection

