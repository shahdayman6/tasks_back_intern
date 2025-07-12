<?php
include'db.php';
$delete="DELETE FROM users WHERE id=1";
if($conn->query($delete) === TRUE){
    echo"the delete successfully";
}
else{
    echo"the process of delete faild";
}
?>