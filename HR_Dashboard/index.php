<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="../attendance/index.php"  target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-calendar fa-sm text-white-50"></i> Attendance UI</a>
    
  </div>
</div>


<div class="container-fluid">
  <div class="row">

    <!-- tot motorist -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Employees</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM users";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Total: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- tot motorist -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Front Office Employees</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM users where `post`='FO'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Total: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- tot motorist -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bar management Employees</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM users where `post`='BM'";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Total: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- tot motorist -->
     <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Executive Employees</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM users where `post`='Admin' ";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Total: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>

  <?php
              require '../config.php';

              $today_date = date('Y/m/d');

              $query4 = "SELECT `user_id` FROM attendance where `status`='late' AND date='$today_date' ORDER BY `user_id`";
              $query_run = mysqli_query($conn, $query4);
              $late_att = mysqli_num_rows($query_run);

              $query5 = "SELECT `user_id` FROM attendance where `status`='present' AND date='$today_date' ORDER BY `user_id`";
              $query_run = mysqli_query($conn, $query5);
              $ontime_att = mysqli_num_rows($query_run);
  ?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'fines per Day'],
          ['Late Attended',     <?php echo $late_att; ?>],
          ['On Time Attended',      <?php echo $ontime_att; ?>],
          
        ]);

        var options = {
          title: 'Daily Atendance Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <div class="row">
        <div class="col-xl-6 col-md-1 mb-1">
          <div class="card border-left-primary shadow h-100 py-1">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div id="donutchart" style="width: 600px; height: 400px;"></div>
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>