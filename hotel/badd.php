<?php
session_start();


include "db.php";

include "header.php"; 
$user_id = $_SESSION["id"]  ;


?>

  <style>
.error {color: #FF0000;}
</style>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Booking</h2>
                    </div>
                    <p>Please fill this form and submit to add guest record to the database.</p>
                    <form action="badd.inc.php" method="post">
                        
            Select Room:<label for="inputSelect" class="sr-only">Select Room</label>
            <select name="room_id">
            <option value = "">---Select---</option>
           <?php
            $sqli = "SELECT * FROM room WHERE NOT EXISTS
      (SELECT room_id FROM booking WHERE (room.room_id = booking.room_id))";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
               echo '<option>'.$row['room_id'].'</option>';
                
            }
          ?>
      </select>
		   <br><br>
		   Check In:<label for="inputCheckIn" class="sr-only">Check In</label>
           <input type="date" id="inputCheckIn" name="check_in"  class="form-control"  required >
		   <br>
		   Check Out:<label for="inputCheckOut" class="sr-only">Check Out</label>
           <input type="date" id="inputCheckOut" name="check_out"  class="form-control"  required >
		   <br><label for="inputPayment" class="sr-only">Payment</label>
           <input type="text" id="inputPayment" name="payment"  class="form-control" placeholder="Payment"
 required >
      <br><br>
           Select Guest:<label for="inputSelect" class="sr-only">Select Guest</label>
           
            <select name="guest_name" >
            <option value = "">---Select---</option>
           <?php
            $sqli = "SELECT * FROM guest";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
               echo "<option>".$row["fname"]."</option>";
                
            
                
            }
          ?>
          
}
      </select>
		   <br><br>
		   
		   <div class="form-group">
           <div class="row">
               <input type="submit" class="btn btn-primary" value="Submit">
                <a href="blist.php" class="btn btn-default">Cancel</a>
                
            </div> 
            </div> 	
                </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


 <?php include "footer.php"; ?>