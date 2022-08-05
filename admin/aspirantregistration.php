<?php
// use session_start() function to resumes the current session on a session identifier passed via id
// Use isset () function to check if the person visiting the page has an id to reference to
// i.e check if the user already logged in
session_start();
if(!isset($_SESSION['id'])){
    echo '<script>
    window.location="login.php";
</script>';
}

?>

<?php include('header.php'); ?>
    <h1 class="text-center text-white p-3">E-VOTING SYSTEM</h1>
    <div class="bg-success py-4">
        <h2 class="text-center">Register Presidential Aspirant</h2>
        <div class="container text-center">
            <form action="aspirant.php" method="POST" enctype='multipart/form-data'>
            <div class="mb-3">
                    <input type="text" name="name" class="form-control w-70 m-auto"
                     placeholder="Enter Full Name"
                      required="required"
                     title="FULL NAME">
            </div>

            <div class="mb-3">
                    <input type="text" name="party" class="form-control w-70 m-auto"
                     placeholder="Enter Political Party"
                      required="required"
                     title="Enter aspirant political party">
            </div>

            <div class="mb-3">
                    <input type="number" name="nin" class="form-control w-70 m-auto"
                     placeholder="National Identification Number"
                      required="required"
                     title="National Identification Number"
                      maxLength="11" minLength="11">
                </div>

            <div class="mb-3">
                    <input type="number" name="mobile" class="form-select w-70 m-auto"
                     placeholder="ENTER MOBILE NUMBER"
                      required="required"
                     title="Please Enter Mobile Number"
                      maxLength="11" minLength="11">
                </div>

                <div class="mb-3">
                    <select name="position" class="form-control w-70 m-auto">
                        <option value="president">PRESIDENT</option>        
                    </select>
                </div>
            
                <div class="mb-3">
                    <input type="file" name="photo" class="form-select w-70 m-auto"
                      required="required"
                     title="UPLOAD IMAGE">
                </div>
                
                <button type="submit" name="register_aspirant" class="btn btn-dark my-4">Register</button>
            </form>
        </div>

    </div>
    
</body>
</html>