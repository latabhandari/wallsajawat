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
              <h3 class="box-title">Category</h3>
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

            {!! Form::open(['route' => 'categories.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
              <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>
              <div class="box-body">

                <!--<div class="form-group">
                  <label for="category">Parent&nbsp;<span class="req">*</span></label>
                  {!! MyHelper::tep_draw_pull_down_menu('parent', MyHelper::tep_get_category_tree(1), 0) !!}
                </div> -->

                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="slug">Slug&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="slug" placeholder="Slug" type="text" value="{{ old('slug') }}">
                </div>


               <!--  <div class="form-group">
                  <label for="wallpaper_pos">Wallpaper Position&nbsp;</label>
                  <select name="wallpaper_pos" class="form-control">
                     <option value="">-- Select --</option>
                     <option value="1">-- 1 --</option>
                     <option value="2">-- 2 --</option>
                     <option value="3">-- 3 --</option>
                     <option value="4">-- 4 --</option>
                     <option value="5">-- 5 --</option>
                  </select>
                </div> 

                <div class="form-group">
                  <label for="wallpaper_image">Image</label>
                  <input class="form-control" name="wallpaper_image" placeholder="Wallpaper Image" type="file" value="" />
                </div> -->

                <div class="form-group">
                  <label for="wallpaper_image">Image</label>
                  <!-- <input class="form-control slim" name="wallpaper_image" placeholder="Wallpaper Image" type="file" value="" /> -->

                  <div class="slim" data-label="Click here to Upload" style="cursor:pointer;" data-size="250,250" data-ratio="1:1" >
                      <input type="file" accept="image/jpeg, image/gif, image/png, image/jpg"  id="wallpaper_image">
                  </div>


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

    <script src="{{ URL::asset('backend/assets/js/slim.kickstart.min.js') }}"></script>

@stop