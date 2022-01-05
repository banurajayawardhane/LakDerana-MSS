<?php

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('../admin/UIDContainer.php',$Write);

include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 


error_reporting(0);

session_start();


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $card_id = $_POST['card_id'];
  $user_id = $_POST['user_id'];
  $email = $_POST['email'];
  $desig = $_POST['post'];
  $pass = $_POST['pass'];
  $con_pass = $_POST['con_pass'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
 $result3 = mysqli_query($conn, $sql);
if (!$result3->num_rows > 0){

$sql = "SELECT * FROM users WHERE rfid='$card_id'";
$result2 = mysqli_query($conn, $sql);
if (!$result2->num_rows > 0)
{
	if ($pass == $con_pass) {
		$sql = "SELECT * FROM users WHERE id='$user_id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (`name`, `id`, `pass`, `email`, `rfid`, `post`)
					VALUES ('$name', '$user_id', '$pass', '$email', '$card_id', '$desig')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Registration Completed.";?></div><?php
        $name = "";
        $police_id = "";
        $login_id = "";
        $address = "";
        $number = "";
        $pass = "";
        $con_pass = "";
        
		
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
        
			}
		} else {
      ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "ID already exist.";?></div><?php
      
		}
		
	} else {
		?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Password Not Matched.";?></div><?php
    
	}
}else{
  ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Card already exist.";?></div><?php
}
}else{
  ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Login ID already exist.";?></div><?php
} 
}

?>
<script src="js/jquery.min.js"></script>
  <script>
			$(document).ready(function(){
				 $("#getUID").load("../admin/UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("../admin/UIDContainer.php");
				}, 500);
			});
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</a></li>
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
              <div class="col-md-6">
              <label for="product_name">Full Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name"  value="<?php echo $name; ?>" require>
              </div>

              <div class="col-md-6">
                  <label for="product_category">User ID</label>
                  <input type="text" name="user_id" class="form-control" id="police_id" placeholder="Enter user id number" value="<?php echo $police_id; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="product_name">Email</label>
                <input type="text" name="email" class="form-control" id="address" placeholder="Enter email address" value="<?php echo $address; ?>" require>
              </div>

              <div class="col-md-6">
                  <label for="product_category">Designation</label>
                  <select class="form-control" id="vtype" name="post">
                    <option value="Admin">Admin</option>
                    <option value="FO">Front Office</option>
                    <option value="RM">Reservation Manager</option>
                    <option value="RS">Room Service</option>
                    <option value="ACC">Accountant</option>
                    <option value="HR">HR</option>
                    <option value="BM">Bar attendant</option>
                   </select>
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

            <div class="col-md-6">
                  <label for="product_condition">Password</label>
                  <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password" value="<?php echo $_POST['pass']; ?>">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" id="con_pass" placeholder="Confirm password" value="<?php echo $_POST['con_pass']; ?>" >
              </div>

            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

            <div class="col-md-4">
              <h5>Assign User access Card</h5> 
              <label>Scan the RFID card to display the Card ID</label>
              <textarea name="card_id" class="form-control" id="getUID" placeholder="Card ID" rows="1" cols="1" required></textarea>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add User</button>
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