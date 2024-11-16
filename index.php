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

<body >
    <?php
   
    session_start();
    if (!isset($_SESSION['log'])) {
        $_SESSION['log'] = false;
    }
    
    include 'common/header.php';
    include 'front.php';
    include 'common/footer.php';




    ?>

    
    
</body>


</html>