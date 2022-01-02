<?php  
require '../config.php';

 if(isset($_POST["fine_number"]))  
 {  
      $output = '';  
     
      $query = "SELECT * FROM reservation WHERE id = '".$_POST["fine_number"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 

          <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Reservation ID</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["id"].'</div>   
                    </div>
                    <div class="col-md-5">
                         <label>Customer ID</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["cuss_id"].'</div>   
                    </div>
                
               </div>
             </div>

             <div class="form-group">
               
                         <label>Payment Status</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["payed"].'</div>   
               
             </div>

             <div class="form-group">
               <div class="form-row">
                    <div class="col-md-5">
                         <label>Check in date</label>   
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["check_in"].'</div>
                    </div>
                    <div class="col-md-5">
                         <label>Check Out date</label> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["check_out"].'</div>               
                    </div>

               </div>
             </div>

             <div class="form-group">
               
             <label>Status</label> 
             <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row["status"].'</div>   
   
 </div>

            



        
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>