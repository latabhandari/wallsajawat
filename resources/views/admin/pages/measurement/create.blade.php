@extends('admin.layout.master')

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Measurement</h3>
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

            {!! Form::open(['route' => 'measurement.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="name">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="square_feet_value">1 Square Feet = &nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="square_feet_value" placeholder="Measurement in Square Foot" type="text" value="{{ old('square_feet_value') }}">
                  <p style="font-size:12px;font-style:italic;color:#888">for eg: 1 Square Foot = 144 Square Inch</p>
                </div>

                <div class="form-group">
                  <label for="display_order">Display Order&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="display_order" placeholder="Display Order" type="text" value="{{ old('display_order') }}">
                </div>

                <div class="form-group">
                  <label for="status">Status&nbsp;</label>
                  <select name="status" class="form-control">
                     <option value="1">-- Active --</option>
                     <option value="1">-- Inactive --</option>
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