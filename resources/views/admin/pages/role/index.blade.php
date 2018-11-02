@php
   use App\Helpers\MyHelper as MyHelper;
@endphp

@extends('admin.layout.master')

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Roles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if ($success = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $success }}</p>
                  </div>
              @endif

              @php
                        $create_role = MyHelper::getPermission('create_role');
                        if ( ! empty($create_role)) {
              @endphp

              <p style="text-align:right"><a class="" href="{{ route('roles.create') }}"><button type="button" class="btn btn-primary">Add Role</button></a></p>

              @php
                       }
              @endphp


              @php
                        $index_roles = MyHelper::getPermission('index_roles');
                        if ( ! empty($index_roles)) {
              @endphp


              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($roles as $data)
                @php
                    $status_img   =  ($data->status == 1) ? "bullet-green.png" : "bullet-red.png";
                    $status_msg   =  ($data->status == 1) ? "inactive" : "active";
                @endphp

                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $data->name }}</td>
                  <td><img src="{{ URL::asset('backend/assets/images/'.$status_img) }}" /><a href="{{ route('admin.roles.status', [$data->id, $data->status]) }}">[click here to {{ $status_msg }}]</a></td>
                  <td>
                     @php
                          $edit_role = MyHelper::getPermission('edit_role');
                          if ( ! empty($edit_role)) {
                     @endphp
                     <a class="btn btn-primary" href="{{ route('roles.edit',$data->id) }}"><span class="fa fa-edit"></a>

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