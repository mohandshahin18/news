@extends('cms.parent')


@section('title' , 'Index Country')

@section('styles')

@endsection

@section('main-title' , 'Index Country')

@section('sub-title' , 'index country')

@section('country_active' , 'active')


@section('content')


<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Table Of Country</h3>

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
                <th>Country Name</th>
                <th>Code</th>
                <th >Number Of Cities</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($countries as $country)

                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->country_name }}</td>
                        <td>{{ $country->code }}</td>
                        <td  ><p style="display: inline-block; background: #28a745; border: 1px solid #28a745;  color: #fff; padding: 8px; border-radius: 28%; margin: 0;" >{{ $country->cities_count }}</p></td>
                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('countries.edit' , $country->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <div>
                                    <form action="{{ route('countries.destroy' , $country->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </div>
                                {{-- <button type="button" class="btn btn-success">Information</button> --}}
                              </div>
                        </td>
                      </tr>

                @endforeach


            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $countries->links() }}
    </div>


      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection


@section('scripts')

@endsection

