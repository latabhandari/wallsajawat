@extends('admin.layout.master')

@section('css')
 <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@section('content')

 <section class="content" style="min-height:0px !important">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3></h3>
              <p>Ads Post</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3></h3>
              <p>Favorite Ads</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </section> 


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Personal Details:</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width:50%">Name:</th>
                        <td><i class="fa fa-user-o"></i>&nbsp;&nbsp;{{ $request->name }}</td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<a href="mailto:{{ $request->email }}">{{ $request->email }}</a></td>
                      </tr>
                      <tr>
                        <th>Mobile Number:</th>
                        <td><i class="fa fa-mobile"></i>&nbsp;&nbsp;{{ empty($request->mobile) ? 'N/A' : $request->mobile }}</td>
                      </tr>

                      <tr>
                        <th>Registered Date/Time:</th>
                        <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ date('D, j M\'y h:i a', $request->unix_timestamp) }}</td>
                      </tr>

                      <tr>
                        <th>Last Login:</th>
                        <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ date('D, j M\'y h:i a', $request->last_login) }}</td>
                      </tr>

                      <tr>
                        <th>Ip Address:</th>
                        <td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ empty($request->ip_address) ? 'N/A' : $request->ip_address }}</td>
                      </tr>

            
                    </tbody></table>
                  </div>
                  
                </div>
                <!-- /.col -->


                     <div class="col-xs-6">
                        <p class="lead">Address Information:</p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th style="width:50%">Address:</th>
                                <td>{{ $request->profile->address }}</td>
                              </tr>
                              <tr>
                                <th>City:</th>
                                <td>{{ $profile->city->name }}</a></td>
                              </tr>
                              <tr>
                                <th>State:</th>
                                <td>{{ $profile->state->name }}</td>
                              </tr>

                              <tr>
                                <th>Zipcode:</th>
                                <td>{{ $request->profile->pin }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
            
                                    
                      </div>
            
            
                </div>
                <!-- /.col -->
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@stop


@section('pagejs')

@stop