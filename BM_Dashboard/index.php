<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../config.php';
?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bar Management Dashboard</h1>
  </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- tot motorist -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Stock Categories</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                    <?php
                    require '../config.php';

                    $query = "SELECT item_quntity FROM bar_stocks";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);
                    echo '<h4> Categories: ' .$row. '</h4>';

                    ?>

                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-wine-bottle fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Stock Quantity</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                    <?php
                    require '../config.php';

                    $query = "SELECT SUM(`item_quntity`) as item_quntity FROM bar_stocks";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_row($query_run);
                    echo '<h4> Quantity: ' .$row[0]. '</h4>';

                    ?>

                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-wine-bottle fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Expenses</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                    <?php
                    require '../config.php';

                    $query = "SELECT SUM(`buying_price`) as buying_price FROM bar_stocks";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_row($query_run);
                    echo '<h4> Expenses: ' .$row[0]. '</h4>';

                    ?>

                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-wine-bottle fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Income</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                    <?php
                    require '../config.php';

                    $query = "SELECT SUM(`net_price`) as net_price FROM bar_orders";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_row($query_run);
                    echo '<h4> Expenses: ' .$row[0]. '</h4>';

                    ?>

                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-wine-bottle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border-left-primary shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Current Stocks</h6>
                    </div>
                    <div class="card-body">
                        <?php
                            $query = "SELECT * FROM bar_stocks";
                            $query_run = mysqli_query($conn, $query);    
                        ?>
                        <div id="tabel">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <th scope="col">Stock ID</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Item Quntity</th>
                                    <th scope="col">Item Quntity</th>
                                    <th scope="col">Selling Price</th>
                                    <th scope="col">Date</th>
                                </thead>
                                <?php
                                    if($query_run)
                                    {
                                        foreach($query_run as $row)
                                        {
                                    ?>
                                    
                                    <tbody>
                                        <td><?php echo $row['stock_id'];?></td>
                                        <td><?php  echo $row['item_name'];?></td>
                                        <td><?php  echo $row['item_description'];?></td>
                                        <td><?php  echo $row['item_quntity'];?></td>
                                        <td><?php echo $row['buying_price'];?></td>
                                        <td><?php echo $row['selling_price'];?></td>
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>