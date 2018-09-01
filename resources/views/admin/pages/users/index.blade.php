@extends('admin.layout.master')

@section('css')
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

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
                          <a class="btn btn-primary" href="{{ route('admin.user.favads',$data->id) }}"><span class="fa fa-star"></span></a>
                          <a class="btn btn-primary" href="{{ route('admin.user.ads',$data->id) }}"><span class="fa fa-newspaper-o"></span></a>
                          <a class="btn btn-primary" href="{{ route('admin.user.info',$data->id) }}"><span class="fa fa-eye"></span></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            
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