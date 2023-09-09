<!DOCTYPE html>
<html>

<head>
    <title>Birth Certificate Form</title>
   
</head>

<body>
    <div class="form-container">
        <h2>Birth Certificate Application Form</h2>

        <form action="./process_form.php" method="POST" enctype="multipart/form-data">

            <label for="child_name">Child's Full Name:</label>
            <input type="text" id="child_name" name="child_name" required>

            
                <label for="gender">Gender:</label>
              <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            

            <label for="date_of_birth">Date of Birth:</label>
            <input type="text" id="date_of_birth" name="date_of_birth" required>

            <label for="place_of_birth">Place of Birth:</label>
            <input type="text" id="place_of_birth" name="place_of_birth" required>

            <label for="mother_name">Mother's Full Name:</label>
            <input type="text" id="mother_name" name="mother_name" required>
            
              <label for="place_of_birth_of_Mother">Place of Birth of Mother:</label>
            <input type="text" id="place_of_birth_of_Mother" name="place_of_birth_of_Mother" required>

            <label for="mother_profession">Mother Profession:</label>
            <input type="text" id="mother_profession" name="mother_profession" required>

            <label for="father_name">Father's Full Name:</label>
            <input type="text" id="father_name" name="father_name" required>

                <label for="place_of_birth_of_father">Place of Birth of Father:</label>
            <input type="text" id="place_of_birth_of_father" name="place_of_birth_of_father" required>

             <label for="father_profession">Father Profession:</label>
            <input type="text" id="father_profession" name="father_profession" required>

              <label for="resident_of_parents">Resindent of Parent:</label>
            <input type="tel" id="resident_of_parents" name="resident_of_parents" required>

              <label for="declaration_trusth">Who attested to the trusth of this declaration:</label>
            <input type="tel" id="declaration_trusth" name="declaration_trusth" required>

            <input type="submit" value="Submit">
            </form>
        <a href="/school work/index.php" class="home-button">Go back to home page</a>
    </div>
        </form>
    </div>

    <style>
        /* CSS styles for the form */
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        /* CSS styles for animation */
        .animation-target {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .animation-target.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

 <div id="qrCodeContainer"></div>
    <script>
        // Generate QR code on form submission
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(form);
            const qrCodeData = {};
            for (const [key, value] of formData.entries()) {
                qrCodeData[key] = value;
            }

            const qrCodeText = JSON.stringify(qrCodeData);
            const qrCodeContainer = document.getElementById('qrCodeContainer');
            qrCodeContainer.innerHTML = '';

            const qr = new QRious({
                element: qrCodeContainer,
                value: qrCodeText,
                size: 200
            });
        });

    </script>
   
</body>
</html>