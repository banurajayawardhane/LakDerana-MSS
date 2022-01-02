<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
if(isset($_GET)){

    if (isset($_POST['submit'])) {
        $total = $_POST['total'];
        $id = $_GET['id'];
        $amount = $_POST['amount'];
        
    }
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.chkbx').click(function(){
            var text= "";
            $('.chkbx:checked').each(function(){
                text+=$(this).val()+ ',';
            });
            text=text.substring(0,text.lenght-1);
            $('#selectedtext').val(text);
            var count = $("[type='checkbox']:checked").lenght;
            $('#count').val($("[type='checkbox']:checked").lenght);

        });

    });
</script>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Room Reservation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Room reservation</li> 
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
                
            </div>

            <?php 

            if(isset($_GET['id']))
             {
            $id = $_GET['id'];
            $query = "SELECT * FROM reservation WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
                    $totalguests=  $row['child'] +  $row['adult'];
            ?>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                <label for="product_name">Reservation ID</label>
                <input type="text" value="<?= $row['id']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Customer ID</label>
                    <input type="text" value="<?= $row['cuss_id']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Total Amount</label>
                    <input type="text" value="Rs. <?= $row['total']; ?>"class="form-control">
                </div>
              </div>
            </div>

            <hr>
            
            <input type="hidden" name="price" id="price" value="<?= $row['total']; ?>"/>
            <input type="hidden" name="item_name" id="item_name" value="<?= $row['id']; ?>"/>
            <input type="hidden" name="license_number" id="license_number" value="<?= $row['cuss_id']; ?>"/>


            <div class="form-group">
                <button class="btn btn-primary float-right buy_now" name="submit">Continue to pay | Reservation no: <?php echo $_GET["id"]?> </button>
            </div><br>

            <?php
                }
                }
        
              }
                                   
            ?>

          </div>
        </form>
      </div>
   </div>
</div>
</div>
</section><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        $(document).ready(function(){
           $(".buy_now").on('click',function(e){
                e.preventDefault();
                    var item_name = $(this).closest(".card-body").find("#item_name").attr("value");
                    var price = $(this).closest(".card-body").find("#price").attr("value");
                    var license_number = $(this).closest(".card-body").find("#license_number").attr("value");
                    var dt = '&item_name='+item_name+'&price='+price+'&license_number='+license_number;
                    var url = '../payment/index.php?'+dt; 
                    
                    
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>



<?php
 }
include('includes/scripts.php');
include('includes/footer.php');
?>