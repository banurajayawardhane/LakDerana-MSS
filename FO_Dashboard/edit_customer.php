<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';

if (isset($_POST['edit'])) {
    $cus_id = $_POST['cus_id'];
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    $sql = "UPDATE customer SET `name`='$name', nic='$nic', phone='$phone', email='$email', `address`='$address' WHERE cuss_id='$cus_id'";
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
?>
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Customer Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
                    </ol>
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

        <form action="" method="post">
            <div class="form-row">
            <div class="col-md-5">
            <input type="text" placeholder="Enter Customer id" name="cus_id" class="form-control" required>
              </div>
              <div class="col-md-1">
              <input type="submit" name="search" value="Search" class="btn btn-primary float-right">
              </div>
            </div>
        </form>

        <br>

        <?php
          require '../config.php';

          if(isset($_POST['search']))
          {

            $cus_id = $_POST['cus_id'];
            $query = "SELECT * FROM customer where cuss_id = '$cus_id'";
            $query_run = mysqli_query($conn, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_array($query_run))
            {
                
          ?>
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="product_name">Full Name</label>
                                <input type="text" placeholder="Enter full name" name="name" required  class="form-control" value="<?php echo $row['name'];?>">
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Customer ID</label>
                                        <input type="text" placeholder="Enter customer id number" name="cus_id"  required  class="form-control" value="<?php echo $row['cuss_id'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">NIC Number</label>
                                        <input type="text" placeholder="Enter NIC number" name="nic"  required  class="form-control" value="<?php echo $row['nic'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Phone</label>
                                        <input type="text" placeholder="Enter phone number" name="phone"  required  class="form-control" value="<?php echo $row['phone'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">Email</label>
                                        <input type="text" placeholder="Enter email address" name="email"  required  class="form-control" value="<?php echo $row['email'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Address</label>
                                <input type="text" placeholder="Enter address" name="address"  required  class="form-control" value="<?php echo $row['address'];?>">
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary float-right" name="edit">Edit Details</button>
                                    </div>
                                </div>
                            </div>
                            </form>


        <?php
        }}else{
            ?>
                  <tr>
                    <td colspan="6">No Customer Found</td>
                  </tr>

            <?php
                }

            ?>

  
        </table>

        <?php
          }       
        ?>

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