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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Availability Status</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT room_number FROM rooms where `status`='available' AND `name`='Dulux Double' ORDER BY room_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Dulux Double: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-bed fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Availability Status</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT room_number FROM rooms where `status`='available' AND `name`='Family Room' ORDER BY room_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Family Room: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-bed fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Availability Status</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT room_number FROM rooms where `status`='available' AND `name`='Dulux Thriple' ORDER BY room_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Dulux Thriple: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-bed fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Availability Status</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT room_number FROM rooms where `status`='available' AND `name`='Single Room' ORDER BY room_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Single Room: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-bed fa-2x text-gray-300"></i>
            </div>
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