<?php 
include "dbh.inc.php";
require "../order.php";

      
$order = $_POST['order_set'];
   
  
  try{
    
    $updatequery = "UPDATE reservation_table SET pre_order_menu = $order WHERE resurv_id = 16";
        
        if(mysqli_query($conn, $updatequery)){
            header("Location: /reservation.php?error3=sqlerror1");
        }else{
          header("Location: /reservation.php?reservation=success");
        }
        
  } catch(Exception $e) {
    echo $e;
  }



?>






        