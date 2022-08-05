<?php 
// session_start () function was used to start a new session
//  use include() function to import the db module
// POST method is use to get data inputted by the user
session_start();
include('connect.php');
$mobile=$_POST['mobile'];
$nin=$_POST['nin'];
$std='voter';

// prepare an sql query to select all rows from the database
// mysqli_query () function was used to send query to the db
// We need result to proceed
$sql="select * from `userdata` where mobile='$mobile' and nin='$nin' ";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    $data=mysqli_fetch_array($result);
    // if(password_verify($nin,$data['nin'])){
    // mysqli_fetch_array () was used to fetch data from the db
    // We need to check if the password inputted was thesame with the encrypted one
    // password_verify () function was used to verified the hashed password after that
    //  we need to write an sql query that would select aspirants info from the userdata table
    $sql="select name,photo,votes,nin from `userdata` where standard='aspirant' ";
    $resultaspirant=mysqli_query($con,$sql);
    if(mysqli_num_rows($resultaspirant)>0){
        // mysqli_fetch_array () was used to fetch aspirants data from the userdata
        $aspirants=mysqli_fetch_all($resultaspirant,MYSQLI_ASSOC);
        $_SESSION['aspirants'] = $aspirants;
    }   
     // Get voters id, vote status and data 
    // window.location is use to redirect user to dashboard page 
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;
    echo '<script>
    alert("login successfull");
        window.location="voters_education.php";
    </script>';
    }
    else{
    echo '<script>
        alert("Invalid Credentials");
        window.location="index.php";
    </script>';
}
//}


?>