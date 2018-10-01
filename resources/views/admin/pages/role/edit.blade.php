@extends('admin.layout.master')

@section('content')
  <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Role</h3>
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

            {!! Form::model($roles, ['files' => true, 'autocomplete' => 'off', 'role' => 'form', 'method' => 'PATCH', 'route' => ['roles.update', $roles->id]]) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="name">Profile&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $roles->name }}">
                </div>

              </div>
              <!-- /.box-body -->

               @php
                  $permission = json_decode($roles->permission, true);
                  $permission_obj = $permission['permission'];
               @endphp

              <div class="box-body">
                <div class="form-group">
                  <label for="category">Permission&nbsp;<span class="req">*</span></label>
                  <ul>
                    <li>Category
                       <ul class="permission">
                         <li><input name="view_category" type="checkbox" {{ ($permission_obj["view_category"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Category&nbsp;&nbsp;&nbsp;<input name="add_category" type="checkbox" value="1" {{ ($permission_obj["add_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input name="edit_category" type="checkbox" value="1" {{ ($permission_obj["edit_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<input name="delete_category" type="checkbox" value="1" {{ ($permission_obj["delete_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Category</li>
                      </ul>
                    </li>

                          <li>Loan Category
                             <ul class="permission">
                               <li><input name="view_loan_category" type="checkbox" value="1" {{ ($permission_obj["view_loan_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Category&nbsp;&nbsp;&nbsp;<input name="add_loan_category" type="checkbox" value="1" {{ ($permission_obj["add_loan_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input name="edit_loan_category" type="checkbox" value="1" {{ ($permission_obj["edit_loan_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<input name="delete_loan_category" type="checkbox" value="1" {{ ($permission_obj["delete_loan_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Category</li>
                             </ul>
                          </li>

                          <li>Roles
                             <ul class="permission">
                               <li><input name="view_roles" type="checkbox" value="1" {{ ($permission_obj["view_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Roles&nbsp;&nbsp;&nbsp;<input name="add_roles" type="checkbox" value="1" {{ ($permission_obj["add_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Roles&nbsp;&nbsp;&nbsp;<input name="edit_roles" type="checkbox" value="1" {{ ($permission_obj["edit_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Roles&nbsp;&nbsp;&nbsp;<input name="delete_roles" type="checkbox" value="1" {{ ($permission_obj["delete_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Roles</li>
                             </ul>
                          </li>

                          <li>Users
                             <ul class="permission">
                               <li><input name="view_users" type="checkbox" value="1" {{ ($permission_obj["view_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Users&nbsp;&nbsp;&nbsp;<input name="add_users" type="checkbox" value="1" {{ ($permission_obj["add_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Users&nbsp;&nbsp;&nbsp;<input name="edit_users" type="checkbox" value="1" {{ ($permission_obj["edit_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Users&nbsp;&nbsp;&nbsp;<input name="delete_users" type="checkbox" value="1" {{ ($permission_obj["delete_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Users</li>
                             </ul>
                          </li>
                        </ul>                    
                </div>
              </div>

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

    <script src="{{ URL::asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
     $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
         //bootstrap WYSIHTML5 - text editor
       $('.textarea').wysihtml5()
   })
</script>

@stop