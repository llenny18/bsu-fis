<?php include("../controller/controller.php"); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php") ?>
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <?php

// Check if a_id is passed in the URL for editing
if (isset($_GET['a_id'])) {
    $a_id = $_GET['a_id'];

    // Fetch existing data
    $stmt = $pdo->prepare("SELECT * FROM admin_accounts WHERE id = :a_id");
    $stmt->execute(['a_id' => $a_id]);
    $admin = $stmt->fetch();

    // Check if the admin exists
    if (!$admin) {
        echo "Admin not found!";
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password =  encryptPassword($_POST['password']) ;

    if (isset($a_id)) {
        // Update the existing record
        $stmt = $pdo->prepare("UPDATE admin_accounts SET full_name = :full_name, username = :username, password_hashed = :password WHERE id = :a_id");
        $stmt->execute(['full_name' => $full_name, 'username' => $username, 'password' => $password, 'a_id' => $a_id]);
        echo "Record updated successfully!";
    } else {
        // Insert a new record
        $stmt = $pdo->prepare("INSERT INTO admin_accounts (full_name, username, password_hashed) VALUES (:full_name, :username, :password)");
        $stmt->execute(['full_name' => $full_name, 'username' => $username, 'password' => $password]);
        echo "Record inserted successfully!";
    }
}
?>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include("./nav.php") ?>
   
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Manage Administrator Details</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><?php if(isset($_GET['a_id'])){ echo "Edit ";  }else{ echo "Register "; }  ?>Administrator</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="edata-title">Administrator Credentials</h4>
                                        <hr class="red-hr">
                                <form action="" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" name="full_name" class="form-control" placeholder="Full Name here" value="<?php echo isset($admin) ? $admin['full_name'] : ''; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username here" value="<?php echo isset($admin) ? $admin['username'] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" name="password" class="form-control" placeholder="Password here" value="<?php echo isset($admin) ? decryptPassword($admin['password_hashed']) : ''; ?>" required>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>

   

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
</body>

</html>
