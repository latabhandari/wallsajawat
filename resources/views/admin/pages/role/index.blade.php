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
                  @php
                     if ($data->id != 1)
                       {
                  @endphp
                  <td>

                        @php
                          $edit_roles = MyHelper::getPermission('edit_roles');
                          if ( ! empty($edit_roles)) {
                        @endphp 
                         <a class="btn btn-primary" href="{{ route('roles.edit',$data->id) }}"><span class="fa fa-edit"></a>
                        @php
                         }
                        @endphp

                      &nbsp;

                      @php
                          $delete_roles = MyHelper::getPermission('delete_roles');
                          if ( ! empty($delete_roles)) {
                      @endphp 

                        {!! Form::open(['style' => 'display:inline', 'method' => 'DELETE', 'route' => ['roles.destroy', $data->id]]) !!}
                        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')"><span class="fa fa-trash"></span></button></td>
                        {!! Form::close() !!}

                      @php
                          }
                      @endphp 


                      </td>
                    @php
                       }
                       else
                        {
                    @endphp
                            <td>Permission denied</td>
                    @php
                      }
                    @endphp
                </tr>

                @endforeach
               
              
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