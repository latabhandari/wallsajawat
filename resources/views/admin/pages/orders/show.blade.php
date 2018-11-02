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
                    @endphp
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @if(count($order_products))   
                          @foreach ($order_products as $data)
                          @php
                            $prod_image_info   = App\Helpers\MyHelper::getProductImage($data->product_id);
                            $product_info      = App\Helpers\MyHelper::getProductInfo($data->product_id, ['name', 'short_desc']);
                          @endphp

                            <tr>
                              <td><img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="80" height="80" alt="{{ $product_info[0]['name'] }}"></td>
                              <td>{{ $product_info[0]['name'] }}</td>
                              <td>Rs. {{ $data->price }} /-</td>
                              <td>{{ $data->qty }}</td>
                              <td>{{ ($data->qty) * ($data->price) }}</td>
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