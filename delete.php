<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user ID from the form
    $user_id = $_POST['user_id'];

    // Perform the deletion query
    $delete_query = mysqli_query($conn, "DELETE FROM users1 WHERE Id=$user_id");

    if ($delete_query) {
        // Logout the user after deleting the profile
        session_destroy();
        header("Location: index.php");
        exit;
    } else {
        // Handle deletion error
        echo "Error deleting profile. Please try again.";
    }
} else {
    // Redirect to the main page if accessed directly
    header("Location: index.php");
    exit;
}
?>
