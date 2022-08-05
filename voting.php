<?php
// use session_start() function to resumes the current session 
//on a session identifier passed via id
// use include() function to import the db module
// Import the header module using include () function
// Get the aspirant votes using POST method and update it during voting
session_start();
include('connect.php');
$votes=$_POST['aspirantvotes'];
$totalvotes=$votes+1;

//pass aspirant id inside $aid
// we need to pass aspirant id inside voters id this is done in order 
// to map voter's vote to the right aspirant
// prepare an SQL query that will update votes and status of the voters
// and map it to aspirant voted for in the userdata table
// use mysqli_query () function to send our query to the db
// POST method was used to get name and id.
$aid=$_POST['aspirantid'];
$name=$_POST['name'];
$uid=$_SESSION['id'];

$updatevotes = mysqli_query($con,"update `userdata` set votes='$totalvotes' where id='$aid' ");
$updatestatus = mysqli_query($con,"update `userdata` set status=1 
where id='$uid' ");
// We need update result to proceed
// prepare an sql query that will return all aspirant rows from tb
// use mysqli_fetch_all () function to fetch data from the db
// we use session method to refer to each column in the db
//  finally we need to update the aspirant_tb table on tb
// and alert if voting is successful or not

if($updatevotes and $updatestatus){
    $getaspirants=mysqli_query($con,"select name,photo,votes,id from `userdata`
     where standard='aspirant'");
    $aspirants=mysqli_fetch_all($getaspirants,MYSQLI_ASSOC);
    $_SESSION['aspirants'] = $aspirants;
    $_SESSION['status'] = 1;
    $updat = mysqli_query($con,"update `aspirant_tb` set votes='$totalvotes' where name='$name' ");
    echo '<script>
        alert("CONGRATULATION YOU HAVE VOTED AND YOUR VOTE HAS BEEN COUNTED");
        window.location="dashboard.php";
    </script>';

}
/*else{
    echo '<script>
        alert("Technical error !! Voter after sometime");
        window.location="dashboard.php";
    </script>'
}*/
 ?>