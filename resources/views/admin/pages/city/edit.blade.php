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
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->

               @if ($errors->all())
                    <div class="alert alert-danger">
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

            {!! Form::model($city, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['city.update', $city->id]]) !!}

              <div class="box-body">

                  <div class="form-group">
                  <label for="status">State&nbsp;</label>
                  <select class="form-control" name="state">
                      <option value="">-- Select --</option>
                      @foreach($states as $stateinfo)
                        <option value="{{  $stateinfo->id }}" {{ $stateinfo->id == $city->state_id ? "selected" : "" }}>{{  $stateinfo->name }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="name">City&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $city->name }}">
                </div>

                <div class="form-group">
                  <label for="slug">Slug&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="slug" placeholder="Slug" type="text" value="{{ $city->slug }}">
                </div>

                <div class="form-group">
                  <label for="page_title">Page Title&nbsp;</label>
                  <input class="form-control" name="page_title" placeholder="Page Title" type="text" value="{{ $city->page_title }}">
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description&nbsp;</label>
                  <input class="form-control" name="meta_description" placeholder="Meta Description"text" value="{{ $city->meta_description }}">
                </div>

                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords&nbsp;</label>
                  <input class="form-control" name="meta_keywords" placeholder="Meta Keywords" type="text" value="{{ $city->meta_keywords }}">
                </div>
                

                <div class="form-group">
                  <label for="category">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($city->status == 1) ? "selected='selected'" : ""}}>Active</option>
                      <option value="0" {{ ($city->status == 0) ? "selected='selected'" : ""}}>Inactive</option>
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

    <script src="{{ URL::asset('backend/theme/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('backend/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
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