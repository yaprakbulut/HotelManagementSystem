<?php
session_start();

include "header.php"; 

?>

<body>
  
<?php
// Include config file
include "db.php";
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $surnameErr  = $usernameErr  = $userexist =  "";
$personal_id = $fname = $lname = $email = $city = $country  = $phone = $dob = "";
 
    
    
    
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name

    $personal_id = test_input($_POST["personal_id"]);
    $fname=test_input($_POST["fname"]);
    $lname=test_input($_POST["lname"]);
    $dob=test_input($_POST["dob"]);
    $city=test_input($_POST["city"]);
    $country=test_input($_POST["country"]);
    $phone=test_input($_POST["phone"]);
    $email=test_input($_POST["email"]);
    // Check input errors before inserting in database
    if(!empty($personal_id) && !empty($fname) && !empty($lname) && !empty($email) && !empty($dob) && !empty($phone) && !empty($city) && !empty($country) ){
         
        // Prepare an insert statement
         $sql = "INSERT INTO guest (personal_id ,fname, lname, dob, city, country, phone, email) VALUES ('$personal_id','$fname','$lname','$dob','$city','$country','$phone','$email')";
        
        if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-
success'>Guest saved</div>";
    header("Location:glist.php");
            
} else {
           
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
  
}
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

  
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
                        <h2>Create Guest</h2>
                    </div>
                    <p>Please fill this form and submit to add guest record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
            Personal ID:<label for="inputID" class="sr-only">PersonalID</label>
           <input type="text" id="inputPersonalID" name="personal_id" <?php echo $personal_id;?> class="form-control" placeholder="PersonalID" required >
		   
		   Name:<span class="error">* <?php echo $nameErr;?></span><label for="inputName" class="sr-only">Name</label>
           <input type="text" id="inputName" name="fname" value="<?php echo $fname;?>" class="form-control" placeholder="Name" >
		   
		   Surname:<span class="error">* <?php echo $surnameErr;?></span><label for="inputSurname" class="sr-only">Surname</label>
           <input type="text" id="inputSurname" name="lname" value="<?php echo $lname;?>" class="form-control" placeholder="Surname"  >
		   
		   Birthday:<label for="inputBirthday" class="sr-only">Birthday</label>
           <input type="date" id="inputBirthday" name="dob" <?php echo $dob;?> class="form-control" placeholder="Birthday" required >
		   
		   City:<label for="inputCity" class="sr-only">City</label>
           <input type="text" id="inputCity" name="city" <?php echo $city;?> class="form-control" placeholder="City" required >
		   
		   Country:<label for="inputCountry" class="sr-only">Country</label>
           <input type="text" id="inputCountry" name="country" <?php echo $country;?> class="form-control" placeholder="Country" required >
           
		   Phone:<label for="inputPhone" class="sr-only">Phone</label>
           <input type="text" id="inputPhone" name="phone" <?php echo $phone;?> class="form-control" placeholder="Phone" required >
		   
           E-mail:<label for="inputEmail" class="sr-only">E-mail</label>
           <input type="text" id="inputEmail" name="email" <?php echo $email;?> class="form-control" placeholder="E-mail" required >
                       <br><br>
		   <div class="form-group">
           <div class="row">
               <input type="submit" class="btn btn-primary" value="Submit">
                <a href="glist.php" class="btn btn-default">Cancel</a>
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