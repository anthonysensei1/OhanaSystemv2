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
                     <h4>List of Guests</h4>
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Id</th>
                              <th>Fullname</th>
                              <th>Address</th>
                              <th>Contact No.</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                               $counter = 1;
                           @endphp
                           @foreach($users as $user)
                              <tr>
                                 <td>{{ $counter }}</td>
                                 <td>{{ $user->first_name . " " . $user->last_name }}</td>
                                 <td>{{ $user->address }}</td>
                                 <td>{{ $user->c_number }}</td>
                                 <td class="text-center">
                                    @if ($user->status == 1)
                                       <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete_guest" onclick="edit('{{ $user->user_id }}', '{{ $user->status }}')">
                                          <i class="icon fas fa-ban"></i>
                                          disable
                                       </button>
                                    @else
                                       <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#delete_guest" onclick="edit('{{ $user->user_id }}', '{{ $user->status }}')">
                                          <i class="icon fas fa-ban"></i>
                                          enable
                                       </button>
                                    @endif
                                 </td>
                              </tr>
                              @php
                                   $counter++;
                              @endphp
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

<!-- Delete Dialog -->
<div class="modal fade" id="delete_guest" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-danger">
            <h4 class="modal-title">Confirmation</h4>
         </div>
         <form action="{{ route('guests_destroy') }}" class="formPost">
            <div class="modal-body">
               <h4>Are you certain you wish to proceed with the deletion?</h4>
                  <input class="form-control" type="text" name="id" id="user_id" readonly hidden>
                  <input class="form-control" type="text" name="status" id="user_status" readonly hidden>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Yes
               </button>
               <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  Cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Delete Dialog -->


<script type="text/javascript">
    $('#guests').addClass('active');

   function edit(id, status) {
      $('#user_id').val(id);
      $('#user_status').val(status);
   }
</script>
@endsection
