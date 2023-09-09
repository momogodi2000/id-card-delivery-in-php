<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $child_name = $_POST["child_name"];
    $sex = $_POST["sex"];
    $date_of_birth = $_POST["date_of_birth"];
    $place_of_birth = $_POST["place_of_birth"];
    $mother_name = $_POST["mother_name"];
    $place_of_birth_of_Mother = $_POST["place_of_birth_of_Mother"];
    $mother_profession = $_POST["mother_profession"];
    $father_name = $_POST["father_name"];
    $place_of_birth_of_father = $_POST["place_of_birth_of_father"];
    $father_profession = $_POST["father_profession"];
    $resident_of_parents = $_POST["resident_of_parents"];
    $declaration_trusth = $_POST["declaration_trusth"];

    // Database connection mysql
    $host = "localhost"; 
    $username = "root"; 
    $password = "";
    $database = "project";
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO birth_records (child_name, sex, date_of_birth, place_of_birth, mother_name, place_of_birth_of_mother, mother_profession, father_name, place_of_birth_of_father, father_profession, resident_of_parents, declaration_trusth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the form data to the statement parameters
    $stmt->bind_param("ssssssssssss", $child_name, $sex, $date_of_birth, $place_of_birth, $mother_name, $place_of_birth_of_Mother, $mother_profession, $father_name, $place_of_birth_of_father, $father_profession, $resident_of_parents, $declaration_trusth);

    if ($stmt->execute()) {
        // Submission stored in the database successfully

        require_once('phpqrcode/qrlib.php');

        // Path to store QR codes
        $qrCodePath = 'C:\laragon\www\school work\birthcertificate\qrcode';
        
        // Generate a unique filename for the QR code
        $qrCodeFilename = $qrCodePath . uniqid() . '.png';
        
        // Data to encode in the QR code
        $qrCodeData = json_encode($_POST);
        
        // Generate the QR code image
        QRcode::png($qrCodeData, $qrCodeFilename, QR_ECLEVEL_L, 10);
        
        header("Location: birth.php");
        exit;
    }   
}      