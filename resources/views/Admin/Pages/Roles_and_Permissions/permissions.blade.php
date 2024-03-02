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
                     <h4>List of Permissions</h4>
                     {{-- <button type="button" class="btn btn-success btn-md" style="margin-left: auto;" data-toggle="modal" data-target="#add_permission">
                        <i class="fas fa-plus"></i>
                        Add Permission
                     </button> --}}
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Permissions</th>
                              <th>Sub permissions</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($permissions as $permission)
                              <tr>
                                 <td>{{ $permission['permission'] }}</td>
                                 <td>{{ $permission['sub_permission'] }}</td>
                                 <td class="text-center">
                                    @if (empty($permission['sub_permission']))
                                       <button type="button" class="btn btn-info btn-md" data-id="{{ $permission['id'] }}" data-toggle="modal" data-target="#update_permission" onclick="edit('{{ $permission['id'] }}', '{{ $permission['permission'] }}', '{{ $permission['sub_permission'] }}')">
                                          <i class="fas fa-pen"></i>
                                          Update
                                       </button>
                                    @else
                                       <button type="button" class="btn btn-info btn-md" data-id="{{ $permission['id'] }}" data-toggle="modal" data-target="#update_sub_permission" onclick="edit('{{ $permission['id'] }}', '{{ $permission['permission'] }}', '{{ $permission['sub_permission'] }}')">
                                          <i class="fas fa-pen"></i>
                                          Update
                                       </button>
                                    @endif
                                 </td>
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

<!-- Update Dialog -->
<div class="modal fade" id="update_permission" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Permission</h4>
         </div>
         <form action="{{ route('permissions_update') }}" class="formPost">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <input type="text" class="form-control u_id" name="u_id" id="u_id" readonly hidden>
                     <label for="u_permission">Permission Name :</label>
                     <input type="text" class="form-control u_permission" name="u_permission" id="u_permission">
                     <input type="text" class="form-control u_sub_permission" name="u_sub_permission[]" id="u_sub_permission" readonly hidden>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Submit
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
<!-- End of Add Dialog -->

<!-- Update Sub Dialog -->
<div class="modal fade" id="update_sub_permission" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-info">
            <h4 class="modal-title">Update Permission</h4>
         </div>
         <form action="{{ route('permissions_update') }}" class="formPost">
            <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <input type="text" class="form-control u_id" name="u_id" id="u_id" readonly hidden>
                        <label for="u_permission">Permission Name :</label>
                        <input type="text" class="form-control u_permission" name="u_permission" id="u_permission">
                     </div>
                     <div class="col-lg-12" id="div_u_sub_permission">
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  Save
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
<!-- End of Update Dialog -->

<script type="text/javascript">
   $('#open_roles_permissions').addClass('menu-open');
   $('#permissions').addClass('active');

   function edit(id, permission, sub_permission) {
      $('.u_id').val(id);
      if (sub_permission != "") {
         $('.u_permission').val(permission);
         // $('#u_sub_permission').val(sub_permission);
         const arr_sub_permission = sub_permission.split(",");
         let i = 0;
         let u_sub_permission = '<label class="mt-2" for="u_sub_permission">Sub Permission Name :</label>';
         while (i < arr_sub_permission.length) {
            u_sub_permission += '<input type="text" class="form-control mt-2" name="u_sub_permission[]" id="u_sub_permission" value="' + arr_sub_permission[i] + '">';
            i++;
         }
         
         $('#div_u_sub_permission').html(u_sub_permission);

      } else {
         $('.u_permission').val(permission);
      }
   }

</script>
@endsection
