<?php


//delete reservation

if(isset($_POST['delete-submit'])) {
 
 require 'dbh.inc.php';
 
 $reservation_id = $_POST['reserv_id'];
    
 $sql = "DELETE FROM reservation_table WHERE resurv_id =$reservation_id";
if (mysqli_query($conn, $sql)) {
    header("Location: ../view_reservations.php?delete=success");
} else {
    header("Location: ../view_reservations.php?delete=error");
}
}



//delete tables


if(isset($_POST['delete-table'])) {
 
 require 'dbh.inc.php';
 
 $tables_id = $_POST['table_id'];
    
 $sql = "DELETE FROM table_table WHERE table_id = $tables_id";
if (mysqli_query($conn, $sql)) {
    header("Location: ../view.tables.inc.php?delete=success");
} else {
    header("Location: ../view.tables.inc.php?delete=error");
}
}


mysqli_close($conn);
?>

    


