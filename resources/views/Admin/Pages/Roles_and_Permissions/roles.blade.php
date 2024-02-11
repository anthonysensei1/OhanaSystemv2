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
                     <h4>List of Roles</h4>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_roles">
                        <i class="fas fa-plus"></i>
                        Add Roles
                     </button>
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Roles</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Admin</td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#update_roles">
                                    <i class="fas fa-pen"></i>
                                    Update
                                 </button>
                              </td>
                           </tr>
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

<!-- Add Dialog -->
<div class="modal fade" id="add_roles" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Create New Role</h4>
         </div>
         <div class="modal-body">
            <form action="">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="roles">Role Name :</label>
                     <input type="text" class="form-control" name="roles" id="roles">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-success btn-md">
               <i class="fas fa-check"></i>
               Submit
            </button>
            <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
               <i class="fas fa-times"></i>
               Cancel
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Add Dialog -->

<!-- Update Dialog -->
<div class="modal fade" id="update_roles" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Role</h4>
         </div>
         <div class="modal-body">
            <form action="">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="u_roles">Role Name :</label>
                     <input type="text" class="form-control" name="u_roles" id="u_roles">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-success btn-md">
               <i class="fas fa-check"></i>
               Save
            </button>
            <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
               <i class="fas fa-times"></i>
               Cancel
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Dialog -->
<script>
   $('#open_roles_permissions').addClass('menu-open');
   $('#roles').addClass('active');
</script>
@endsection
