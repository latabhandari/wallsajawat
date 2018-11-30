@extends('admin.layout.master')

@section('css')
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@php
   use App\Helpers\MyHelper as MyHelper;
@endphp

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_user = MyHelper::getPermission('create_user');
                        if ( ! empty($create_user)) {
              @endphp


              <p style="text-align:right"><a class="" href="{{ route('user.create') }}"><button type="button" class="btn btn-primary">Add User</button></a></p>

              @php
                        }
              @endphp


              @php
                        $index_users = MyHelper::getPermission('index_users');
                        if ( ! empty($index_users)) {
              @endphp

              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Registerd Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $data)
                      <tr>
                        <td>{{ ++$i  }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->mobile }}</td>
                        <td>{{ date('D, j M\'y h:i a', $data->unix_timestamp) }}</td>
                        <td>
                            @php
                                $edit_user = MyHelper::getPermission('edit_user');
                                if ( ! empty($edit_user)) {
                            @endphp
                             <a class="btn btn-primary" href="{{ route('user.edit',$data->id) }}"><span class="fa fa-edit"></span></a>

                             @php
                                }
                             @endphp

                              @php
                                        $destroy_user = MyHelper::getPermission('destroy_user');
                                        if ( ! empty($destroy_user)) {
                              @endphp
                               
                              <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button>
                               
                            @php
                              }
                            @endphp
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>

             @php
                        }
                        else
                        {
              @endphp
              <p>Sorry, you don't have permission to access users list.

              @php
                        }
              @endphp

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@stop

@section('pagejs')
<script src="{{ URL::asset('backend/theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#users').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
     dom: 'Bfrtip',
       buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    
    })
  })
</script>
@stop