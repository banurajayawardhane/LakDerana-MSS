<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Room Reservation</h1>
                </div><!-- /.col -->
            
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="container-fluid">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">

        <?php

          $query = "SELECT * FROM reservation where `status`=''";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Reservation ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Check in date</th>
            <th scope="col">Check out date</th>
            <th scope="col">Number of guests</th>
            <th scope="col">#</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
                $totalguests=  $row['child'] +  $row['adult'];
        ?>
        
        
          <tbody>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['cuss_id'];?></td>
            <td><?php echo $row['check_in'];?></td>
            <td><?php echo $row['check_out'];?></td>
            <td><?php echo $totalguests?></td>
            <td><a href="room_reservation.php?id=<?php echo $row['id']; ?>">Continue</a></td>
          </tbody>
        <?php

            }
          }
          else
          {
            ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "No data.";?></div><?php
          }

        ?>
        </table>
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