<?php
// use session_start() function to resume the current session on a session identifier passed via category
// Use $_SESSION method to check  the user category  
// Disallow the user from proceding with the page if is a staff
// Use include () function to import the header module
session_start();
$category=$_SESSION['category'];
if( $category=='staff'){
    echo '<script>
    window.location="Admindashboard.php";
</script>';
}
include('header.php');



?>

<div class="row">
    <div class="col-12">
        <div class="card">
 
        <div class="card-body">
        <h2 class="text-center text-white bg-success">INEC STAFF RECORD</h2>
                    <table class="table table-bordered table-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Mobile</th>
                                <th>Delete</th>                       
                            </tr>     
                        </thead>
                        <tbody>
                            <?php 
                                $staff = "SELECT * FROM `admin` ORDER BY id DESC ";
                                $runresult = mysqli_query($con,$staff);
                                $i=0;

                                while ($row = mysqli_fetch_array($runresult)): {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $nin = $row['nin'];
                                    $mobile = $row['mobile'];
                                    $i++;

                                  ?>


                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucfirst($name); ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $nin; ?></td>
                                    <td><?php echo $mobile; ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="viewadmin.php?del=<?php echo $id; ?>">DELETE</a>
                                    </td>
                                </tr>
                            <?php }; ?>
                            
                            <?php endwhile ?>
                        </tbody>
                        
                    </table>
                    
                </div>


                    
                





            </div>
        </div>

                            </div>
                        </div>
                    </div>
                </div>




<?php
// query to delete record from database table
if (isset($_GET['del'])) {
    $del_id=$_GET['del'];

    $del_query = "DELETE FROM `admin` WHERE id ='$id' ";
    $del_run = mysqli_query($con,$del_query);
    if ($del_run) {

        echo "<script>alert('You Have Deleted Successfully')</script>";
        echo "<script>window.open('viewadmin.php', '_self')</script>";
        # code...
    }
}






include('footer.php'); ?>