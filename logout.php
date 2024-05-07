<?php
// Start the session (if it's not already started)
session_start();

// Check if the user is logged in (by checking if their username is stored in the session)
if (isset($_SESSION["username"])) {
    // If logged in, destroy the session to log the user out
    session_destroy();
}

// Redirect the user back to the login page after logging out
header("Location:index.php");
exit();

?>
