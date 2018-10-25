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
              <h3 class="box-title">Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Personal Details</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width:50%">Name:</th>
                        <td>{{ $request->result->first_name }} {{ $request->result->last_name }}</td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<a href="mailto:{{ $request->result->email }}">{{ $request->result->email }}</a></td>
                      </tr>
                      <tr>
                        <th>Mobile Number:</th>
                        <td><i class="fa fa-mobile"></i>&nbsp;&nbsp;{{ $request->result->mobile_number }}</td>
                      </tr>

                      <tr>
                        <th>Govt. UID Number:</th>
                        <td><i class="fa fa-id-card-o"></i>&nbsp;&nbsp;{{ $request->result->govt_uid_no }}</td>
                      </tr>

                      <tr>
                        <th>Gender:</th>
                        <td><i class="fa fa-{{ $request->result->gender == 1 ? 'male' : 'female' }}"></i>&nbsp;&nbsp;{{ $request->result->gender == 1 ? 'Male' : 'Female' }}</td>
                      </tr>

                      <tr>
                        <th>Date of Birth:</th>
                        <td><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp;{{ date('D, j M\'y', $request->result->date_of_birth) }}</td>
                      </tr>

                      <tr>
                        <th>Age:</th>
                        <td>{{ (date('Y') - date('Y', $request->result->date_of_birth)) }}</td>
                      </tr>

                      <tr>
                        <th>Employment Type:</th>
                        <td>{{ $request->result->employment_type == 1 ? 'Salaried' : 'Self Employed' }}</td>
                      </tr>

                      <tr>
                        <th>Monthly Income / Salary:</th>
                        <td>${{ MyHelper::priceFormat($request->result->monthly_income) }}</td>
                      </tr>

                      <tr>
                        <th>Additional Income:</th>
                        <td>{{ empty($request->result->additional_income) ? 'N/A' : '$'.MyHelper::priceFormat($request->result->additional_income) }}</td>
                      </tr>

                      <tr>
                        <th>Address:</th>
                        <td>{{ $request->result->address }}</td>
                      </tr>

                      <tr>
                        <th>City:</th>
                        <td>{{ $request->result->city }}</td>
                      </tr>

                      <tr>
                        <th>State:</th>
                        <td>{{ $request->result->state }}</td>
                      </tr>

                      <tr>
                        <th>Zipcode:</th>
                        <td>{{ $request->result->zipcode }}</td>
                      </tr>

                      <tr>
                        <th>Country:</th>
                        <td>{{ MyHelper::getCountryName($request->result->country_id) }}</td>
                      </tr>

                      @php
                        switch($request->result->residence_type)
                           {
                             case 1:
                                     $residence_type  = 'Owned by self/spouse';
                                     break;
                             case 2:
                                     $residence_type  = 'Owned by parent/sibling';
                                     break;
                             case 3:
                                     $residence_type  = 'Rented - With Family';
                                     break;
                             case 4:
                                     $residence_type  = 'Rented - With Friends';
                                     break;
                             case 5:
                                     $residence_type  = 'Rented - Staying alone';
                                     break;
                             case 6:
                                     $residence_type  = 'Paying guest';
                                     break;
                             case 7:
                                     $residence_type  = 'Hostel';
                                     break;
                             case 8:
                                     $residence_type  = 'Company provided';
                                     break;
                           }
                      @endphp

                       <tr>
                         <th>Residence Type:</th>
                         <td>{{ $residence_type }}</td>
                       </tr>
                      
                       <tr>
                         <th>Moved to current city:</th>
                         <td>{{ date('M Y', $request->result->move_current_city) }}</td>
                       </tr>

                       <tr>
                         <th>Moved to current residence:</th>
                         <td>{{ date('M Y', $request->result->move_current_residence) }}</td>
                       </tr>

                       @php
               $cnt = 0;
             $rf  = 0;
                         if (count($documents)): 
                       @endphp

                       <tr>
                         <td colspan="2">
                             <table class="table">
                              <caption>Uploaded Documents</caption>
                              
                                  @foreach ($documents as $doc)
                                   <tr><td>{{ ++$cnt }}) {{ $doc->doclabel->name }}</td><td><a href="{{ route('admin.documents.download',  $doc->document) }}">{{ $doc->document  }}</a></td></tr>
                                  @endforeach

                            </table>
                         </td>
                       </tr>
             
             @if ($reference->count())
                <tr>
                            <td colspan="2">
                              <table class="table">
                                <caption>References</caption>
                  <tr>
                     <th>S.No</th>
                     <th>Name</th>
                     <th>Phone No</th>
                     <th>Address</th>
                     <th>City</th>
                     <th>State</th>
                     <th>Zipcode</th>
                  </tr>
                                  @foreach (json_decode($reference->reference) as $rf_data)
                    <tr>
                     <td>{{ ++$rf }}</td> 
                     <td>{{ $rf_data->name }}</td>
                     <td>{{ $rf_data->phone_number }}</td>
                     <td>{{ $rf_data->address }}</td>
                     <td>{{ $rf_data->city }}</td>
                     <td>{{ $rf_data->state }}</td>
                     <td>{{ $rf_data->zipcode }}</td>
                  </tr>
                                  @endforeach
                               </table>
                            </td>
                         </tr>
             @endif
             
                    @php
                       endif;
                    @endphp

                    </tbody></table>
                  </div>
                  
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead">Loan Information</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>

                      <tr>
                        <th style="width:50%">Loan Number:</th>
                        <td>{{ $request->loan_number }}</td>
                      </tr>

                      <tr>
                        <th>Category:</th>
                        <td>{{ $request->category->name }}</td>
                      </tr>

                      <tr>
                        <th>Interest Rate:</th>
                        <td>{{ $request->interest_rate }} %</td>
                      </tr>

                      <tr>
                        <th>Tenure:</th>
                        <td>{{ MyHelper::getTenure($request->tenure) }}</td>
                      </tr>

                       @php
                            $loan_breakup = MyHelper::getEMI($request->loan_amount, $request->interest_rate, $request->tenure);
                       @endphp

                      <tr>
                        <th style="width:50%">Loan Amount:</th>
                        <td><code>${{ MyHelper::priceFormat($request->loan_amount) }}</code></td>
                      </tr>


                      <tr>
                        <th>Loan EMI:</th>
                        <td><code>${{ $loan_breakup['emi'] }}<code></td>
                      </tr>

                      <tr>
                        <th>Total Interest Payable:</th>
                        <td><code>${{ $loan_breakup['total_interest_payable'] }}</td>
                      </tr>

                      <tr>
                        <th>Total Payment (Principal + Interest):</th>
                        <td><code>${{ $loan_breakup['total_payment'] }}<code></td>
                      </tr>


                      <tr>
                        <th>Employment Type When Applied:</th>
                        <td>{{ ($request->employment_type == 1) ? 'Salaried' : 'Self Employed' }}</td>
                      </tr>

                       <tr>
                        <th>Monthly Income / Salary  When Applied:</th>
                        <td>${{ MyHelper::priceFormat($request->monthly_income) }}</td>
                      </tr>

                       <tr>
                        <th>Additional Income When Applied:</th>
                        <td>{{ ! empty($request->additional_income) ? '$' . MyHelper::priceFormat($request->additional_income) : 'N/A' }}</td>
                       </tr>

                       <tr>
                        <th>Additional Income Source:</th>
                        <td>{{ ! empty($request->additional_income_source) ? $request->additional_income_source : 'N/A' }}</td>
                       </tr>


                      @php
                        $loan_status_time = null;
                        
                        switch ($request->status)
                          {
                              case 1:
                                       $loan_status       = 'Pending';
                                       break;
                              case 2:
                                       $loan_status       = 'Reviewed';
                                       $loan_status_time  =  date('D, j M\'y h:i a', $request->status_time);
                                       break;
                              case 3:
                                       $loan_status       = 'Declined';
                                       $loan_status_time  =  date('D, j M\'y h:i a', $request->status_time);
                                       break;
                              case 4:
                                       $loan_status       = 'Approved';
                                       $loan_status_time  =  date('D, j M\'y h:i a', $request->status_time);
                                       break;
                          }
                      @endphp

                       <tr>
                          <th>Loan Status:</th>
                          <td><code>{{ $loan_status }}</code></td>
                       </tr>

                      @php
                          if ( ! empty($loan_status_time)) {
                      @endphp
                           <tr>
                            <th>Update Status Time:</th>
                            <td>{{ $loan_status_time }}</td>
                           </tr>
                      @php
                            }
                      @endphp

                   </tbody></table>
                  </div>
                </div>

                  <div class="col-xs-6">

                    <div class="col-md-12">
                      <!-- Box Comment -->
                      <div class="box box-widget">
                        <!-- /.box-header -->
                       
                        <!-- /.box-body -->
                        <p class="lead" style="margin-bottom:10px">Comments&nbsp;<i title="refresh" id="refreshcomment" class="fa fa-circle-o-notch" style="font-size:15px;cursor:pointer"></i></p>
                        <div class="box-footer box-comments" style="height:175px;overflow-y: scroll;">

                          @if(count($comments))
                          <div id="msg"></div>
                          @foreach($comments as $comment_data)
                          @php
                          $del = null;
                          switch ($comment_data->is_admin)
                             {
                                case 1:
                                         $username    =  MyHelper::getAdminField('name');
                                         $profilepic  =  URL::to('build/assets/images/user_default.png');
                                         $del         =  '<span id="delcomment" data-attr="'.$comment_data->random_id.'" class="text-muted pull-right delcomnt">X</span>';
                                         break;
                                case 2:
                                         $username   = $comment_data->result->first_name;
                                         $profile    = $comment_data->result->pic;
                                         $profilepic = ! empty($profile) ? URL::to('build/uploads/thumbnail/'.$profile) : URL::to('build/assets/images/user_default.png');
                                         break;
                             }
                          @endphp

                          <div class="box-comment" id="boxcomment{{ $comment_data->random_id }}">
                              <img class="img-circle img-sm" src="{{ $profilepic }}" alt="User Image">
                                <div class="comment-text">
                                   <span class="username">{{ $username }} {!! $del !!}<span class="text-muted pull-right">{{ date('D, j M\'y H:i', $comment_data->unix_timestamp) }}</span></span>{{ $comment_data->comment }}</div>
                          </div>

                          @endforeach
                          @else
                                <div id="msg">no comments</div>
                          @endif                       
                         

                          <!-- /.box-comment -->
                        </div>
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            
                            <p id="loader" style="margin-top:3px"></p>

                            {!! Form::open(['role' => 'form', 'autocomplete' => 'off', 'id' => 'commentForm']) !!}

                            <img class="img-responsive img-circle img-sm" src="{{ URL::to('build/assets/images/user_default.png') }}" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                              <input class="form-control input-sm" name="comment" id="comment" placeholder="Press enter to post comment" type="text">
                            </div>

                            {!! Form::close() !!}

                        </div>
                        <!-- /.box-footer -->
                      </div>
                      <!-- /.box -->
                    </div>

