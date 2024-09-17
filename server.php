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

}else{
    header('Location:http://localhost/UNI/error404.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($name)) { echo $name; } ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($email)) { echo $email; } ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php if (isset($phone)) { echo $phone; } ?>">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php if (isset($pass)) { echo $pass; } ?>">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>