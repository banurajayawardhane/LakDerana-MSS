<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
if(isset($_GET)){

    if (isset($_POST['submit'])) {
        $total = $_POST['total'];
        $id = $_GET['id'];
        
    
                $sql = "UPDATE reservation SET total='$total', `rooms`='test_rooms', `status`='checked in' WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Responded successfully.";?></div><?php
                    
                } 
                else
                {
                    ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
                }
        
    }
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.chkbx').click(function(){
            var text= "";
            $('.chkbx:checked').each(function(){
                text+=$(this).val()+ ',';
            });
            text=text.substring(0,text.lenght-1);
            $('#selectedtext').val(text);
            var count = $("[type='checkbox']:checked").lenght;
            $('#count').val($("[type='checkbox']:checked").lenght);

        });

    });
</script>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Room Reservation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Room reservation</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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

              $query = "SELECT room_number FROM rooms where `status`='available' ORDER BY room_number";
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

              $query = "SELECT room_number FROM rooms where `status`='available' ORDER BY room_number";
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

              $query = "SELECT room_number FROM rooms where `status`='available' ORDER BY room_number";
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

              $query = "SELECT room_number FROM rooms where `status`='available' ORDER BY room_number";
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

<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-1">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
        <div class="card-body">
        <div class="form-group">
                
            </div>

            <?php 

            if(isset($_GET['id']))
             {
            $id = $_GET['id'];
            $query = "SELECT * FROM reservation WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
                    $totalguests=  $row['child'] +  $row['adult'];
            ?>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                <label for="product_name">Reservation ID</label>
                <input type="text" value="<?= $row['id']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Customer ID</label>
                    <input type="text" value="<?= $row['cuss_id']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Number of guests</label>
                    <input type="text" value="<?= $totalguests ?>"class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">

              <div class="col-md-3">
                <label for="product_name">Adults</label>
                <input type="text" value="<?= $row['adult']; ?>"class="form-control">
                </div>

                <div class="col-md-3">
                <label for="product_name">Children</label>
                <input type="text" value="<?= $row['child']; ?>"class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="product_category">Check In </label>
                    <input type="text" value="<?= $row['check_in']; ?>"class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="product_category">Check Out</label>
                    <input type="text" value="<?= $row['check_out']; ?>"class="form-control">
                </div>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                <label for="product_name">Select Rooms</label> <br>
                <input type="checkbox" value="1001"class="chkbx">1001
                <input type="checkbox" value="1002"class="chkbx">1002
                <input type="checkbox" value="1003"class="chkbx">1003
                <input type="checkbox" value="1004"class="chkbx">1004
                </div>

                <div class="col-md-6">
                    <label for="product_category">Selected Rooms</label>
                    <input type="text" id="selectedtext"class="form-control">
                </div>

                <div class="col-md-2">
                    <label for="product_category">Total Number of rooms</label>
                    <input type="text" id="count"class="form-control">
                </div>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                <label for="product_name">Total Amount</label>
                <input type="text" placeholder="Enter total amount" name="total"class="form-control">
                </div>
              </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary float-right" name="submit">Confirm Booking | Reservation no: <?php echo $_GET["id"]?> </button>
            </div><br>

            <?php
                }
                }
        
              }
                                   
            ?>

          </div>
        </form>
      </div>
   </div>
</div>
</div>
</section><br>



<?php
 }
include('includes/scripts.php');
include('includes/footer.php');
?>