{{-- 
                    <div class="col-md-12">
                        <div class="box box-primary" style="margin:0 0 10px 0">
                          <div class="box-header with-border">
                            <h3 class="box-title">Compose New Message</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                                 <textarea id="" class="form-control" style="resize:none" rows="3" placeholder="Message"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:5px">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>                          

                          </div>

                        </div>
                        <!-- /. box -->
                      </div>

                       --}}


                     <div class="col-xs-12">
                          <p class="lead" style="margin-bottom:0">Update Loan's Status here</p>
                          @if(Session::has('success'))
                            <div class="alert-success alert">
                              <p><i class="fa fa-check"></i> Loan's Status has been changed successfully.!</p>
                            </div>
                          @endif

                         @if ($errors->all())
                              <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                  <p><i class="fa fa-exclamation-circle"></i> {{ $error }} </p>
                                @endforeach
                              </div>
                         @endif

                         {!! Form::open(['route' => ['update.loan.status', $request->id, $request->borrower_id], 'role' => 'form', 'autocomplete' => 'off']) !!}
                          <div class="box-body">
                            <div class="form-group">
                              <label for="notes">Notes<span class="req">*</span>&nbsp;</label>
                              <textarea name="notes" class="form-control" style="resize:none" rows="5"> {{ empty(old('notes')) ? 'your loan request has been successfully reviewed. please upload document to process the loan request.' : old('notes') }}</textarea>
                            </div>

                            
                            <div class="form-group">
                                <label>Status<span class="req">*</span></label>
                                <select name="loan_status" id="loan_status" class="form-control" onchange="docAction(this.value)">
                                    <option value="">-- Select --</option>
                                    <option value="2" {{ old('loan_status') == 2 ? "selected" : "" }}>Reviewed</option>
                                    <option value="3" {{ old('loan_status') == 3 ? "selected" : "" }}>Declined</option>
                                </select>
                            </div>
                            

                            <div class="form-group" style="display:none" id="docContainer">
                                <label>Upload Documents</label>
                                <ul>
                                @foreach (MyHelper::requireDocuments($request->borrower_id) as $key => $doc)
                                 <li><input checked="checked" onclick="getAction({{ $key }})" type="checkbox" name="upload_documents[]" value="{{ $key }}">&nbsp;&nbsp;{{ $doc }}</li>
                                @endforeach
                               </ul>
                               <textarea id="otherContainer" style="display:none;resize:none;margin-left:10px;width:98%" name="other_documents" rows="2" class="form-control" placeholder="Description"> {{  old('other_documents') }}</textarea>
                            </div>


                            <div class="form-group">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                          {!! Form::close() !!}
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

