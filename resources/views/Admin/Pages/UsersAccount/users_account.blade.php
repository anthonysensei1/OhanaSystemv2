@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>List of Users Account</h4>
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

<script type="text/javascript">
   $('#users_account').addClass('active');
</script>
@endsection