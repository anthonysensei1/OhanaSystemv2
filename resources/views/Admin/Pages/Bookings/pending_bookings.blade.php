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
                           @php
                               $counter = 1;
                           @endphp
                           @foreach ($bookings as $booking)
                           @php
                              $datetime = new DateTime($booking->created_at);
                              $datetime->setTimezone(new DateTimeZone('Asia/Manila'));
                              $formattedDateTime = $datetime->format('Y-m-d h:i:s A');
                              $booking_time = explode(" ", $formattedDateTime);

                              $date = new DateTime($booking->book_start_date);
                              $book_start_date = $date->format('F j, Y');

                              $date = new DateTime($booking->book_end_date);
                              $book_end_date = $date->format('F j, Y');
                           @endphp
                              <tr>
                                 <td>{{ $counter }}</td>
                                 <td>
                                    <h6>Fullname: {{ $booking->first_name . " " . $booking->last_name }}</h6>
                                    <h6>Address: {{ $booking->address }}</h6>
                                    <h6>Contact No.: {{ $booking->c_number }}</h6>
                                 </td>
                                 @if ($booking->book_from == 'room')
                                    <td>{{ $booking->room_name . " " . $booking->room_no . " ( " . $booking->room_type  . " )" }}</td>
                                 @else
                                    <td>{{ $booking->function_hall_description}}</td>
                                 @endif
                                 <td>{{ $booking_time[1] . " | " . $book_start_date }}</td>
                                 <td>{{ $booking_time[1] . " | " . $book_end_date }}</td>
                                 <td>{{ $booking->payment_method < 1 ? 'CASH' : 'GCASH ( ' . $booking->reference_num . ' ) '}} </td>
                                 <td>P{{ number_format($booking->payment) }}</td>
                                 @if ($booking->status == 1)
                                 <td class="text-center">
                                    <form action="{{route('pending_booking_update') }}" class="formPost">
                                       <input class="form-control" type="text" name="id" value="{{ $booking->id }}" readonly hidden>
                                       <button type="submit" class="btn btn-success btn-sm">
                                          Confirm <!-- Once it confirmed, the label of button change into Confirmed and it will become disabled and it will disappear in Pending Bookings Function -->
                                       </button>
                                    </form>
                                    <form action="{{route('pending_booking_destroy') }}" class="formPost">
                                       <input class="form-control" type="text" name="id" value="{{ $booking->id }}" readonly hidden>
                                       <button type="submit" class="btn btn-danger btn-sm">
                                          Cancel <!-- Once it cancelled, it will disappear in Pending Bookings Function -->
                                       </button>
                                    </form>
                                 </td>
                                 @endif
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

<script type="text/javascript">
   $('#open_manage_bookings').addClass('menu-open');
   $('#pending').addClass('activePending');
</script>
@endsection
