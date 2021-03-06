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
              <h3 class="box-title">WallPaper Dimensions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_dimension = MyHelper::getPermission('create_dimension');
                        if ( ! empty($create_dimension)) {
              @endphp


              <p style="text-align:right"><a class="" href="{{ route('dimension.create') }}"><button type="button" class="btn btn-primary">Add Dimension</button></a></p>

              @php
                       }
              @endphp

              @php
                        $index_dimension = MyHelper::getPermission('index_dimension');
                        if ( ! empty($index_dimension)) {
              @endphp


              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Width (Square Feet)</th>
                  <th>Height (Square Feet)</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($dimensions as $data)
        
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->width }}</td>
                  <td>{{ $data->height }}</td>
                  <td>{{ date('D, j M Y h:i a', $data->created_at_timestamp) }}</td>
                  <td>
                    @php
                          $edit_dimension = MyHelper::getPermission('edit_dimension');
                          if ( ! empty($edit_dimension)) {
                     @endphp

                     <a class="btn btn-primary" href="{{ route('dimension.edit',$data->id) }}"><span class="fa fa-edit"></span></a>

                     @php
                          }
                          else
                          {
                    @endphp
                                ---------
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
              <p>Sorry, you don't have permission to access dimensions.

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
    $('#category').DataTable({
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
