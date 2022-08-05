<?php
// use session_start() function to resumes the current session on a session identifier
// we need to use session_destroy() function to destroy the current session
// and then logged out user 
// use header () function to redirect user to the login page after clicking on logout btn
session_start();
session_destroy();
header('location:login.php');

?>