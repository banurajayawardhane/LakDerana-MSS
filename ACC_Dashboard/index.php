

<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reservation Details</h1>
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

          $query = "SELECT * FROM reservation where `status`='checked in' AND `payed`=''";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Reservation ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Rooms</th>
            <th scope="col">Total</th>
            <th scope="col">#</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
        
        
          <tbody>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['cuss_id'];?></td>
            <td><?php echo $row['rooms'];?></td>
            <td>Rs. <?php echo $row['total'];?></td>
            <td><a href="room_payments.php?id=<?php echo $row['id']; ?>">Continue</a></td>
          </tbody>
        <?php

            }
          }
          else
          {
            ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "No Data.";?></div><?php
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

