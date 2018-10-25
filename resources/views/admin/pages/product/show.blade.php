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
                      @php
                        use App\Helpers\MyHelper as MyHelper;
                        $categoryinfo =  MyHelper::getCategoryInfoById($product->id, ['name']);
                      @endphp    
                      <tr>
                        <th style="width:50%">Category:</th>
                        <td>{{ $categoryinfo[0]['name'] }} </td>
                      </tr>

                      <tr>
                        <th style="width:50%">Name:</th>
                        <td>{{ $product->name }} </td>
                      </tr>

                      <tr>
                        <th style="width:50%">Slug:</th>
                        <td>{{ $product->slug }} </td>
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
                        $roll_info = MyHelper::getRollDimenstionById($product->roll_id);
                        $roll_dimension = $roll_info->width . ' Width * '.$roll_info->height . ' Height';

                        $product_images = App\Helpers\MyHelper::getProductImages($product->id);

                        $status_img   =  ($product->status == 1) ? "bullet-green.png" : "bullet-red.png";

                      @endphp

                      <tr>
                        <th>Role Dimension:</th>
                        <td>{{ $roll_dimension }} [Square Feet]</td>
                      </tr>

                      <tr>
                        <th>Status:</th>
                        <td><img src="{{ URL::asset('backend/assets/images/'.$status_img) }}" alt="" /></td>
                      </tr>

                      <tr>
                        <th>Created at:</th>
                        <td>{{ date('D, j M\'y h:i a', $product->created_timestamp) }}</td>
                      </tr>

                      <tr>
                        <th>Updated at:</th>
                        <td>{{ date('D, j M\'y h:i a', $product->updated_timestamp) }}</td>
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
                  @php
                          if (count($product_images)):
                             echo '<div style=\'float:left;width:100%\' class=\'\'>';
                             foreach ($product_images as $img):
                                echo "<div style=\"float:left;width:80px;text-align:center\" class=\'\'><img src='".asset('catalog/product/'.$img->image)."' width=\"60\" height=\"60\" /></div>";
                             endforeach;
                             echo '</div>';
                          endif;
                  @endphp
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