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
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_product = MyHelper::getPermission('create_product');
                        if ( ! empty($create_product)) {
              @endphp

              <p style="text-align:right"><a class="" href="{{ route('product.create') }}"><button type="button" class="btn btn-primary">Add Product</button></a></p>

              @php
                       }
              @endphp


              @php
                        $index_products = MyHelper::getPermission('index_products');
                        if ( ! empty($index_products)) {
              @endphp


              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Sku</th>
                  <th>Price</th>
                  <th>Page Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $data)
                  @php
                    $status_img   =  ($data->status == 1) ? "bullet-green.png" : "bullet-red.png";
                    $categoryinfo =  MyHelper::getCategoryInfoById($data->id, ['name']);
                  @endphp

                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $categoryinfo[0]['name'] }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->sku }}</td>
                      <td>Rs. {{ $data->price }}</td>
                      <td>{{ ($data->page_title) ?  $data->page_title : "N/A" }}</td>
                      <td><img src="{{ URL::asset('backend/assets/images/'.$status_img) }}" /></td>
                      <td>
                        <a class="btn btn-warning" href="{{ route('admin.product.view',$data->id) }}"><span class="fa fa-eye"></span></a>

                        @php
                         $edit_product = MyHelper::getPermission('edit_product');
                         if ( ! empty($edit_product)) {
                        @endphp
                         <a class="btn btn-primary" href="{{ route('product.edit',$data->id) }}"><span class="fa fa-edit"></span></a>

                        @php
                           }
                        @endphp

                        @php
                              $destroy_product = MyHelper::getPermission('destroy_product');
                              if ( ! empty($destroy_product)) {
                        @endphp
                         {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['product.destroy', $data->id]]) !!}
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
