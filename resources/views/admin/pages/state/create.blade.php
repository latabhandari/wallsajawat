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
              <h3 class="box-title">State</h3>
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

            {!! Form::open(['route' => 'state.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="name">State&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="slug">Slug&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="slug" placeholder="Slug" type="text" value="{{ old('slug') }}">
                </div>


                <div class="form-group">
                  <label for="page_title">Page Title&nbsp;</label>
                  <input class="form-control" name="page_title" placeholder="Page Title" type="text" value="{{ old('page_title') }}">
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description&nbsp;</label>
                  <input class="form-control" name="meta_description" placeholder="Meta Description"text" value="{{ old('meta_description') }}">
                </div>

                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords&nbsp;</label>
                  <input class="form-control" name="meta_keywords" placeholder="Meta Keywords" type="text" value="{{ old('meta_keywords') }}">
                </div>
                

                <div class="form-group">
                  <label for="category">Status&nbsp;</label>
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