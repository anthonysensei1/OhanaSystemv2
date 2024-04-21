@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="small-box bg-gradient-secondary text-center mx-auto p-3">
                  <h2 class="mb-4">INCOME REPORT</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <div class="form-group row">
                        <label for="reservation" class="col-form-label">Date range:</label>
                        <div class="col-md-2">
                           <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       <i class="far fa-calendar-alt"></i>
                                    </span>
                                 </div>
                                 <input type="text" class="form-control" id="reservation">
                           </div>
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="input-group justify-content-end">
                                 <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                                 <div class="input-group-append">
                                    <span class="input-group-text">
                                       <i class="fas fa-search"></i>
                                    </span>
                                 </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="card-body">
                     <table class="table table-bordered table-striped" id="bookingTable">
                        <thead>
                           <tr>
                              <th>Month</th>
                              <th>Income</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($bookings as $booking)
                              @php
                                  $date = new DateTime($booking->book_end_date);
                              @endphp
                              <tr>
                                 <td>{{ $date->format('F, Y')}}</td>
                                 <td>P {{ number_format($booking->total) }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <label class="mt-2" for="total_income">Total Income: </label>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section><!-- /.content -->
</div>

<script type="text/javascript">
   $('#report').addClass('active');
</script>

<script>
   $(document).ready(function() {
      $('#reservation').daterangepicker({
         startDate: moment().startOf('month'),
         endDate: moment().endOf('month'),
         locale: {
               format: 'MMMM, YYYY'
         }
      }, function(start, end, label) {
         var startMonth = start.month();
         var startYear = start.year();
         var endMonth = end.month();
         var endYear = end.year();

         filterTable(startMonth, startYear, endMonth, endYear);
      });

      function filterTable(startMonth, startYear, endMonth, endYear) {
         var tableRows = $('#bookingTable tbody tr');
         tableRows.hide().filter(function() {
               var rowDate = moment($(this).find('td:first').text(), 'MMMM, YYYY');
               var rowMonth = rowDate.month();
               var rowYear = rowDate.year();

               return (rowYear > startYear || (rowYear === startYear && rowMonth >= startMonth)) &&
                  (rowYear < endYear || (rowYear === endYear && rowMonth <= endMonth));
         }).show();
      }
   });

  document.getElementById('searchInput').addEventListener('input', function() {
        var input = this.value.trim().toLowerCase();
        var table = document.getElementById('bookingTable');
        var rows = table.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            
            if (cells.length > 0) {
                var dateCell = cells[0]; 
                var dateParts = dateCell.innerText.split(', ');
                var month = dateParts[0];
                var year = dateParts[1];

                if ((month.toLowerCase().indexOf(input) > -1 || year.toLowerCase().indexOf(input) > -1)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });
</script>
@endsection
