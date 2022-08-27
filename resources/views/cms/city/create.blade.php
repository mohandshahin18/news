@extends('cms.parent')


@section('title' , 'Create City')

@section('styles')

@endsection

@section('main-title' , 'Create City')

@section('sub-title' , 'create city')


@section('city_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create City</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            @csrf

          <div class="card-body">



            <div class="form-group">
                <label for="country_id">Name Country</label>
                <select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"  data-select2-id="3">{{ $country->country_name }}</option>

                    @endforeach


                </select>

            </div>


            <div class="form-group">
              <label for="city_name">Name Of City</label>
              <input type="text" class="form-control" name="city_name" id="city_name"  placeholder="Enter name of city">
            </div>
            <div class="form-group">
              <label for="street">Street</label>
              <input type="text" class="form-control" name="street" id="street" placeholder="Enter street of City">
            </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" onclick="performStore()" type="button" class="btn btn-primary">Store</a>
            <a href="{{ route('cities.index') }}" type="button" class="btn btn-primary">Return Back</a>

          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
    <script>
        function performStore(){
            let formData = new FormData();
            formData.append('city_name',document.getElementById('city_name').value);
            formData.append('street',document.getElementById('street').value);
            formData.append('country_id',document.getElementById('country_id').value);

            store('/cms/admin/cities' , formData);
        }
    </script>


@endsection

