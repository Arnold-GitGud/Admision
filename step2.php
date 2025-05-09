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
$homeButtonText = "Home";
$nextButtonText = "Go to Enrollment Process";

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

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .schedule-table th,
        .schedule-table td {
            border: 1px solid <?php echo $scheduleTableBorderColor; ?>;
            padding: <?php echo $scheduleTablePadding; ?>;
            text-align: center;
            color: <?php echo $scheduleTableTextColor; ?>;
        }

        .schedule-table th {
            background-color: <?php echo $scheduleTableHeaderBgColor; ?>;
            color: <?php echo $scheduleTableHeaderTextColor; ?>;
        }

        .schedule-table tr:nth-child(even) {
            background-color: <?php echo $scheduleTableRowBgColor; ?>;
        }

        .schedule-table tr:hover {
            background-color: <?php echo $scheduleTableRowHoverBgColor; ?>;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            background-color: <?php echo $buttonBgColor; ?>;
            color: <?php echo $buttonTextColor; ?>;
            padding: <?php echo $buttonPadding; ?>;
            border: none;
            border-radius: <?php echo $buttonBorderRadius; ?>;
            font-size: <?php echo $buttonFontSize; ?>;
            cursor: pointer;
        }

        .button:hover {
            background-color: <?php echo $buttonHoverBgColor; ?>;
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
            <button class="button" id="homeButton"><?php echo $homeButtonText; ?></button>
            <button class="button" id="nextButton"><?php echo $nextButtonText; ?></button>
        </div>
    </div>

    <script>
        // Home button functionality
        document.getElementById('homeButton').addEventListener('click', function () {
            window.location.href = 'Admision.php';
        });

        // Next button functionality
        document.getElementById('nextButton').addEventListener('click', function () {
            // Redirect to step3.php
            window.location.href = 'step3.php';
        });
    </script>
</body>
</html>