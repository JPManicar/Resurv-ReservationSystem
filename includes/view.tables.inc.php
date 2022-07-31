<?php

if(isset($_SESSION['user_id'])){
    
    require 'includes/dbh.inc.php';

    
    $user = $_SESSION['user_id'];
    $role = $_SESSION['role'];
     
    //view reserved tables
    
    if($role== "customer"){
    //View tables reserved by this USER
    $sql = "SELECT table_table.table_id, reservation_table.resurv_date, reservation_table.resurv_time 
    FROM table_table, reservation_table WHERE reservation_table.table_id = table_table.table_id AND reservation_table.user_id = $user;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo
        '   <div class="container">
            <div class="row">
            <div class="col-sm text-center">
            <p class="text-white bg-dark text-center">Reserved tables in your Account</p><br>
            <table class="table table-hover table-bordered table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Reserved Table</th>
                    </tr>
                </thead> ';
        while($row = $result->fetch_assoc()) {
        echo"
                <tbody>
                    <tr>
                      <th scope='row'>".$row["resurv_date"]."</th>
                      <td>".$row["resurv_time"]."</td>
                      <td>".$row["table_id"]."</td>
                    </tr>
              </tbody>";
            
        }
        echo "</table>";
    } else {
       echo "<p class='text-center'>List is empty!<p>"; }    
       echo'</div>'; 
        
    //view all reserved tables if ADMIN
    }
    else if ($role == "admin"){
    
    $sql = "SELECT table_table.table_id, reservation_table.resurv_id, reservation_table.resurv_date, reservation_table.resurv_time, table_table.status
    FROM table_table, reservation_table WHERE reservation_table.table_id = table_table.table_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        echo'  
         <div class="col-sm text-center">
         <p class="text-white bg-dark text-center">Tables for Reservation</p>
        ';
        //Start of Tables up for Reservation
        echo
        '<table class="table table-hover table-bordered table-responsive-sm text-center">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Reserved Table</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>';
        while($row = $result->fetch_assoc()) {  //fetch data from result set and output into table
        echo"
            <tbody>
                <tr>
                <th scope='row'>".$row["resurv_date"]."</th>
                <td>".$row["resurv_time"]."</td>
                <td>".$row["resurv_id"]."</td> 
                <td>".$row["table_id"]."</td> 
                <td>
                    <form method='POST' action = 'includes/update.stat.inc.php'>
                        <select name = 'table-status' onchange='this.form.submit()' > 
                            <option>".$row["status"]."</option>
                            <option>";
                            if($row["status"] == "Available"){
                                echo "Reserved";
                            }else if ($row["status"] == "Reserved"){
                                echo "Available";
                            }
                            
                            echo "</option>
                        </select>
                        <input type = 'hidden' name = 'table_id' value = ".$row["table_id"]."></input>
                    </form>
                </td> 
                </tr>
            </tbody>";
            
        }   
        echo "</table>
        
        </div>";
        //Fetch all the Available Tables
        $sql = "SELECT * FROM table_table WHERE status = 'Available' ORDER BY table_id;";
        $result = $conn->query($sql);

        //Start of Available Tables
        echo'  
         <div class="col-sm text-center">
         <p class="text-white bg-dark text-center">Available Tables</p>
         
        ';
        //Table Headings
        echo
        '<form action="includes/delete.php" method="POST">
        <table class="table table-hover table-bordered table-responsive-sm text-center">
            <thead>
                <tr>
                    <th scope="col">Table Number</th>
                    <th scope="col">Number of Seats</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>';
        //Fetch the Table Data
        while($row = $result->fetch_assoc()) {
        echo"
            <tbody>
                <tr>
                <td name = 'table_id'>".$row["table_id"]."</td>
                <td>".$row["no_of_seats"]."</td> 
                <td><select class = 'table_status' placeholder = ".$row["status"]."> 
                    <option>Available</option>
                    <option>Reserved</option>
                </td>
                <td class='table-danger'><button type='submit' name='delete-table' class='btn btn-danger btn-sm'>Delete</button></td>
                </form>
                </tr>
            </tbody>";
            
        }   
        echo "</table>";
        



    } else {    
    echo "<p class='text-center'>List is empty!<p>"; }
    echo '</div></div></div>';
    }

mysqli_close($conn);
}
