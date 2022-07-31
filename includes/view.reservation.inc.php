<?php

if(isset($_SESSION['user_id'])){
    
    require 'includes/dbh.inc.php';

    
    $user = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    
    //show reservations customer side
    if($role== "customer"){
    $sql = "SELECT * FROM reservation_table WHERE user_id = $user"; //limits only show reservations by user
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        
        echo'
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Table Number</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Reserved Time</th>
                        <th scope="col">Pre-order</th>
                        <th scope="col">Comments</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                    <input name='reserv_id' type='hidden' value=".$row["resurv_id"].">
                      <th scope='row'>".$row["first_name"]." ".$row["last_name"]."</th>
                      <td>".$row["num_guests"]."</td>
                      <td>".$row["table_id"]."</td>
                      <td>".$row["resurv_date"]."</td>
                      <td>".$row["resurv_time"]."</td>
                      <td>".$row["pre_order_menu"]."</td>
                      <td><textarea readonly>".$row["comment"]."</textarea></td>
                      <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Cancel</button></td>
                          </form>
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else { echo "<p class='text-white text-center bg-danger'>Your reservation list is empty!<p>"; }
    }
    
    
    //show all reservations admin side 
    
    else if($role== "admin"){
    $sql = "SELECT * FROM reservation_table";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        
        echo
        '
            <table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Table</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Reserved Time</th>
                        <th scope="col">Pre-order</th>
                        <th scope="col">Comments</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                    <form action='includes/delete.php' method='POST'>
                      <input name='reserv_id' type='hidden' value=".$row["resurv_id"].">
                      <th scope='row'>".$row["resurv_id"]."</th> 
                      <td>".$row["first_name"]." ".$row["last_name"]."</td>
                      <td>".$row["num_guests"]."</td>
                      <td>".$row["table_id"]."</td>
                      <td>".$row["resurv_date"]."</td>
                      <td>".$row["resurv_time"]."</td>
                      <td>".$row["pre_order_menu"]."</td>
                      <td><textarea readonly>".$row["comment"]."</textarea></td>
                      <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Cancel</button></td>
                          </form>
                    </tr>
              </tbody>";
            
        }   
        echo "</table>";
    
    
    }
    else
    {    
        echo "<p class='text-white text-center bg-danger'>Your reservation list is empty!<p>"; 
    }
    
    }
    


mysqli_close($conn);
}


