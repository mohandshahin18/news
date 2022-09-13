@extends('cms.parent')


@section('title' , 'Index Message')

@section('styles')

@endsection

@section('main-title' , 'Index Message')

@section('sub-title' , 'index message')

@section('message_active' , 'active')


@section('content')

@section('message_open' , 'menu-is-opening menu-open')
@section('message_active' , 'active')
@section('message-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Table Of Message</h3>


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
                <th> Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>

                @foreach($contacts as $contact)

                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->mobile }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>


                      </tr>

                @endforeach



            </tbody>
          </table>
        </div>


        <!-- /.card-body -->
      </div>
      <div style="display: flex; align-items: center; justify-content: center;">
        {{ $contacts->links() }}
    </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection


@section('scripts')

@endsection

