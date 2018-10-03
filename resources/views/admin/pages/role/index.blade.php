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
                        $add_role = MyHelper::getPermission('add_role');
                        if ( ! empty($add_role)) {
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($roles as $data)

                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $data->name }}</td>
                  <td>
                     <a class="btn btn-primary" href="{{ route('roles.edit',$data->id) }}"><span class="fa fa-edit"></a>

                        {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['roles.destroy', $data->id]]) !!}
                        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button></td>
                        {!! Form::close() !!}

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