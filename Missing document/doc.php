<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Document Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
</head>
<body>
  
  <a href="/school work/index.php" class="btn btn-primary mb-3">Home page</a>
<a href="display.php" class="btn btn-primary mb-3">missing document</a>


  <div class="container">
    <div class="row">
      <div class="col-md-4 sidebar">
        <!-- Nav tabs -->
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="found-tab" data-toggle="tab" href="#found" role="tab" aria-controls="found" aria-selected="true">Document Found upload</a>
          </li>
        </ul>
      </div>
 
     
      <div class="col-md-8 main-content">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="found" role="tabpanel" aria-labelledby="found-tab">
            <h4>Document Found upload</h4>
            <form action="store.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="form-group">
                <label for="telephone">Telephone:</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
              </div>
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
          </div>

            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .container {
      margin-top: 50px;
    }
    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
    }
    .main-content {
      padding: 20px;
    }
    .display-page {
      margin-top: 20px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 5px;
    }
  </style>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>