@extends('admin.layout.master')

@section('css')
<style>
.comment-text{font-size:12px}
.delcomnt{margin-left:10px;font-weight:bold !important;cursor:pointer}
ul{margin:0;padding:0}
ul li{list-style-type:none;padding-left:10px}
</style>
@stop

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order's Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Details</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                    
                      </tbody></table>
                  </div>
                  
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
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