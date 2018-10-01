@extends('admin.layout.master')

@section('content')
<style>
  .permission{margin:0;padding:0;}
  .permission li{list-style-type: none;padding-left:10px;}
</style>
  <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Role</h3>
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

            {!! Form::open(['route' => 'roles.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="category">Profile&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>
              </div>

               <div class="box-body">
                <div class="form-group">
                  <label for="category">Permission&nbsp;<span class="req">*</span></label>
                  <ul style="line-height:24px">
                    <li>Category
                       <ul class="permission">
                         <li><input name="view_category" type="checkbox" value="1">&nbsp;View Category&nbsp;&nbsp;&nbsp;<input name="add_category" type="checkbox" value="1">&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input name="edit_category" type="checkbox" value="1">&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<input name="delete_category" type="checkbox" value="1">&nbsp;Delete Category</li>
                       </ul>
                    </li>

                    <li>Product
                       <ul class="permission">
                         <li><input name="view_product" type="checkbox" value="1">&nbsp;View Product&nbsp;&nbsp;&nbsp;<input name="add_category" type="checkbox" value="1">&nbsp;Add Product&nbsp;&nbsp;&nbsp;<input name="edit_product" type="checkbox" value="1">&nbsp;Edit Product&nbsp;&nbsp;&nbsp;<input name="delete_category" type="checkbox" value="1">&nbsp;Delete Product</li>
                       </ul>
                    </li>

                    <li>Offers
                       <ul class="permission">
                         <li><input name="view_offers" type="checkbox" value="1">&nbsp;View Offers&nbsp;&nbsp;&nbsp;<input name="add_offers" type="checkbox" value="1">&nbsp;Add Offer&nbsp;&nbsp;&nbsp;<input name="edit_offers" type="checkbox" value="1">&nbsp;Edit Offer&nbsp;&nbsp;&nbsp;<input name="delete_offers" type="checkbox" value="1">&nbsp;Delete Offer</li>
                       </ul>
                    </li>

                    <li>Roles
                       <ul class="permission">
                         <li><input name="view_roles" type="checkbox" value="1">&nbsp;View Roles&nbsp;&nbsp;&nbsp;<input name="add_roles" type="checkbox" value="1">&nbsp;Add Role&nbsp;&nbsp;&nbsp;<input name="edit_roles" type="checkbox" value="1">&nbsp;Edit Role&nbsp;&nbsp;&nbsp;<input name="delete_roles" type="checkbox" value="1">&nbsp;Delete Role</li>
                       </ul>
                    </li>

                    <li>Users
                             <ul class="permission">
                               <li><input name="view_users" type="checkbox" value="1">&nbsp;View Users&nbsp;&nbsp;&nbsp;<input name="add_users" type="checkbox" value="1">&nbsp;Add Users&nbsp;&nbsp;&nbsp;<input name="edit_users" type="checkbox" value="1">&nbsp;Edit Users&nbsp;&nbsp;&nbsp;<input name="delete_users" type="checkbox" value="1">&nbsp;Delete User</li>
                             </ul>
                    </li>



                  </ul>
                    
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