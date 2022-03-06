<?php

include 'config/core.php';

// Check session jika sudah login lempar ke dashboard kembali
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $result = mysqli_query($db, "SELECT * FROM tbl_akun WHERE username = '$username'");

    //check username
    if (mysqli_num_rows($result) === 1) {
        //check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"]      = true;
            $_SESSION["id_akun"]    = $row["id_akun"];
            $_SESSION["nama"]       = $row["nama"];
            $_SESSION["username"]   = $row["username"];
            $_SESSION["level"]      = $row["level"];

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - SIPS</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- logo favicon -->
    <link href="assets/img/logo.jpg" rel="icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/img/logo.jpg" alt="logo" width="25%">

                                        <h1 class="h4 text-gray-900 mb-4 mt-2">Admin Login</h1>
                                    </div>

                                    <!-- pesan error -->
                                    <?php if (isset($error)) : ?>
                                        <div align="center" class="mb-2 alert alert-danger alert-dismissible fade show" role="alert">
                                            <i><b>Username / Password SALAH</b></i>
                                        </div>
                                    <?php endif; ?>

                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username..." required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password..." required>
                                        </div>

                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <small>Butuh bantuan.?</small>
                                        <a class="small" href="https://wa.me/628892974281" target="_blank">hubungi developer</a>

                                        <br>

                                        <span>Copyright &copy; SMA SEMANGAT OK <?= date('Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>