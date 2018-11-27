@extends('admin.layout.master')
@php
   use App\Helpers\MyHelper as MyHelper;
@endphp
@section('css')
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
@stop

@section('content')
  <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div style="float:left;width:100%">

                <form name="order_frm" id="" action="{{ route('orders') }}">
                  @csrf

                  <div class="form-group" style="float:left;width:20%;margin:0 2% 0 0">
                      <label for="status">Start Date&nbsp;</label>
                      <input type="text" name="datepicker1" value="" class="form-control" placeholder="Start Date" id="datepicker1" />
                  </div>

                  <div class="form-group" style="float:left;width:20%">
                      <label for="status">End Date&nbsp;</label>
                      <input type="text" name="datepicker2" value="" class="form-control" placeholder="End Date" id="datepicker2" />
                  </div>

                  <div class="form-group" style="float:left;width:30%">
                      <label for="status">&nbsp;</label>
                      <button type="submit" class="btn btn-primary" style="display:block;margin:0 0 0 10px">Submit</button>
                  </div>
                </form>


              </div>




              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              <table id="orders" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Order #</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Amount Paid</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @if(count($orders))   
                  @foreach ($orders as $data)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $data->order_number }}</td>
                      <td>{{ $data->user->name }}</td>
                      <td>{{ $data->user->email }}</td>
                      <td>{{ $data->user->mobile }}</td>
                      <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $data->payable_amount }}</td>
                      <td>{{ date('D, j M Y h:i a', $data->unix_timestamp)  }}</td>
                      <td><a class="btn btn-warning" href="{{ route('admin.order.show',$data->id) }}"><span class="fa fa-eye"></span></a></td>
                    </tr>
                  @endforeach

                @else
                    <tr><td colspan=\"9\">No data!</td></tr>";
                @endif
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
    $('#orders').DataTable({
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

<script src="{{ URL::asset('backend/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
   //Date picker
   // set default dates
   var start = new Date();

    $('#datepicker1, #datepicker2').datepicker({
      autoclose: true,
      startDate: start
    })

  // set end date to max one year period:
  var end = new Date(new Date().setYear(start.getFullYear()+1));

      $('#datepicker1').datepicker({
          startDate : start,
          endDate   : end
      // update "toDate" defaults whenever "fromDate" changes
      }).on('changeDate', function(){
          // set the "toDate" start to not be later than "fromDate" ends:
          $('#datepicker2').datepicker('setStartDate', new Date($(this).val()));
      }); 

</script>

@stop