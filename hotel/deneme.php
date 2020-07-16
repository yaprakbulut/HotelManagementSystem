<?php 




$personalid="123";

        $sql="select * from guest g inner join booking_guest bg on g.guest_id=bg.guest_id where personal_id='$personalid'";
if(mysqli_query($conn, $sql)){
    echo "yanlıs";
}
else{
    echo "dogru";
}
?>       
