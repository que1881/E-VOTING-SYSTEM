<?php
// use session_start() function to resumes the current session on a session identifier passed via id
// Use isset () function to check if the user  has an id to reference to
// i.e check if the user already logged in otherwise 
//redirect the user back to the login page
// Import the header module using include () function
session_start();
if(!isset($_SESSION['id'])){
    echo '<script>
    window.location="login.php";
</script>';
}

?>
<?php include('header.php');  ?>
<div class="row">
    <div class="col-12">
        <div class="card">
 
        <div class="card-body">
        <a href="index.php"><button class="btn btn-dark text-light px-3">Back</button></a>
        <!-- I use $_SESSION['category'] method to indicate the buttons that will be visible
    to the INEC staff and INEC chairman -->
        <?php if($_SESSION['category']=='inec_chairman'){ ?>
        <a href="viewadmin.php"><button class="btn btn-info text-light px-3">View Election Observer</button></a>
        <a href="registerAdmin.php"><button class="btn btn-success text-light px-3">Add Election Observer</button></a>
        <?php } ?>
        <a href="aspirantregistration.php"><button class="btn btn-success text-light px-3">Add Aspirant</button></a>
        <a href="logout.php"><button class="btn btn-danger text-light px-3">Logout</button></a>
        <h2 class="text-center text-white bg-success mt-3">MAY 25th 2022 PRESIDENTIAL ELECTION RESULT</h2>
                    <table class="table table-bordered table-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr</th>
                                <th>Aspirant's Name</th>
                                <th>Political Party</th>
                                <th>Mobile</th>
                                <th>Total Votes</th>                       
                            </tr>     
                        </thead>
                        <tbody>
                            <?php
                            // Prepairing a query that will return all rows in the db
                            // Use mysqli_query () function to send our query to the db
                            // We need a result to proceed
                            // We need to fetch the data from the aspirant_tb table and echo it out to the admin dashboard
                                $aspirant = "SELECT * FROM aspirant_tb ORDER BY id DESC";
                                $runresult = mysqli_query($con,$aspirant);
                                $i=0;

                                while ($row = mysqli_fetch_array($runresult)): {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $party = $row['political_party'];
                                    $mobile = $row['mobile'];
                                    $votes = $row['votes'];
                
                                    $i++;

                                  ?>


                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucfirst($name); ?></td>
                                    <td><?php echo $party; ?></td>
                                    <td><?php echo $mobile; ?></td>
                                    <td><?php echo $votes; ?></td>
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



<?php include('footer.php'); ?>