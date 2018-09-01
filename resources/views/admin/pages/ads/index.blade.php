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
              <h3 class="box-title">Ads</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              <table id="ads" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Category</th>
                  <th>Location</th>
                  <th>User</th>
                  <th>Ad Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ads as $data)
                      <tr>
                        <td>{{ ++$i  }}</td>
                        <td>{{ $data->category->name }}</td>
                        <td>{{ $data->city->name }}</td>
                        <td><a href="{{ route('admin.user.ads', $data->user->id) }}" target="_blank">{{ $data->user->name }}</a></td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                          ---
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
    $('#ads').DataTable({
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