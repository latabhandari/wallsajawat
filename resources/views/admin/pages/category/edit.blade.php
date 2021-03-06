@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/slim.min.css') }}" />
    <style>
    .slim>img, .slim>input[type=file]{width:250px !important;height:250px !important}
    .slim[data-ratio="1:1"]>img, .slim[data-ratio="1:1"]>input[type=file] {
      margin-bottom:0px !important;
    }
    .slim{width:250px !important;height:250px !important}
   </style>
@stop


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

            {!! Form::model($category, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['categories.update', $category->id]]) !!}

              <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

              <div class="box-body">

                 <!--<div class="form-group">
                    <label for="category">Parent&nbsp;<span class="req">*</span></label>
                    {!! MyHelper::tep_draw_pull_down_menu('parent', MyHelper::tep_get_category_tree(1), 0, $category->id) !!}
                  </div> -->
                          
                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                  <label for="slug">Slug&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="slug" placeholder="Slug" type="text" value="{{ $category->slug }}">
                </div>

                <!-- <div class="form-group">
                  <label for="wallpaper_pos">Wallpaper Position&nbsp;</label>
                  <select name="wallpaper_pos" class="form-control">
                     <option value="">-- Select --</option>
                     <option value="1" {{ ($category->wallpaper_pos == 1) ? 'selected' : '' }}>-- 1 --</option>
                     <option value="2" {{ ($category->wallpaper_pos == 2) ? 'selected' : '' }}>-- 2 --</option>
                     <option value="3" {{ ($category->wallpaper_pos == 3) ? 'selected' : '' }}>-- 3 --</option>
                     <option value="4" {{ ($category->wallpaper_pos == 4) ? 'selected' : '' }}>-- 4 --</option>
                     <option value="5" {{ ($category->wallpaper_pos == 5) ? 'selected' : '' }}>-- 5 --</option>
                  </select>
                </div>-->

                <!-- <div class="form-group">
                  <label for="wallpaper_image">Image</label>
                  <input class="form-control" name="wallpaper_image" placeholder="Wallpaper Image" type="file" value="" />
                   <img src="{{ URL::asset('catalog/category/'.$category->wallpaper_image) }}" alt="" width="120" />
                </div>-->

                <div class="form-group">
                  <label for="wallpaper_image">Image</label>
                  <!-- <input class="form-control slim" name="wallpaper_image" placeholder="Wallpaper Image" type="file" value="" /> -->

                  <div class="slim" data-label="Drag your image here" style="cursor:pointer;" data-size="250,250" data-ratio="1:1" >
                      <input type="file" accept="image/jpeg, image/gif, image/png, image/jpg"  id="wallpaper_image" name="wallpaper_image">
                    
                         @if ($category->wallpaper_image)
                           <img src="{{ URL::asset('catalog/category/'.$category->wallpaper_image) }}" alt="" width="120" />
                         @endif

                  </div>


                </div>


                <div class="form-group">
                  <label for="page_title">Page Title&nbsp;</label>
                  <input class="form-control" name="page_title" placeholder="Page Title" type="text" value="{{ $category->page_title }}">
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description&nbsp;</label>
                  <input class="form-control" name="meta_description" placeholder="Meta Description"text" value="{{ $category->page_title }}">
                </div>

                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords&nbsp;</label>
                  <input class="form-control" name="meta_keywords" placeholder="Meta Keywords" type="text" value="{{ $category->page_title }}">
                </div>

                @php
                  if ($category->id > 5)
                     {
                @endphp

                <div class="form-group">
                  <label for="category">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($category->status == 1) ? "selected='selected'" : ""}}>Active</option>
                      <option value="0" {{ ($category->status == 0) ? "selected='selected'" : ""}}>Inactive</option>
                  </select>
                </div>

                 @php
                   }
                 @endphp


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

    <script src="{{ URL::asset('backend/assets/js/slim.kickstart.min.js') }}"></script>

@stop
