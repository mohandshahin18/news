@extends('cms.parent')


@section('title' , 'Edit Category')

@section('styles')

@endsection

@section('main-title' , 'Edit Category')

@section('sub-title' , 'edit category')


@section('category_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Edit Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

            <div class="card-body">



            <div class="form-group col-md-12">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $categories->name}}">
            </div>


            <div class="form-group col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3"  name="description" id="description"  value=""  placeholder="Enter Description of Category "> {{ $categories->description}}</textarea>
            </div>

        </div>



          <!-- /.card-body -->

          <div class="card-footer">
            <a onclick=" performUpdate({{ $categories->id }},this) " type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('categories.index') }}" type="button" class="btn btn-primary">Return Back</a>
          </div>
        </form>
      </div>
</div>

@endsection


@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('description',document.getElementById('description').value);

        storeRoute('/cms/admin/update_categories/'+id , formData);
    }
</script>

@endsection

{{--



            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $categories->name}}">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3"  name="description" id="description"  value=""  placeholder="Enter Description of Category "> {{ $categories->description}}</textarea>
            </div>

        </div>



    --}}
