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
                     <h4>List of Pending Bookings</h4>
                  </div>
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                           <tr class="text-center">
                              <th>Id</th>
                              <th>Customer Information</th>
                              <th>Room No. and Room Type</th>
                              <th>Arrival Time and Date</th>
                              <th>Departure Time and Date</th>
                              <th>Payment Method(Ref. No.)</th>
                              <th>Amount</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>
                                 <h6>Fullname: Juan Dela Cruz</h6>
                                 <h6>Address: Poblacion, Trinidad, Bohol</h6>
                                 <h6>Contact No.: 09999999999</h6>
                              </td>
                              <td>Room 1 (Ordinary)</td>
                              <td>10:00am | February 11,2024</td>
                              <td>10:00pm | February 12,2024</td>
                              <td>Gcash (1004 181 700551) </td>
                              <td>P2,500</td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-success btn-sm">
                                    Confirm <!-- Once it confirmed, the label of button change into Confirmed and it will become disabled and it will disappear in Pending Bookings Function -->
                                 </button>
                                 <button type="button" class="btn btn-danger btn-sm">
                                    Cancel <!-- Once it cancelled, it will disappear in Pending Bookings Function -->
                                 </button>
                              </td>
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
   $('#open_manage_bookings').addClass('menu-open');
   $('#pending').addClass('activePending');
</script>
@endsection
