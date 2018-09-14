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

            {!! Form::model($measurement, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['measurement.update', $measurement->id]]) !!}

              <div class="box-body">
                         
                <div class="form-group">
                  <label for="name">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $measurement->name }}">
                </div>

                <div class="form-group">
                  <label for="square_feet_value">1 Square Feet = &nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="square_feet_value" placeholder="Measurement in Square Foot" type="text" value="{{ $measurement->square_feet_value }}">
                  <p style="font-size:12px;font-style:italic;color:#888">for eg: 1 Square Foot = 144 Square Inch</p>
                </div>

                <div class="form-group">
                  <label for="display_order">Display Order&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="display_order" placeholder="Display Order" type="text" value="{{ $measurement->display_order }}">
                </div>

                <div class="form-group">
                  <label for="status">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($measurement->status == 1) ? "selected='selected'" : ""}}>Active</option>
                      <option value="0" {{ ($measurement->status == 0) ? "selected='selected'" : ""}}>Inactive</option>
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
