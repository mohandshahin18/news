@extends('cms.parent')


@section('title' , 'Edit City')

@section('styles')

@endsection

@section('main-title' , 'Edit City')

@section('sub-title' , 'edit city')


@section('city_active' , 'active')

@section('content')

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit City</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>

          <div class="card-body">

            <div class="form-group">
                <label for="country_id">Name Country</label>
                <select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width: 100%;"   aria-hidden="true">
                    <option value="{{ $cities->country->id }}"  >{{ $cities->country->country_name }}</option>
                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach


                </select>

            </div>



            <div class="form-group">
              <label for="city_name">Name Of City</label>
              <input type="text" class="form-control" name="city_name" id="city_name" value="{{ $cities->city_name}}">
            </div>
            <div class="form-group">
              <label for="street">Street</label>
              <input type="text" class="form-control" name="street" id="street"value="{{ $cities->street}}"  >
            </div>

          </div>


          <!-- /.card-body -->

          <div class="card-footer">
            <a onclick=" performUpdate({{ $cities->id }},this) " type="button" class="btn btn-primary">Update</a>
            <a href="{{ route('cities.index') }}" type="button" class="btn btn-primary">Return Back</a>
          </div>
        </form>
      </div>
</div>


@endsection


@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('city_name',document.getElementById('city_name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id',document.getElementById('country_id').value);

        storeRoute('/cms/admin/update_cities/'+id , formData);
    }
</script>

@endsection

