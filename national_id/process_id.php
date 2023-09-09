<?php
// connexion en pdo
$pdo = new PDO("mysql:host=localhost;dbname=project", "root", "");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
    $date_of_birth = isset($_POST['date_of_birth']) ? trim($_POST['date_of_birth']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $profession = isset($_POST['profession']) ? trim($_POST['profession']) : '';
    $mother_name = isset($_POST['mother_name']) ? trim($_POST['mother_name']) : '';
    $father_name = isset($_POST['father_name']) ? trim($_POST['father_name']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';

    // Validate the form inputs
    $errors = [];
    if (empty($full_name)) {
        $errors[] = "Full name is required.";
    }
    if (empty($date_of_birth)) {
        $errors[] = "Date of birth is required.";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($profession)) {
        $errors[] = "Profession is required.";
    }
    if (empty($mother_name)) {
        $errors[] = "Mother name is required.";
    }
    if (empty($father_name)) {
        $errors[] = "Father name is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // Check if there are any errors
    if (count($errors) > 0) {
        // Display the errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        // You can redirect the user back to the form or display an error message as per your requirement
        exit();
    }

    // Process the uploaded image
    $photo_name = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];

        // Generate a unique file name for the uploaded photo
        $photo_name = uniqid() . '_' . $photo_name;

        // Move the uploaded photo to a desired directory
        $target_dir = 'C:\laragon\www\school work\national_id\image';
        $target_path = $target_dir . $photo_name;
        move_uploaded_file($photo_tmp_name, $target_path);
    }


    // Prepare and execute the SQL query
    $stmt = $pdo->prepare("INSERT INTO national_id_cards (full_name, date_of_birth, gender, profession, mother_name, father_name, address, photo) VALUES (:full_name, :date_of_birth, :gender, :profession, :mother_name, :father_name, :address, :photo)");
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':profession', $profession);
    $stmt->bindParam(':mother_name', $mother_name);
    $stmt->bindParam(':father_name', $father_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':photo', $photo_name);
    $stmt->execute();

    
    // Check if the data is successfully inserted
    if ($stmt->rowCount() > 0) {
        echo "Form submitted successfully.";
        echo "<br>";
        echo "<a href='national_id.php'>Go back to the form</a>";
    } else {
        echo "Failed to submit the form.";
        echo "<br>";
        echo "<a href='national_id.php'>Go back to the form</a>";
    }
}
    ?>