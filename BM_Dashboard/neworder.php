<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';

if (isset($_POST['submit'])) {
	    $order_id = uniqid();
        $cutomer_id	 = $_POST['cutomer_id'];
        $item_id = $_POST['item_id'];
        $order_quantity = $_POST['order_quantity'];
        $total_price = $_POST['total_price'];
        $discounts = $_POST['discounts'];
        $net_price = $_POST['net_price'];
        $date = date("Y.m.d");

	
		$sql = "SELECT * FROM bar_orders WHERE order_id='$order_id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
		    $sql = "INSERT INTO bar_orders (`order_id`, `cutomer_id`, `item_id`, `order_quantity`, `total_price`, `discounts`, `net_price`, `date`)VALUES ('$order_id', '$cutomer_id', '$item_id', '$order_quantity', '$total_price', '$discounts', '$net_price', '$date')";
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
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
  </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-1">
                <div class="card border-left-primary shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">New Order</h6>
                    </div>
                    <form action="" method="POST" class="login-email">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <lable for="cutomer_id">Customer ID</lable>
                                        <select class="form-control" name="cutomer_id">
                                            <option value=''></option>
                                            <?php
                                                $query = "SELECT * FROM customer";
                                                $query_run = mysqli_query($conn, $query); 
                                                while ($data = mysqli_fetch_array($query_run)) {
                                                    # code...
                                                    echo "<option value='".$data['id']."'>".$data['name']."</option>";
                                                }   
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <lable for="item_id">Order Item</lable>
                                        <select class="form-control" name="item_id">
                                            <option value=''></option>
                                            <?php
                                                $query = "SELECT * FROM bar_stocks";
                                                $query_run = mysqli_query($conn, $query); 
                                                while ($data = mysqli_fetch_array($query_run)) {
                                                    # code...
                                                    echo "<option value='".$data['stock_id']."'>".$data['item_name']."</option>";
                                                }   
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="order_quantity">Order Quntity</label>
                                        <input type="number" placeholder="Enter Order Quntity" name="order_quantity" id="order_quantity"  required  class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="total_price">Total Price</label>
                                        <input type="number" placeholder="Enter Selling Price" name="total_price" id="total_price"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="discounts">Discount Precentage</label>
                                        <input type="number" placeholder="Enter Discount Precentage" name="discounts"  required  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="net_price">Net Price</label>
                                        <input type="number" placeholder="Enter Net Price" name="net_price"  required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">  
                                        <button class="btn btn-primary float-right" name="submit">Place the order</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border-left-primary shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Current Orders</h6>
                    </div>
                    <div class="card-body">
                        <?php
                            $query = "SELECT * FROM bar_orders";
                            $query_run = mysqli_query($conn, $query);    
                        ?>
                        <div id="tabel">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <th scope="col">order_id</th>
                                    <th scope="col">cutomer_id</th>
                                    <th scope="col">item_id</th>
                                    <th scope="col">order_quantity</th>
                                    <th scope="col">total_price</th>
                                    <th scope="col">discount</th>
                                    <th scope="col">net_price</th>
                                    <th scope="col">date</th>
                                </thead>
                                <?php
                                    if($query_run)
                                    {
                                        foreach($query_run as $row)
                                        {
                                    ?>
                                    
                                    <tbody>
                                        <td><?php echo $row['order_id'];?></td>
                                        <td><?php  echo $row['cutomer_id'];?></td>
                                        <td><?php  echo $row['item_id'];?></td>
                                        <td><?php  echo $row['order_quantity'];?></td>
                                        <td><?php echo $row['total_price'];?></td>
                                        <td><?php echo $row['discounts'];?></td>
                                        <td><?php echo $row['net_price'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                    </tbody>

                                    <?php

                                        }
                                    }
                                    else
                                    {
                                        echo "No data";
                                    }

                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("input").change(function(){
        var str = $("#myInput").val();
    });
});
</script>
 

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>