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
              <h3 class="box-title">Edit Dimension</h3>
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

            {!! Form::model($dimension, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['dimension.update', $dimension->id]]) !!}

              <div class="box-body">
                         
				<div class="form-group">
                  <label for="name">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Ex- Roll 1" type="text" value="{{ $dimension->name }}">
                </div>

                <div class="form-group">
                  <label for="square_feet_value">Width&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="width" placeholder="Square Feet" type="text" value="{{ $dimension->width }}">
                </div>
				
				<div class="form-group">
                  <label for="square_feet_value">Height&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="height" placeholder="Square Feet" type="text" value="{{ $dimension->height }}">
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