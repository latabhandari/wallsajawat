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
              <h3 class="box-title">Product's Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Details</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width:50%">Name:</th>
                        <td>{{ $product->name }} </td>
                      </tr>
                      
                      <tr>
                        <th>Sku:</th>
                        <td>{{ $product->sku }}</td>
                      </tr>

                      <tr>
                        <th>Short Description:</th>
                        <td>{!! $product->short_desc !!}</td>
                      </tr>

                      <tr>
                        <th>Description:</th>
                        <td>{!! $product->description !!}</td>
                      </tr>

                      <tr>
                        <th>Price:</th>
                        <td>Rs. {{ $product->price }} /-</td>
                      </tr>

                      <tr>
                        <th>Items in Stock:</th>
                        <td>{{ $product->stock_item }}</td>
                      </tr>
                      @php
                        $roll_info = App\Helpers\MyHelper::getRollDimenstionById($product->roll_id);
                        $roll_dimension = $roll_info->width . ' width * '.$roll_info->height . ' height';
                      @endphp

                      <tr>
                        <th>Role Dimension:</th>
                        <td>{{ $roll_dimension }}</td>
                      </tr>

                      <tr>
                        <th>Status:</th>
                        <td>{{ ($product->status == 0) ? "Inactive" : "Active" }}</td>
                      </tr>

                      <tr>
                        <th>Page Title:</th>
                        <td>{{ $product->page_title }}</td>
                      </tr>

                      <tr>
                        <th>Meta Description:</th>
                        <td>{{ $product->meta_description }}</td>
                      </tr>

                      <tr>
                        <th>Meta keywords:</th>
                        <td>{{ $product->meta_keywords }}</td>
                      </tr>

                    </tbody></table>
                  </div>
                  
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead">Product Images</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>

                      <tr>
                        <th style="width:50%">Images:</th>
                        <td></td>
                      </tr>
                      
                   </tbody></table>
                  </div>
                </div>

                  <div class="col-xs-6">

                    <div class="col-md-12">
                      <!-- Box Comment -->
                      <div class="box box-widget">
                        <!-- /.box-header -->
                       
                        <!-- /.box-body -->
                        <p class="lead" style="margin-bottom:10px">Comments&nbsp;<i title="refresh" id="refreshcomment" class="fa fa-circle-o-notch" style="font-size:15px;cursor:pointer"></i></p>                        
                      </div>
                      <!-- /.box -->
                    </div>                    
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