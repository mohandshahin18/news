@extends('cms.parent')


@section('title' , 'Create Article')

@section('styles')

@endsection

@section('main-title' , 'Create Article')

@section('sub-title' , 'create article')


@section('article_open' , 'menu-is-opening menu-open')
@section('article_active' , 'active')
@section('article-create_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">


            <div class="form-group">
                <label for="category_id">Name Category</label>
                <select class="form-control select2 select2-hidden-accessible" name="category_id" id="category_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}"  data-select2-id="3">{{ $category->name }}</option>

                    @endforeach


                </select>

            </div>


            <input type="text" name="author_id" id="author_id" value="{{ $id }}" hidden>



            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title"  placeholder="Enter Tilte of Article">
            </div>



            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control" name="short_description" id="short_description"  placeholder="Enter Short Description of Article">
              </div>

            <div class="form-group">
                <label for="full_description">Full Description</label>
                <textarea class="form-control" rows="3"  name="full_description" id="full_description"  placeholder="Enter Full Description of Article"  style="min-height: 80px !important"></textarea>
              </div>

              <div class="form-group ">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter image of Article">
              </div>



          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('indexArticle' , $id) }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('title',document.getElementById('title').value);
            formData.append('short_description',document.getElementById('short_description').value);
            formData.append('full_description',document.getElementById('full_description').value);
            formData.append('category_id',document.getElementById('category_id').value);
            formData.append('author_id',document.getElementById('author_id').value);
            formData.append('image',document.getElementById('image').files[0]);


            store('/cms/admin/articles' , formData);
        }
    </script>


@endsection

