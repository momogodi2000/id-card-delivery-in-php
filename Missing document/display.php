<!DOCTYPE html>
<html>
<head>
  <title>Display Documents</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
</head>
<a href="/school work/index.php" class="btn btn-primary mb-3">Home page</a>

<body>
  <div class="container">
    <h2>Display Documents</h2>
    <div class="display-page">

      <?php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'project';

      $conn = new mysqli($host, $username, $password, $database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM missing_documents";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='document'>";
          echo "<img src='uploads/{$row['image']}' alt='Missing Document'>";
          echo "<br>";
          echo "Email: {$row['email']}<br>";
          echo "Address: {$row['address']}<br>";
          echo "Telephone: {$row['telephone']}<br>";
          echo "Name: {$row['name']}<br>";
          echo "</div>";
        }
      } else {
        echo "No documents found.";
      }

      $conn->close();
    
      ?>

<style>
    .container {
      margin-top: 50px;
    }
    .display-page {
      margin-top: 20px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 5px;
    }
    .document {
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .document img {
      max-width: 200px;
    }
  </style>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>