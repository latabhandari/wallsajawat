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
              <h3 class="box-title">User</h3>
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

            {!! Form::model($user, ['autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['user.update', $user->id]]) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="category">Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                  <label for="email">Email&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="email" placeholder="Email" type="text" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                  <label for="password">Password&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="password" placeholder="Password" type="password" value="">
                </div>

                <div class="form-group">
                  <label for="mobile">Mobile&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="mobile" placeholder="Mobile" type="text" value="{{ $user->mobile }}">
                </div>


                <div class="form-group">
                  <label for="roles">Roles&nbsp;</label>
                  <select class="form-control" name="role">
                      <option value="">-- Select --</option>
                      <option value="0" {{ ($user->role == 0) ? 'selected' : '' }}>User</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ ($user->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                      @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="category">Status&nbsp;</label>
                  <select class="form-control" name="status">
                      <option value="1" {{ ($user->status == 1) ? "selected='selected'" : ""}}>Active</option>
                      <option value="0" {{ ($user->status == 0) ? "selected='selected'" : ""}}>Inactive</option>
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