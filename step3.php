<!-- filepath: c:\xampp\htdocs\Admision\step3.php -->
<?php
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
    $gender = $conn->real_escape_string($_POST['gender']);
    $contactDetails = $conn->real_escape_string($_POST['contactDetails']);
    $address = $conn->real_escape_string($_POST['address']);
    $nationalId = $conn->real_escape_string($_POST['nationalId']);
    $previousSchool = $conn->real_escape_string($_POST['previousSchool']);
    $gradeLevel = $conn->real_escape_string($_POST['gradeLevel']);
    $program = $conn->real_escape_string($_POST['program']);
    $schedulePreference = $conn->real_escape_string($_POST['schedulePreference']);
    $modeOfStudy = $conn->real_escape_string($_POST['modeOfStudy']);
    $paymentMethod = $conn->real_escape_string($_POST['paymentMethod']);
    $termsAccepted = isset($_POST['termsAccepted']) ? 1 : 0;

    // Insert enrollment data into the database
    $sql = "INSERT INTO enrollments (
                full_name, birthdate, gender, contact_details, address, national_id, 
                previous_school, grade_level, program, schedule_preference, mode_of_study, 
                payment_method, terms_accepted
            ) VALUES (
                '$fullName', '$birthdate', '$gender', '$contactDetails', '$address', '$nationalId', 
                '$previousSchool', '$gradeLevel', '$program', '$schedulePreference', '$modeOfStudy', 
                '$paymentMethod', '$termsAccepted'
            )";

    if ($conn->query($sql) === TRUE) {
        $lastId = $conn->insert_id; // Get the last inserted ID
        header("Location: confirmation.php?id=$lastId");
        exit();
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 3: Enrollment Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Enrollment Process</h1>
        <form method="POST" enctype="multipart/form-data">
            <!-- 1. Personal Information -->
            <h2>1. Personal Information</h2>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Date of Birth</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contactDetails">Contact Details</label>
                <input type="text" id="contactDetails" name="contactDetails" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="nationalId">National ID/Passport</label>
                <input type="text" id="nationalId" name="nationalId" required>
            </div>

            <!-- 2. Academic Information -->
            <h2>2. Academic Information</h2>
            <div class="form-group">
                <label for="previousSchool">Previous School</label>
                <input type="text" id="previousSchool" name="previousSchool" required>
            </div>
            <div class="form-group">
                <label for="gradeLevel">Grade Level/Program Applying For</label>
                <input type="text" id="gradeLevel" name="gradeLevel" required>
            </div>

            <!-- 3. Course/Program Selection -->
            <h2>3. Course/Program Selection</h2>
            <div class="form-group">
                <label for="program">Program/Course Name</label>
                <input type="text" id="program" name="program" required>
            </div>
            <div class="form-group">
                <label for="schedulePreference">Schedule Preference</label>
                <select id="schedulePreference" name="schedulePreference" required>
                    <option value="">Select Schedule</option>
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modeOfStudy">Mode of Study</label>
                <select id="modeOfStudy" name="modeOfStudy" required>
                    <option value="">Select Mode</option>
                    <option value="Online">Online</option>
                    <option value="In-Person">In-Person</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
            </div>

            <!-- 4. Document Uploads -->
            <h2>4. Document Uploads</h2>
            <div class="form-group">
                <label for="documents">Upload Documents</label>
                <input type="file" id="documents" name="documents[]" multiple required>
            </div>

            <!-- 5. Payment Information -->
            <h2>5. Payment Information</h2>
            <div class="form-group">
                <label for="paymentMethod">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>

            <!-- 6. Terms & Conditions -->
            <h2>6. Terms & Conditions</h2>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="termsAccepted" required> I accept the terms and conditions.
                </label>
            </div>

            <!-- 7. Confirmation -->
            <div class="form-group">
                <button type="submit">Complete Enrollment</button>
            </div>
        </form>
    </div>
</body>
</html>