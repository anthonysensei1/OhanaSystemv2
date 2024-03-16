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
                           @foreach ($users as $user)
                              <tr>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->username }}</td>
                                 <td>{{ $user->role_name }}</td>
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

<!-- Add Dialog -->
<div class="modal fade" id="add_user" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title"> Add New Staff </h4>
         </div>
         <form action="{{ route('user_account_store') }}" class="formPost">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <label for="fullname">Fullname :</label>
                     <input type="text" class="form-control" name="fullname" id="fullname" required>
                  </div>
                  <div class="col-lg-12">
                     <label for="username">Username :</label>
                     <input type="text" class="form-control" name="username" id="username" required>
                  </div>
                  <div class="col-lg-12">
                     <label for="password">Password :</label>
                     <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="col-lg-12">
                     <label for="cpassword">Confirm password :</label>
                     <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                  </div>
               </div>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <select class="form-control" name="user_role" id="user_role" required>
                        <option value="" selected disabled>- Select Type -</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role['id'] }}">{{ $role['role'] }}</option>
                        @endforeach
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