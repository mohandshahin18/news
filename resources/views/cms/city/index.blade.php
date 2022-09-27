@extends('cms.parent')


@section('title' , 'Index City')

@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('main-title' , 'Index City')

@section('sub-title' , 'index city')

@section('city_active' , 'active')


@section('content')

@section('city_open' , 'menu-is-opening menu-open')
@section('city_active' , 'active')
@section('city-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of City</h3> --}}
          @can('Create-City')
          <a href="{{ route('cities.create') }}" type="button" class="btn btn-primary">Add New City</a>

          @endcan


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <form action="" method="POST">
                    <input type="text" class="form-control"   placeholder="Search by city name" id="search">
                </form>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>City Name</th>
                <th>Street</th>
                @canAny(['Edit-City','Delete-City'])
                <th>Settings</th>
                @endcanAny
              </tr>
            </thead>
            <tbody>

                @foreach($cities as $city)

                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->country->country_name }}</td>
                        <td>{{ $city->city_name }}</td>
                        <td>{{ $city->street }}</td>
                        @canAny(['Edit-City','Delete-City'])
                        <td>
                            <div style="display: flex; gap: 5px;">
                                @can('Edit-City')
                                <a href="{{ route('cities.edit' , $city->id )}}" type="button" class="btn btn-primary">Edit</a>

                                @endcan
                                @can('Delete-City')
                                <a href="#" onclick="performDestroy({{ $city->id }},this)" type="button" class="btn btn-danger">Delete</a>

                                @endcan
                              </div>
                        </td>
                        @endcanAny

                      </tr>

                @endforeach



            </tbody>
          </table>
        </div>


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $cities->links() }}
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
            let url  = '/cms/admin/cities/'+id;
            confirmDestroy(url,referance);
        }




   

    </script>
@endsection

