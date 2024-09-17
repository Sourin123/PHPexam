<?php
include_once "./library.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"]; // Assuming the email input has the name "email" in the form

// Create a prepared statement to prevent SQL Injection
$conn = get_db_connection();
$quarry = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($quarry);
$stmt->bind_param("s", $email); // "s" denotes string data type
$stmt->execute();
$result = $stmt->get_result(); // Get the result

$row_object = $result->fetch_object();
// data fetchable object 
$name = $row_object->name;
$phone = $row_object->phone;



// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         print_r($row);
//         echo $row->name; // Print the entire row as an array
//     }
// } else {
//     echo "No user found with the provided email.";
// }

$stmt->close();
$conn->close();
}else{
        header('Location:http://localhost/UNI/error404.php');
        exit;
    }

// Sanitize the email input

include_once "./common/header.php";
?>
<style>
        .gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="./common/luffy.svg"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><?php echo $name;?></h5>
              <p>Big Fan</p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $email;?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $phone;?></p>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">Lorem ipsum</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">Dolor sit amet</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php 
include_once "./common/footer.php";
?>