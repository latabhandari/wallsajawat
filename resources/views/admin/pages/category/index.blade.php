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
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_category = MyHelper::getPermission('create_category');
                        if ( ! empty($create_category)) {
              @endphp

              <p style="text-align:right"><a class="" href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary">Add Category</button></a></p>

              @php
                       }
              @endphp


              @php
                        $i = 0;
                        $index_categories = MyHelper::getPermission('index_categories');
                        if ( ! empty($index_categories)) {
              @endphp

              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Keywords</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($categories as $data)
                @php
                  $status_img = ($data->status == 1) ? "bullet-green.png" : "bullet-red.png";
                @endphp

                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{!! MyHelper::showCategories($data->id) !!}</td>
                  <td>{{ $data->slug }}</td>
                  <td><img src="{{ URL::asset('catalog/category/'.$data->wallpaper_image) }}" alt="" width="60" height="50" /></td>
                  <td>{{ $data->page_title }}</td>
                  <td>{{ $data->meta_keywords }}</td>
                  <td>{{ $data->meta_description }}</td>
                  <td><img src="{{ URL::asset('backend/assets/images/'.$status_img) }}" /></td>
                  <td>
                    @php
                        $edit_category = MyHelper::getPermission('edit_category');
                        if ( ! empty($edit_category)) {
                    @endphp

                     <a class="btn btn-primary" href="{{ route('categories.edit',$data->id) }}"><span class="fa fa-edit"></span></a>

                     @php
                        }
                     @endphp

                     @php
                        $destroy_category = MyHelper::getPermission('destroy_category');
                        if ( ! empty($destroy_category) && $data->id > 5) {
                     @endphp

                     {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['categories.destroy', $data->id]]) !!}
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button>
                    {!! Form::close() !!}

                    @php
                        }
                    @endphp

				          </td>
                </tr>

                  @php
                    if ($i == 5)
                    echo "<tr><td colspan=\"9\"><span style=\"border: 1px dashed #e0d5d5;float:left;width:100%;\"></span></td></tr>";
                  @endphp

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
