<?php
include 'db.php';
$add="INSERT INTO users(fname,lname,age) values
 ('shahd','ayman',21),
 ('malak','ahmed',19),
 ('ali','amr',30),
 ('omar','khaled',25)";
if($conn->query($add) === TRUE){
    echo"the added successfully";
}
else{
    echo"the added faild";
}
?>