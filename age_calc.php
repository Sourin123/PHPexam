<?php
// Method 1: Simple Age Calculation
function calculateAge($birthdate) {
    $birthDate = new DateTime($birthdate);
    $today = new DateTime('today');
    return $birthDate->diff($today)->y;
}

// Method 2: Precise Age Calculation with Months and Days
function calculatePreciseAge($birthdate) {
    $birthDate = new DateTime($birthdate);
    $today = new DateTime('today');
    $age = $birthDate->diff($today);
    
    return [
        'years' => $age->y,
        'months' => $age->m,
        'days' => $age->d
    ];
}

// Method 3: Age Validation
function isValidAge($birthdate, $minAge = 18) {
    $age = calculateAge($birthdate);
    return $age >= $minAge;
}

// Method 4: Next Birthday Countdown
function daysUntilNextBirthday($birthdate) {
    $birthDate = new DateTime($birthdate);
    $today = new DateTime('today');
    $nextBirthday = new DateTime(date('Y') . $birthDate->format('-m-d'));
    
    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }
    
    $interval = $today->diff($nextBirthday);
    return $interval->days;
}

$date = '';
$ageMessage = '';
$validationMessage = '';
$birthdayCountdown = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $date = htmlspecialchars(trim($_POST['date']));
    
    // Calculate age
    $age = calculatePreciseAge($date);
    $ageMessage = "Age: " . $age['years'] . " years, " . $age['months'] . " months, " . $age['days'] . " days.";
    
    // Age validation
    if (isValidAge($date)) {
        $validationMessage = "You are old enough.";
    } else {
        $validationMessage = "You are not old enough.";
    }
    
    // Days until next birthday
    $daysUntilBirthday = daysUntilNextBirthday($date);
    $birthdayCountdown = "Days until next birthday: " . $daysUntilBirthday;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Form</title>
</head>
<body>
    <h1>User Input Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Display messages
    if (!empty($ageMessage)) {
        echo "<p>$ageMessage</p>";
    }
    if (!empty($validationMessage)) {
        echo "<p>$validationMessage</p>";
    }
    if (!empty($birthdayCountdown)) {
        echo "<p>$birthdayCountdown</p>";
    }
    ?>
</body>
</html>