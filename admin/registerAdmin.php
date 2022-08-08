<?php
// use session_start() function to resume the current session on a session identifier passed via category
// Use $_SESSION method to check  the user category  
// Disallow the user from proceding with the page if is a staff
// Use include () function to import the header module
session_start();
if(!isset($_SESSION['id'])){
    echo '<script>
    window.location="login.php";
</script>';
}
$category=$_SESSION['category'];
if( $category=='staff'){
    echo '<script>
    window.location="Admindashboard.php";
</script>';
}
include('header.php');
?>

<h1 class="text-center text-white p-3">E-VOTING SYSTEM</h1>
    <div class="bg-success py-4">
        <h2 class="text-center">Register Admin</h2>
        <div class="container text-center">
            <form action="admin_val.php" method="POST" enctype='multipart/form-data'>
            <div class="mb-3">
                    <input type="text" name="name" class="form-control w-70 m-auto"
                     placeholder="Enter Full Name"
                      required="required"
                     title="FULL NAME">
            </div>

            <div class="mb-3">
                    <input type="text" name="username" class="form-control w-70 m-auto"
                     placeholder="Enter username"
                      required="required"
                     title="Enter username">
            </div>

            <div class="mb-3">
                    <input type="password" name="password" class="form-control w-70 m-auto"
                     placeholder="Enter Password"
                      required="required"
                     title="Enter Password">
                </div>

            <div class="mb-3">
                    <input type="number" name="nin" class="form-select w-70 m-auto"
                     placeholder="ENTER NIN"
                      required="required"
                     title="ENTER NIN" >
                </div>

                <div class="mb-3">
                    <input type="number" name="mobile" class="form-select w-70 m-auto"
                     placeholder="ENTER YOUR MOBILE NUMBER"
                      required="required"
                     title="ENTER YOUR MOBILE NUMBER" >
                </div>

                <div class="mb-3">
                    <select name="category" class="form-control w-70 m-auto">
                        <option value="staff">Staff</option>
                       
                    </select>
                </div>            
                <div class="mb-3">
                    <input type="file" name="photo" class="form-select w-70 m-auto"
                      required="required"
                     title="UPLOAD IMAGE">
                </div>
                
                <button type="submit" name="register_admin" class="btn btn-dark my-4">Register</button>
            </form>
        </div>

    </div>







<?php
include('footer.php')
?>