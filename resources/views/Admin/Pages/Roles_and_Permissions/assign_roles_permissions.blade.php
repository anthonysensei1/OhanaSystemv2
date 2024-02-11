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
                           <tr>
                              <td>Admin</td>
                              <td>Dashboard</td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#update_assign">
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

<!-- Assign Dialog -->
<div class="modal fade" id="assign" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Assign Roles and Permissions</h4>
         </div>
         <div class="modal-body">
            <form action="">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="select_role">Select Role :</label>
                     <select class="form-control text-center text-bold">
                        <option value="- Admin -">- Admin -</option>
                     </select>
                     <label class="mt-2" for="select_permission">Select Permissions :</label>
                     <div class="icheck-primary">
                        <input type="checkbox" value="" id="check1">
                        <label for="check1">Check all</label>
                     </div>
                     <hr class="hrColor">
                     <div class="row">
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check2">
                                 <label for="check2">Dashboard</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check3">
                                 <label for="check3">Guests</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check4">
                                 <label for="check4">Calenar</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check5">
                                 <label for="check5">Report</label>
                           </div>
                        </div>
                     </div>
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
<!-- End of Assign Dialog -->

<!-- Update Assign Dialog -->
<div class="modal fade" id="update_assign" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Assign Roles and Permissions</h4>
         </div>
         <div class="modal-body">
            <form action="">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="select_role">Select Role :</label>
                     <select class="form-control text-center text-bold">
                        <option value="- Admin -">- Admin -</option>
                     </select>
                     <label class="mt-2" for="select_permission">Select Permissions :</label>
                     <div class="icheck-primary">
                        <input type="checkbox" value="" id="check1">
                        <label for="check1">Check all</label>
                     </div>
                     <hr class="hrColor">
                     <div class="row">
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check2">
                                 <label for="check2">Dashboard</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check3">
                                 <label for="check3">Guests</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check4">
                                 <label for="check4">Calenar</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="icheck-primary">
                                 <input type="checkbox" value="" id="check5">
                                 <label for="check5">Report</label>
                           </div>
                        </div>
                     </div>
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
<!-- End of Update Assign Dialog -->


<script type="text/javascript">
   $('#open_roles_permissions').addClass('menu-open');
   $('#assign_roles_permissions').addClass('active');
</script>
@endsection
