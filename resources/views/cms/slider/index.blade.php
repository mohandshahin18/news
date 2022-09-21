@extends('cms.parent')


@section('title' , 'Index Slider')

@section('styles')

@endsection

@section('main-title' , 'Index Slider')

@section('sub-title' , 'index slider')



@section('content')

@section('slider_open' , 'menu-is-opening menu-open')
@section('slider_active' , 'active')
 @section('slider-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of City</h3> --}}
          {{-- @can('Create-City') --}}
          <a href="{{ route('sliders.create') }}" type="button" class="btn btn-primary">Add New Image</a>

          {{-- @endcan --}}


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                {{-- @canAny(['Edit-City','Delete-City']) --}}
                <th>Settings</th>
                {{-- @endcanAny --}}
              </tr>
            </thead>
            <tbody>

                @foreach($sliders as $slider)

                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img class="img-bordered-sm" src="{{ asset('storage/images/slider/'.$slider->image) }}" width="50" height="50" alt="User Image">

                        </td>
                        <td style="max-width: 270px; overflow: hidden;">{{ $slider->title }}</td>
                        <td style="max-width: 270px; overflow: hidden;">{{ $slider->description }}</td>
                        {{-- @canAny(['Edit-City','Delete-City']) --}}
                        <td>
                            <div style="display: flex; gap: 5px;">
                                {{-- @can('Edit-City') --}}
                                <a href="{{ route('sliders.edit' , $slider->id )}}" type="button" class="btn btn-primary">Edit</a>

                                {{-- @endcan --}}
                                {{-- @can('Delete-City') --}}
                                <a href="#" onclick="performDestroy({{ $slider->id }},this)" type="button" class="btn btn-danger">Delete</a>

                                {{-- @endcan --}}
                              </div>
                        </td>
                        {{-- @endcanAny --}}

                      </tr>

                @endforeach



            </tbody>
          </table>
        </div>


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $sliders->links() }}
    </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection


@section('scripts')
    <script>
        function performDestroy(id , referance){
            let url  = '/cms/admin/sliders/'+id;
            confirmDestroy(url,referance);
        }
    </script>
@endsection

