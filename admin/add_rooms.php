<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';


if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
        $room_no = $_POST['room_no'];
        $status = $_POST['status'];
        $max = $_POST['max'];

	
		$sql = "SELECT * FROM rooms WHERE room_number='$room_no'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
		    $sql = "INSERT INTO rooms (`name`, `room_number`, `status`, `max`)VALUES ('$name', '$room_no', '$status', '$max')";
			$result = mysqli_query($conn, $sql);
			if ($result)
            {
                ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
			} 
            else 
            {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} 
        else 
        {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Room Number already exist.";?></div><?php
		}
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Rooms</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add rooms</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-auto">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
              <label for="product_name">Room Type</label>
              <select class="form-control" id="vtype" name="name">
                    <option value="Dulux Double">Dulux Double</option>
                    <option value="Family Room">Family Room</option>
                    <option value="Dulux Thriple">Dulux Thriple</option>
                    <option value="Single Room">Single Room</option>
                    
                   </select>
              </div>

              <div class="col-md-3">
                  <label for="product_category">Room Number</label>
                  <input type="text" name="room_no" class="form-control" id="police_id" placeholder="Enter room number">
              </div>

              <div class="col-md-3">
                  <label for="product_category">Status</label>
                  <select class="form-control" id="vtype" name="status">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                    
                   </select>
              </div>

              <div class="col-md-3">
                <label for="product_name">Maximum Capacity</label>
                <input type="number" name="max" class="form-control" id="address" placeholder="Enter maximum capacity"require>
              </div>
            </div>
          </div>

          


          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add Room</button>
              </div>
            </div>
          </div>

          </div>
        </form>
        
      </div>
   </div>
</div>
</div>
</section>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>