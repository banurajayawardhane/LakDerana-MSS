<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';

if (isset($_POST['submit'])) {
	    $stock_id = uniqid();
        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $item_quntity = $_POST['item_quntity'];
        $buying_price = $_POST['buying_price'];
        $selling_price = $_POST['selling_price'];
        $date = $_POST['date'];

	
		$sql = "SELECT * FROM bar_stocks WHERE stock_id='$stock_id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
		    $sql = "INSERT INTO bar_stocks (`stock_id`, `item_name`, `item_description`, `item_quntity`, `buying_price`, `selling_price`, `date`)VALUES ('$stock_id', '$item_name', '$item_description', '$item_quntity', '$buying_price', '$selling_price', '$date')";
			$result = mysqli_query($conn, $sql);
			if ($result)
            {
                ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "New stock added.";?></div><?php
			} 
            else 
            {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} 
        else 
        {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Stock ID already exist.";?></div><?php
		}
}
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Stocks</h1>
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
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" placeholder="Enter Item Name" name="item_name" required  class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="item_description">Item Description</label>
                                        <input type="text" placeholder="Enter Item Description" name="item_description" required  class="form-control">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="item_quntity">Item Quntity</label>
                                        <input type="number" placeholder="Enter Item Quntity" name="item_quntity"  required  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="buying_price">Buying Price</label>
                                        <input type="number" placeholder="Enter Buying Price" name="buying_price"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" placeholder="Enter Selling Price" name="selling_price"  required  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date">Date</label>
                                        <input type="date" placeholder="Select Date" name="date"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">  
                                        <button class="btn btn-primary float-right" name="submit">Add New Stock</button>
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