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
                     <h4>List of Users Account</h4>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_user">
                        <i class="fas fa-plus"></i>
                        Add Staff
                     </button>
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Fullname</th>
                              <th>Username</th>
                              <th>Role</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>JUAN DELA CRUZ</td>
                              <td>juandelacruz</td>
                              <td>Admin</td>
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
<div class="modal fade" id="add_user" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title"> Add New Staff </h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="new_user_name">Fullname :</label>
                     <input type="text" class="form-control" name="new_user_name" id="new_user_name" required>
                  </div>
               </div>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <select class="form-control" name="user_role" id="user_role" required>
                        <option value="" selected disabled>- Select Type -</option>
                        <option value=""> Staff </option>
                     </select>
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
<!-- End of Add Dialog -->

<script type="text/javascript">
   $('#users_account').addClass('active');
</script>
@endsection