@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid div_box">
         <div class="boxes">
            <div class="boxes_text">TOTAL GUESTS</div>
            <div class="counts">( {{ $guest }} )</div>
         </div>
         <div class="boxes">
            <div class="boxes_text">TOTAL USERS</div>
            <div class="counts">( {{ $user }} )</div>
         </div>
         <div class="boxes">
            <div class="boxes_text">PENDING BOOKINGS</div>
            <div class="counts">( {{ $pending }} )</div>
         </div>
         <div class="boxes">
            <div class="boxes_text">CONFIRMED BOOKINGS</div>
            <div class="counts">( {{ $confirm }} )</div>
         </div>
         <div class="boxes">
            <div class="boxes_text">CANCELLED BOOKINGS</div>
            <div class="counts">( {{ $cancel }} )</div>
         </div>
      </div><!-- /.container-fluid -->
      <div class="graph">
         <div class="card">
            <div class="card-header border-0">
               <div class="d-flex justify-content-between">
               <h3 class="card-title">BOOKINGS</h3>
               </div>
            </div>
            <div class="card-body">
               <div class="d-flex">
               <p class="d-flex flex-column">
                  <span class="text-bold text-lg">P {{ number_format($bookings_total) }}</span>
                  <span>Total Bookings Over Time</span>
               </p>
               </div>
               <!-- /.d-flex -->

               <div class="position-relative mb-4">
               <canvas id="sales-chart" height="200"></canvas>
               </div>

               <div class="d-flex flex-row justify-content-end">
               <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This year
               </span>

               <span>
                  <i class="fas fa-square text-gray"></i> Last year
               </span>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>



<script>

   $(function () {
      'use strict'

      const arrLastYear = {!! json_encode($arr_last_year) !!};
      const arrCurrentYear = {!! json_encode($arr_current_year) !!};

      var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
      }

      var mode = 'index'
      var intersect = true

      var $salesChart = $('#sales-chart')
      // eslint-disable-next-line no-unused-vars
      var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
         labels: ['JAN','FEB','MARCH','APRIL','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
         datasets: [
            {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: arrCurrentYear
            },
            {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: arrLastYear
            }
         ]
      },
      options: {
         maintainAspectRatio: false,
         tooltips: {
            mode: mode,
            intersect: intersect
         },
         hover: {
            mode: mode,
            intersect: intersect
         },
         legend: {
            display: false
         }
      }
      })
   })
</script>

@endsection

<style scoped>
   .div_box{
      box-sizing: border-box;
    display: flex;
    flex-wrap: wrap;
   }
   .boxes{
      width: 31.1%;
    height: 200px;
    background: rgb(13,80,37);
    background: linear-gradient(350deg, rgba(13,80,37,1) 0%, rgba(25,194,124,1) 100%);
    /* background: #9cc348; */
    display: flex;
    /* margin: 20px 0px 20px 4px; */
    margin: 18px;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    border-radius: 5px;
    transition: 0.5s;
   }
   .boxes:hover{
      box-shadow: 7px 7px 9px 2px rgb(0 0 0 / 30%);
      cursor: pointer;
      transform: scale(1.1);
   }
   .boxes_text{
      font-size: 30px;
      font-weight: 900;
      color: #fff;
   }

   .counts{
      font-size: 20px;
      font-weight: 900;
      color: #fff;
   }
</style>