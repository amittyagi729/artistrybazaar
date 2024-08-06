@extends('admin.layouts.master')
@section('title') Dashboard @endsection
@section('content')
<style>
    .card {
      background-color: #F4F2FF; /* White background */
      border: none; /* Remove default border */
      border-radius: 10px;
      margin-bottom: 10px;/* Larger rounded corners */
    }
    .card-head {
    font-size: 25px;
}
  </style>
      <div class="row mt-4">
        <div class="grey-box col-md-6">
            <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <div class="dashboard-box ">
                        <div class="dashboard-box-img position-relative">
                            <img class="z-10 position-relative" alt="dashboard-icon" src="{{asset('assets/images/1ea833ec.svg')}}">
                        </div>
                        <div class="dashboard-box-numbers">
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">25</span>
                                <span>Last 30 days</span>
                            </div>
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">1</span>
                                <span>Last 24 hours</span>
                            </div>
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">803</span>
                                <span>Total users</span>
                            </div>
                        </div>
                    </div>
                    {{-- @php
                    $userindicator = userProgressIndicator();
                    $firstCharacter = substr($userindicator, 0, 1);
                    @endphp
                    <p class="card-text card-head">{{ totalUsers() }}</p>
                    @if ($firstCharacter === '+')
                      {{-- Handle plus indicator -}}-
                      <p class="card-text text-success">{{ $userindicator }}</p>
                  @elseif ($firstCharacter === '-')
                      {{-- Handle minus userindicator
                      <p class="card-text text-danger">{{ $userindicator }}</p>
                  @else
                  <p class="card-text text-success">{{ $userindicator }}</p>
                  @endif --}}
                  </div>
                </div>
              </div>
        </div>
        <div class="grey-box col-md-6">
            <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <div class="dashboard-box bg-2">
                        <div class="dashboard-box-img position-relative">
                            <img class="z-10 position-relative" alt="dashboard-icon" src="{{asset('assets/images/1ea833ec.svg')}}">
                        </div>
                        <div class="dashboard-box-numbers">
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">25</span>
                                <span>Last 30 days</span>
                            </div>
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">1</span>
                                <span>Last 24 hours</span>
                            </div>
                            <div class="dashboard-numbs">
                                <span class="dashboard-count">803</span>
                                <span>Total users</span>
                            </div>
                        </div>
                    </div>
                    {{-- @php
                    $userindicator = userProgressIndicator();
                    $firstCharacter = substr($userindicator, 0, 1);
                    @endphp
                    <p class="card-text card-head">{{ totalUsers() }}</p>
                    @if ($firstCharacter === '+')
                      {{-- Handle plus indicator -}}-
                      <p class="card-text text-success">{{ $userindicator }}</p>
                  @elseif ($firstCharacter === '-')
                      {{-- Handle minus userindicator
                      <p class="card-text text-danger">{{ $userindicator }}</p>
                  @else
                  <p class="card-text text-success">{{ $userindicator }}</p>
                  @endif --}}
                  </div>
                </div>
              </div>
        </div>
        {{-- <div class="grey-box col-md-6">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Orders</h5>
                  <p class="card-text card-head">{{ totalOrders() }}</p>
                  @php
                        $indicator = progressIndicator();
                        $firstCharacter = substr($indicator, 0, 1);
                    @endphp

                    @if ($firstCharacter === '+')
                        {{-- Handle plus indicator
                        <p class="card-text text-success">{{ $indicator }}</p>
                    @elseif ($firstCharacter === '-')
                        {{-- Handle minus indicator
                        <p class="card-text text-danger">{{ $indicator }}</p>
                    @else
                    <p class="card-text text-success">{{ $indicator }}</p>
                    @endif
                </div>
              </div>
            </div>
        </div> --}}


        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Revenue</h5>
              <p class="card-text card-head"> {{ config('constants.currency') }} {{ totalRevenue() }}</p>
              <p class="card-text text-success">+ $100</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Shipping</h5>
              <p class="card-text card-head">{{ totalShipping() }}</p>
              <p class="card-text text-success">+ $100</p>
            </div>
          </div>
        </div>
      </div>
{{-- <div class="profile-content">
   <div class="row">
      <div class="col-md-12">
         <!-- BEGIN PORTLET -->
         <div class="portlet light bordered">
            <div class="row">

               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        Total Number of Users
                     </div>
                     <div class="card-body">
                        <div class="row mb-3">
                           <div class="col-md-6">
                              <label for="yearSelect" class="form-label">Select Year:</label>
                              <select class="form-control" id="yearSelect" onchange="updateChart()">
                                 <option value="2023">{{ oldestYear() }}</option>
                                 <!-- Add more options for older years -->
                              </select>
                           </div>
                        </div>
                        <canvas id="userChart"></canvas>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        Total Number of Orders
                     </div>
                     <div class="card-body">
                        <div class="row mb-3">
                           <div class="col-md-6">
                              <label for="yearSelect" class="form-label">Select Year:</label>
                              <select class="form-control" id="yearSelect" onchange="updateChart()">
                                 <option value="{{ oldestYear() }}">{{ oldestYear() }}</option>
                                 <!-- Add more options for older years -->
                              </select>
                           </div>
                        </div>
                        <canvas id="ordersChart"></canvas>
                     </div>
                  </div>
               </div>


            </div>
         </div>
         <!-- END PORTLET -->
      </div>

   </div>
        <div class="profile-content">
           <div class="row">
              <div class="col-md-12">
                 <!-- BEGIN PORTLET -->
                 <div class="portlet light bordered">
                    <div class="row">

                       <div class="col-md-6">
                          <div class="card">
                             <div class="card-header">
                                Total Revenue
                             </div>
                             <div class="card-body">
                                <div class="row mb-3">
                                   <div class="col-md-6">
                                      <label for="yearSelect" class="form-label">Select Year:</label>
                                      <select class="form-control" id="yearSelect" onchange="updateChart()">
                                         <option value="2023">{{ oldestYear() }}</option>
                                         <!-- Add more options for older years -->
                                      </select>
                                   </div>
                                </div>
                                <canvas id="revenueChart"></canvas>
                             </div>
                          </div>
                       </div>

                       <div class="col-md-6">
                          <div class="card">
                             <div class="card-header">
                                Total Shipping
                             </div>
                             <div class="card-body">
                                <div class="row mb-3">
                                   <div class="col-md-6">
                                      <label for="yearSelect" class="form-label">Select Year:</label>
                                      <select class="form-control" id="yearSelect" onchange="updateChart()">
                                         <option value="{{ oldestYear() }}">{{ oldestYear() }}</option>
                                         <!-- Add more options for older years -->
                                      </select>
                                   </div>
                                </div>
                                <canvas id="shippingChart"></canvas>
                             </div>
                          </div>
                       </div>


                    </div>
                 </div>

            </div>
            <!-- END PORTLET -->
         </div>
      </div>
   </div>
</div> --}}

@endsection
@section('footer_scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   $(document).ready(function() {
   // Sample data (replace with actual data)

   const year = 2023; // Replace with the desired year
   const url = `getMonthlyUsers/${year}`;

$.ajax({
    url: url,
    method: 'GET',
    dataType: 'json',
    success: function (data) {
        // Get the canvas element
   var ctx = document.getElementById('userChart').getContext('2d');

 // Create the bar chart
 var userChart = new Chart(ctx, {
   type: 'bar',
   data: {
     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','July','August','September', 'October', "Nov", "Dec"], // Months or categories
     datasets: [{
       label: 'Total Users',
       data: data,
       backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
       borderColor: 'rgba(75, 192, 192, 1)',
       borderWidth: 1
     }]
   },
   options: {
     responsive: true,
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});

   const orderurl = `getMonthlyOrders/${year}`;

$.ajax({
    url: orderurl,
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        // Get the canvas element
   var cty = document.getElementById('ordersChart').getContext('2d');

 // Create the bar chart
 var userChart = new Chart(cty, {
   type: 'bar',
   data: {
     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','July','August','September', 'October', "Nov", "Dec"], // Months or categories
     datasets: [{
       label: 'Total Orders',
       data: response,
       backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
       borderColor: 'rgba(75, 192, 192, 1)',
       borderWidth: 1
     }]
   },
   options: {
     responsive: true,
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});

const urlRevenue = `getMonthlyRevenue/${year}`;

$.ajax({
    url: urlRevenue,
    method: 'GET',
    dataType: 'json',
    success: function (data) {
        // Get the canvas element
   var ctx = document.getElementById('revenueChart').getContext('2d');

 // Create the bar chart
 var userChart = new Chart(ctx, {
   type: 'bar',
   data: {
     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','July','August','September', 'October', "Nov", "Dec"], // Months or categories
     datasets: [{
       label: 'Total Revenue',
       data: data,
       backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
       borderColor: 'rgba(75, 192, 192, 1)',
       borderWidth: 1
     }]
   },
   options: {
     responsive: true,
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});

const urlShipping = `getMonthlyShipping/${year}`;

$.ajax({
    url: urlShipping,
    method: 'GET',
    dataType: 'json',
    success: function (data) {
        // Get the canvas element
   var ctx = document.getElementById('shippingChart').getContext('2d');

 // Create the bar chart
 var userChart = new Chart(ctx, {
   type: 'bar',
   data: {
     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','July','August','September', 'October', "Nov", "Dec"], // Months or categories
     datasets: [{
       label: 'Total Shipping  Amount',
       data: data,
       backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
       borderColor: 'rgba(75, 192, 192, 1)',
       borderWidth: 1
     }]
   },
   options: {
     responsive: true,
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});


});
 </script>
 @endsection
