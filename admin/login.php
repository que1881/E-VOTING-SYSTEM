<?php 
// Use include () function to import header module
include('header.php');
?>

<h1 class="text-info text-center p-3">E-VOTING SYSTEM</h1>
    <div class="bg-white py-4">
        <h2 class="text-center">Admin Login</h2>
        <div class="container text-center">
            <form action="login_validation.php" method="POST">
            <div class="mb-3">
                    <input type="text" name="username" class="form-select w-70 m-auto"
                     placeholder="ENTER YOUR USERNAME"
                      required="required"
                     title="ENTER USERNAME" >
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control w-70 m-auto"
                     placeholder="ENTER YOUR PASSWORD"
                      required="required"
                     title="Please Enter Your Password">
                    
                </div>
                <button type="submit" class="btn btn-dark my-4">Submit</button>
            </form>
        </div>

    </div>





<?php 
include('footer.php');
?>