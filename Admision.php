<?php

// Variables for body styling
$bodyBgColor = "#f8f9fa"; 
$bodyTextColor = "#212529";
$bodyFontFamily = "Arial, sans-serif";
$bodyPadding = "20px";

// Variables for header styling
$headerText = "Admision Portal";
$headerSettings = array(
    'background-color' => "#ffffff",
    'color' => "#000000",
    'font-size' => "24px",
    'text-align' => "center",
    'padding' => "10px",
    'border-bottom' => "1px solid #dee2e6",
);

// Variables for content styling
$contentTextColor = "#ffffff"; // Adjusted for better contrast
$contentFontSize = "16px";
$contentPadding = "100px";
$contentBgImage = "url('school.jpg')"; // Path to the background image
$contentOverlayColor = "rgba(0, 0, 0, 0.5)"; // Semi-transparent overlay

// Variables for button styling
$buttonBgColor = "#007bff";
$buttonTextColor = "#ffffff";
$buttonPadding = "10px 20px";
$buttonBorderRadius = "5px";
$buttonFontSize = "14px";

// Variables for content text
$contentNoApplicationsText = "No Applications Yet";
$contentStartJourneyText = "Start your journey by creating a new application today.";
$buttonText = "Start New Application";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admision Page</title>
    <style>
        body {
            background-color: <?php echo $bodyBgColor; ?>;
            font-family: <?php echo $bodyFontFamily; ?>;
            color: <?php echo $bodyTextColor; ?>;
            padding: <?php echo $bodyPadding; ?>;
        }

        .headerSettings {
            background-color: <?php echo $headerSettings['background-color']; ?>;
            color: <?php echo $headerSettings['color']; ?>;
            font-size: <?php echo $headerSettings['font-size']; ?>;
            text-align: <?php echo $headerSettings['text-align']; ?>;
            padding: <?php echo $headerSettings['padding']; ?>;
            border-bottom: <?php echo $headerSettings['border-bottom']; ?>;
        }

        .content {
            position: relative;
            color: <?php echo $contentTextColor; ?>;
            font-size: <?php echo $contentFontSize; ?>;
            padding: <?php echo $contentPadding; ?>;
            text-align: center;
            background-image: <?php echo $contentBgImage; ?>;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            overflow: hidden;
        }

        .content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: <?php echo $contentOverlayColor; ?>;
            z-index: 1;
        }

        .content > * {
            position: relative;
            z-index: 2;
        }

        .button {
            background-color: <?php echo $buttonBgColor; ?>;
            color: <?php echo $buttonTextColor; ?>;
            padding: <?php echo $buttonPadding; ?>;
            border-radius: <?php echo $buttonBorderRadius; ?>;
            font-size: <?php echo $buttonFontSize; ?>;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <h1 class="headerSettings"><?php echo $headerText; ?></h1>

    <div class="content">
        <p><?php echo $contentNoApplicationsText; ?></p>
        <p><?php echo $contentStartJourneyText; ?></p>
        <a href="#" class="button" id="loadStep1Button"><?php echo $buttonText; ?></a>
    </div>

    <!-- Placeholder for step1.php content -->
    <div id="step1Content" style="margin-top: 20px;"></div>

    <script>
        // Function to load step1.php dynamically
        function loadStep1() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'step1.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Insert the content of step1.php into the placeholder div
                    document.getElementById('step1Content').innerHTML = xhr.responseText;

                    // Reinitialize the "Next" button event listener
                    const nextButton = document.getElementById('nextButton');
                    if (nextButton) {
                        nextButton.addEventListener('click', function() {
                            loadStep2(); // Call the function to load step2.php
                        });
                    }
                } else {
                    console.error('Failed to load step1.php');
                }
            };
            xhr.send();
        }

        // Function to load step2.php dynamically
        function loadStep2() {
            const xhrStep2 = new XMLHttpRequest();
            xhrStep2.open('GET', 'step2.php', true);
            xhrStep2.onload = function() {
                if (xhrStep2.status === 200) {
                    // Replace step1.php content with step2.php content
                    document.getElementById('step1Content').innerHTML = xhrStep2.responseText;

                    // Add event listener for the "Back" button in step2.php
                    const backButton = document.getElementById('backButton');
                    if (backButton) {
                        backButton.addEventListener('click', function() {
                            loadStep1(); // Call the function to load step1.php
                        });
                    }
                } else {
                    console.error('Failed to load step2.php');
                }
            };
            xhrStep2.send();
        }

        // Initial event listener for the "Start New Application" button
        document.getElementById('loadStep1Button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            loadStep1(); // Call the function to load step1.php
        });
    </script>

</body>

</html>