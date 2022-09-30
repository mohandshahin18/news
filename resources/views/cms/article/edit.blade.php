@extends('cms.parent')


@section('title' , 'Edit Article')

@section('styles')

@endsection

@section('main-title' , 'Edit Article')

@section('sub-title' , 'edit article')


@section('article_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Edit Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label for="category_id">Name Country</label>
                    <select class="form-control select2 select2-hidden-accessible" name="category_id" id="category_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="{{ $articles->category->id }}"  >{{ $articles->category->name }}</option>

                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}"  data-select2-id="3">{{ $category->name }}</option>

                        @endforeach


                    </select>

                </div>


                <input type="text" name="author_id" id="author_id" value="{{ $articles->author_id }}"  hidden>

            <div class="form-group col-md-12">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ $articles->title}}">
            </div>


            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control" value="{{ $articles->short_description}}" name="short_description" id="short_description"  placeholder="Enter Short Description of Article">
              </div>


            <div class="form-group col-md-12">
                <label for="full_description"> Full Description</label>
                <textarea class="form-control" rows="3"  name="full_description" id="full_description"  value=""  placeholder="Enter Description of Article "  > {{ $articles->full_description}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" value="{{ $articles->image }}" name="image" id="image"  placeholder="Enter image of Article">
              </div>

        </div>





          <!-- /.card-body -->

          <div class="card-footer">
            <a onclick=" performUpdate({{ $articles->id }},this) " type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('indexArticle' , $articles->author_id ) }}" type="button" class="btn btn-primary">Return Back</a>
          </div>
        </form>
      </div>
</div>

@endsection


@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('title',document.getElementById('title').value);
        formData.append('short_description',document.getElementById('short_description').value);
        formData.append('full_description',document.getElementById('full_description').value);
        formData.append('category_id',document.getElementById('category_id').value);
        // formData.append('role_id',document.getElementById('category_id').value);
            formData.append('author_id',document.getElementById('author_id').value);
            formData.append('image',document.getElementById('image').files[0]);


        storeRoute('/cms/admin/update_articles/'+id , formData);
    }
</script>

@endsection

