<?php

// Variables for styling
$formContainerBgColor = "#ffffff";
$formContainerBorderColor = "#dee2e6";
$formContainerBorderRadius = "8px";
$formContainerPadding = "20px";
$formContainerMaxWidth = "800px";
$formContainerBoxShadow = "0 2px 4px rgba(0, 0, 0, 0.1)";

$formTitleFontSize = "24px";
$formTitleTextAlign = "center";
$formSubtitleFontSize = "14px";
$formSubtitleTextAlign = "center";
$formSubtitleColor = "#6c757d";

$formGroupMarginBottom = "15px";
$formLabelFontWeight = "bold";
$formLabelMarginBottom = "5px";

$formInputPadding = "10px";
$formInputBorderColor = "#ced4da";
$formInputBorderRadius = "4px";
$formInputFontSize = "14px";
$formInputMarginBottom = "10px";

$fileLabelFontSize = "12px";
$fileLabelColor = "#6c757d";

$submitButtonBgColor = "#007bff";
$submitButtonTextColor = "#ffffff";
$submitButtonPadding = "10px";
$submitButtonBorderRadius = "4px";
$submitButtonFontSize = "16px";
$submitButtonHoverBgColor = "#0056b3";

// Database connection
$conn = new mysqli('localhost', 'root', '', 'admission');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form data
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $address = $conn->real_escape_string($_POST['address']);
    $contactNumber = $conn->real_escape_string($_POST['contactNumber']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);

    // Insert data into the database
    $sql = "INSERT INTO applicants (full_name, birthdate, address, contact_number, email, course) 
            VALUES ('$fullName', '$birthdate', '$address', '$contactNumber', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to step1.php with a success flag
        header('Location: step2.php?success=1');
        exit(); // Ensure no further code is executed
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1: Admission Requirements</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .form-container {
            max-width: <?php echo $formContainerMaxWidth; ?>;
            margin: 0 auto;
            padding: <?php echo $formContainerPadding; ?>;
            background-color: <?php echo $formContainerBgColor; ?>;
            border: 1px solid <?php echo $formContainerBorderColor; ?>;
            border-radius: <?php echo $formContainerBorderRadius; ?>;
            box-shadow: <?php echo $formContainerBoxShadow; ?>;
        }

        .form-container h1 {
            font-size: <?php echo $formTitleFontSize; ?>;
            text-align: <?php echo $formTitleTextAlign; ?>;
        }

        .form-container p {
            font-size: <?php echo $formSubtitleFontSize; ?>;
            text-align: <?php echo $formSubtitleTextAlign; ?>;
            color: <?php echo $formSubtitleColor; ?>;
        }

        .form-group {
            margin-bottom: <?php echo $formGroupMarginBottom; ?>;
        }

        .form-group label {
            font-weight: <?php echo $formLabelFontWeight; ?>;
            margin-bottom: <?php echo $formLabelMarginBottom; ?>;
            display: block;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: <?php echo $formInputPadding; ?>;
            border: 1px solid <?php echo $formInputBorderColor; ?>;
            border-radius: <?php echo $formInputBorderRadius; ?>;
            font-size: <?php echo $formInputFontSize; ?>;
            margin-bottom: <?php echo $formInputMarginBottom; ?>;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group .file-label {
            font-size: <?php echo $fileLabelFontSize; ?>;
            color: <?php echo $fileLabelColor; ?>;
        }

        .next-button {
            display: block;
            width: 100%;
            padding: <?php echo $submitButtonPadding; ?>;
            background-color: <?php echo $submitButtonBgColor; ?>;
            color: <?php echo $submitButtonTextColor; ?>;
            border: none;
            border-radius: <?php echo $submitButtonBorderRadius; ?>;
            font-size: <?php echo $submitButtonFontSize; ?>;
            cursor: pointer;
        }

        .next-button:hover {
            background-color: <?php echo $submitButtonHoverBgColor; ?>;
        }
    </style>
</head>
<body>
    <div id="successMessage" style="display: none; position: fixed; top: 20px; right: 20px; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 1000;">
        You created it successfully!
    </div>
    <div class="form-container" id="formContainer">
        <h1>Admission Requirements</h1>
        <p>Step 1: Fill out the required information below.</p>
        <form id="step1Form" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="course">Course/Program Applying For</label>
                <select id="course" name="course" required>
                    <option value="">Select a course</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Nursing">Nursing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="documents">Upload Documents</label>
                <input type="file" id="documents" name="documents[]" multiple required>
                <p class="file-label">Upload the following: Recent 1x1 / 2x2 ID photos, PSA Birth Certificate, Certificate of Good Moral Character, Academic records (Form 137/138 or TOR), Parent/Guardian’s ID.</p>
            </div>
            <button type="submit" class="next-button" id="nextButton">Next</button>
        </form>
    </div>
    <script>
        document.getElementById('nextButton').addEventListener('click', function () {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'step2.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('formContainer').innerHTML = xhr.responseText;
                } else {
                    console.error('Failed to load step2.php');
                }
            };
            xhr.send();
        });

        // Check if the URL contains the success flag
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';

            // Hide the message after 3 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>