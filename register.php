<?php 
include('connect.php');

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$nin=$_POST['nin'];
$enc_nin= password_hash($nin,PASSWORD_BCRYPT);
$dob=$_POST['dob'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];

if($nin !=''){
    move_uploaded_file($tmp_name,"uploads/$image");
    $sql = "insert into `userdata` (name,email,mobile,nin,dob,photo,standard,
    status, votes) values ('$name','$email','$mobile','$$enc_nin','$dob',
    '$image','$std',0,0) ";

    $result = mysqli_query($con,$sql);
        if($result){
            echo '<script>
                alert("Data Inserted  successfull");
                 window.location="registration.php";
            </script>';
          echo "<script>window.open('registration.php', '_self')</script>";
          
        }else{
            die(mysqli_error($con));
        }
}

?>