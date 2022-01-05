<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';



?>


<!-- Begin Page Content -->
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Room Service </h1>
  </div>

  <div class="row">

  <?php


 $query = "SELECT * FROM reservation where `status`='Checked in' order by check_in DESC";
 $query_run = mysqli_query($conn, $query);
 $check_db = mysqli_num_rows($query_run) > 0 ;

 if($check_db)
 {
   while($row = mysqli_fetch_array($query_run))
   {
     $rooms = $row['rooms'];
     $cuss_id = $row['cuss_id'];
     $id = $row['id'];

     if (isset($_POST['submit'])) {
      $string = explode(", ",$rooms);
      foreach($string as $roomitems){
        $sql = "UPDATE rooms SET `status`='Available' WHERE room_number='$roomitems'";
        $result = mysqli_query($conn, $sql);
        if ($result)
                {
                    ?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo "Marked clean | room number:"; echo $roomitems; ?></div><?php
                    
                } 
                else
                {
                    ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
                }
      }
    }


     ?>

  <div class="col-xl-6   col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            

            <form action="" method="POST" class="login-email">

            <div class="text font-weight-bold text-primary text-uppercase mb-1">Recent checked in rooms</div>

            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Room Numbers   :  <?php echo $rooms; ?></h6></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Customer ID   :  <?php echo $cuss_id ?></h6></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Check In date   :  <?php echo $row ['check_in']; ?> </h6></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Check Out date   :  <?php echo $row ['check_out']; ?> </h6></div>
            </div>    
            
            <div class="col-auto">
            <label for="product_name">Confirm if the rooms are cleaned<br>and ready for the next customers.</label><br/>
            <button class="btn btn-primary float-right" name="submit">Confirm</button>
            </div>

            </form>

          </div>
        </div>
      </div>

     
  </div>
  <?php        
            }
          }
          else
          {
            ?>

<div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-1">
                <h5><?php echo "No Customer Checked in" ?></h5>
              </div>
          </div>
        </div>
      </div>
  </div>

            <?php
            
          }

   ?>
  </div>
  </div>
  </div>

  


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>