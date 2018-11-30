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
            <p style="padding:10px 0 0 10px"><strong><span class="req">*</span></strong> indicates required fields</p>

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
                   @php
                            $cselected = '';
                            //if ( ! empty($permission_obj["index_categories"]) &&  ! empty($permission_obj["create_category"]) &&  ! empty($permission_obj["edit_category"]) &&  ! empty($permission_obj["destroy_category"]))
                            if ( ! empty($permission_obj["index_categories"]) &&  ! empty($permission_obj["create_category"]) &&  ! empty($permission_obj["edit_category"]))
                            $cselected = 'checked';
                    @endphp

                  <label for="category">Permission&nbsp;<span class="req">*</span>&nbsp;&nbsp;<input type='checkbox' id='select_all' name='select_all' /><span style="font-weight:normal;font-size:12px;padding:0 0 0 2px">Select All</span></label></label>
                  <ul>
                    <li>Categories&nbsp;&nbsp;<input {{ $cselected }} type='checkbox' id='cat_all' name='cat_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                        
                         <li><input class='categry' name="index_categories" type="checkbox" {{ ($permission_obj["index_categories"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Categories&nbsp;&nbsp;&nbsp;<input class='categry' name="create_category" type="checkbox" value="1" {{ ($permission_obj["create_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Category&nbsp;&nbsp;&nbsp;<input class='categry' name="edit_category" type="checkbox" value="1" {{ ($permission_obj["edit_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Category&nbsp;&nbsp;&nbsp;<!--<input class='categry' name="destroy_category" type="checkbox" value="1" {{ ($permission_obj["destroy_category"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Category--></li>
                      </ul>
                    </li>

                    @php
                            $pselected = '';
                            //if ( ! empty($permission_obj["index_products"]) &&  ! empty($permission_obj["create_product"]) &&  ! empty($permission_obj["edit_product"]) &&  ! empty($permission_obj["destroy_product"]))
                            if ( ! empty($permission_obj["index_products"]) &&  ! empty($permission_obj["create_product"]) &&  ! empty($permission_obj["edit_product"]))
                            $pselected = 'checked';
                    @endphp


                    <li>Products&nbsp;&nbsp;<input {{ $pselected }} type='checkbox' id='prd_all' name='prd_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='prdct' name="index_products" type="checkbox" {{ ($permission_obj["index_products"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Products&nbsp;&nbsp;&nbsp;<input class='prdct' name="create_product" type="checkbox" value="1" {{ ($permission_obj["create_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Product&nbsp;&nbsp;&nbsp;<input class='prdct' name="edit_product" type="checkbox" value="1" {{ ($permission_obj["edit_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Product&nbsp;&nbsp;&nbsp;<!--<input class='prdct' name="destroy_product" type="checkbox" value="1" {{ ($permission_obj["destroy_product"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Product</li> -->
                      </ul>
                    </li>

                    @php
                            $oselected = '';
                            if ( ! empty($permission_obj["index_offers"]) &&  ! empty($permission_obj["create_offer"]) &&  ! empty($permission_obj["edit_offer"]) &&  ! empty($permission_obj["destroy_offer"]))
                            $oselected = 'checked';
                    @endphp

                    <li>Offers&nbsp;&nbsp;<input type='checkbox' {{ $oselected }} id='offrs_all' name='offrs_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='offrs' name="index_offers" type="checkbox" {{ ($permission_obj["index_offers"] == 1) ? "checked='checked'" : ""  }} value="1">&nbsp;View Offers&nbsp;&nbsp;&nbsp;<input class='offrs' name="create_offer" type="checkbox" value="1" {{ ($permission_obj["create_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Offer&nbsp;&nbsp;&nbsp;<input class='offrs' name="edit_offer" type="checkbox" value="1" {{ ($permission_obj["edit_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Offer&nbsp;&nbsp;&nbsp;<input class='offrs' name="destroy_offer" type="checkbox" value="1" {{ ($permission_obj["destroy_offer"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Offer</li>
                      </ul>
                    </li>

                    @php
                            $dselected = '';
                            //if ( ! empty($permission_obj["index_dimension"]) &&  ! empty($permission_obj["create_dimension"]) &&  ! empty($permission_obj["edit_dimension"]) &&  ! empty($permission_obj["destroy_dimension"]))
                            if ( ! empty($permission_obj["index_dimension"]) &&  ! empty($permission_obj["create_dimension"]) &&  ! empty($permission_obj["edit_dimension"]))
                            $dselected = 'checked';
                    @endphp


                    <li>Dimension&nbsp;&nbsp;<input {{ $dselected }} type='checkbox' id='dmn_all' name='dmn_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                       <ul class="permission">
                         <li><input class='dmns' name="index_dimension" type="checkbox" value="1" {{ ($permission_obj["index_dimension"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Dimension&nbsp;&nbsp;&nbsp;<input class='dmns' name="create_dimension" type="checkbox" value="1" {{ ($permission_obj["create_dimension"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Dimension&nbsp;&nbsp;&nbsp;<input name="edit_dimension" class='dmns' type="checkbox" value="1" {{ ($permission_obj["edit_dimension"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Dimension&nbsp;&nbsp;&nbsp;<!-- <input class='dmns' name="destroy_dimension" type="checkbox" value="1" {{ ($permission_obj["destroy_dimension"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Dimension--></li>
                       </ul>
                    </li>

                    @php
                            $rselected = '';
                            //if ( ! empty($permission_obj["index_roles"]) &&  ! empty($permission_obj["create_role"]) &&  ! empty($permission_obj["edit_role"]) &&  ! empty($permission_obj["destroy_role"]))
                            if ( ! empty($permission_obj["index_roles"]) &&  ! empty($permission_obj["create_role"]) &&  ! empty($permission_obj["edit_role"]))
                            $rselected = 'checked';
                    @endphp

                     <li>Roles&nbsp;&nbsp;<input {{ $rselected }} type='checkbox' id='roles_all' name='roles_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                         <ul class="permission">
                           <li><input class='rls' name="index_roles" type="checkbox" value="1" {{ ($permission_obj["index_roles"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Roles&nbsp;&nbsp;&nbsp;<input class='rls' name="create_role" type="checkbox" value="1" {{ ($permission_obj["create_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Roles&nbsp;&nbsp;&nbsp;<input class='rls' name="edit_role" type="checkbox" value="1" {{ ($permission_obj["edit_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Roles&nbsp;&nbsp;&nbsp;<!--<input name="destroy_role" class='rls' type="checkbox" value="1" {{ ($permission_obj["destroy_role"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Roles--></li>
                         </ul>
                      </li>

                      @php
                            $uselected = '';
                            if ( ! empty($permission_obj["index_users"]) &&  ! empty($permission_obj["create_user"]) &&  ! empty($permission_obj["edit_user"]) &&  ! empty($permission_obj["destroy_user"]))
                            $uselected = 'checked';
                      @endphp

                      <li>Users&nbsp;&nbsp;<input {{ $uselected }} type='checkbox' id='usrs_all' name='usrs_all' /><span style="font-weight:normal;font-size:11px;padding:0 0 0 2px">Select All</span>
                         <ul class="permission">
                           <li><input class='usr' name="index_users" type="checkbox" value="1" {{ ($permission_obj["index_users"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Users&nbsp;&nbsp;&nbsp;<input class='usr' name="create_user" type="checkbox" value="1" {{ ($permission_obj["create_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Add Users&nbsp;&nbsp;&nbsp;<input class='usr'  name="edit_user" type="checkbox" value="1" {{ ($permission_obj["edit_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Edit Users&nbsp;&nbsp;&nbsp;<input name="destroy_user" class='usr'  type="checkbox" value="1" {{ ($permission_obj["destroy_user"] == 1) ? "checked='checked'" : ""  }}>&nbsp;Delete Users</li>
                         </ul>
                      </li>

                      <li>Orders
                           <ul class="permission">
                             <li><input name="index_orders" type="checkbox" value="1" {{ ($permission_obj["index_orders"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Orders&nbsp;&nbsp;&nbsp;
                           </ul>
                      </li>

                       <li>Queries
                             <ul class="permission">
                               <li><input name="index_queries" type="checkbox" value="1" {{ ($permission_obj["index_queries"] == 1) ? "checked='checked'" : ""  }}>&nbsp;View Contact Us Queries&nbsp;&nbsp;&nbsp;
                             </ul>
                       </li>

                  </ul>                    
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                    <label for="status">Status&nbsp;</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ ($roles->status == 1) ? "selected='selected'" : "" }}>Active</option>
                        <option value="0" {{ ($roles->status == 0) ? "selected='selected'" : "" }}>Inactive</option>
                    </select>
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