@extends('cms.parent')


@section('title' , 'Index Permission')

@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('main-title' , 'Index Permission')

@section('sub-title' , 'index permission')

@section('permission_active' , 'active')


@section('content')

@section('permission_open' , 'menu-is-opening menu-open')
@section('permission_active' , 'active')
@section('permission-index-active' , 'active')

<div class="container-fluid">
     <!-- /.row -->
 <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table Of Permission</h3> --}}
          <a href="{{ route('permissions.create') }}" type="button" class="btn btn-primary">Add New Permission</a>


          <div class="card-tools">
            <div class="" style="width: 250px;">
                <form action="" method="POST">
                    <input type="text" class="form-control"   placeholder="Search by permission name" id="search">
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
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>

                @foreach($permissions as $permission)

                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td> <span class="badge bg-success">  {{ $permission->guard_name }} </span></td>

                        <td>
                            <div style="display: flex; gap: 5px;">
                                <a href="{{ route('permissions.edit' , $permission->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="performDestroy({{ $permission->id }},this)" type="button" class="btn btn-danger">Delete</a>
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
        {{-- {{ $permissions->links() }} --}}
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
            let url  = '/cms/admin/permissions/'+id;
            confirmDestroy(url,referance);
        }


        $('#search').on('keyup', function(){
        search();
    });
    search();
    function search(){
         var keyword = $('#search').val();
         $.post('{{ route("permission.search") }}',
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
    if(res.permissions.length <= 0){
        htmlView+= `
           <tr>
              <td colspan="12" style="text-align: center;">No data.</td>
          </tr>`;
    }
    for(let i = 0; i < res.permissions.length; i++){
        htmlView += `
            <tr>
                  <td>`+res.permissions[i].id+`</td>
                  <td>`+res.permissions[i].name+`</td>
                  <td>`+'<span class="badge bg-success">'+res.permissions[i].guard_name+'</span>'+`</td>
                  <td>`+
                ' @canAny(['Edit-Permission','Delete-Permission'])'+
                '<div style="display: flex; gap: 5px;">' +
                    ' @can('Edit-Permission')'+
                        '<a href="{{ route('permissions.edit' , $permission->id )}}" type="button" class="btn btn-primary">Edit</a>'+
                        '@endcan'+
                        ' @can('Delete-Permission')'+
                        '<a href="#" onclick="performDestroy({{ $permission->id }},this)" type="button" class="btn btn-danger">Delete</a>'+
                        '@endcan'+
                '</div>' +
                '@endcanAny'

                +`</td>

            </tr>`;
    }
         $('tbody').html(htmlView);
    }
    </script>
@endsection

