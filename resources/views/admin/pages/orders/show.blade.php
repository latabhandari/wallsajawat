@extends('admin.layout.master')

@section('css')
<style>
.comment-text{font-size:12px}
.delcomnt{margin-left:10px;font-weight:bold !important;cursor:pointer}
ul{margin:0;padding:0}
ul li{list-style-type:none;padding-left:10px}
</style>
@stop

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order's Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Details</p>
                  <div class="table-responsive">
                    @php
                      $order_products = $order->products;
                      print_r($order_products); die;

                    @endphp
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S. No</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Total</th>
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
                              <td>Rs. {{ $data->total_amount }} /-</td>
                              <td>Rs. {{ $data->discount ? $data->discount : 0 }} /-</td>
                              <td>Rs. {{ $data->payable_amount }} /-</td>
                              <td>{{ date('D, j M Y h:i a', $data->unix_timestamp)  }}</td>
                              <td><a class="btn btn-warning" href="{{ route('admin.order.show',$data->id) }}"><span class="fa fa-eye"></span></a></td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>

                    </table>
                  </div>
                  
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                </div>

                <!-- /.col -->
              </div>

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