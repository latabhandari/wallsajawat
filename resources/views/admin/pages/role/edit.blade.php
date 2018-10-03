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
                         <li><input name="index_categories" type="checkbox" {{ ($permission_obj["index_categories"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Category&nbsp;&nbsp;&nbsp;<input name="add_category" type="checkbox" value="1" {{ ($permission_obj["add_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input name="edit_category" type="checkbox" value="1" {{ ($permission_obj["edit_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<input name="destroy_category" type="checkbox" value="1" {{ ($permission_obj["destroy_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Category</li>
                      </ul>
                    </li>


                    <li>Product
                       <ul class="permission">
                         <li><input name="index_products" type="checkbox" {{ ($permission_obj["index_products"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Product&nbsp;&nbsp;&nbsp;<input name="add_product" type="checkbox" value="1" {{ ($permission_obj["add_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Product&nbsp;&nbsp;&nbsp;<input name="edit_product" type="checkbox" value="1" {{ ($permission_obj["edit_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Product&nbsp;&nbsp;&nbsp;<input name="destroy_product" type="checkbox" value="1" {{ ($permission_obj["destroy_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Product</li>
                      </ul>
                    </li>

                    <li>Offers
                       <ul class="permission">
                         <li><input name="index_offers" type="checkbox" {{ ($permission_obj["index_offers"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Offers&nbsp;&nbsp;&nbsp;<input name="add_offer" type="checkbox" value="1" {{ ($permission_obj["add_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Offer&nbsp;&nbsp;&nbsp;<input name="edit_offer" type="checkbox" value="1" {{ ($permission_obj["edit_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Offer&nbsp;&nbsp;&nbsp;<input name="destroy_offer" type="checkbox" value="1" {{ ($permission_obj["destroy_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Product</li>
                      </ul>
                    </li>

                      <li>Roles
                         <ul class="permission">
                           <li><input name="index_roles" type="checkbox" value="1" {{ ($permission_obj["index_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Roles&nbsp;&nbsp;&nbsp;<input name="add_role" type="checkbox" value="1" {{ ($permission_obj["add_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Roles&nbsp;&nbsp;&nbsp;<input name="edit_role" type="checkbox" value="1" {{ ($permission_obj["edit_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Roles&nbsp;&nbsp;&nbsp;<input name="destroy_role" type="checkbox" value="1" {{ ($permission_obj["destroy_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Roles</li>
                         </ul>
                      </li>

                      <li>Users
                         <ul class="permission">
                           <li><input name="index_users" type="checkbox" value="1" {{ ($permission_obj["index_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Users&nbsp;&nbsp;&nbsp;<input name="add_user" type="checkbox" value="1" {{ ($permission_obj["add_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Users&nbsp;&nbsp;&nbsp;<input name="edit_user" type="checkbox" value="1" {{ ($permission_obj["edit_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Users&nbsp;&nbsp;&nbsp;<input name="destroy_user" type="checkbox" value="1" {{ ($permission_obj["destroy_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Users</li>
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