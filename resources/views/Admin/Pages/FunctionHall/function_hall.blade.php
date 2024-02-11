@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="small-lg bg-gradient-secondary">
                        <h1 class="text-center p-3">FUNCTION HALL</h1>
                        <div style="display: flex; justify-content: center;">
                           <img class="d-flex justify-content-center" src="{{asset('dist/img/photo2.png')}}"><!-- This should not be in circular form-->
                        </div>
                        <h2 class="text-center p-3">Description</h2>
                        <h3 class="m-2">RATE: </h3>
                     </div>
                     <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-success btn-md mr-2" data-toggle="modal" data-target="#create_function_hall">
                              <i class="fas fa-plus"></i> Add
                        </button>
                        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#update_function_hall">
                              <i class="fas fa-pen"></i> Update
                        </button>
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
<div class="modal fade" id="create_function_hall" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Create Function Hall</h4>
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
                     <label for="description">Description :</label>
                     <input type="text" class="form-control" name="description" id="description">
                     <label for="function_hall_rate">Rate :</label>
                     <input type="number" class="form-control" name="function_hall_rate" id="function_hall_rate">
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


<!-- Update Dialog -->
<div class="modal fade" id="update_function_hall" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Function Hall</h4>
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
                     <label for="u_description">Description :</label>
                     <input type="text" class="form-control" name="u_description" id="u_description">
                     <label for="u_function_hall_rate">Rate :</label>
                     <input type="number" class="form-control" name="u_function_hall_rate" id="u_function_hall_rate">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-success btn-md">
               <i class="fas fa-check"></i>
               Save
            </button>
            <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
               <i class="fas fa-times"></i>
               Cancel
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Dialog -->


<script type="text/javascript">
   $('#function_hall').addClass('active');
</script>
@endsection
