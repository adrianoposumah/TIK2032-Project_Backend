<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $username = 'adrianoposumah';

    $query = "UPDATE `profile` SET description = '$description' WHERE username = '$username'";
    
    if (mysqli_query($conn, $query)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);

    // Redirect back to the profile page
    header("Location: edit.php");
    exit();
}