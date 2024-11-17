<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
    </style>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<body>
    <?php
    // login.php
    session_start();

    include "./library.php";
    $conn = get_db_connection();

    // Login form submission
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username ."". $password;

        // Validate input
        if (empty($username) || empty($password)) {
            $error = 'Please fill in all fields.';
        } else {
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // User exists, set session and cookie
                $user_data = $result->fetch_assoc();
                $use_phone = $user_data['phone'];
                $user_name = $user_data['name'];
                $user_email = $user_data['email'];

                session_start();
                $_SESSION['log'] = true;
                // setcookie("session", "active", time() + 3600);
                setcookie("user_id", random_int(100001, 999999), time() + 3600);
                setcookie("user_name", $user_name, time() + 3600);
                setcookie("user_email", $user_email, time() + 3600);
                setcookie("user_phone", $use_phone, time() + 3600);


                header("Location: profile.php");
                exit();
            } else {
                $error = 'Invalid username or password.';
            }
        }
    }

    // Display login form
    ?>
    <?php 
   
   if (isset($_SESSION["log"]) && $_SESSION["log"]) {
       header("Location: profile.php");
       exit();
   }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="submit" value="Login">
        <?php if (isset($error)) {
            echo '<p style="color: red;">' . $error . '</p>';
        } ?>
    </form>


</body>


</html>