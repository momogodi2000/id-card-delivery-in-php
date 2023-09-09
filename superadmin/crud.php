<?php

function addUser($username, $password, $role)
{
    // Add user to the database
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    
    // Return the newly created user ID
    return $pdo->lastInsertId();
}

function deleteUser($userId)
{
    // Delete user from the database
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    
    // Return true if the deletion was successful
    return $stmt->rowCount() > 0;
}

// Example usage:

// Check if the user has admin permission
if (hasPermission('admin')) {
    // Add a new user
    $newUserId = addUser('newuser', 'password123', 'register');
    if ($newUserId) {
        echo "User added successfully! User ID: " . $newUserId;
    } else {
        echo "Failed to add user.";
    }
    
    // Delete a user
    $userIdToDelete = 123; // Replace with the actual user ID to delete
    $isDeleted = deleteUser($userIdToDelete);
    if ($isDeleted) {
        echo "User deleted successfully!";
    } else {
        echo "Failed to delete user.";
    }
} else {
    echo "You do not have permission to perform this action.";
}