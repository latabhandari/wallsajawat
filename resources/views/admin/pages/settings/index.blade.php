@extends('admin.layout.master')

@section('content')
  <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile Settings</h3>
            </div>
            <!-- /.box-header -->

               @if ($errors->all())
                    <div class="alert alert-danger"  style="margin:5px 10px">
                            @foreach ($errors->all() as $error)
                                <p><i class="fa fa-exclamation-circle"></i> {{ $error }} </p>
                            @endforeach
                    </div>
               @endif
                    
               @if(Session::has('success'))
                  <div class="alert-success alert" style="margin:5px 10px">
                    <p><i class="fa fa-check"></i> Settings updated successfully.</p>
                  </div>
               @endif

            <!-- form start -->

            {!! Form::open(['route' => 'admin.saved.settings', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

                    <div class="form-group">
                      <label for="name">Name&nbsp;<span class="req">*</span></label>
                      <input class="form-control" name="name" placeholder="Name" type="text" value="<?php echo $result->name; ?>">
                    </div>

                    <div class="form-group">
                      <label for="email">Email&nbsp;<span class="req">*</span></label>
                      <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $result->email; ?>">
                    </div>
        
                    <div class="form-group">
                      <label for="password">Password&nbsp;</label>
                      <input class="form-control" name="password" placeholder="Password" type="password" value="">
                    </div>
        
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password&nbsp;</label>
                      <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password" value="" />
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