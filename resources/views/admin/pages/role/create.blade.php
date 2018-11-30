@extends('admin.layout.master')

@section('content')
<style>
  .permission{margin:0;padding:0;}
  .permission li{list-style-type: none;padding-left:10px;}
  ul li{margin:6px 0;}
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
                    <div class="alert-danger alert">
                        <p><i class="fa fa-exclamation-circle"></i> {{ Session::get('error') }} </p>
                    </div>
               @endif

            <!-- form start -->

            {!! Form::open(['route' => 'roles.store', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
            <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

              <div class="box-body">

                <div class="form-group">
                  <label for="category">Role Name&nbsp;<span class="req">*</span></label>
                  <input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}">
                </div>
              </div>

               <div class="box-body">
                <div class="form-group">
                  <label for="category">Permission&nbsp;<span class="req">*</span>&nbsp;&nbsp;<input type='checkbox' id='select_all' name='select_all' /><span style="font-weight:normal;font-size:12px;padding:0 0 0 2px">Select All</span></label>
                  <ul style="line-height:24px">
                    <li>Categories&nbsp;&nbsp;<input type='checkbox' id='cat_all' name='cat_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='categry' name="index_categories" type="checkbox" value="1">&nbsp;View Categories&nbsp;&nbsp;&nbsp;<input class='categry' name="create_category" type="checkbox" value="1">&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input class='categry' name="edit_category" type="checkbox" value="1">&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<!--<input class='categry' name="destroy_category" type="checkbox" value="1">&nbsp;Delete Category--></li>
                       </ul>
                    </li>

                    <li>Products&nbsp;&nbsp;<input type='checkbox' id='prd_all' name='prd_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='prdct' name="index_products" type="checkbox" value="1">&nbsp;View Products&nbsp;&nbsp;&nbsp;<input name="create_product" class='prdct' type="checkbox" value="1">&nbsp;Add Product&nbsp;&nbsp;&nbsp;<input class='prdct' name="edit_product" type="checkbox" value="1">&nbsp;Edit Product&nbsp;&nbsp;&nbsp;<!--<input class='prdct' name="destroy_product" type="checkbox" value="1">&nbsp;Delete Product--></li>
                       </ul>
                    </li>

                    <li>Offers&nbsp;&nbsp;<input type='checkbox' id='offrs_all' name='offrs_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='offrs' name="index_offers" type="checkbox" value="1">&nbsp;View Offers&nbsp;&nbsp;&nbsp;<input class='offrs' name="create_offer" type="checkbox" value="1">&nbsp;Add Offer&nbsp;&nbsp;&nbsp;<input class='offrs' name="edit_offer" type="checkbox" value="1">&nbsp;Edit Offer&nbsp;&nbsp;&nbsp;<input class='offrs' name="destroy_offer" type="checkbox" value="1">&nbsp;Delete Offer</li>
                       </ul>
                    </li>


                    <li>Dimension&nbsp;&nbsp;<input type='checkbox' id='dmn_all' name='dmn_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='dmns' name="index_dimension" type="checkbox" value="1">&nbsp;View Dimension&nbsp;&nbsp;&nbsp;<input class='dmns' name="create_dimension" type="checkbox" value="1">&nbsp;Add Dimension&nbsp;&nbsp;&nbsp;<input class='dmns' name="edit_dimension" type="checkbox" value="1">&nbsp;Edit Dimension&nbsp;&nbsp;&nbsp;<!--<input class='dmns' name="destroy_dimension" type="checkbox" value="1">&nbsp;Delete Dimension--></li>
                       </ul>
                    </li>

                    <li>Roles&nbsp;&nbsp;<input type='checkbox' id='roles_all' name='roles_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='rls' name="index_roles" type="checkbox" value="1">&nbsp;View Roles&nbsp;&nbsp;&nbsp;<input class='rls' name="create_role" type="checkbox" value="1">&nbsp;Add Role&nbsp;&nbsp;&nbsp;<input class='rls' name="edit_role" type="checkbox" value="1">&nbsp;Edit Role&nbsp;&nbsp;&nbsp;<!--<input class='rls' name="destroy_role" type="checkbox" value="1">&nbsp;Delete Role--></li>
                       </ul>
                    </li>

                    <li>Users&nbsp;&nbsp;<input type='checkbox' id='usrs_all' name='usrs_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                             <ul class="permission">
                               <li><input class='usr' name="index_users" type="checkbox" value="1">&nbsp;View Users&nbsp;&nbsp;&nbsp;<input class='usr' name="create_user" type="checkbox" value="1">&nbsp;Add Users&nbsp;&nbsp;&nbsp;<input class='usr' name="edit_user" type="checkbox" value="1">&nbsp;Edit Users&nbsp;&nbsp;&nbsp;<input class='usr' name="destroy_user" type="checkbox" value="1">&nbsp;Delete User</li>
                             </ul>
                    </li>

                    <li>Orders
                             <ul class="permission">
                               <li><input name="index_orders" type="checkbox" value="1">&nbsp;View Orders&nbsp;&nbsp;&nbsp;
                             </ul>
                    </li>

                    <li>Queries
                             <ul class="permission">
                               <li><input name="index_queries" type="checkbox" value="1">&nbsp;View Contact Us Queries&nbsp;&nbsp;&nbsp;
                             </ul>
                    </li>

                  </ul>
                    
                </div>
              </div>

              <div class="box-body">
                  <div class="form-group">
                      <label for="category">Status&nbsp;</label>
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
<script>

  $(document).ready(function() {

    $("#select_all").change(function() {
            if (this.checked) {
                $("input[type='checkbox']").prop('checked', true);
            } else {
                $("input[type='checkbox']").prop('checked', false);
            }
    });

    $("#cat_all").change(function() {
            if (this.checked) {
                $(".categry").prop('checked', true);
            } else {
                $(".categry").prop('checked', false);
            }
    });

    $("#prd_all").change(function() {
            if (this.checked) {
                $(".prdct").prop('checked', true);
            } else {
                $(".prdct").prop('checked', false);
            }
    });

    $("#offrs_all").change(function() {
            if (this.checked) {
                $(".offrs").prop('checked', true);
            } else {
                $(".offrs").prop('checked', false);
            }
    });

    $("#dmn_all").change(function() {
            if (this.checked) {
                $(".dmns").prop('checked', true);
            } else {
                $(".dmns").prop('checked', false);
            }
    });

    $("#roles_all").change(function() {
            if (this.checked) {
                $(".rls").prop('checked', true);
            } else {
                $(".rls").prop('checked', false);
            }
    });

     $("#usrs_all").change(function() {
            if (this.checked) {
                $(".usr").prop('checked', true);
            } else {
                $(".usr").prop('checked', false);
            }
     });

  });

</script>

@stop
