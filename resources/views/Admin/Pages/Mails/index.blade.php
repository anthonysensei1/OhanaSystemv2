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
                     <h4>Email logs</h4>
                
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>Email</th>
                              <th>OTP</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th>Date created</th>
                              <th>Date updated</th>
                           </tr>
                        </thead>
                        <tbody>
                            {{ $i = 1 }}
                           @foreach ($emails as $email)
                              <tr>
                                 <td>{{ $i++ }}</td>
                                 <td>{{ $email->email }}</td>
                                 <td>{{ $email->otp }}</td>
                                 <td>{{ $email->details }}</td>
                                 <?php $modifiedString = substr($email->status, 3); ?>
                                 <td><?= $modifiedString ?></td>
                                 <td>{{ $email->created_at }}</td>
                                 <td>{{ $email->updated_at }}</td>
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


<script type="text/javascript">
   $('#mails').addClass('active');
</script>
@endsection