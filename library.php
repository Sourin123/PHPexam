

<?php
//season createion 

function start_season($email){
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$email;
}
//session close 
function close_session(){
    session_start();
    session_unset();
    session_destroy();
    header("Location:http://localhost/UNI/");
}
//seassion validate
function validate_session(){
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        return true;
    }
    else{
        return false;
    }
}
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
    // $pass = password_hash($pass, PASSWORD_BCRYPT);

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
// Function to show user data
// Function to show user data
function show_user($email, $pass) {
    $conn = get_db_connection();

    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        error_log("Error: User not found");
        header('Location:http://localhost/UNI/error404.php');
        exit;
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
