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
                     <h4 class="mb-0">LIST OF ROOMS</h4>
                     <select class="form-control text-center ml-2" style="max-width: 300px">
                        <option value="Select Type" selected disabled>- Select Room Type -</option>
                        <option value="ordinary">Ordinary</option>
                        <option value="private">Private</option>
                     </select>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_room">
                        <i class="fas fa-plus"></i> Add Room
                     </button>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-3">
                           <div class="small-box bg-info">
                              <h5 class="text-center p-3">ROOM 1</h5>
                              <div style="display: flex; justify-content: center;">
                                 <img class="d-flex justify-content-center" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
                              </div>
                              <h5 class="text-center p-3">Description</h5>
                              <label class="m-2">RATE: </label>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="small-box bg-info">
                              <h5 class="text-center p-3">ROOM 2</h5>
                              <div style="display: flex; justify-content: center;">
                                 <img class="d-flex justify-content-center" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
                              </div>
                              <h5 class="text-center p-3">Description</h5>
                              <label class="m-2">RATE: </label>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="small-box bg-info">
                              <h5 class="text-center p-3">ROOM 3</h5>
                              <div style="display: flex; justify-content: center;">
                                 <img class="d-flex justify-content-center" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
                              </div>
                              <h5 class="text-center p-3">Description</h5>
                              <label class="m-2">RATE: </label>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="small-box bg-info">
                              <h5 class="text-center p-3">ROOM 4</h5>
                              <div style="display: flex; justify-content: center;">
                                 <img class="d-flex justify-content-center" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
                              </div>
                              <h5 class="text-center p-3">Description</h5>
                              <label class="m-2">RATE: </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

<!-- Add Dialog -->
<div class="modal fade" id="add_room" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Add New Room</h4>
         </div>
         <div class="modal-body">
            <form action="">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="exampleInputFile">Upload Image :</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     <label for="room_no">Room No. :</label>
                     <input type="text" class="form-control" name="room_no" id="room_no">
                     <label for="room_name">Room Name :</label>
                     <input type="text" class="form-control" name="room_name" id="room_name">
                     <label for="room_no">Room Type :</label>
                     <select class="form-control">
                        <option value="Select Type" selected disabled>- Select Type -</option>
                        <option value="ordinary">Ordinary</option>
                        <option value="private">Private</option>
                     </select>
                     <label for="room_name">Rate :</label>
                     <input type="text" class="form-control" name="rate" id="rate" disabled>
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

<script type="text/javascript">
   $('#open_manage_rooms').addClass('menu-open');
   $('#rooms').addClass('active');
</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

@endsection
