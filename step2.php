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
$formSubtitleFontSize = "16px";
$formSubtitleTextAlign = "center";
$formSubtitleColor = "#6c757d";

$scheduleTableBorderColor = "#dee2e6";
$scheduleTableHeaderBgColor = "#f8f9fa";
$scheduleTableHeaderTextColor = "#000000";
$scheduleTableRowBgColor = "#ffffff";
$scheduleTableRowHoverBgColor = "#f1f1f1";
$scheduleTableTextColor = "#212529";
$scheduleTablePadding = "10px";

$buttonBgColor = "#007bff";
$buttonTextColor = "#ffffff";
$buttonPadding = "10px 20px";
$buttonBorderRadius = "5px";
$buttonFontSize = "14px";
$buttonHoverBgColor = "#0056b3";

// Variables for table headers
$tableHeaderDate = "Date";
$tableHeaderTime = "Time";
$tableHeaderLocation = "Location";

// Button texts
$backButtonText = "Back";
$nextButtonText = "Next";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2: Entrance Exam Schedule</title>
    <style>
        * {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

body {
    background-color: #f9fafb;
    color: #212529;
    line-height: 1.6;
    padding: 20px;
}

.form-container {
    max-width: <?php echo $formContainerMaxWidth; ?>;
    margin: 40px auto;
    padding: <?php echo $formContainerPadding; ?>;
    background-color: <?php echo $formContainerBgColor; ?>;
    border: 1px solid <?php echo $formContainerBorderColor; ?>;
    border-radius: <?php echo $formContainerBorderRadius; ?>;
    box-shadow: <?php echo $formContainerBoxShadow; ?>;
    transition: box-shadow 0.3s ease;
}

.form-container:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.form-container h1 {
    font-size: <?php echo $formTitleFontSize; ?>;
    text-align: <?php echo $formTitleTextAlign; ?>;
    color: #343a40;
    margin-bottom: 10px;
}

.form-container p {
    font-size: <?php echo $formSubtitleFontSize; ?>;
    text-align: <?php echo $formSubtitleTextAlign; ?>;
    color: <?php echo $formSubtitleColor; ?>;
    margin-bottom: 25px;
}

.schedule-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
    overflow: hidden;
}

.schedule-table th,
.schedule-table td {
    padding: <?php echo $scheduleTablePadding; ?>;
    text-align: center;
    color: <?php echo $scheduleTableTextColor; ?>;
    border-bottom: 1px solid <?php echo $scheduleTableBorderColor; ?>;
    font-weight: 500;
}

.schedule-table thead th {
    background-color: <?php echo $scheduleTableHeaderBgColor; ?>;
    color: <?php echo $scheduleTableHeaderTextColor; ?>;
    font-size: 1rem;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.schedule-table tbody tr {
    background-color: <?php echo $scheduleTableRowBgColor; ?>;
    transition: background-color 0.25s ease;
    cursor: default;
}

.schedule-table tbody tr:hover {
    background-color: <?php echo $scheduleTableRowHoverBgColor; ?>;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.button {
    background-color: <?php echo $buttonBgColor; ?>;
    color: <?php echo $buttonTextColor; ?>;
    padding: <?php echo $buttonPadding; ?>;
    border: none;
    border-radius: <?php echo $buttonBorderRadius; ?>;
    font-size: <?php echo $buttonFontSize; ?>;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 123, 255, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    min-width: 100px;
    user-select: none;
}

.button:hover,
.button:focus {
    background-color: <?php echo $buttonHoverBgColor; ?>;
    box-shadow: 0 4px 12px rgba(0, 86, 179, 0.6);
    outline: none;
}

@media (max-width: 600px) {
    .form-container {
        padding: 15px;
        margin: 20px 10px;
    }

    .schedule-table th,
    .schedule-table td {
        padding: 8px;
        font-size: 14px;
    }

    .button-container {
        flex-direction: column;
        gap: 10px;
    }

    .button {
        width: 100%;
    }
}

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Entrance Exam Schedule</h1>
        <p>Step 2: Below is your schedule to take the entrance exam face-to-face.</p>
        <table class="schedule-table">
            <thead>
                <tr>
                    <th><?php echo $tableHeaderDate; ?></th>
                    <th><?php echo $tableHeaderTime; ?></th>
                    <th><?php echo $tableHeaderLocation; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>May 10, 2025</td>
                    <td>9:00 AM - 12:00 PM</td>
                    <td>Room 101, Main Building</td>
                </tr>
                <tr>
                    <td>May 11, 2025</td>
                    <td>1:00 PM - 4:00 PM</td>
                    <td>Room 102, Main Building</td>
                </tr>
                <tr>
                    <td>May 12, 2025</td>
                    <td>9:00 AM - 12:00 PM</td>
                    <td>Room 103, Main Building</td>
                </tr>
            </tbody>
        </table>
        <div class="button-container">
            <button class="button" id="backButton"><?php echo $backButtonText; ?></button>
            <button class="button" id="nextButton"><?php echo $nextButtonText; ?></button>
        </div>
    </div>

    <script>
        // Back button functionality
        document.getElementById('backButton').addEventListener('click', function () {
            window.location.href = 'step1.php';
        });

        // Next button functionality
        document.getElementById('nextButton').addEventListener('click', function () {
            // Redirect to step3.php
            window.location.href = 'step3.php';
        });
    </script>
</body>
</html>