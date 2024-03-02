@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row text-end">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h4 class="mb-0">Room Types</h4>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_room_type">
                        <i class="fas fa-plus"></i> Add Room Type
                     </button>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Room Type</th>
                                <th>Rate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($room_types as $room_type)
                              <tr>
                                 <td>{{ $room_type['room_type'] }}</td>
                                 <td>{{ $room_type['room_rate'] }}</td>
                                 <td class="text-center">
                                    <button class="btn btn-info btn-md" data-toggle="modal" data-id="{{ $room_type['id'] }}" data-target="#edit_room_type" onclick="edit('{{ $room_type['id'] }}', '{{ $room_type['room_type'] }}', '{{ $room_type['room_rate'] }}')">
                                          <i class="fas fa-pen"></i>
                                          edit
                                    </button>
                                    <button class="btn btn-danger btn-md" data-toggle="modal" data-id="{{ $room_type['id'] }}" data-target="#delete_room_type" onclick="edit('{{ $room_type['id'] }}', '{{ $room_type['room_type'] }}', '{{ $room_type['room_rate'] }}')">
                                          <i class="fas fa-trash"></i>
                                          delete
                                    </button>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                    </table>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

<!-- Add Dialog -->
<div class="modal fade" id="add_room_type" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Add Room Type</h4>
         </div>
         <form action="{{ route('room_type_store') }}" class="formPost">
            <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <label for="room_type">Room Type :</label>
                        <input type="text" class="form-control" name="room_type" id="room_type" required>
                        <label for="room_rate">Rate :</label>
                        <input type="number" class="form-control" name="room_rate" id="room_rate" required>
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

<!-- Edit Dialog -->
<div class="modal fade" id="edit_room_type" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Room Type</h4>
         </div>
         <form action="{{ route('room_type_update') }}" class="formPost">
            <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <input type="text" class="form-control u_id" name="u_id" id="u_id" readonly hidden>
                        <label for="u_room_type">Room Type :</label>
                        <input type="text" class="form-control" name="u_room_type" id="u_room_type" required>
                        <label for="u_room_rate">Rate :</label>
                        <input type="number" class="form-control" name="u_room_rate" id="u_room_rate" required>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Save
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
<!-- End of Edit Dialog -->

<!-- Delete Dialog -->
<div class="modal fade" id="delete_room_type" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-danger">
            <h4 class="modal-title">Confirmation</h4>
         </div>
         <form action="{{ route('room_type_destroy') }}" class="formPost">
            <div class="modal-body">
               <input type="text" class="form-control u_id" name="d_id" id="d_id" readonly hidden>
               <h4>Are you certain you wish to proceed with the deletion?</h4>
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
   $('#open_manage_rooms').addClass('menu-open');
   $('#room_type').addClass('active');

   $(".cancelBtn").click(function(){
      $("#add_room_type input").val('');
      $("#edit_room_type input").val('');
   });

   function edit(id, room_type, room_rate) {
      $('.u_id').val(id);
      $('#u_room_type').val(room_type);
      $('#u_room_rate').val(room_rate);
   }
</script>

@endsection
