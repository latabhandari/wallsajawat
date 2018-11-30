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
              <h3 class="box-title">Add Product</h3>
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

            {!! Form::open(['route' => 'product.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

              <div class="box-body">

                <div class="form-group">
                  <label for="category">Category&nbsp;<span class="req">*</span></label>
                  {!! MyHelper::tep_draw_pull_down_category('categories[]', MyHelper::tep_get_category_tree(3), []) !!}
                </div>

                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="sku">Sku&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="sku" placeholder="Sku" type="text" value="{{ old('sku') }}">
                </div>

                <div class="form-group">
                  <label for="stock_item">Items in Stock&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="stock_item" placeholder="Items in Stock" type="text" value="{{ old('stock_item') }}">
                </div>

                <div class="form-group">
                  <label for="price">Price&nbsp;<span class="req">*</span></label>
                  <input style="width:10%;display:inline" class="form-control" name="price" placeholder="Price" type="text" value="{{ old('price') }}"><span style="font-weight:bold;font-style:italic;display:inline;padding-left:3px">/Per Roll</span>
                </div>

                <div class="form-group">
                  <label for="stock_item">Roll&nbsp;<span class="req">*</span></label>
                  <select name="roll_id" class="form-control" style="width: 20%">
                  @foreach ($rolls as $roll)
                    <option value="{{ $roll->id }}">{{ $roll->name }} [{{ $roll->width }}] * [{{ $roll->height }}]</option>
                  @endforeach
                </select>
                </div>

                <div class="form-group">
                  <label for="short_desc">Short Description</label>
                  <textarea cols="25" id="editor1" class="form-control" name="short_desc" placeholder="Short Description">{{ old('short_desc') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea cols="25" id="editor2" class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Upload Multiple Images&nbsp;<span class="req">*</span></label>
                  <input type="file" name="images[]" placeholder="Upload Images" multiple />
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


    <script src="{{ URL::asset('backend/theme/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('backend/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
     $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      CKEDITOR.replace('editor2')
         //bootstrap WYSIHTML5 - text editor
       $('.textarea').wysihtml5()
     })
</script>

@stop