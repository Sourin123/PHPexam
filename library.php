

<?php

// Database connection function
function get_db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "unidata";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// User data input function
function insert_into_user($name, $email, $phone, $pass)
{
    $conn = get_db_connection();

    // Hash the password using password_hash()
    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO `user` (`name`, `phone`, `email`, `pass`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $pass);

    // Set parameters and execute
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "New record created successfully";
    } else {
        // Log the error instead of echoing it
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

// Delete user function (updated to use get_db_connection())
function delete_user($email)
{
    $conn = get_db_connection();

    $stmt = $conn->prepare("DELETE FROM `user` WHERE `email` = ?");
    $stmt->bind_param("s", $email);

    // Set parameters and execute
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "User deleted successfully";
    } else {
        // Log the error instead of echoing it
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

// Function to show user data
function show_user($email)
{
    $conn = get_db_connection();

    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ?");
    $stmt->bind_param("s", $email);

    // Set parameters and execute
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . "<br>";
            echo "Phone: " . $row["phone"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
        }
    } else {
        // Log the error instead of echoing it
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

// Function to update user data
function update_user($email, $name, $phone, $pass)
{
    $conn = get_db_connection();

    // Hash the password using password_hash()
    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE `user` SET `name` = ?, `phone` = ?, `pass` = ? WHERE `email` = ?");
    $stmt->bind_param("ssss", $name, $phone, $pass, $email);

    // Set parameters and execute
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "User updated successfully";
    } else {
        // Log the error instead of echoing it
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

?>
