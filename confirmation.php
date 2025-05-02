<!-- filepath: c:\xampp\htdocs\Admision\confirmation.php -->
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'admission');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get the enrollment ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch enrollment data
$sql = "SELECT * FROM enrollments WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $enrollment = $result->fetch_assoc();
} else {
    die('Enrollment not found.');
}

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
    $targetDir = "uploads/"; // Directory where the file will be saved
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create the directory if it doesn't exist
    }
    $targetFile = $targetDir . basename($_FILES['profileImage']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES['profileImage']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.");</script>';
        $uploadOk = 0;
    }

    // Check file size (limit to 2MB)
    if ($_FILES['profileImage']['size'] > 2000000) {
        echo '<script>alert("Sorry, your file is too large.");</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded.");</script>';
    } else {
        // Try to upload the file
        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFile)) {
            echo '<script>alert("The file ' . htmlspecialchars(basename($_FILES['profileImage']['name'])) . ' has been uploaded.");</script>';
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-image {
            display: block;
            margin: 0 auto 20px;
            width: 150px;
            height: 150px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #6c757d;
        }
        .profile-image img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: block;
        }
        .form-group button {
            padding: 10px 20px;
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
    <div class="container">
        <h1>Enrollment Confirmation</h1>
        <div class="profile-image">
            <?php if (isset($targetFile) && file_exists($targetFile)): ?>
                <img src="<?php echo $targetFile; ?>" alt="Profile Image">
            <?php else: ?>
                <span>Upload Image</span>
            <?php endif; ?>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profileImage">Upload Profile Image</label>
                <input type="file" id="profileImage" name="profileImage" required>
            </div>
            <div class="form-group">
                <button type="submit">Upload Image</button>
            </div>
        </form>
        <h2>Enrollment Details</h2>
        <p><strong>Full Name:</strong> <?php echo $enrollment['full_name']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $enrollment['birthdate']; ?></p>
        <p><strong>Gender:</strong> <?php echo $enrollment['gender']; ?></p>
        <p><strong>Contact Details:</strong> <?php echo $enrollment['contact_details']; ?></p>
        <p><strong>Address:</strong> <?php echo $enrollment['address']; ?></p>
        <p><strong>National ID:</strong> <?php echo $enrollment['national_id']; ?></p>
        <p><strong>Previous School:</strong> <?php echo $enrollment['previous_school']; ?></p>
        <p><strong>Grade Level:</strong> <?php echo $enrollment['grade_level']; ?></p>
        <p><strong>Program:</strong> <?php echo $enrollment['program']; ?></p>
        <p><strong>Schedule Preference:</strong> <?php echo $enrollment['schedule_preference']; ?></p>
        <p><strong>Mode of Study:</strong> <?php echo $enrollment['mode_of_study']; ?></p>
        <p><strong>Payment Method:</strong> <?php echo $enrollment['payment_method']; ?></p>
    </div>
</body>
</html>