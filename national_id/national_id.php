<!DOCTYPE html>
<html>
<head>
    <title>National ID Card Form</title>
    
</head>
<body>
    <div class="form-container">
        <h2>National ID Card Form</h2>
        <form action="./process_id.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="text" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>

            <div class="form-group">
                <label for="proffesion">profession:</label>
                <input type="text" id="profession" name="profession" required>
            </div>

             <div class="form-group">
                <label for="mother_name">mother name:</label>
                <input type="text" id="mother_name" name="mother_name" required>
            </div>

            <div class="form-group">
                <label for="father_name">father name:</label>
                <input type="text" id="father_name" name="father_name" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            </div>
            <div class="form-group">
            <button type="button" class="btn btn-success">
                 <input type="submit" value="Submit"></botton>
            </div>

            </form>
        <a href="/school work/index.php" class="home-button">Go back to home page</a>
    </div>
        </form>
    </div>

    <style>
        /* CSS styles for form */
        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-submit {
            text-align: center;
        }

        .form-submit button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</body>
</html>