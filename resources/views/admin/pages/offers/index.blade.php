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
              <h3 class="box-title">Offers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_offer = MyHelper::getPermission('create_offer');
                        if ( ! empty($create_offer)) {
              @endphp

              <p style="text-align:right"><a class="" href="{{ route('offers.create') }}"><button type="button" class="btn btn-primary">Add Offers</button></a></p>

              @php
                       }
              @endphp

              @php
                        $index_offers = MyHelper::getPermission('index_offers');
                        if ( ! empty($index_offers)) {
              @endphp

              <table id="offers" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Coupon</th>
                  <th>Discount</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($offers as $data)
                @php
                  $status_img = ($data->status == 1) ? "bullet-green.png" : "bullet-red.png";
                @endphp

                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $data->coupon }}</td>
                  <td>{{ $data->type == 1 ? $data->discount . " %" : "Rs .".$data->discount }} Off</td>
                  <td>{{ date('D, j M Y', $data->start_date) }}</td>
                  <td>{{ date('D, j M Y', $data->end_date) }}</td>
                  <td>{{ date('D, j M Y h:i a', $data->unix_timestamp) }}</td>
                  <td><img src="{{ URL::asset('backend/assets/images/'.$status_img) }}" /></td>
                  <td>
                    @php
                        $edit_offer = MyHelper::getPermission('edit_offer');
                        if ( ! empty($edit_offer)) {
                    @endphp
                     <a class="btn btn-primary" href="{{ route('offers.edit',$data->id) }}"><span class="fa fa-edit"></span></a>

                     @php
                        }
                     @endphp

                      @php
                                $destroy_offer = MyHelper::getPermission('destroy_offer');
                                if ( ! empty($destroy_offer)) {
                      @endphp
                       {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['offers.destroy', $data->id]]) !!}
                      <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button>
                       {!! Form::close() !!}
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
    $('#offers').DataTable({
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
