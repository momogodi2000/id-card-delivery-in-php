<?php
// connection mysql
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Store the data in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $address = $_POST['address'];
  $telephone = $_POST['telephone'];
  $name = $_POST['name'];

  // Upload image
  $targetDir = "C:\laragon\www\school work\Missing document\image";
  $targetFile = $targetDir . basename($_FILES['image']['name']);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $image = $_FILES['image']['name'];

  // Check if image file is a valid image
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check === false) {
    echo "File is not an image.";
    exit();
  }

  // Check if file already exists
  if (file_exists($targetFile)) {
    echo "File already exists.";
    exit();
  }

  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    echo "File size is too large.";
    exit();
  }

  // Allow certain file formats
  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    exit();
  }

  // Move uploaded file to destination folder
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    // Insert data into the database
    $sql = "INSERT INTO missing_documents (email, address, telephone, name, image) VALUES ('$email', '$address', '$telephone', '$name', '$image')";
    if ($conn->query($sql) === true) {
      echo "Data stored successfully.";
      header("Location: doc.php");
    } else {
      echo "Error storing data: " . $conn->error;
      header("Location: doc.php");
        exit();
    }
  } else {
    echo "Error uploading image.";
  }
}

$conn->close();
?>