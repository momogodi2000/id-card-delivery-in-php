<?php
session_start();
include('config.php');

// Function to check if a user has a specific role
function hasPermission($role)
{
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Query the database to check the user's role
        $stmt = $pdo->prepare("SELECT role FROM users WHERE id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user's role matches the required role
        if ($result && $result['role'] === $role) {
            return true;
        }
    }

    return false;
}


// Redirect users to their respective pages based on their roles
if (hasPermission('admin')) {
    header("Location:  superadmin/super_admin.php");
    exit();
} elseif (hasPermission('president')) {
    header("Location: Prisendent_court/president_court.php");
    exit();
} elseif (hasPermission('register')) {
    header("Location: register_court/regsiter_court.php");
    exit();
} elseif (hasPermission('police')) {
    header("Location:  Police_officer/police_officer.php");
    exit();
} elseif (hasPermission('sd')) {
    header("Location: SD_officer/sd_officer.php");
    exit();
}


if (hasPermission('admin')) {
    include('/superadmin/crud.php');
} elseif (hasPermission('president')) {
  
} elseif (hasPermission('register')) {
   
} elseif (hasPermission('police')) {
  
} elseif (hasPermission('sd')) {
  
} else {
    // User does not have any of the specified roles, handle accordingly
    // ...
}