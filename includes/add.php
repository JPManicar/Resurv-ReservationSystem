<?php


//add reservation

if(isset($_POST['add-reservation'])) {
 
 require 'dbh.inc.php';
 
    $user = $_SESSION['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $table = $POST['table_num'];
    $guests = $_POST['num_guests'];
    $comments = $_POST['comments'];

 $sql = "INSERT INTO reservation_table(user_id,first_name, last_name, num_guests, table_id, resurv_date, resurv_time, comment) 
 VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../reservation.php?error3=sqlerror1");
            exit();
        }
        else {       
            mysqli_stmt_bind_param($stmt, "ssssssss", $user, $fname, $lname, $guests, $table, $date, $time, $comments);
            mysqli_stmt_execute($stmt);
            header("Location: ../reservation.php?reservation=success");
            exit();
        }
}



//add table


if(isset($_POST['add-table'])) {
 
 require 'dbh.inc.php';
 
 $tables_id = $_POST['tables_id'];
    
 $sql = "DELETE FROM table_table WHERE table_id =$tables_id";
if (mysqli_query($conn, $sql)) {
    header("Location: ../view_tables.php?delete=success");
} else {
    header("Location: ../view_tables.php?delete=error");
}
}


mysqli_close($conn);
?>

    


