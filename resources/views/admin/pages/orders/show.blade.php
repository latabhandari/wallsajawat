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
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-12">

                  <div class="col-xs-12">
                    <h3>Order Number #{{  $order->order_number }}</h3>
                    <span>Order Placed: {{ date('D, j M Y H:i', $order->unix_timestamp)  }}</span>
                  </div>

                  <div class="col-xs-12" style="border:1px solid #ccc;padding:15px;margin:15px 0 15px 15px;width:97%">
                      <div class="col-sm-12 paddingLeftRght0">
                        <div class="order-date-sec">

                          <div class="col-sm-3" style="padding:0px">
                            <p class="marginZero"><strong>CUSTOMER INFO</strong></p>
                            <p class="placed-date"><i class="fa fa-user"></i>&nbsp;{{ $order->user->name  }}<br /><i class="fa fa-envelope"></i>&nbsp;{{ $order->user->email  }}<br /><i class="fa fa-mobile"></i>&nbsp;{{ $order->user->mobile  }}</p>
                          </div>

                          <div class="col-sm-2">
                            <p class="marginZero"><strong>TOTAL</strong></p>
                            <p class="placed-amount"><i class="fa fa-inr" aria-hidden="true"></i> {{ $order->total_amount  }}</p>
                          </div>

                          <div class="col-sm-2">
                            <p class="marginZero"><strong>Discount</strong></p>
                            <p class="placed-amount"><i class="fa fa-inr" aria-hidden="true"></i> {{ $order->discount ? $order->discount : 0  }}</p>
                          </div>

                          
                          <div class="col-sm-2">
                            <p class="marginZero"><strong>AMOUNT PAID</strong></p>
                            <p class="placed-amount"><i class="fa fa-inr" aria-hidden="true"></i> {{ $order->payable_amount }}</p>
                          </div>

                          <div class="col-sm-3">
                            <div class="order-name-sec">
                              <div class="col-sm-8">
                                <p class="marginZero"><strong>SHIP TO</strong></p>
                                <p class="user-order-name">{{ $shipping_address }}</p>
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>


                    </div>

                    <div class="col-xs-12">
                      <p class="lead">Items</p>
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
                                $product_info      = App\Helpers\MyHelper::getProductInfo($data->product_id, ['name', 'short_desc', 'sku']);
                              @endphp

                                <tr>
                                  <td><img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="80" height="80" alt="{{ $product_info[0]['name'] }}"></td>
                                  <td>{{ $product_info[0]['name'] }}<br />Sku: {{ $product_info[0]['sku'] }}</td>
                                  <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $data->price }}</td>
                                  <td>{{ $data->qty }}</td>
                                  <td><i class="fa fa-inr" aria-hidden="true"></i> {{ ($data->qty) * ($data->price) }}</td>
                                </tr>
                              @endforeach
                            @endif
                                <tr>
                                  <td colspan="3"></td>
                                  <td colspan="2" align="center"><strong>Sub Total </strong>:&nbsp;&nbsp; <i class="fa fa-inr" aria-hidden="true"></i> {{ $order->total_amount }}</td>
                                </tr>
                                @if ($order->discount)
                                <tr>
                                  <td colspan="3"></td>
                                  <td colspan="2" align="center"><strong>Discount </strong>:&nbsp;&nbsp; <i class="fa fa-inr" aria-hidden="true"></i> {{ $order->discount }}</td>
                                </tr>
                                @endif
                                <tr>
                                  <td colspan="3"></td>
                                  <td colspan="2" align="center"><strong>Amount Paid </strong>:&nbsp;&nbsp; <i class="fa fa-inr" aria-hidden="true"></i> {{ $order->payable_amount }}</td>
                                </tr>

                          </tbody>

                        </table>
                      </div>
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