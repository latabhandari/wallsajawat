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
                      <div class="alert alert-danger">
                        <p><i class="fa fa-exclamation-circle"></i> {{ Session::get('error') }} </p>
                      </div>
                    @endif

            <!-- form start -->

            {!! Form::open(['route' => 'user.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

              
                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="email">Email&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="email" placeholder="Email" type="text" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                  <label for="password">Password&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="password" placeholder="Password" type="password" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                  <label for="mobile">Mobile&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="mobile" placeholder="Mobile" type="text" value="{{ old('mobile') }}">
                </div>

                <div class="form-group">
                  <label for="roles">Roles&nbsp;</label>
                  <select class="form-control" name="role">
                      <option value="">-- Select --</option>
                      <option value="0">User</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="status">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
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