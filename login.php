<?php
include "session_start.php";
include "database_connection.php";
include "class/pengguna_pdo.php";

$Username = $_POST["Username"] ?? "";
$Password = $_POST["password"] ?? "";
if ($Username != "" && $Password != "") {
    $Pengguna = new Pengguna($connectionPDO);
    $Pengguna->setNamaPengguna($Username);
    $Pengguna->setPassword($Password);

    $Login = $Pengguna->login();
    if ($Login != null) {
        $_SESSION['nama'] = $Login["NamaPengguna"];
        $_SESSION['id'] = $Login["IdPengguna"];
        header ("location:index.php");
        die();
    }else{
        ?>
            <p class="text-danger">
                username or password invalid
            </p>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <h2 class="mb-3">Login</h2>
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="username" autocomplete="off" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" autocomplete="off" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>