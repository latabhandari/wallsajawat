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
              <h3 class="box-title">Edit Attribute</h3>
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

            {!! Form::model($attribute, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['attribute.update', $attribute->id]]) !!}

              <div class="box-body">
                         
                <div class="form-group">
                  <label for="title">Title&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="title" placeholder="Title" type="text" value="{{ $attribute->title }}">
                </div>           

                <div class="form-group">
                  <label for="status">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($attribute->status == 1) ? "selected='selected'" : ""}}>Active</option>
                      <option value="0" {{ ($attribute->status == 0) ? "selected='selected'" : ""}}>Inactive</option>
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