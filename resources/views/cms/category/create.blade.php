@extends('cms.parent')


@section('title' , 'Create Category')

@section('styles')

@endsection

@section('main-title' , 'Create Category')

@section('sub-title' , 'create category')


@section('category_open' , 'menu-is-opening menu-open')
@section('category_active' , 'active')
@section('category-create_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name of Category">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3"  name="description" id="description"  placeholder="Enter Description of Category "></textarea>
              </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('categories.index') }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('description',document.getElementById('description').value);

            store('/cms/admin/categories' , formData);
        }
    </script>


@endsection

