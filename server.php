<?php
require_once "library.php";
// // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

//     // Create connection
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "unidata";

//     $conn = new mysqli($servername, $username, $password, $dbname);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Prepare and bind
//     $stmt = $conn->prepare("INSERT INTO `user` (`name`, `phone`, `email`, `pass`) VALUES (?, ?, ?, ?)");
//     $stmt->bind_param("ssss", $name, $phone, $email, $pass);

//     // Set parameters and execute
//     $stmt->execute();

//     if ($stmt->affected_rows > 0) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
//     $conn->close();
// }
insert_into_user($name,$email,$phone,$pass);

header("location:login.php");

}else{
    header('Location:http://localhost/UNI/error404.php');
    exit;
}

?>

