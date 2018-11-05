@extends('admin.layout.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
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
              <h3 class="box-title">Coupon</h3>
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

            {!! Form::open(['route' => 'offers.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="coupon">Coupon&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="coupon" placeholder="Coupon" type="text" value="{{ old('coupon') }}">
                </div>

                <div class="form-group">
                  <label for="type">Type&nbsp;<span class="req">*</span></label>
                  <select class="form-control" name="type">
                     <option value="">-- Select --</option>
                     <option value="1">% Off</option>
                     <option value="2">Rs Off</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="discount">Discount&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="discount" placeholder="Discount" type="text" value="{{ old('discount') }}">
                </div>

                <div class="form-group">
                  <label for="start_date">Start Date&nbsp;<span class="req">*</span></label>
                  <input class="form-control" id="datepicker1" name="start_date" placeholder="Start date" type="text" value="{{ old('start_date') }}">
                </div>

                <div class="form-group">
                  <label for="end_date">End Date&nbsp;<span class="req">*</span></label>
                  <input class="form-control" id="datepicker2" name="end_date" placeholder="End date" type="text" value="{{ old('end_date') }}">
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
<script src="{{ URL::asset('backend/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
   //Date picker
   // set default dates
   var start = new Date();

    $('#datepicker1, #datepicker2').datepicker({
      autoclose: true,
      startDate: start()
    })

  // set end date to max one year period:
  var end = new Date(new Date().setYear(start.getFullYear()+1));

      $('#datepicker1').datepicker({
          startDate : start,
          endDate   : end
      // update "toDate" defaults whenever "fromDate" changes
      }).on('changeDate', function(){
          // set the "toDate" start to not be later than "fromDate" ends:
          $('#datepicker2').datepicker('setStartDate', new Date($(this).val()));
      }); 

</script>
@stop