<?php
// use session_start() function to resumes the current session on a session identifier passed via id
// Use isset () function to check if the user  has an id to reference to
// i.e check if the user already logged in otherwise 
//redirect the user back to the login page
// We need to get some data about the current user 

session_start();
$data=$_SESSION['data'];
if(!isset($_SESSION['id'])){
    echo '<script>
    window.location="index.php";
</script>';
}
// Use SESSION method to check if the current status i.e if user already voted or not
//We need to disabled the vote button after the user has voted once
if($_SESSION['status']==1){
    $status = '<button class="btn btn-info">Voted</button></br>';
}else{
    $status = '<button class=" btn btn-danger">Not Voted</button></br>'; 
}



include('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- BOOTSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <title>E-VOTING SYSTEM</title>
</head>
<body class="bg-success">
    <div class="container my-5">
        <a href="voters_education.php"><button class="btn btn-dark text-light px-3">Back</button></a>
        <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
        <h1 class="my-3">E-Voting System</h1>
        <div class="row my-5">
            <div class="col-md-7 col-lg-7">
                <?php 
                if(isset($_SESSION['aspirants'])){
                    $aspirants=$_SESSION['aspirants'];
                    // Getting aspirants details
                    for($i=0;$i<count($aspirants);$i++){
                        $name=$aspirants[$i]['name'];
                        $aspirants=$_SESSION['aspirants'];
                        $get_asp = "SELECT * FROM `aspirant_tb`  WHERE `name`='$name' ";
                        $run_asp = mysqli_query($con,$get_asp);
                        $data1 = mysqli_fetch_array($run_asp);
                        $_SESSION['political_party'] = $data1['political_party'];
                        $_SESSION['vice_name'] = $data1['vice_name'];
                        $_SESSION['position'] = $data1['position'];
                        $_SESSION['data1'] = $data1;


                        
                        
                        
                        ?>
                        <div class="row">
                        <div class="col-md-4">
                            <img src="uploads/<?php echo $aspirants[$i]['photo']; ?>" alt="Image1">
                        </div>
                        <div class="col-md-8">
                            <strong class="h5">Aspirant Name:</strong>
                            <?php echo $aspirants[$i]['name']; ?><br><br>
                            <strong class="h5">Political Party:</strong>
                            <?php echo $data1['political_party']; ?><br><br>
                            <strong class="h5">Position:</strong>
                            PRESIDENT<br><br>
                          <strong class="h5">Vice Name: </strong> 
                            <?php echo $data1['vice_name']; ?>
                        </div>
                    </div>
                     <!-- Creating a form to echo aspirants' vote, id and name -->
                    <form action="voting.php" method="post">
                        <input type="hidden" name="aspirantvotes" value="<?php echo $aspirants[$i]['votes']; ?>">
                        <input type="hidden" name="aspirantid" value="<?php echo $aspirants[$i]['id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $aspirants[$i]['name']; ?>">
                            
                        <?php
                        // Checking if voters already voted or vote
                            if($_SESSION['status']==1){
                                ?>
                                <button class="btn btn-info my-3 px-4 disabled">Voted</button>
                       <?php     }else{  ?> 
                        <button class="bg-danger my-3 text-white px-4">Vote</button>
               
                      <?php }
                        
                        ?>
                    </form>
                    <hr>

             <?php       }
                } 
                ?>
                <!---aspirants-->
            
            </div>





            <div class="col-md-5 col-lg-5">
                 <!---user profile-->
                 <img src="uploads/<?php echo $data['photo'] ; ?>" alt="Voter Image">
                 <br>
                 <br>
                 <strong class="h5">Name:</strong>
                 <?php echo $data['name']; ?><br><br>
                 <strong class="h5">Mobile Number:</strong>
                 <?php echo $data['mobile']; ?><br><br>
                 <strong class="h5">Status:</strong>
                 <?php echo $status; ?><br><br>
            </div>

        </div>


    </div>
</body>
</html>