@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h4>List of Roles and Permissions</h4>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#assign">
                        <i class="fas fa-plus"></i>
                        Assign Roles and Permissions
                     </button>
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Roles</th>
                              <th>Permissions</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($assign_permission_and_roles as $assign_permission_and_role)
                              <tr>
                                 <td>{{ $assign_permission_and_role['role'] }}</td>
                                 <td>{{ $assign_permission_and_role['assign_permission_name'] }}</td>
                                 <td class="text-center">
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#update_assign" onclick="edit('{{ $assign_permission_and_role['id'] }}', '{{ $assign_permission_and_role['role'] }}', '{{ $assign_permission_and_role['assign_permission'] }}')">
                                       <i class="fas fa-pen"></i>
                                       Update
                                    </button>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section><!-- /.content -->
</div>

<!-- Assign Dialog -->
<div class="modal fade" id="assign" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Assign Roles and Permissions</h4>
         </div>
         <form action="{{ route('assign_roles_permissions_store') }}" class="formPost">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="select_role">Select Role :</label>
                     <select class="form-control text-center text-bold" name="assign_role" required>
                        <option value="" selected disabled>- Select Role -</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role['id'] }}">{{ $role['role'] }}</option>
                        @endforeach
                     </select>
                     <label class="mt-2" for="select_permission">Select Permissions :</label>
                     <div class="icheck-primary">
                        <input class="checkall" type="checkbox" value="checkall" id="checkall">
                        <label for="checkall">Check all</label>
                     </div>
                     <hr class="hrColor">
                     <div class="row">
                        @foreach ($permissions as $permission)
                           <div class="col-md-3">
                              <div class="icheck-primary">
                                    <input type="checkbox" value="{{ $permission['id'] }}" name="assign_permission[]" id="check{{ $permission['id'] }}">
                                    <label for="check{{ $permission['id'] }}">{{ $permission['permission'] }}</label>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Submit
               </button>
               <button type="button" class="btn btn-outline-danger btn-md cancelBtn" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  Cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Assign Dialog -->

<!-- Update Assign Dialog -->
<div class="modal fade" id="update_assign" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Assign Roles and Permissions</h4>
         </div>
         <form action="{{ route('assign_roles_permissions_update') }}" class="formPost">
            <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <label for="select_role">Select Role :</label>
                        <input class="form-control text-center text-bold u_id" type="text" name="u_id" id="u_id" readonly hidden>
                        <input class="form-control text-center text-bold" type="text" id="u_role" disabled>
                        <label class="mt-2" for="select_permission">Select Permissions :</label>
                        <div class="icheck-primary">
                           <input class="checkall" type="checkbox" value="checkall" id="u_checkall">
                           <label for="u_checkall">Check all</label>
                        </div>
                        <hr class="hrColor">
                        <div class="row">
                           @foreach ($permissions as $permission)
                              <div class="col-md-3">
                                 <div class="icheck-primary">
                                       <input type="checkbox" value="{{ $permission['id'] }}" name="u_assign_permission[]" id="u_check{{ $permission['id'] }}">
                                       <label for="u_check{{ $permission['id'] }}">{{ $permission['permission'] }}</label>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Submit
               </button>
               <button type="button" class="btn btn-outline-danger btn-md cancelBtn" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  Cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Assign Dialog -->


<script type="text/javascript">
   $('#open_roles_permissions').addClass('menu-open');
   $('#assign_roles_permissions').addClass('active');

   $('#checkall').click(function() {
        $('input[name="assign_permission[]"]').prop('checked', this.checked);
    });

    $('input[name="assign_permission[]"]').change(function() {
        var allChecked = true;
        $('input[name="assign_permission[]"]').each(function() {
            if (!$(this).prop('checked')) {
                allChecked = false;
                return false; // break the loop
            }
        });
        
        $('#checkall').prop('checked', allChecked);
    });

   $('#u_checkall').click(function() {
      $('input[name="u_assign_permission[]"]').prop('checked', this.checked);
   });

   $('input[name="u_assign_permission[]"]').change(function() {
      var allChecked = true;
      $('input[name="u_assign_permission[]"]').each(function() {
            if (!$(this).prop('checked')) {
               allChecked = false;
               return false; // break the loop
            }
      });
      
      $('#u_checkall').prop('checked', allChecked);
   });

   $(".cancelBtn").click(function(){
      $("#assign input").prop('checked', false);
      $("#update_assign input").prop('checked', false);
   });

   function edit(id, role, permission) {
      const arrPermission = permission.split(",");
      $('.u_id').val(id);
      $('#u_role').val(role);

      let counter = 0;
      for (const i of arrPermission) {
         $('#u_check'+i).prop('checked', true);
         counter++;
      }

      if(counter === 9) {
         $('.checkall').prop('checked', true);
      }
   }

</script>
@endsection
