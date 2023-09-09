<?php
//include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
// connexion mysql
   $host = "localhost"; 
   $username = "root"; 
    $password = ""; 
    $database = "project"; 
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    $stmt = $mysqli->prepare("INSERT INTO  contact_submissions (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Submission stored in the database successfully

        // Send email
        $to = "yvangodimomo@gmail.com.com";
        $subject = "Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage: $message";

        if (mail($to, $subject, $body)) {
            echo "Thank you for contacting us. We will get back to you soon.";
            echo "<br>";
            echo "<a href='contact_us.php'>Go back to the form</a>";
        } else {
            echo "There was an error sending your message. Please try again later.";
            echo "<br>";
            echo "<a href='contact_us.php'>Go back to the form</a>";
        }
    } else {
        echo "There was an error storing your submission. Please try again later.";
        echo "<br>";
        echo "<a href='contact_us.php'>Go back to the form</a>";
    }

    $stmt->close();
    $mysqli->close();
}

?>