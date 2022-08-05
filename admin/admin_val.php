<?php 
// use include() function to import the db module
include('connect1.php');

// Getting values inputted
// use password_hash () function to encrypt the password value inside the database  
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$pass = password_hash($password,PASSWORD_BCRYPT);
$mobile=$_POST['mobile'];
$nin=$_POST['nin'];
$category=$_POST['category'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];


if($nin !=''){
    move_uploaded_file($tmp_name,"uploads/$image");
    //prepairing an sql query that will  insert record into the db
    //use mysqli_query() function to send our query into the db
    //we need the result to proceed or else display an error
    $sql = "insert into `admin` (username,password,name,photo,nin,
    category, mobile) values ('$username','$pass','$name','$image','$nin',
    '$category','$mobile') ";

    $result = mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-white" role="alert">
            <strong>Success</strong> Data Inserted Successfully
          </div>' ;
          echo "<script>window.open('registerAdmin.php', '_self')</script>";
          
        }else{
            die(mysqli_error($con));
        }
}

?>