<script src="{{ URL::to('build/assets/js/jquery.validate.min.js') }}"></script>

<script>
 /* $.validator.setDefaults({
    submitHandler: function() {
      alert("submitted!");
    }
  });
*/
function docAction(val)
 {
      if (2 == val)
          $("#docContainer").css("display", "");
      else
          $("#docContainer").css("display", "none");
 }

function getAction(index)
 {
    if (4 == index)
       {
          var style = $("#otherContainer").css("display");
          if (style == "none")
            $("#otherContainer").css("display", "");
          else
            $("#otherContainer").css("display", "none");
       }
 }
  
  $(document).ready(function() {

    var loan_status_val  = parseInt($('#loan_status :selected').val());
    if (2 == loan_status_val)
    $("#docContainer").css("display", "");

    
    $('i#refreshcomment').click(function() {

            $.ajax({
                  type:'POST',
                  url: '{{ route('admin.loan.comments') }}',
                  dataType:'json',
                  headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
                  data: {
                          'loan_id': '{{ encrypt($request->id) }}',
                  },
                  beforeSend: function() {
                      // setting a timeout
                      //$(this).addClass(' fa-spin');
                      $('#msg').css('display', 'block').html('loading...');
                  },
                  success:function(response) {

                    var length = parseInt(response.data.length);
                    
                    if (length)
                       {
                          var html = '';
                          html += '<div id="msg"></div>';
                          $.each(response.data, function(j, k) {
                            html += '<div class="box-comment" id="boxcomment' + k.i + '"><img class="img-circle img-sm" src="' + k.p + '" alt="User Image"><div class="comment-text"><span class="username">' + k.u + ' ' + k.d + '<span class="text-muted pull-right">' + k.t + '</span></span>' + k.c + '</div></div>';
                          });

                          $('#msg').css('display', 'none');
                          $('.box-comments').html(html);
                       }
                      else
                          $('#msg').css('display', 'block').html('no comments');

                      var d = $('.box-comments');
                      d.scrollTop(d.prop("scrollHeight"));
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                          $('.box-comments').html('Internal server error occured. Try again or <a href="{{ url()->full() }}">refresh</a> the page');
                  },
              });
    });

  $(document).on('click', 'span#delcomment', function(e) { 

       if (confirm('are you sure?')) {

        var randomid = $.trim($(this).attr('data-attr'));

        $("#boxcomment" + randomid).remove();

        $.ajax({
                  type:'POST',
                  url: '{{ route('admin.loan.delcomment') }}',
                  dataType:'json',
                  headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
                  data: {
                          'randomid':  randomid
                  },
                  success:function(data) {

                  }
              });
       }

    });

    $.ajaxSetup({
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
   });


     // validate the comment form when it is submitted
    $("#commentForm").validate({
      rules: {
          comment: "required",
        },
      messages: {
        comment: "Please enter comment",
      },

      submitHandler: function (form) {

        var comment = $.trim($('#comment').val());
        $.ajax({
                  type:'POST',
                  url: '{{ route('admin.loan.comment') }}',
                  dataType:'json',
                  headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
                  data: {
                          'comment':  comment,
                          'loan_id': '{{ encrypt($request->id) }}',
                  },
                  beforeSend: function() {
                      // setting a timeout
                      $("#loader").html('loading...');
                  },
                   success:function(data) {

                      $('.box-comments-no').remove();

                      $("#loader").css('display','none');
                      $('#comment').val('');
                      var html = '';
                      html += '<div class="box-comment" id="boxcomment' + data.id + '"><img class="img-circle img-sm" src="{{ URL::to('build/assets/images/user_default.png') }}" alt="User Image"><div class="comment-text"><span class="username">' + data.name + ' <span id="delcomment" data-attr="{{ Request::segment(3) }}" class="text-muted pull-right delcomnt">X</span><span class="text-muted pull-right">' + data.time + '</span></span>' + comment + '</div></div>';
                      $("#msg").remove();

                      $('.box-comments').append(html);

                      var d = $('.box-comments');
                      d.scrollTop(d.prop("scrollHeight"));

                   }
            });
      }

    });
  });
  </script>
@stop