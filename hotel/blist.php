<?php
session_start();

include "header.php"; 


?>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Booking Details</h2>
                        <a href="badd.php" class="btn btn-success pull-right">Add New Booking</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "db.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT b.booking_id, b.room_id, b.check_in, b.check_out, b.payment, b.user_id, bg.guest_id, g.fname, g.lname, u.username, r.roomNo, r.type FROM  booking b LEFT join booking_guest bg  on b.booking_id = bg.booking_id join guest g on bg.guest_id = g.guest_id join users u on b.user_id = u.user_id join room r on b.room_id = r.room_id ";
                    
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Room No and Room Type</th>";
                                        echo "<th>Check In</th>";
                                        echo "<th>Check Out</th>";
                                        echo "<th>Payment</th>";
                                        echo "<th>User Name</th>";
                                        echo "<th>Guest Name</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    $_SESSION["bookingid"]= $row['booking_id'];
                                    
                                    echo "<tr>";
                                        echo "<td>" . $row['booking_id'] . "</td>";
                                        echo "<td>" . $row['roomNo'] ." - ". $row['type']. "</td>";
                                        echo "<td>" . $row['check_in'] . "</td>";
                                        echo "<td>" . $row['check_out'] . "</td>";
                                        echo "<td>" . $row['payment'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['fname'] ." ". $row['lname'] . "</td>";
                                    
                                        echo "<td>";
                                            echo "<a href='bedit.php?booking_id=". $row['booking_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div> 
        </div>
    </div>

</body>
</html>

<?php
include "footer.php";
?>