<?php 
include "dbh.inc.php";
require "view.tables.inc.php";


    $table_status = $_POST['table-status'];
    $table_id = $_POST['table_id'];
   
  
  try{
    
    $updatequery = "UPDATE table_table SET status = '$table_status' WHERE table_id = $table_id";
        
        if(mysqli_query($conn, $updatequery)){
          header("Location: ../view_tables.php");
        }else{
          header("Location: ../view_tables.php");
        }
        
  } catch(Exception $e) {
    echo $e;
  }



  
?>

