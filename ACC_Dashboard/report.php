<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
?>


<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Payment History</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payment History</li> 
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

        <?php

          $query = "SELECT * FROM reservation where payed='payed'";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Reservation id</th>
            <th scope="col">Customer id</th>
            <th scope="col">Amount</th>
            <th scope="col">Due Amount</th>
            <th scope="col">Status</th>
            <th scope="col">View Details</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
        
          <tbody>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['cuss_id'];?></td>
            <td>Rs. <?php echo $row['total'];?>.00</td>
            <td>Rs. <?php echo $row['due'];?>.00</td>
            <td><?php echo $row['payed'];?></td>
            <td>
              <button type="button" class="btn btn-primary view_data" id="<?php echo $row["id"];?>" name="view" value="view">View Details</button>
           <?php
           ?>
            </td>
            
          </tbody>


        <?php

            }
          }
          else
          {
            echo "no fines";
          }

        ?>
        </table>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="dataModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reservation Details</h5>
      </div>
        <div class="modal-body" id="id"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var fine_number = $(this).attr("id");  
           $.ajax({  
                url:"popup.php",  
                method:"post",  
                data:{fine_number:fine_number},  
                success:function(data){  
                     $('#id').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  

</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>