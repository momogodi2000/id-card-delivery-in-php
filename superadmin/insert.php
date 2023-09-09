<?php
include('config.php');

// Function to insert a new user with hashed password
function insertUser($username, $password, $role)
{
    global $pdo;

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the query
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hashedPassword, $role]);

    return $stmt->rowCount(); // Return the number of affected rows (1 if successful)
}

// Example usage:
$users = [
    ['username' => 'admin', 'password' => 'admin123', 'role' => 'super admin'],
    ['username' => 'president', 'password' => 'president123', 'role' => 'president of court'],
    ['username' => 'register', 'password' => 'register123', 'role' => 'register of court'],
    ['username' => 'police', 'password' => 'police123', 'role' => 'police officer'],
    ['username' => 'sd', 'password' => 'sd123', 'role' => 'SD officer']
];

foreach ($users as $user) {
    $username = $user['username'];
    $password = $user['password'];
    $role = $user['role'];

    // Insert the user into the database
    $result = insertUser($username, $password, $role);

    if ($result) {
        echo "User '$username' inserted successfully.<br>";
    } else {
        echo "Failed to insert user '$username'.<br>";
    }
}

?>





<?php
session_start();

// Check if the user is authenticated and has the required role
checkAuthorization('super admin');

// Database credentials
$servername = 'your_servername';
$username = 'root';
$password = '';
$dbname = 'project';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Function to retrieve all users
function getUsers($conn)
{
    $sql = 'SELECT * FROM users';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to create a new user
function createUser($conn, $username, $password)
{
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to update a user
function updateUser($conn, $userId, $username, $password)
{
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username='$username', password='$hashedPassword' WHERE id='$userId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($conn, $userId)
{
    $sql = "DELETE FROM users WHERE id='$userId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $username = $_POST['create_username'];
        $password = $_POST['create_password'];

        if (createUser($conn, $username, $password)) {
            echo '<div class="alert alert-success">User created successfully.</div>';
        } else {
            echo '<div class="alert alert-danger">Failed to create user.</div>';
        }
    } elseif (isset($_POST['update'])) {
        $userId = $_POST['update_user_id'];
        $username = $_POST['update_username'];
        $password = $_POST['update_password'];

        if (updateUser($conn, $userId, $username, $password)) {
            echo '<div class="alert alert-success">User updated successfully.</div>';
        } else {
            echo '<div class="alert alert-danger">Failed to update user.</div>';
        }
    } elseif (isset($_POST['delete'])) {
        $userId = $_POST['delete_user_id'];

        if (deleteUser($conn, $userId)) {
            echo '<div class="alert alert-success">User deleted successfully.</div>';
        } else {
            echo '<div class="alert alert-danger">Failed to delete user.</div>';
        }
    }
}

// Retrieve all users
$users = getUsers($conn);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Super Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Super Admin - Manage Users</h2>

        <!-- Create User Form -->
        <form method="POST">
            <h4>Create User</h4>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="create_username" required class="form-control">
            </div>
            <Continuing from the previous response:

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="create_password" required class="form-control">
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create User</button>
        </form>

        <hr>

        <!-- User List -->
        <h4>User List</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal<?php echo $user['id']; ?>">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $user['id']; ?>">Delete</button>
                        </td>
                    </tr>

                    <!-- Update User Modal -->
                    <div class="modal fade" id="updateModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?php echo $user['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel<?php echo $user['id']; ?>">Update User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="update_user_id" value="<?php echo $user['id']; ?>">
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="update_username" required class="form-control" value="<?php echo $user['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="update_password" required class="form-control">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete User Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $user['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel<?php echo $user['id']; ?>">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?</p>
                                    <form method="POST">
                                        <input type="hidden" name="delete_user_id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>