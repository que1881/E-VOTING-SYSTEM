<?php 
// Import phpmysqli library
// Use die () function to give more detailed errors outputs
//connect to the database
    $con = mysqli_connect("localhost","root","","votingsystem");
    if(!$con){
        die(mysqli_error($con));
    }

?>