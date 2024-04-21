@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <div class="divide_box">
      <div class="card-body">
         <div class="room-item">
            <h2 class="text-center">FUNCTION HALL</h2>
            <div style="display: flex; justify-content: center;">
               <img class="img_fix_size" src="{{ isset($function_halls[0]['function_hall_image']) ? asset('functional_hall_images/' . $function_halls[0]['function_hall_image']) : asset('dist/img/default.png')}}">
            </div>
            <h2 class="text-center p-3">{{ $function_halls[0]['function_hall_description'] ?? '(Description)'}}</h2>
            <h3 class="m-2">RATE: {{ $function_halls[0]['function_hall_rate'] ?? '' }}</h3>
         </div>
         <div class="d-flex justify-content-end">
            @if (count($function_halls) < 1)
               <button class="btn btn-success btn-md mr-2" data-toggle="modal" data-target="#create_function_hall">
                  <i class="fas fa-plus"></i> Add
               </button>
            @endif
            <button class="btn btn-info btn-md" data-toggle="modal" data-target="#update_function_hall">
                  <i class="fas fa-pen"></i> Update
            </button>
         </div>
      </div>
   </div>
   <!-- /.content -->
</div>

<!-- Add Dialog -->
<div class="modal fade" id="create_function_hall" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Create Function Hall</h4>
         </div>
         <form action="{{ route('function_hall_store') }}" class="formPost">
         <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="exampleInputFile">Upload Image :</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input exampleInputFile" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                        <input type="text" class="form-control function_hall_image" name="function_hall_image" id="function_hall_image" readonly hidden>
                     </div>
                     <label for="function_hall_description">Description :</label>
                     <input type="text" class="form-control" name="function_hall_description" id="function_hall_description" required>
                     <label for="function_hall_rate">Rate :</label>
                     <input type="number" class="form-control" name="function_hall_rate" id="function_hall_rate" required>
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


<!-- Update Dialog -->
<div class="modal fade" id="update_function_hall" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Function Hall</h4>
         </div>
         <form action="{{ route('function_hall_update') }}" class="formPost">
         <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="exampleInputFile">Upload Image :</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input exampleInputFile" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     <input type="text" class="form-control function_hall_image" name="u_function_hall_image" id="function_hall_image"  readonly hidden>
                     <input type="text" class="form-control" name="u_id" id="u_id" value="{{ $function_halls[0]['id'] ?? ''}}" readonly hidden>
                     <label for="u_function_hall_description">Description :</label>
                     <input type="text" class="form-control" name="u_function_hall_description" id="u_function_hall_description" value="{{ $function_halls[0]['function_hall_description'] ?? ''}}" required>
                     <label for="u_function_hall_rate">Rate :</label>
                     <input type="number" class="form-control" name="u_function_hall_rate" id="u_function_hall_rate" value="{{ $function_halls[0]['function_hall_rate'] ?? ''}}" required>
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
<!-- End of Update Dialog -->


<script type="text/javascript">
   $('#function_hall').addClass('active');

   $(".cancelBtn").on('click', function() {
      $("#create_function_hall input").val('');
      $("#create_function_hall select").val('');
      $("#create_function_hall file").val('');
      $("#create_function_hall form")[0].reset();

      $("#update_function_hall input").val('');
      $("#update_function_hall select").val('');
      $("#update_function_hall file").val('');
      $("#update_function_hall form")[0].reset();
   });

   $('.exampleInputFile').on('change', function() {
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
               url: "{{ route('function_hall_image') }}",
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
                           $('.function_hall_image').val(data['message']);
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


<style scoped>
   .divide_box{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      flex-direction: row;
      align-content: center;
   }

   .room-item{
      margin: 5px;
      background: linear-gradient(45deg, white, whitesmoke,grey);
      border: 2px solid #000;
      backdrop-filter: blur(10px);
      border-radius: 5px;

   }

   .img_fix_size{
      width: 900px;
      height: 600px;
      padding: 20px;
      display: block;
      object-fit: cover;
      border: 2px solid #000;
      background: linear-gradient(-90deg, white, whitesmoke,grey);
   }
</style>
@endsection
