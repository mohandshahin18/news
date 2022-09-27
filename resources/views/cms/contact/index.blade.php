@extends('cms.parent')


@section('title' , 'Index Message')

@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />

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
            <div class="" style="width: 250px;">
                <form action="" method="POST">
                    <input type="text" class="form-control"   placeholder="Search by name" id="search">
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
        {{-- {{ $contacts->links() }} --}}
    </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection


@section('scripts')
<script>
    $('#search').on('keyup', function(){
        search();
    });
    search();
    function search(){
         var keyword = $('#search').val();
         $.post('{{ route("contact.search") }}',
          {
             _token: $('meta[name="csrf-token"]').attr('content'),
             keyword:keyword
           },
           function(data){
            table_post_row(data);
              console.log(data);
           });
    }
    // table row with ajax
    function table_post_row(res){
    let htmlView = '';
    if(res.contacts.length <= 0){
        htmlView+= `
           <tr>
              <td colspan="12" style="text-align: center;">No data.</td>
          </tr>`;
    }
    for(let i = 0; i < res.contacts.length; i++){
        htmlView += `
            <tr>
                  <td>`+res.contacts[i].id+`</td>
                  <td>`+res.contacts[i].name+`</td>
                   <td>`+res.contacts[i].mobile+`</td>
                   <td>`+res.contacts[i].email+`</td>
                   <td style="max-width: 340px; overflow: scroll;">`+res.contacts[i].message+`</td>
            </tr>`;
    }
         $('tbody').html(htmlView);
    }
    </script>
@endsection

