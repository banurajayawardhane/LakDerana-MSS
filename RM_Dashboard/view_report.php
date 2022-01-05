<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reservation Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
<div class="row">

<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total adults checked in</div>
              <?php
             # fetch data
             $sql = "SELECT adult FROM reservation";
             if($result1 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result1) > 0){
             $row = mysqli_fetch_array($result1);
              $amount = $row['adult'];
            }
            else
            {
              $amount=0;
            }
             }
            
             ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Adults: <?php echo $amount; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total children checked in</div>
              <?php
             # fetch data
             $sql = "SELECT child FROM reservation";
             if($result1 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result1) > 0){
             $row = mysqli_fetch_array($result1);
              $amount = $row['child'];
            }
            else
            {
              $amount=0;
            }
             }
            
             ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Children: <?php echo $amount; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
        <form action="" method="POST" class="login-email">
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <lable>Filter by Reservation ID</lable>
                  <input type="text" name="id" class="form-control" id="name" placeholder="Enter ID" value="">
              </div>

              <div class="col-md-3">
              <lable>Filter by status</lable>
                <select class="form-control" name="status">
                    <option value=''></option>
                    <option value='checked in'>Checked in</option>
                    <option value='checked out'>Checked out</option>
                </select>
              </div>

              <div class="col-md-3">
                  <lable>Filter by date</lable>
                  <input type="date" name="date" class="form-control" id="date" placeholder="Select date" value="">
              </div>

              <div class="col-md-2">
              <lable>Action</lable>
                  <button name="submit" class="btn btn-primary">Filter Table Data</button>
              </div>
              
            </div>
            
              
            
          </div>
          </form>

        <?php
        if (isset($_POST['submit']))
        {

          $fid = $_POST['id'];
          $fstatus = $_POST['status'];
          $fdate = $_POST['date'];
          if($fid !="" && $fstatus !="" && $fdate !="")
          {
            $query = "SELECT * FROM reservation where `status`='$fstatus' AND `cuss_id`='$fid' AND `check_in`='$fdate' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fid !="" && $fstatus !="")
          {
            $query = "SELECT * FROM reservation where `status`='$fstatus' AND `cuss_id`='$fid' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fdate !="" && $fstatus !="")
          {
            $query = "SELECT * FROM reservation where `status`='$fstatus' AND `check_in`='$fdate' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fid != "")
          {
            $query = "SELECT * FROM reservation where `cuss_id`='$fid' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fstatus !="")
          {
            $query = "SELECT * FROM reservation where `status`='$fstatus' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fdate !="")
          {
            $query = "SELECT * FROM reservation where `check_in`='$fdate' order by `check_in` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          else
          {
            $query = "SELECT * FROM reservation ";
            $query_run = mysqli_query($conn, $query);
          }
        } 
        else
        {
          $query = "SELECT * FROM reservation";
          $query_run = mysqli_query($conn, $query);
        }
              
        ?>
        <br>
        <div  id="table">
        <table class="table">
          <thead>
            <th scope="col">Reservation ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Check in date</th>
            <th scope="col">Status</th>
            <th scope="col">Rooms</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Number of adults</th>
            <th scope="col">Number of children</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
                
                
       
        ?>
        
          <tbody>
            <td><?php echo $row['id'];?></td>
            <td><?php  echo $row['cuss_id'];?></td>
            <td><?php  echo $row['check_in'];?></td>
            <td><?php  echo $row['status'];?></td>
            <td><?php echo $row['rooms'];?></td>
            <td><?php echo $row['total'];?></td>
            <td><?php echo $row['adult'];?></td>
            <td><?php echo $row['child'];?></td>
          </tbody>


        <?php

            }
          }
          else
          {
            echo "No data";
          }

        ?>
        </table>
        </div>

        <button name="submit" class="btn btn-primary print">Print</button>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script src="js/jquery.min.js"></script>
<script>
  $('.print').click(function(){
        var date = new Date().toJSON().slice(0,10).replace(/-/g,'/');
        var hedding = "<center><h3 style='color:#4e73df;'>LakDerana Hotels</h3></center>";
        var topic = "<h5>Room reservation report "+  date  +"</h5>";
        var bottom = "Report generated by: <?php echo $_SESSION['id']; ?>"
        var divElements = document.getElementById("table").innerHTML;
        var oldPage = document.body.innerHTML;
        document.body.innerHTML = hedding + topic + divElements + bottom;
        window.print();
        document.body.innerHTML = oldPage;
  })
</script>
 



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>