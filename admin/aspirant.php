<?php 
// use include() function to access the database
// Getting values inputted from the form
include('connect1.php');

$name=$_POST['name'];
$nin=$_POST['nin'];
$mobile=$_POST['mobile'];
$party=$_POST['party'];
$position=$_POST['position'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];


if($nin !=''){
    move_uploaded_file($tmp_name,"uploads/$image");
    //prepairing an sql query that will  insert record into the db
    //use mysqli_query() function to send our query into the db
    //we need the result to proceed or else display an error
    $sql = "insert into `aspirant_tb` (name,political_party,nin,mobile,position,votes,photo)
     values ('$name','$party','$nin','$mobile','$position',0,'$image')";

    $result = mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-white" role="alert">
            <strong>Success</strong> Presidential Aspirant Added Successfully
          </div>' ;
          echo "<script>window.open('aspirantregistration.php', '_self')</script>";
          
        }else{
            die(mysqli_error($con));
        }
}

?>