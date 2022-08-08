<?php 
// use include() function to access the database
// Getting values inputted from the form
include('connect1.php');

$name=$_POST['name'];
$vice_name=$_POST['vice_name'];
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
    $sql = "insert into `aspirant_tb` (name,political_party,nin,mobile,position,votes,photo,vice_name)
     values ('$name','$party','$nin','$mobile','$position',0,'$image','$vice_name')";

    $result = mysqli_query($con,$sql);
        if($result){
            echo '<script>
            alert("Presidential Aspirant Added Successfully");
             window.location="aspirantregistration.php";
        </script>';
        }
        else{
            die(mysqli_error($con));
        }
}

?>