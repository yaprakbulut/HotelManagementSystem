<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<?php
session_start();

include "db.php";

$bookingid=$_SESSION["bookingid"];

$user_id = $_SESSION["id"];

$roomid=$_POST["room_id"];

$guestname=$_POST["guest_name"];

$sql="select * from guest where fname = '$guestname'";

  	     $res_u = mysqli_query($conn, $sql);
   
       if (mysqli_num_rows($res_u) > 0) {
           
        while(($row=mysqli_fetch_array($res_u)))
        {
  
	       $guestid=$row["guest_id"];
            
        } }
           else{
              echo "boş";
           }
if(isset($_POST['guestid'])){
    $guestid=$_POST['guestid'];
}

// Define variables and initialize with empty values
$room_id = $check_in = $check_out = $payment = "";
   
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
    
    
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    
    $check_in=test_input($_POST["check_in"]);
    $check_out=test_input($_POST["check_out"]);
    $payment=test_input($_POST["payment"]);
    $room_id=test_input($_POST["room_id"]);

    
    // Check input errors before inserting in database
    if(!empty($room_id) && !empty($check_in) && !empty($check_out) && !empty($payment) && !empty($user_id) ){
       $sql = "INSERT INTO booking (room_id ,check_in, check_out, payment, user_id) VALUES ('$room_id','$check_in','$check_out','$payment','$user_id')";
        if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Booking saved</div>";
            
} else {
           
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
    $stayIDquery = "SELECT booking_id FROM `booking` WHERE room_id ='$roomid'";
        
	$result = mysqli_query($conn,$stayIDquery) or die(mysql_error());
	$rows = mysqli_num_rows($result);
  
        if($rows==1){
            while($rows = $result->fetch_assoc()) {
                $bookingid=$rows["booking_id"];
           
        }
        }
        else{
            echo "Getting booking query failed";
            exit();
        }
     
        // Prepare an insert statement
         
        $insertgueststay="INSERT INTO booking_guest (guest_id, booking_id) VALUES('$guestid','$bookingid')";
    
     if ($conn->query($insertgueststay) === TRUE) {

         header("Location:blist.php");
         echo "<div class='alert alert-success'>Booking saved</div>";
    } 
    else{
        echo "Insert stay query failed";
        exit();
    }   
    } 
$conn->close();
}
  
?>