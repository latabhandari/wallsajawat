@extends('admin.layout.master')

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dimension</h3>
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

            {!! Form::open(['route' => 'dimension.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
            <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

              <div class="box-body">

                <div class="form-group">
                  <label for="name">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Ex- Roll 1" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="square_feet_value">Width&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="width" placeholder="Square Feet" type="text" value="{{ old('width') }}">
                </div>
				
				<div class="form-group">
                  <label for="square_feet_value">Height&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="height" placeholder="Square Feet" type="text" value="{{ old('height') }}">
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