<?php include("../controller/controller.php"); ?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php") ?>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>
<script>
        document.addEventListener('DOMContentLoaded', function() {
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the POST request
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        // Prepare the SQL query to find the user
        $stmt = $pdo->prepare("SELECT id, username, password_hashed, e_type, first_name, middle_name, last_name FROM employee_accounts WHERE username = :username  AND status= 'saved'");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user &&  ($password== decryptPassword($user['password_hashed']))) {
            // Valid credentials, create session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_type'] = 'employee';
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['full_name'] = $user['first_name'] . " " . $user['middle_name']. " " .$user['last_name'];

            // Redirect to index.php
            echo "Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: 'You have successfully logged in!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'index.php';
            });";
        } else {
            // Invalid credentials
            echo "Swal.fire({
                icon: 'error',
                title: 'Invalid Credentials',
                text: 'The username or password you entered is incorrect.',
                confirmButtonText: 'Try Again'
            });";
        }
    } catch (PDOException $e) {
        echo "Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '" . $e->getMessage() . "'
        });";
    }
}
?>
        });
</script>
<body>
    <div class="main-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
     
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(assets/images/login-fbg.png) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(assets/images/login-bg.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="assets/images/favicon.png" style="width: 100px;" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">BATSTATEU-FIS</h2>
                        <p class="text-center">User Employee LogIn</p>
                        <form class="mt-4" action="login.php" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label class="text-dark" for="uname">Username</label>
                <input required class="form-control" id="uname" name="username" type="text" placeholder="Enter your username" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="text-dark" for="pwd">Password</label>
                <input required class="form-control" id="pwd" name="password" type="password" placeholder="Enter your password" required>
            </div>
        </div>
        <div class="col-lg-12 text-center mb-3">
            <button type="submit" class="btn btn-block btn-dark">Sign In</button>
        </div>
        <?php if (isset($error)): ?>
        <div class="col-lg-12 text-center">
            <p class="text-danger"><?= htmlspecialchars($error) ?></p>
        </div>
        <?php endif; ?>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>