<?php 
// use session_start() function to resumes the current session on a session identifier passed via id
// Use isset () function to check if the user  has an id to reference to
// i.e check if the user already logged in otherwise 
//redirect the user back to the login page

session_start();
$data=$_SESSION['data'];
$name=$data['name'];
if(!isset($_SESSION['id'])){
    echo '<script>
    window.location="index.php";
</script>';
}

?>
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
    <div class="col-md-2">
      <img src="uploads/inec.jpg" alt="Image1">
    </div>
    <div class="col-md-8">
    <div class="bg-white py-4">
    <h2 class="text-center ">WELCOME..</h2>
    <b><h2 class="text-center text-success "><?php echo ucfirst($name); ?></h2></b>
        <h2 class="text-center">HOW TO VOTE</h2>
        <div class="container text-center">
            
            <div class="mb-3">
                    <p>* CLICK ON VOTE NOW</p>
                </div>
                <div class="mb-3">
                <p>* CHECK AND COMFIRM ASPIRANT DETAILS, NAME ,POLITICAL PARTY, IMAGE AND THE RUNNING MATE NAME </p>
                </div><br>
                <div class="mb-3">
                <p>* CLICK ON VOTE BUTTON BELOW THE IMAGE OF THE  CANDIDATE OF YOUR CHOICE TO VOTE </p>
                </div><br>

                <div class="mb-3">
                <p>* GET CONFIRMATION THAT YOUR VOTE HAS BEEN COUNTED </p>
                </div><br>
              
                <a href="dashboard.php"><button class="btn btn-info btn-lg text-light px-3">VOTE NOW</button></a>
            
            
        </div>

    </div>
    </div>

</div>



</body>
</html>