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
                                 <input type="text" class="form-control" placeholder="Search...">
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
                     <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Month</th>
                              <th>Income</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>February,2024</td>
                              <td>P15,000</td>
                           </tr>
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
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()
  })
</script>
@endsection
