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
              <h3 class="box-title">Cities</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              <table id="city" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Slug</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($cities as $data)
                @php
                  $status_img = ($data->status == 1) ? "bullet-green.png" : "bullet-red.png";
                @endphp

                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $data->state->name }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->slug }}</td>
                  <td>{{ $data->page_title }}</td>
                  <td><img src="{{ URL::asset('images/'.$status_img) }}" /></td>
                  <td>
                     <a class="btn btn-primary" href="{{ route('city.edit',$data->id) }}"><span class="fa fa-edit"></span></a>
                     {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['city.destroy', $data->id]]) !!}
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button>
                    {!! Form::close() !!}
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