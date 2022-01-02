<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';


if (isset($_POST['submit'])) {
	    $cus_id = $_POST['cus_id'];
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

	
		$sql = "SELECT * FROM customer WHERE cuss_id='$cus_id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
		    $sql = "INSERT INTO customer (`name`, `nic`, `phone`, `email`, `address`, `cuss_id`)VALUES ('$name', '$nic', '$phone', '$email', '$address', '$cus_id')";
			$result = mysqli_query($conn, $sql);
			if ($result)
            {
                ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Registration Completed.";?></div><?php
			} 
            else 
            {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} 
        else 
        {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Customer ID already exist.";?></div><?php
		}
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Customer</li>
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
                                <label for="product_name">Full Name</label>
                                <input type="text" placeholder="Enter full name" name="name" required  class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Customer ID</label>
                                        <input type="text" placeholder="Enter customer id number" name="cus_id"  required  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">NIC Number</label>
                                        <input type="text" placeholder="Enter NIC number" name="nic"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Phone</label>
                                        <input type="text" placeholder="Enter phone number" name="phone"  required  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">Email</label>
                                        <input type="text" placeholder="Enter email address" name="email"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Address</label>
                                <input type="text" placeholder="Enter address" name="address"  required  class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary float-right" name="submit">Add Customer</button>
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