<?php 

include 'config.php';

session_start();

error_reporting(0);




if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	 # get post
	 $sql = "SELECT * FROM users where id= '$email'";
	 if($result1 = mysqli_query($conn, $sql)){
		 if(mysqli_num_rows($result1) > 0){
		 $row = mysqli_fetch_array($result1);
		 $post = $row['post'];
	 }
	 }

	 switch ($post) {
		case "FO":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: FO_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "BM":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: BM_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "RM":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: RM_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "RS":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: RS_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "ACC":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: ACC_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "HR":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: HR_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		case "Admin":
			$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password'";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: admin\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "ID or Password is Incorrect.";?></div><?php
		}
		break;
		default:
		$sql = "SELECT * FROM users WHERE id='$email' AND pass='$password''";
			$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['license_number'] = $row['license_number'];
			header("Location: BM_Dashboard\index.php");
		} else {
			?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "License Number or Password is Incorrect.";?></div><?php
		}

	}

	
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - LakDerana Hotels</title>
</head>
<body>
	
	<div class="container">
	<div id="error1" style="color: red;">Please enter Username</div>
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Enter ID Number" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<!--
				<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			 -->
		</form>
	</div>
</body>
</html>