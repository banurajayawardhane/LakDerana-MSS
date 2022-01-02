<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';


if (isset($_POST['submit'])) {
  $customer_ID = $_POST['customer_id'];
  $adults = $_POST['adults'];
  $children = $_POST['children'];
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];
  
  $sql = "INSERT INTO reservation (`cuss_id`, child, adult, check_in, check_out)VALUES ('$customer_ID', '$children', '$adults', '$check_in', '$check_out')";
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



<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Inquiry</h1>
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
        <div class="col-md-2">
        <input type="text" placeholder="Enter Customer ID" name="cuss_id"  class="form-control">
            </div>
            <div class="col-md-2">
        <input type="text" placeholder="Enter NIC" name="nic" class="form-control">
            </div>
            <div class="col-md-2">
        <input type="text" placeholder="Enter Mobile number" name="phone" class="form-control">
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
     if(isset($_POST['load']))
         {
            $cuss_id = $_POST['cuss_id'];
            $nic = $_POST['nic'];
            $phone = $_POST['phone'];

            $query = "SELECT * FROM customer WHERE cuss_id='$cuss_id' or nic='$nic' or phone='$phone' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
                  $customer_id = $row['cuss_id'];
                    
?>

                        <form action="" method="POST" class="login-email">
                         <div class="card-body">

                            <div class="form-group">
                                <label for="product_name">Full Name</label>
                                <input type="text" placeholder="Enter full name" name="name" required  class="form-control" value="<?= $row['name']; ?>">
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Customer ID</label>
                                        <input type="text" placeholder="Enter customer id number" name="cus_id"  required  class="form-control" value="<?= $customer_id; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">NIC Number</label>
                                        <input type="text" placeholder="Enter NIC number" name="nic"  required  class="form-control" value="<?= $row['nic']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="product_name">Phone</label>
                                        <input type="text" placeholder="Enter phone number" name="phone"  required  class="form-control" value="<?= $row['phone']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_name">Email</label>
                                        <input type="text" placeholder="Enter email address" name="email"  required  class="form-control" value="<?= $row['email']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Address</label>
                                <input type="text" placeholder="Enter address" name="address"  required  class="form-control" value="<?= $row['address']; ?>">
                            </div>

          
          

<?php
          }
             }
                else
                    {
                       ?>
                        <div class="col-md-4 m-2">
                        <div class="card card-primary">    
                        <h6> No Customer Found </h6>          
                        <button class="btn btn-primary float-right" name="load" onClick="location.href='add_customer.php'">ADD CUSTOMER</button>                   
                        </div>
                        </div>
                        <br>
                       <?php
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
            <div class="col-md-6">
            <label for="product_name">Number of adults</label>
            <input type="number" placeholder="Select number" name="adults" value=""   class="form-control" required>
              </div>
              <div class="col-md-6">
              <label for="product_name">Number of children</label>
            <input type="number" placeholder="Select number" name="children" value=""   class="form-control" required>
            <input type="hidden" placeholder="Select number" name="customer_id" value="<?= $customer_id; ?>"   class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <label for="product_name">Check in date</label>
            <input type="date" placeholder="" name="check_in" value=""   class="form-control" required>
              </div>
              <div class="col-md-6">
              <label for="product_name">Check out date</label>
            <input type="date" placeholder="Place of offence" name="check_out" value=""   class="form-control" required>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
           
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Continue to room reservation</button>
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