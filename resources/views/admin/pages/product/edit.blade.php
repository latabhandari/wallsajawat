@extends('admin.layout.master')
@php
   use App\Helpers\MyHelper as MyHelper;
@endphp
@section('content')
  <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="padding:10px">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
            </div>
            <!-- /.box-header -->

               @if ($errors->all())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p><i class="fa fa-exclamation-circle"></i> {{ $error }} </p>
                            @endforeach
                    </div>
              @endif
                    
               @if(Session::has('suc'))
                     <div class="alert alert-success">
                          <p>{{ Session::get('suc') }}</p>
                     </div>
               @endif

            <!-- form start -->

            {!! Form::model($product, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['product.update', $product->id]]) !!}

              <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

              <div class="box-body">

                <div class="form-group">
                  <label for="category">Category&nbsp;<span class="req">*</span></label>
                  {!! MyHelper::tep_draw_pull_down_category('categories[]', MyHelper::tep_get_category_tree(3), $product->id) !!}
                </div>

                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                  <label for="sku">Sku&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="sku" placeholder="Sky" type="text" value="{{ $product->sku }}">
                </div>

                <div class="form-group">
                  <label for="stock_item">Items in Stock&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="stock_item" placeholder="Items in Stock" type="text" value="{{ $product->stock_item }}">
                </div>

                <div class="form-group">
                  <label for="price">Price&nbsp;<span class="req">*</span></label>
                  <input style="width:10%;display:inline" class="form-control" name="price" placeholder="Price" type="text" value="{{ $product->price }}"><span style="font-weight:bold;font-style:italic;display:inline;padding-left:3px">/Per Roll</span>
                </div>

                <div class="form-group">
                  <label for="stock_item">Roll&nbsp;<span class="req">*</span></label>
                   <select name="roll_id" class="form-control">
                  @foreach ($rolls as $roll)
                    <option value="{{ $roll->id }}" {{ ($roll->id == $product->roll_id) ? "selected" : "" }}>{{ $roll->name }} [{{ $roll->width }}] * [{{ $roll->height }}]</option>
                  @endforeach
                </select>
                </div>


                <div class="form-group">
                  <label for="short_desc">Short Description&nbsp;<span class="req">*</span></label>
                  <textarea cols="25" id="editor1" class="form-control" name="short_desc" placeholder="Short Description">{{ $product->short_desc }}</textarea>
                </div>

                <div class="form-group">
                  <label for="desc">Description&nbsp;<span class="req">*</span></label>
                  <textarea cols="25" id="editor2" class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
                </div>


                <div class="form-group">
                  <label for="image">Upload Multiple Images&nbsp;</label>
                  <input type="file" name="images[]" placeholder="Upload Images" multiple />

                  @php
                    if (count($images)):
                       echo '<div style=\'float:left;width:100%;margin:15px 0\' class=\'\'>';
                       foreach ($images as $img):
                          echo "<div style=\"float:left;width:80px;text-align:center\" class=\'\'><img src='".asset('catalog/product/'.$img->image)."' width=\"60\" style=\"margin:20px 0 5px 0\" height=\"60\" /><a style=\"float:left;width:100%;display:block\" href='".route('admin.product.delete', ['id' => $img->id])."' onclick=\"return confirm('are you sure?')\"><strong>X</strong></a></div>";
                       endforeach;
                       echo '</div>';
                    endif;
                  @endphp
                </div>
              
                <div class="form-group">
                  <label for="page_title">Page Title&nbsp;</label>
                  <input class="form-control" name="page_title" placeholder="Page Title" type="text" value="{{ $product->page_title }}">
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description&nbsp;</label>
                  <input class="form-control" name="meta_description" placeholder="Meta Description"text" value="{{ $product->meta_description }}">
                </div>

                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords&nbsp;</label>
                  <input class="form-control" name="meta_keywords" placeholder="Meta Keywords" type="text" value="{{ $product->meta_keywords }}">
                </div>

                <div class="form-group">
                  <label for="status">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($product->status == 1) ? "selected='selected'" : "" }}>Active</option>
                      <option value="0" {{ ($product->status == 0) ? "selected='selected'" : "" }}>Inactive</option>
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
