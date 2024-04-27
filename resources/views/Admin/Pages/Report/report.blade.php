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
                                 <td class="income_amount">P {{ number_format($booking->total) }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <label class="mt-2" for="total_income">Total Income: <span id="totalIncome"></span> </label>
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
         var totalIncome = 0;
         var tableRows = $('#bookingTable tbody tr');

         tableRows.hide().filter(function() {
               var rowDate = moment($(this).find('td:first').text(), 'MMMM, YYYY');
               var rowMonth = rowDate.month();
               var rowYear = rowDate.year();

               return (rowYear > startYear || (rowYear === startYear && rowMonth >= startMonth)) &&
                  (rowYear < endYear || (rowYear === endYear && rowMonth <= endMonth));
         }).each(function() {
            var incomeValue = $(this).find('td.income_amount').text();
            incomeValue = parseFloat(incomeValue.replace('P', '').replace(/,/g, ''));
            totalIncome += isNaN(incomeValue) ? 0 : incomeValue;
            $(this).show();
         });

         $('#totalIncome').text('P ' + totalIncome.toLocaleString());
      }
   });


   document.getElementById('searchInput').addEventListener('input', function() {
      var input = this.value.trim().toLowerCase();
      var table = document.getElementById('bookingTable');
      var rows = table.getElementsByTagName('tr');
      var totalIncome = 0;

      for (var i = 1; i < rows.length; i++) {
         var cells = rows[i].getElementsByTagName('td');

         if (cells.length > 0) {
               var dateCell = cells[0]; 
               var dateParts = dateCell.innerText.split(', ');
               var month = dateParts[0];
               var year = dateParts[1];
               var displayRow = (month.toLowerCase().indexOf(input) > -1 || year.toLowerCase().indexOf(input) > -1);

               rows[i].style.display = displayRow ? '' : 'none';

               
               if (displayRow) {
                  var incomeValue = cells[1].innerText;
                  incomeValue = parseFloat(incomeValue.replace('P', '').replace(/,/g, ''));
                  totalIncome += isNaN(incomeValue) ? 0 : incomeValue;
               }
         }
      }

      
      document.getElementById('totalIncome').innerText = 'P' + totalIncome.toLocaleString();
   });


    $(document).ready(function(){
      var totalIncome = 0;

      $('.income_amount').each(function() {
         var incomeValue = $(this).text();
         incomeValue = parseFloat(incomeValue.replace('P', '').replace(/,/g, ''));
         totalIncome += incomeValue;
      });

      $('#totalIncome').text('P' + totalIncome.toLocaleString());
   });


</script>
@endsection
