<?php
session_start();

include 'config.php';


// Check if the user is already logged in
if (isset($post['user_id'])) {
    // Redirect to the appropriate page based on the user's role
    redirectToHomePage($post['role']);
}

// Function to redirect the user to the appropriate page based on their role
function redirectToHomePage($role)
{
    switch ($role) {
        case 'super admin':
            header('Location:  superadmin/super_admin.php');
            exit();
        case 'president of court':
            header('Location:  Prisendent_court/president_court.php');
            exit();
        case 'register of court':
            header('Location:  register_court/regsiter_court.php');
        case 'SD officer':
                header('Location:  SD_officer/sd_officer.php');
         case 'police officer':
                    header('Location:  Police_officer/police_officer.php');
            exit();
        default:
            header('Location: login.php');
            exit();
    }
}

// Function to authenticate the user and set session variables
function authenticateUser($username, $password)
{
    // Replace this with your actual authentication logic
    // Retrieve the user from the database based on the provided username
    $user = getUserByUsername($username);

    if (!empty($user) && password_verify($password, $user['password'])) {
        // Authentication successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect to the appropriate page based on the user's role
        redirectToHomePage($user['role']);
    } else {
        // Authentication failed
        echo '<div class="alert alert-danger">Invalid username or password.</div>';
    }
}

// Function to retrieve a user from the database by username
function getUserByUsername($username)
{
    // Query the database to check the user's role
        $stmt =$GLOBALS['pdo']->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
        }

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    authenticateUser($username, $password);
   
}
?>