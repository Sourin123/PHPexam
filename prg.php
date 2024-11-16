<?php
session_start();

// Generate a unique token and store it in the session
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

// Check if the user has already submitted the form
if (!isset($_SESSION['form_submitted'])) {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check for token validity to prevent re-submissions
        if (!empty($_POST['form_token']) && hash_equals($_SESSION['form_token'], $_POST['form_token'])) {

            // Process the form data
            $name = htmlspecialchars($_POST['name']);

            // Perform actions like saving to a database

            // Set a session variable to use after redirect
            $_SESSION['message'] = "Form submitted successfully, $name!";

            // Invalidate the current form token to prevent reuse
            unset($_SESSION['form_token']);

            // Set the submission status to true
            $_SESSION['form_submitted'] = true;

            // Redirect to the same page (or another page)
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            // Invalid token or multiple submission attempt
            $_SESSION['message'] = "Invalid token or multiple submission attempt.";
        }
    }
} else {
    // If the user has already submitted the form
    $_SESSION['message'] = "You have already submitted the form.";
}

// To display the message after redirection
$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Clear the message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission with PRG</title>
</head>

<body>
    <h1>Submit your Name</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="name" required placeholder="Enter your name" <?php echo isset($_SESSION['form_submitted']) ? 'disabled' : ''; ?>>
        <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">
        <button type="submit" <?php echo isset($_SESSION['form_submitted']) ? 'disabled' : ''; ?>>Submit</button>
    </form>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>

</html>