<?php
session_start();

// Define the CSV file name
$filename = 'data.csv'; // Replace with your actual CSV file path
$tempFilename = 'temp.csv'; // Temporary file for modifications

// Function to read CSV file and display its content
function readCSV($filename) {
    if (($handle = fopen($filename, "r")) !== FALSE) {
        echo "<h2>CSV Data:</h2>";
        echo "<table border='1'>\n";
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo "<tr>\n";
            foreach ($data as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
        fclose($handle);
    } else {
        echo "Could not open the file.";
    }
}

// Function to write new data to a CSV file
function writeCSV($filename, $data) {
    if (($handle = fopen($filename, 'a')) !== FALSE) { // 'a' mode to append data
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
        echo "Data written to $filename successfully.<br>";
    } else {
        echo "Could not open the file for writing.";
    }
}

// Function to modify existing CSV data
function modifyCSV($filename, $tempFilename) {
    $data = [];
    // Read the existing CSV data
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Example modification: append " Modified" to each name
            // $row[0] .= " Modified"; // Assuming the first column is Name
            $data[] = $row;
        }
        fclose($handle);
    } else {
        die("Could not open the file for reading.");
    }

    // Write the modified data to a temporary file
    if (($handle = fopen($tempFilename, 'w')) !== FALSE) {
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    } else {
        die("Could not open the file for writing.");
    }

    // Replace the original file with the modified one
    if (!rename($tempFilename, $filename)) {
        die("Could not rename the temporary file.");
    }

    echo "CSV file has been modified.<br>";
}

// Check for form submission to add new data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve user input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);

    // Prepare data to write
    $newData = [[$name, $email, $age]];
    writeCSV($filename, $newData);
}

// Display the current CSV data
readCSV($filename);

// Modify the CSV file (this will modify existing data)
modifyCSV($filename, $tempFilename);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Manipulation</title>
</head>
<body>
<div>
    <h1>User Input Form</h1>
    <!-- Form for user input -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
</body>
</html>