@extends('admin.layout.master')
@php
   use App\Helpers\MyHelper as MyHelper;
@endphp

@section('css')
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($delete = Session::get('delete'))
                  <div class="alert alert-success">
                      <p>{{ $delete }}</p>
                  </div>
              @endif

               @php
                        $index_queries = MyHelper::getPermission('index_queries');
                        if ( ! empty($index_queries)) {
              @endphp             

              <table id="city" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Ip Address</th>
                  <th>Date/Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($results as $data)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->phone }}</td>
                  <td>{{ $data->msg }}</td>
                  <td>{{ $data->ip }}</td>
                  <td>{{ date('D, j M\'y h:i a', $data->timestamp) }}</td>
                  <td>
                     {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['admin.contactus.destroy', $data->id]]) !!}
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button>
                    {!! Form::close() !!}
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
              <p>Sorry, you don't have permission to access user's queries.

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
    $('#city').DataTable({
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