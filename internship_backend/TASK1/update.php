<?php
include'db.php';
$update=" UPDATE users SET fname='ahmed',age=30 WHERE id=5";
if($conn->query($update) === TRUE){
    echo"the update successfully";
}
else{
    echo"the update faild";
}
?>