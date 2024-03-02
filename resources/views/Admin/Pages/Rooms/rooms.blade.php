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
                     <select class="form-control text-center ml-2" style="max-width: 300px" id="roomTypeSelect">
                        <option value="" selected disabled>- Select Room Type -</option>
                        <option value="all">Show all rooms</option>
                        @foreach ($room_types as $room_type)
                           <option class="_room_type_values" value="{{ $room_type['id'] }}">{{ $room_type['room_type'] }}</option>
                        @endforeach
                     </select>
                     <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_room">
                        <i class="fas fa-plus"></i> Add Room
                     </button>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        @foreach ($rooms as $room)
                           <div class="room-item col-lg-3" data-roomtype="{{ $room['room_type_id'] }}">
                              <div class="small-box bg-info">
                                 <h5 class="text-center p-3">ROOM {{ $room['room_no'] }}</h5>
                                 <div style="display: flex; justify-content: center;">
                                    <img class="d-flex justify-content-center w-100 h-100" src="{{ asset('images/' . $room['room_image']) }}" >
                                 </div>
                                 <h5 class="text-center p-3">{{ $room['room_name'] }}</h5>
                                 <label class="m-2">RATE: {{ $room['room_rate'] }}</label>
                              </div>
                           </div>
                        @endforeach
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
         <form action="{{ route('room_store') }}" class="formPost">
            <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label for="exampleInputFile">Upload Image :</label>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="exampleInputFile" required>
                                 <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                 <span class="input-group-text">Upload</span>
                              </div>
                           </div>
                           <input type="text" class="form-control" name="room_image" id="room_image" readonly hidden>
                        </div>
                        <label for="room_no">Room No. :</label>
                        <input type="number" class="form-control" name="room_no" id="room_no" required>
                        <label for="room_name">Room Name :</label>
                        <input type="text" class="form-control" name="room_name" id="room_name" required>
                        <label for="room_no">Room Type :</label>
                        <select class="form-control" name="_room_type" id="_room_type" required>
                           <option value="" selected disabled>- Select Type -</option>
                           @foreach ($room_types as $room_type)
                              <option class="_room_type_values" value="{{ $room_type['id'] }}" price="{{ $room_type['room_rate'] }}">{{ $room_type['room_type'] }}</option>
                           @endforeach
                        </select>
                        <label for="room_rate">Rate :</label>
                        <input type="text" class="form-control" name="room_rate" id="room_rate" disabled>
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
   $('#open_manage_rooms').addClass('menu-open');
   $('#rooms').addClass('active');

   $('#_room_type').change(() => {
      const selectedOption = $('#_room_type').find(':selected');
      $('#room_rate').val(selectedOption.attr('price'))
   });

   $(".cancelBtn").on('click', function() {
      $("#add_room input").val('');
      $("#add_room select").val('');
      $("#add_room file").val('');
      $("#add_room form")[0].reset();
   });
   
   $('#roomTypeSelect').change(function () {
      const selectedRoomType = $(this).val();

      if (selectedRoomType === 'all') {
            $('.room-item').show();
      } else {
            $('.room-item').hide();
            $('.room-item[data-roomtype="' + selectedRoomType + '"]').show();
      }
   });

   $('#exampleInputFile').on('change', function() {
         const file = $(this)[0].files[0];
         const formData = new FormData();

         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500
         });
         
         if (file.type.match('image.*')) {

            formData.append('image', file);

            $.ajax({
               url: "{{ route('room_image') }}",
               type: 'POST',
               data: formData,
               processData: false,
               contentType: false,
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(data) {

                  switch(data['response']) {
                     case 1:
                           $('#room_image').val(data['message']);
                        break;
                     default:
                           Toast.fire({
                                 icon: 'error',
                                 title: '<p class="text-center pt-2">' +data['message']+ '</p>'
                           });
                        break;
                  }

               }
            });
         } else {
               Toast.fire({
                  icon: 'error',
                  title: '<p class="text-center pt-2">Please select an image file.</p>'
               });
               $(this).val('');
         }
    });

</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

@endsection
