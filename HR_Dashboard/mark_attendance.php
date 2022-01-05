<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 


error_reporting(0);

session_start();
if (isset($_POST['submit'])) {
	$user_id = $_POST['user_ID'];
  $today_date = date('Y/m/d');
  $time_in = $_POST['time_in'];
  $time_out = $_POST['time_out'];
  $status = $_POST['status'];

		$sql = "SELECT * FROM attendance WHERE `user_id`='$user_id' AND `date`='$today_date'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO attendance (`user_id`, `status`,`time_in`,`time_out`,`date`) VALUES ('$user_id', '$status','$time_in','$time_out','$today_date')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
        ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "User has already marked attendance";?></div><?php
		}
		
	}
                                
?>



<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mark Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">attendance</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-1">
     <div class="card card-primary"> 

     <form action="" method="POST" class="login-email">
     <div class="card-body">

<div class="form-group">
  <div class="form-row">
  <div class="col-md-4">
  <input type="text" placeholder="Enter user id" name="user_id" required  class="form-control">
    </div>
    <div class="col-md-0">
    <button class="btn btn-primary float-right" name="load">Load Info</button>
    </div>
  </div>
</div>
</div>
</form>

<?php 
# load info from user details
     if(isset($_POST['user_id']))
         {
            $user_id = $_POST['user_id'];
            $query = "SELECT * FROM users WHERE id='$user_id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
?>

               

       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="product_name">Name</label>
            <input type="text" placeholder="" name="" value="<?= $row['name']; ?>" required  class="form-control">
              </div>
              <div class="col-md-6">
              <label for="product_name">User ID</label>
            <input type="text" placeholder="" name="user_id" value="<?= $row['id']; ?>" required  class="form-control">
              </div>
            </div>
          </div>
          

<?php
          }
             }
                else
                    {
                       echo "<h6>No Record Found</h6>";
                  }
          }
                                   
 ?>
        </div>
                </div>
                </div>
                </div>
                </section>


<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-1">
     <div class="card card-primary">

       <form action="" method="POST" class="login-email">
          <div class="card-body">
          <label for="product_name"><h4>Fill out the below informaton</h4></label>


          <div class="form-group">
            <div class="form-row">
            <div class="col-md-3">
            <label for="product_name">Date</label>
            <input type="date" placeholder="" name="date" value=""   class="form-control" >
            <input type="hidden" placeholder="" name="user_ID" value="<?= $row['id']; ?>"   class="form-control" >
              </div>
              <div class="col-md-3">
            <label for="product_name">Time In</label>
            <input type="time" placeholder="" name="time_in" value=""   class="form-control" >
              </div>
              <div class="col-md-3">
              <label for="product_name">Time Out</label>
            <input type="time" placeholder="" name="time_out" value=""  class="form-control" >
              </div>
              <div class="col-md-3">
                  <label for="product_category">Status</label>
                  <select class="form-control" id="status" name="status" value="">
                  <option value="present">Present</option>
                    <option value="late">Late</option>
                    
                   </select>
              </div>
            </div>
          </div>



          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
           
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Mark attendance</button>
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