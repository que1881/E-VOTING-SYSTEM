<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-VOTING SYSTEM</title>
    <link rel="stylesheet" href="style.css">

    <!-- BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet">
</head>
<body class="bg-success">
    <h1 class="text-white text-center p-3">E-VOTING SYSTEM</h1>
    <div class="row">
    <div class="col-md-4">
      <img src="uploads/inec.jpg" alt="Image1">
    </div>
</div>
    <div class="bg-white py-4">
        <h2 class="text-center">Login to Vote</h2>
        <div class="container text-center">
            <form action="login.php" method="POST">
            <div class="mb-3">
                    <input type="number" name="mobile" class="form-select w-70 m-auto"
                     placeholder="PLEASE ENTER MOBILE NUMBER ON YOUR NATIONAL IDENTITY CARD"
                      required="required"
                     title="Please Enter Mobile Number on your National Identity Card"
                      maxLength="11" minLength="11">
                </div>
                <div class="mb-3">
                    <input type="password" name="nin" class="form-control w-70 m-auto"
                     placeholder="PLEASE ENTER YOUR NIN(NATIONAL IDENTIFICATION NUMBER) HERE"
                      required="required"
                     title="Please Enter National Identification Number"
                      >
                </div>
              
                <button type="submit" class="btn btn-dark my-4">Submit</button>
                <a href="registration.php" class="text-white">Register</a>
            </form>
        </div>

    </div>

    
</body>
</html>