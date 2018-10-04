@extends('admin.layout.master')

@php
   use App\Helpers\MyHelper as MyHelper;
@endphp

@section('content')
  <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->

                    @if ($errors->all())
                      <div class="alert alert-danger" style="margin: 5px 10px">
                              @foreach ($errors->all() as $error)
                                  <p><i class="fa fa-exclamation-circle"></i> {{ $error }} </p>
                              @endforeach
                      </div>
                    @endif
                    
                    @if(Session::has('error'))
                      <div class="alert-box success">
                        <h4 class='error'>{{ Session::get('error') }}</h2>
                      </div>
                    @endif

            <!-- form start -->

            {!! Form::model($user, ['autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['admin.user.update', $user->id]]) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                  <label for="email">Email&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="email" placeholder="Email" type="text" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                  <label for="password">Password&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="password" placeholder="Password" type="password" value="">
                </div>

                <div class="form-group">
                  <label for="roles">Roles&nbsp;</label>
                  <select class="form-control" name="role">
                      <option value="">-- Select --</option>
                      <option value="0" {{ ($user->role == 0) ? 'selected' : '' }}>User</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ ($user->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                      @endforeach
                  </select>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">Submit</button>
              </div>
            
            {!! Form::close() !!}

          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

        </div>


      </div>
      <!-- /.row -->
 </section>
@stop

@section('pagejs')

    <script src="{{ URL::asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
     $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
         //bootstrap WYSIHTML5 - text editor
       $('.textarea').wysihtml5()
   })
</script>

@stop